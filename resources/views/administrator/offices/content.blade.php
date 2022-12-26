@extends('adminlte::page')
@section('title', 'Oficinas')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-3">Oficinas</h1>
    </div>
@stop
@section('content')
    @include('administrator.partials.mensaje-exitoso')
    @include('administrator.partials.mensaje-error')
    @isset($section1)
        <form action="{{ route('office.update-info') }}" class="mb-5" method="post" enctype="multipart/form-data" data-asyn="no">
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
                <small>Tamaño recomendado 1366x193px</small>
            </div> 
            <div class="py-4">
                <button class="btn btn-primary">Actualizar</button>
            </div>
        </form>
    @endisset
    <div class="row mb-5">
        <div class="col-sm-12">
            <div class="d-flex">
                <h3 class="mr-3">Oficinas</h3>
                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-create-element">crear</button>
            </div>
            <table id="page_table_slider" class="table">
                <thead>
                    <tr>
                        <th>Orden</th>
                        <th>Contenido</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>



@includeIf('administrator.offices.modals.create')
@includeIf('administrator.offices.modals.update')
@stop
@section('css')
    <meta name="_token" content="{{csrf_token()}}">
    <meta name="url" content="{{route('office.content')}}">
    <meta name="content_find" content="{{route('content')}}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop

@section('js')
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/admin/index.js') }}"></script>
    <script src="{{ asset('js/admin/offices/index.js') }}"></script>
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
@stop

