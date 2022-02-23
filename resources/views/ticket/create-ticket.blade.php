<?php use App\ETicket\CommonStr; ?>
@extends('layout.master') @section('title') Create ticket @endsection
@section('page-title') Create ticket, @endsection @section('content')
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
				
				<form action="/tickets" method="post">
				 @csrf()
					<div class="form-group row">
						<label for="" class="col-sm-3 col-form-label">Title</label>
						<div class="col-sm-9">
							<input type="text" class="form-control"
								id="" placeholder="" name="topic">
						</div>
					</div>
					
					
					<div class="form-group row">
					<label class="col-sm-3 col-form-label">Description</label>
                      <div class="col-sm-9">
                      <textarea class="form-control" rows="4" name="message"></textarea>
                      </div>
                    </div>
                    
                    <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Status</label>
                    <div class="col-sm-9">
                    <select class="form-control form-control-sm" name="status">
                      <option>{{ CommonStr::PENDDING_STATUS }}</option>
                      <option>{{ CommonStr::CLOSED_STATUS }}</option>
                    </select>
                  </div>
                  </div>
					<button type="submit" class="btn btn-primary mr-2">Create</button>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
