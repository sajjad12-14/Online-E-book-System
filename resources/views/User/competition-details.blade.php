@extends('Layouts.Userslayouts')

@section('content')
    <div class="container py-5">


        <div class="row">


            <div class="col-md-5">

                <img src="{{ asset('uploads/competitions/' . $competition->image) }}" class="img-fluid rounded shadow">


            </div>



            <div class="col-md-7">


                <h1 class="fw-bold">

                    {{ $competition->title }}

                </h1>


                <h5 class="mt-4">

                    Prize:

                    <span class="text-success">

                        {{ $competition->prize }}

                    </span>

                </h5>



                <p class="mt-3">

                    {{ $competition->description }}

                </p>



                <h4 class="mt-4">

                    Rules

                </h4>


                <p>

                    {{ $competition->rules }}

                </p>



                <div class="mt-4">

                    <a href="{{ route('competition.submit', $competition->slug) }}"
                        class="btn btn-success rounded-pill px-5">

                        Join Competition

                    </a>

                </div>



            </div>


        </div>


    </div>
@endsection
