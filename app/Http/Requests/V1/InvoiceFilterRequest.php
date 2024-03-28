<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class InvoiceFilterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id' => 'integer',
            'amountFrom' => 'integer',
            'amountTo' => 'integer',
            'status' => 'string',
            'billedDateFrom' => 'date',
            'billedDateTo' => 'date',
            'paidDate' => ['nullable', 'date'],
            'sortBy' => Rule::in(['id']),
            'sortOrder' => Rule::in(['asc', 'desc']),
        ];
    }

    /**
     * Сообщения ошибок
     * @return array[]
     */
    public function messages(): array
    {
        return [
            'sortBy' => "sortBy: Query can be Sorted By 'customerId'",
            'sortOrder' => "sortOrder: must be asc or desc",
        ];
    }
}
