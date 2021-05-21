<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::default('none');

class UsersImport implements ToModel, WithUpserts, WithHeadingRow
{

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    
    public function model(array $row)
    {
        $user = User::create([
            'name'      => $row['NAMA PESERTA'],
            'email'     => $row['EMAIL (Token)'],
            'kelas_id'  => $row['ID KELAS'],
            'password'  => Hash::make($row['PASSWORD']),
        ]);
        $user->attachRole('participant');
        return $user;
    }

    public function uniqueBy()
    {
        return 'email';
    }
}
