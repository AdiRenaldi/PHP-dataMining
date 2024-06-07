<?php

class Recoding extends Controller
{
   public function recodingKata($kata)
   {
      if ($this->aturan1($kata) == true) {
         return $this->formatKata1($kata);
      } elseif ($this->aturan2($kata) == true) {
         return $this->formatKata2($kata);
      } elseif ($this->aturan3($kata) == true) {
         return $this->formatKata3($kata);
      } elseif ($this->aturan4($kata)) {
         return $this->formatKata4($kata);
      } elseif ($this->aturan5($kata) == true) {
         return $this->formatKata5($kata);
      } elseif ($this->aturan6($kata) == true) {
         return $this->formatKata6($kata);
      } elseif ($this->aturan7($kata) == true) {
         return $this->formatKata7($kata);
      } elseif ($this->aturan8($kata) == true) {
         return $this->formatKata8($kata);
      } elseif ($this->aturan9($kata) == true) {
         return $this->formatKata9($kata);
      } elseif ($this->aturan10($kata) == true) {
         return $this->formatKata10($kata);
      } elseif ($this->aturan11($kata) == true) {
         return $this->formatKata11($kata);
      } elseif ($this->aturan12($kata) == true) {
         return $this->formatKata12($kata);
      } elseif ($this->aturan13($kata) == true) {
         return $this->formatKata13($kata);
      } elseif ($this->aturan14($kata) == true) {
         return $this->formatKata14($kata);
      } elseif ($this->aturan15($kata) == true) {
         return $this->formatKata15($kata);
      } elseif ($this->aturan16($kata) == true) {
         return $this->formatKata16($kata);
      } elseif ($this->aturan17($kata) == true) {
         return $this->formatKata17($kata);
      } elseif ($this->aturan18($kata) == true) {
         return $this->formatKata18($kata);
      } elseif ($this->aturan19($kata) == true) {
         return $this->formatKata19($kata);
      } elseif ($this->aturan20($kata) == true) {
         return $this->formatKata20($kata);
      } elseif ($this->aturan21($kata) == true) {
         return $this->formatKata21($kata);
      } elseif ($this->aturan22($kata) == true) {
         return $this->formatKata22($kata);
      } elseif ($this->aturan23($kata) == true) {
         return $this->formatKata23($kata);
      } elseif ($this->aturan24($kata) == true) {
         return $this->formatKata24($kata);
      } elseif ($this->aturan25($kata) == true) {
         return $this->formatKata25($kata);
      } elseif ($this->aturan26($kata) == true) {
         return $this->formatKata26($kata);
      } elseif ($this->aturan27($kata) == true) {
         return $this->formatKata27($kata);
      } elseif ($this->aturan28($kata) == true) {
         return $this->formatKata28($kata);
      } elseif ($this->aturan29($kata) == true) {
         return $this->formatKata29($kata);
      } elseif ($this->aturan30($kata) == true) {
         return $this->formatKata30($kata);
      } elseif ($this->aturan31($kata) == true) {
         return $this->formatKata31($kata);
      } elseif ($this->aturan32($kata) == true) {
         return $this->formatKata32($kata);
      } elseif ($this->aturan33($kata) == true) {
         return $this->formatKata33($kata);
      } else {
         return $kata;
      }
   }

   // ------------------------------------ Aturan Recoding


   // ============================ ATURAN KATA ============
   // berV
   public function aturan1($word = '')
   {
      if (substr($word, 0, 3) == 'ber' and preg_match('/^[aiueo]/', substr($word, 3, 1))) { // berCAP
         return true;
      } else {
         return false;
      }
   }

   // berCAP
   function aturan2($word = '')
   {
      if (substr($word, 0, 3) == 'ber' and substr($word, 3, 1) != 'c' and preg_match('/^[aiueo]/', substr($word, 3, 1)) == 0 and  substr($word, 5, 2) != 'er') { // berCAP
         return true;
      } else {
         return false;
      }
   }

