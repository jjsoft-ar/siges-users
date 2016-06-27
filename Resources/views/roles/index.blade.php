@extends('sigesui::layouts.withsidebar')
@section('pageTitle')
    {{isset($pageTitle) ? $pageTitle : "Roles"}}
@endsection
@section('styles')

@endsection
@section('content-header')
    <h2><i class="fa fa-users"></i> Roles
        <small>Admintración de roles del sistema, piense en roles como grupos de usuarios con capacidades esfecificas para realizar acciones en el sistema.</small></h2>
@endsection

@section('content')
    <div class="box-tools pull-right">
        @if(Auth::user()->can('create-role'))
            <a href="{{route('roles.create')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Crear rol</a>
        @endif
    </div>
    {!! $html->table() !!}

@endsection
@section('scripts')
    {!! $html->scripts() !!}
@endsection