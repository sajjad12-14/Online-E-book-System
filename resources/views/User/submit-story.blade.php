@extends('Layouts.Userslayouts')

@section('content')
    <div class="container py-5">


        <div class="text-center mb-5">

            <h1 class="fw-bold">
                Submit Your Story
            </h1>

            <p class="text-muted">
                Participate in {{ $competition->title }}
            </p>

        </div>



        @if (session('success'))
            <div class="alert alert-success">

                {{ session('success') }}

            </div>
        @endif





        <div class="card shadow border-0">


            <div class="card-body p-4">



                <form action="{{ route('competition.submit.store') }}" method="POST" enctype="multipart/form-data">


                    @csrf



                    <input type="hidden" name="competition_id" value="{{ $competition->id }}">





                    <div class="mb-3">

                        <label class="form-label">
                            Your Name
                        </label>


                        <input type="text" name="name" class="form-control" placeholder="Enter your name" required>

                    </div>






                    <div class="mb-3">

                        <label class="form-label">
                            Email
                        </label>


                        <input type="email" name="email" class="form-control" placeholder="Enter email" required>

                    </div>






                    <div class="mb-3">

                        <label class="form-label">
                            Profile Picture
                        </label>


                        <input type="file" name="image" class="form-control" accept="image/*">


                        <small class="text-muted">
                            Upload your profile image (JPG, PNG)
                        </small>

                    </div>







                    <div class="mb-3">

                        <label class="form-label">
                            Story Title
                        </label>


                        <input type="text" name="title" class="form-control" placeholder="Story title" required>

                    </div>






                    <div class="mb-3">

                        <label class="form-label">
                            Story Description
                        </label>


                        <textarea name="description" class="form-control" rows="6" placeholder="Write your story details" required></textarea>

                    </div>







                    <div class="mb-3">

                        <label class="form-label">
                            Upload Story (PDF/DOC)
                        </label>


                        <input type="file" name="file" class="form-control">


                        <small class="text-muted">
                            Allowed: PDF, DOC, DOCX (Max 5MB)
                        </small>

                    </div>







                    <button type="submit" class="btn btn-dark rounded-pill px-5">

                        Submit Story

                    </button>



                </form>


            </div>


        </div>


    </div>
@endsection
