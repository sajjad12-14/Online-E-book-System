    @extends('Layouts.Userslayouts')

    @section('content')

        <!-- ========================================= -->
        <!-- Cart Hero -->
        <!-- ========================================= -->

        <section class="py-5 text-white" style="background:#008186;">

            <div class="container text-center">

                <h1 class="fw-bold display-5">

                    <i class="bi bi-cart3 me-2"></i>

                    Shopping Cart

                </h1>

                <p class="mb-0 mt-3">

                    Review your selected books before checkout.

                </p>

            </div>

        </section>

        <!-- ========================================= -->
        <!-- Shopping Cart -->
        <!-- ========================================= -->

        <section class="py-5" style="background:#F5F7FA;">

            <div class="container">

                @if ($cartItems->count())
                    <div class="row">

                        <!-- Left Side -->

                        <div class="col-lg-8">

                            @foreach ($cartItems as $item)
                                <div class="card border-0 shadow rounded-5 mb-4 overflow-hidden">

                                    <div class="card-body p-4">

                                        <div class="row align-items-center">


                                            <!-- Book Image -->

                                            <div class="col-md-3 text-center">

                                                <div class="bg-light rounded-4 p-3 position-relative">


                                                    <span class="badge rounded-pill position-absolute top-0 start-0 m-2"
                                                        style="background:#008186;">

                                                        {{ $item->book->category->name }}

                                                    </span>


                                                    <img src="{{ asset('uploads/books/' . $item->book->image) }}"
                                                        class="img-fluid rounded-4"
                                                        style="height:180px; object-fit:contain;">


                                                </div>


                                            </div>



                                            <!-- Book Details -->

                                            <div class="col-md-5 mt-4 mt-md-0">


                                                <h4 class="fw-bold">

                                                    {{ $item->book->title }}

                                                </h4>



                                                <p class="text-muted mb-2">

                                                    <i class="bi bi-person-fill me-2"></i>

                                                    {{ $item->book->author->name }}

                                                </p>



                                                <h4 class="fw-bold text-success">

                                                    Rs {{ number_format($item->price) }}

                                                </h4>



                                                <!-- Quantity -->

                                                <div class="mt-4">


                                                    <small class="text-secondary fw-bold">

                                                        Quantity

                                                    </small>



                                                    <div class="d-flex align-items-center mt-2">


                                                        <a href="{{ route('cart.decrease', $item->id) }}"
                                                            class="btn btn-outline-secondary rounded-circle">

                                                            <i class="bi bi-dash-lg"></i>

                                                        </a>



                                                        <span class="mx-3 px-4 py-2 rounded-3 bg-light fw-bold fs-5">

                                                            {{ $item->quantity }}

                                                        </span>



                                                        <a href="{{ route('cart.increase', $item->id) }}"
                                                            class="btn text-white rounded-circle"
                                                            style="background:#008186;">

                                                            <i class="bi bi-plus-lg"></i>

                                                        </a>


                                                    </div>


                                                </div>


                                            </div>




                                            <!-- Total -->


                                            <div class="col-md-4 text-center mt-4 mt-md-0">


                                                <div class="bg-light rounded-4 p-4">


                                                    <small class="text-muted">

                                                        Sub Total

                                                    </small>


                                                    <h3 class="fw-bold text-success mt-2">

                                                        Rs {{ number_format($item->price * $item->quantity) }}

                                                    </h3>


                                                </div>



                                                <a href="{{ route('cart.remove', $item->id) }}"
                                                    class="btn btn-danger rounded-pill px-4 mt-4">


                                                    <i class="bi bi-trash3-fill me-2"></i>

                                                    Remove


                                                </a>


                                            </div>


                                        </div>


                                    </div>


                                </div>
                            @endforeach


                        </div>

                        <!-- Right Side -->
                        <!-- Right Side -->

                        <div class="col-lg-4">

                            <div class="card border-0 shadow rounded-4   ">

                                <div class="card-body p-4">

                                    <h4 class="fw-bold mb-4">

                                        Order Summary

                                    </h4>

                                    <hr>

                                    <div class="d-flex justify-content-between mb-3">

                                        <span>

                                            Subtotal

                                        </span>

                                        <strong>

                                            Rs
                                            {{ number_format(
                                                $cartItems->sum(function ($item) {
                                                    return $item->price * $item->quantity;
                                                }),
                                            ) }}

                                        </strong>

                                    </div>

                                    <div class="d-flex justify-content-between mb-3">

                                        <span>

                                            Delivery

                                        </span>

                                        <strong class="text-success">

                                            Free

                                        </strong>

                                    </div>

                                    <div class="d-flex justify-content-between mb-3">

                                        <span>

                                            Discount

                                        </span>

                                        <strong class="text-danger">

                                            Rs 0

                                        </strong>

                                    </div>

                                    <hr>

                                    <div class="d-flex justify-content-between mb-4">

                                        <h5 class="fw-bold">

                                            Grand Total

                                        </h5>

                                        <h4 class="fw-bold text-success">

                                            Rs
                                            {{ number_format(
                                                $cartItems->sum(function ($item) {
                                                    return $item->price * $item->quantity;
                                                }),
                                            ) }}

                                        </h4>

                                    </div>

                                    <a href="{{ url('/') }}"
                                        class="btn btn-outline-secondary w-100 rounded-pill mb-3">

                                        <i class="bi bi-arrow-left me-2"></i>

                                        Continue Shopping

                                    </a>

                                    <a href="{{ route('checkout') }}" class="btn text-white w-100 rounded-pill"
                                        style="background:#008186;">

                                        <i class="bi bi-credit-card me-2"></i>

                                        Proceed To Checkout

                                    </a>
                                </div>

                            </div>

                        </div>

                    </div>
                @else
                    <!-- Empty Cart -->

                    <div class="row justify-content-center">

                        <div class="col-lg-6">

                            <div class="card border-0 shadow rounded-4">

                                <div class="card-body text-center py-5">

                                    <i class="bi bi-cart-x display-1 text-secondary"></i>

                                    <h2 class="fw-bold mt-4">

                                        Your Cart is Empty

                                    </h2>

                                    <p class="text-muted mt-3">

                                        Looks like you haven't added any books yet.

                                    </p>

                                    <a href="{{ url('/') }}" class="btn text-white px-5 rounded-pill mt-3"
                                        style="background:#008186;">

                                        <i class="bi bi-book me-2"></i>

                                        Continue Shopping

                                    </a>

                                </div>

                            </div>

                        </div>

                    </div>
                @endif

            </div>

        </section>

    @endsection
