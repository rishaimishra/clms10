<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Recommendation_LetterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            
        ];
        $moms = count($this->input('Recommendation_Letter'));
        if($moms == 0){return $rules;}
        if($moms != 0)
            {
                foreach(range(0, $moms) as $index) 
                         {
                          $rules['Recommendation_Letter.' . $index] = 'required|mimes:pdf,doc,docx|max:5000';
                         }
                return $rules;
            }      
    }
}
