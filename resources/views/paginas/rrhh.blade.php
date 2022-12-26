@extends('paginas.partials.app')
@section('content')
@includeIf('paginas.partials.hero', ['section1' => $section1])
<div class="my-5">
    <div class="container">
        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            @foreach ($errors->all() as $error)
                <span class="d-block">{{$error}}</span>
            @endforeach
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>  
        @endif
        @if (Session::has('mensaje'))
        <div class="alert alert-{{Session::get('class')}} alert-dismissible fade show" role="alert">
            <strong>{{ Session::get('mensaje') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>                    
        @endif
        <form action="{{ route('send-workWithUs') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-sm-12 col-md-6 font-size-14 mb-5">
                    <h5 class="mb-3 font-size-24 fw-bold">{{ $section2->content_1 }}</h5>
                    <div class="font-size-18">{!! $section2->content_2 !!}</div>
                </div>
                <div class="col-sm-12 col-md-8">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 mb-3">
                            <div class="form-group">
                                <label for="">Nombre y apellido *</label>
                                <input type="text" name="nombre" placeholder="" class="form-control font-size-14">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-sm-3 mb-sm-3">
                            <div class="form-group">
                                <label for="">Correo Electrónico *</label>
                                <input type="email" name="email" class="form-control font-size-14">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-3">
                            <div class="form-group">
                                <label for="">Teléfono</label>
                                <input type="text" name="telefono"  class="form-control font-size-14">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 d-flex align-items-between flex-column justify-content-start">
                            <label for="" class="d-block">Curriculum *</label>
                            <input type="file" name="file" class="form-control-file">
                        </div>

                        <div class="col-sm-12 mb-sm-3 mb-sm-3 text-end mt-4">
                            <span class="d-inline-block me-2" style="color: #939598;">* campos obligatorios</span>
                            <button type="submit" class="text-uppercase btn bg-red font-size-14 py-2 font-weight-600 mb-sm-3 mb-md-0 ancho-boton text-white px-5">ENVIAR MENSAJE</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection