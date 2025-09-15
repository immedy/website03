@extends('LandingPage.Layout.Layout')
@section('KONTEN')
    <!-- Start Align Area -->
	<div class="whole-wrap">
		<div class="container box_1170">			
			<div class="section-top-border">
				<h3>Galeri</h3>
				<div class="row gallery-item">
					@foreach ($galery as $p )
						<div class="col-md-4">
						<a href="{{ asset('storage/' . $p->galery)}}" class="img-pop-up">
							<div class="single-gallery-image" style="background: url({{ asset('storage/' . $p->galery)}});"></div>
						</a>
					</div>	
					@endforeach
									
				</div>
			</div>
		</div>
	</div>
	<!-- End Align Area -->
@endsection
