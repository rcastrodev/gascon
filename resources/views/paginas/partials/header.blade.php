<div id="pre-header" class="d-sm-none d-md-block bg-dark font-size-12 position-relative py-1">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <div class="">
                <div class="me-3 d-inline-block">
                    <i class="fas fa-phone-alt text-light me-1"></i> 
                    @php $phone1 = Str::of($data->phone1)->explode('|') @endphp
                    @if (count($phone1) == 2)
                        <a href="tel:{{$phone1[0]}}" class="text-light underline underline">{{ $phone1[1] }}</a>
                    @else 
                        <a href="tel:{{$data->phone1}}" class="text-light underline underline">{{ $data->phone1 }}</a>
                    @endif    
                </div>
                <div class="d-inline-block email me-3">
                    <a href="mailto:{{ $data->email }}" class="mb-xs-2 mb-md-0 text-light underline underline" style="z-index: 100;">
                        <i class="fas fa-envelope text-light me-1"></i> {{ $data->email }}
                    </a>
                </div>
            </div>
            <div class="d-flex align-items-center" style="z-index: 100;">
                <div id="redes-sociales">    
                    <a href="{{$data->instagram}}" class="text-light text-decoration-none p-2 py-3">
                        <i class="fab fa-instagram icon-redsocial"></i>
                    </a>
                    <a href="{{$data->youtube}}" class="text-light text-decoration-none p-2 py-3">
                        <i class="fab fa-youtube icon-redsocial"></i>
                    </a>
                    <a href="{{$data->facebook}}" class="text-light text-decoration-none p-2 py-3">
                        <img src="{{ asset('images/Grupo_788.svg') }}" alt="">
                    </a>
                    <a href="{{$data->linkedin}}" class="text-light text-decoration-none p-2 py-3">
                        <img src="{{ asset('images/Grupo_794.svg') }}" alt="">
                    </a>
                </div>
                <form action="{{ route('productos') }}"  class="form-pre-header">
                    <div class="input-group">
                        <input type="text" name="b" class="form-control bg-transparent border-end-0 input-search p-0" placeholder="Buscar ...">
                        <button type="submit" class="input-group-text bg-transparent border-start-0">
                            <img src="{{ asset('images/shapes-and-symbols.svg') }}" alt="">
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-light sticky-top bg-white">
    <div class="container">
        <a class="navbar-brand" href="{{ route('index') }}">
            <img src="{{ asset($data->logo_header) }}" alt="" class="img-fluid logo-header">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center text-uppercase position-relative py-md-4 py-sm-2" id="navbarNav">
            <ul class="navbar-nav justify-content-end align-items-sm-start align-items-md-center w-100">
                <li class="nav-item menu me-4 @if(Request::is('empresa')) position-relative @endif">
                    <a class="nav-link text-dark font-size-16 @if(Request::is('empresa')) active @endif" href="{{ route('empresa') }}">Empresa <i class="fal fa-angle-down icon-header-nav position-relative" style="left: 5px"></i></a>
                    <ul class="sub-menu">
                        <li class="mb-1"><a href="{{ route('empresa') }}" class="text-decoration-none text-dark font-size-16">Nuestra empresa</a></li>
                        <li class="mb-1"><a href="{{ route('clientes') }}" class="text-decoration-none text-dark font-size-16">Clientes</a></li>
                        <li class="mb-1"><a href="{{ route('representantes') }}" class="text-decoration-none text-dark font-size-16">Representantes</a></li>
                        <li class="mb-1"><a href="{{ route('oficinas') }}" class="text-decoration-none text-dark font-size-16">Oficinas</a></li>
                    </ul>
                </li>
                <li class="nav-item menu me-4 @if(Request::is('categorias') || Request::is('categoria/*') ||  Request::is('productos') || Request::is('productos/*') || Request::is('producto/*')) position-relative @endif">
                    <a class="nav-link text-dark font-size-16 @if(Request::is('categorias') || Request::is('categoria/*') || Request::is('productos') || Request::is('productos/*') || Request::is('producto/*')) active @endif" href="{{ route('categorias') }}">Productos <i class="fal fa-angle-down icon-header-nav position-relative" style="left: 5px"></i></a>
                    <ul class="sub-menu">
                        @foreach ($gCategories as $gCategory)
                            <li class="mb-1"><a href="{{ route('categoria', ['id'=>$gCategory->id]) }}" class="text-decoration-none text-dark font-size-16">{{ $gCategory->name }}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item me-4 @if(Request::is('novedades') || Request::is('novedad/*')) position-relative @endif">
                    <a class="nav-link text-dark font-size-16 @if(Request::is('novedades') || Request::is('novedad/*')) active @endif" href="{{ route('novedades') }}" >Novedades</a>
                </li>
                <li class="nav-item me-4 @if(Request::is('calidad')) position-relative @endif">
                    <a class="nav-link text-dark font-size-16 @if(Request::is('calidad')) active @endif" href="{{ route('calidad') }}" >Calidad</a>
                </li>
                <li class="nav-item @if(Request::is('contacto')) position-relative @endif">
                    <a class="nav-link text-dark font-size-16 @if(Request::is('contacto')) active @endif" href="{{ route('contacto') }}" >Contacto</a>
                </li>
            </ul>
        </div>
    </div>
</nav>  
