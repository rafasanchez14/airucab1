@if(count($errors)>0)
<div class="alert alert-danger" role="alert">
	<strong>Errores:</strong>
	<ul>
		@foreach($errors->all() as $error)
		<li>* {{$error}}</li>
		@endforeach
	</ul>
</div>
@endif

@if (Session::has('update'))
<div class="alert alert-info alert-dismissable" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
			<strong>{{Session::get('update')}}</strong>
</div>
@endif

@if (Session::has('delete'))

<div class="alert alert-danger alert-dismissable" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
			<strong>{{Session::get('delete')}}</strong>
</div>
@endif

@if (Session::has('save'))
<div class="alert alert-success alert-dismissable" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
				<strong>{{Session::get('save')}}</strong>
			</div>
@endif
@if (Session::has('inicio'))
<div class="alert alert-success" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
				<strong>{{Session::get('inicio')}}</strong>
			</div>
@endif


