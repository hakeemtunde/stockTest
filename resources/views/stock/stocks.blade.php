@extends('layout.master') @section('title') Stocks @endsection
@section('page-title') Stock List, @endsection @section('content')
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
								<th>Price(N)</th>
								<th>Measure</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
						<?php $count = 1; ?>
						@foreach($stocks as $stock)
							<tr @if($stock->isLow()) style="background-color:#ff4747"  @endif>
								<td>{{ $count++ }}</td>
								<td>{{ $stock->name }}</td>
								<td>{{ $stock->qty }}</td>
								<td>{{ number_format($stock->price) }}</td>
								<td>{{ $stock->measure }}</td>
								<td>
									@include('partial.update-delete', ['path'=> 
									'stocks', 'id'=> $stock->id])
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
