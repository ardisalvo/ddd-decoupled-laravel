<?php

namespace Src\JobPortal\Application\Infrastructure\Controllers\Search\ByOfferId;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Src\JobPortal\_Shared\Helpers\RequestHelper;
use Src\JobPortal\Application\Domain\Exceptions\ApplicationException;

class ApplicationSearchByOfferIdRequestValidation extends FormRequest
{
    use RequestHelper;

    public function rules(): array
    {
        return [
            'offer_id' => 'required|string|exists:offers,id',
        ];
    }

    public function messages(): array
    {
        return [
            'offer_id.required' => 'Application offer ID is required.',
        ];
    }

    public function failedValidation(Validator $validator): Response
    {
        throw new ApplicationException($this->formatErrorRequestValidations($validator->errors()->all()), 400);
    }
}
