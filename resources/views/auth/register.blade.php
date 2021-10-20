
@extends('layouts.app')
@section('content')

<link rel="stylesheet" href="{{URL::asset('user/css/CreateAccount.css')}}">

<div class="x-body">
    <img src="{{URL::asset('user/img/logo.png')}}" height="110" style="display: block; margin: 5px auto;" alt="">

    <h3>Add your password</h3>
    <hr>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <input id="id" type="hidden" name="id" value="{{ $user->id }}" required>
        <div class="row">
            <div class="col-md-12">
                <div class="row form-group">
                    <label class="col-sm-12 col-form-label" for="name">Welcome Mr. {{$user->name}} ,please add your password to complete the registration</label>
                    
                </div>

                
                <div class="row form-group">
                    <label class="col-sm-4 col-form-label" for="name">E-Mail Address</label>
                    <div class="col-sm-4">
                        <input type="email" name="email" value="{{ $user->email }} " readonly="true" class="input1" required>
                        
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 col-form-label" for="name">Password </label>
                    <div class="col-sm-4">
                        <input type="password" id="name" class="input1" name="password" required autofocus>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 col-form-label" for="name">Confirm password</label>
                    <div class="col-sm-4">
                        <input type="password" id="name" class="input1" name="password_confirmation" required autofocus>
                        @if ($errors->has('password_confirmation'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

               

            </div>

            
        </div>
        <button type="submit" class="submit-btn mbtn5 block-center">
            {{ __('Confirm') }}
        </button>
    </form>

</div>
@push('page_scripts')
<script src="{{URL::asset('user/js/CreateAccount.js')}}"></script>
@endpush
@endsection














{{-- aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
    aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa --}}
{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <input id="id" type="hidden" name="id" value="{{ $user->id }}" required>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                <input id="fname" type="text" class="form-control{{ $errors->has('fname') ? ' is-invalid' : '' }}" name="fname" value="{{ old('fname') }}" required autofocus>

                                @if ($errors->has('fname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('fname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                            <div class="col-md-6">
                                <input id="lname" type="text" class="form-control{{ $errors->has('lname') ? ' is-invalid' : '' }}" name="lname" value="{{ old('lname') }}" required autofocus>

                                @if ($errors->has('lname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }} " readonly="true" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
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
@endsection --}}
