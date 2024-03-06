<?php

namespace App\Exports;
use App\Models\User;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportUser implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::with('userDetail','educationalDetail')->get();
    }

    public function map($row): array
    {

        return [
            $row->id,
            $row->name,
            $row->email,
            $row->userDetail->phone,
            $row->userDetail->address,
            $row->userDetail->city,
            $row->userDetail->pincode,
            $row->userDetail->state,
            $row->userDetail->country,
            $row->educationalDetail->program,
            $row->educationalDetail->batch,
            $row->educationalDetail->passing_year,
            $row->educationalDetail->university,
        ];
    }

    public function headings(): array
    {
        return ["Sr No.", "Name", "Email","Phone","Address","City","Pin Code","State","Country","Program","Batch","Passing Year","University"];
    }
}
