@extends ('layouts.app')

@section ('content')
	<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Info</div>

                <div class="card-body">
                	<ul class="list-group list-group-flush">
                		<li class="list-group-item">Full Name: {{ $user->name }}</li>
					    <li class="list-group-item">Username: {{ $user->username }}</li>
					    <li class="list-group-item">Balance: {{ $user->balance }}</li>
					</ul>
               </div>
            </div>
        </div>
    </div>
</div>
@endsection