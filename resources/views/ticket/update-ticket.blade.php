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
				
				<form action="/tickets/{{$ticket->id}}" method="post">
				 {{ method_field('PATCH') }}
				 @csrf()
				 
					<div class="form-group row">
						<label for="" class="col-sm-3 col-form-label">Title</label>
						<div class="col-sm-9">
							<input type="text" class="form-control"
								id="" placeholder="" name="topic" value="{{$ticket->topic}}">
						</div>
					</div>
					
					<div class="form-group row">
					<label class="col-sm-3 col-form-label">Description</label>
                      <div class="col-sm-9">
                      <textarea class="form-control" rows="4" name="message">{{$ticket->message}}</textarea>
                      </div>
                    </div>
                    
                    <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Status</label>
                    <div class="col-sm-9">
                    <select class="form-control form-control-sm" name="status">
                      <option @if($ticket->status== CommonStr::PENDDING_STATUS) selected="selected" @endif>{{ CommonStr::PENDDING_STATUS }}</option>
                      <option @if($ticket->status== CommonStr::CLOSED_STATUS) selected="selected" @endif>{{ CommonStr::CLOSED_STATUS }}</option>
                    </select>
                  </div>
                  </div>
					<button type="submit" class="btn btn-primary mr-2">Update</button>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
