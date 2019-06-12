@extends ('layouts.app')

@section ('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                  {{ Session::get('success') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">Create</div>

                <div class="card-body">
					<form action="{{ route('users.store') }}" method="POST">
					  {{ csrf_field() }}
					  <div class="form-group">
					    <label for="name">Full name</label>
					    <input type="text"  name="name"  id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
					    @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					  </div>

					  <div class="form-group">
					    <label for="username">Username</label>
					    <input type="text"  name="username"  id="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}">
					    @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					  </div>

					   <div class="form-group">
					    <label for="balance">Balance</label>
					    <input type="text"  name="balance"  id="balance" class="form-control @error('balance') is-invalid @enderror" value="{{ old('balance') }}">
					    @error('balance')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					  </div>

					  <div class="form-group">
					    <label for="pin">PIN</label>
					    <input type="password"  name="pin"  id="pin" class="form-control @error('pin') is-invalid @enderror">
					    @error('pin')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					  </div>

					  <div class="form-group">
					  	 <label for="role_id">Role</label>
					    <select name="role_id" id="role_id" class="form-control">
					    	@foreach ($roles as $role)
					    		<option value="{{ $role->id}} " @if(old('role_id') == $role->id) selected @endif>{{ $role->name }}</option>
					    	@endforeach
					    </select>
					  </div>

					  <button type="submit" class="btn btn-primary">Create</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection