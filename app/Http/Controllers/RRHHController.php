<?php

namespace App\Http\Controllers;

use App\Page;
use App\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RRHHController extends Controller
{
    protected $page;

    public function __construct(){
        
        $this->page = Page::where('name', 'rrhh')->first();
    }
    /**
     * Fin Slider
     */

    public function content()
    {
        $page       = $this->page;
        $section1   = $page->sections()->first()->contents()->first();
        $section2   = $page->sections()->where('name', 'section_2')->first()->contents()->first();
        return view('administrator.rrhh.content', compact('section1', 'section2'));
    }

    /**
     * @param array $request
     * @author Raul castro
     */

    public function store(Request $request)
    {
        $data = $request->all();
        if($request->hasFile('image'))
            $data['image'] = $request->file('image')->store('images/rrhh', 'custom');
        
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
            
            $data['image'] = $request->file('image')->store('images/rrhh','custom');
        }        
        $element->update($data);
        return back()->with('mensaje', 'Actualizado con exito');
    }
}
