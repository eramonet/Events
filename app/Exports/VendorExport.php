<?php

namespace App\Exports;


use App\Models\Vendor;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class VendorExport implements FromQuery ,WithMapping,WithHeadings,WithColumnFormatting,WithStyles,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return Vendor::query();
    }


    public function headings(): array
    {
        return [
            'Id',
            'Title In Arabic',
            'Title In English',
            'Email',
            'Phone Number',
            'Commission',
            'Can Add Product',
            'Can Add Hall',
            'Status',
            'Created At'
        ];
    }

    public function map($vendor): array
    {
         return[

            $vendor->id,
            $vendor->title_ar,
            $vendor->title_en,
            $vendor->email,
            $vendor->phone,
            $vendor->commission,
            $vendor->can_add_products ?'Active':'InActive' ,
            $vendor->can_add_halls ?'Active':'InActive' ,

            $vendor->status ?'Active':'InActive' ,
            Date::dateTimeToExcel($vendor->created_at),

         ];
    }

    public function columnFormats(): array
    {
        return [
            'J' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }


    public function styles(Worksheet $sheet)
    {
        return [

            1  => ['font' => ['bold' => true]],
        ];
    }



}
