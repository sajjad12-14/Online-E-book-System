@if (session('success'))
<div class="alert alert-success alert-dismissible fade show rounded-4 shadow-sm">

    <i class="bi bi-check-circle-fill me-2"></i>

    {{ session('success') }}

    <button class="btn-close" data-bs-dismiss="alert"></button>

</div>
@endif


<div class="card border-0 shadow rounded-4 mt-4">

    <div class="card-body">

        <h4 class="fw-bold mb-4">

            <i class="bi bi-receipt-cutoff me-2 text-primary"></i>

            Payment Information

        </h4>

        <div class="row mb-3">

            <div class="col-md-4">

                <strong>

                    Payment Method

                </strong>

            </div>

            <div class="col-md-8">

                @if($order->payment_method == 'Cash On Delivery')

                    <span class="badge bg-secondary fs-6">

                        Cash On Delivery

                    </span>

                @elseif($order->payment_method == 'Stripe')

                    <span class="badge bg-primary fs-6">

                        Stripe

                    </span>

                @elseif($order->payment_method == 'JazzCash')

                    <span class="badge text-dark fs-6"
                          style="background:#ffc107;">

                        JazzCash

                    </span>

                @elseif($order->payment_method == 'Easypaisa')

                    <span class="badge bg-success fs-6">

                        Easypaisa

                    </span>

                @endif

            </div>

        </div>


        <div class="row mb-4">

            <div class="col-md-4">

                <strong>

                    Payment Status

                </strong>

            </div>

            <div class="col-md-8">

                @if($order->payment_status == 'Paid')

                    <span class="badge bg-success fs-6">

                        Paid

                    </span>

                @else

                    <span class="badge bg-warning text-dark fs-6">

                        Pending

                    </span>

                @endif

            </div>

        </div>

        <hr>

        <h4 class="fw-bold mb-4 mt-4">

            <i class="bi bi-arrow-repeat me-2 text-warning"></i>

            Update Order Status

        </h4>

        <form action="{{ route('admin.orders.status', $order->id) }}" method="POST">

            @csrf

            <div class="row align-items-end">

                <div class="col-md-8">

                    <label class="fw-bold mb-2">

                        Current Status

                    </label>

                    <select name="status" class="form-select rounded-3">

                        <option value="pending"
                            {{ $order->status=='pending' ? 'selected' : '' }}>

                            Pending

                        </option>

                        <option value="processing"
                            {{ $order->status=='processing' ? 'selected' : '' }}>

                            Processing

                        </option>

                        <option value="completed"
                            {{ $order->status=='completed' ? 'selected' : '' }}>

                            Completed

                        </option>

                        <option value="cancelled"
                            {{ $order->status=='cancelled' ? 'selected' : '' }}>

                            Cancelled

                        </option>

                    </select>

                </div>

                <div class="col-md-4">

                    <button type="submit"
                        class="btn text-white w-100 rounded-pill"
                        style="background:#008186;">

                        <i class="bi bi-check-circle me-2"></i>

                        Update Status

                    </button>

                </div>

            </div>

        </form>

    </div>

</div>