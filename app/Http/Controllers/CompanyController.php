<?php

namespace App\Http\Controllers;

use App\Page;
use App\Content;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CompanyInfoRequest;
use App\Http\Requests\CompanySliderRequest;

class CompanyController extends Controller
{
    protected $page;

    public function __construct(){
        $this->page = Page::where('name', 'empresa')->first();
    }


    public function content()
    {
        $page = Page::where('name', 'empresa')->first();
        $sections   = $page->sections;
        $section2   = $sections->where('name', 'section_2')->first()->contents()->first();
        $section3   = $sections->where('name', 'section_3')->first()->contents()->first();
        $section4s   = $sections->where('name', 'section_4')->first()->contents;
        return view('administrator.company.content', compact('section2', 'section3', 'section4s'));
    }
    

    public function storeSlider(CompanySliderRequest $request)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store('images/company','custom');
        
        Content::create($data);
        return response()->json(['tableReload' => true],201);
    }

    public function updateSlider(CompanySliderRequest $request)
    {
        $element = Content::find($request->input('id'));
        $data = $request->all();
        
        if($request->hasFile('image')){
            if(Storage::disk('custom')->exists($element->image))
                Storage::disk('custom')->delete($element->image);
            
            $data['image'] = $request->file('image')->store('images/company','custom');
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
                
                $data['image'] = $request->file('image')->store('images/company','custom');
            } 
            $element->update($data);
            return back()->with('mensaje', 'Actualizado con exito');
        }else{

            if($request->hasFile('image'))            
                $data['image'] = $request->file('image')->store('images/company','custom');
            
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
        $elements = Content::where('section_id', 3)->orderBy('order', 'ASC');

        return DataTables::of($elements)
        ->editColumn('image', function($element){
            return '<img src="'.asset($element->image).'" class="img-fluid" style="max-width:100px">';
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
