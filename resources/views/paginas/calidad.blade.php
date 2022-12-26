@extends('paginas.partials.app')
@section('content')
@includeIf('paginas.partials.hero', ['section1' => $section1])
@isset($section2)
	<div class="container py-3 row mx-auto">
		<div class="col-sm-12 col-md-6">
			<h3 class="mb-3 mx-auto font-size-30 text-danger">{{$section2->content_1}}</h3>
			<div class="mx-auto font-size-16">{!!$section2->content_2!!}</div>
		</div>
		<div class="col-sm-12 col-md-6">
            <div class="row">
                @if ($section2->image)
                    @if (Storage::disk('custom')->exists($section2->image))
                        <div class="col-sm-12 col-md-6 mb-2">
                            <img src="{{ asset($section2->image) }}" class="img-fluid d-block mx-auto mb-4">
                        </div>
                    @endif
			    @endif   
                @if ($section2->image2)
                    <div class="col-sm-12 col-md-6 mb-2">
                        @if (Storage::disk('custom')->exists($section2->image2))
                            <img src="{{ asset($section2->image2) }}" class="img-fluid d-block mx-auto mb-4">
                        @endif
                    </div>
			    @endif	
            </div>
		</div>
	</div>
@endisset
@isset($section3s)
    @if (count($section3s))
        <div class="container py-md-5 py-sm-3 row mx-auto">
            @foreach ($section3s as $s3)
                @if ($s3->image)
                    @if (Storage::disk('custom')->exists($s3->image))
                        <div class="col-sm-12 col-md-4 mb-2">
                            <div class="d-flex justify-content-between align-items-center py-4 px-2" style="background-color: #F2F2F2; border-bottom: 4px solid #ce2027;">
                                <strong>{{ $s3->content_1 }}</strong>
                                <a href="{{ route('archive-download', ['id'=> $s3->id, 'column' => 'image']) }}" class="px-3 btn ficha-tecnica font-size-15 align-items-center text-danger fw-bold" style="border: 2px solid #CE2027;">DESCARGAR</a>
                            </div>
                        </div>
                    @endif
                @endif  
            @endforeach
        </div>      
    @endif
@endisset
@isset($section4)
	<div class="row" style="background-color: #F2F2F2;">
		<div class="col-sm-12 col-md-6 pt-5 mb-3">
            <div class="mx-auto" style="max-width: 80%;">
                <h3 class="mb-3 mx-auto font-size-30 text-dark">{{$section4->content_1}}</h3>
                <div class="mx-auto font-size-16">{!!$section4->content_2!!}</div>
                <div class="">
                    <a href="https://docs.google.com/forms/d/e/1FAIpQLSdaKGuaISpwXEWrrMps1McOK7T_6PBZERbMq5iwvZa1-OQZKw/viewform" target="_blank" class="text-uppercase bg-red py-2 px-5 fw-bold text-decoration-none text-white font-size-14">REALIZAR ENCUESTA</a>
                </div>
            </div>
		</div>
		<div class="col-sm-12 col-md-6 position-relative">
			@if ($section4->image)
				@if (Storage::disk('custom')->exists($section4->image))
					<img src="{{ asset($section4->image) }}" class="img-fluid d-block mx-auto">
				@endif
			@endif
            <div class="position-absolute d-sm-none d-md-block" style="top: 0; height: 100%; background-color: #F2F2F2; z-index: 100;
            width: 200px; clip-path: polygon(51% 0, 100% 0, 52% 100%, 51% 100%); left: -90px;"></div>
		</div>
	</div>
@endisset
@endsection