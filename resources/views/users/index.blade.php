@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                  {{ Session::get('success') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">Users list <a href="{{ route('users.create') }}">Create</a></div>

                <div class="card-body">
                    <table id="users" class="display">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Full name</th>
                                <th>Username</th>
                                <th>Balance</th>
                                <th>Last transactions</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->balance }}</td>
                                @php 
                                    $last_transaction = $user->transactions()->orderBy('id', 'desc')->first()
                                @endphp
                                <td>{{  $last_transaction->value ?? '-' }}</td>
                                <td>
                                    <a href="{{ route('users.edit', $user->id) }}">Edit</a>
                                </td>
                                <td>
                                     <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button type="submit" class="btn btn-danger">Block</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section ('styles')
     <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
@endsection

@section ('scripts')
    <script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $(document).ready( function () {
            $('#users').DataTable();
        } );
    </script>
@endsection
