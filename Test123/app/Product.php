<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    protected $table = 'Product';
    
    public function __construct(array $attributes = array()) {
        parent::__construct($attributes);
        $arr = array();       
        $c =  Storage::disk('local')->get('database.json');
        if(!isset($c)){
            Storage::disk('local')->put('database.json', json_encode($arr));
        }
    }


    public function store(Http\Requests\SaveProductRequest $request){
        $content = Storage::disk('local')->get('database.json');
        
            $decode = json_decode($content);
            $decode[] = [$request->name, $request->quantity, $request->price];
            $encode = json_encode($decode);
            Storage::disk('local')->put('database.json', $encode);
        
    }
    
    public function getAll(){
        $content = Storage::disk('local')->get('database.json');
        if($content != null){
            return json_decode($content);
        }
        return array();
    }
    
}
