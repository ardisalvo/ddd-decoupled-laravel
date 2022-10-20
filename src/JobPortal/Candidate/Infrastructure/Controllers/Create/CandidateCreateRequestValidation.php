<?php

namespace Src\JobPortal\Candidate\Infrastructure\Controllers\Create;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Src\JobPortal\_Shared\Helpers\RequestHelper;
use Src\JobPortal\Candidate\Domain\Exceptions\CandidateException;

class CandidateCreateRequestValidation extends FormRequest
{
    use RequestHelper;

    public function rules(): array
    {
        return [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'unique:candidates|required|email',
            'phone' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.required' => 'Candidate  first name is required.',
            'email.unique' => 'Email is already in database.',
        ];
    }

    public function failedValidation(Validator $validator): void
    {
        throw new CandidateException($this->formatErrorRequestValidations($validator->errors()->all()), 400);
    }
}
