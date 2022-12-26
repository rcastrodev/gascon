<?php

namespace App\Http\Controllers;

use App\Page;
use App\Content;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    protected $page;

    public function __construct(){
        
        $this->page = Page::where('name', 'novedades')->first();
    }
    /**
     * Fin Slider
     */

    public function content()
    {
        $page       = $this->page;
        $section1   = $page->sections()->first()->contents()->first();
        return view('administrator.news.content', compact('section1'));
    }

    /**
     * @param array $request
     * @author Raul castro
     */

    public function store(Request $request)
    {
        $data = $request->all();
        if($request->hasFile('image'))
            $data['image'] = $request->file('image')->store('images/news', 'custom');

        if (! $request->has('content_4'))
            $data['content_4'] = 0;
        else
            $data['content_4'] = 1; 
        
        $content = Content::create($data);
        return back()->with('mensaje', 'Creado con exito');
    }

    public function update(Request $request)
    {
        $element = Content::find($request->input('id'));
        $data = $request->all();
        
        if($request->hasFile('image')){
            if(Storage::disk('custom')->exists($element->image))
                Storage::disk('custom')->delete($element->image);
            
            $data['image'] = $request->file('image')->store('images/news','custom');
        }        

        if (! $request->has('content_4'))
            $data['content_4'] = 0;
        else
            $data['content_4'] = 1; 

        $element->update($data);
        return back()->with('mensaje', 'Actualizado con exito');
    }

    public function destroy($id)
    {
        $element = Content::find($id);

        if(Storage::disk('custom')->exists($element->image))
            Storage::disk('custom')->delete($element->image); 

        $element->delete();

        return response()->json([], 200);
    }

    /**
     * @author Raul castro
     * @return datatable
     */

    public function sliderGetList()
    {
        $elements = Content::where('section_id', 15)->orderBy('order', 'ASC');
        return DataTables::of($elements)
        ->editColumn('image', function($element){
            return '<img src="'.asset($element->image).'" class="img-fluid" style="max-width:100px">';
        })
        ->addColumn('actions', function($element) {
            return '<button type="button" class="btn btn-sm btn-primary rounded-pill far fa-edit" data-toggle="modal" data-target="#modal-update-element" onclick="findContent('.$element->id.')"></button><button class="btn btn-sm btn-danger rounded-pill" onclick="modalDestroy('.$element->id.')" title="Eliminar element"><i class="far fa-trash-alt"></i></button>';
        })
        ->rawColumns(['actions', 'image', 'content_2'])
        ->make(true);
    }
}
