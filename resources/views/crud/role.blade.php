@extends('crud.temp')

@section('title','Roles')
@section('content')



<main class="main-content">
    <!-- Add your dashboard content here -->

    <div class="card">
        <div class="card-header">
            <h4>Users Role</h4>
            @if(Session::has('Success'))
            <div class="alert alert-success">{{Session::get('Success')}}</div>
            @endif
            @if(Session::has('Failed'))
            <div class="alert alert-danger">{{Session::get('Failed')}}</div>
            @endif
            @csrf
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td><a href="{{ route('crud.edit-role', $user->id) }}">{{ $user->usertype }}</a></td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</main>
@endsection