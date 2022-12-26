<div class="card producto categoria">
    <div class="position-relative">  
        <a href="{{ route('categoria', ['id'=> $c->id ]) }}" class="mas position-absolute text-decoration-none text-white" style="font-size: 70px; font-weight: 100; background-color: #E9774766;">+</a>
        @if ($c->image)
            <img src="{{ asset($c->image) }}" class="img-fluid img-product">
        @elseif(!$c->image && count($c->products))
            @foreach ($c->products as $product)
                @php $valid = false; @endphp
                @if (count($product->images))
                    @if (Storage::disk('custom')->exists($product->images()->first()->image) && $product->images()->first()->image)
                        <img src="{{ asset($product->images()->first()->image) }}" class="img-fluid img-product">
                        @php
                            $valid = true; 
                            break; 
                        @endphp
                    @endif
                @endif
            @endforeach
            @if (!$valid)
                <img src="{{ asset('images/default.jpg') }}" class="img-fluid img-product">
            @endif
        @else
            <img src="{{ asset('images/default.jpg') }}" class="img-fluid img-product">
        @endif
    </div>
    <div class="card-body ps-1">
        <p class="card-text mb-0 fw-bold ps-2">
            <a href="{{ route('categoria', ['id'=> $c->id ]) }}" class="text-uppercase font-size-16 text-dark text-decoration-none d-block fw-bold">{{ $c->name }}</a>
        </p>
    </div>
</div>