@extends('paginas.partials.app')
@section('content')
@includeIf('paginas.partials.hero', ['section1' => $section1])
@isset($section2s)
	@if (count($section2s))
	<section class="py-3 container">
        <ul class="nav nav-tabs mb-5" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="todas-tab" data-bs-toggle="tab" data-bs-target="#todas" type="button" role="tab" aria-controls="todas" aria-selected="true">TODAS</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="nuevo-tab" data-bs-toggle="tab" data-bs-target="#nuevo" type="button" role="tab" aria-controls="nuevo" aria-selected="false">NUEVO PRODUCTO</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="evento-tab" data-bs-toggle="tab" data-bs-target="#evento" type="button" role="tab" aria-controls="evento" aria-selected="false">EVENTO</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="capacitaciones-tab" data-bs-toggle="tab" data-bs-target="#capacitaciones" type="button" role="tab" aria-controls="capacitaciones" aria-selected="false">CAPACITACIONES</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="todas" role="tabpanel" aria-labelledby="todas-tab">
                <div class="row mx-auto">
                    @foreach ($section2s as $t)
                        <div class="col-sm-12 col-md-4 mb-md-5 mb-sm-3">
                            <a href="{{ route('novedad', ['id'=>$t]) }}" class="card text-decoration-none novedad">
                                @if ($t->image)
                                    @if (Storage::disk('custom')->exists($t->image))
                                        <img src="{{ asset($t->image) }}" class="card-img-top img-fluid" style="height: 311px; object-fit:cover;">
                                    @else
                                        <img src="images/default.jpg" class="card-img-top img-fluid" style="height: 311px; object-fit:cover;">
                                    @endif	
                                @else
                                    <img src="images/default.jpg" class="card-img-top img-fluid" style="height: 311px; object-fit:cover;">
                                @endif
                                <div class="card-body text-dark position-relative">
                                    <span class="text-danger d-block mb-3 fw-bold font-size-16">{{ $t->content_3 }}</span>
                                    <h5 class="card-title mb-4 font-size-22 fw-bold">{{ $t->content_1 }}</h5>
                                    <div class="card-text font-size-18" Str::limit($t->content_2, 200) !!}</div>
                                    
                                    <div class="position-absolute d-flex justify-content-between" style="bottom: 10px; left: 20px; right: 20px;">
                                        <span>{{ date_format($t->created_at, 'd/m/Y') }}</span>
                                        <span>ver más</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="tab-pane fade" id="nuevo" role="tabpanel" aria-labelledby="nuevo-tab">
                <div class="row mx-auto">
                    @foreach ($section2s->where('content_3', 'NUEVO PRODUCTO') as $n)
                        <div class="col-sm-12 col-md-4 mb-md-5 mb-sm-3">
                            <a href="{{ route('novedad', ['id'=>$n]) }}" class="card text-decoration-none novedad">
                                @if ($n->image)
                                    @if (Storage::disk('custom')->exists($n->image))
                                        <img src="{{ asset($n->image) }}" class="card-img-top img-fluid" style="height: 311px; object-fit:cover;">
                                    @else
                                        <img src="images/default.jpg" class="card-img-top img-fluid" style="height: 311px; object-fit:cover;">
                                    @endif	
                                @else
                                    <img src="images/default.jpg" class="card-img-top img-fluid" style="height: 311px; object-fit:cover;">			
                                @endif
                                <div class="card-body text-dark position-relative">
                                    <span class="text-danger d-block mb-3 fw-bold font-size-16">{{ $n->content_3 }}</span>
                                    <h5 class="card-title mb-4 font-size-22 fw-bold">{{ $n->content_1 }}</h5>
                                    <div class="card-text font-size-18">{!! Str::limit($n->content_2, 200) !!}</div>
                                    <div class="position-absolute d-flex justify-content-between" style="bottom: 10px; left: 20px; right: 20px;">
                                        <span>{{ date_format($n->created_at, 'd/m/Y') }}</span>
                                        <span>ver más</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="tab-pane fade" id="evento" role="tabpanel" aria-labelledby="evento-tab">
                <div class="row mx-auto">
                    @foreach ($section2s->where('content_3', 'EVENTO') as $e)
                        <div class="col-sm-12 col-md-4 mb-md-5 mb-sm-3">
                            <a href="{{ route('novedad', ['id'=>$e]) }}" class="card text-decoration-none novedad">
                                @if ($e->image)
                                    @if (Storage::disk('custom')->exists($e->image))
                                        <img src="{{ asset($e->image) }}" class="card-img-top img-fluid" style="height: 311px; object-fit:cover;">
                                    @else
                                        <img src="images/default.jpg" class="card-img-top img-fluid" style="height: 311px; object-fit:cover;">
                                    @endif	
                                @else
                                    <img src="images/default.jpg" class="card-img-top img-fluid" style="height: 311px; object-fit:cover;">			
                                @endif
                                <div class="card-body text-dark position-relative">
                                    <span class="text-danger d-block mb-3 fw-bold font-size-16">{{ $e->content_3 }}</span>
                                    <h5 class="card-title mb-4 font-size-22 fw-bold">{{ $e->content_1 }}</h5>
                                    <div class="card-text font-size-18">{!! Str::limit($e->content_2, 200) !!}</div>
                                    <div class="position-absolute d-flex justify-content-between" style="bottom: 10px; left: 20px; right: 20px;">
                                        <span>{{ date_format($e->created_at, 'd/m/Y') }}</span>
                                        <span>ver más</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="tab-pane fade" id="capacitaciones" role="tabpanel" aria-labelledby="capacitaciones-tab">
                <div class="row mx-auto">
                    @foreach ($section2s->where('content_3', 'CAPACITACIONES') as $c)
                        <div class="col-sm-12 col-md-4 mb-md-5 mb-sm-3">
                            <a href="{{ route('novedad', ['id'=>$c]) }}" class="card text-decoration-none novedad">
                                @if ($c->image)
                                    @if (Storage::disk('custom')->exists($c->image))
                                        <img src="{{ asset($c->image) }}" class="card-img-top img-fluid" style="height: 311px; object-fit:cover;">
                                    @else
                                        <img src="images/default.jpg" class="card-img-top img-fluid" style="height: 311px; object-fit:cover;">
                                    @endif	
                                @else
                                    <img src="images/default.jpg" class="card-img-top img-fluid" style="height: 311px; object-fit:cover;">			
                                @endif
                                <div class="card-body text-dark position-relative">
                                    <span class="text-danger d-block mb-3 fw-bold font-size-16">{{ $c->content_3 }}</span>
                                    <h5 class="card-title mb-4 font-size-22 fw-bold">{{ $c->content_1 }}</h5>
                                    <div class="card-text font-size-18">{!! Str::limit($c->content_2, 200) !!}</div>
                                    <div class="position-absolute d-flex justify-content-between" style="bottom: 10px; left: 20px; right: 20px;">
                                        <span>{{ date_format($c->created_at, 'd/m/Y') }}</span>
                                        <span>ver más</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
	</section>
	@endif
@endisset
@endsection