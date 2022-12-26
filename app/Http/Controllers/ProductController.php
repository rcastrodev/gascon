<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class ProductController extends Controller
{
    public function content()
    {
        return view('administrator.product.content');
    }

    public function create()
    {
        $categories = Category::where('name', '<>', 'ESCALAS Y SACABOCADOS')->get();     
        $products   = Product::orderBy('name', 'ASC')->get();
        return view('administrator.product.create', compact('categories', 'products'));
    }

    public function store(ProductRequest $request)
    {
        $data = $request->all();

        if (! $request->has('outstanding'))
            $data['outstanding'] = 0;
        else
            $data['outstanding'] = 1; 

        if($request->hasFile('extra')) 
            $data['extra'] = $request->file('extra')->store('images/data-sheet', 'custom');

        if($request->hasFile('extra2')) 
            $data['extra2'] = $request->file('extra2')->store('images/data-sheet', 'custom');

        if($request->hasFile('image')) 
            $data['image'] = $request->file('image')->store('images/products', 'custom');

        $product = Product::create($data);                    
        
        if($request->hasFile('images'))
            foreach($request->file('images') as $image)
                $product->images()->create(['image' => $image->store('images/products', 'custom')]);
            
        $product->productAttributes()->create($request->input('product_attributes'));

        if ($request->has('products')) {
            if($request->input('products'))
                $product->products()->attach($request->input('products'));
        }
 
        return redirect()
            ->route('product.content.edit', ['id' => $product->id])
            ->with('mensaje', 'Producto creado');

    }

    public function edit($id)
    {   
        $categories = Category::where('name', '<>', 'ESCALAS Y SACABOCADOS')->get();
        $product    = Product::findOrFail($id);
        $products   = Product::where('id', '<>', $id)->orderBy('name', 'ASC')->get();
        $numberOfImagesAllowed = 3 - $product->images()->count();
        return view('administrator.product.edit', compact('product', 'categories', 'numberOfImagesAllowed', 'products'));
    }

    public function update(ProductRequest $request)
    {   
        $data = $request->all();

        if (! $request->has('outstanding'))
            $data['outstanding'] = 0;
        else
            $data['outstanding'] = 1; 
        
        $product = Product::find($request->input('id'));

        if($request->hasFile('extra')){
            if (Storage::disk('custom')->exists($product->extra))
                    Storage::disk('custom')->delete($product->extra);
            
            $data['extra'] = $request->file('extra')->store('images/data-sheet', 'custom');
        }

        if($request->hasFile('extra2')){
            if (Storage::disk('custom')->exists($product->extra2))
                    Storage::disk('custom')->delete($product->extra2);
            
            $data['extra2'] = $request->file('extra2')->store('images/data-sheet', 'custom');
        }

        if($request->hasFile('image')){
            if (Storage::disk('custom')->exists($product->image))
                    Storage::disk('custom')->delete($product->image);
            
            $data['image'] = $request->file('image')->store('images/products', 'custom');
        }

        $product->update($data);        
                    
        if($request->hasFile('images')){
            foreach($request->file('images') as $image){
                $product->images()->create([
                    'image' => $image->store('images/products', 'custom')
                ]);
            }
        }
        $product->productAttributes()->update($request->input('product_attributes'));

        $products = $product->products;

        if ($request->has('products')) {
            if($request->input('products')){
                $product->products()->wherePivotNotIn('product_id_related', $request->input('products'))->detach();
    
                foreach ($request->input('products') as $product_id_related) {
                    if(! in_array($product_id_related, $products->pluck('id')->toArray()))
                        $product->products()->attach($product_id_related);
                }
            }else{
                $product->products()->detach();
            }
        }else{
            $product->products()->detach();
        }

        return back()->with('mensaje', 'Producto editado correctamente');
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        if(Storage::disk('public')->exists($product->image))
            Storage::disk('public')->delete($product->image);

        $product->delete();
        return response()->json([], 200);
    }

    public function find($id)
    {
        $content = Product::find($id);
        return response()->json(['content' => $content]);
    }

    public function getList()
    {
        $products = Product::orderBy('order', 'ASC');
        return DataTables::of($products)
        ->editColumn('description', function($product) {
            return $product->description;
        })
        ->addColumn('category', function($product) {
            return $product->category->name;
        })
        ->addColumn('actions', function($product) {
            return '<a href="'.route('product.content.edit', ["id" => $product->id]).'" class="btn btn-sm btn-primary rounded-pill far fa-edit"></a><button class="btn btn-sm btn-danger rounded-pill" onclick="modalProductDestroy('.$product->id.')" title="Eliminar slider"><i class="far fa-trash-alt"></i></button>';
        })
        ->rawColumns(['actions', 'description'])
        ->make(true);
    }


    public function fichaTecnica($id, $column)
    {
        $producto = Product::findOrFail($id);  

        if(Storage::disk('custom')->exists($producto->$column))
            return Response::download($producto->$column);
        else 
            return back();  
    }

    public function borrarFichaTecnica($id, $column)
    {
        $product = Product::findOrFail($id); 
        
        if(Storage::disk('public')->exists($product->$column))
            Storage::disk('public')->delete($product->$column);

        $product->$column = null;
        $product->save();

        return response()->json([], 200);
    }

    public function ImageDestroy($id){
        $product = Product::findOrFail($id); 
        
        if(Storage::disk('public')->exists($product->image))
            Storage::disk('public')->delete($product->image);

        $product->image = null;
        $product->save();

        return response()->json([], 200);
    }

}
