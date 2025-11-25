{{--  @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
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
@endsection  --}}


@extends('layouts.app')

@section('content')
    <style>
        body {
            background: #f5f5f5;
        }

        .register-card {
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0px 6px 20px rgba(0, 0, 0, 0.12);
            padding: 25px 30px;
            position: relative;
        }

        .logo-left {
            width: 80px;
            position: absolute;
            top: -28px;
            left: -22px;
        }

        .logo-right {
            width: 80px;
            position: absolute;
            top: -28px;
            right: -22px;
        }

        .form-control {
            border-radius: 8px;
        }

        .card-header {
            font-size: 20px;
            font-weight: 600;
            text-align: center;
            border-bottom: none;
            margin-bottom: 10px;
            color: #4C4C4C;
        }

        .btn-primary {
            width: 100%;
            border-radius: 30px;
            padding: 10px;
            background: #5A3279;
            border: none;
            font-size: 16px;
            font-weight: 500;
        }

        .btn-primary:hover {
            background: #472660;
        }

        .card-header {
            background-color: #ffffff;
            border-bottom: 2px solid #eee;
            padding: 15px 20px;
            position: relative;
        }

        .header-title {
            font-size: 18px;
            font-weight: 600;
            color: #4C4C4C;
        }

        .header-logo {
            width: 60px;
            height: auto;
            object-fit: contain;
        }

        @media(max-width: 576px) {
            .card-header {
                flex-direction: column;
                text-align: center;
                gap: 6px;
            }

            .header-logo {
                width: 50px;
            }
        }
    </style>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="register-card" style="margin-top:-5%;">

                    {{--  <div class="card-header">
                        <div>Exhibition Visitor Registration</div>
                        <!-- Left Logo -->
                        <img src="{{ asset('stallmaillogo.png') }}" class="logo-left" alt="Left Logo">

                        <!-- Right Logo -->
                        <img src="{{ asset('sublogo.png') }}" class="logo-right" alt="Right Logo">
                    </div>  --}}
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <!-- Left Logo -->
                        <img src="{{ asset('stallmaillogo.png') }}" class="header-logo" alt="Left Logo" style="width:150px;">



                        <!-- Right Logo -->
                        <img src="{{ asset('sublogo.png') }}" class="header-logo" alt="Right Logo" style="width:110px;">
                    </div>


                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="text-center mb-3">
                            <span class="header-title text-center" style="color:#393185;">Exhibition Visitor
                                Registration</span>
                        </div>

                        {{-- Full Name --}}
                        <div class="mb-3">
                            <label class="form-label"> Name</label>
                            <input type="text" name="name" placeholder="Enter your name"
                                class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                required>
                        </div>

                        {{-- Company Name --}}
                        <div class="mb-3">
                            <label class="form-label">Company Name</label>
                            <input type="text" name="comp_name" placeholder="Enter company name"
                                class="form-control @error('comp_name') is-invalid @enderror"
                                value="{{ old('comp_name') }}">
                        </div>

                        {{-- Occupation --}}
                        <div class="mb-3">
                            <label class="form-label">Occupation</label>
                            <input type="text" name="occupation" placeholder="Enter your occupation"
                                class="form-control @error('occupation') is-invalid @enderror"
                                value="{{ old('occupation') }}">
                        </div>

                        {{-- Mobile --}}
                        <div class="mb-3">
                            <label class="form-label">Mobile No.</label>
                            <input type="text" name="phone" placeholder="Enter 10 digit mobile number"
                                class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}"
                                required>
                        </div>

                        {{-- Email --}}
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" placeholder="Enter email address"
                                class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                                required autocomplete="off">
                        </div>

                        {{-- City --}}
                        <div class="mb-3">
                            <label class="form-label">City</label>
                            <input type="text" name="city" placeholder="Enter city name"
                                class="form-control @error('city') is-invalid @enderror" value="{{ old('city') }}"
                                required>
                        </div>

                        <button type="submit" class="btn btn-primary">Register Now</button>

                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
