<?php

namespace App\Http\Requests;

use App\Task;
use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
            'project_id' => 'required',
            'priority' => 'required'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'project_id.required' => 'The project field is required.',
        ];
    }

    /**
     * Get the validator instance for the request.
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function getValidatorInstance()
    {
        if($this->method() === 'POST') {
            $this->generatePriority();
        }

        return parent::getValidatorInstance();
    }

    /**
     * Generate priority based on the maximum priority count
     * @return int
     */
    public function generatePriority()
    {
        $nextPriority = Task::max('priority') + 1;

        $this->merge(['priority' => $nextPriority]);
    }
}
