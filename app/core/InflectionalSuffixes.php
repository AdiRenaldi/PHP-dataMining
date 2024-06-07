<?php

class InflectionalSuffixes
{

   public function cekInflectionalSuffixes($word)
   {
      $inflectionalSuffixes = ['lah', 'kah', 'tah', 'pun', 'nya', 'mu', 'ku'];
      for ($j = 0; $j < count($inflectionalSuffixes); $j++) {
         $lenght = count(str_split($inflectionalSuffixes[$j]));
         $lenght = intval("-$lenght");

         if (substr($word, $lenght) == $inflectionalSuffixes[$j]) {
            $hasil = true;
            break;
         } else $hasil = false;
      }
      return $hasil;
   }

   // deleteInflectionalSuffixes => particle['lah', 'kah', 'tah', 'pun'] and possessive pronoun['nya', 'mu', 'ku']
   public function deleteInflectionalSuffixes($word)
   {
      $inflectionalSuffixes = ['lah', 'kah', 'tah', 'pun', 'nya', 'mu', 'ku'];
      for ($j = 0; $j < count($inflectionalSuffixes); $j++) {
         $lenght = count(str_split($inflectionalSuffixes[$j]));
         $lenght = intval("-$lenght");
         if (substr($word, $lenght) == $inflectionalSuffixes[$j]) {
            $word = substr($word, 0, $lenght);
            break;
         }
      }
      return $word;
   }

   // Derivational Suffix 
   public function deleteDerivationalSuffix($word)
   {
      $akhiranTerhapus = '';
      if (substr($word, -1) == 'i') {
         $akhiranTerhapus = 'i';
         $word = substr($word, 0, -1);
         return $data = ["word" => $word, "derivationalSuffix" => $akhiranTerhapus];
      } else if (substr($word, -3) == 'kan') {
         // akhiran an telah dihapus
         $akhiranTerhapus = 'kan';
         $word = substr($word, 0, -3);
         return $data = ["word" => $word, "derivationalSuffix" => $akhiranTerhapus];
      } else if (substr($word, -2) == 'an') {
         // akhiran an telah dihapus
         $akhiranTerhapus = 'an';
         $word = substr($word, 0, -2);
         return $data = ["word" => $word, "derivationalSuffix" => $akhiranTerhapus];
      } else {
         return $data = ["word" => $word, "derivationalSuffix" => $akhiranTerhapus];
      }
   }
}
