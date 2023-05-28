<?php

namespace App\Exports;


use App\Models\AdminCategory;
use Maatwebsite\Excel\Concerns\FromQuery;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;


class AdminCategoryExport implements FromQuery ,WithMapping,WithHeadings,WithColumnFormatting,WithStyles,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return AdminCategory::query()->withCount(['vendor_admins','system_admins']);
    }


    public function headings(): array
    {
        return [
            'Id',
            'Title In Arabic',
            'Title In English',
            'Details In Arabic',
            'Details In English',
            'System Admins Count',
            'Vendor Admins Count',
            'Status',
            'Created At'
        ];
    }

    public function map($category): array
    {
         return[

            $category->id,
            $category->title_ar,
            $category->title_en,
            $category->details_ar,
            $category->details_en,
            $category->system_admins_count,
            $category->vendor_admins_count,
            $category->status ?'Active':'InActive' ,
            Date::dateTimeToExcel($category->created_at),

         ];
    }

    public function columnFormats(): array
    {
        return [
            'I' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }


    public function styles(Worksheet $sheet)
    {
        return [

            1  => ['font' => ['bold' => true]],
        ];
    }




}
