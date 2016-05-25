@extends('auth::emails.layout.master')

@section('content')
    <div class="container">
        <div class="view-email">
            <h3>Estimado usuario {{ $user->fullname }}</h3>
            <p>
                Se ha registrado correctamente en el sistema, para activar su cuenta
                y cambiar la contraseña por defecto, acceda a la siguiente dirección
                pinchando aqui
                <a class="btn btn-info" href="{{ url('auth/user/reset-password/'.$user->email_token) }}" role="button">
                    {{ trans('auth::ui.user.activate_account') }}
                </a>
            </p>
        </div>
    </div>
@endsection