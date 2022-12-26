@extends('paginas.partials.app')
@section('content')
<div aria-label="breadcrumb" class="bg-light py-sm-1 py-md-3 font-size-14 mb-5">
    <ol class="breadcrumb container text-uppercase">
        <li class="breadcrumb-item">
            <a href="{{ route('novedades') }}" class="text-decoration-none">Novedades</a>
        </li>
        <li class="breadcrumb-item"><a href="{{ route('novedades') }}" class="text-decoration-none">{{$element->content_3}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$element->content_1}}</li>
    </ol>
</div> 
<div class="container row mx-auto pb-5">
    @if (Storage::disk('custom')->exists($element->image))
        <div class="col-sm-12 col-md-6">
            <img src="{{ asset($element->image) }}" alt="{{$element->content_1}}" class="img-fluid w-100">
        </div>   
    @endif
    <div class="col-sm-12 col-md-6">
        <div class="d-flex justify-content-between mb-4">
            <div class="text-danger fw-bold">{{ $element->content_3 }}</div>
            <div class="" style="color: #939598">{{date_format($element->created_at, 'd/m/Y')}}</div>
        </div>
        <div class="">
            <h1 class="mb-4 font-size-30">{{$element->content_1}}</h1>
            <div class="">{!! $element->content_2 !!}</div>
        </div>
    </div>
</div>
@endsection