@extends('adminlte::page')
@section('title', 'Editar producto')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-3">Editar producto</h1>
        <a href="{{ route('product.content') }}" class="btn btn-sm btn-primary">ver productos</a>
    </div>
@stop
@section('content')
<div class="row">
    @includeIf('administrator.partials.mensaje-exitoso')
    @includeIf('administrator.partials.mensaje-error')
</div>
<form action="{{ route('product.content.update') }}" method="post" enctype="multipart/form-data" class="card card-primary">
    @method('put')
    @csrf
    <input type="hidden" name="id" value="{{ $product->id }}">
    <div class="card-header">Producto</div>
    <!-- /.card-header -->
    <!-- form start -->
    <div class="card-body row">
        
        <div class="form-group col-sm-12 col-md-4">
            <label for="">Nombre</label>
            <input type="text" name="name" value="{{$product->name}}" class="form-control" placeholder="Nombre del producto">
        </div>
        <div class="form-group col-sm-12 col-md-4">
            <label for="">Categoría</label>
            <select name="category_id" class="form-control select2">
                @foreach ($categories as $category)
                    <option 
                        value="{{$category->id}}" 
                        @if($category->id == $product->category_id) selected @endif
                    >{{$category->name}}</option>
                @endforeach
            </select>
        </div> 
        <div class="form-group col-sm-12 col-md-2">
            <label for="">Orden</label>
            <input type="text" name="order" value="{{$product->order}}" class="form-control" placeholder="AA">
        </div>
        <div class="form-group col-sm-12 col-md-2 d-flex flex-column align-items-center">
            <label for="">Es destacado ?</label>
            <input type="checkbox" name="outstanding" value="1" @if($product->outstanding) checked @endif placeholder="AA">
        </div>
        <div class="form-group col-sm-12">
            <label for="">Descripción</label>
            <textarea name="description" class="ckeditor" id="" cols="30" rows="10">{{$product->description}}</textarea>
        </div>
        @if ($product->extra2)
            <div class="form-group col-sm-12">
                <a href="{{ route('ficha-tecnica', ['id'=> $product->id, 'column' => 'extra2']) }}" class="btn btn-sm btn-primary rounded-pill" target="_blank">Descarga de planos</a>
                <button class="btn btn-sm rounded-circle btn-danger far fa-trash-alt borrarFicha" data-url="{{ route('borrar-ficha-tecnica', ['id'=> $product->id, 'column' => 'extra2']) }}">
                </button>
            </div>          
        @endif
        <div class="form-group col-sm-12">
            <label>Descarga de planos</label>
            <input type="file" name="extra2" class="form-control-file">
        </div>   
        @if ($product->extra)
            <div class="form-group col-sm-12">
                <a href="{{ route('ficha-tecnica', ['id'=> $product->id, 'column' => 'extra']) }}" class="btn btn-sm btn-primary rounded-pill" target="_blank">Ficha técnica</a>
                <button class="btn btn-sm rounded-circle btn-danger far fa-trash-alt borrarFicha" data-url="{{ route('borrar-ficha-tecnica', ['id'=> $product->id, 'column' => 'extra']) }}">
                </button>
            </div>          
        @endif
        <div class="form-group col-sm-12">
            <label>Ficha técnica</label>
            <input type="file" name="extra" class="form-control-file">
        </div>    
        <div class="w-100 mt-5"></div>  
        <div class="form-group col-sm-12 col-md-6">
            <label>Video 1</label>
            <input type="text" name="product_attributes[video1]" value="{{$product->productAttributes->video1}}" class="form-control">
        </div>  
        <div class="form-group col-sm-12 col-md-6">
            <label>Video 2</label>
            <input type="text" name="product_attributes[video2]" value="{{$product->productAttributes->video2}}" class="form-control">
        </div>  
        <div class="w-100 mt-5"></div>
        <div class="form-group col-sm-12 col-md-4">
            @if (Storage::disk('custom')->exists($product->image))
                <div class="d-flex flex-column">
                    <button class="btn btn-danger borrar-imagen btn-sm d-inline-block mb-2 mr-4" data-url="{{ route('product.image.destroy', ['id'=>$product->id]) }}">Borrar imagen destacada</button>
                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" style="max-width: 400px; max-height: 300px;">
                </div> 
            @endif
            <label>imagen Destacada <small>imagen 260x260 px</small></label>
            <input type="file" name="image" class="form-control-file">
        </div>  
        <div class="w-100 mt-5"></div>
        @foreach ($product->images as $pi)
            <div class="form-group col-sm-12 col-md-4 ">
                <div class="position-relative">
                    <button class="position-absolute btn btn-sm btn-danger rounded-pill far fa-trash-alt destroyImgProduct" data-url="{{ route('product-picture.content.destroy', ['id'=> $pi->id]) }}"></button>
                    <img src="{{ asset($pi->image) }}" style="max-width: 350px; min-width:350px; max-height:200px; min-height:200px; object-fit: contain;">
                </div>
                <label>imagen <small>imagen 260x260 px</small></label>
                <input type="file" name="images[]" class="form-control-file">
            </div>                    
        @endforeach
        @if ($numberOfImagesAllowed)
            @for ($i = 1; $i <= $numberOfImagesAllowed; $i++)
                <div class="form-group col-sm-12 col-md-4">
                    <label for="image">imagen <small>imagen 260x260 px</small></label>
                    <input type="file" name="images[]" class="form-control-file" id="">
                </div>           
            @endfor
        @endif   
        <div class="w-100 mt-5"></div>
        <div class="form-group col-sm-12">
            <label for="">Capacitación</label>
            <textarea name="product_attributes[training]" class="ckeditor" cols="30" rows="10">{{$product->productAttributes->training}}</textarea>
        </div>
        <div class="form-group col-sm-12 mt-4">
            <label for="">Productos relacionados</label>
            <select name="products[]" class="select2 form-control" multiple="multiple">
                @foreach ($products as $p)
                    <option 
                    value="{{$p->id}}"
                    @if(in_array($p->id, $product->products->pluck('id')->toArray(), true)) selected @endif
                    >{{$p->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
      <!-- /.card-body -->
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </div>
</form>
@includeIf('administrator.product.variable-product.index')
@stop
@section('css')
    <meta name="_token" content="{{csrf_token()}}">
    <meta name="url" content="{{route('product.content')}}">
    <meta name="content_find" content="{{route('content')}}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop

@section('js')
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/admin/product/variable-product.js') }}"></script>
@stop

