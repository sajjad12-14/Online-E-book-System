@extends('Layouts.Adminlayouts')

@section('content')
    <div class="container-fluid py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <h3 class="fw-bold">
                Contact Messages
            </h3>

        </div>

        @if (session('success'))
            <div class="alert alert-success">

                {{ session('success') }}

            </div>
        @endif

        <div class="card shadow border-0">

            <div class="card-body">

                <form method="GET" class="row mb-4">

                    <div class="col-md-4">

                        <input type="text" name="search" class="form-control" placeholder="Search Name, Email or Subject"
                            value="{{ $search }}">

                    </div>

                    <div class="col-md-2">

                        <button class="btn btn-dark w-100">

                            Search

                        </button>

                    </div>

                </form>

                <div class="table-responsive">

                    <table class="table table-bordered align-middle">

                        <thead class="table-dark">

                            <tr>

                                <th>#</th>

                                <th>Name</th>

                                <th>Email</th>

                                <th>Subject</th>

                                <th>Status</th>

                                <th>Action</th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse($contacts as $contact)
                                <tr>

                                    <td>

                                        {{ $loop->iteration }}

                                    </td>

                                    <td>

                                        {{ $contact->full_name }}

                                    </td>

                                    <td>

                                        {{ $contact->email }}

                                    </td>

                                    <td>

                                        {{ $contact->subject }}

                                    </td>

                                    <td>

                                        @if ($contact->status)
                                            <span class="badge bg-success">

                                                Read

                                            </span>
                                        @else
                                            <span class="badge bg-warning text-dark">

                                                Unread

                                            </span>
                                        @endif

                                    </td>

                                    <td>

                                        <a href="{{ route('admin.contacts.show', $contact->id) }}"
                                            class="btn btn-sm btn-primary">

                                            View

                                        </a>

                                        <a href="{{ route('admin.contacts.delete', $contact->id) }}"
                                            class="btn btn-sm btn-danger" onclick="return confirm('Delete this message?')">

                                            Delete

                                        </a>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="6" class="text-center">

                                        No Messages Found

                                    </td>

                                </tr>
                            @endforelse

                        </tbody>

                    </table>

                </div>

                {{ $contacts->links() }}

            </div>

        </div>

    </div>
@endsection
