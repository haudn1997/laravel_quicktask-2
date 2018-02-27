@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
    @include('common.errors')

    <!-- New Task Form -->
    {!! Form::open(['route' => 'add-tasks','method'=>'POST','class'=>'form-horizontal']) !!}
    {!! Form::select('lang', array('vn' => 'vn','en' => 'en'),$lang,['style'=>'float: right','id' => 'lang']) !!}
    <!-- Task Name -->
        <div class="form-group">
            {!! Form::label('task', trans('msg.task'), ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
                {!! Form::text('task', '', ['class' => 'form-control', 'id' => 'task-name']) !!}
            </div>
        </div>
        <!-- Add Task Button -->

        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6 text-center">
                {!! Form::submit(trans('msg.addTask'), ['class' => 'btn btn-default btn-success']) !!}
            </div>
        </div>
            {!! Form::close() !!}
    </div>
    <div class="container">
        @if (count($tasks))
            <div class="panel panel-default">
                <div class="panel-heading text-center">
                    {{ trans('msg.Current Tasks') }}
                </div>

                <div class="panel-body">
                    <table class="table table-striped task-table text-center">

                        <!-- Table Headings -->
                        <thead>
                        <th class="text-center">{{ trans('msg.task') }}</th>
                        <th>&nbsp;</th>
                        </thead>

                        <!-- Table Body -->
                        <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <!-- Task Name -->
                                <td class="table-text">
                                    <div>{{ $task->name }}</div>
                                </td>

                                <td>
                                    {!! Form::open(['route' => ['del-task',$task->id],'method'=>'DELETE']) !!}
                                    {!! Form::submit(trans('msg.delTask'), ['class' => 'btn btn-default btn-danger']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
    @endif
@endsection
