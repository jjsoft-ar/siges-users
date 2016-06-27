@extends('sigesui::layouts.withsidebar')
@section('pageTitle')
    {{isset($pageTitle) ? $pageTitle : "Crear Permiso"}}
@endsection
@section('styles')

@endsection
@section('content-header')
    <h2><i class="fa fa-users"></i> Crear Permiso
    <small>Piense en un permiso como una accion de usuarios en el sistema.</small></h2>
@endsection

@section('content')

    {!! Form::open(['route' => 'permissions.store']) !!}
    <div class="box-body">
        <div class="row">
            <div class="col-md-6">
                {!! Field::text('name', ['label' => 'Permiso']) !!}
                {!! Field::text('display_name', ['label' => 'Nombre del permiso']) !!}
                {!! Field::text('description', ['label' => 'Descripción del permiso']) !!}
                {!! Field::select('modules[]', $modules, null, ['label' => 'Modulo', 'class' => 'select2']) !!}
            </div>
        </div>

    </div>
    <div class="box-footer">
        {!! Form::submit('Crear permiso', ['class' => 'btn btn-default submit']) !!}
    </div>
    {!! Form::close() !!}

@endsection
@section('scripts')

@endsection