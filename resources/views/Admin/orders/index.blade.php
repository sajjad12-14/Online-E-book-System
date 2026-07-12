@extends('Layouts.Adminlayouts')

@section('content')
    <div class="container-fluid py-4">

        <!-- Heading -->

        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>

                <h2 class="fw-bold">

                    Orders Management

                </h2>

                <p class="text-muted mb-0">

                    Manage all customer orders.

                </p>

            </div>

        </div>


        <!-- Statistics -->

        <div class="row g-4 mb-4">

            <div class="col-lg-3">

                <div class="card border-0 shadow rounded-4">

                    <div class="card-body text-center">

                        <i class="bi bi-bag-check-fill display-5 text-primary"></i>

                        <h3 class="fw-bold mt-3">

                            {{ $totalOrders }}

                        </h3>

                        <p class="text-muted">

                            Total Orders

                        </p>

                    </div>

                </div>

            </div>



            <div class="col-lg-3">

                <div class="card border-0 shadow rounded-4">

                    <div class="card-body text-center">

                        <i class="bi bi-hourglass-split display-5 text-warning"></i>

                        <h3 class="fw-bold mt-3">

                            {{ $pendingOrders }}

                        </h3>

                        <p class="text-muted">

                            Pending

                        </p>

                    </div>

                </div>

            </div>



            <div class="col-lg-3">

                <div class="card border-0 shadow rounded-4">

                    <div class="card-body text-center">

                        <i class="bi bi-truck display-5 text-info"></i>

                        <h3 class="fw-bold mt-3">

                            {{ $processingOrders }}

                        </h3>

                        <p class="text-muted">

                            Processing

                        </p>

                    </div>

                </div>

            </div>



            <div class="col-lg-3">

                <div class="card border-0 shadow rounded-4">

                    <div class="card-body text-center">

                        <i class="bi bi-check-circle-fill display-5 text-success"></i>

                        <h3 class="fw-bold mt-3">

                            {{ $completedOrders }}

                        </h3>

                        <p class="text-muted">

                            Delivered

                        </p>

                    </div>

                </div>

            </div>

        </div>



        <!-- Search -->

        <div class="card border-0 shadow rounded-4 mb-4">

            <div class="card-body">

                <form method="GET">

                    <div class="row">

                        <div class="col-md-10">

                            <input type="text" name="search" value="{{ $search }}"
                                class="form-control rounded-pill" placeholder="Search Order, Customer or Phone...">

                        </div>

                        <div class="col-md-2">

                            <button class="btn btn-dark rounded-pill w-100">

                                Search

                            </button>

                        </div>

                    </div>

                </form>

            </div>

        </div>



        <!-- Table -->

        <div class="card border-0 shadow rounded-4">

            <div class="card-body table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-dark">

                        <tr>

                            <th>#</th>

                            <th>Customer</th>

                            <th>Phone</th>

                            <th>Books</th>

                            <th>Total</th>

                            <th>Payment</th>

                            <th>Status</th>

                            <th>Action</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($orders as $order)
                            <tr>

                                <td>

                                    {{ $order->id }}

                                </td>

                                <td>

                                    <strong>{{ $order->name }}</strong>

                                    <br>

                                    <small class="text-muted">

                                        {{ $order->email }}

                                    </small>

                                </td>

                                <td>

                                    {{ $order->phone }}

                                </td>

                                <td>

                                    {{ $order->items->count() }}

                                </td>

                                <td>

                                    Rs {{ number_format($order->total_amount) }}

                                </td>

                                <td>

                                    @if ($order->payment_status == 'Paid')
                                        <span class="badge bg-success">

                                            Paid

                                        </span>
                                    @else
                                        <span class="badge bg-danger">

                                            Unpaid

                                        </span>
                                    @endif

                                </td>

                                <td>

                                    <span class="badge bg-primary">

                                        {{ $order->status }}

                                    </span>

                                </td>

                                <td>

                                    <div class="d-flex gap-2">

                                        <a href="{{ route('admin.orders.details', $order->id) }}"
                                            class="btn btn-success btn-sm rounded-pill">

                                            <i class="bi bi-eye"></i>

                                            View

                                        </a>

                                        <form action="{{ route('admin.orders.delete', $order->id) }}" method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this order?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger btn-sm rounded-pill">

                                                <i class="bi bi-trash"></i>

                                                Delete

                                            </button>

                                        </form>

                                    </div>

                                </td>


                            </tr>

                        @empty

                            <tr>

                                <td colspan="8" class="text-center">

                                    No Orders Found

                                </td>

                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>



        <div class="mt-4">

            {{ $orders->links() }}

        </div>

    </div>
@endsection
