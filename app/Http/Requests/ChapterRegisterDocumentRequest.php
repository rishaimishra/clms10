<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChapterRegisterDocumentRequest extends FormRequest
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
        $moms = count($this->input('chapter_register_documents'));
        if($moms == 0){return $rules;}
        if($moms != 0)
            {
                foreach(range(0, $moms) as $index) 
                         {
                          $rules['chapter_register_documents.' . $index] = 'required|mimes:pdf,doc,docx|max:5000';
                         }
                return $rules;
            }      
    }
}
