@extends('adminlte::page')
@section('title', 'Crear producto')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-3">Crear producto</h1>
        <a href="{{ route('product.content') }}" class="btn btn-sm btn-primary">ver productos</a>
    </div>
@stop
@section('content')
<div class="row">
    @includeIf('administrator.partials.mensaje-exitoso')
    @includeIf('administrator.partials.mensaje-error')
</div>
<div class="card card-primary">
    <div class="card-header"></div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{ route('product.content.store') }}" method="post" enctype="multipart/form-data">
        <div class="card-body row">
            @csrf
            <div class="form-group col-sm-12 col-md-4">
                <label for="">Nombre del producto</label>
                <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Nombre del producto">
            </div>
            <div class="form-group col-sm-12 col-md-4">
                <label>Categoría</label>
                <select name="category_id" class="form-control select2">
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-sm-12 col-md-2">
                <label for="">Orden</label>
                <input type="text" name="order" value="{{old('order')}}" class="form-control" placeholder="AA">
            </div>
            <div class="form-group col-sm-12 col-md-2 d-flex flex-column align-items-center">
                <label for="">Es destacado ?</label>
                <input type="checkbox" name="outstanding" value="1" @if(old('outstanding')) checked @endif>
            </div>
            <div class="form-group col-sm-12">
                <label for="">Descripción</label>
                <textarea name="description" class="ckeditor" id="" cols="30" rows="10">{{old('description')}}</textarea>
            </div>
            <div class="form-group col-sm-12 col-md-6">
                <label>Descarga de planos</label>
                <input type="file" name="extra2" class="form-control-file">
            </div>    
            <div class="form-group col-sm-12 col-md-6">
                <label>Ficha técnica</label>
                <input type="file" name="extra" class="form-control-file">
            </div>    
            <div class="w-100 mt-5"></div>
            <div class="w-100 mt-5"></div>
            <div class="form-group col-sm-12 col-md-6">
                <label>Video 1</label>
                <input type="text" name="product_attributes[video1]" value="{{old('product_attributes[video1]')}}" class="form-control">
            </div>  
            <div class="form-group col-sm-12 col-md-6">
                <label>Video 2</label>
                <input type="text" name="product_attributes[video2]" value="{{old('product_attributes[video2]')}}" class="form-control">
            </div>  
            <div class="w-100 mt-5"></div>
            <div class="form-group col-sm-12">
                <label>imagen Destacada <small>imagen 260x260 px</small></label>
                <input type="file" name="image" class="form-control-file">
            </div>   
            <div class="w-100 mt-5"></div>
            @for ($i = 1; $i <= 4; $i++)
                <div class="form-group col-sm-12 col-md-3">
                    <label for="image{{$i}}">imagen {{$i}} <small>imagen 260x260 px</small></label>
                    <input type="file" name="images[]" class="form-control-file" id="image{{$i}}">
                </div>           
            @endfor
            <div class="w-100 mt-5"></div>
            <div class="form-group col-sm-12">
                <label for="">Capacitación</label>
                <textarea name="product_attributes[training]" class="ckeditor" id="" cols="30" rows="10">{{old('product_attributes[training]')}}</textarea>
            </div>
            <div class="form-group col-sm-12 mt-4">
                <label for="">Productos relacionados</label>
                <select name="products[]" class="select2 form-control" multiple="multiple">
                    @foreach ($products as $product)
                        <option value="{{$product->id}}">{{$product->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
      <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
</div>
@stop
@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop

@section('js')
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
    <script>
        $('document').ready(function(){
            $('.select2').select2()
        })
    </script>
@stop

    