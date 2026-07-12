@extends('Layouts.Userslayouts')


@section('content')
    <section class="py-5">

        <div class="container text-center">


            <div class="card border-0 shadow rounded-4 p-5">


                <i class="bi bi-check-circle-fill display-1 text-success"></i>


                <h1 class="fw-bold mt-4">

                    Thank You!

                </h1>


                <p class="text-muted fs-5">

                    Your order has been placed successfully.

                </p>


                <a href="{{ url('/') }}" class="btn text-white rounded-pill px-5 mt-3" style="background:#008186;">


                    Continue Shopping


                </a>


            </div>


        </div>
        <div class="alert alert-info rounded-4 mt-4">

            <h5 class="fw-bold">

                Payment Method

            </h5>

            <p class="mb-0">

                Cash On Delivery

            </p>

            <hr>

            <p class="mb-0">

                Please keep the payment ready when your order arrives.

            </p>

        </div>

    </section>
@endsection
