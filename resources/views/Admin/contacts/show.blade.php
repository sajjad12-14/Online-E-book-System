@extends('Layouts.Adminlayouts')

@section('content')
    <div class="container-fluid py-4">

        <div class="mb-4">

            <h3 class="fw-bold">
                Contact Message Details
            </h3>

        </div>

        <div class="card shadow border-0">

            <div class="card-body p-4">

                <div class="row mb-3">

                    <div class="col-md-6">

                        <h6 class="fw-bold">
                            Full Name
                        </h6>

                        <p>
                            {{ $contact->full_name }}
                        </p>

                    </div>

                    <div class="col-md-6">

                        <h6 class="fw-bold">
                            Email
                        </h6>

                        <p>
                            {{ $contact->email }}
                        </p>

                    </div>

                </div>

                <div class="row mb-3">

                    <div class="col-md-6">

                        <h6 class="fw-bold">
                            Phone
                        </h6>

                        <p>
                            {{ $contact->phone }}
                        </p>

                    </div>

                    <div class="col-md-6">

                        <h6 class="fw-bold">
                            Subject
                        </h6>

                        <p>
                            {{ $contact->subject }}
                        </p>

                    </div>

                </div>

                <div class="mb-4">

                    <h6 class="fw-bold">
                        Message
                    </h6>

                    <div class="border rounded-3 p-3 bg-light">

                        {{ $contact->message }}

                    </div>

                </div>

                <div class="mb-4">

                    <h6 class="fw-bold">
                        Received On
                    </h6>

                    <p>
                        {{ $contact->created_at->format('d M Y - h:i A') }}
                    </p>

                </div>

                <a href="{{ route('admin.contacts') }}" class="btn btn-dark">

                    Back to Messages

                </a>

            </div>

        </div>

    </div>
@endsection
