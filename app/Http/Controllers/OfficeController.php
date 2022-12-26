<?php

namespace App\Http\Controllers;

use App\Page;
use App\Content;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;

class OfficeController extends Controller
{
    protected $page;

    public function __construct(){
        
        $this->page = Page::where('name', 'oficinas')->first();
    }
    /**
     * Fin Slider
     */

    public function content()
    {
        $page       = $this->page;
        $section1   = $page->sections()->first()->contents()->first();
        return view('administrator.offices.content', compact('section1'));
    }

    /**
     * @param array $request
     * @author Raul castro
     */

    public function store(Request $request)
    {
        $data = $request->all();        
        $content = Content::create($data);
        return response()->json([], 201);
    }

    public function update(Request $request)
    {
        $element = Content::find($request->input('id'));
        $data = $request->all();    
        $element->update($data);
        return response()->json([], 200);
    }

    public function updateInfo(Request $request)
    {
        $element = Content::find($request->input('id'));
        $data = $request->all();
        
        if($request->hasFile('image')){
            if(Storage::disk('custom')->exists($element->image))
                Storage::disk('custom')->delete($element->image);
            
            $data['image'] = $request->file('image')->store('images/offices','custom');
        }   

        $element->update($data);
        return back()->with('mensaje', 'Actualizado con exito');
    }

    public function destroy($id)
    {
        $element = Content::find($id);
        $element->delete();

        return response()->json([], 200);
    }

    /**
     * @author Raul castro
     * @return datatable
     */

    public function sliderGetList()
    {
        $elements = Content::where('section_id', 13)->orderBy('order', 'ASC');
        return DataTables::of($elements)
        ->editColumn('content', function($element){
            $content_3 = Str::of($element->content_3)->explode('|');
            $content_3 = (count($content_3) > 1) ? $content_3[0] : $element->content_3;
            return "{$element->content_1} <br> {$element->content_2} <br> {$content_3} <br> {$element->content_4}";
        })
        ->addColumn('actions', function($element) {
            return '<button type="button" class="btn btn-sm btn-primary rounded-pill far fa-edit" data-toggle="modal" data-target="#modal-update-element" onclick="findContent('.$element->id.')"></button><button class="btn btn-sm btn-danger rounded-pill" onclick="modalDestroy('.$element->id.')" title="Eliminar element"><i class="far fa-trash-alt"></i></button>';
        })
        ->rawColumns(['actions', 'image', 'content'])
        ->make(true);
    }
}
