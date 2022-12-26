<?php

namespace App\Http\Controllers;

use App\Page;
use App\Content;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;

class QualityController extends Controller
{
    protected $page;

    public function __construct(){
        $this->page = Page::where('name', 'calidad')->first();
    }


    public function content()
    {
        $sections   = $this->page->sections;
        $section1   = $sections->where('name', 'section_1')->first()->contents()->first();
        $section2   = $sections->where('name', 'section_2')->first()->contents()->first();
        $section4   = $sections->where('name', 'section_4')->first()->contents()->first();
        return view('administrator.quality.content', compact('section1', 'section2', 'section4'));
    }
    

    public function storeSlider(Request $request)
    {
        $data = $request->all();
        if($request->hasFile('image'))
            $data['image'] = $request->file('image')->store('images/quality','custom');
        
        Content::create($data);
        return response()->json(['tableReload' => true],201);
    }

    public function updateSlider(Request $request)
    {
        $element = Content::find($request->input('id'));
        $data = $request->all();
        
        if($request->hasFile('image')){
            if(Storage::disk('custom')->exists($element->image))
                Storage::disk('custom')->delete($element->image);
            
            $data['image'] = $request->file('image')->store('images/quality','custom');
        }        
        $element->update($data);
    }

    public function updateInfo(Request $request)
    {
        $element = Content::find($request->input('id'));
        $data = $request->all();    


        if (isset($element)) {
            if($request->hasFile('image')){
                if(Storage::disk('custom')->exists($element->image))
                    Storage::disk('custom')->delete($element->image);
                
                $data['image'] = $request->file('image')->store('images/quality','custom');
            } 
            if($request->hasFile('image2')){
                if(Storage::disk('custom')->exists($element->image2))
                    Storage::disk('custom')->delete($element->image2);
                
                $data['image2'] = $request->file('image2')->store('images/quality','custom');
            } 
            $element->update($data);
            return back()->with('mensaje', 'Actualizado con exito');
        }else{

            if($request->hasFile('image'))            
                $data['image'] = $request->file('image')->store('images/quality','custom');

            if($request->hasFile('image2'))            
                $data['image2'] = $request->file('image2')->store('images/quality','custom');
            
            Content::create($data);
 
            return back()->with('mensaje', 'Creado con exito');
        }
    }


    public function destroy($id)
    {
        $element = Content::find($id);
        if(Storage::disk('custom')->exists($element->image))
            Storage::disk('custom')->delete($element->image);

        $element->delete();
        return response()->json([], 200);
    }

    public function sliderGetList()
    {
        $elements = Content::where('section_id', 18)->orderBy('order', 'ASC');

        return DataTables::of($elements)
        ->editColumn('image', function($element){
            if ($element->image) 
                if (Storage::disk('custom')->exists($element->image)) 
                    return '<a href="'.route('archive-download', ['id' => $element->id, 'column' => 'image']) .'">descargar</a>';

        })
        ->addColumn('actions', function($element) {
            return '<button type="button" class="btn btn-sm btn-primary rounded-pill far fa-edit" data-toggle="modal" data-target="#modal-update-element" onclick="findContent('.$element->id.')"></button><button class="btn btn-sm btn-danger rounded-pill" onclick="modalDestroy('.$element->id.')" title="Eliminar slider"><i class="far fa-trash-alt"></i></button>';
        })
        ->rawColumns(['actions', 'image'])
        ->make(true);
    }

    public function getCompromise()
    {
        $elements = Content::where('section_id', 6)->orderBy('order', 'ASC');

        return DataTables::of($elements)
        ->addColumn('actions', function($element) {
            return '<button type="button" class="btn btn-sm btn-primary rounded-pill far fa-edit" data-toggle="modal" data-target="#modal-update-compromise" onclick="findContent2('.$element->id.')"></button><button class="btn btn-sm btn-danger rounded-pill" onclick="modalDestroy('.$element->id.')" title="Eliminar slider"><i class="far fa-trash-alt"></i></button>';
        })
        ->rawColumns(['actions', 'content_2'])
        ->make(true);
    }

    public function getOthers()
    {
        $elements = Content::where('section_id', 7)->orderBy('order', 'ASC');

        return DataTables::of($elements)
        ->editColumn('image', function($element){
            return '<img src="'.asset($element->image).'" class="img-fluid" style="max-width:100px">';
        })
        ->addColumn('actions', function($element) {
            return '<button type="button" class="btn btn-sm btn-primary rounded-pill far fa-edit" data-toggle="modal" data-target="#modal-update-others" onclick="findContent3('.$element->id.')"></button><button class="btn btn-sm btn-danger rounded-pill" onclick="modalDestroy('.$element->id.')" title="Eliminar slider"><i class="far fa-trash-alt"></i></button>';
        })
        ->rawColumns(['actions', 'content_2', 'image'])
        ->make(true);
    } 
}
