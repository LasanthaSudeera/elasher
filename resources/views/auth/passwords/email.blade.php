@extends('auth.master')

@section('content')
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="login-brand">
                        <img src="{{ Avatar::create('E L')->toBase64() }}" alt="logo" width="100"
                            class="shadow-light rounded-circle">
                    </div>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Reset Password</h4>
                        </div>


                        <div class="card-body">

                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input value="{{ old('email') }}" id="email" type="email" class="form-control"
                                        name="email" tabindex="1" required autofocus>
                                    @error('email')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                        Reset
                                    </button>
                                </div>
                            </form>


                        </div>
                    </div>

                    <div class="simple-footer">
                        Copyright &copy; Elasher {{ \Carbon\Carbon::now()->year }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
