@extends ('layouts.master')
@section ('content')

<div id="signupbox" style=" margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
	<div class="panel panel-info">
		<div class="panel-heading">
			<div class="panel-title">Testing Address Form</div>
			{{-- <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="/accounts/login/">Sign In</a></div> --}}
		</div>  
		<div class="panel-body" >

			<form  action="{{ route('address.store') }}" method="POST" class="form-horizontal">
				@csrf
				
				<div id="div_address" class="form-group">
					<label for="address" class="control-label col-md-4"> Address</label>
					<div class="controls col-md-8">
						<input class="input-md textinput textInput form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" id="address" value="{{ old('address') }}" maxlength="30" placeholder="Type your address" style="margin-bottom: 10px" type="text" required autofocus/>
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
							<option selected disabled>--- Choose Your City ---</option>
							@foreach ($cities as $city)
							<option value="{{ $city->id }}" {{ (collect(old('city_id'))->contains($city->id)) ? 'selected':'' }}>
								{{ $city->city}}
							</option>
							@endforeach
						</select>

						@if ($errors->has('city_id'))
						<span class="invalid-feedback" role="alert">
							<strong style="color: red;">* {{ $errors->first('city_id') }}</strong>
							<br>
						</span>
						@endif
					</div>
				</div>

				<div id="div_township" class="form-group">
					<label for="township_id" class="control-label col-md-4"> Township</label>
					<div class="controls col-md-8">
						<select name="township_id" id="township" data-placeholder="Select your township" class="select form-control" style="margin-bottom: 10px">
							{{-- <option value=""></option> --}}
							<option selected disabled>--- Choose City First ---</option>
							{{-- @foreach ($townships as $township)
							<option value="{{ $township->id }}" {{ (collect(old('township_id'))->contains($township->id)) ? 'selected':'' }}>
								{{ $township->township}}
							</option>
							@endforeach --}}
						</select>

						@if ($errors->has('township_id'))
						<span class="invalid-feedback" role="alert">
							<strong style="color: red;">* {{ $errors->first('township_id') }}</strong>
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

<script>
	    $('#city').on('change', function(e){
		        var city_id = e.target.value;
		        $.get('{{ url('auto-search') }}/township-by-city?city_id=' + city_id, function(data) {
			//             console.log(data);
			            $('#township').empty();
						$('#township').append('<option>'+ '--- Choose Township ---' + '</option>');
			            $.each(data, function( key, value ){
				                $('#township').append('<option value="'+value.id+'">'+value.township+'</option>');
			            });
		        });
	    });
</script>

@endsection