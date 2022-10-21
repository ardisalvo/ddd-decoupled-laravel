<?php

namespace Src\JobPortal\Candidate\Infrastructure\Controllers\Delete;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Src\JobPortal\_Shared\Helpers\RequestHelper;
use Src\JobPortal\Candidate\Domain\Exceptions\CandidateException;
use \Illuminate\Http\Response;


class CandidateDeleteByIdRequestValidation extends FormRequest
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
            'id.required' => 'Candidate ID is required.',
        ];
    }

    public function failedValidation(Validator $validator): Response
    {
        throw new CandidateException($this->formatErrorRequestValidations($validator->errors()->all()), 400);
    }
}
