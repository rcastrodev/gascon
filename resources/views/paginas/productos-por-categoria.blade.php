@extends('paginas.partials.app')
@section('content')
<div aria-label="breadcrumb" class="bg-light py-sm-1 py-md-3 font-size-14 mb-5">
	<div class="container">
		<ol class="breadcrumb text-uppercase">
			<li class="breadcrumb-item"><a href="{{ route('categorias') }}" class="text-decoration-none">Productos</a></li>
			<li class="breadcrumb-item active fw-bold" aria-current="page">{{ $category->name }}</li>
		</ol>
	</div>
</div>
@isset($categories)
    @if (count($categories))
        <section>
            <div class="container row py-2 mx-auto px-0">
                <aside class="col-sm-12 col-md-3 d-sm-none d-md-block">
                    <h5 class="mb-3 text-uppercase">Categorías</h5>
                    <ul class="p-0" style="list-style: none;">
                        @foreach ($categories as $c)
                            <li class="py-2 @if($c->name == $category->name) active @endif"> 
                                <a href="#" class="toggle d-block p-2 text-decoration-none font-size-14 d-inline-block position-relative @if($c->name == $category->name) activee text-danger @endif">{{$c->name}}
                                    <i class="fal  @if($c->name == $category->name) fa-angle-up @else fa-angle-down @endif icon-product-sidebar position-absolute" style="right: 10px; font-size: 20px;"></i>
                                </a>
                                <ul class="mt-3 p-0 {{ ($c->id == $category->id) ? '' : 'rd-none' }}" style="list-style: none">
                                    @foreach ($c->products as $cp)
                                        <li class="py-1">
                                            <a href="{{ route('producto', ['product' => $cp->id]) }}" class="text-blue-dark text-decoration-none ps-4 font-size-14 d-inline-block">{{$cp->name}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>                        
                        @endforeach
                    </ul>
                </aside>
                <section class="col-sm-12 col-md-9 font-size-14">
                    <div class="row productos">
                        @isset($products)
                            @foreach ($products as $p)
                                <div class="col-sm-12 col-md-4 mb-3">
                                    @include('paginas.partials.producto', ['p' => $p])
                                </div>
                            @endforeach                    
                        @endisset
                    </div>
                </section>
            </div>
        </section>
    @endif
@endisset

@endsection
@push('scripts')
    <script src="{{ asset('js/pages/product.js') }}"></script>
@endpush


