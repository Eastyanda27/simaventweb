<?php

namespace App\Charts;

use App\Models\Kendaraan;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class VehicleCategoryChart
{
    protected $chart;

    public function __construct(LarapexChart $vehiclechart)
    {
        $this->chart = $vehiclechart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        // Ambil data jumlah aset per kategori
        $data = Kendaraan::groupBy('sub_category')
        ->selectRaw('sub_category, COUNT(*) as total')
        ->pluck('total');

        // Ambil label kategori
        $labels = Kendaraan::with('jenisAset')
            ->groupBy('sub_category')
            ->select('sub_category')
            ->get()
            ->pluck('jenisAset.sub_category');

        return $this->chart->pieChart()
            ->setTitle('Jumlah Aset Kendaraan Berdasarkan Kategori')
            ->setSubtitle('')
            ->addData($data->toArray())  // Data harus berupa array angka
            ->setLabels($labels->toArray());  // Labels harus berupa array nama kategori
    }
}
