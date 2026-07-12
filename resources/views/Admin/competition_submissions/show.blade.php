@extends('Layouts.Adminlayouts')

@section('content')
    <div class="container-fluid py-4">


        <div class="d-flex justify-content-between align-items-center mb-4">

            <h3 class="fw-bold">
                Submission Details
            </h3>


            <a href="{{ route('admin.competition.submissions') }}" class="btn btn-secondary">

                Back

            </a>

        </div>




        <div class="card shadow border-0">

            <div class="card-body p-4">


                <div class="row">


                    <div class="col-md-6 mb-3">

                        <h6 class="fw-bold">
                            Name
                        </h6>

                        <p>
                            {{ $submission->name }}
                        </p>

                    </div>



                    <div class="col-md-6 mb-3">

                        <h6 class="fw-bold">
                            Email
                        </h6>

                        <p>
                            {{ $submission->email }}
                        </p>

                    </div>




                    <div class="col-md-6 mb-3">

                        <h6 class="fw-bold">
                            Competition
                        </h6>

                        <p>
                            {{ $submission->competition->title ?? 'N/A' }}
                        </p>

                    </div>




                    <div class="col-md-6 mb-3">

                        <h6 class="fw-bold">
                            Story Title
                        </h6>

                        <p>
                            {{ $submission->title }}
                        </p>

                    </div>



                    <div class="col-12 mb-3">

                        <h6 class="fw-bold">
                            Story Description
                        </h6>

                        <p>
                            {{ $submission->description }}
                        </p>

                    </div>



                    @if ($submission->file)
                        <div class="col-12 mb-3">

                            <h6 class="fw-bold">
                                Attached File
                            </h6>


                            <a href="{{ asset('uploads/submissions/' . $submission->file) }}" target="_blank"
                                class="btn btn-primary">

                                Open File

                            </a>

                        </div>
                    @endif




                    <div class="col-12">

                        <h6 class="fw-bold">
                            Update Status
                        </h6>


                        <form action="{{ route('admin.competition.submissions.status', $submission->id) }}" method="POST">

                            @csrf


                            <div class="d-flex gap-2">


                                <select name="status" class="form-select w-25">


                                    <option value="pending" {{ $submission->status == 'pending' ? 'selected' : '' }}>
                                        Pending
                                    </option>


                                    <option value="approved" {{ $submission->status == 'approved' ? 'selected' : '' }}>
                                        Approved
                                    </option>


                                    <option value="rejected" {{ $submission->status == 'rejected' ? 'selected' : '' }}>
                                        Rejected
                                    </option>


                                </select>



                                <button class="btn btn-success">

                                    Update

                                </button>


                            </div>


                        </form>


                    </div>


                </div>


            </div>

        </div>


    </div>
@endsection
