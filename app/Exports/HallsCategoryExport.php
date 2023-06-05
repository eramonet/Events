<?php

namespace App\Exports;

use App\Models\HallCategory;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class HallsCategoryExport implements FromQuery ,WithMapping,WithHeadings,WithColumnFormatting,WithStyles,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return HallCategory::query();
    }


    public function headings(): array
    {
        return [
            'Id',
            'Title In Arabic',
            'Title In English',
            'Status',
            'Created At'
        ];
    }

    public function map($tax): array
    {
         return[

            $tax->id,
            $tax->title_ar,
            $tax->title_en,
            $tax->status ?'Active':'InActive' ,
            Date::dateTimeToExcel($tax->created_at),

         ];
    }

    public function columnFormats(): array
    {
        return [
            'E' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }


    public function styles(Worksheet $sheet)
    {
        return [

            1  => ['font' => ['bold' => true]],
        ];
    }



}
