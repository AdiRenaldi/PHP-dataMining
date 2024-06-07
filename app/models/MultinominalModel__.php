<?php
class MultinominalModel__ extends Database
{
   private $db;
   public function __construct()
   {
      $this->db = new Database();
   }

   public function cekMultinominal_Stem_Stop($kata)
   {
      $this->db->query("SELECT kata_unik, bobot_cyberbullying, bobot_non_cyberbullying FROM conditional_stem_stop_multinominal WHERE kata_unik = :kata_unik");
      $this->db->bind('kata_unik', $kata);
      return $this->db->single();
   }

   public function cekMultinominal_Stem($kata)
   {
      $this->db->query("SELECT kata_unik, bobot_cyberbullying, bobot_non_cyberbullying FROM conditional_stem_multinominal WHERE kata_unik = :kata_unik");
      $this->db->bind('kata_unik', $kata);
      return $this->db->single();
   }

   public function cekMultinominal_Stop($kata)
   {
      $this->db->query("SELECT kata_unik, bobot_cyberbullying, bobot_non_cyberbullying FROM conditional_stop_multinominal WHERE kata_unik = :kata_unik");
      $this->db->bind('kata_unik', $kata);
      return $this->db->single();
   }

   public function cekMultinominal($kata)
   {
      $this->db->query("SELECT kata_unik, bobot_cyberbullying, bobot_non_cyberbullying FROM conditional_multinominal WHERE kata_unik = :kata_unik");
      $this->db->bind('kata_unik', $kata);
      return $this->db->single();
   }


   public function tambahConditionalMultinominal_Stem_Stop($hasil)
   {
      $query = "INSERT INTO conditional_stem_stop_multinominal(kata_unik,bobot_cyberbullying, bobot_non_cyberbullying)
         VALUES(:kata_unik, :bobot_cyberbullying, :bobot_non_cyberbullying)";
      $this->db->query($query);
      $this->db->bind('kata_unik', $hasil['kata']);
      $this->db->bind('bobot_cyberbullying', $hasil['cyberbullying']);
      $this->db->bind('bobot_non_cyberbullying', $hasil['non_cyberbullying']);

      $this->db->execute();

      return $this->db->rowCount();
   }

   public function tambahConditionalMultinominal_Stem($hasil)
   {
      $query = "INSERT INTO conditional_stem_multinominal(kata_unik,bobot_cyberbullying, bobot_non_cyberbullying)
         VALUES(:kata_unik, :bobot_cyberbullying, :bobot_non_cyberbullying)";
      $this->db->query($query);
      $this->db->bind('kata_unik', $hasil['kata']);
      $this->db->bind('bobot_cyberbullying', $hasil['cyberbullying']);
      $this->db->bind('bobot_non_cyberbullying', $hasil['non_cyberbullying']);

      $this->db->execute();

      return $this->db->rowCount();
   }

   public function tambahConditionalMultinominal_Stop($hasil)
   {
      $query = "INSERT INTO conditional_stop_multinominal(kata_unik,bobot_cyberbullying, bobot_non_cyberbullying)
         VALUES(:kata_unik, :bobot_cyberbullying, :bobot_non_cyberbullying)";
      $this->db->query($query);
      $this->db->bind('kata_unik', $hasil['kata']);
      $this->db->bind('bobot_cyberbullying', $hasil['cyberbullying']);
      $this->db->bind('bobot_non_cyberbullying', $hasil['non_cyberbullying']);

      $this->db->execute();

      return $this->db->rowCount();
   }

   public function tambahConditionalMultinominal($hasil)
   {
      $query = "INSERT INTO conditional_multinominal(kata_unik,bobot_cyberbullying, bobot_non_cyberbullying)
         VALUES(:kata_unik, :bobot_cyberbullying, :bobot_non_cyberbullying)";
      $this->db->query($query);
      $this->db->bind('kata_unik', $hasil['kata']);
      $this->db->bind('bobot_cyberbullying', $hasil['cyberbullying']);
      $this->db->bind('bobot_non_cyberbullying', $hasil['non_cyberbullying']);

      $this->db->execute();

      return $this->db->rowCount();
   }

   public function tDtTestingStemStop($kata,$penentuanKelas)
   {
      $query = "INSERT INTO dt_testing_stem_stop_multinominal(komentar, jenis_komentar, bobot_cyberbullying, bobot_non_cyberbullying)
         VALUES(:komentar, :jenis_komentar, :bobot_cyberbullying, :bobot_non_cyberbullying)";
     $this->db->query($query);
      $this->db->bind('komentar', $kata);
      $this->db->bind('jenis_komentar', $penentuanKelas['klasifikasi']);
      $this->db->bind('bobot_cyberbullying', $penentuanKelas['cyberbullying']);
      $this->db->bind('bobot_non_cyberbullying', $penentuanKelas['non_cyberbullying']);

      $this->db->execute();

      return $this->db->rowCount();
   }

   public function tDtTestingStem($kata,$penentuanKelas)
   {
      $query = "INSERT INTO dt_testing_stem_multinominal(komentar, jenis_komentar, bobot_cyberbullying, bobot_non_cyberbullying)
         VALUES(:komentar, :jenis_komentar, :bobot_cyberbullying, :bobot_non_cyberbullying)";
     $this->db->query($query);
      $this->db->bind('komentar', $kata);
      $this->db->bind('jenis_komentar', $penentuanKelas['klasifikasi']);
      $this->db->bind('bobot_cyberbullying', $penentuanKelas['cyberbullying']);
      $this->db->bind('bobot_non_cyberbullying', $penentuanKelas['non_cyberbullying']);

      $this->db->execute();

      return $this->db->rowCount();
   }

