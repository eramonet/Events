<?php




namespace App\Exports;

use Illuminate\Support\Carbon;
use App\Models\Shipping;
use App\Models\PromoCode;
use Maatwebsite\Excel\Concerns\FromQuery;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;


class PromoCodeExport implements FromQuery ,WithMapping,WithHeadings,WithColumnFormatting,WithStyles,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return PromoCode::query()->with('user');
    }


    public function headings(): array
    {
        return [
            'Id',
            'Title',
            'Dedicated To',
            'For User',
            'Type',
            'Value',
            'Maximum Times of Use ',
            'Count  of Use ',
            'Status',
            'Expired Date',
            'Created At'
        ];
    }

    public function map($promo): array
    {


        $expiration_date = new \DateTime($promo->expiration_date);

        $expiration_date = Carbon::instance($expiration_date);
        // dd( $expiration_date , $promo->created_at);
         return[

            $promo->id,
            $promo->title,
            $promo->dedicated_to,
            $promo->user ? $promo->user->name.'-' .$promo->user->phone :'-',
            $promo->type,
            $promo->value,
            $promo->maximum_times_of_use,
            $promo->count_of_use,

            $promo->status ?'Active':'InActive' ,
            Date::dateTimeToExcel(  $expiration_date),
            Date::dateTimeToExcel($promo->created_at),

         ];
    }

    public function columnFormats(): array
    {
        return [
            'K' => NumberFormat::FORMAT_DATE_DDMMYYYY,
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
















