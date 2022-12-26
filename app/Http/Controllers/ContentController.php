<?php

namespace App\Http\Controllers;

use App\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class ContentController extends Controller
{
    public function content()
    {
        return null;
    }

    public function findContent($id)
    {
        $content = Content::find($id);
        return response()->json(['content' => $content]);
    }

    public function download($id, $column)
    {
        $element = Content::findOrFail($id);  

        if(Storage::disk('custom')->exists($element->$column))
            return Response::download($element->$column);
        else 
            return back();  
    }

    public function archiveDestroy($id, $column)
    {
        $element = Content::findOrFail($id); 
        
        if(Storage::disk('public')->exists($element->$column))
            Storage::disk('public')->delete($element->$column);

        $element->$column = null;
        $element->save();

        return response()->json([], 200);
    }
}
