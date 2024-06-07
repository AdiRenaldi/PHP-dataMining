<?php

class Tambah extends Controller
{
	public function index()
	{
		$this->view('tambah');
	}

	public function tambahData()
	{
		$ns1 = $_POST['ns1'];
		$ns2 = $_POST['ns2'];
		$ns3 = $_POST['ns3'];
		$ns4 = $_POST['ns4'];
		$ns5 = $_POST['ns5'];
		$ns6 = $_POST['ns6'];
		$ns7 = $_POST['ns7'];
		$ns8 = $_POST['ns8'];
		$kata_baku = $_POST['kata_baku'];
		if ($this->model('TambahModel')->tambah($ns1, $ns2, $ns3, $ns4, $ns5, $ns6, $ns7, $ns8, $kata_baku) > 0) {
			header('Location: ' . url::BASEURL . '/Tambah/index');
		}
	}
}