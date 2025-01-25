<?php

namespace App\Charts;

use App\Models\TanahBangunan;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class BuildingCategoryChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        // Ambil data jumlah aset per kategori
        $data = TanahBangunan::groupBy('sub_category')
        ->selectRaw('sub_category, COUNT(*) as total')
        ->pluck('total');

        // Ambil label kategori
        $labels = TanahBangunan::with('jenisAset')
            ->groupBy('sub_category')
            ->select('sub_category')
            ->get()
            ->pluck('jenisAset.sub_category');

        return $this->chart->pieChart()
            ->setTitle('Jumlah Aset Tanah Bangunan Berdasarkan Kategori')
            ->setSubtitle('')
            ->addData($data->toArray())  // Data harus berupa array angka
            ->setLabels($labels->toArray());  // Labels harus berupa array nama kategori
    }
}
