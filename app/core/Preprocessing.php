<?php

class Preprocessing extends Controller
{
   public function data($data, $i)
   {
      if ($i == 0){
         $data = $this->caseFolding($data);
         $data = $this->tokenizing($data);
         $data = $this->hapusKataGanda($data);
         $data = $this->normalisasi($data);
         $data = $this->stopword($data);
         $data = $this->stemming($data);
      } else if ($i == 1) {
         $data = $this->caseFolding($data);
         $data = $this->tokenizing($data);
         $data = $this->hapusKataGanda($data);
         $data = $this->normalisasi($data);
         $data = $this->stemming($data);
      } else if ($i == 2) {
         $data = $this->caseFolding($data);
         $data = $this->tokenizing($data);
         $data = $this->hapusKataGanda($data);
         $data = $this->normalisasi($data);
         $data = $this->stopword($data);
      } else if ($i == 3) {
         $data = $this->caseFolding($data);
         $data = $this->tokenizing($data);
         $data = $this->hapusKataGanda($data);
         $data = $this->normalisasi($data);
      }
      return $data;
   }
   //1. caseFolding
   public function caseFolding($data)
   {
      return strtolower($data);
   }

   // Tokenizing
   public function tokenizing($data)
   {
      // a. menghilangkan tanda baca (punctuation) dan simbol selain alphabet
      // b. proses tokezing
      $data = explode(" ", preg_replace("/[^a-zA-Z]/", " ", $data));
      $words = [];
      // c hapus karakter kosong
      for ($i = 0; $i < count($data); $i++) {
         if ($data[$i] != '') {
            $words[] = $data[$i];
         }
      }
      return $words;
   }

   // 3. Normalisasi
   function normalisasi($kata)
   {
      for ($i = 0; $i < count($kata); $i++) {
         for ($x = 1; $x < 9; $x++) {
            $hasil = $this->model('PreprocessingModel')->cekKamusNormalisasi($x, $kata[$i]);
            if ($hasil == true) {
               $kata[$i] = $hasil['kata_baku'];
            }
         }
      }
      return $kata;
   }

   // 4. hapus kata ganda
   public function hapusKataGanda($kata)
   {
      $key = "--";
      for ($index = 0; $index < count($kata); $index++) {
         $alphabet = str_split($kata[$index]);
         for ($i = 0; $i < count($alphabet); $i++) {
            // i = huruf pertama, n1 = huruf ke-2, n2 = huruf ke-3
            $n1 = $i + 1;
            $n2 = $i + 2;
            if ($n2 < count($alphabet)) {
               if ($alphabet[$i] == $alphabet[$n1] && $alphabet[$i] == $alphabet[$n2]) {
                  /**
                   * jika huruf ke 1, ke-2, dan ke-3
                   * jadikan huruf ke satu sebagai key dan hapus huruf ke-2 dan ke-3
                   * exp [s,e,e,e,m,a,a,a,n,g,a,t] => []
                   */
                  $key = $alphabet[$i];
                  $alphabet[$n1] = "";
                  $alphabet[$n2] = "";
                  /**
                   * 
                   */
                  for ($x = $n2; $x < (count($alphabet) - 1); $x++) {
                     $n3 = $x + 1;
                     if ($key == $alphabet[$n3]) {
                        $alphabet[$n3] = "";
                     } else if ($key != $alphabet[$n3]) {
                        break;
                     }
                  }
               }
            }
         }
         $data = implode("", $alphabet);
         if (substr($data, 0, 1) == substr($data, 1, 1) and substr($data, -2, 1) == substr($data, -1, 1)) {
            $kata[$index] = substr($data, 1, -1);
         } else if (substr($data, 0, 1) == substr($data, 1, 1) and substr($data, -2, 1) != substr($data, -1, 1)) {
            $kata[$index] = substr($data, 1);
         } else if (substr($data, -2, 1) == substr($data, -1, 1) and substr($data, 0, 1) != substr($data, 1, 1)) {
            $kata[$index] = substr($data, 0, -1);
         } else {
            $kata[$index] = $data;
         }
      }
      return $kata;
   }

   // 5. Stopword
   public function stopword($kata)
   {
      $stopword = [];
      for ($i = 0; $i < count($kata); $i++) {
         if ($this->model('PreprocessingModel')->cekStoplist($kata[$i]) === false) {
            $stopword[] = $kata[$i];
         }
      }
      return $stopword;
   }

   function stemming($data)
   {
      for ($i = 0; $i < count($data); $i++) {
         $word = $data[$i];
         // ===================== langkah 1 ============================== 
         // 1. => mencari kata didalam kamus stemming jika ada kata dasar algoritma berhenti
         if ($this->model('PreprocessingModel')->cekKataDasar($word)) {
            $data[$i] = $word;
         } else {
            // ===================== langkah 2 ============================== 
            //  2. => menghapus Inflection Suffixes 
            $kataDasar = false;
            $suffix = new InflectionalSuffixes();
            if ($suffix->cekInflectionalSuffixes($word) == true) {
               /* 2.menghapus Inflection Suffixes  => particle('lah', 'kah', 'tah', 'pun') 
            * => hapus Possesive Pronoun(nya, mu, ku) jika ada*/
               $word = $suffix->deleteInflectionalSuffixes($word);

               // cek kata didalam kamus kata dasar              
               if ($this->model('PreprocessingModel')->cekKataDasar($word) == true) {
                  $kataDasar = true;
                  $data[$i] = $word;
               }
            }
            // ===================== langkah 3 ============================== 
            if ($kataDasar == false) {
               // 3. => hapus Derivational Suffix (“-i” atau ”-an” )
               $hasil = $suffix->deleteDerivationalSuffix($word);
               $word = $hasil['word'];
               $akhiranTerhapus = $hasil['derivationalSuffix'];
               // cek kata didalam kamus kata dasar    
               if ($this->model('PreprocessingModel')->cekKataDasar($word) == true) {
                  $data[$i] = $word;
               } else {
                  /** Jika akhiran “-an” telah dihapus dan huruf terakhir dari kata tersebut adalah “-k”,
                   * maka “-k” juga dihapus. Jika kata tersebut ditemukan dalam kamus maka algoritma
                   * berhenti. Jika tidak ditemukan maka lakukan langkah 3b. */
                  if ($akhiranTerhapus == 'an' and substr($word, -1) == 'k') {
                     $word = substr($word, 0, -1);
                     // cek kata didalam kamus kata dasar    
                     if ($this->model('PreprocessingModel')->cekKataDasar($word) == true) {
                        $data[$i] = $word;
                     }
                  } else {
                     // $word .= $akhiranTerhapus;
                     // ======== LANGKAH 4 ============
                     // awalan yg akan di hapus

                     $derivationalPrefix  = ['be', 'di', 'ke', 'meng', 'me', 'pe', 'se', 'te'];
                     // awalan dan akhiran yg tidak di ijinkan
                     $tabelTerlarang = [
                        ["awalan" => 'be', "akhiran" => 'i'],
                        ["awalan" => 'di', "akhiran" => 'an'],
                        ["awalan" => 'ke', "akhiran" => 'kan'],
                        ["awalan" => 'ke', "akhiran" => 'i'],
                        ["awalan" => 'me', "akhiran" => 'an'],
                        ["awalan" => 'se', "akhiran" => 'i'],
                        ["awalan" => 'se', "akhiran" => 'kan'],
                     ];
                     /* 4.  Hapus Derivational Prefix (“be-”,”di-”,”ke-”,”me-”,”pe-“,”se-” dan “te-“). Jika kata
                              yang didapat ditemukan didalam database kata dasar, maka proses dihentikan, jika
                              tidak, maka lakukan recoding.*/
                     $awalanDihilangkan = '';
                     $imbuhanTerlarang = false;
                     $recoding = false;
                     for ($k = 0; $k < count($derivationalPrefix); $k++) {
                        $jumlahHapus = [];
                        // 4a. looping berhenti jika 
                        /*
                        *
                        *c. Tiga awalan telah dihilangkan
                        **/
                        // a. Terdapat kombinasi awalan dan akhiran yang tidak diijinkan
                        foreach ($tabelTerlarang as $terlarang) {
                           $lenght = count(str_split($terlarang['akhiran']));
                           $lenght = "-" . $lenght;
                           $lenght = intval($lenght);
                           if (substr($word, 0, 2) == $terlarang['awalan'] and substr($word, $lenght) == $terlarang['akhiran']) {
                              $imbuhanTerlarang = true;
                           }
                        }

                        // b. Awalan yang dideteksi sama dengan awalan yang dihilangkan sebelumnya.
                        if ($awalanDihilangkan == substr($word, 0, count(str_split($awalanDihilangkan)))) {
                           $imbuhanTerlarang = true;
                        }

                        // Tiga awalan telah dihilangkan
                        if (count($jumlahHapus) == 3) {
                           $imbuhanTerlarang = true;
                        }

                        // 4.  Hapus Derivational Prefix (“be-”,”di-”,”ke-”,"meng", "men", ”me-”,”pe-“,”se-” dan “te-“).
                        if (substr($word, 0, count(str_split($derivationalPrefix[$k]))) == $derivationalPrefix[$k] and $imbuhanTerlarang == false) {
                           $awalanDihilangkan = substr($word, 0, count(str_split($derivationalPrefix[$k])));
                           $jumlahHapus[] = "";
                           $word = substr($word, count(str_split($derivationalPrefix[$k])));
                           if ($this->model('PreprocessingModel')->cekKataDasar($word) == true) {
                              $data[$i] = $word;
                              $recoding = false;
                           } else {
                              $recoding = true;
                           }
                        }

                        // menghentikan perulangan 
                        if ($imbuhanTerlarang == true) {
                           $recoding = true;
                           break;
                        }
                     }
                     // ============= 5. Recording ===============
                     if ($recoding == true) {

                        $word = $awalanDihilangkan .= $word;
                        $recoding = new Recoding();
                        $keyword = $recoding->recodingKata($word);
                        if ($this->model('PreprocessingModel')->cekKataDasar($keyword) == true) {
                           $data[$i] = $keyword;
                        } else {
                           $keyword .= $akhiranTerhapus;
                           if ($this->model('PreprocessingModel')->cekKataDasar($keyword) == true) {
                              $data[$i] = $keyword;
                           } else {
                              $data[$i] = $word .= $akhiranTerhapus;
                           }
                        }
                     }
                  }
               }
            }
         }
      }
      return $data;
   }
}
