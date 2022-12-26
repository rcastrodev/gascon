@extends('adminlte::page')
@section('title', 'Noveades')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-3">Noveades</h1>
    </div>
@stop
@section('content')
    @include('administrator.partials.mensaje-exitoso')
    @include('administrator.partials.mensaje-error')
    @isset($section1)
        <form action="{{ route('rrhh.update') }}" class="mb-5" method="post" enctype="multipart/form-data" data-asyn="no">
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
        <form action="{{ route('rrhh.update') }}" class="mb-5" method="post" enctype="multipart/form-data" data-asyn="no">
            @csrf
            <input type="hidden" name="id" value="{{$section2->id}}">
            <div class="form-group mb-3">
                <input type="text" name="content_1" value="{{$section2->content_1}}" class="form-control">
            </div>
            <div class="form-group col-sm-12">
                <label for="">Contenido</label>
                <textarea name="content_2" class="ckeditor" id="" cols="30" rows="10">{{$section2->content_2}}</textarea>
            </div>
            <div class="py-4">
                <button class="btn btn-primary">Actualizar</button>
            </div>
        </form>
    @endisset
@stop
@section('css')
    <meta name="_token" content="{{csrf_token()}}">
    <meta name="url" content="{{route('rrhh.content')}}">
    <meta name="content_find" content="{{route('content')}}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop

@section('js')
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/admin/index.js') }}"></script>
    <script src="{{ asset('js/admin/rrhh/index.js') }}"></script>
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
@stop

