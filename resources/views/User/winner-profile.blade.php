@extends('Layouts.Userslayouts')

@section('content')
    <div class="container py-5">

        <div class="row justify-content-center">

            <div class="col-lg-8">

                <div class="card shadow border-0 rounded-4">

                    <div class="card-body p-5 text-center">

                        {{-- Winner Image --}}
                        @if ($winner->image)
                            <img src="{{ asset('uploads/submissions/' . $winner->image) }}" class="rounded-circle shadow mb-4"
                                style="width:180px;height:180px;object-fit:cover;">
                        @else
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($winner->name) }}&size=200"
                                class="rounded-circle shadow mb-4">
                        @endif


                        {{-- Name --}}
                        <h2 class="fw-bold">

                            {{ $winner->name }}

                        </h2>


                        {{-- Winner Position --}}
                        <span class="badge bg-warning text-dark fs-6 px-4 py-2 mt-2">

                            @if ($winner->winner_position == 1)
                                🥇 1st Position
                            @elseif($winner->winner_position == 2)
                                🥈 2nd Position
                            @elseif($winner->winner_position == 3)
                                🥉 3rd Position
                            @endif

                        </span>


                        <hr class="my-4">


                        <div class="text-start">

                            <h5 class="fw-bold">

                                Competition

                            </h5>

                            <p>

                                {{ $winner->competition->title }}

                            </p>


                            <h5 class="fw-bold">

                                Story Title

                            </h5>

                            <p>

                                {{ $winner->title }}

                            </p>


                            <h5 class="fw-bold">

                                Story Description

                            </h5>

                            <p>

                                {{ $winner->description }}

                            </p>

                        </div>


                        @if ($winner->file)
                            <a href="{{ asset('uploads/submissions/' . $winner->file) }}" target="_blank"
                                class="btn btn-success rounded-pill px-4">

                                📄 Download Story

                            </a>
                        @endif


                        <a href="{{ url('/') }}" class="btn btn-dark rounded-pill px-4 ms-2">

                            Back to Home

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>
@endsection
