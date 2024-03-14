<?php

namespace App\Adapters\Http\Requests\Auth\ByEmail;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\RateLimiter;

class SignInByEmailRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => config('validation.rules.auth.email'),
            'emailCode.id' => config('validation.rules.auth.email_code.id'),
            'emailCode.code' => config('validation.rules.auth.email_code.code'),
        ];
    }

    public function clearThrottleKey(): void
    {
        RateLimiter::clear($this->throttleKey());
    }

    public function isTooManyAttempts(): bool
    {
        return RateLimiter::tooManyAttempts($this->throttleKey(), 5);
    }

    /**
     * Get the rate limiting throttle key for the request.
     */
    public function throttleKey(): string
    {
        return $this->input('email') . '|' . $this->ip();
    }
}
