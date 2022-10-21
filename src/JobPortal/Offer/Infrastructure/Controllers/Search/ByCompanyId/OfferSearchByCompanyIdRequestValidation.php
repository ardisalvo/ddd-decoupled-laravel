<?php

namespace Src\JobPortal\Offer\Infrastructure\Controllers\Search\ByCompanyId;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Src\JobPortal\_Shared\Helpers\RequestHelper;
use Src\JobPortal\Offer\Domain\Exceptions\OfferException;

class OfferSearchByCompanyIdRequestValidation extends FormRequest
{
    use RequestHelper;

    public function rules(): array
    {
        return [
            'company_id' => 'required|string|exists:companies,id',
        ];
    }

    public function messages(): array
    {
        return [
            'company_id.required' => 'Offer company ID is required.',
        ];
    }

    public function failedValidation(Validator $validator): Response
    {
        throw new OfferException($this->formatErrorRequestValidations($validator->errors()->all()), 400);
    }
}
