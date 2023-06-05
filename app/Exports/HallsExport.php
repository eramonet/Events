<?php

namespace App\Exports;


use App\Models\Hall;
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

class HallsExport implements FromQuery ,WithMapping,WithHeadings,WithColumnFormatting,WithStyles,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return Hall::query()->with(['country','city','vendor']);
    }


    public function headings(): array
    {
        return [
            'Id',
            'Title In Arabic',
            'Title In English',
            'Email',
            'Phone Number',
            'Hall guests Full capacity',
            'Views ',
            'Country' ,
            'City' ,
            'Vendor' ,
            'Status',
            'Created At'
        ];
    }

    public function map($hall): array
    {

        $country = $hall->country ? $hall->country->title_en .' - '.$hall->country->title_ar : '-';
        $city = $hall->city ? $hall->city->title_en .' - '.$hall->city->title_ar : '-';
        $vendor = $hall->vendor ? $hall->vendor->title_en .' - '.$hall->vendor->title_ar : '-';


         return[

            $hall->id,
            $hall->title_ar,
            $hall->title_en,
            $hall->email,
            $hall->phone,
            $hall->guests_capacity,
            \number_format($hall->views),
            $country ,
             $city,
             $vendor,

            $hall->status ?'Active':'InActive' ,
            Date::dateTimeToExcel($hall->created_at),

         ];
    }

    public function columnFormats(): array
    {
        return [
            'L' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }


    public function styles(Worksheet $sheet)
    {
        return [

            1  => ['font' => ['bold' => true]],
        ];
    }



}
