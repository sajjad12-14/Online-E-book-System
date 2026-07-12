@extends('Layouts.Adminlayouts')

@section('content')
    <div class="container-fluid py-4">

        {{-- Page Header --}}
        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>

                <h2 class="fw-bold mb-1">
                    <i class="bi bi-receipt-cutoff text-primary me-2"></i>
                    Order Details
                </h2>

                <p class="text-muted mb-0">
                    Complete information about Order #{{ $order->id }}
                </p>

            </div>

            <a href="{{ route('admin.orders') }}" class="btn btn-outline-dark rounded-pill">

                <i class="bi bi-arrow-left me-2"></i>

                Back to Orders

            </a>

        </div>



        {{-- Summary Cards --}}

        <div class="row g-4 mb-4">

            <div class="col-lg-3">

                <div class="card border-0 shadow rounded-4">

                    <div class="card-body text-center">

                        <i class="bi bi-bag-check-fill fs-1 text-primary"></i>

                        <h5 class="mt-3 fw-bold">

                            Order #{{ $order->id }}

                        </h5>

                        <small class="text-muted">

                            Order ID

                        </small>

                    </div>

                </div>

            </div>



            <div class="col-lg-3">

                <div class="card border-0 shadow rounded-4">

                    <div class="card-body text-center">

                        <i class="bi bi-cash-stack fs-1 text-success"></i>

                        <h5 class="mt-3 fw-bold">

                            Rs {{ number_format($order->total_amount) }}

                        </h5>

                        <small class="text-muted">

                            Total Amount

                        </small>

                    </div>

                </div>

            </div>



            <div class="col-lg-3">

                <div class="card border-0 shadow rounded-4">

                    <div class="card-body text-center">

                        <i class="bi bi-credit-card fs-1 text-warning"></i>

                        <h5 class="mt-3">

                            @if ($order->payment_status == 'Paid')
                                <span class="badge bg-success">

                                    Paid

                                </span>
                            @else
                                <span class="badge bg-danger">

                                    {{ $order->payment_status }}

                                </span>
                            @endif

                        </h5>

                        <small class="text-muted">

                            Payment Status

                        </small>

                    </div>

                </div>

            </div>



            <div class="col-lg-3">

                <div class="card border-0 shadow rounded-4">

                    <div class="card-body text-center">

                        <i class="bi bi-truck fs-1 text-info"></i>

                        <h5 class="mt-3">

                            <span class="badge bg-primary">

                                {{ ucfirst($order->status) }}

                            </span>

                        </h5>

                        <small class="text-muted">

                            Order Status

                        </small>

                    </div>

                </div>

            </div>

        </div>



        {{-- Customer Information --}}

        <div class="card border-0 shadow rounded-4 mb-4">

            <div class="card-header bg-white border-0 py-3">

                <h4 class="fw-bold mb-0">

                    <i class="bi bi-person-circle text-primary me-2"></i>

                    Customer Information

                </h4>

            </div>

            <div class="card-body">

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label class="fw-semibold text-muted">

                            Customer Name

                        </label>

                        <h5>

                            {{ $order->name }}

                        </h5>

                    </div>



                    <div class="col-md-6 mb-3">

                        <label class="fw-semibold text-muted">

                            Email Address

                        </label>

                        <h5>

                            {{ $order->email }}

                        </h5>

                    </div>



                    <div class="col-md-6 mb-3">

                        <label class="fw-semibold text-muted">

                            Phone Number

                        </label>

                        <h5>

                            {{ $order->phone }}

                        </h5>

                    </div>



                    <div class="col-md-6 mb-3">

                        <label class="fw-semibold text-muted">

                            City

                        </label>

                        <h5>

                            {{ $order->city }}

                        </h5>

                    </div>



                    <div class="col-12">

                        <label class="fw-semibold text-muted">

                            Delivery Address

                        </label>

                        <p class="mb-0">

                            {{ $order->address }}

                        </p>

                    </div>

                </div>

            </div>

        </div>
        {{-- Ordered Books --}}

        <div class="card border-0 shadow rounded-4 mb-4">

            <div class="card-header bg-white border-0 py-3">

                <h4 class="fw-bold mb-0">

                    <i class="bi bi-book-half text-success me-2"></i>

                    Ordered Books

                </h4>

            </div>

            <div class="card-body table-responsive">

                <table class="table align-middle table-hover">

                    <thead class="table-light">

                        <tr>

                            <th width="90">Book</th>

                            <th>Title</th>

                            <th class="text-center">Price</th>

                            <th class="text-center">Quantity</th>

                            <th class="text-end">Total</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($order->items as $item)
                            <tr>

                                <td>

                                    <img src="{{ asset('uploads/books/' . $item->book->image) }}" class="rounded shadow-sm"
                                        style="width:70px;height:90px;object-fit:cover;">

                                </td>

                                <td>

                                    <h6 class="fw-bold mb-1">

                                        {{ $item->book->title }}

                                    </h6>

                                    <small class="text-muted">

                                        {{ $item->book->author->name ?? 'Unknown Author' }}

                                    </small>

                                </td>

                                <td class="text-center">

                                    <span class="fw-bold text-success">

                                        Rs {{ number_format($item->price) }}

                                    </span>

                                </td>

                                <td class="text-center">

                                    <span class="badge bg-primary rounded-pill px-3 py-2">

                                        {{ $item->quantity }}

                                    </span>

                                </td>

                                <td class="text-end">

                                    <span class="fw-bold">

                                        Rs {{ number_format($item->price * $item->quantity) }}

                                    </span>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="5" class="text-center py-5">

                                    <i class="bi bi-cart-x display-4 text-muted"></i>

                                    <h5 class="mt-3 text-muted">

                                        No Books Found

                                    </h5>

                                </td>

                            </tr>
                        @endforelse

                    </tbody>

                    <tfoot>

                        <tr>

                            <th colspan="4" class="text-end">

                                Grand Total

                            </th>

                            <th class="text-end text-success fs-5">

                                Rs {{ number_format($order->total_amount) }}

                            </th>

                        </tr>

                    </tfoot>

                </table>

            </div>

        </div>
        {{-- Payment & Status --}}

        <div class="row">

            <!-- Payment Information -->

            <div class="col-lg-6 mb-4">

                <div class="card border-0 shadow rounded-4 h-100">

                    <div class="card-header bg-white border-0">

                        <h4 class="fw-bold">

                            <i class="bi bi-credit-card text-success me-2"></i>

                            Payment Information

                        </h4>

                    </div>

                    <div class="card-body">

                        <table class="table table-borderless">

                            <tr>

                                <th width="180">

                                    Payment Method

                                </th>

                                <td>

                                    {{ $order->payment_method }}

                                </td>

                            </tr>

                            <tr>

                                <th>

                                    Payment Status

                                </th>

                                <td>

                                    @if ($order->payment_status == 'Paid')
                                        <span class="badge bg-success">

                                            Paid

                                        </span>
                                    @else
                                        <span class="badge bg-danger">

                                            {{ $order->payment_status }}

                                        </span>
                                    @endif

                                </td>

                            </tr>

                            <tr>

                                <th>

                                    Transaction ID

                                </th>

                                <td>

                                    {{ $order->transaction_id ?? 'N/A' }}

                                </td>

                            </tr>

                            <tr>

                                <th>

                                    Total Amount

                                </th>

                                <td class="fw-bold text-success">

                                    Rs {{ number_format($order->total_amount) }}

                                </td>

                            </tr>

                        </table>

                    </div>

                </div>

            </div>



            <!-- Update Status -->

            <div class="col-lg-6 mb-4">

                <div class="card border-0 shadow rounded-4 h-100">

                    <div class="card-header bg-white border-0">

                        <h4 class="fw-bold">

                            <i class="bi bi-truck text-primary me-2"></i>

                            Update Order Status

                        </h4>

                    </div>

                    <div class="card-body">

                        <form action="{{ route('admin.orders.status', $order->id) }}" method="POST">

                            @csrf

                            <div class="mb-3">

                                <label class="form-label fw-semibold">

                                    Current Status

                                </label>

                                <select class="form-select" name="status">

                                    <option value="Pending" {{ $order->status == 'Pending' ? 'selected' : '' }}>
                                        Pending
                                    </option>

                                    <option value="Processing" {{ $order->status == 'Processing' ? 'selected' : '' }}>
                                        Processing
                                    </option>

                                    <option value="Shipped" {{ $order->status == 'Shipped' ? 'selected' : '' }}>
                                        Shipped
                                    </option>

                                    <option value="Delivered" {{ $order->status == 'Delivered' ? 'selected' : '' }}>
                                        Delivered
                                    </option>

                                    <option value="Cancelled" {{ $order->status == 'Cancelled' ? 'selected' : '' }}>
                                        Cancelled
                                    </option>

                                </select>

                            </div>

                            <button class="btn btn-success w-100 rounded-pill">

                                <i class="bi bi-check-circle me-2"></i>

                                Update Status

                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>
    @endsection
