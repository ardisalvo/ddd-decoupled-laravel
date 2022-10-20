<?php

namespace Src\JobPortal\Company\Infrastructure\Controllers\Create;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Src\JobPortal\_Shared\Helpers\RequestHelper;
use Src\JobPortal\Company\Domain\Exceptions\CompanyException;

class CompanyCreateRequestValidation extends FormRequest
{
    use RequestHelper;

    public function rules(): array
    {
        return [
            'name' => 'unique:companies|required|string',
            'sector' => 'required|string',
            'status' => 'required|int',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Company name is required.',
            'name.unique' => 'Company name is already in database.',
            'status.unique' => 'Company status is already in database.',
            'sector.unique' => 'Company sector is already in database.',
        ];
    }

    public function failedValidation(Validator $validator): void
    {
        throw new CompanyException($this->formatErrorRequestValidations($validator->errors()->all()), 400);
    }
}
