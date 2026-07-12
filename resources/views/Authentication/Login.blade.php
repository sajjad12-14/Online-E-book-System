@extends('Layouts.Userslayouts')

@section('title', 'Login')


@section('content')


    <section class="py-5" style="background:linear-gradient(120deg,#f8efe6,#e8d2bd);">


        <div class="container py-5">


            <div class="row justify-content-center align-items-center">


                <div class="col-xl-10">



                    <div class="row overflow-hidden rounded-5 shadow-lg bg-white">





                        <!-- LEFT LOGIN FORM -->

                        <div class="col-lg-6 p-5">



                            <div class="mb-4">


                                <h2 class="fw-bold" style="font-family:Georgia,serif;color:#3b2417;">

                                    BookVerse

                                </h2>


                            </div>




                            <h1 class="fw-bold mb-2" style="font-family:Georgia,serif;color:#3b2417;">


                                Welcome Back


                            </h1>



                            <p class="text-muted mb-5">

                                Login to continue your reading journey

                            </p>





                            <form method="POST" action="{{ route('login.check') }}">

                                @csrf


                                {{-- Error Message --}}

                                @if (session('error'))
                                    <div class="alert alert-danger rounded-4">

                                        {{ session('error') }}

                                    </div>
                                @endif



                                {{-- Validation Error --}}

                                @if ($errors->any())

                                    <div class="alert alert-danger rounded-4">

                                        <ul class="mb-0">

                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach

                                        </ul>

                                    </div>

                                @endif





                                <!-- EMAIL -->

                                <div class="form-floating mb-3">


                                    <input type="email" name="email" value="{{ old('email') }}"
                                        class="form-control rounded-4 border-0 shadow-sm" id="email"
                                        placeholder="Email">


                                    <label for="email">

                                        Email Address

                                    </label>


                                </div>








                                <!-- PASSWORD -->


                                <div class="form-floating mb-3">


                                    <input type="password" name="password" class="form-control rounded-4 border-0 shadow-sm"
                                        id="password" placeholder="Password">


                                    <label for="password">

                                        Password

                                    </label>


                                </div>







                                <div class="d-flex justify-content-between align-items-center mb-4">


                                    <div>


                                        <input type="checkbox" name="remember" class="form-check-input">


                                        <span class="small text-muted">

                                            Remember me

                                        </span>


                                    </div>





                                    <a href="#" class="small text-decoration-none" style="color:#8b5e3c;">

                                        Forgot Password?

                                    </a>



                                </div>








                                <button type="submit" class="btn w-100 py-3 rounded-pill fw-bold text-white shadow"
                                    style="background:#8b5e3c;">


                                    LOGIN


                                </button>








                                <div class="text-center my-4 text-muted">

                                    OR

                                </div>








                                <div class="row g-3">


                                    <div class="col-6">


                                        <button type="button" class="btn btn-light rounded-pill w-100 py-3 shadow-sm">


                                            <i class="bi bi-google"></i>

                                            Google


                                        </button>


                                    </div>







                                    <div class="col-6">


                                        <button type="button" class="btn btn-light rounded-pill w-100 py-3 shadow-sm">


                                             Apple


                                        </button>


                                    </div>



                                </div>







                                <div class="text-center mt-4">


                                    <span class="text-muted">

                                        Don't have an account?

                                    </span>



                                    <a href="{{ route('register') }}" class="fw-bold text-decoration-none"
                                        style="color:#8b5e3c;">


                                        Register


                                    </a>



                                </div>



                            </form>


                        </div>









                        <!-- RIGHT IMAGE -->


                        <div class="col-lg-6 d-none d-lg-block position-relative p-0">



                            <img src="{{ asset('images/books.png') }}" class="w-100 h-100" style="object-fit:cover;">






                            <div class="position-absolute top-0 start-0 w-100 h-100"
                                style="
                                background:linear-gradient(
                                    rgba(0,0,0,.15),
                            rgba(0,0,0,.60)
                                           );
                                   ">

                            </div>







                            <div class="position-absolute bottom-0 text-white p-5">



                                <h2 class="fw-bold" style="font-family:Georgia,serif;">


                                    Explore Amazing Stories


                                </h2>



                                <p>

                                    Thousands of books waiting for you.

                                </p>



                            </div>



                        </div>






                    </div>



                </div>


            </div>


        </div>


    </section>



@endsection
