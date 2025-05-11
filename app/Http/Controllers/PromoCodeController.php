<?php

namespace App\Http\Controllers;

use App\Models\PromoCode;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PromoCodeController extends Controller
{
    public function index()
    {
        $promoCodes = PromoCode::paginate(10);
        return response()->view('promocodes.index', compact('promoCodes'))
            ->header('Cache-Control', 'no-store, no-cache, must-revalidate');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required|unique:promo_codes,code',
            'discount_type' => 'required|in:percentage,fixed',
            'discount_value' => 'required|numeric|min:1',
            'expiration_date' => 'required|date|after_or_equal:today',
            // Add other validation rules as needed
        ]);

        $promo = \App\Models\PromoCode::create([
            'code' => $validated['code'],
            'description' => $request->input('description'),
            'discount_type' => $validated['discount_type'],
            'discount_value' => $validated['discount_value'],
            'start_date' => $request->input('start_date'),
            'expiration_date' => $validated['expiration_date'],
            'usage_limit' => $request->input('usage_limit'),
            'min_purchase' => $request->input('min_purchase'),
            'is_active' => $request->has('is_active'),
        ]);

        // Calculate status for the new promo code
        $status = 'Active';
        $now = now();
        if ($promo->expiration_date < $now) {
            $status = 'Expired';
        } elseif ($promo->start_date && $promo->start_date > $now) {
            $status = 'Scheduled';
        }

        // Return JSON for AJAX
        return response()->json([
            'id' => $promo->id,
            'code' => $promo->code,
            'description' => $promo->description,
            'discount_type' => $promo->discount_type,
            'discount_value' => $promo->discount_value,
            'usage_limit' => $promo->usage_limit,
            'expiration_date_formatted' => \Carbon\Carbon::parse($promo->expiration_date)->format('d-m-Y'),
            'status' => $status,
        ]);
    }

    public function edit(PromoCode $promocode)
    {
        return view('promocodes.edit', compact('promocode'));
    }

    public function update(Request $request, PromoCode $promocode)
    {
        $validated = $request->validate([
            'code' => 'required|string|unique:promocodes,code,' . $promocode->id . '|max:255',
            'description' => 'nullable|string|max:255',
            'discount_type' => 'required|in:percentage,fixed',
            'discount_value' => 'required|numeric|min:1' . ($request->discount_type === 'percentage' ? '|max:100' : ''),
            'start_date' => 'nullable|date|after_or_equal:today',
            'expiration_date' => 'required|date|after_or_equal:today',
            'usage_limit' => 'nullable|integer|min:1',
            'min_purchase' => 'nullable|numeric|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        try {
            $status = $this->determineStatus(
                $request->boolean('is_active', true),
                $request->start_date,
                $request->expiration_date
            );

            $promocode->update([
                'code' => $validated['code'],
                'description' => $validated['description'],
                'discount_type' => $validated['discount_type'],
                'discount_value' => $validated['discount_value'],
                'start_date' => $validated['start_date'] ? Carbon::parse($validated['start_date']) : null,
                'expiration_date' => Carbon::parse($validated['expiration_date']),
                'usage_limit' => $validated['usage_limit'],
                'min_purchase' => $validated['min_purchase'],
                'is_active' => $request->boolean('is_active', true),
                'status' => $status,
            ]);

            return redirect()->route('promocodes.index')
                ->with('success', 'Promo code updated successfully.');
        } catch (\Exception $e) {
            \Log::error('Error updating promo code: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'An error occurred while updating the promo code. Please try again.')
                ->withInput();
        }
    }

    public function destroy(PromoCode $promocode)
    {
        try {
            $promocode->delete();
            return redirect()->route('promocodes.index')
                ->with('success', 'Promo code deleted successfully.');
        } catch (\Exception $e) {
            \Log::error('Error deleting promo code: ' . $e->getMessage());
            return redirect()->route('promocodes.index')
                ->with('error', 'An error occurred while deleting the promo code. Please try again.');
        }
    }

    private function determineStatus($isActive, $startDate, $expirationDate)
    {
        $now = Carbon::now();

        if (!$isActive) {
            return 'Inactive';
        }

        if ($startDate && $now->lt(Carbon::parse($startDate))) {
            return 'Scheduled';
        }

        if ($now->gt(Carbon::parse($expirationDate))) {
            return 'Expired';
        }

        return 'Active';
    }
}