<?php

namespace Src\JobPortal\Candidate\Infrastructure\Controllers\Search\ByEmail;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Src\JobPortal\_Shared\Helpers\RequestHelper;
use Src\JobPortal\Candidate\Domain\Exceptions\CandidateException;
use \Illuminate\Http\Response;

class CandidateSearchByEmailRequestValidation extends FormRequest
{
    use RequestHelper;

    public function rules(): array
    {
        return [
            'email' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Candidate email is required.',
        ];
    }

    public function failedValidation(Validator $validator): Response
    {
        throw new CandidateException($this->formatErrorRequestValidations($validator->errors()->all()), 400);
    }
}
