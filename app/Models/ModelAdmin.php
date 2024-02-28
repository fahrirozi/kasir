<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAdmin extends Model
{

    public function DetailData()
    {
     return $this->db->table('tbl_setting')->where('id','1')->get()->getRowArray();
    }  


   public function UpdateSetting($data)
   {
      $this->db->table('tbl_setting')
      ->where('id', $data['id'])
      ->update($data);
   }

   public function Grafik()
   {
      return $this->db->table('tbl_rinci')
        ->join('tbl_jual', 'tbl_jual.no_faktur=tbl_rinci.no_faktur')
        ->where('month(tbl_jual.tgl_jual)', date('m'))
        ->where('year(tbl_jual.tgl_jual)', date('Y'))
        ->select('tbl_jual.tgl_jual')
        ->groupBy('tbl_jual.tgl_jual')
        ->selectSum('tbl_rinci.total_harga')
        ->selectSum('tbl_rinci.untung')
        ->get()->getResultArray();
   }

   public function PendapatanHarian()
   {
      return $this->db->table('tbl_rinci')
      ->join('tbl_jual', 'tbl_jual.no_faktur=tbl_rinci.no_faktur')
      ->where('tbl_jual.tgl_jual', date('Y-m-d'))
      ->select('tbl_jual.tgl_jual')
      ->groupBy('tbl_jual.tgl_jual')
      ->selectSum('tbl_rinci.total_harga')
      ->get()->getRowArray();
   }

   public function PendapatanBulanan()
   {
      return $this->db->table('tbl_rinci')
      ->join('tbl_jual', 'tbl_jual.no_faktur=tbl_rinci.no_faktur')
      ->where('month(tbl_jual.tgl_jual)', date('m'))
      ->where('year(tbl_jual.tgl_jual)', date('Y'))
      ->select('tbl_jual.tgl_jual')
      ->groupBy('month(tbl_jual.tgl_jual)')
      ->selectSum('tbl_rinci.total_harga')
      ->get()->getRowArray();
   }

   public function PendapatanTahunan()
   {
      return $this->db->table('tbl_rinci')
      ->join('tbl_jual', 'tbl_jual.no_faktur=tbl_rinci.no_faktur')
      ->where('year(tbl_jual.tgl_jual)', date('Y'))
      ->select('tbl_jual.tgl_jual')
      ->groupBy('year(tbl_jual.tgl_jual)')
      ->selectSum('tbl_rinci.total_harga')
      ->get()->getRowArray();
   }

   public function TotalProduk()
   {
      return $this->db->table('tbl_produk')->countAll();
   }

   public function TotalKategori()
   {
      return $this->db->table('tbl_kategori')->countAll();
   }

   public function TotalSatuan()
   {
      return $this->db->table('tbl_satuan')->countAll();
   }

   public function TotalUser()
   {
      return $this->db->table('tbl_user')->countAll();
   }
}