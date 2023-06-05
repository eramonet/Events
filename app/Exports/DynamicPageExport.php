<?php

namespace App\Exports;

use App\Models\DynamicPage;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class DynamicPageExport implements FromQuery ,WithMapping,WithHeadings,WithColumnFormatting,WithStyles,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return DynamicPage::query()->with('admin');
    }


    public function headings(): array
    {
        return [
            'Id',
            'Title In Arabic',
            'Title In English',
            'Admin',
            'Status',
            'Created At'
        ];
    }

    public function map($blog): array
    {
         return[
            $blog->id,
            $blog->title_ar,
            $blog->title_en,
            $blog->admin ? $blog->admin->name :'--',
            $blog->status ?'Active':'InActive' ,
            Date::dateTimeToExcel($blog->created_at),

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
