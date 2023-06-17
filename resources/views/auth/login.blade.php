@extends('Template.head')

@section('main_content')

@include('Partials.navbar')

<section class="gradient-custom">
    @if (session()->has('success'))
    <div class="d-flex justify-content-center">
        <div class="alert alert-success alert-dismissible fade show w-25" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    @endif

    @if (session()->has('error'))
    <div class="d-flex justify-content-center">
        <div class="alert alert-danger alert-dismissible fade show w-25" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    @endif

    <div class="container py-5">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <h2 class="fw-bold mb-2 text-uppercase mb-5">Masuk</h2>

                        <form action="/login" method="POST">
                            @csrf
                        <div class="form-outline form-white mb-4">
                            <label class="form-label" for="typeEmailX">Email</label>
                                <input type="email" name="email" id="typeEmailX" class="form-control form-control-lg @error('email') is-invalid @enderror" value="{{ old('email') }}" required/>
                                @error('email')
                                    <div id="validationServerUsernameFeedback" class=" invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                        </div>

                        <div class="form-outline form-white mb-5">
                            <label class="form-label" for="typePasswordX">Password</label>
                                <input type="password" name="password" id="typePasswordX" class="form-control form-control-lg" required/>
                                @error('password')
                                    <div id="validationServerUsernameFeedback" class=" invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                        </div>

                            <button class="btn btn-outline-light btn-lg px-5 mb-4" type="submit">Login</button>
                        </form>

                        <div>
                            <p class="mb-0">Don't have an account? <a href="register" class="text-white-50 fw-bold">Sign Up</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('Partials.footer')

@endsection
