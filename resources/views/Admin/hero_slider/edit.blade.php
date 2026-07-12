@extends('Layouts.Adminlayouts')

@section('content')

<div class="container-fluid py-4">

    <div class="card shadow">

        <div class="card-header d-flex justify-content-between align-items-center">

            <h3>Edit Hero Slider</h3>

            <a href="/admin/hero-slider" class="btn btn-secondary">
                Back
            </a>

        </div>

        <div class="card-body">

            <form action="/admin/hero-slider/update/{{ $slider->id }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                {{-- TITLE --}}
                <div class="mb-3">
                    <label class="form-label">Slider Title</label>

                    <input type="text"
                           name="title"
                           class="form-control"
                           value="{{ old('title', $slider->title) }}">

                    @error('title')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- DESCRIPTION --}}
                <div class="mb-3">
                    <label class="form-label">Description</label>

                    <textarea name="description"
                              class="form-control"
                              rows="5">{{ old('description', $slider->description) }}</textarea>

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
                                   value="{{ old('button_text', $slider->button_text) }}">

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
                                   value="{{ old('button_link', $slider->button_link) }}">

                            @error('button_link')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                </div>

                {{-- CURRENT IMAGE --}}
                <div class="mb-3">
                    <label class="form-label">Current Image</label><br>

                    <img src="{{ asset('uploads/hero_slider/' . $slider->image) }}"
                         width="200"
                         class="img-thumbnail">

                </div>

                {{-- NEW IMAGE --}}
                <div class="mb-3">
                    <label class="form-label">Change Image</label>

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

                        <option value="1" {{ $slider->status == 1 ? 'selected' : '' }}>
                            Active
                        </option>

                        <option value="0" {{ $slider->status == 0 ? 'selected' : '' }}>
                            Inactive
                        </option>

                    </select>

                    @error('status')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- SUBMIT --}}
                <button type="submit" class="btn btn-primary" id="submitBtn">

                    <span class="spinner-border spinner-border-sm d-none" id="spinner"></span>

                    Save Changes

                </button>

            </form>

        </div>

    </div>

</div>

@endsection