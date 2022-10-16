<?php

namespace Src\JobPortal\Candidate\Infrastructure\RequestValidations;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Src\JobPortal\_Shared\Helpers\RequestHelper;
use Src\JobPortal\Candidate\Domain\Exceptions\CandidateException;

class CandidateUpdateRequestValidation extends FormRequest
{

    use RequestHelper;

    public function rules(): array
    {
        return [
            'first_name' => 'string',
            'last_name' => 'string',
            'phone' => 'string',
            'email' => 'email|unique:candidates',
            //'candidate_id' => 'required|exists:candidates'
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.required' => 'First name is required.',
            'last_name.required' => 'Last name is required.',
            'phone.required' => 'Phone number is required.',
            'email.required' => 'Email is required.',
            'email.email' => 'Email should be valid.',
            'email.unique' => 'Email already exists.',
            //'candidate_id.unique' => 'Candidate ID is required.',
            //'candidate_id.exists' => 'Unable to find a candidate.',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new CandidateException($this->formatErrorRequestValidations($validator->errors()->all()), 400);
    }
}
