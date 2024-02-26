<?php

namespace App\Adapters\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\RateLimiter;

class SignInByPhoneRequest extends FormRequest
{
    /**
     * Пользователь должен быть авторизован, чтобы сделать этот запрос.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Правила валидации.
     */
    public function rules(): array
    {
        return [
            'password' => config('validation.auth.password'),
            'phoneFormatted' => 'required|string|max:' . config('validation.phone.max_length'),
        ];
    }

    /**
     * Очищает ключ для троттлинга.
     */
    public function clearThrottleKey(): void
    {
        RateLimiter::clear($this->_throttleKey());
    }

    /**
     * Определяет, не превышен ли лимит для троттлинга.
     */
    public function isTooManyAttempts(): bool
    {
        return RateLimiter::tooManyAttempts($this->_throttleKey(), 5);
    }

    /**
     * Возвращает ключ для троттлинга.
     */
    private function _throttleKey(): string
    {
        return $this->input('phoneFormatted') . '|' . $this->ip();
    }
}
