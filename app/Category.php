<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    public static $messages = [
    'name.required' => 'El nombre es requerido',
    'name.min' => 'El nombre debe superar los 3 caracteres',
    'description.max' => 'La descripcion solo admite hasta 100 caracteres',

    ];

    public static $rules = [
    'name' => 'required|min:3',
    'description' => 'max:100'

    ];

    protected $fillable = ['name', 'description'];

    //$category->products
    public function products(){
        return $this->hasMany(Product::class);
    }

    public function getFeaturedImageUrlAttribute(){

        $featuredProduct = $this->products()->first();
        return $featuredProduct->featured_image_url;

    }
}
