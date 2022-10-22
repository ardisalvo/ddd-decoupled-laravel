<?php

namespace Src\JobPortal\Application\Infrastructure\Controllers\Delete;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Src\JobPortal\_Shared\Helpers\RequestHelper;
use Src\JobPortal\Application\Domain\Exceptions\ApplicationException;

class ApplicationDeleteByIdRequestValidation extends FormRequest
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
            'id.required' => 'Offer ID is required.',
        ];
    }

    public function failedValidation(Validator $validator): Response
    {
        throw new ApplicationException($this->formatErrorRequestValidations($validator->errors()->all()), 400);
    }
}
