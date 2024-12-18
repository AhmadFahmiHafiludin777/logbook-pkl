<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class UpdateSiswaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->can('edit-siswa');
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
            'email' => ['required', 'email', 'max:255', 'unique:siswas,email,' . $this->route('siswa')->id],
            'alamat' => ['nullable', 'string', 'max:500'],
            'no_telp' => ['nullable', 'string' , 'max:20'],
            'angkatan_jurusan_sekolah_id' => ['required', 'exists:angkatan_jurusan_sekolahs,id'],
            'pembimbing_lapangan_id' => ['required', 'exists:pembimbing_lapangans,id'],
            'pembimbing_sekolah_id' => ['required', 'exists:pembimbing_sekolahs,id']
        ];
    }
}