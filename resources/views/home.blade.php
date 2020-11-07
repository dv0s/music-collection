@extends('layouts.app')

@section('head-nav')
	@include('layouts.partials.head-nav')
@endsection

@section('main')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <div class="w-5 h-6 bg-red-100"></div>
                    <div class="w-5 h-6 bg-red-200"></div>
                    <div class="w-5 h-6 bg-red-300"></div>
                    <div class="w-5 h-6 bg-red-400"></div>
                    <div class="w-5 h-6 bg-red-500"></div>
                    <div class="w-5 h-6 bg-red-600"></div>
                    <div class="w-5 h-6 bg-red-700"></div>
                    <div class="w-5 h-6 bg-red-800"></div>
                    <div class="w-5 h-6 bg-red-900"></div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
