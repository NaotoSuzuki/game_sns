<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
          // 'releasedate' => 'required',
          'device' => 'required',
          // 'gametitle' => 'required',
          'note' => 'required'
      ];
    }

    public function attributes() {
       return [
           'releasedate' => 'リリース日/予定日',
           'device' => '機種名',
           'gametitle' => 'タイトル名',
           'note' => '備考・説明',
       ];
   }
}
