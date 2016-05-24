@extends('layouts.master')

        @section('content')

        <!--body wrapper start-->
    <div class="wrapper">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-success">
                    <div class="panel-heading">{{ trans('auth::ui.login.logged_successfully') }}</div>
            </div>
        </div>

    </div>
    @stop
