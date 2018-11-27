<?php

// namespace App;
//
// use Illuminate\Database\Eloquent\Model;
//
// class Activity extends Model
// {
//   protected $fillable = [
//     'id',
//     'name',
//     'targets_id',
//     'rangeAge',
//     'city_id'
//   ];

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model

  public function category()
  {
    return $this->hasOne(Category::class, 'id', 'category_id')
    //se relaciona una actividad con el id en el modelo category
    //un producto tiene una categoria lo va a buscar en la tabla category
    //el id y l pongo en category_id
  }
  // en el modelo product
  //
  public function products()
  {
    return $this->hasMany(Product::class, 'category_id', 'id');
  }
  // en el modelo Category
  //una categoria tiene muchos productos, voy a buscar en la tabla product el category_id
  //y lo pongo en el id


  public function colors(){
    return $this->belongsToMany(Color::class, 'color_product', 'product_id', 'color_id');

    //1ro con ultimo y 3ro con el nombre del modelo
    // el 2do es de la tabla pivot
  }

  public function products(){
    return $this->belongsToMany(Product::class, 'color_product', 'color_id', 'product_id');

    //1ro con ultimo y 3ro con el nombre del modelo
    // el 2do es de la tabla pivot
  }

}
