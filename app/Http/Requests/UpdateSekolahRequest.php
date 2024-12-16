<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSekolahRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->can('edit-sekolah');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:sekolahs,email,' . $this->route('sekolah')->id],
            'no_telp' => ['nullable', 'string' , 'max:20'],
            'alamat' => ['nullable', 'string', 'max:255'],
            'jurusan' => ['array', 'exists:jurusans,id'],
            'angkatan' => ['array', 'exists:angkatans,id']

        ];
    }
}
