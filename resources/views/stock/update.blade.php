@extends('layout.master') @section('title') Update stock @endsection
@section('page-title') Update stock, @endsection @section('content')
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
				
				<form action="/stocks/{{$stock->id}}" method="post">
				 {{ method_field('PATCH') }}
				 @csrf()
				 
				<div class="form-group row">
						<label for="" class="col-sm-3 col-form-label">Name</label>
						<div class="col-sm-9">
							<input type="text" class="form-control"
								id="" placeholder="" name="name" value="{{$stock->name}}">
						</div>
					</div>
					
					<div class="form-group row">
						<label for="" class="col-sm-3 col-form-label">Price</label>
						<div class="col-sm-3">
							<input type="text" class="form-control"
								id="" placeholder="" name="price" value="{{$stock->price}}">
						</div>
					</div>
					
					<div class="form-group row">
						<label for="" class="col-sm-3 col-form-label">Quantity</label>
						<div class="col-sm-3">
							<input type="text" class="form-control"
								id="" placeholder="" name="qty" value="{{$stock->qty}}">
						</div>
					</div>
					
					<div class="form-group row">
						<label for="" class="col-sm-3 col-form-label">Measure</label>
						<div class="col-sm-3">
							<input type="text" class="form-control"
								id="" placeholder="" name="measure" value="{{$stock->measure}}">
						</div>
					</div>
					
					
                    
                    
					<button type="submit" class="btn btn-primary mr-2">Update</button>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
