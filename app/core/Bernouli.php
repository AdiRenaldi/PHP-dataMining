<?php

class Bernouli extends Controller
{

	/*
    * penentuan kelas prior 
   */

	// NDOC = jumlah keseluran data didalam kelas
  public function ndoc()
   {
      $total = $this->model('NiveBayesModel')->getTotalDataNdoc();
      return (int) $total['dokumen'];
   }

 
   // NC = jumlah dokumen berdasarkan kelas
   public function nc($kelas)
   {
      $jumlah = $this->model('NiveBayesModel')->getTotalDataNc($kelas);
      return (int) $jumlah['dokumen'];
   }

   // menentukan nila class prior
  public function classPrior($kelas)
   {
      $classPrior = $this->nc($kelas) / $this->ndoc();
      return $classPrior;
   }
   /*
    * Akhir penentuan kelas prior 
   */


   /*
   * coditionalProbability
   */

   // Frekuensi kemunculan kata
   public function getkata($data, $kelas)
   {
   	$kata = $this->model('NiveBayesModel')->getKemunculanKata($data, $kelas);
   	return (int) $kata['kata'];
   }

   // public function seluruhKata($data)
   // {
   //    $kata = $this->model('NiveBayesModel')->getSeluruhKata($data);
   //    return (int) $kata['kelas'];
   // }

   // jumlah kata unik
   public function kataUnik()
   {
   	$kata = $this->model('NiveBayesModel')->getKataUnik();
   	return (int) $kata['kata'];
   }

   // MultiNominal //
   /** frekuensi = n/0, if true maka hitung jumlahnya, if false = 0 **/
   /** smoothing = 1 untuk mengindari angka 0 **/

   public function F_bernouli($kata)
   {
      $data = $kata;
      if (isset($data)) {
         $kelas = ['cyberbullying','non_cyberbullying'];
         for ($i=0; $i < count($kelas); $i++) { 
            // $cek = $this->getFrekuensi($data, "$kelas[$i]") !==false;
            if (!$this->getkata($data, "$kelas[$i]")) {
               $frekuensi = 0;
            }else{
               $frekuensi = 1;
            }
            // $smoothing = 1;
            $kondisi1 = $frekuensi + 1;

            $seluruhKata = $this->getkata($data, "$kelas[$i]");
            $kataUnik = $this->kataUnik();
            $kondisi2 = $seluruhKata + $kataUnik;

            $hasil['kata'] = $data;
            $hasil["$kelas[$i]"] = $kondisi1 / $kondisi2;
         }
         return $hasil;
      }
   }

   public function penentuanKelasBernouli($conditionalProbability)
   {
      for ($i=0; $i < 2; $i++) { 
         if ($i == 0) {
            // kalikan semua nilai conditional probability kata (kelas cyberbullying);
            $kondisiCyberbullying = 0;
            foreach ($conditionalProbability as $cp) {
               $kondisiCyberbullying += $cp['bobot_cyberbullying'];
               $bobot['cyberbullying'] = $kondisiCyberbullying;
            }
         }else {
            // kalikan semua nilai conditional probability kata (kelas non cyberbullying);
            $kondisiNonCyberbullying = 0;
            foreach ($conditionalProbability as $cp) {
               $kondisiNonCyberbullying += $cp['bobot_non_cyberbullying'];
               $bobot['non_cyberbullying'] = $kondisiNonCyberbullying;
            }
         }         
      }

      $nilai['cyberbullying'] = $this->classPrior('cyberbullying') + $kondisiCyberbullying;
      $nilai['non_cyberbullying'] = $this->classPrior('non_cyberbullying') + $kondisiNonCyberbullying;      
      $nilai['klasifikasi'] = ($nilai['cyberbullying'] > $nilai['non_cyberbullying']) ? 'cyberbullying' : 'non_cyberbullying';
      return $nilai;
   }

}