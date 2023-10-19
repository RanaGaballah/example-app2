<?php

namespace App\Http\Controllers;

use App\Models\Offer;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;

class FirstController extends Controller
{
    public function first(){

        $data = [
            'name' , 'rana gaballah', '21'
            
        ];

        return view('welcome',compact('data'));

    }

    public function redirect($service){

        return Socialite::driver($service)->redirect();

    }

    public function callback($service)  {

        return $user = Socialite::with($service)->user();
        
    }

    public function offers()  {

        return Offer::get();
        
    }

    public function create(){
        return view('offers.create');
    }

    public function store(Request $request){
        //validate data before insert in db

        $rules = [
            'name' => 'required|max:10|unique:offers,name',
            'price' => 'required|numeric',
        ];

        $errorMsg = [
            'name.required' =>__('messages.offerNameRequired') ,
            'price.required' =>__('messages.offerPriceRequired') ,
            'price.numeric' => 'name must be number !!!'
        ];

        $validator = Validator::make($request->all(),$rules,$errorMsg);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInputs($request->all());
        }

        //insert data to db
        Offer::create([
            'name' => $request->name,
            'price' => $request->price
        ]);

        return redirect()->back()->with(['success' => 'you add offer successfully']);

        
    }


}
