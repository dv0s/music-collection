@extends('layouts.gate')

@section('main')
<div class="h-screen flex items-center">
    <div class="max-w-sm mx-auto grid px-6 bg-gray-200">
        <div class="row-auto py-6">
            <h1 class="text-xl">{{ __('Login ' . config('app.name')) }}</h1>
        </div>

        <div class="row">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group row my-2">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="py-2 px-4 bg-white border border-gray-300 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row my-2">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="py-2 px-4 bg-white border border-gray-300 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                {{-- <div class="form-group row">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div> --}}

                <div class="form-group row mb-0">
                    <div class="py-6">
                        <button type="submit" class="bg-blue-600 font-bold py-2 px-4 text-white rounded w-full">
                            {{ __('Login') }}
                        </button>
                        
                        {{-- @if (Route::has('password.request'))
                            <a class="text-blue-400 underline hover:text-blue-500 pl-4" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif --}}
                    </div>
                </div>
            </form>
        </div>
                
    </div>
</div>
@endsection
