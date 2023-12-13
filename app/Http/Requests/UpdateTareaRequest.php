<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Tarea;

class UpdateTareaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $tarea = Tarea::find($this->route('tarea'))->first();
        $user = \Auth::user();
        if($user) {
            if ($tarea->dni == $user->dni) {
                return true;
            }
            else {
                return false;
            }            
        }
        else {
            return false;
        }        
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:50',
            'description' => 'nullable|string',
            'expires_at' => 'required|date',
            'status' => 'required|string'
        ];
    }
}
