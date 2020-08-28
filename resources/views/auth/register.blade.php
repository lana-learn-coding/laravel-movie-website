@extends('layouts.app')

@section('content')
    <v-container
        class="fill-height"
        fluid
    >
        <v-row justify="center">
            <v-col xl="4" lg="5" md="6" sm="9" cols="11">
                <v-card>
                    <v-card-title>Register</v-card-title>
                    <v-card-text>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <v-text-field
                                label="Username"
                                name="username"
                                type="text"
                                value="{{ old('username') }}"
                                autofocus
                                required
                                @error('username')
                                error
                                error-messages="{{ $message }}"
                                @enderror
                            >
                            </v-text-field>
                            <v-text-field
                                label="Email"
                                name="email"
                                type="email"
                                value="{{ old('email') }}"
                                required
                                @error('email')
                                error
                                error-messages="{{ $message }}"
                                @enderror
                            >
                            </v-text-field>
                            <v-text-field
                                label="Password"
                                name="password"
                                type="password"
                                value="{{ old('password') }}"
                                required
                                @error('password')
                                error
                                error-messages="{{ $message }}"
                                @enderror
                            >
                            </v-text-field>
                            <v-text-field
                                label="Confirm Password"
                                name="password_confirmation"
                                type="password"
                                required
                            >
                            </v-text-field>
                            <v-btn type="submit" color="indigo darken-2 mt-3">Register</v-btn>
                        </form>
                    </v-card-text>
                </v-card>
            </v-col>
        </v-row>
    </v-container>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
