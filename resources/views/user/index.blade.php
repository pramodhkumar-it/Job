@extends('layouts.default')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>User CRUD</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('user.create') }}"> Create New User</a>
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
    @foreach ($users as $user)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $user->name}}</td>
        <td>{{ $user->email}}</td>
        <td>
            <a class="btn btn-info" href="{{ route('user.show',$user->id) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('user.edit',$user->id) }}">Edit</a>           
        <td align="left">
<form action="{{ route('user.destroy', $user->id) }}" method="POST">
    @method('DELETE')
    @csrf
    <button>Delete User</button>
</form>
        </td>
    </tr>
    @endforeach
    </table>
    {!! $users->render() !!}
@endsection
