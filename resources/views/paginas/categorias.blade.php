@extends('paginas.partials.app')
@section('content')
@isset($categories)
	@if (count($categories))
        <section class="py-md-5 py-sm-2 container">
            <div class="container row mx-auto">
                @foreach ($categories as $c)
                    <div class="col-sm-12 col-md-4 mb-5">
                        @includeIf('paginas.partials.categoria', ['c' => $c])
                    </div>
                @endforeach
            </div>
        </section>
	@endif
@endisset
@endsection