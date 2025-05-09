@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="mb-0">Shopping Cart Details</h3>
                        <span class="badge bg-light text-primary fs-6">
                            ID: {{ $shoppingCart->id }}
                        </span>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="card h-100">
                                <div class="card-header bg-light">
                                    <h5 class="mb-0">User Information</h5>
                                </div>
                                <div class="card-body">
                                    @if($shoppingCart->user)
                                        <p class="mb-1"><strong>Name:</strong> {{ $shoppingCart->user->name }}</p>
                                        <p class="mb-1"><strong>Email:</strong> {{ $shoppingCart->user->email }}</p>
                                        <p class="mb-0"><strong>User ID:</strong> {{ $shoppingCart->user->id }}</p>
                                    @else
                                        <p class="text-muted mb-0">Guest User</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card h-100">
                                <div class="card-header bg-light">
                                    <h5 class="mb-0">Product Information</h5>
                                </div>
                                <div class="card-body">
                                    @if($shoppingCart->product)
                                        <p class="mb-1"><strong>Name:</strong> {{ $shoppingCart->product->name }}</p>
                                        <p class="mb-1"><strong>Price:</strong> ${{ number_format($shoppingCart->product->price, 2) }}</p>
                                        <p class="mb-1"><strong>Product ID:</strong> {{ $shoppingCart->product->id }}</p>
                                        <p class="mb-0"><strong>Stock:</strong> {{ $shoppingCart->product->stock ?? 'N/A' }}</p>
                                    @else
                                        <p class="text-danger mb-0">Product no longer available</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-header bg-light">
                            <h5 class="mb-0">Order Details</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="mb-1"><strong>Quantity:</strong> {{ $shoppingCart->quantity }}</p>
                                </div>
                                <div class="col-md-4">
                                    <p class="mb-1"><strong>Unit Price:</strong> ${{ number_format($shoppingCart->product->price ?? 0, 2) }}</p>
                                </div>
                                <div class="col-md-4">
                                    <p class="mb-1"><strong>Subtotal:</strong> 
                                        ${{ number_format(($shoppingCart->product->price ?? 0) * $shoppingCart->quantity, 2) }}
                                    </p>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <p class="mb-1"><strong>Created Date:</strong> 
                                        {{ $shoppingCart->created_at->format('M d, Y \a\t h:i A') }}
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p class="mb-1"><strong>Last Updated:</strong> 
                                        {{ $shoppingCart->updated_at->format('M d, Y \a\t h:i A') }}
                                    </p>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12">
                                    <p class="mb-0"><strong>Status:</strong> 
                                        @if($shoppingCart->order_id)
                                            <span class="badge bg-success">Ordered (Order #{{ $shoppingCart->order_id }})</span>
                                        @else
                                            <span class="badge bg-warning text-dark">Pending</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('shoppingcart.index') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left"></i> Back to List
                        </a>
                        <div class="btn-group">
                            <a href="{{ route('shoppingcart.edit', $shoppingCart->id) }}" class="btn btn-primary">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <form action="{{ route('shoppingcart.destroy', $shoppingCart->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" 
                                        onclick="return confirm('Are you sure you want to delete this cart item?')">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection