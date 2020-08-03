@extends('layouts.user')

@section('content.body.user')
    <div class="card mt-4 mb-5">
        <div class="card-body">
            <h4 class="card-title">Account</h4>
            <h6 class="card-subtitle mb-3 text-muted">Update your account info</h6>
            <hr>
            <form method="POST">
                @csrf
                <div class="form-row">
                    <div class="col-md-6">
                        @include('components.form.input-group', ['name' => 'username', 'value' => $user->username])
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control bg-secondary text-white" id="email"
                               value="{{ $user->email }}" readonly disabled>
                        <small class="form-text text-muted">You cannot change your email</small>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" data-toggle="collapse"
                               data-target="#change-password-collapse" name="change_password"
                            {{ old('change_password') ? 'checked' : ''}}>
                        <label class="form-check-label" for="name">Change password</label>
                    </div>
                </div>

                <div class="collapse {{ old('change_password') ? 'show' : '' }}"
                     id="change-password-collapse">
                    <div class="form-row">
                        <div class="col-md-6">
                            @include('components.form.input-group', ['name' => 'new_password', 'type' => 'password'])
                        </div>
                        <div class="col-md-6">
                            @include('components.form.input-group', ['name' => 'new_password_confirmation', 'type' => 'password'])
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-8">
                            @include('components.form.input-group', ['name' => 'password', 'type' => 'password'])
                        </div>
                    </div>
                </div>

                <hr class="border-secondary">

                <div class="form-row">
                    <div class="col-md-8">
                        @include('components.form.input-group', ['name' => 'name', 'value' => $user->detail ? $user->detail->name : ''])
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputPassword4">Gender</label>
                        <select class="form-control" id="gender" name="gender">
                            <option value="" {{ !($user->detail && $user->detail->gender) ?: 'selected' }}>None</option>
                            <option value="M" {{ ($user->detail && $user->detail->gender === 'M') ? 'selected' : '' }}>
                                Male
                            </option>
                            <option value="F" {{ ($user->detail && $user->detail->gender === 'F') ? 'selected' : '' }}>
                                Female
                            </option>
                        </select>
                    </div>
                </div>

                <hr>
                <div class="d-flex justify-content-end">
                    <button class="btn btn-success" type="submit">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
