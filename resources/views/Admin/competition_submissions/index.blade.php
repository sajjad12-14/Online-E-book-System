@extends('Layouts.Adminlayouts')

@section('content')
    <div class="container-fluid py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <h3 class="fw-bold">
                Competition Submissions
            </h3>

        </div>


        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif



        <div class="card shadow border-0">

            <div class="card-body">


                <div class="table-responsive">


                    <table class="table table-bordered align-middle">


                        <thead class="table-dark">

                            <tr>

                                <th>#</th>

                                <th>Name</th>

                                <th>Email</th>

                                <th>Competition</th>

                                <th>Story Title</th>

                                <th>Status</th>

                                <th>Winner</th>

                                <th>Action</th>

                            </tr>

                        </thead>



                        <tbody>


                            @forelse($submissions as $submission)
                                <tr>


                                    <td>
                                        {{ $loop->iteration }}
                                    </td>


                                    <td>
                                        {{ $submission->name }}
                                    </td>


                                    <td>
                                        {{ $submission->email }}
                                    </td>


                                    <td>
                                        {{ $submission->competition->title ?? 'N/A' }}
                                    </td>


                                    <td>
                                        {{ $submission->title }}
                                    </td>



                                    <td>

                                        @if ($submission->status == 'approved')
                                            <span class="badge bg-success">
                                                Approved
                                            </span>
                                        @elseif($submission->status == 'rejected')
                                            <span class="badge bg-danger">
                                                Rejected
                                            </span>
                                        @else
                                            <span class="badge bg-warning text-dark">
                                                Pending
                                            </span>
                                        @endif

                                    </td>




                                    <td>

                                        @if ($submission->is_winner)
                                            <span class="badge bg-success">
                                                {{ $submission->winner_position }} Position Winner
                                            </span>
                                        @else
                                            <span class="badge bg-secondary">
                                                Not Winner
                                            </span>
                                        @endif

                                    </td>





                                    <td>


                                        <form action="{{ route('admin.competition.submissions.winner', $submission->id) }}"
                                            method="POST" class="mb-2">

                                            @csrf


                                            <div class="d-flex gap-2">


                                                <select name="winner_position" class="form-select form-select-sm">


                                                    <option value="1"
                                                        {{ $submission->winner_position == 1 ? 'selected' : '' }}>
                                                        1st Position
                                                    </option>


                                                    <option value="2"
                                                        {{ $submission->winner_position == 2 ? 'selected' : '' }}>
                                                        2nd Position
                                                    </option>


                                                    <option value="3"
                                                        {{ $submission->winner_position == 3 ? 'selected' : '' }}>
                                                        3rd Position
                                                    </option>


                                                </select>



                                                <button type="submit" class="btn btn-sm btn-success">

                                                    Winner

                                                </button>


                                            </div>


                                        </form>




                                        <a href="{{ route('admin.competition.submissions.show', $submission->id) }}"
                                            class="btn btn-sm btn-primary">

                                            View

                                        </a>



                                        <a href="{{ route('admin.competition.submissions.delete', $submission->id) }}"
                                            class="btn btn-sm btn-danger"
                                            onclick="return confirm('Delete this submission?')">

                                            Delete

                                        </a>


                                    </td>



                                </tr>


                            @empty


                                <tr>

                                    <td colspan="8" class="text-center">

                                        No Submissions Found

                                    </td>

                                </tr>
                            @endforelse



                        </tbody>


                    </table>


                </div>



                {{ $submissions->links() }}



            </div>


        </div>


    </div>
@endsection
