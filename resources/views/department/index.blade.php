@extends('layouts.default')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Department CRUD</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('department.create') }}"> Create New Category</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th width="280px">Operation</th>
        </tr>
    @foreach ($departments as $department)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $department->name}}</td>
        <td>{{ $department->description}}</td>
        <td>
            <a class="btn btn-info" href="{{ route('department.show',$department->id) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('department.edit',$department->id) }}">Edit</a>           
        <td align="left">
<form action="{{ route('department.destroy', $department->id) }}" method="POST">
    @method('DELETE')
    @csrf
    <button>Delete User</button>
</form>
        </td>
    </tr>
    @endforeach
    </table>
    {!! $departments->render() !!}
@endsection