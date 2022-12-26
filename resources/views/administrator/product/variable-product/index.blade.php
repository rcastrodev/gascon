@if ($product->variableProducts()->count())
<div class="card card-primary">
    <div class="card-header">Descripciones</div>
    <div class="card-body">
        @foreach ($product->variableProducts()->orderBy('order', 'ASC')->get() as $vp)
            <form action="{{ route('variable-product.content.update') }}" class="form-update-variable-product">
                @csrf
                <input type="hidden" name="id" value="{{$vp->id}}">
                <div class="table-responsive">
                    <table class="table">
                        <td width="150">
                            <div class="form-group d-flex align-items-center">
                                <input type="text" name="order" value="{{$vp->order}}" placeholder="Orden" class="form-control">
                            </div>
                        </td>
                        <td>
                            <div class="form-group d-flex align-items-center">
                                <span class="mr-2" style="color: red;">*</span>
                                <input type="text" name="title" value="{{$vp->title}}" placeholder="Título" class="form-control">
                            </div>
                        </td>
                        <td>
                            <div class="form-group d-flex align-items-center">
                                <span class="mr-2" style="color: red;">*</span>
                                <input type="text" name="content" value="{{$vp->content}}" placeholder="separar los valores por | ejemplo A|B|c" class="form-control">
                            </div>
                        </td>
                        <td>
                            <button type="button" class="btn btn-sm btn-danger rounded-pill variable-product-destroy far fa-trash-alt" data-url="{{ route('variable-product.content.destroy', ['id' => $vp->id]) }}"></button>
                            <button type="submit" class="btn btn-sm btn-primary variable-product-update far fa-edit rounded-pill" data-url="{{ route('variable-product.content.update') }}"></button>                            
                        </td>
                    </table>
                </div>
            </form>   
        @endforeach
    </div>
    <div class="card-footer"></div>
</div> 
@endif
<div class="card card-primary">
    <div class="card-header">Tabla descriptiva</div>
    <div class="card-body">
        <form action="{{ route('variable-product.content.store') }}" class="form-store-variable-product">
            @csrf
            <input type="hidden" name="product_id" value="{{$product->id}}">
            <div class="table-responsive">
                <table class="table">
                    <td width="150">
                        <div class="form-group d-flex align-items-center">
                            <input type="text" name="order" placeholder="Orden" class="form-control">
                        </div>
                    </td>
                    <td>
                        <div class="form-group d-flex align-items-center">
                            <span class="mr-2" style="color: red;">*</span>
                            <input type="text" name="title" placeholder="Título" class="form-control">
                        </div>
                    </td>
                    <td>
                        <div class="form-group d-flex align-items-center">
                            <span class="mr-2" style="color: red;">*</span>
                            <input type="text" name="content" placeholder="separar los valores por | ejemplo A|B|c" class="form-control">
                        </div>
                    </td>
                    <td>
                        <button type="submit" class="btn btn-sm btn-primary far fa-save variable-product-create rounded-pill" data-url="{{ route('variable-product.content.store') }}"></button>
                    </td>
                </table>
            </div>
        </form>
    </div>
    <div class="card-footer"></div>
</div>