@extends('sigesui::layouts.withsidebar')
@section('pageTitle')
    {{isset($pageTitle) ? $pageTitle : "Editar Permiso"}}
@endsection
@section('styles')

@endsection
@section('content-header')
    <h2><i class="fa fa-users"></i> Editar Permiso
    <small>Piense en un permiso como una accion de usuarios en el sistema.</small></h2>
@endsection

@section('content')

    {!! Form::open(['route' => ['permissions.update', $permiso->id], 'method' => 'PUT']) !!}
    <div class="box-body">
        <div class="row">
            <div class="col-md-6">
                {!! Field::text('display_name', $permiso->display_name, ['label' => 'Nombre del permiso']) !!}
                {!! Field::text('description', $permiso->description, ['label' => 'Descripción del permiso']) !!}
                {!! Field::select('modules[]', $modules, null, ['label' => 'Modulo', 'class' => 'select2']) !!}
            </div>
        </div>

    </div>
    <div class="box-footer">
        {!! Form::submit('Actualizar permiso', ['class' => 'btn btn-default submit']) !!}
    </div>
    {!! Form::close() !!}

@endsection
@section('scripts')

@endsection