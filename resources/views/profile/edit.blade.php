@extends('layouts.Master')

@section('title', 'Editar Perfil')

@section('content_header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-dark-200 leading-tight text-center">
        {{ __('Perfil') }}
    </h2>
@stop

@section('content')
    {{--  <div class="container-lg my-3">
    <div class="row">
        <div class="col-lg-6 mb-3">
            <div class="p-4 bg-primary rounded-lg">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>
        <div class="col-lg-6 mb-3">
            <div class="p-4 bg-success  shadow-lg rounded-lg">
                @include('profile.partials.update-password-form')
            </div>
        </div>
    </div>
</div>  --}}

<div class="row">
    <!-- Perfil Card Example -->
    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100">
            <div class="card-body">
                <i class="fas fa-user fa-2x text-primary-9000 float-end"></i>
                <div class="row no-gutters align-items-center">
                    <div class="col">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Password Card Example -->
    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100">
            <div class="card-body">
                <i class="fas fa-key fa-2x text-primary-300 float-end"></i>
                <div class="row no-gutters align-items-center">
                    <div class="col">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>






@stop

@section('css')
    {{--  <link rel="stylesheet" href="/css/admin_custom.css">  --}}
    <!-- Scripts -->
    {{--  @vite(['resources/css/app.css', 'resources/js/app.js'])  --}}
    <link href="{{ asset('Master/css/sb-admin-2.min.css') }}" rel="stylesheet">
@stop

@section('js')

@stop
