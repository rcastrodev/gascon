<footer class="py-sm-2 py-md-5 font-size-15 bg-red text-sm-center text-md-start">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-sm-12 col-md-3 d-sm-none d-md-block">
                <div class="">
                    <a href="{{ route('index') }}">
                        <img src="{{ asset($data->logo_footer) }}" alt="" class="d-block img-fluid mb-4">
                    </a>
                    <div class="w-100"></div>
                    <div class="d-flex">
                        @if (Storage::disk('custom')->exists($data->logo_footer2))
                            <img src="{{ asset($data->logo_footer2) }}" class="d-block me-2" style="width: 64px; height:55px">
                        @endif
                        @if (Storage::disk('custom')->exists($data->logo_footer2))
                            <img src="{{ asset($data->logo_footer3) }}" style="width: 64px; height:55px">
                        @endif
                    </div>
                </div>
                <div class="mt-4">
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
            </div>
            <div class="col-sm-12 col-md-4 d-sm-none d-md-block">
                <h6 class="text-uppercase text-light mb-4">secciones</h6>
                <div class="row">
                    <div class="col-sm-12 col-md-5">
                        <a href="{{ route('index') }}" class="d-block text-decoration-none text-light mb-2">Inicio</a>
                        <a href="{{ route('empresa') }}" class="d-block text-decoration-none text-light mb-2">Empresa</a>
                        <a href="{{ route('categorias') }}" class="d-block text-decoration-none text-light mb-2">Productos</a>
                        <a href="{{ route('novedades') }}" class="d-block text-decoration-none text-light mb-2">Novedades</a>
                        <a href="{{ route('clientes') }}" class="d-block text-decoration-none text-light mb-2">Clientes</a>
                    </div>
                    <div class="col-sm-12 col-md-7">
                        <a href="{{ route('representantes') }}" class="d-block text-decoration-none text-light mb-2">Representadas</a>
                        <a href="{{ route('oficinas') }}" class="d-block text-decoration-none text-light mb-2">Oficinas</a>
                        <a href="{{ route('calidad') }}" class="d-block text-decoration-none text-light mb-2">Calidad</a>
                        <a href="{{ route('contacto') }}" class="d-block text-decoration-none text-light mb-2">Contacto</a>
                        <a href="{{ route('rrhh') }}" class="d-block text-decoration-none text-light mb-2">RRHH</a>
                    </div>
                </div>                
            </div>
            <div class="col-sm-12 col-md-5 font-size-13 mb-sm-4 mb-md-0">
                <div class="row">
                    <h6 class="text-uppercase text-light mb-4">Datos de contacto</h6>
                    <div class="row">
                        <div class="col-sm-12 col-md-7">
                            <div class="d-flex mb-2">
                                <i class="fas fa-map-marker-alt d-block me-3 mb-3 text-light font-size-20"></i>
                                <span class="d-block text-light text-start"> {{ $data->address }}</span>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="fas fa-phone-alt d-block me-3 mb-3 text-light font-size-20"></i>
                                <div class="d-flex flex-column">
                                    @php $phone = Str::of($data->phone1)->explode('|') @endphp
                                    @if (count($phone) == 2)
                                        <a href="tel:{{ $phone[0]}}" class="text-light underline mb-1">{{ $phone[1] }}</a>  
                                    @else 
                                        <a href="tel:{{ $data->phone1}}" class="text-light underline mb-1">{{ $data->phone1 }}</a>  
                                    @endif
                                </div>
                            </div>  
                            <div class="d-flex">
                                <i class="fas fa-envelope d-block me-3 mb-3 text-light font-size-20"></i>
                                <span class="d-block"></span>
                                <a href="mailto:{{ $data->email }}" class="text-light underline">{{ $data->email }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="py-4 text-end bg-dark">
    <div class="container mx-auto d-flex justify-content-between">
        <div class="text-light">Todos los derechos reservados. Hercules Ratigan son marcas registradas por Establecimientos Gascón S.A. en la República Argentina</div>
        <a href="https://osole.com.ar/" class="text-light text-decoration-none">BY OSOLE</a>
    </div>
</div>
@if($data->phone3)
    <a href="https://wa.me/{{$data->phone3}}" class="position-fixed" style="background-color: #0DC143; color: white; font-size: 40px; padding: 0px 13px; border-radius: 100%; bottom: 30px; right: 40px;">
        <i class="fab fa-whatsapp"></i>
    </a>
@endif