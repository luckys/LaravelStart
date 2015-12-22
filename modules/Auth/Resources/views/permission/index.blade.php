@extends('layouts.master')

@section('style')
    <link href="{{ asset('themes/admin/js/advanced-datatable/css/demo_page.css') }}" rel="stylesheet" />
    <link href="{{ asset('themes/admin/js/advanced-datatable/css/demo_table.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('themes/admin/js/data-tables/DT_bootstrap.css') }}" />
    @stop

@section('content')

    <!--body wrapper start-->
    <div class="wrapper">
        <div id="success_message"></div>
        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        {{ trans('auth::ui.permission.names') }}
            <span class="tools pull-right">
                <a href="javascript:;" class="fa fa-chevron-down"></a>
                <a href="javascript:;" class="fa fa-times"></a>
             </span>
                    </header>
                    <div class="panel-body">
                        <div class="adv-table">
                            @if(Auth::user()->can('create-permissions'))
                            <a href="{{ url('auth/permission/create') }}"><button class="btn btn-primary" type="button"><i class="fa fa-plus-circle"></i> {{ trans("auth::ui.permission.button_add") }}</button></a>
                            @endif
                            <table  class="display table table-bordered table-striped" id="dynamic-table">
                                <thead>
                                <tr>
                                    <th>{{ trans('auth::ui.permission.name_label') }}</th>
                                    <th>{{ trans('auth::ui.permission.display') }}</th>
                                    <th>{{ trans('auth::ui.permission.description') }}</th>
                                    @if(Auth::user()->can(['update-permissions', 'delete-permissions']))
                                    <th>{{ trans('auth::ui.permission.operation_label') }}</th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($permissions as $permission)
                                    <tr class="gradeX" data-id="{{ $permission->id }}">
                                        <td>{{ $permission->name }}</td>
                                        <td>{{ $permission->display_name }}</td>
                                        <td>{{ $permission->description }}</td>
                                        @if(Auth::user()->can(['update-permissions', 'delete-permissions']))
                                        <td>
                                            <p>
                                                @if(Auth::user()->can('update-permissions'))

                                            <a href="{{ url('auth/permission/' . $permission->id . '/edit') }}">
                                                <button class="btn btn-info" type="button" title="{{ trans('auth::ui.permission.button_update') }}"><i class="fa fa-edit"></i></button>
                                            </a>

                                                @endif

                                                @if(Auth::user()->can('delete-permissions'))
                                                    <button class="btn btn-danger" type="submit" title="{{ trans('auth::ui.permission.button_delete') }}">
                                                    <i class="fa fa-trash-o"></i>
                                                    </button>
                                                @endif
                                            </p>
                                        </td>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>{{ trans('auth::ui.permission.name_label') }}</th>
                                    <th>{{ trans('auth::ui.permission.display') }}</th>
                                    <th>{{ trans('auth::ui.permission.description') }}</th>
                                    @if(Auth::user()->can(['update-permissions', 'delete-permissions']))
                                        <th>{{ trans('auth::ui.permission.operation_label') }}</th>
                                    @endif
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    {!! Form::open(['route' => ['auth.permission.destroy', ':ID'], 'method' => 'DELETE', 'id' => 'myForm']) !!}
    {!! Form::close() !!}
@stop

@section('script')
            <!--dynamic table-->
    <script type="text/javascript" language="javascript" src="{{ asset('themes/admin/js/advanced-datatable/js/jquery.dataTables.js')}}"></script>
    <script type="text/javascript" src="{{ asset('themes/admin/js/data-tables/DT_bootstrap.js') }}"></script>
    <!--dynamic table initialization -->
    <script src="{{ asset('themes/admin/js/dynamic_table_init.js') }}"></script>
    <script src="{{ asset('js/ajax.js') }}"></script>
@stop