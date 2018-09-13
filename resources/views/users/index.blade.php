@extends('layouts.mainlayout')

@section('content')
<h2>Users</h2>
<div class="table-responsive">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
      </tr>
    </thead>
    <tbody>
      @foreach($users as $user)
      <tr>
        <td>{{$user->id}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>
          @foreach($user->roles as $role)
          {{$role->name}}
          @endforeach
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
  <p>{{$last_query}}</p>
@endsection