   // 3. berCAerV... => c != r
   function aturan3($word = '')
   {
      if (substr($word, 0, 3) == 'ber' and preg_match('/^[aiueo]/', substr($word, 3, 1)) == 0 and substr($word, 3, 1) != 'r' and substr($word, 5, 2) == 'er'  and preg_match('/^[aiueo]/', substr($word, 7, 1)) == 1) {
         return true;
      } else {
         return false;
      }
   }

   // belajar
   function aturan4($word = '')
   {
      if ($word == 'belajar') {
         return true;
      } else {
         return false;
      }
   }

   // beC1erC2... => C1 != {r|l}
   function aturan5($word = '')
   {
      if (substr($word, 0, 2) == 'be' and preg_match('/^[aiueo]/', substr($word, 2, 1)) == 0) {
         if (substr($word, 2, 1) != 'r' and substr($word, 2, 1) != 'l' and substr($word, 3, 2) == 'er') {
            if (preg_match('/^[aiueo]/', substr($word, 5, 1)) == 1) {
               return true;
            } else {
               return false;
            }
         } else {
            return false;
         }
      } else {
         return false;
      }
   }

   // terV...
   function aturan6($word = '')
   {
      if (substr($word, 0, 3) == 'ter' and  preg_match('/^[aiueo]/', substr($word, 3, 1))) {
         return true;
      } else {
         return false;
      }
   }

   // terCerV.. => C != r
   function aturan7($word = '')
   {
      if (substr($word, 0, 3) == 'ter' and preg_match('/^[aiueo]/', substr($word, 3, 1)) == 0 and substr($word, 3, 1) != 'r') {
         if (substr($word, 4, 2) == 'er' and preg_match('/^[aioue]/', substr($word, 6, 1))) {
            return true;
         } else {
            return false;
         }
      } else {
         return false;
      }
   }

   // terCP
   function aturan8($word = '')
   {
      if (substr($word, 0, 3) == 'ter' and preg_match('/^[aiueo]/', substr($word, 3, 1)) == 0 and substr($word, 4, 2) != 'er') {
         return true;
      } else {
         return false;
      }
   }

   // teC1erC2 => c1 != r
   function aturan9($word = '')
   {
      if (substr($word, 0, 2) == 'te' and preg_match('/^[aiueo]/', substr($word, 2, 1)) == 0) {
         if (substr($word, 2, 1) != 'r' and substr($word, 3, 2) == 'er' and preg_match('/^[aiueo]/', substr($word, 5, 1)) == 0) {
            return true;
         } else {
            return false;
         }
      } else {
         return false;
      }
   }

   // me{l|w|r|y}V...
   function aturan10($word)
   {
      if (substr($word, 0, 2) == 'me' and preg_match('/^[lwry]/', substr($word, 2, 1)) and preg_match('/^[aiueo]/', substr($word, 3, 1))) {
         return true;
      } else {
         return false;
      }
   }

   // mem{b|f|v}
   function aturan11($word)
   {
      if (substr($word, 0, 3) == 'mem' and preg_match('/^[bfv]/', substr($word, 3, 1))) {
         return true;
      } else {
         return false;
      }
   }

   // mempe{r|l}...
   function aturan12($word)
   {
      if (substr($word, 0, 5) == 'mempe' and preg_match('/^[rl]/', substr($word, 5, 1))) {
         return true;
      } else {
         return false;
      }
   }

   // mem{rV|V}...
   function aturan13($word)
   {
      if (substr($word, 0, 3) == 'mem' and substr($word, 3, 1) == 'r' and preg_match('/^[aiueo]/', substr($word, 4, 1))) {
         return true;
      } else if (substr($word, 0, 3) == 'mem' and preg_match('/^[aiueo]/', substr($word, 3, 1))) {
         return true;
      } else {
         return false;
      }
   }

   // mem{c|d|j|z}
   function aturan14($word)
   {
      if (substr($word, 0, 3) == 'men' and preg_match('/^[cdjz]/', substr($word, 3, 1))) {
         return true;
      } else {
         return false;
      }
   }

