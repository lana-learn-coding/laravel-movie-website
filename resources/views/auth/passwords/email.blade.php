@extends('layouts.app')

@section('content')
    <v-container
        class="fill-height"
        fluid
    >
        <v-row justify="center">
            <v-col xl="4" lg="5" md="6" sm="9" cols="11">
                <v-card>
                    <v-card-title>Reset Password</v-card-title>
                    <v-card-text>
                        @if (session('status'))
                            <v-alert type="success">
                                {{ session('status') }}
                            </v-alert>
                        @endif
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <v-text-field
                                label="E-Mail Address"
                                name="email"
                                type="email"
                                value="{{ old('email') }}"
                                autofocus
                                required
                                @error('email')
                                error
                                error-messages="{{ $message }}"
                                @enderror
                            >
                            </v-text-field>
                            <v-btn type="submit" class="mt-3" color="indigo darken-2">Send Password Reset Link</v-btn>
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
                    <div class="card-header">{{ __('Reset Password') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Send Password Reset Link') }}
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
