<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\PostQurban;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PostQurbanExport implements FromCollection, WithHeadings, WithMapping, WithStyles, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return PostQurban::select(
            'tanggal_pq',
            'qurban_sapi',
            'qurban_kambing',
            'mustahiq_pq',
            'status_pq'
        )->get();
    }

    public function headings(): array
    {
        return [
            'Tanggal',
            'Hewan Qurban (Sapi)',
            'Hewan Qurban (Kambing)',
            'Jumlah Mustahiq',
            'Status'
        ];
    }

    public function map($postQurban): array
    {
        return [
            Carbon::parse($postQurban->tanggal_pq)
                ->locale('id')
                ->translatedFormat('l, d F Y'),
            $postQurban->qurban_sapi,
            $postQurban->qurban_kambing,
            $postQurban->mustahiq_pq,
            ucfirst($postQurban->status_pq),
        ];
    }

    public function styles(\PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $sheet)
    {
        return [
            1 => [
                'font' => ['bold' => true, 'size' => 12],
                'alignment' => ['horizontal' => 'center'],
            ],
        ];
    }
}
