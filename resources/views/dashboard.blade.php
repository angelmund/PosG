{{-- -- 
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Bienvenido') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout> ---- --}}

@extends('layouts.Master')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="text-center"> <b>Punto de venta </b></h1>
@stop

@section('content')


    {{--  <div class="row">
        <!-- card usuarios -->
        <div class="card">
            <div class="icon"><i class="material-icons md-36">person</i></div>
            <p class="title">Usuarios</p>
            <a href="{{ route('admin.index') }}">
                <p class="text">Haga click para ver más</p>
            </a>
        </div>
        <!-- end card  card usuarios-->
        <!-- card  inventario-->
        <div class="card">
            <div class="icon"><i class="material-icons md-36">store</i></div>
            <p class="title">Inventario</p>
            <a href="#">
                <p class="text">Haga click para ver más</p>
            </a>
        </div>
        <!-- end card inventario-->

        <!-- card realizar venta-->
        <div class="card">
            <div class="icon"><i class="material-icons md-36">add_shopping_cart</i></div>
            <p class="title">Realizar venta</p>
            <a href="#">
                <p class="text">Realizar una nueva venta</p>
            </a>
        </div>
        <!-- end card realizar venta-->
    </div>  --}}

    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Usuarios</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Usuarios con accesso</div>
                            <div class="text-center">
                                <a href="{{route('admin.index')}}">Ver m&aacute;s</a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Ventas</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Cantidada de ventas</div>
                            <div class="text-center">
                                <a href="#">Nueva venta</a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Inventario
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Inventario general</div>
                                    
                                </div>
                                
                                {{--  <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%"
                                            aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>  --}}
                            </div>
                            <div class="text-center">
                                <a href="#">Ver inventario</a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-info"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Pending Requests</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-warning"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

@stop

@section('css')
    {{--  <link rel="stylesheet" href="{{asset('Master/css/cards.css')}}">  --}}
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
    <!-- Incluye FontAwesome (para los iconos) -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script>
        Swal.fire('SweetAlert2 is working!')
    </script>

@stop
