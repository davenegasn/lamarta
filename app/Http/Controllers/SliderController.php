<?php

namespace App\Http\Controllers;
use App\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    
    public function upsert(Request $request)
    {

    	$sliders = $request->post('sliders');

        foreach($sliders as $slider){

            if ( $slider['id'] ){

                Slider::where('id', $slider['id'])->update( $slider );

            }else{

                Slider::create( $slider );

            }
        }

        return ['success' => true, 'sliders' => Slider::all()];
    }

    public function create()
    {
        return view('admin.sliders.create');
    }

    public function store(Request $request)
    {
        $attributes = $this->validateSlider();

        $slider = Slider::create($attributes);

        return redirect()->route('sliders');
    }

    public function edit(Slider $slider)
    {
        return view('admin.sliders.edit', compact('slider'));
    }

    public function update(Request $request, Slider $slider)
    {
        $attributes = $this->validateSlider();
        $slider->update($attributes);

        return redirect()->route('sliders');
    }

    public function admin()
    {
        $items = Slider::orderBy('display_order')
                            ->get(['id','image', 'title', 'display_order'])
                            ->toArray();
                            
        $headings = array('ID','Imagen', 'Nombre', 'Orden');
        return view('admin.sliders.index', compact('items', 'headings'));
    }

    protected function validateSlider()
    {
        $attributes = request()->validate([
            'title'             => ['string', 'required', 'max:255'],
            'description'       => ['string', 'required', 'max:455'],
            'display_order'     => ['integer', 'required'],
            'image'             => ['file'],
            'short_text'        => ['string', 'required', 'max:155'],
            'button'            => ['bool', 'required'],
            'button_text'       => ['nullable', 'max:255'],
            'button_route'      => ['nullable', 'max:455'],
        ]);

        if(request('image')){

            $attributes['image'] = request('image')->store('sliders');

            
        }

        return $attributes;
    }
}
