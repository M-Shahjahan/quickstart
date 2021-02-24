@extends('layouts.app')
@section('content')
    <div class="panel-body">
        @include('common.errors')
        <form action="/task" method="POST" class="form-horizontal">
            {{csrf_field()}}
            <!---Task Name--->
            <div class="form-group">
                <label for="task-name" class="col-sm-3 control-label">Task</label>
                <div class="col-mn-6">
                    <input type="text" name="name" id="task-name" class="form-control">
                </div>
            </div>
                <!---Add Task Button--->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-primary">
                        <i class="glyphicon glyphicon-plus"></i>Add Task
                    </button>
                </div>
            </div>
        </form>
    </div>
    @if(count($tasks)>0)
    <div class="panel panel-default">
        <div class="panel-heading">
            Current Tasks
        </div>
        <div class="panel-body">
            <table class="table table-striped task-table">
                <!---Table Headings--->
                <thead>
                    <th>Task</th>
                    <th>&nbsp;</th>
                </thead>
                <!---Table Body--->
                <tbody>
                @foreach($tasks as $task)
                    <tr>
                        <!---Task Name--->
                        <td class="table-text">
                            <div>{{$task->name}}</div>
                        </td>
                        <td>
                            <!---Delete Button --->
                            <form action="/task/{{$task->id}}" method="POST">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <button class="btn btn-outline-danger">Delete</button>
                            </form>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
@endsection
