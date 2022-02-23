@extends('layout.master') @section('title') Create ticket @endsection
@section('page-title') Tickets, @endsection @section('content')
<div class="row">
	<div class="col-md-12 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
				
				<table id="recent-purchases-listing" class="table">
						<thead>
							<tr>
								<th>Topic</th>
								<th>Message</th>
								<th>Status</th>
								<th>Date</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
						@foreach($tickets as $ticket)
							<tr>
								<td>{{ $ticket->topic }}</td>
								<td>{{ $ticket->message }}</td>
								<td>
								<label class="badge @if($ticket->status == 'PENDING') badge-warning @else badge-success @endif">
									{{ $ticket->status }}
								</label></td>
								<td>{{ $ticket->created_at->format('D,M Y') }}</td>
								<td>
									@include('partial.update-delete', ['path'=> 
									'tickets', 'id'=> $ticket->id])
								</td>
							</tr>
						@endforeach			
						</tbody>
					</table>
				
				</div>
				
			</div>
		</div>
	</div>
</div>
@endsection
