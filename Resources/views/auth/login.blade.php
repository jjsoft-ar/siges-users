@extends('sigesui::layouts.main')
@section('pageTitle')
    Ingreso a SiGEs
@endsection
@section('content')
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content" ng-controller="LoginController">
                {!! Alert::render() !!}
                {!! Form::open(['route' => 'login-post']) !!}
                <h1>Ingreso a SiGEs</h1>
                <div>
                    {!! Field::email('email', ['label' => 'Usuario']) !!}
                </div>
                <div>
                    {!! Field::password('password', ['label' => 'Contraseña']) !!}
                </div>
                {!! Field::hidden('_token',csrf_token()) !!}
                <div>
                    {!! Form::submit('Ingresar', ['class' => 'btn btn-default submit']) !!}
                    <a href="#" ng-click="forgotPassword()" class="reset_pass">Olvide mi contraseña</a>
                </div>

                <div class="clearfix"></div>

                <div class="separator">
                    <p class="change_link">Nuevo en el sitio?
                        <a href="#signup" class="to_register"> Crear Cuenta </a>
                    </p>

                    <div class="clearfix"></div>
                    <br />

                    <div>
                        <h1><i class="fa fa-paw"></i> SiGEs</h1>
                        <p>©2016 All Rights Reserved. SiGEs. Privacy and Terms</p>
                    </div>
                </div>
                {!! Form::close() !!}
            </section>
        </div>

        <div id="register" class="animate form registration_form">
            <section class="login_content">
                {!! Form::open(['route' => 'users.store']) !!}
                    <h1>Create Account</h1>
                    <div>
                        {!! Field::text('name', ['label' => 'Nombre completo']) !!}
                    </div>
                    <div>
                        {!! Field::text('email', ['label' => 'Email']) !!}
                    </div>
                    <div>
                        {!! Field::password('password', ['label' => 'Contraseña']) !!}
                    </div>
                    <div>
                        {!! Field::password('password_confirmation', ['label' => 'Confirmar Contraseña']) !!}
                    </div>
                    <div>
                        {!! Form::submit('Crear usuario', ['class' => 'btn btn-default submit']) !!}
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <p class="change_link">Ya eres miembro ?
                            <a href="#signin" class="to_register"> Log in </a>
                        </p>

                        <div class="clearfix"></div>
                        <br />

                        <div>
                            <h1><i class="fa fa-paw"></i> SiGEs</h1>
                            <p>©2016 All Rights Reserved. SiGEs. Privacy and Terms</p>
                        </div>
                    </div>
                {!! Form::close() !!}
            </section>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('modules/users/js/login.js')}}"></script>
@endsection
