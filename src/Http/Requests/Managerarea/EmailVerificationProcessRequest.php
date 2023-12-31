<?php

declare(strict_types=1);

namespace Cortex\Auth\Http\Requests\Managerarea;

class EmailVerificationProcessRequest extends EmailVerificationRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            // Do not validate `token` here since at this stage we can NOT generate viewable error,
            // and it is been processed in the controller through EmailVerificationBroker anyway
            //'token' => 'required|regex:/^([0-9a-f]*)$/',
            'email' => ['required', ...config('validation.rules.email'), 'exists:'.config('cortex.auth.models.manager').',email'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function getRedirectUrl()
    {
        return $this->redirector->getUrlGenerator()->route('managerarea.cortex.auth.account.verification.email.request');
    }
}
