@extends('core::layouts.master')

@section('content')
    <h2 class="section-title">Hi, {{ auth()->user()->first_name }}!</h2>
    <p class="section-lead">
        Change information about yourself on this page.
    </p>

    <div class="row mt-sm-4">
        <div class="col-12 col-md-12 col-lg-5">
            <div class="card profile-widget">
                <div class="profile-widget-header">
                    <img alt="image" src="/assets/img/avatar/avatar-1.png" class="rounded-circle profile-widget-picture">
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
                        <b>System Time: </b> {{ \Carbon\Carbon::now()->format('H:m') }} <br>
                        <b>System Date: </b> {{ \Carbon\Carbon::now()->isoFormat('MMMM Do YYYY') }} <br>
                        <b>System Time Zone: </b> {{ \Carbon\Carbon::now()->format('e') }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-12 col-lg-7">
            <div class="card">
                <form method="post" class="needs-validation" novalidate="">
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
                                <div class="invalid-feedback">
                                    Please fill in the first name
                                </div>
                            </div>

                            <div class="form-group col-md-6 col-12">
                                <label>Last Name</label>
                                <input id="last_name" name="last_name" type="text" class="form-control"
                                    value="{{ old('last_name') ? old('last_name') : auth()->user()->last_name }}">
                                <div class="invalid-feedback">
                                    Please fill in the last name
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-8 col-12">
                                <label>Username</label>
                                <input id="username" name="username" type="text" class="form-control"
                                    value="{{ old('username') ? old('username') : auth()->user()->username }}">
                                <div class="invalid-feedback">
                                    Please fill in the username
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-10 col-12">
                                <label>Email</label>
                                <input id="email" name="email" type="text" class="form-control"
                                    value="{{ old('email') ? old('email') : auth()->user()->email }}">
                                <div class="invalid-feedback">
                                    Please fill in the email
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="form-group col-md-5 col-12">
                                <label>New Password</label>
                                <input type="tel" class="form-control" value="">
                            </div>
                            <div class="form-group col-md-5 col-12">
                                <label>Confirm Password</label>
                                <input type="tel" class="form-control" value="">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-5 col-12">
                                <label>Old Password</label>
                                <input type="tel" class="form-control" value="">
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
