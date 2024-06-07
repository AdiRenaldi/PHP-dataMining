<?php
class NiveBayesModel extends Database
{
   private $db;
   public function __construct()
   {
      $this->db = new Database();
   }

   // mengisi data komentar
   public function tambahKomentar($data, $kelas)
   {
      $query = "INSERT INTO komentar_training(komentar, jenis_komentar)
         VALUES(:komentar, :jenis_komentar)";
      $this->db->query($query);
      $this->db->bind('komentar', $data);
      $this->db->bind('jenis_komentar', $kelas);

      $this->db->execute();

      return $this->db->rowCount();
   }

   // menambah data training
   public function tambahDataTraining($kata, $kelas)
   {
      $query = "INSERT INTO data_training(dokumen, kelas)
         VALUES(:dokumen, :kelas)";
      $this->db->query($query);
      $this->db->bind('dokumen', $kata);
      $this->db->bind('kelas', $kelas);

      $this->db->execute();

      return $this->db->rowCount();
   }

   // mengambil data training di database
   public function getDataTraining()
   {
      $this->db->query('SELECT id_training, kelas FROM data_training ORDER BY id_training DESC LIMIT 1');
      return $this->db->single();
   }

   // menghitung total data di tabel training (ndoc)
   public function getTotalDataNdoc()
   {
      $this->db->query('SELECT count(dokumen) as dokumen FROM data_training');
      return $this->db->single();
   }

   // menghitung total data di tabel training (Nc)
   public function getTotalDataNc($kelas)
   {
      $this->db->query('SELECT count(dokumen) as dokumen FROM data_training WHERE kelas = :kelas');
      $this->db->bind('kelas', $kelas);
      return $this->db->single();
   }

   // menambah kemunculan kata pada database
   public function tambahKemunculanKata($id, $kata, $kelas)
   {
      $query = "INSERT INTO kemunculan_kata(id_training, kata, kelas)
         VALUES(:id_training, :kata, :kelas)";
      $this->db->query($query);
      $this->db->bind('id_training', $id);
      $this->db->bind('kata', $kata);
      $this->db->bind('kelas', $kelas);

      $this->db->execute();

      return $this->db->rowCount();
   }

   // get data jumlah seluruh data berdasarkan kelas
   public function getSeluruhKata($kelas)
   {
      $this->db->query("SELECT count(kelas) as kelas FROM kemunculan_kata WHERE kata = :kelas");
      $this->db->bind('kata', $kelas);
      return $this->db->single();
   }

   // get jumlah kemunculan kata berdasrkan kata dan kelas
   public function getKemunculanKata($kata, $kelas)
   {
      $this->db->query("SELECT count(kata) as kata FROM kemunculan_kata WHERE kata = :kata AND kelas = :kelas");
      $this->db->bind('kata', $kata);
      $this->db->bind('kelas', $kelas);
      return $this->db->single();
   }

   // get kata unik
   public function getKataUnik()
   {
      $this->db->query("SELECT DISTINCT count(kata) as kata FROM kemunculan_kata");
      return $this->db->single();
   }

   // multinominal
   // public function tambahConditionalMultinominal($hasil)
   // {
   //    $query = "INSERT INTO conditionalprobability_multinominal(kata_unik,bobot_cyberbullying, bobot_non_cyberbullying)
   //       VALUES(:kata_unik, :bobot_cyberbullying, :bobot_non_cyberbullying)";
   //    $this->db->query($query);
   //    $this->db->bind('kata_unik', $hasil['kata']);
   //    $this->db->bind('bobot_cyberbullying', $hasil['cyberbullying']);
   //    $this->db->bind('bobot_non_cyberbullying', $hasil['non_cyberbullying']);

   //    $this->db->execute();

   //    return $this->db->rowCount();
   // }

   // public function cekMultinominal($kata)
   // {
   //    $this->db->query("SELECT kata_unik, bobot_cyberbullying, bobot_non_cyberbullying FROM conditionalprobability_multinominal WHERE kata_unik = :kata_unik");
   //    $this->db->bind('kata_unik', $kata);
   //    return $this->db->single();
   // }

   // tambah data perbandigan
   // public function tambahPerbandinganMultinominal($kata, $hasil)
   // {
   //    $query = "INSERT INTO data_perbandingan_multinominal(dokumen, kelas, bobot_cyberbullying, bobot_non_cyberbullying)
   //       VALUES(:dokumen, :kelas, :bobot_cyberbullying, :bobot_non_cyberbullying)";
   //   $this->db->query($query);
   //    $this->db->bind('dokumen', $kata);
   //    $this->db->bind('kelas', $hasil['klasifikasi']['klasifikasi']);
   //    $this->db->bind('bobot_cyberbullying', $hasil['klasifikasi']['cyberbullying']);
   //    $this->db->bind('bobot_non_cyberbullying', $hasil['klasifikasi']['non_cyberbullying']);

   //    $this->db->execute();

   //    return $this->db->rowCount();
   // }
   // // Akhir Multinominal


   // // Bernouli
   // public function tambahConditionalBernouli($hasil)
   // {
   //    $query = "INSERT INTO conditionalprobability_bernouli(kata_unik,bobot_cyberbullying, bobot_non_cyberbullying)
   //       VALUES(:kata_unik, :bobot_cyberbullying, :bobot_non_cyberbullying)";
   //    $this->db->query($query);
   //    $this->db->bind('kata_unik', $hasil['kata']);
   //    $this->db->bind('bobot_cyberbullying', $hasil['cyberbullying']);
   //    $this->db->bind('bobot_non_cyberbullying', $hasil['non_cyberbullying']);

   //    $this->db->execute();

   //    return $this->db->rowCount();
   // }

   // public function cekBernouli($kata)
   // {
   //    $this->db->query("SELECT kata_unik, bobot_cyberbullying, bobot_non_cyberbullying FROM conditionalprobability_bernouli WHERE kata_unik = :kata_unik");
   //    $this->db->bind('kata_unik', $kata);
   //    return $this->db->single();
   // }

   // // tambah data perbandigan
   // public function tambahPerbandinganBernouli($kata, $hasil)
   // {
   //    $query = "INSERT INTO data_perbandingan_bernouli(dokumen, kelas, bobot_cyberbullying, bobot_non_cyberbullying)
   //       VALUES(:dokumen, :kelas, :bobot_cyberbullying, :bobot_non_cyberbullying)";
   //    $this->db->query($query);
   //    $this->db->bind('dokumen', $kata);
   //    $this->db->bind('kelas', $hasil['klasifikasi']['klasifikasi']);
   //    $this->db->bind('bobot_cyberbullying', $hasil['klasifikasi']['cyberbullying']);
   //    $this->db->bind('bobot_non_cyberbullying', $hasil['klasifikasi']['non_cyberbullying']);

   //    $this->db->execute();

   //    return $this->db->rowCount();
   // }
   // // Akhir Bernouli

}