<?php

namespace Src\JobPortal\Application\Infrastructure\Controllers\Search\ByCandidateId;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Src\JobPortal\_Shared\Helpers\RequestHelper;
use Src\JobPortal\Application\Domain\Exceptions\ApplicationException;

class ApplicationSearchByCandidateIdRequestValidation extends FormRequest
{
    use RequestHelper;

    public function rules(): array
    {
        return [
            'candidate_id' => 'required|string|exists:candidates,id',
        ];
    }

    public function messages(): array
    {
        return [
            'candidate_id.required' => 'Offer candidate ID is required.',
        ];
    }

    public function failedValidation(Validator $validator): Response
    {
        throw new ApplicationException($this->formatErrorRequestValidations($validator->errors()->all()), 400);
    }
}
