<?php

namespace Src\JobPortal\Company\Infrastructure\Controllers\Search\ById;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Src\JobPortal\_Shared\Helpers\RequestHelper;
use Src\JobPortal\Company\Domain\Exceptions\CompanyException;

class CompanySearchByIdRequestValidation extends FormRequest
{
    use RequestHelper;

    public function rules(): array
    {
        return [
            'id' => 'required|uuid',
        ];
    }

    public function messages(): array
    {
        return [
            'id.required' => 'Company ID is required.',
        ];
    }

    public function failedValidation(Validator $validator): Response
    {
        throw new CompanyException($this->formatErrorRequestValidations($validator->errors()->all()), 400);
    }
}
