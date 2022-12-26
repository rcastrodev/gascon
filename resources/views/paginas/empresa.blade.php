@extends('paginas.partials.app')
@section('content')
@isset($sliders)
	@if(count($sliders))
		<div id="sliderEmpresa" class="carousel slide position-relative" data-bs-ride="carousel">
			<div class="carousel-indicators d-sm-none d-md-block">
				@foreach ($sliders as $k => $slide)
					<button type="button" data-bs-target="#sliderEmpresa" data-bs-slide-to="{{$k}}" class="@if (!$k) active @endif" aria-current="true" aria-label="Slide {{$k}}"></button>			
				@endforeach
			</div>
			<div class="carousel-inner h-100">
				@foreach ($sliders as $k => $slide)
					<div class="carousel-item h-100 @if (!$k) active @endif" style="background-image: linear-gradient(rgb(0 0 0 / 48%),rgba(0, 0, 0, 0.1)), url({{ asset($slide->image) }}); background-repeat: no-repeat; background-size: cover; background-position: center;">
						<div class="carousel-caption w-75">
							<h2 class="font-size-50 fw-bold">{{ $slide->content_1 }}</h2>
						</div>
					</div>		
				@endforeach
			</div>
		</div>
	@endif	
@endisset
@isset($section2)
	<div class="container py-md-5 py-sm-3 row mx-auto">
		<div class="col-sm-12 col-md-6">
			<h3 class="mb-3 mx-auto font-size-30 text-danger">{{$section2->content_1}}</h3>
			<div class="mx-auto font-size-16">{!!$section2->content_2!!}</div>
		</div>
		<div class="col-sm-12 col-md-6">
			@if ($section2->image)
				@if (Storage::disk('custom')->exists($section2->image))
					<img src="{{ asset($section2->image) }}" class="img-fluid d-block mx-auto mb-4">
				@endif
			@endif
			@if ($section2->image2)
				@if (Storage::disk('custom')->exists($section2->image2))
					<img src="{{ asset($section2->image2) }}" class="img-fluid d-block mx-auto mb-4">
				@endif
			@endif		
			@if ($section2->content_3)
				<p style="max-width: 70%; color:#949494; margin:auto;" class="font-size-14">{{$section2->content_3}}</p>
			@endif
		</div>
	</div>
@endisset
@isset ($section3)
<div class="py-md-5 py-sm-3 bg-dark d-flex align-items-center" style="min-height: 340px;">
	<div class="container mx-auto row">
		<div class="col-sm-12 col-md-4">
			<div class="text-white font-size-20 fw-bold ps-2" style="border-left: 3px solid #CE2027;">{{ $section3->content_1 }}</div>
		</div>
		<div class="col-sm-12 col-md-4">
			<div class="text-light font-size-16">{!! $section3->content_2 !!}</div>
		</div>
		<div class="col-sm-12 col-md-4">
			<div class="text-light font-size-16">{!! $section3->content_3 !!}</div>
		</div>
	</div>
</div>	
@endisset
@isset($section4s)
	@if (count($section4s))
	<section class="py-md-5 py-sm-3">
		<div class="container row mx-auto">
			@foreach ($section4s as $s4)
				<div class="col-sm-12 col-md-4">
					<div class="card producto bg-light py-3">
						<div class="card-body">
							<h2 class="text-danger mb-4 font-size-20 fw-bold">{{ $s4->content_1 }}</h2>
							<div class="card-text font-size-16 text-dark">{!! $s4->content_2 !!}</div>
						</div>
					</div>
				</div>
			@endforeach
		</div>
	</section>
	@endif
@endisset
@isset($section5s)
	@if (count($section5s))
	<section class="py-md-5 py-sm-3">
		<div class="container row mx-auto">
			@foreach ($section5s as $s5)
				<div class="col-sm-12 col-md-4">
					<div class="card pb-3 otros">
						@if ($s5->image)
							@if (Storage::disk('custom')->exists($s5->image))
								<img src="{{ asset($s5->image) }}" class="card-img-top img-fluid">
							@else
								<img src="images/default.jpg" class="card-img-top img-fluid">
							@endif	
						@else
							<img src="images/default.jpg" class="card-img-top img-fluid">			
						@endif
						<div class="card-body ps-1">
							<div class="text-dark">{{ $s5->content_1 }}</div>
							<div class="card-text font-size-16 text-danger">{{$s5->content_2}}</div>
						</div>
					</div>
				</div>
			@endforeach
		</div>
	</section>
	@endif
@endisset
@endsection
@push('head')
@endpush

@push('scripts')
@endpush
