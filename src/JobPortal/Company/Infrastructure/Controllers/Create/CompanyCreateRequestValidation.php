<?php

namespace Src\JobPortal\Company\Infrastructure\Controllers\Create;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Src\JobPortal\_Shared\Helpers\RequestHelper;
use Src\JobPortal\Candidate\Domain\Exceptions\CandidateException;

class CompanyCreateRequestValidation extends FormRequest
{
    use RequestHelper;

    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'duration' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Company name is required.',
            'duration.required' => 'Company Duration is required.',

        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new CandidateException($this->formatErrorRequestValidations($validator->errors()->all()), 400);
    }
}
