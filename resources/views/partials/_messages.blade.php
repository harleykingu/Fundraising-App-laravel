
<div class="container">


@if (Session::has('success'))

		<div id="success-modal" class="modal green">
	    <div class="modal-content">
	      <h4 class="center-align white-text font1">Success !</h4>
	      <p class="white-text center-align">{{ Session::get('success') }}</p>
	    </div>
	  </div>

@endif

@if (count($errors) > 0)

		<div class="alert alert-danger" role="alert">
			<strong>Errors:</strong>
			<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
			</ul>
		</div>

@endif

</div>

@section('scripts')
	 <script>
   $(document).ready(function(){
    // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
   $('#success-modal').modal('open');
  });

	 </script>
@endsection

<!-- <div class="alert alert-success" role="alert">
	<strong>Success:</strong> {{ Session::get('success') }}
</div> -->
