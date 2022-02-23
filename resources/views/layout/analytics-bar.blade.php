<div class="row">
	<div class="col-md-12 grid-margin stretch-card">
		<div class="card">
			<div class="card-body dashboard-tabs p-0">
				<ul class="nav nav-tabs px-4" role="tablist">
					<li class="nav-item"><a class="nav-link active" id="overview-tab"
						data-toggle="tab" href="#overview" role="tab"
						aria-controls="overview" aria-selected="true">Overview</a></li>
				</ul>
				<div class="tab-content py-0 px-0">
					<div class="tab-pane fade show active" id="overview"
						role="tabpanel" aria-labelledby="overview-tab">
						<div class="d-flex flex-wrap justify-content-xl-between">
							<div
								class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
								<i class="mdi mdi-eye mr-3 icon-lg text-danger"></i>
								<div class="d-flex flex-column justify-content-around">
									<small class="mb-1 text-muted">Total Sales</small>
									<h5 class="mr-2 mb-0">N {{ number_format($total) }}</h5>
								</div>
							</div>
							
						</div>
					</div>
					
				
				</div>
			</div>
		</div>
	</div>
</div>