@extends('layouts.master')

@section('content')
    <section class="wrapper">
        <div class="row">
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-body">
                                <div class="profile-pic text-center">
                                    <img alt="" src="{{ asset('images/profiles/'.Auth::user()->avatar)  }}">
                                </div>
                                {!! Form::open(array('url' => 'auth/user/change-avatar', 'class' => 'form-horizontal', 'id' => 'nameForm', 'files' => true)) !!}

                                <div class="form-group">
                                    <div class="col-md-10">
                                        {!! Form::file('avatar', null) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-offset-4 col-md-10">
                                        {!! Form::submit(trans('auth::ui.user.change_image'), ['class' => 'btn btn-primary']) !!}
                                    </div>
                                </div>

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-body">
                                <ul class="p-info">
                                    <li>
                                        <div class="title">{{ trans('auth::ui.user.name') }}</div>
                                        <div class="desk">{{ Auth::user()->firstname }}</div>
                                    </li>
                                    <li>
                                        <div class="title">{{ trans('auth::ui.user.lastname') }}</div>
                                        <div class="desk">{{ Auth::user()->lastname }}</div>
                                    </li>
                                    <li>
                                        <div class="title">{{ trans('auth::ui.user.email') }}</div>
                                        <div class="desk">{{ Auth::user()->email }}</div>
                                    </li>
                                    <li>
                                        <div class="title">{{ trans('auth::ui.user.username') }}</div>
                                        <div class="desk">{{ Auth::user()->username }}</div>
                                    </li>
                                </ul>
                                <a class="btn btn-info" href="{{ url('auth/profile/' . Auth::user()->id . '/edit') }}" role="button"><i class="fa fa-refresh"></i> {{ trans('auth::ui.user.button_update') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        @include('partials.message')
                        <div class="panel panel-default">
                            <div class="panel-heading">{{ trans('auth::ui.user.change_password') }}</div>
                            <div class="panel-body">
                                @include('errors.form_error')

                                {!! Form::open(array('url' => 'auth/user/change-password', 'class' => 'cmxform form-horizontal', 'id' => 'nameForm')) !!}

                                @include('auth::password.form_change_password', ['button' => trans('auth::ui.user.button_edit')])

                                {!! Form::close() !!}
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection