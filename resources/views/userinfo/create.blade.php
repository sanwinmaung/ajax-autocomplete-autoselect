@extends ('layouts.master')
@section ('content')

<div id="signupbox" style=" margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
	<div class="panel panel-info">
		<div class="panel-heading">
			<div class="panel-title">Testing Address Form</div>
			{{-- <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="/accounts/login/">Sign In</a></div> --}}
		</div>  
		<div class="panel-body" >

			<form  action="{{ route('user-info.store') }}" method="POST" class="form-horizontal">
				@csrf
				
				<div id="div_username" class="form-group">
					<label for="username" class="control-label col-md-4"> Username</label>
					<div class="controls col-md-8">
						<input class="input-md textinput textInput form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" id="username" value="{{ old('username') }}" maxlength="30" placeholder="Type your username" style="margin-bottom: 10px" type="text" required autofocus/>
					</div>

					@if ($errors->has('username'))
					<span class="invalid-feedback" role="alert">
						<strong>* {{ $errors->first('username') }}</strong>
					</span>
					@endif
				</div>

				<div id="div_address" class="form-group">
					<label for="address" class="control-label col-md-4"> Address</label>
					<div class="controls col-md-8">
						<input class="input-md textinput textInput form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" id="address" value="{{ old('address') }}" maxlength="30" placeholder="Search your address" style="margin-bottom: 10px" type="text" required/>

						@if ($errors->has('address'))
						<span class="invalid-feedback" role="alert">
							<strong>* {{ $errors->first('address') }}</strong>
						</span>
						@endif
					</div>

					@if ($errors->has('address'))
					<span class="invalid-feedback" role="alert">
						<strong>* {{ $errors->first('address') }}</strong>
					</span>
					@endif
				</div>

				<div id="div_city" class="form-group">
					<label for="city_id" class="control-label col-md-4"> City</label>
					<div class="controls col-md-8">
						<select name="city_id" id="city" data-placeholder="Select your city" class="select form-control" style="margin-bottom: 10px">
							<option disabled selected>--- Choose City ---</option>
							@foreach ($cities as $city)
							<option class="city-opt" value="{{ $city->id }}" {{ (collect(old('city_id'))->contains($city->id)) ? 'selected':'' }}>
								{{ $city->city}}
							</option>
							@endforeach
						</select>

						@if ($errors->has('city_id'))
						<span class="invalid-feedback" role="alert">
							<strong style="color: red;">* The city field is required.</strong>
							<br>
						</span>
						@endif
					</div>
				</div>

				<div id="div_township" class="form-group">
					<label for="township_id" class="control-label col-md-4"> Township</label>
					<div class="controls col-md-8">
						<select name="township_id" id="township" data-placeholder="Select your township" class="select form-control" style="margin-bottom: 10px">
							<option disabled selected>--- Choose City First ---</option>
						</select>

						@if ($errors->has('township_id'))
						<span class="invalid-feedback" role="alert">
							<strong style="color: red;">* The township field is required.</strong>
							<br>
						</span>
						@endif
					</div>
				</div>

				<div class="form-group"> 
					<div class="aab controls col-md-4 "></div>
					<div class="controls col-md-8">
						<input type="submit" value="Submit" class="btn btn-primary btn btn-info" id="submit-id-signup" />
					</div>
				</div> 

			</form>

		</div>
	</div>
</div> 
</div>

@endsection
@push('script')
<script type="text/javascript">

	$(document).ready(function() {
		$( "#address" ).autocomplete({
			source : "{{ url('auto-search/address') }}",
			minLength: 2,
			select: function(event, ui) {
				// $('#q').val(ui.item.value);
				var id = ui.item.id;
				$.get('{{ url('auto-search') }}/city-by-address?id=' + id, function(ads) {
					$("#city").val(ads.city_id).attr("selected","selected");
					$.get('{{ url('auto-search') }}/township-by-city?city_id=' + ads.city_id, function(data) {
						            $('#township').empty();
									$('#township').append('<option disabled selected>'+ '--- Choose Township ---' + '</option>');
						            $.each(data, function( key, value ){
							                $('#township').append('<option value="'+value.id+'">'+value.township+'</option>');
						            });
						$("#township").val(ads.township_id).attr("selected","selected");
					});
				});
			}
		});
	});

    $('#city').on('change', function(e){
	        var city_id = e.target.value;
	        $.get('{{ url('auto-search') }}/township-by-city?city_id=' + city_id, function(data) {
		console.log("alone");
		            $('#township').empty();
					$('#township').append('<option disabled selected>'+ '--- Choose Township ---' + '</option>');
		            $.each(data, function( key, value ){
			                $('#township').append('<option value="'+value.id+'">'+value.township+'</option>');
				});
	        });
    });
</script>

@endpush