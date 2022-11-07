@extends('core::layouts.master')

@section('content')
    @if (session()->has('successMessage'))
        <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>×</span>
                </button>
                {{ session()->get('successMessage') }}
            </div>
        </div>
    @endif

    <h2 class="section-title">
        Hi, {{ auth()->user()->first_name }}!</h2>
    <p class="section-lead">
        Change information about yourself on this page.
    </p>

    <div class="row mt-sm-4">
        <div class="col-12 col-md-12 col-lg-5">
            <div class="card profile-widget">
                <div class="profile-widget-header">
                    <img alt="image"
                        src="{{ Avatar::create(auth()->user()->first_name . ' ' . auth()->user()->last_name)->toBase64() }}"
                        class="rounded-circle profile-widget-picture">
                    <div class="profile-widget-items">
                        <div class="profile-widget-item">
                            <div class="profile-widget-item-label">Servers</div>
                            <div class="profile-widget-item-value">187</div>
                        </div>
                        <div class="profile-widget-item">
                            <div class="profile-widget-item-label">Users</div>
                            <div class="profile-widget-item-value">6,8K</div>
                        </div>
                    </div>
                </div>
                <div class="profile-widget-description">
                    <div class="profile-widget-name">{{ auth()->user()->first_name }}<div
                            class="text-muted d-inline font-weight-normal">
                            <div class="slash"></div> Permission Role
                        </div>
                    </div>
                    <div class="my-3">
                        <b>System Time: </b> {{ \Carbon\Carbon::now()->format('H:i:s') }} <br>
                        <b>System Date: </b> {{ \Carbon\Carbon::now()->isoFormat('MMMM Do YYYY') }} <br>
                        <b>System Time Zone: </b> {{ \Carbon\Carbon::now()->format('e') }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-12 col-lg-7">
            <div class="card">
                <form method="post" action="{{ route('user.update', auth()->user()->id) }}" class="needs-validation"
                    novalidate="">
                    @csrf
                    @method('PATCH')
                    <div class="card-header">
                        <h4>Edit Profile</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label>First Name</label>
                                <input id="first_name" name="first_name" type="text" class="form-control"
                                    value="{{ old('first_name') ? old('first_name') : auth()->user()->first_name }}"
                                    required="true">
                                @error('first_name')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6 col-12">
                                <label>Last Name</label>
                                <input id="last_name" name="last_name" type="text" class="form-control"
                                    value="{{ old('last_name') ? old('last_name') : auth()->user()->last_name }}">
                                @error('last_name')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-8 col-12">
                                <label>Username</label>
                                <input id="username" name="username" type="text" class="form-control"
                                    value="{{ old('username') ? old('username') : auth()->user()->username }}">
                                @error('username')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-10 col-12">
                                <label>Email</label>
                                <input id="email" name="email" type="text" class="form-control"
                                    value="{{ old('email') ? old('email') : auth()->user()->email }}">
                                @error('email')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>
                        <div class="row">
                            <div class="form-group col-md-5 col-12">
                                <label>New Password</label>
                                <input name="password" type="password" class="form-control" value="">
                                @error('password')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-5 col-12">
                                <label>Confirm Password</label>
                                <input name="password_confirmation" type="password" class="form-control" value="">

                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-5 col-12">
                                <label>Old Password</label>
                                <input name="old_password" type="password" class="form-control" value="">
                                @error('old_password')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
