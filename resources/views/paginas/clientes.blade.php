@extends('paginas.partials.app')
@section('content')
@includeIf('paginas.partials.hero', ['section1' => $section1])
@isset($section2s)
	@if (count($section2s))
        <section class="d-flex flex-wrap my-3 container mx-auto my-sm-3 py-md-5">
            @foreach ($section2s as $s2)
                @if ($s2->image)
                    @if (Storage::disk('custom')->exists($s2->image))
                        <div class="content-client d-flex justify-content-center align-items-center cliente mb-sm-2 mb-md-5">
                            <img src="{{ asset($s2->image) }}" alt="{{ $s2->content_1 }}" class="img-fluid" style="object-fit: contain">
                        </div>      
                    @endif
                @endif
            @endforeach
        </section>
	@endif
@endisset
@endsection