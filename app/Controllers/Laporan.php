<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelProduk;
use App\Models\ModelAdmin;
use App\Models\ModelLaporan;


class Laporan extends BaseController
{
    public function __construct()
    {
        $this->ModelProduk = new ModelProduk();
        $this->ModelAdmin = new ModelAdmin();
        $this->ModelLaporan = new ModelLaporan();
    }

    public function PrintDataProduk()
    {
        $data = [
            'judul' => 'Laporan Data Produk',
            'produk' => $this->ModelProduk->AllData(),
            'web' => $this->ModelAdmin->DetailData(),
            'page' => 'Laporan/v_print_lap_produk'
        ];
        return view('laporan/v_template_print', $data);
    }

    public function LaporanHarian()
    {
        $data = [
            'judul' => 'Laporan',
            'subjudul' => 'Laporan Harian',
            'page' => 'laporan/v_laporan_harian',
            'web' => $this->ModelAdmin->DetailData(),
        ];
        return view('v_template', $data);
    }

    public function ViewLaporanHarian()
    {
        $tgl = $this->request->getPost('tgl');
        $data = [
            'judul' => 'Laporan Harian',
           'dataharian' => $this->ModelLaporan->DataHarian($tgl),
           'web' => $this->ModelAdmin->DetailData(),
           'tgl' => $tgl,
        ];

        $response = [
            'data' => view('laporan/v_tabel_lap_harian', $data)
        ];

        echo json_encode($response);
        //echo dd($this->ModelLaporan->DataHarian($tgl));
    }

    public function PrintLaporanHarian($tgl)
    {
        $data = [
            'judul' => 'Laporan Data Harian Penjualan',
            'dataharian' => $this->ModelLaporan->DataHarian($tgl),
            'web' => $this->ModelAdmin->DetailData(),
            'page' => 'Laporan/v_print_lap_harian',
            'tgl' => $tgl,
        ];
        return view('laporan/v_template_print', $data);
    }

    public function LaporanBulanan()
    {
        $data = [
            'judul' => 'Laporan',
            'subjudul' => 'Laporan Bulanan',
            'page' => 'laporan/v_laporan_bulanan',
            'web' => $this->ModelAdmin->DetailData(),
        ];
        return view('v_template', $data);
    }

    public function ViewLaporanBulanan()
    {
        $bulan = $this->request->getPost('bulan');
        $tahun = $this->request->getPost('tahun');
        $data = [
            'judul' => 'Laporan Bulanan',
           'databulanan' => $this->ModelLaporan->DataBulanan($bulan, $tahun),
           'web' => $this->ModelAdmin->DetailData(),
           'bulan' => $bulan,
           'tahun' => $tahun,
        ];

        $response = [
            'data' => view('laporan/v_tabel_lap_bulanan', $data)
        ];

        echo json_encode($response);
        //echo dd($this->ModelLaporan->DataHarian($bulan, $tahun));
    }

    public function PrintLaporanBulanan($bulan, $tahun)
    {
        $data = [
            'judul' => 'Laporan Data Bulanan Penjualan',
            'databulanan' => $this->ModelLaporan->DataBulanan($bulan, $tahun),
            'web' => $this->ModelAdmin->DetailData(),
            'page' => 'Laporan/v_print_lap_bulanan',
            'bulan' => $bulan,
            'tahun' => $tahun,
        ];
        return view('laporan/v_template_print', $data);
    }

    public function LaporanTahunan()
    {
        $data = [
            'judul' => 'Laporan',
            'subjudul' => 'Laporan Tahunan',
            'page' => 'laporan/v_laporan_tahunan',
            'web' => $this->ModelAdmin->DetailData(),
        ];
        return view('v_template', $data);
    }

    public function ViewLaporanTahunan()
    {
        $tahun = $this->request->getPost('tahun');
        $data = [
            'judul' => 'Laporan Tahunan',
           'datatahunan' => $this->ModelLaporan->DataTahunan($tahun),
           'web' => $this->ModelAdmin->DetailData(),
           'tahun' => $tahun,
        ];

        $response = [
            'data' => view('laporan/v_tabel_lap_tahunan', $data)
        ];

        echo json_encode($response);
    }

    public function PrintLaporanTahunan($tahun)
    {
        $data = [
            'judul' => 'Laporan Data Tahunan Penjualan',
            'datatahunan' => $this->ModelLaporan->DataTahunan($tahun),
            'web' => $this->ModelAdmin->DetailData(),
            'page' => 'Laporan/v_print_lap_tahunan',
            'tahun' => $tahun,
        ];
        return view('laporan/v_template_print', $data);
    }

}
