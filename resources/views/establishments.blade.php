@extends('layouts.main')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
        <!-- @ include('common.errors') -->

        <!-- New Task Form -->
        <form action="/establishment" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- Task Name -->
            <div class="form-group">
                <label for="establishment" class="col-sm-3 control-label">Establishment</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" class="form-control">
                </div>

                <div class="col-sm-6">
                    <textarea name="description" id="description" class="form-control"></textarea>
                </div>
            </div>

            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Add Establishment
                    </button>
                </div>
            </div>
        </form>
    </div>

        <!-- Current Establishments -->
    <div class="panel panel-default">
        @error('name')
        <div class="alert alert-danger">Invalid name</div>
        @enderror
        @error('description')
        <div class="alert alert-danger">Invalid description</div>
        @enderror
    @if (count($establishments) > 0)
        
            <div class="panel-heading">
                Current Establishments
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Establishment</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($establishments as $establishment)
                            <tr>
                                <!-- Task Name -->
                                <td class="table-text">
                                    <div>{{ $establishment->name }}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{ $establishment->description }}</div>

                                <td>
                            <!-- Delete Button
                                <td>
                                    <form action="/task/{{ $establishment->id }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button>Delete Task</button>
                                    </form>
                                </td>  -->  
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        
    @else
        <div class="panel-heading">
                No Establishments Yet
        </div>
    @endif
    </div>
@endsection