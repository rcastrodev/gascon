@extends('paginas.partials.app')
@section('content')
@includeIf('paginas.partials.hero', ['section1' => $section1])
@isset($section2s)
	@if (count($section2s))
	<section class="py-md-5 py-sm-3">
		<div class="container row mx-auto">
			@foreach ($section2s as $s5)
				@php $number = Str::of($s5->content_3)->explode('|') @endphp
				<div class="col-sm-12 col-md-4 mb-4">
					<div class="card oficinas py-2 px-3">
						<div class="card-body ps-1">
							<div class="text-dark fw-bold font-size-18 mb-3">{{ $s5->content_1 }}</div>
							<div class="d-flex mb-3">
								<img src="{{ asset('images/phone-alt-solid.svg') }}" class="d-block me-3">
								<div class="">
									<div class="font-size-14" style="color: #808080a6;">{{$s5->content_2}}</div>
									@if (count($number) > 1)
										<a href="tel:{{$number[0]}}" class="text-dark text-decoration-none">{{$number[1]}}</a>
									@else 
										<a href="tel:{{$s5->content_3}}" class="text-dark text-decoration-none">{{$s5->content_3}}</a>
									@endif
								</div>
							</div>
							<div class="d-flex mb-3">
								<img src="{{ asset('images/envelope-solid.svg') }}" class="d-block me-3">
								<div class="">
									<a href="mailto:{{$s5->content_4}}" class="text-dark text-decoration-none">{{$s5->content_4}}</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			@endforeach
		</div>
	</section>
	@endif
@endisset
@endsection