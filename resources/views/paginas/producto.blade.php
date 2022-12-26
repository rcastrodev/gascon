@extends('paginas.partials.app')
@section('content')
@isset($product)
<div aria-label="breadcrumb" class="bg-light py-sm-1 py-md-3 font-size-14 mb-5">
    <ol class="breadcrumb container text-uppercase">
        <li class="breadcrumb-item">
            <a href="{{ route('index') }}" class="text-decoration-none">Inicio</a>
        </li>
        <li class="breadcrumb-item"><a href="{{ route('categoria', ['id'=> $product->category->id]) }}" class="text-decoration-none">{{$product->category->name}}</a></li>
        <li class="breadcrumb-item active fw-bold" aria-current="page">{{$product->name}}</li>
    </ol>
</div> 
@endisset
<div class="py-sm-2">
    <div class="container">
        <div class="row">
            <aside class="col-sm-12 col-md-3 d-sm-none d-md-block">
                <h5 class="mb-3 text-uppercase">Categorías</h5>
                <ul class="p-0" style="list-style: none;">
                    @foreach ($categories as $c)
                        <li class="py-2 @if($c->id == $product->category->id) active @endif"> 
                            <a href="#" class="toggle d-block p-2 text-decoration-none  text-decoration-none font-size-14 position-relative @if($c->id == $product->category->id) text-danger activee @endif">{{$c->name}} <i class="fal @if($c->id == $product->category->id) fa-angle-up @else fa-angle-down @endif icon-product-sidebar position-absolute" style="right: 10px; font-size: 20px;"></i></a>
                            <ul class="mt-3 ps-0 {{ ($c->id == $product->category->id) ? '' : 'rd-none' }}" style="list-style: none">
                                @foreach ($c->products as $cp)
                                    <li class="ps-4 py-2" style="@if($cp->id == $product->id) background-color: #F2F2F2; @endif">
                                        <a href="{{ route('producto', ['product' => $cp->id]) }}" class="text-blue-dark text-decoration-none font-size-14 d-inline-block" style="@if($cp->id == $product->id) font-weight: bold; @endif">{{$cp->name}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>                        
                    @endforeach
                </ul>             
            </aside>
            <section class="producto col-sm-12 col-md-9 font-size-14">
                <div class="row mb-5">
                    <div class="col-sm-12 col-md-6">
                        <div id="carouselProduct" class="carousel slide border border-light border-2 mb-3" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @if (count($product->images))
                                    <div class="carousel-item active">
                                        <img src="{{ asset($product->images()->first()->image) }}" id="imagen-actual" class="d-block w-100 img-fluid" style="object-fit: contain; min-height: 350px; max-height: 350px; min-width: 100%; max-width: 100%;" alt="{{$product->name}}">
                                    </div>   
                                @else 
                                    <div class="carousel-item active">
                                        <img src="{{ asset('images/default.jpg') }}" class="d-block w-100 img-fluid" style="object-fit: contain;
                                    min-width: 100%; max-width: 100%;"> 
                                    </div>                                   
                                @endif
                            </div>
                        </div>
                        @if (count($product->images))
                            <div class="col-md-5">
                                <ul class="d-flex flex-wrap p-0" style="list-style: none;">
                                    @foreach ($product->images as $pi)
                                        <li class="me-2 mb-2 border-light" style="border: 2px solid;">
                                            <img src="{{ asset($pi->image) }}" width="85" class="imagenes" style="height: 100%; object-fit: contain; cursor:pointer">
                                        </li>                 
                                    @endforeach
                                </ul>
                            </div>   
                        @endif
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <h1 class="font-size-32 text-uppercase text-danger fw-bold mb-4 pb-2">{{ $product->name }}</h1>   
                        <div class="mb-sm-2 mb-md-5  mb-5">
                            <h6 class="fw-bold text-uppercase font-size-18">DESCRIPCIÓN:</h6>
                            <div class="font-size-15">{!! $product->description !!}</div>
                        </div>
                        <div class="">
                            @if ($product->extra2)
                                <a href="{{ route('ficha-tecnica', ['id'=> $product->id, 'column' => 'extra2']) }}" class="px-3 btn ficha-tecnica font-size-15 align-items-center text-danger d-block mb-3" style="border: 2px solid #CE2027;">DESCARGAR PLANOS</a>  
                            @endif
                            @if ($product->extra)
                                <a href="{{ route('ficha-tecnica', ['id'=> $product->id, 'column' => 'extra']) }}" class="px-3 btn ficha-tecnica font-size-15 align-items-center text-danger d-block mb-3" style="border: 2px solid #CE2027;">DESCARGAR FICHA TÉCNICA</a>  
                            @endif
                            <a href="{{ route('contacto') }}" class="px-3 btn ficha-tecnica font-size-15 align-items-center text-white bg-red d-block mb-3">SOLICITAR PRESUPUESTO</a>  
                        </div>   
                    </div>
                    @if (count($product->variableProducts))
                        @php $amounts   = []; @endphp  
                        @foreach ($product->variableProducts()->orderBy('order', 'ASC')->get() as $vp)
                            @php $amounts[] = count(Str::of($vp->content)->explode('|')); @endphp
                        @endforeach
                        <div class="col-sm-12 mt-md-5 mt-sm-2">
                            <div class="table-responsive">
                                <table class="table table table-striped">
                                    <tbody class="text-center">
                                        <tr class="text-danger">
                                            <td class="fw-bold text-center">ESPECIFICACIONES</td>
                                            <td colspan="{{ max($amounts) }}" class="text-center fw-bold">CODIGO E.M.G</td>
                                        </tr>
                                        @foreach ($product->variableProducts()->orderBy('order', 'ASC')->get() as $vp)
                                            @php $values = Str::of($vp->content)->explode('|'); @endphp
                                            <tr>
                                                <td>{{ $vp->title }}</td>
                                                @if ($vp->content)
                                                    @if (count($values) > 1)
                                                        @foreach ($values as $value)
                                                            <td class="text-center"
                                                                @if (max($amounts) > count($values))
                                                                    colspan="{{ max($amounts) / count($values)}}"
                                                                @endif
                                                            >{{ $value }}</td>
                                                        @endforeach
                                                    @else
                                                        <td colspan="{{ max($amounts) }}">{{ $vp->content }}</td>
                                                    @endif
                                                @else
                                                    <td></td>
                                                @endif
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>  
                    @endif
       
                    @if ($product->productAttributes->video1 || $product->productAttributes->video2)
                        <div class="col-sm-12 mt-md-5 mt-sm-2 videos">
                            <h5 class="text-uppercase fw-bold mb-3">Video</h5>
                            <div class="mb-2">{!! $product->productAttributes->video1 !!}</div>
                            <div class="mb-2">{!! $product->productAttributes->video2 !!}</div>
                        </div>    
                    @endif
                    @if ($product->productAttributes->training)
                        <div class="col-sm-12 mt-md-5 mt-sm-2">
                            <div class="bg-light p-3">
                                <div class="d-flex justify-content-between mb-3">
                                    <h2 class=" text-uppercase font-size-25 fw-bold m-0">CAPACITACIÓN</h2>
                                    <a href="{{ route('contacto') }}" class="text-danger text-decoration-none font-size-14 py-2 px-4" style="border: 1px solid #CE2027;">SOLICITAR CAPACITACIÓN</a>
                                </div>
                                <div class="text-dark" style="max-width: 600px;">{!! $product->productAttributes->training !!}</div>
                            </div>
                        </div>                          
                    @endif
                    @if (count($product->products))
                        <div class="col-sm-12 mt-md-5 mt-sm-2">
                            <h2 class="mb-4 text-uppercase font-size-22 text-dark col-sm-12 pb-2">PRODUCTOS RELACIONADOS</h2>
                            <div class="productos-relacionados row">
                                @foreach ($product->products as $rp)
                                    <div class="col-sm-12 col-md-4 mb-3">
                                        @includeIf('paginas.partials.producto', ['p' => $rp])
                                    </div>
                                @endforeach
                            </div>
                        </div>              
                    @endif
                </div>       
            </section>
        </div>
    </div>
</div>
@endsection
@push('head')
    <style>
        td{
            border-right: 1px solid #DFDFDF !important;
        }
        .carousel-control-prev-icon {
            background-image: url("{{ asset('images/left.svg') }}") !important;
        }
        .carousel-control-next-icon {
            background-image: url("{{ asset('images/right.svg') }}") !important;
        }
        ul li img {
            width: 70px !important;
            height: 70px !important;
        }
        
        @media(max-width:500px){
            .carousel-inner, .carousel-item, .carousel-item img{
                min-height: 200px !important;
                max-height: 200px !important;
            }
        }
    </style>
@endpush
@push('scripts')
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/pages/product.js') }}"></script>
    <script>
        $('.imagenes').click(function (e){
            e.preventDefault()
            $('#imagen-actual').attr('src', e.target.src)
        })
    </script>
@endpush



