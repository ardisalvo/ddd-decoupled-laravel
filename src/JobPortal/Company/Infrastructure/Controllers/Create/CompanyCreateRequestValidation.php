<?php

namespace Src\JobPortal\Company\Infrastructure\Controllers\Create;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Src\JobPortal\_Shared\Helpers\RequestHelper;
use Src\JobPortal\Candidate\Domain\Exceptions\CompanyException;

class CompanyCreateRequestValidation extends FormRequest
{
    use RequestHelper;

    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'sector' => 'required|string',
            'status' => 'int',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Company name is required.',
            'sector.required' => 'Company Sector is required.',

        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new CompanyException($this->formatErrorRequestValidations($validator->errors()->all()), 400);
    }
}
