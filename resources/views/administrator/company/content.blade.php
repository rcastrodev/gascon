@extends('adminlte::page')
@section('title', 'Contenido empresa')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-2">Contenido empresa</h1>
        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-create-element">crear Slider</button>
    </div>
@stop
@section('content')
@include('administrator.partials.mensaje-exitoso')
@include('administrator.partials.mensaje-error')
<div class="row mb-5">
    <div class="col-sm-12">
        <table id="page_table_slider" class="table">
            <thead>
                <tr>
                    <th>Orden</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@isset($section2)
    <form action="{{ route('company.content.updateInfo') }}" class="mb-5" method="post" data-asyn="no" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{$section2->id}}">
        <div class="row">
            <div class="col-sm-12 col-md-8">
                <div class="form-group ">
                    <input type="text" name="content_1" value="{{$section2->content_1}}" class="form-control">
                </div>
                <div class="form-group">
                    <textarea name="content_2" class="ckeditor" cols="30" rows="10">{{$section2->content_2}}</textarea>
                </div>
                <div class="form-group ">
                    <input type="text" name="content_3" value="{{$section2->content_3}}" class="form-control">
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="mb-3">
                    <div class="form-group">
                        <small>imagen 392x196 px</small>
                        <input type="file" name="image" class="form-control-file">
                    </div>
                    @if (Storage::disk('custom')->exists($section2->image))
                        <div class="mb-3">
                            <img src="{{ asset($section2->image) }}" class="img-fluid" width="400" height="200">
                        </div>
                    @endif
                </div>
                <div class="mb-3">
                    <div class="form-group">
                        <small>imagen 392x196 px</small>
                        <input type="file" name="image2" class="form-control-file">
                    </div>
                    @if (Storage::disk('custom')->exists($section2->image2))
                        <div class="mb-3">
                            <img src="{{ asset($section2->image2) }}" class="img-fluid" width="400" height="200">
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <button class="btn btn-primary">Actualizar</button>
    </form>  
@endisset
@isset($section3)
    <form action="{{ route('company.content.updateInfo') }}" class="mb-5" method="post" data-asyn="no" enctype="multipart/form-data">
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
<div class="row mb-5">
    <div class="col-sm-12">
        <div class="d-flex">
            <h3 class="mr-2">compromiso</h3>
            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-create-compromise">crear</button>
        </div>
        <table id="page_table_compromise" class="table">
            <thead>
                <tr>
                    <th>Orden</th>
                    <th>Título</th>
                    <th>Contenido</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
<div class="row mb-5">
    <div class="col-sm-12">
        <div class="d-flex">
            <h3 class="mr-2">Otros</h3>
            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-create-others">crear</button>
        </div>
        <table id="page_table_others" class="table">
            <thead>
                <tr>
                    <th>Orden</th>
                    <th>Imagen</th>
                    <th>Título</th>
                    <th>Contenido</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@includeIf('administrator.company.modals.create')
@includeIf('administrator.company.modals.update')
@includeIf('administrator.company.compromise.create')
@includeIf('administrator.company.compromise.update')
@includeIf('administrator.company.others.create')
@includeIf('administrator.company.others.update')
@stop
@section('css')
    <meta name="_token" content="{{csrf_token()}}">
    <meta name="url" content="{{route('company.content')}}">
    <meta name="content_find" content="{{route('content')}}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop

@section('js')
    <script src="{{ asset('/vendor/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/admin/index.js') }}"></script>
    <script src="{{ asset('js/admin/company/index.js?version=1') }}"></script>
@stop

