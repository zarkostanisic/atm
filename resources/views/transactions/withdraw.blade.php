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
                <div class="card-header">Withdraw funds</div>

                <div class="card-body">
					<form>
					  <div class="form-group">

					  <div class="form-group">
					    <label for="amount">Amount</label>
					    <input type="text"  name="amount"  id="amount" class="form-control">
                        <span>Denominations are 200, 500, 1000, 2000, 5000.</span>
					  </div>

					  <button type="button" class="btn btn-primary" id="withdraw">Withdraw</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section ('scripts')
	<script type="text/javascript">
		$('#withdraw').click(function(){
			$('#amount').removeClass('is-invalid');
			var amount = $('#amount').val();

			if(amount >= 200 && amount <= 40000){
				$.ajax({
				  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
				  method: 'POST',
				  url: '/transactions/store',
				  data: { amount: amount }
				})
			  	.done(function(msg) {
				    alert(msg);
				    $('#amount').val('');
				}).catch(function(msg){
					if(msg.status == 406){
						alert(msg.responseText);
					}else if(msg.status == 422){
						if(msg.responseJSON.errors.amount){
							$('#amount').addClass('is-invalid');
							alert(msg.responseJSON.errors.amount[0]);
						}
					}
				});
			}else{
				alert('Amount must be number between 200 and 40000');
			}
		});
	</script>
@endsection