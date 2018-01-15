<!-- resources/views/tasks.blade.php -->
@extends('layouts.app')
    @section('content')
        <div class="panel-body">
            <!-- Display Validation Errors -->
            @include('common.errors')
            <!-- New Task Form -->
            <h3>{{ trans('messages.titleadd') }}</h3>
            {{ Form::open(['route' => 'task.index']) }}
                {{ Form::text('name', null, ['class' => 'form-control']) }}
                <div class="form-group">
                    {{ Form::submit( trans('messages.Add'), ['class' => 'btn btn-default']) }}
                </div>
            {{ Form::close() }}
        </div>
        @if (count($tasks))
        <div class="panel panel-default">
            <h3>{{ trans('messages.titletable') }}</h3>
            <div class="panel-body">
                <table class="table task-table">
                    <!-- Table Headings -->
                    <thead class="thead-default">
                        <tr>
                            <th>{{ trans('messages.title') }}</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <!-- Table Body -->
                    @foreach ($tasks as $task)
                        <tr>
                            <!-- Task Name -->
                            <td class="table-text">
                                <div>{{ $task->name }}</div>
                            </td>
                            <td class="td_last">
                                {{ Form::open(['route' => ['task.destroy', $task->id]]) }}
                                    {{ Form::hidden('_method', 'DELETE') }}
                                    {{ Form::submit( trans('messages.delete'), ['class' => 'btn btn-danger']) }}
                                {{ Form::close() }}
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    @endif
@endsection
