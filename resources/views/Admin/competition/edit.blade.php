@extends('Layouts.Adminlayouts')

@section('content')
    <div class="container py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3>Edit Competition</h3>

            <a href="{{ route('admin.competitions') }}" class="btn btn-secondary">
                Back
            </a>
        </div>

        <form action="{{ route('admin.competitions.update', $competition->id) }}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="card shadow">

                <div class="card-body">

                    <div class="mb-3">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" value="{{ $competition->title }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label>Current Image</label><br>

                        <img src="{{ asset('uploads/competitions/' . $competition->image) }}" width="120" class="mb-2">

                        <input type="file" name="image" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Prize</label>
                        <input type="text" name="prize" class="form-control" value="{{ $competition->prize }}">
                    </div>

                    <div class="row">

                        <div class="col-md-6">
                            <label>Start Date</label>

                            <input type="date" name="start_date" class="form-control"
                                value="{{ $competition->start_date }}">
                        </div>

                        <div class="col-md-6">
                            <label>End Date</label>

                            <input type="date" name="end_date" class="form-control" value="{{ $competition->end_date }}">
                        </div>

                    </div>

                    <div class="mt-3">
                        <label>Description</label>

                        <textarea name="description" class="form-control" rows="5">{{ $competition->description }}</textarea>
                    </div>

                    <div class="mt-3">
                        <label>Rules</label>

                        <textarea name="rules" class="form-control" rows="5">{{ $competition->rules }}</textarea>
                    </div>

                </div>

                <div class="card-footer">

                    <button class="btn btn-success">
                        Update Competition
                    </button>

                </div>

            </div>

        </form>

    </div>
@endsection
