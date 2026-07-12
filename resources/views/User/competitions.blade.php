@extends('Layouts.Userslayouts')

@section('content')
    <div class="container py-5">

        <div class="text-center mb-5">

            <h1 class="fw-bold">
                Story Writing Competitions
            </h1>

            <p class="text-muted">
                Participate and show your writing talent
            </p>

        </div>


        <div class="row g-4">


            @forelse($competitions as $competition)
                <div class="col-md-4">


                    <div class="card shadow h-100 border-0">


                        <img src="{{ asset('uploads/competitions/' . $competition->image) }}" class="card-img-top"
                            height="220" style="object-fit:cover;">



                        <div class="card-body">


                            <h4 class="fw-bold">

                                {{ $competition->title }}

                            </h4>



                            <p class="text-muted">

                                {{ Str::limit($competition->description, 100) }}

                            </p>



                            <p>

                                <strong>Prize:</strong>

                                {{ $competition->prize }}

                            </p>



                            <p>

                                <strong>Start:</strong>

                                {{ $competition->start_date }}

                            </p>



                            <p>

                                <strong>End:</strong>

                                {{ $competition->end_date }}

                            </p>



                            <a href="{{ route('competition.details', $competition->slug) }}"
                                class="btn btn-dark rounded-pill px-4">

                                View Details

                            </a>


                        </div>


                    </div>


                </div>


            @empty


                <div class="text-center">

                    <h4>
                        No Competition Available
                    </h4>

                </div>
            @endforelse


        </div>


    </div>
@endsection
