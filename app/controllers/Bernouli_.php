<?php

class Bernouli_ extends Controller
{
	private $preprocessing;
	private $bernouli;

	public function __construct()
   {
      $this->preprocessing = new Preprocessing();
      $this->bernouli = new Bernouli();
   }

	public function postBernouli()
	{
		$data['url'] = "Bernouli";
	  $this->view('template/_header', $data);
	  $this->view('bernouli');
	}

	public function bernouli()
	{
		if (isset($_POST['komentar'])) {
			for ($i=0; $i <=3 ; $i++) { 
				
				// proses pembersihan komentar
				$data = $this->preprocessing->data($_POST['komentar'], $i);
				// var_dump($data);
				$conditionalProbability = [];
				foreach($data as $d){
					$hasil = $this->bernouli->F_bernouli($d);
					if ($i == 0) {
						if ($this->model('BernouliModel__')->cekBernouli_Stem_Stop($d) == false) {
							$this->model('BernouliModel__')->tambahConditionalBernouli_Stem_Stop($hasil);
						}
						if ($this->model('BernouliModel__')->cekBernouli_Stem_Stop($d) !== false) {
							$conditionalProbability[] = $this->model('BernouliModel__')->cekBernouli_Stem_Stop($d);
						}
					}else if ($i == 1) {
						if ($this->model('BernouliModel__')->cekBernouli_Stem($d) == false) {
							$this->model('BernouliModel__')->tambahConditionalBernouli_Stem($hasil);
						}
						if ($this->model('BernouliModel__')->cekBernouli_Stem($d) !== false) {
							$conditionalProbability[] = $this->model('BernouliModel__')->cekBernouli_Stem($d);
						}
					}else if ($i == 2) {
						if ($this->model('BernouliModel__')->cekBernouli_Stop($d) == false) {
							$this->model('BernouliModel__')->tambahConditionalBernouli_Stop($hasil);
						}
						if ($this->model('BernouliModel__')->cekBernouli_Stop($d) !== false) {
							$conditionalProbability[] = $this->model('BernouliModel__')->cekBernouli_Stop($d);
						}
					}else if ($i == 3) {
						if ($this->model('BernouliModel__')->cekBernouli($d) == false) {
							$this->model('BernouliModel__')->tambahConditionalBernouli($hasil);
						}
						if ($this->model('BernouliModel__')->cekBernouli($d) !== false) {
							$conditionalProbability[] = $this->model('BernouliModel__')->cekBernouli($d);
						}
					}
				}

				$penentuanKelas = $this->bernouli->penentuanKelasBernouli($conditionalProbability);
				$kata = implode(" ", $data);
				if ($i == 0) {
					$this->model('BernouliModel__')->tDtTestingStemStop($kata,$penentuanKelas);
					$this->model('BernouliModel__')->tDtKomStemStop($kata,$_POST['kelas']);
				} else if ($i == 1) {
					$this->model('BernouliModel__')->tDtTestingStem($kata,$penentuanKelas);
					$this->model('BernouliModel__')->tDtKomStem($kata,$_POST['kelas']);
				}else if ($i == 2) {
					$this->model('BernouliModel__')->tDtTestingStop($kata,$penentuanKelas);
					$this->model('BernouliModel__')->tDtKomStop($kata,$_POST['kelas']);
				}else if ($i == 3) {
					$this->model('BernouliModel__')->tDtTesting($kata,$penentuanKelas);
					$this->model('BernouliModel__')->tDtKom($kata,$_POST['kelas']);
				}
			}
			header('Location: ' . url::BASEURL . '/Bernouli_/postBernouli');
		}
	}


}