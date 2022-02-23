@extends('layout.master') @section('title') Sales @endsection
@section('page-title') Sales List, @endsection @section('content')
<div class="row">
	<div class="col-md-12 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
				
				<table id="recent-purchases-listing" class="table">
						<thead>
							<tr>
								<th>S/N</th>
								<th>Name</th>
								<th>Quantity</th>
								<th>Cost(N)</th>
								
							</tr>
						</thead>
						<tbody>
						<?php $count = 1; ?>
						@foreach($sales as $sale)
							<tr>
								<td>{{ $count++ }}</td>
								<td>{{ $sale->stock->name }}</td>
								<td>{{ $sale->qty }}</td>
								<td>{{ number_format($sale->cost) }}</td>
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