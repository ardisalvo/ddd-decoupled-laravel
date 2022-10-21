<?php

namespace Src\JobPortal\Offer\Infrastructure\Controllers\Create;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Src\JobPortal\_Shared\Helpers\RequestHelper;
use Src\JobPortal\Offer\Domain\Exceptions\OfferException;

class OfferCreateRequestValidation extends FormRequest
{
    use RequestHelper;

    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'description' => 'required|string',
            'company_id' => 'exists:companies,id|required|string',
            'status' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Offer title is required.',
        ];
    }

    public function failedValidation(Validator $validator): void
    {
        throw new OfferException($this->formatErrorRequestValidations($validator->errors()->all()), 400);
    }
}
