<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function headings(): array
    {
        return [
            'NAMA PESERTA',
            'EMAIL (Token)',
            'ID KELAS',
            'STATUS'
        ];
    }

    public function collection()
    {
        return User::whereRoleIs('participant')->get();
    }

    public function map($user): array
    {
        if ($user->has_blacklisted) {
            $status = 'Diblacklist';
        } elseif (!$user->has_voted) {
            $status = 'Belum Memilih';
        } elseif ($user->has_voted) {
            $status = 'Sudah Memilih';
        }
        return [
            $user->name,
            $user->email,
            $user->kelas_id,
            $status
        ];
    }
}
