@extends('sigesui::layouts.withsidebar')
@section('pageTitle')
    {{isset($pageTitle) ? $pageTitle : "Configuración"}}
@endsection
@section('styles')

@endsection
@section('content-header-title')
    {{isset($pageTitle) ? $pageTitle : "Configuración"}}
@endsection
@section('content-header')
    <h2><i class="fa fa-users"></i> Listado Configuraciones</h2>
@endsection
@section('styles')

@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">

                <div class="box-header with-border">
                    <h3 class="box-title">Configuración del módulo de usuarios</h3>
                </div>
                <div class="box-body">
                    @if(Auth::user()->ability('administrador-del-sistema', 'user-configuration'))
                        <a href="{{ route('users.config') }}" class="btn btn-app">
                            <i class="fa fa-users"></i> Campos de perfil
                        </a>
                    @endif
                    @if(Auth::user()->ability('administrador-del-sistema', 'create-role,edit-role,delete-role,admin-permissions'))
                        <a href="{{ route('roles.index') }}" class="btn btn-app">
                            <i class="fa fa-key"></i> Roles
                        </a>
                    @endif
                    @if(Auth::user()->ability('administrador-del-sistema', 'create-permission,edit-permission,delete-permission'))
                        <a href="{{ route('permissions.index') }}" class="btn btn-app">
                            <i class="fa fa-key"></i> Permisos
                        </a>
                    @endif
                </div>

        </div>
    </div>
@endsection