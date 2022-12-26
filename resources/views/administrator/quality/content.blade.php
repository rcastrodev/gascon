@extends('adminlte::page')
@section('title', 'Calidad')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-2">Calidad</h1>
    </div>
@stop
@section('content')
@include('administrator.partials.mensaje-exitoso')
@include('administrator.partials.mensaje-error')
@isset($section1)
    <form action="{{ route('quality.content.updateInfo') }}" class="mb-5" method="post" enctype="multipart/form-data" data-asyn="no">
        @csrf
        <input type="hidden" name="id" value="{{$section1->id}}">
        <div class="form-group mb-3">
            <input type="text" name="content_1" value="{{$section1->content_1}}" class="form-control">
        </div>
        <div class="mb-3">
            @if (Storage::disk('custom')->exists($section1->image))
                <img src="{{ asset($section1->image) }}" class="img-fluid">  
            @endif
        </div>  
        <div class="form-group">
            <input type="file" name="image" class="form-control-file">
            <small>Tamaño recomendado 1366x283px</small>
        </div> 
        <div class="py-4">
            <button class="btn btn-primary">Actualizar</button>
        </div>
    </form>
@endisset
@isset($section2)
    <form action="{{ route('quality.content.updateInfo') }}" class="mb-5" method="post" data-asyn="no" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{$section2->id}}">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <textarea name="content_2" class="ckeditor" cols="30" rows="10">{{$section2->content_2}}</textarea>
                </div>
            </div>
            <div class="col-sm-12 col-md-3">
                <div class="mb-3">
                    <div class="form-group">
                        <small>imagen 590x560 px</small>
                        <input type="file" name="image" class="form-control-file">
                    </div>
                    @if (Storage::disk('custom')->exists($section2->image))
                        <div class="mb-3">
                            <img src="{{ asset($section2->image) }}" class="img-fluid" style="max-width: 400px;">
                            <button class="btn btn-danger borrar-imagen btn-sm d-inline-block mb-2 mr-4" data-url="{{ route('archive-destroy', ['id'=>$section2->id, 'column' => 'image']) }}">Borrar imagen</button>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-sm-12 col-md-3">
                <div class="mb-3">
                    <div class="form-group">
                        <small>imagen 590x560 px</small>
                        <input type="file" name="image2" class="form-control-file">
                    </div>
                    @if (Storage::disk('custom')->exists($section2->image2))
                        <div class="mb-3">
                            <img src="{{ asset($section2->image2) }}" class="img-fluid" style="max-width: 400px;">
                            <button class="btn btn-danger borrar-imagen btn-sm d-inline-block mb-2 mr-4" data-url="{{ route('archive-destroy', ['id'=>$section2->id, 'column' => 'image2']) }}">Borrar imagen</button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <button class="btn btn-primary">Actualizar</button>
    </form>  
@endisset
<div class="row mb-5">
    <div class="col-sm-12">
        <div class="d-flex">
            <h3 class="mr-3">Descargarbles</h3>
            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-create-element">crear</button>
        </div>
        <table id="page_table_slider" class="table">
            <thead>
                <tr>
                    <th>Orden</th>
                    <th>Contenido</th>
                    <th>Descargable</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@isset($section3)
    <form action="{{ route('quality.content.updateInfo') }}" class="mb-5" method="post" data-asyn="no" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{$section3->id}}">
        <div class="form-group ">
            <input type="text" name="content_1" value="{{$section3->content_1}}" class="form-control">
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <textarea name="content_2" class="ckeditor" cols="30" rows="10">{{$section3->content_2}}</textarea>
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <textarea name="content_3" class="ckeditor" cols="30" rows="10">{{$section3->content_3}}</textarea>
                </div>
            </div>
        </div>
        <button class="btn btn-primary">Actualizar</button>
    </form>  
@endisset
@isset($section4)
    <form action="{{ route('quality.content.updateInfo') }}" class="mb-5" method="post" data-asyn="no" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{$section4->id}}">
        <div class="row">
            <div class="col-sm-12 col-md-8">
                <div class="form-group ">
                    <input type="text" name="content_1" value="{{$section4->content_1}}" class="form-control">
                </div>
                <div class="form-group">
                    <textarea name="content_2" class="ckeditor" cols="30" rows="10">{{$section4->content_2}}</textarea>
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="form-group">
                    <small>imagen 590x560 px</small>
                    <input type="file" name="image" class="form-control-file">
                </div>
                @if (Storage::disk('custom')->exists($section4->image))
                    <div class="mb-3">
                        <img src="{{ asset($section4->image) }}" class="img-fluid" style="max-width: 400px;">
                    </div>
                @endif
            </div>
        </div>
        <button class="btn btn-primary w-100">Actualizar</button>
    </form>  
@endisset
@includeIf('administrator.quality.modals.create')
@includeIf('administrator.quality.modals.update')
@stop
@section('css')
    <meta name="_token" content="{{csrf_token()}}">
    <meta name="url" content="{{route('quality.content')}}">
    <meta name="content_find" content="{{route('content')}}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop

@section('js')
    <script src="{{ asset('/vendor/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/admin/index.js') }}"></script>
    <script src="{{ asset('js/admin/quality/index.js') }}"></script>
@stop

