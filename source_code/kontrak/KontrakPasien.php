<?php

  interface KontrakTampilPasienView {
      public function tampil();
      public function hapus($id);
  }
  interface KontrakFormPasienView {
      public function tampil();
      public function add($data);
      public function tampilEdit($i);
      public function edit($id, $data);
  }

  interface KontrakPasienPresenter {
    public function prosesDataPasien();
	public function getId($i);
	public function getNik($i);
	public function getNama($i);
	public function getTempat($i);
	public function getTl($i);
	public function getGender($i);
	public function getSize();
	public function getEmail($i);
	public function getTelp($i);
	public function addDataPasien($data);
	public function editDataPasien($id, $data);
	public function deleteDataPasien($id);
  }
