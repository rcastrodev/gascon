@extends('paginas.partials.app')
@section('content')
@isset($section1s)
	@if (count($section1s))
		<div id="sliderHero" class="carousel slide position-relative" data-bs-ride="carousel">
			<div class="carousel-indicators">
				@foreach ($section1s as $k => $v)
					<button type="button" data-bs-target="#sliderHero" data-bs-slide-to="{{$k}}" class="@if(!$k) active @endif"  aria-current="true" aria-label="Slide {{$k}}"></button>
				@endforeach
			</div>
			<div class="carousel-inner">
				@foreach ($section1s as $k => $v)
					<div class="carousel-item @if(!$k) active @endif" style="background-image: url({{$v->image}}); background-repeat: no-repeat; background-size: cover;">
						<div class="carousel-caption mt-5 text-start position-static mx-auto container">
							<div class="mt-sm-0 mt-md-5">
								<h2 class="font-size-42 text-white fw-bold mb-4">{{ $v->content_1 }}</h2>
								<div class="font-size-20 text-light d-none d-md-block">{!! $v->content_2 !!}</div>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>		
	@endif
@endisset
@isset($products)
	@if (count($products))
	<section class="py-md-5 py-sm-3">
		<div class="container row mx-auto">
			<h2 class="mb-5 text-uppercase font-size-32 col-sm-12 text-danger fw-bold">PRODUCTOS DESTACADOS</h2>
			@foreach ($products as $p)
				<div class="col-sm-12 col-md-6 mb-md-5 mb-sm-3">
					<a href="{{ route('producto', ['product'=>$p]) }}" class="card text-decoration-none producto-destacado hover">
						@if ($p->image)
							@if (Storage::disk('custom')->exists($p->image))
								<img src="{{ asset($p->image) }}" class="card-img-top img-fluid">
							@else
								<img src="images/default.jpg" class="card-img-top img-fluid">
							@endif	
						@else
							<img src="images/default.jpg" class="card-img-top img-fluid">			
						@endif
						<div class="card-body text-dark">
							<h5 class="card-title mb-4 font-size-24 fw-bolder">{{ $p->name }}</h5>
							<div class="card-text font-size-15 ul-style">{!! $p->description !!}</div>
						</div>
					</a>
				</div>
			@endforeach
		</div>
	</section>
	@endif
@endisset
@isset($section2)
	<section id="section2">
		<div class="row">
			<div class="col-sm-12 col-md-6 pe-0 d-sm-none d-md-block">
				<img src="{{ asset($section2->image) }}" class="img-fluid w-100">
			</div>
			<div class="col-sm-12 col-md-6 d-flex flex-column justify-content-center ps-sm-2 ps-md-0 py-sm-3 py-md-5 bg-dark">
				<div class="mx-auto" style="max-width: 80%">
					<h4 class="mb-3 text-white font-size-32 ps-sm-2 ps-md-5">{{ $section2->content_1 }}</h4>
					<div class="font-size-23 ps-sm-2 ps-md-5 mb-sm-2 mb-md-5" style="max-width: 600px;">
						<div class="text-light mb-4 font-size-18 fw-light">{!! $section2->content_2 !!}</div>
						<div class="">
							<a href="{{ route('contacto') }}" class="text-uppercase bg-red py-2 px-5 fw-bold text-decoration-none text-white font-size-14">SOLICITAR PRESUPUESTO</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>		
@endisset
@isset($categories)
	@if (count($categories))
	<section class="py-md-5 py-sm-3">
		<div class="container">
			<div class="row justify-content-between mb-5 mx-auto">
				<h2 class="col-sm-12 col-md-6 mb-sm-1 mb-md-0 text-uppercase font-size-25 text-danger fw-bold m-0">CATEGORÍAS DE PRODUCTOS</h2>
				<div class="col-sm-12 col-md-6 text-end">
					<a href="{{ route('categorias') }}" class=" text-danger text-decoration-none font-size-14 py-2 px-4" style="border: 1px solid #CE2027;">VER MÁS</a>
				</div>
			</div>
			<div class="row mx-auto">
				@foreach ($categories as $c)
					<div class="col-sm-12 col-md-3 mb-md-5 mb-sm-3">
						@includeIf('paginas.partials.categoria', ['c' => $c])
					</div>
				@endforeach
			</div>
		</div>
	</section>
	@endif
@endisset
@isset($news)
	@if (count($news))
	<section class="py-md-5 py-sm-3">
		<div class="container">
			<div class="row justify-content-between mb-5 mx-auto">
				<h2 class="col-sm-12 col-md-6 mb-sm-1 mb-md-0 text-uppercase font-size-25 text-danger fw-bold m-0">NOVEDADES</h2>
				<div class="col-sm-12 col-md-6 text-end">
					<a href="{{ route('novedades') }}" class="text-danger text-decoration-none font-size-14 py-2 px-4" style="border: 1px solid #CE2027;">VER MÁS</a>
				</div>
			</div>
			<div class=" row mx-auto">
				@foreach ($news as $new)
					<div class="col-sm-12 col-md-4 mb-md-5 mb-sm-3">
						<a href="{{ route('novedad', ['id'=>$new]) }}" class="card text-decoration-none novedad">
							@if ($new->image)
								@if (Storage::disk('custom')->exists($new->image))
									<img src="{{ asset($new->image) }}" class="card-img-top img-fluid" style="height: 311px; object-fit:cover;">
								@else
									<img src="images/default.jpg" class="card-img-top img-fluid" style="height: 311px; object-fit:cover;">
								@endif	
							@else
								<img src="images/default.jpg" class="card-img-top img-fluid" style="height: 311px; object-fit:cover;">			
							@endif
							<div class="card-body text-dark position-relative">
								<span class="text-danger d-block mb-3 fw-bold font-size-16">{{ $new->content_3 }}</span>
								<h5 class="card-title mb-4 font-size-22 fw-bold">{{ $new->content_1 }}</h5>
								<div class="card-text font-size-18">{!! Str::limit($new->content_2, 200) !!}</div>
								<div class="position-absolute d-flex justify-content-between" style="bottom: 10px; left: 20px; right: 20px;">
									<span>{{ date_format($new->created_at, 'd/m/Y') }}</span>
									<span>ver más</span>
								</div>
							</div>
						</a>
					</div>
				@endforeach
			</div>
		</div>
	</section>
	@endif
@endisset
@endsection