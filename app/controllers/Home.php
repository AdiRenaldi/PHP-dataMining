<?php

class Home extends Controller
{
	public function index()
	{
		$data['url'] = 'Home';
	    $this->view('index');
	    $this->view('template/_footer');
	}
}