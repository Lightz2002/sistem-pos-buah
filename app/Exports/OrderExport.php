<?php

namespace App\Exports;

use App\Models\Order;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class OrderExport implements FromQuery, WithHeadings, WithMapping
{
  /**
   * @return \Illuminate\Support\Collection
   */
  private $order;
  private $rowNumber = 1;

  public function query()
  {
    return $this->order;
  }

  public function __construct(Builder $order)
  {
    $this->order = $order;
  }

  public function headings(): array
  {
    return [
      'No',
      'Tanggal',
      'Nama Customer',
      'Total Penjualan'
    ];
  }

  /**
   * @param Order $order
   */
  public function map($order): array
  {
    return [
      $this->rowNumber++,
      $order->date,
      $order->customer_name,
      $order->total,
    ];
  }

  // public function columnFormats(): array
  // {
  //     return [
  //         'G' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED2,
  //         'H' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED2,
  //         'I' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED2,
  //     ];
  // }
}
