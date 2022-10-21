<?php

namespace Src\JobPortal\Offer\Infrastructure\Controllers\Delete;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Src\JobPortal\_Shared\Helpers\RequestHelper;
use Src\JobPortal\Offer\Domain\Exceptions\OfferException;
use \Illuminate\Http\Response;


class OfferDeleteByIdRequestValidation extends FormRequest
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
        throw new OfferException($this->formatErrorRequestValidations($validator->errors()->all()), 400);
    }
}
