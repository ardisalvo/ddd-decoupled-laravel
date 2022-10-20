<?php

namespace Src\JobPortal\Company\Infrastructure\Controllers\Search\ByName;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Src\JobPortal\_Shared\Helpers\RequestHelper;
use Src\JobPortal\Company\Domain\Exceptions\CompanyException;
use \Illuminate\Http\Response;

class CompanySearchByNameRequestValidation extends FormRequest
{
    use RequestHelper;

    public function rules(): array
    {
        return [
            'name' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Company name is required.',
        ];
    }

    public function failedValidation(Validator $validator): Response
    {
        throw new CompanyException($this->formatErrorRequestValidations($validator->errors()->all()), 400);
    }
}
