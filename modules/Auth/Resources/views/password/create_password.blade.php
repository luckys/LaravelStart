@extends('auth::emails.layout.master')

@section('content')
    <section class="wrapper">
        @include('partials.message')
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">{{ trans('auth::ui.user.change_password') }}</div>
                        <div class="panel-body">
                            @include('errors.form_error')

                            {!! Form::open(array('url' => 'auth/user/'.$id.'/reset-password', 'class' => 'cmxform form-horizontal', 'id' => 'nameForm')) !!}

                            @include('auth::password.form_change_password', ['button' => trans('auth::ui.user.button_edit')])

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


