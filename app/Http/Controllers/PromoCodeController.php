<?php

namespace App\Http\Controllers;

use App\Models\PromoCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class PromoCodeController extends Controller
{
    public function index()
    {
        $promoCodes = PromoCode::paginate(10);
        return view('promocodes.index', compact('promoCodes'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|string|unique:promo_codes,code|max:255',
            'description' => 'nullable|string|max:255',
            'discount_type' => 'required|in:percentage,fixed',
            'discount_value' => 'required|numeric|min:0',
            'start_date' => 'nullable|date',
            'expiration_date' => 'required|date|after_or_equal:today',
            'usage_limit' => 'nullable|integer|min:1',
            'min_purchase' => 'nullable|numeric|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        $status = $this->determineStatus(
            $request->boolean('is_active', true),
            $request->start_date,
            $request->expiration_date
        );

        $promoCode = PromoCode::create([
            'code' => $request->code,
            'description' => $request->description,
            'discount_type' => $request->discount_type,
            'discount_value' => $request->discount_value,
            'start_date' => $request->start_date,
            'expiration_date' => $request->expiration_date,
            'usage_limit' => $request->usage_limit,
            'min_purchase' => $request->min_purchase,
            'is_active' => $request->boolean('is_active', true),
            'status' => $status,
            'usage_count' => 0,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Promo code created successfully.',
            'promo' => $promoCode->toArray(),
        ], 200);
    }

    public function edit(PromoCode $promocode)
    {
        return view('promocodes.edit', compact('promocode'));
    }

    public function update(Request $request, PromoCode $promocode)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|string|unique:promo_codes,code,' . $promocode->id . '|max:255',
            'description' => 'nullable|string|max:255',
            'discount_type' => 'required|in:percentage,fixed',
            'discount_value' => 'required|numeric|min:0',
            'start_date' => 'nullable|date',
            'expiration_date' => 'required|date|after_or_equal:today',
            'usage_limit' => 'nullable|integer|min:1',
            'min_purchase' => 'nullable|numeric|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        $status = $this->determineStatus(
            $request->boolean('is_active', true),
            $request->start_date,
            $request->expiration_date
        );

        $promocode->update([
            'code' => $request->code,
            'description' => $request->description,
            'discount_type' => $request->discount_type,
            'discount_value' => $request->discount_value,
            'start_date' => $request->start_date,
            'expiration_date' => $request->expiration_date,
            'usage_limit' => $request->usage_limit,
            'min_purchase' => $request->min_purchase,
            'is_active' => $request->boolean('is_active', true),
            'status' => $status,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Promo code updated successfully.',
            'promo' => $promocode->toArray(),
        ], 200);
    }

    public function destroy(PromoCode $promocode)
    {
        $promocode->delete();
        return response()->json([
            'success' => true,
            'message' => 'Promo code deleted successfully.',
        ], 200);
    }

    public function toggleActive(Request $request, $id)
    {
        $promo = PromoCode::findOrFail($id);
        $isActive = $request->boolean('is_active');
        $promo->is_active = $isActive;
        $promo->status = $this->determineStatus(
            $isActive,
            $promo->start_date,
            $promo->expiration_date
        );
        $promo->save();

        \Log::info('Promo Code Updated:', $promo->toArray());

        return response()->json([
            'success' => true,
            'message' => 'Promo code status updated successfully.',
            'promo' => $promo->toArray(),
        ], 200);
    }

    /**
     * Determine the status of a promo code based on is_active, start_date, and expiration_date.
     *
     * @param bool $isActive
     * @param string|null $startDate
     * @param string $expirationDate
     * @return string
     */
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