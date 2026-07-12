@extends('Layouts.Userslayouts')

@section('title', 'My Profile')

@section('content')

    <div class="container py-5">

        <div class="row justify-content-center">

            <div class="col-lg-8">

                @if (session('success'))
                    <div class="alert alert-success rounded-4">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="card border-0 shadow-lg rounded-5">

                    <div class="card-body p-5">

                        <div class="text-center mb-5">

                            @if ($user->image)
                                <img src="{{ asset('uploads/profile/' . $user->image) }}"
                                    class="rounded-circle border border-3 shadow" width="150" height="150"
                                    style="object-fit:cover;">
                            @else
                                <img src="{{ asset('images/default-user.png') }}"
                                    class="rounded-circle border border-3 shadow" width="150" height="150"
                                    style="object-fit:cover;">
                            @endif

                            <h3 class="fw-bold mt-4">
                                {{ $user->name }}
                            </h3>

                            <p class="text-muted">
                                {{ $user->email }}
                            </p>

                        </div>

                        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">

                            @csrf

                            <div class="mb-4">

                                <label class="form-label fw-bold">

                                    Profile Image

                                </label>

                                <input type="file" name="image" class="form-control rounded-4">

                            </div>
                            <div class="mb-4">

                                <label class="form-label fw-bold">
                                    Full Name
                                </label>

                                <input type="text" name="name" value="{{ old('name', $user->name) }}"
                                    class="form-control rounded-4" required>

                            </div>

                            <div class="mb-4">

                                <label class="form-label fw-bold">
                                    Email Address
                                </label>

                                <input type="email" name="email" value="{{ old('email', $user->email) }}"
                                    class="form-control rounded-4" required>

                            </div>

                            <div class="d-grid">

                                <button type="submit" class="btn text-white rounded-pill py-3 fw-bold"
                                    style="background:#8b5e3c;">

                                    <i class="bi bi-check-circle me-2"></i>

                                    Save Changes

                                </button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection
