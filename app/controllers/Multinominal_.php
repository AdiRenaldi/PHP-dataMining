<?php

class Multinominal_ extends Controller
{
	private $preprocessing;
	private $multinominal;

	public function __construct()
   {
      $this->preprocessing = new Preprocessing();
      $this->multinominal = new Multinominal();
   }

	public function postMultinominal()
	{
	$data['url'] = 'Multinominal';
	  $this->view('template/_header', $data);
	  $this->view('multinominal');
	}

	public function multinominal()
	{
		if (isset($_POST['komentar'])) {
			for ($i=0; $i <=3 ; $i++) { 
				
				// proses pembersihan komentar
				$data = $this->preprocessing->data($_POST['komentar'], $i);
				// var_dump($data);
				$conditionalProbability = [];
				foreach($data as $d){
					$hasil = $this->multinominal->F_multinominal($d);
					if ($i == 0) {
						if ($this->model('MultinominalModel__')->cekMultinominal_Stem_Stop($d) == false) {
							$this->model('MultinominalModel__')->tambahConditionalMultinominal_Stem_Stop($hasil);
						}
						if ($this->model('MultinominalModel__')->cekMultinominal_Stem_Stop($d) !== false) {
							$conditionalProbability[] = $this->model('MultinominalModel__')->cekMultinominal_Stem_Stop($d);
						}
					}else if ($i == 1) {
						if ($this->model('MultinominalModel__')->cekMultinominal_Stem($d) == false) {
							$this->model('MultinominalModel__')->tambahConditionalMultinominal_Stem($hasil);
						}
						if ($this->model('MultinominalModel__')->cekMultinominal_Stem($d) !== false) {
							$conditionalProbability[] = $this->model('MultinominalModel__')->cekMultinominal_Stem($d);
						}
					}else if ($i == 2) {
						if ($this->model('MultinominalModel__')->cekMultinominal_Stop($d) == false) {
							$this->model('MultinominalModel__')->tambahConditionalMultinominal_Stop($hasil);
						}
						if ($this->model('MultinominalModel__')->cekMultinominal_Stop($d) !== false) {
							$conditionalProbability[] = $this->model('MultinominalModel__')->cekMultinominal_Stop($d);
						}
					}else if ($i == 3) {
						if ($this->model('MultinominalModel__')->cekMultinominal($d) == false) {
							$this->model('MultinominalModel__')->tambahConditionalMultinominal($hasil);
						}
						if ($this->model('MultinominalModel__')->cekMultinominal($d) !== false) {
							$conditionalProbability[] = $this->model('MultinominalModel__')->cekMultinominal($d);
						}
					}
				}

				$penentuanKelas = $this->multinominal->penentuanKelasMultinominal($conditionalProbability);
				$kata = implode(" ", $data);
				if ($i == 0) {
					$this->model('MultinominalModel__')->tDtTestingStemStop($kata,$penentuanKelas);
					$this->model('MultinominalModel__')->tDtKomStemStop($kata,$_POST['kelas']);
				} else if ($i == 1) {
					$this->model('MultinominalModel__')->tDtTestingStem($kata,$penentuanKelas);
					$this->model('MultinominalModel__')->tDtKomStem($kata,$_POST['kelas']);
				}else if ($i == 2) {
					$this->model('MultinominalModel__')->tDtTestingStop($kata,$penentuanKelas);
					$this->model('MultinominalModel__')->tDtKomStop($kata,$_POST['kelas']);
				}else if ($i == 3) {
					$this->model('MultinominalModel__')->tDtTesting($kata,$penentuanKelas);
					$this->model('MultinominalModel__')->tDtKom($kata,$_POST['kelas']);
				}
			}
			header('Location: ' . url::BASEURL . '/Multinominal_/postMultinominal');

			// if ($data > 0) {
			// 	$conditionalProbability = [];
			// 	foreach($data as $dt){
			// 		if ($_POST['pilih'] == 0) {
			// 			if ($this->model('MultinominalModel__')->cekMultinominal_Stem_Stop($dt) !== false) {
			// 				$conditionalProbability[] = $this->model('MultinominalModel__')->cekMultinominal_Stem_Stop($dt);
			// 			}
			// 		} else
			// 		if ($_POST['pilih'] == 1) {
			// 			if ($this->model('MultinominalModel__')->cekMultinominal_Stem($dt) !== false) {
			// 				$conditionalProbability[] = $this->model('MultinominalModel__')->cekMultinominal_Stem($dt);
			// 			}
			// 		} else
			// 		if ($_POST['pilih'] == 2) {
			// 			if ($this->model('MultinominalModel__')->cekMultinominal_Stop($dt) !== false) {
			// 				$conditionalProbability[] = $this->model('MultinominalModel__')->cekMultinominal_Stop($dt);
			// 			}
			// 		}else
			// 		if ($_POST['pilih'] == 3) {
			// 			if ($this->model('MultinominalModel__')->cekMultinominal($dt) !== false) {
			// 				$conditionalProbability[] = $this->model('MultinominalModel__')->cekMultinominal($dt);
			// 			}
			// 		}
			// 	} 
				// $penentuanKelas = $this->multinominal->penentuanKelasMultinominal($conditionalProbability);
				// var_dump($penentuanKelas);
			// }


			// if ($_POST['kelas'] == 1) {
			// $kelas = 'cyberbullying';
			// }else{
			// 	$kelas = 'non_cyberbullying';
			// }
			// if ($data > 0) {
			// 	$kata = implode(" ", $data);
			// 	$this->model('MultinominalModel__')->tambahDataTesting($kata, $kelas);
			// 	$this->model('MultinominalModel__')->tambahKomentarTesting($_POST['komentar'], $kelas);
			// }
			
		}
	}
}