   public function tDtTestingStop($kata,$penentuanKelas)
   {
      $query = "INSERT INTO dt_testing_stop_multinominal(komentar, jenis_komentar, bobot_cyberbullying, bobot_non_cyberbullying)
         VALUES(:komentar, :jenis_komentar, :bobot_cyberbullying, :bobot_non_cyberbullying)";
     $this->db->query($query);
      $this->db->bind('komentar', $kata);
      $this->db->bind('jenis_komentar', $penentuanKelas['klasifikasi']);
      $this->db->bind('bobot_cyberbullying', $penentuanKelas['cyberbullying']);
      $this->db->bind('bobot_non_cyberbullying', $penentuanKelas['non_cyberbullying']);

      $this->db->execute();

      return $this->db->rowCount();
   }

   public function tDtTesting($kata,$penentuanKelas)
   {
      $query = "INSERT INTO dt_testing_multinominal(komentar, jenis_komentar, bobot_cyberbullying, bobot_non_cyberbullying)
         VALUES(:komentar, :jenis_komentar, :bobot_cyberbullying, :bobot_non_cyberbullying)";
     $this->db->query($query);
      $this->db->bind('komentar', $kata);
      $this->db->bind('jenis_komentar', $penentuanKelas['klasifikasi']);
      $this->db->bind('bobot_cyberbullying', $penentuanKelas['cyberbullying']);
      $this->db->bind('bobot_non_cyberbullying', $penentuanKelas['non_cyberbullying']);

      $this->db->execute();

      return $this->db->rowCount();
   }

   public function tDtKomStemStop($komentar,$kelas)
   {
      $query = "INSERT INTO kom_testing_stem_stop_multinominal(komentar, jenis_komentar)
         VALUES(:komentar, :jenis_komentar)";
     $this->db->query($query);
      $this->db->bind('komentar', $komentar);
      $this->db->bind('jenis_komentar', $kelas);

      $this->db->execute();

      return $this->db->rowCount();
   }

   public function tDtKomStem($komentar,$kelas)
   {
      $query = "INSERT INTO kom_testing_stem_multinominal(komentar, jenis_komentar)
         VALUES(:komentar, :jenis_komentar)";
     $this->db->query($query);
      $this->db->bind('komentar', $komentar);
      $this->db->bind('jenis_komentar', $kelas);

      $this->db->execute();

      return $this->db->rowCount();
   }

   public function tDtKomStop($komentar,$kelas)
   {
      $query = "INSERT INTO kom_testing_stop_multinominal(komentar, jenis_komentar)
         VALUES(:komentar, :jenis_komentar)";
     $this->db->query($query);
      $this->db->bind('komentar', $komentar);
      $this->db->bind('jenis_komentar', $kelas);

      $this->db->execute();

      return $this->db->rowCount();
   }

   public function tDtKom($komentar,$kelas)
   {
      $query = "INSERT INTO kom_testing_multinominal(komentar, jenis_komentar)
         VALUES(:komentar, :jenis_komentar)";
     $this->db->query($query);
      $this->db->bind('komentar', $komentar);
      $this->db->bind('jenis_komentar', $kelas);

      $this->db->execute();

      return $this->db->rowCount();
   }



























   public function getProbabilitasMultinominal($kata)
   {
      $this->db->query("SELECT kata_unik, bobot_cyberbullying, bobot_non_cyberbullying FROM conditionalprobability_multinominal WHERE kata_unik = :kata");
      $this->db->bind('kata', $kata);
      return $this->db->single();
   }
   
   public function komentar_user($komentar, $kelas)
   {
      $this->db->query("INSERT INTO komentar_user (komentar, jenis_komentar) VALUE(:komentar, :jenis_komentar)");
      $this->db->bind('komentar', $komentar);
      $this->db->bind('komentar', $kelas);
      $this->db->execute();

      return $this->db->rowCount();
   }

   public function tambahDataTesting($kata, $kelas)
   {
      $this->db->query("INSERT INTO data_testing_multinominal (komentar, jenis_komentar) VALUE(:komentar, :jenis_komentar)");
      $this->db->bind('komentar', $kata);
      $this->db->bind('jenis_komentar', $kelas);
      $this->db->execute();

      return $this->db->rowCount();
   }

   public function tambahKomentarTesting($komentar, $kelas)
   {
      $this->db->query("INSERT INTO komentar_testing_multinominal (komentar, jenis_komentar) VALUE(:komentar, :jenis_komentar)");
      $this->db->bind('komentar', $komentar);
      $this->db->bind('jenis_komentar', $kelas);
      $this->db->execute();

      return $this->db->rowCount();
   }




   public function tambahDataTestingBernouli($kata, $kelas)
   {
      $this->db->query("INSERT INTO data_testing_bernouli (komentar, jenis_komentar) VALUE(:komentar, :jenis_komentar)");
      $this->db->bind('komentar', $kata);
      $this->db->bind('jenis_komentar', $kelas);
      $this->db->execute();

      return $this->db->rowCount();
   }

   public function tambahKomentarTestingBernouli($komentar, $kelas)
   {
      $this->db->query("INSERT INTO komentar_testing_bernouli (komentar, jenis_komentar) VALUE(:komentar, :jenis_komentar)");
      $this->db->bind('komentar', $komentar);
      $this->db->bind('jenis_komentar', $kelas);
      $this->db->execute();

      return $this->db->rowCount();
   }

}