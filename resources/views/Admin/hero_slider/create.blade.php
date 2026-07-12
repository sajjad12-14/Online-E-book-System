@extends('Layouts.Adminlayouts')

@section('content')

<div class="container-fluid py-4">

    <div class="card shadow border-0">

        <div class="card-header d-flex justify-content-between align-items-center">

            <h3 class="mb-0">Add Hero Slider</h3>

            <a href="/admin/hero-slider" class="btn btn-secondary">
                Back
            </a>

        </div>

        <div class="card-body">

            <form action="/admin/hero-slider/store" method="POST" enctype="multipart/form-data">

                @csrf

                {{-- TITLE --}}
                <div class="mb-3">
                    <label class="form-label">Slider Title</label>

                    <input type="text"
                           name="title"
                           class="form-control"
                           value="{{ old('title') }}"
                           placeholder="Enter Slider Title">

                    @error('title')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- DESCRIPTION --}}
                <div class="mb-3">
                    <label class="form-label">Description</label>

                    <textarea name="description"
                              rows="5"
                              class="form-control"
                              placeholder="Enter Description">{{ old('description') }}</textarea>

                    @error('description')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="row">

                    {{-- BUTTON TEXT --}}
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Button Text</label>

                            <input type="text"
                                   name="button_text"
                                   class="form-control"
                                   value="{{ old('button_text') }}"
                                   placeholder="Explore Now">

                            @error('button_text')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    {{-- BUTTON LINK --}}
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Button Link</label>

                            <input type="text"
                                   name="button_link"
                                   class="form-control"
                                   value="{{ old('button_link') }}"
                                   placeholder="/books">

                            @error('button_link')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                </div>

                {{-- IMAGE --}}
                <div class="mb-3">
                    <label class="form-label">Slider Image</label>

                    <input type="file"
                           name="image"
                           class="form-control"
                           onchange="previewImage(event)">

                    @error('image')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- STATUS --}}
                <div class="mb-3">
                    <label class="form-label">Status</label>

                    <select name="status" class="form-select">

                        <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>
                            Active
                        </option>

                        <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>
                            Inactive
                        </option>

                    </select>

                    @error('status')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- SUBMIT --}}
                <button type="submit" class="btn btn-success">
                    Save Slider
                </button>

            </form>

        </div>

    </div>

</div>

@endsection