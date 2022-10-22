<?php

namespace Src\JobPortal\Application\Infrastructure\Controllers\Create;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Src\JobPortal\_Shared\Helpers\RequestHelper;
use Src\JobPortal\Application\Domain\Exceptions\ApplicationException;

class ApplicationCreateRequestValidation extends FormRequest
{
    use RequestHelper;

    public function rules(): array
    {
        return [
            'annotations' => 'required|string',
            'candidate_id' => 'exists:candidates,id|required|string',
            'offer_id' => 'exists:offers,id|required|string',
            'status' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'status.required' => 'Status is required.',
        ];
    }

    public function failedValidation(Validator $validator): void
    {
        throw new ApplicationException($this->formatErrorRequestValidations($validator->errors()->all()), 400);
    }
}