   // men-V
   function aturan15($word)
   {
      if (substr($word, 0, 3) == 'men' and preg_match('/^[aiueo]/', substr($word, 3, 1))) {
         return true;
      } else {
         return false;
      }
   }

   // meng{g|h|q}..
   function aturan16($word)
   {
      if (substr($word, 0, 4) == 'meng' and preg_match('/^[ghq]/', substr($word, 4, 1))) {
         return true;
      } else {
         return false;
      }
   }

   // mengV...
   function aturan17($word)
   {
      if (substr($word, 0, 4) == 'meng' and preg_match('/^[aiueo]/', substr($word, 4, 1))) {
         return true;
      } else {
         return false;
      }
   }

   // meny-V
   function aturan18($word)
   {
      if (substr($word, 0, 4) == 'meny' and preg_match('/^[aiueo]/', substr($word, 4, 1))) {
         return true;
      } else {
         return false;
      }
   }

   // mempV... => V != e
   function aturan19($word)
   {
      if (substr($word, 0, 4) == 'memp' and preg_match('/^[aiuo]/', substr($word, 4, 1))) {
         return true;
      } else {
         return false;
      }
   }

   // pe{w|y}V ...
   function aturan20($word)
   {
      if (substr($word, 0, 2) == 'pe' and preg_match('/^[wy]/', substr($word, 2, 1)) and preg_match('/^[aiueo]/', substr($word, 3, 1))) {
         return true;
      } else {
         return false;
      }
   }

   // perV
   function aturan21($word)
   {
      if (substr($word, 0, 3) == 'per' and preg_match('/^[aiuoe]/', substr($word, 3, 1))) {
         return true;
      } else {
         return false;
      }
   }

   // perCAP => C!= r and P != er
   function aturan22($word)
   {
      if (substr($word, 0, 3) == 'per' and preg_match('/^[raiuoe]/', substr($word, 3, 1)) == 0 and substr($word, 5, 2) != 'er') {
         return true;
      } else {
         return false;
      }
   }

   // perCAerV => C!= r 
   function aturan23($word)
   {
      if (substr($word, 0, 3) == 'per' and preg_match('/^[raiuoe]/', substr($word, 3, 1)) == 0 and substr($word, 5, 2) == 'er' and preg_match('/^[aiuoe]/', substr($word, 7, 1))) {
         return true;
      } else {
         return false;
      }
   }

   // pem{b|f|V}
   function aturan24($word)
   {
      if (substr($word, 0, 3) == 'pem' and preg_match('/^[bfaiueo]/', substr($word, 3, 1))) {
         return true;
      } else {
         return false;
      }
   }

   // pem{rV|V}...
   function aturan25($word)
   {
      // pem-rV
      if (substr($word, 0, 3) == 'pem' and substr($word, 3, 1) == 'r' and preg_match('/^[aioeu]/', substr($word, 4, 1))) {
         return true;
      } elseif (substr($word, 0, 3) == 'pem' and preg_match('/^[aioeu]/', substr($word, 3, 1))) { // pemV...
         return true;
      } else {
         return false;
      }
   }

   // pen{c|d|j|z}..
   function aturan26($word)
   {
      if (substr($word, 0, 3) == 'pen' and preg_match('/^[cdjz]/', substr($word, 3, 1))) {
         return true;
      } else {
         return false;
      }
   }

   // penV
   function aturan27($word)
   {
      if (substr($word, 0, 3) == 'pen' and preg_match('/^[aiueo]/', substr($word, 3, 1))) {
         return true;
      } else {
         return false;
      }
   }

   // peng{g|h|q}...
   function aturan28($word)
   {
      if (substr($word, 0, 4) == 'peng' and preg_match('/^[ghq]/', substr($word, 4, 1))) {
         return true;
      } else {
         return false;
      }
   }

   // pengV...
   function aturan29($word)
   {
      if (substr($word, 0, 4) == 'peng' and preg_match('/^[aiueo]/', substr($word, 4, 1))) {
         return true;
      } else {
         return false;
      }
   }

