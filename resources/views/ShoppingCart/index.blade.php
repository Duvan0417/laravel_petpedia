@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white">
                    <h4 class="mb-0">Shopping Cart Management</h4>
                    <a href="{{ route('shoppingcart.create') }}" class="btn btn-light">
                        <i class="bi bi-plus-circle"></i> Add New Item
                    </a>
                </div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>User</th>
                                    <th>Product</th>
                                    <th>Unit Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Created At</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($shoppingCarts as $cart)
                                    <tr>
                                        <td>{{ $cart->id }}</td>
                                        <td>
                                            @if($cart->user)
                                                {{ $cart->user->name }}
                                            @else
                                                <span class="text-muted">Guest</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($cart->product)
                                                {{ $cart->product->name }}
                                            @else
                                                <span class="text-danger">Product deleted</span>
                                            @endif
                                        </td>
                                        <td class="text-end">
                                            ${{ number_format($cart->product->price ?? 0, 2) }}
                                        </td>
                                        <td class="text-center">{{ $cart->quantity }}</td>
                                        <td class="text-end">
                                            ${{ number_format(($cart->product->price ?? 0) * $cart->quantity, 2) }}
                                        </td>
                                        <td>{{ $cart->created_at->format('M d, Y H:i') }}</td>
                                        <td>
                                            @if($cart->order_id)
                                                <span class="badge bg-success">Ordered</span>
                                            @else
                                                <span class="badge bg-warning text-dark">Pending</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <div class="d-flex justify-content-center gap-2">
                                                <a href="{{ route('shoppingcart.show', $cart->id) }}" 
                                                   class="btn btn-sm btn-info" title="View">
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                                
                                                <a href="{{ route('shoppingcart.edit', $cart->id) }}" 
                                                   class="btn btn-sm btn-primary" title="Edit">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                
                                                <form action="{{ route('shoppingcart.destroy', $cart->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" 
                                                            title="Delete" onclick="return confirm('Are you sure?')">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center py-4">No shopping cart items found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="5" class="text-end fw-bold">Grand Total:</td>
                                    <td class="text-end fw-bold">
                                        ${{ number_format($shoppingCarts->sum(function($cart) {
                                            return ($cart->product->price ?? 0) * $cart->quantity;
                                        }), 2) }}
                                    </td>
                                    <td colspan="3"></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    {{-- Sección de paginación eliminada ya que no es necesaria para colecciones --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection