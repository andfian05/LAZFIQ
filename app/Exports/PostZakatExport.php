<?php

namespace App\Exports;

use App\Models\PostZakat;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;

class PostZakatExport implements FromCollection, WithHeadings, WithMapping, WithStyles, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return PostZakat::select(
            'tanggal_pz',
            'zakat_uang',
            'zakat_beras',
            'mustahiq_pz',
            'status_pz'
        )->get();
    }

    public function headings(): array
    {
        return [
            'Tanggal',
            'Jumlah Zakat Uang (Rp)',
            'Jumlah Zakat Beras (Kg)',
            'Jumlah Mustahiq',
            'Status'
        ];
    }

    public function map($postZakat): array
    {
        return [
            Carbon::parse($postZakat->tanggal_pz)
                ->locale('id')
                ->translatedFormat('l, d F Y'),
            number_format($postZakat->zakat_uang, 2, ',', '.'),
            $postZakat->zakat_beras,
            $postZakat->mustahiq_pz,
            ucfirst($postZakat->status_pz),
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
