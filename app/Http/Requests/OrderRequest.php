<?php

namespace App\Http\Requests;

use App\Dto\OrderDto;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'fio' => 'required|string',
            'address' => 'required|string',
            'sum' => 'required|numeric',
        ];
    }

    public function getDto() : OrderDto
    {
        return new OrderDto(
            $this->get('phone'),
            $this->get('fio'),
            $this->get('address'),
            $this->get('sum'),
        );
    }

    protected function failedValidation(Validator $validator)
    {
        // все ошибки валидации
        $errors = (new ValidationException($validator))->errors();

        throw new HttpResponseException(response()->json([
            'status' => false,
            'errors' => $errors
        ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY));
    }

}
