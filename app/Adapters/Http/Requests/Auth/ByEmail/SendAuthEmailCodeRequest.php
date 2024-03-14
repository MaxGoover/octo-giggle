<?php

namespace App\Adapters\Http\Requests\Auth\ByEmail;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\RateLimiter;

class SendAuthEmailCodeRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => config('validation.rules.auth.email'),
        ];
    }

    // public function messages()
    // {
    //     return config('validation.messages.auth.email');
    // }

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
