<?php

namespace App\Http\Controllers;

use SEO;
use App\Data;
use App\Page;
use App\Color;
use App\Content;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class PagesController extends Controller
{
    private $data;

    public function __construct()
    {
        $this->data = Data::first();
    }

    public function home()
    {
        $page = Page::where('name', 'inicio')->first();
        SEO::setTitle('home');
        SEO::setDescription(strip_tags($this->data->description));

        /** Secciones de página */
        $sections   = $page->sections;
        $section1s  = $sections->where('name', 'section_1')->first()->contents()->orderBy('order', 'ASC')->get();
        $section2   = $sections->where('name', 'section_2')->first()->contents()->first();
        $products   = Product::where('outstanding', 1)->orderBy('order', 'ASC')->get();
        $categories = Category::orderBy('order', 'ASC')->get();
        $news       = Content::where('section_id', 15)->where('content_4', 1)->orderBy('order', 'ASC')->take(3)->get();
        return view('paginas.index', compact('section1s', 'section2', 'products', 'categories', 'news'));
    }

    public function empresa()
    {
        $page = Page::where('name', 'empresa')->first();
        $sections = $page->sections;
        $sliders = $sections->where('name', 'section_1')->first()->contents()->orderBy('order', 'ASC')->get();
        $section2 = $sections->where('name', 'section_2')->first()->contents()->first();
        $section3 = $sections->where('name', 'section_3')->first()->contents()->first();
        $section4s = $sections->where('name', 'section_4')->first()->contents()->orderBy('order', 'ASC')->get();
        $section5s = $sections->where('name', 'section_5')->first()->contents()->orderBy('order', 'ASC')->get();
        SEO::setTitle('empresa');
        return view('paginas.empresa', compact('sliders', 'section2', 'section3', 'section4s', 'section5s'));
    }

    public function clientes()
    {
        $page = Page::where('name', 'clientes')->first();
        $sections = $page->sections;
        $section1 = $sections->where('name', 'section_1')->first()->contents()->first();
        $section2s = $sections->where('name', 'section_2')->first()->contents()->orderBy('order', 'ASC')->get();
        SEO::setTitle('clientes');
        return view('paginas.clientes', compact('section1', 'section2s'));
    }

    public function representantes()
    {
        $page = Page::where('name', 'representantes')->first();
        $sections = $page->sections;
        $section1 = $sections->where('name', 'section_1')->first()->contents()->first();
        $section2s = $sections->where('name', 'section_2')->first()->contents()->orderBy('order', 'ASC')->get();
        SEO::setTitle('representantes');
        return view('paginas.representantes', compact('section1', 'section2s'));
    }

    public function oficinas()
    {
        $page = Page::where('name', 'oficinas')->first();
        $sections = $page->sections;
        $section1 = $sections->where('name', 'section_1')->first()->contents()->first();
        $section2s = $sections->where('name', 'section_2')->first()->contents()->orderBy('order', 'ASC')->get();
        SEO::setTitle('oficinas');
        return view('paginas.oficinas', compact('section1', 'section2s'));
    }

    public function categorias()
    {
        $categories = Category::orderBy('order', 'ASC')
            ->get();    

        SEO::setTitle('categor&iacute;as');    
        SEO::setDescription(strip_tags($this->data->description));
        return view('paginas.categorias', compact('categories'));
    }

    public function categoria($id)
    {
        $category = Category::findOrFail($id);
        $products = $category->products()->orderBy('order', 'ASC')->get();
        $categories = Category::orderBy('order', 'ASC')->get();        
        SEO::setTitle($category->name);    
        SEO::setDescription(strip_tags($this->data->description));
        return view('paginas.productos-por-categoria', compact('category', 'categories', 'products'));
    }

    public function producto(Request $request, Product $product)
    {
        $categories = Category::orderBy('order', 'ASC')->get();   

        if ($product){
            SEO::setTitle($product->name);
            SEO::setDescription(strip_tags($product->description));
        }        

        return view('paginas.producto', compact('product', 'categories'));
    }


    public function productos(Request $request)
    {
        if (! $request->get('b')) 
            return redirect()->route('categorias');

        $b = $request->get('b');
        $products = Product::where('name', 'like', "%{$b}%")->orderBy('order', 'ASC')->get();        
        return view('paginas.productos', compact('products'));
    }

    public function novedades()
    {
        $page = Page::where('name', 'novedades')->first();
        $sections = $page->sections;
        $section1 = $sections->where('name', 'section_1')->first()->contents()->first();
        $section2s = $sections->where('name', 'section_2')->first()->contents()->orderBy('order', 'ASC')->get();
        SEO::setTitle('novedades');
        return view('paginas.novedades', compact('section1', 'section2s'));
    }

    public function novedad($id)
    {
        $element = Content::findOrFail($id);
        SEO::setTitle($element->content_1);
        SEO::setDescription(strip_tags($element->content_2));
        return view('paginas.novedad', compact('element'));
    }

    public function calidad()
    {
        $page = Page::where('name', 'calidad')->first();
        $sections = $page->sections;
        $section1 = $sections->where('name', 'section_1')->first()->contents()->first();
        $section2 = $sections->where('name', 'section_2')->first()->contents()->first();
        $section3s = $sections->where('name', 'section_3')->first()->contents()->orderBy('order', 'ASC')->get();
        $section4 = $sections->where('name', 'section_4')->first()->contents()->first();
        SEO::setTitle('calidad');
        return view('paginas.calidad', compact('section1', 'section2', 'section3s', 'section4'));
    }

    public function contacto()
    {
        $page = Page::where('name', 'contacto')->first();
        SEO::setTitle("Contacto"); 
        SEO::setDescription(strip_tags($this->data->description));      
        return view('paginas.contacto');
    }

    public function rrhh()
    {
        $page = Page::where('name', 'rrhh')->first();
        $sections = $page->sections;
        $section1 = $sections->where('name', 'section_1')->first()->contents()->first();
        $section2 = $sections->where('name', 'section_2')->first()->contents()->first();
        SEO::setTitle('rrhh');
        return view('paginas.rrhh', compact('section1', 'section2'));
    }
}
