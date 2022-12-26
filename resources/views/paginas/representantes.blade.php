@extends('paginas.partials.app')
@section('content')
@includeIf('paginas.partials.hero', ['section1' => $section1])
@isset($section2s)
	@if (count($section2s))
	<section class="py-md-5 py-sm-3">
		<div class="container row mx-auto">
			@foreach ($section2s as $s5)
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
							<div class="text-dark fw-bold font-size-18">{{ $s5->content_1 }}</div>
							<div class="font-size-16" style="color: #808080a6;">{{$s5->content_2}}</div>
                            <div>
								@php $content_3 = Str::of($s5->content_3)->explode('|') @endphp
								@if (count($content_3) == 2)
									<a href="{{$content_3[0]}}" class="font-size-16 text-danger text-decoration-none underline" target="_blank">{{$content_3[1]}}</a>
								@else 
									<a href="{{$s5->content_3}}" class="font-size-16 text-danger text-decoration-none underline" target="_blank">{{$s5->content_3}}</a> 
								@endif
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