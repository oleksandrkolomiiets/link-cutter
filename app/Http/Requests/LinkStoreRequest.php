<?php

namespace App\Http\Requests;

use App\Rules\DateBefore;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LinkStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'url' => 'required|active_url',
            'limit' => 'required|integer|min:0',
            'valid_until' => ['required', new DateBefore(Carbon::now()->addDay())],
        ];
    }
}
