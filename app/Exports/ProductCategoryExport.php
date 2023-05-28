<?php

namespace App\Exports;

use App\Models\ProductCategory;
use App\Models\ProductColor;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;


class ProductCategoryExport implements FromQuery, WithMapping, WithHeadings, WithColumnFormatting, WithStyles, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function query()
    {
        return ProductCategory::query();
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

    public function map($category): array
    {
        return [

            $category->id,
            $category->title_ar,
            $category->title_en,
            $category->status ? 'Active' : 'InActive',
            Date::dateTimeToExcel($category->created_at),

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