   // penyV...
   function aturan30($word)
   {
      if (substr($word, 0, 4) == 'peny' and preg_match('/^[aiueo]/', substr($word, 4, 1))) {
         return true;
      } else {
         return false;
      }
   }

   // pelV...
   function aturan31($word)
   {
      if (substr($word, 0, 3) == 'pel' and preg_match('/^[aiueo]/', substr($word, 3, 1))) {
         return true;
      } else {
         return false;
      }
   }

   // peCerV... => C != {r|w|y|l|m|n}
   function aturan32($word)
   {
      if (substr($word, 0, 2) == 'pe' and preg_match('/^[rwylmnaiueo]/', substr($word, 2, 1)) == 0 and substr($word, 3, 2) == 'er' and preg_match('/^[aiueo]/', substr($word, 5, 1))) {
         return true;
      } else {
         return false;
      }
   }

   // peCP... => C != {r|w|y|l|m|n} and P != er
   function aturan33($word)
   {
      if (substr($word, 0, 2) == 'pe' and preg_match('/^[rwylmnaiueo]/', substr($word, 2, 1)) == 0 and substr($word, 3, 2) != 'er') {
         return true;
      } else {
         return false;
      }
   }


// =========================== FORMAT KATA ========================
// ber-V... or be-rV...
function formatKata1($kata)
{
   // ber-V pemenggalan kata
   $format1 = substr($kata, 3);
   // be-rV pemenggalan kata
   $format2 = substr($kata, 2);

   if ($this->model('PreprocessingModel')->cekKataDasar($format1) == true) {
      return $format1;
   } elseif ($this->model('PreprocessingModel')->cekKataDasar($format2) == false) {
      return $format2;
   } else {
      return $kata;
   }
}

// ber-CAP => C != r and P != er
function formatKata2($kata = '')
{
   return substr($kata, 3);
}

// ber-CAerV....
function formatKata3($kata = '')
{
   return substr($kata, 3);
}

// 4. belajar | bel-ajar
function formatKata4($kata = '')
{
   return substr($kata, 3);
}

function formatKata5($kata = '')
{
   return substr($kata, 2);
}
// ter-V.... | te-rV...
function formatKata6($kata)
{
   // ter-V...
   $format1 = substr($kata, 3);
   // te-rV...
   $format2 = substr($kata, 2);

   if ($this->model('PreprocessingModel')->cekKataDasar($kata) == true) {
      return $format1;
   } elseif ($this->model('PreprocessingModel')->cekKataDasar($kata) == false) {
      return $format2;
   } else {
      return $kata;
   }
}

// ter-CerV
function formatKata7($kata = '')
{
   return substr($kata, 3);
}

// ter-CP => C != r and P != er
function formatKata8($kata = '')
{
   return substr($kata, 3);
}

// te-C1erC2 => C1 != r
function formatKata9($kata = '')
{
   return substr($kata, 2);
}

// me-{l|w|r|y}V...
function formatKata10($kata)
{
   return substr($kata, 2);
}

// mem-{b|f|v}...
function formatKata11($kata)
{
   return substr($kata, 3);
}

// mem-pe{r|l}...
function formatKata12($kata)
{
   return substr($kata, 3);
}

// me-m{rV|V} or me-pe{rV|v}...
function formatKata13($kata)
{
   // me-m{rV|V} 
   $format1 = substr($kata, 2);
   // me-p{rV|v}...
   $format2 = substr($kata, 3);
   $format2 = "p$format2";

   if ($this->model('PreprocessingModel')->cekKataDasar($format1) == true) {
      return $format1;
   } else if ($this->model('PreprocessingModel')->cekKataDasar($format2) == true) {
      return $format2;
   } else {
      return $kata;
   }
}

// mem-{c|d|j|z}..
function formatKata14($kata)
{
   return substr($kata, 3);
}

// men-V   => me-nV or me-tV
function formatKata15($kata)
{
   // me-nV
   $format1 = substr($kata, 2);
   // me-tV
   $format2 = substr($kata, 3);
   $format2 = "t$format2";

   if ($this->model('PreprocessingModel')->cekKataDasar($format1) == true) {
      return $format1;
   } else if ($this->model('PreprocessingModel')->cekKataDasar($format2) == true) {
      return $format2;
   } else {
      return $kata;
   }
}

// meng-{g|h|q}
function formatKata16($kata)
{
   return substr($kata, 4);
}

// // mengV... => meng-V or meng-kV...
function formatKata17($kata)
{
   // meng - V
   $format1 = substr($kata, 4);
   // meng-kV..
   $format2 = substr($kata, 5);
   $format2 = "k$format2";

   if ($this->model('PreprocessingModel')->cekKataDasar($format1)) {
      return $format1;
   } elseif ($this->model('PreprocessingModel')->cekKataDasar($format2)) {
      return $format2;
   } else {
      return $kata;
   }
}

// meny-sV....
function formatKata18($kata)
{
   $formatKata = substr($kata, 4);
   return $formatKata = "s$formatKata";
}

// mem-pV... => V != e
function formatKata19($kata)
{
   return substr($kata, 3);
}

// pe-{w|y}V ...
function formatKata20($kata)
{
   return substr($kata, 2);
}

// pe-rV or per-V
function formatKata21($kata)
{
   // pe-rV
   $format1 = substr($kata, 2);
   // per-V
   $format2 = substr($kata, 3);

   if ($this->model('PreprocessingModel')->cekKataDasar($format1)) {
      return $format1;
   } elseif ($this->model('PreprocessingModel')->cekKataDasar($format2)) {
      return $format2;
   } else {
      return $kata;
   }
}

// per-CAP...
function formatkata22($kata)
{
   return substr($kata, 3);
}

// per-CAerV...
function formatkata23($kata)
{
   return substr($kata, 3);
}

// pem-{b|f|V}...
function formatkata24($kata)
{
   return substr($kata, 3);
}

// pe-m{rV|V} or pe-p{rV|V}
function formatkata25($kata)
{
   // pe-m{rV|V}
   $format1 = substr($kata, 2);
   // pe-p{rV|V}
   $format2 = substr($kata, 3);
   $format2 = "p$format2";
   if ($this->model('PreprocessingModel')->cekKataDasar($format1)) {
      return $format1;
   } else if ($this->model('PreprocessingModel')->cekKataDasar($format2)) {
      return $format2;
   }else{
      return $kata;
   }   
}

// pen-{c|d|z|j}
function formatKata26($kata){
   return substr($kata, 3);
}

// pe-nV or pe-tV
function formatKata27($kata)
{
   // pe-nV
   $format1 = substr($kata, 3);
   $format1 = "n$format1";

   // pe-tV
   $format2 = substr($kata, 3);
   $format2 = "n$format2";

   if ($this->model('PreprocessingModel')->cekKataDasar($format1)) {
      return $format1;
   } else if ($this->model('PreprocessingModel')->cekKataDasar($format2)) {
      return $format2;
   } else {
      return $kata;
   }  
}

// peng-{g|h|q}..
function formatKata28($kata)
{
   return substr($kata, 4);
}

// peng-V or peng-kV
function formatKata29($kata)
{
   // peng-V
   $format1 = substr($kata, 4);

   // peng-kV
   $format2 = "k$format1";

   if ($this->model('PreprocessingModel')->cekKataDasar($format1)) {
      return $format1;
   } else if ($this->model('PreprocessingModel')->cekKataDasar($format2)) {
      return $format2;
   } else {
      return $kata;
   }  
}

// peny-sV...
function formatKata30($kata)
{
   $format = substr($kata, 4);
   return "s$format";
}

// pe-lV.. except 'pelajar' => 'ajar'
function formatKata31($kata)
{
   if ($kata == 'pelajar') {
      return 'ajar';
   }else{
      return substr($kata, 2);
   }   
}

// per-erV
function formatKata32($kata)
{
   return substr($kata, 3);
}

// pe-CP
function formatKata33($kata)
{
   return substr($kata, 2);
}

}
