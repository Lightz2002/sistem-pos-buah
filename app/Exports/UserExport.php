<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class UserExport implements FromQuery, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    private $user;
    private $rowNumber = 1;

    public function query()
    {
        return $this->user;
    }

    public function __construct(Builder $user)
    {
        $this->user = $user;
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama',
            'No HP',
            'Alamat'
        ];
    }

    /**
     * @param User $user
     */
    public function map($user): array
    {
        return [
            $this->rowNumber++,
            $user->name,
            $user->phone_no,
            $user->address,
        ];
    }

    // public function columnFormats(): array
    // {
    //     return [
    //         'G' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED2,
    //         'H' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED2,
    //         'I' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED2,
    //     ];
    // }
}
