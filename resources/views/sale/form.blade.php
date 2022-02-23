@extends('layout.master') @section('title') Sales @endsection
@section('page-title') Make sales, @endsection @section('content')
<div class="row">
	<div class="col-md-12 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				@if ($errors->any())
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
						<li>{{ $error }}</li> @endforeach
					</ul>
				</div>
				@endif
				
				@if($success)
				<div class="alert alert-success">
					<ul>
						<li>{{$success}}</li>
					</ul>
				</div>
				@endif
				
				<form action="/stocks/{{$stock->id}}/sales" method="post">
				 @csrf()
					<div class="form-group row">
						<label for="" class="col-sm-3 col-form-label">Name</label>
						<div class="col-sm-9">
							<input type="text" class="form-control"
								id="" value="{{$stock->name}}" disabled>
						</div>
					</div>
					
					<div class="form-group row">
						<label for="" class="col-sm-3 col-form-label">Price</label>
						<div class="col-sm-3">
							<input type="text" class="form-control"
								id="" value="{{$stock->price}}" disabled>
						</div>
					</div>
					
					<div class="form-group row">
						<label for="" class="col-sm-3 col-form-label">Quantity</label>
						<div class="col-sm-3">
							<input type="text" class="form-control"
								id="" placeholder="" name="qty">
						</div>
					</div>
					<button type="submit" class="btn btn-primary mr-2">Make sales</button>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
