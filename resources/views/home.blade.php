@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-start">
        <div class="col-md-12">
            <!-- <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div> -->

                <!-- <div class="card-body"> -->
                <div class="card-header">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('ログインしています。') }}
                </div>
            <!-- </div> -->
            <main-vue></main-vue>
        </div>
    </div>
</div>
@endsection
