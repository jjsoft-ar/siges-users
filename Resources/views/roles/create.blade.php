@extends('sigesui::layouts.withsidebar')
@section('pageTitle')
    {{isset($pageTitle) ? $pageTitle : "Crear Rol"}}
@endsection
@section('styles')

@endsection
@section('content-header')
    <h2><i class="fa fa-users"></i> Crear Rol
    <small>Piense en un rol como un grupo de usuarios con capacidades esfecificas para realizar acciones en el sistema.</small></h2>
@endsection

@section('content')

                {!! Form::open(['route' => 'roles.store']) !!}
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::text('display_name', ['label' => 'Nombre del rol']) !!}
                            {!! Field::text('description', ['label' => 'Descripción del rol']) !!}
                        </div>
                    </div>

                </div>
                <div class="box-footer">
                    {!! Form::submit('Crear rol', ['class' => 'btn btn-default submit']) !!}
                </div>
                {!! Form::close() !!}

@endsection
@section('scripts')

@endsection