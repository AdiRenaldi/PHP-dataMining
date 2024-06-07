<?php
class PreprocessingModel extends Database
{
   private $db;
   public function __construct()
   {
      $this->db = new Database();
   }

   public function cekKamusNormalisasi($kolom, $kata){
      $this->db->query("SELECT kata_baku FROM normalisasi WHERE ns$kolom = :kata");
      $this->db->bind('kata', $kata);

      return $this->db->single();
   }

   public function cekStoplist($kata)
   {
      $this->db->query("SELECT * FROM tb_stopword WHERE stopword = :kata");
      $this->db->bind('kata', $kata);

      return $this->db->single();
   }

   public function cekKataDasar($kata){
      $this->db->query("SELECT katadasar FROM tb_katadasar WHERE katadasar = :kata");
      $this->db->bind('kata', $kata);

      return $this->db->single();
   }
}
