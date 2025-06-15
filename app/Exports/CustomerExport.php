<?php

namespace App\Exports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\withHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Carbon\Carbon;

class CustomerExport implements FromCollection, WithMapping, WithHeadings, WithStyles
{
    public $count = 0;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Customer::all();
    }

    public function headings(): array
    {
        return [
            'S/N',
            'NAME',
            'EMAIL',
            'CONTACT',
            'CREATED ON',

        ];
    }

    public function map($customer): array
    {


        return [
            ++$this->count,
            $customer->name,
            $customer->email,
            $customer->phone,
            $customer->created_at->format('d-m-Y'),
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold'=> true]]
        ];
    }

}
