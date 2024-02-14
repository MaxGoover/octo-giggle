<?php

namespace App\Adapters\Http\Requests\Auth;

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
            'email' => 'required|string|email',
            'emailCode.id' => 'required|integer',
            'emailCode.code' => 'required|integer|min:' . config('validation.email_code.min_number') . '|max:' . config('validation.email_code.max_number'),
        ];
    }


    public function clearThrottleKey(): void {
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
