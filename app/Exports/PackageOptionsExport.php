<?php

namespace App\Exports;

use App\Models\PackageOption;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PackageOptionsExport implements FromQuery ,WithMapping,WithHeadings,WithColumnFormatting,WithStyles,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return PackageOption::query()->with('category');
    }


    public function headings(): array
    {
        return [
            'Id',
            'Title In Arabic',
            'Title In English',
            'Category',
            'Status',
            'Created At'
        ];
    }

    public function map($option): array
    {

        $category = $option->category ? $option->category->title_en .' - '.$option->category->title_ar : '-';

         return[

            $option->id,
            $option->title_ar,
            $option->title_en,
            $category,
            $option->status ?'Active':'InActive' ,

            Date::dateTimeToExcel($option->created_at),

         ];
    }

    public function columnFormats(): array
    {
        return [
            'F' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }


    public function styles(Worksheet $sheet)
    {
        return [

            1  => ['font' => ['bold' => true]],
        ];
    }



}
