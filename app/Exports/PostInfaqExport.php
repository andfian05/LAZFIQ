<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\PostInfaq;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PostInfaqExport implements FromCollection, WithHeadings, WithMapping, WithStyles, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return PostInfaq::select(
            'tanggal_pi',
            'debit_pi',
            'kredit_pi',
            'saldo_akhir_pi',
            'status_pi'
        )->get();
    }

    public function headings(): array
    {
        return [
            'Tanggal',
            'Pemasukan (Rp)',
            'Pengeluaran (Rp)',
            'Saldo Akhir (Rp)',
            'Status',
        ];
    }

    public function map($postInfaq): array
    {
        return [
            Carbon::parse($postInfaq->tanggal_pi)
                ->locale('id')
                ->translatedFormat('l, d F Y'),
            number_format($postInfaq->debit_pi, 2, ',', '.'),
            number_format($postInfaq->kredit_pi, 2, ',', '.'),
            number_format($postInfaq->saldo_akhir_pi, 2, ',', '.'),
            ucfirst($postInfaq->status_pi),
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
