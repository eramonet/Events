<?php

namespace App\Exports;

use App\Models\Admin;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithEvents;


class SystemAdminExport implements FromQuery,
WithMapping,
WithHeadings ,
WithColumnFormatting,
ShouldAutoSize,
WithStyles
{

    public function query()
    {
        return Admin::query()->whereRoleIs(['admin', 'super-admin'])->with(['roles','category']);
    }



    public function headings(): array
    {
        return [
            'Id',
            'Name',
            'Email',
            'phone',
            'Status',
            'Role',
            'Gender',
            'Category',
            'Created At'
        ];
    }

    public function map($admin): array
    {

        $category = $admin->category ? $admin->category->title_en.' - ' . $admin->category->title_ar :'-' ;

         return[

            $admin->id,
            $admin->name,
            $admin->email,
            $admin->phone,
            $admin->status ?'Active':'InActive' ,

            $admin->roles ? $admin->roles[0]->name :'-',
            $admin->gender,
            $category ,

            Date::dateTimeToExcel($admin->created_at),

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
