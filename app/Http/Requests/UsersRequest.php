<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
     public function rules()
   	{
   		return [
   			'name' => 'required',
   			'email' => 'required',
   			'nickname' => 'required',
   			'image' => 'required | mimes:jpeg,jpg,png',
   			'city_id' => 'required',
   			'target' => 'required',
   			'actualPassword' => 'required'
   		];
   	}

   	/**
   	* Get the validation messages that apply to the request.
   	*
   	* @return array
   	*/
   	public function messages()
   	{
   		return [
   			// 'title.required' => 'El título es obligatorio',
   			// 'rating.required' => 'El rating es obligatorio',
   			// 'genre_id.required' => 'El género es obligatorio',
   			// 'rating.numeric' => 'El rating debe ser un número',
   			// 'rating.max' => 'El rating debe ser un número entre 0 y 10',
   			// 'awards.required' => 'Los premios son obligatorios',
   			// 'release_date.required' => 'La fecha de lanzamiento es obligatoria',
   			// 'poster.required' => 'La imagen es obligatoria',
   			// 'poster.mimes' => 'Formatos permitidos JPG, y PNG',
   		];
   	}
   }
