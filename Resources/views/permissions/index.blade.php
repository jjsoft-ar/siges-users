@extends('sigesui::layouts.withsidebar')
@section('pageTitle')
    {{isset($pageTitle) ? $pageTitle : "Permisos"}}
@endsection
@section('styles')

@endsection
@section('content-header')
    <h2><i class="fa fa-users"></i> Permisos
    <small>Admintración de permisos del sistema, piense en permisos como acciones de usuarios en el sistema.</small></h2>
@endsection

@section('content')

    <div class="box-tools pull-right">
        @if(Auth::user()->can('create-permission'))
            <a href="{{route('permissions.create')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Crear permiso</a>
        @endif
    </div>

    {!! $html->table() !!}

@endsection
@section('scripts')
    {!! $html->scripts() !!}
@endsection