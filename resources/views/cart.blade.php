@extends('layouts.app')

@section('content')
    <h1>Cart</h1>

    <form action="{{ route('cart.add') }}" method="POST">
        @csrf
        <input type="text" name="item" placeholder="Add item" required>
        <button type="submit" class="btn btn-primary">Add to Cart</button>
    </form>

    <ul class="list-group mt-3">
        @foreach($cart as $index => $item)
            <li class="list-group-item d-flex justify-content-between">
                {{ $item }}
                <form action="{{ route('cart.remove') }}" method="POST">
                    @csrf
                    <input type="hidden" name="index" value="{{ $index }}">
                    <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
