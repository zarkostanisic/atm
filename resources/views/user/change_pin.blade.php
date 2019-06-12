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
                <div class="card-header">EDIT PIN</div>

                <div class="card-body">
					<form action="/user/update_pin" method="POST">
					  {{ csrf_field() }}
					  <div class="form-group">

					  <div class="form-group">
					    <label for="pin">PIN</label>
					    <input type="password"  name="pin"  id="pin" class="form-control @error('pin') is-invalid @enderror">
					    @error('pin')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					  </div>

					  <button type="submit" class="btn btn-primary">Edit</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection