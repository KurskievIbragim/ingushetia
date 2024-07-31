<?php

namespace App\Http\Requests\Admin\News;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'title' => 'required|string',
            'lead' => 'required|string|max:255',
            'content' => 'required',
            'image_main' => 'required|image|mimes:jpg,jpeg,webp,png',
            'category_id' => 'nullable',
            'news_ing' => 'nullable',
            'main_material' => 'nullable',
            'user_id' => 'required',
            'agency_id' => 'required',
            'published_at' => 'required|date_format:Y-m-d\TH:i',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Заголовок обязателен для заполнения.',
            'title.string' => 'Заголовок должен быть строкой.',
            'lead.required' => 'Заполните краткое описание.',
            'lead.string' => 'Краткое описание должно быть строкой.',
            'lead.max' => 'Длина краткого описания не должна превышать 255 символов.',
            'content.required' => 'Заполните содержимое новости.',
            'image_main.required' => 'Необходимо выбрать изображение.',
            'image_main.image' => 'Файл должен быть изображением.',
            'image_main.mimes' => 'Изображение должно быть в формате: jpg, jpeg, webp, png.',
            'category_id.nullable' => 'Выбор категории не обязателен.',
            'news_ing.nullable' => 'Выбор перевода не обязателен.',
            'main_material.nullable' => 'Это поле не обязательно для заполнения.',
            'user_id.required' => 'Ошибка при определении пользователя.',
            'agency_id.required' => 'Ошибка при определении организации.',
            'published_at.required' => 'Укажите дату публикации.',
            'published_at.date_format' => 'Некорректный формат даты, используйте формат ГГГГ-ММ-ДДTЧЧ:ММ.',
        ];
    }
}
