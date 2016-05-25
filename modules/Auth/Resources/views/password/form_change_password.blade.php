<div class="form-group">
    <label  class="col-lg-2 col-sm-2 control-label">{{ trans('auth::ui.user.password_new') }}</label>
    <div class="col-lg-8">

        {!! Form::password('password', ['class' => 'form-control']) !!}

    </div>
</div>

<div class="form-group">
    <label class="col-lg-2 col-sm-2 control-label">{{ trans('auth::ui.user.password_confirmation') }}</label>
    <div class="col-lg-8">

        {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}

    </div>
</div>

<div class="form-group">
    <div class="col-lg-offset-2 col-lg-8">

        {!! Form::submit(trans('auth::ui.user.button_update'), ['class' => 'btn btn-primary']) !!}

    </div>
</div>

