<?php

declare(strict_types=1);

namespace Cortex\Auth\Http\Requests\Tenantarea;

class PasswordResetSendRequest extends PasswordResetRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'email' => ['required', ...config('validation.rules.email'), 'exists:'.config('cortex.auth.models.member').',email'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function getRedirectUrl()
    {
        return $this->redirector->getUrlGenerator()->route('tenantarea.cortex.auth.account.passwordreset.request');
    }
}
