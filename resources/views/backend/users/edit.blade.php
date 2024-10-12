@extends('backend.layouts.app')
@section('title', 'Users')

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">User Edit</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Users</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">
            <div class="row g-4">
                <div class="col-12">
                    <div class="callout callout-info">
                        For detailed documentation of Form visit
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card card-primary card-outline mb-4">
                        <div class="card-header">
                            <div class="card-title">User Edit Form</div>
                        </div>
                        <form method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data" class="needs-validation" novalidate>
                            @csrf

                            @method('patch')

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label for="fullName" class="form-label">Full Name</label>
                                            <input type="text" name="full_name" class="form-control @error('full_name') is-invalid @enderror" id="fullName" value="{{ $user->name ?? old('full_name') }}">
                                            @error('full_name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label for="phoneNumber" class="form-label">Phone Number</label>
                                            <input type="text" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" id="phoneNumber"
                                                value="{{ $user->phone_number ?? old('phone_number') }}">
                                            @error('phone_number')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label for="dob" class="form-label">Date of Birth</label>
                                            <input type="date" name="dob" class="form-control @error('dob') is-invalid @enderror" id="dob" value="{{ $user->dob ?? old('dob') }}">
                                            @error('dob')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email Address</label>
                                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ $user->email ?? old('email') }}">
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <div id="emailHelp" class="form-text">
                                                We'll never share your email with anyone else.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label for="userType" class="form-label">What You Are</label>
                                            <input type="text" name="user_type" class="form-control @error('user_type') is-invalid @enderror" id="userType" value="{{ $user->user_type ?? old('user_type') }}">
                                            @error('user_type')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password">
                                            @error('password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                                            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="userPicture" class="form-label">User Picture</label>
                                        <div class="input-group mb-3">
                                            <input type="file" name="user_picture" class="form-control @error('user_picture') is-invalid @enderror" id="userPicture">
                                            <label class="input-group-text" for="userPicture">Upload</label>
                                            @error('user_picture')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div>
                                            <img id="previewImage" width="210" src="{{ asset($user->user_picture) }}" alt="default.png">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>








@endsection
@push('styles')
    <style>

    </style>
@endpush

@push('scripts')
    <script type="module">
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (() => {
            "use strict";

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms =
                document.querySelectorAll(".needs-validation");

            // Loop over them and prevent submission
            Array.from(forms).forEach((form) => {
                form.addEventListener(
                    "submit",
                    (event) => {
                        if (!form.checkValidity()) {
                            event.preventDefault();
                            event.stopPropagation();
                        }

                        form.classList.add("was-validated");
                    },
                    false
                );
            });
        })();


        // Image preview function
        document.getElementById('userPicture').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const previewImage = document.getElementById('previewImage');

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImage.src = e.target.result; // Update the src with the file content
                }
                reader.readAsDataURL(file); // Read the file as Data URL
            }
        });


        // console.log(window.$);

        $(document).ready(function() {
            console.log('jQuery is working!');
        });
    </script>
@endpush
