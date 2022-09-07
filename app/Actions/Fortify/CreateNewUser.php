<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Str;
use Carbon\Carbon;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique(User::class),],
            // 'password' => ['required', 'string', 'length:8'],
            'password' => $this->passwordRules(),
            'permohonan' => 'required',
            'alamat' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'nik' => 'required',
            'tempatlahir' => 'required',
            'tanggal' => 'required|date',
            'hp' => 'required|numeric|min:7',
            'jk' => 'required',
            'ktp' => 'required|file|mimes:png,jpg,jpeg,pdf|max:512'
        ])->validate();

        $data = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'kategori_id' => $input['permohonan'],
            'alamat' => $input['alamat'],
            'rt' => $input['rt'],
            'rw' => $input['rw'],
            'nik' => $input['nik'],
            'tempat_lahir' => $input['tempatlahir'],
            // 'tgl_lahir' => $input['tanggal'],
            'tgl_lahir' => Carbon::parse($input['tanggal'])->format('Y-m-d'),
            'no_hp' => $input['hp'],
            'jenis_kelamin' => $input['jk'],
            'roles' => 3,
            'no_register' => $this->nomor_register(),
            'permohonan_id' => 1,
        ]);

        if (request()->hasFile('ktp')) {
            $file = request()->file('ktp')->store('ktp_pendaftar');
            $data->update(['scan_ktp' => $file]);
        }

        return $data;
    }

    public function nomor_register()
    {
        $random = Str::random(4);
        $noreg = date('hisYmd') . strtoupper($random);
        return $noreg;
    }
}
