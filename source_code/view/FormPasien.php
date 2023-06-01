<?php


include_once("kontrak/KontrakPasien.php");
include_once("presenter/ProsesPasien.php");

class FormPasien implements KontrakFormPasienView
{
	private $prosespasien; //presenter yang dapat berinteraksi langsung dengan view
	private $tpl;

	function __construct()
	{
		//konstruktor
		$this->prosespasien = new ProsesPasien();
	}

	function tampil()
	{	
		 
        $listGender = ['Perempuan', 'Laki-laki'];
		$dataOptionGender = '<option value="">Pilih Gender</option>';
        foreach ($listGender as $gender) {
			
            $dataOptionGender .= '<option value="' . $gender. '">' . $gender . '</option>';
        }
        
		
		$dataForm = null;
        $dataForm = '<label for="nik">NIK:</label>
            <input type="text" id="nik" name="nik" required>

            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required>
            
            <label for="tempat">Tempat:</label>
            <input type="text" id="tempat" name="tempat" required>
            
            <label for="tl">Tanggal Lahir:</label>
            <input type="date" id="tl" name="tl" required>
            
			<label for="gender">Gender:</label>
			 <select id="gender" name="gender" >' . $dataOptionGender .
            '</select>
			
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" required>
            
            <label for="telp">No Telepon:</label>
            <input type="text" id="telp" name="telp" required>
            
			<br>
			<button type="submit" class="btn btn-success text-white" name="btn-add" id="btn-add">Add</button>
			<br>
			<a type="button" class="btn btn-primary text-white nav-link active" href="index.php ">Cancel</a>';


        $view = new Template("templates/form.html");
        $view->replace("ACTION", "Add");
        $view->replace("DATA_FORM", $dataForm);
        $view->write();
	}

	function add($data)
	{
		$this->prosespasien->addDataPasien($data);
	}

	function tampilEdit($i)
	{
		
		$this->prosespasien->prosesDataPasien();
		$listGender = ['Perempuan', 'Laki-laki'];
		$dataOptionGender = '<option value="">Pilih Gender</option>';
        foreach ($listGender as $gender) {
			if ($gender == $this->prosespasien->getGender($i)) { // jika group id dari database adalah group id pilihan user yang mau di update maka group id itu akan dikecualikan
				$dataOptionGender .= '<option value="' . $gender . '" selected>' . $gender . '</option>';
			} else {
				$dataOptionGender .= '<option value="' . $gender . '">' . $gender . '</option>';
			}
        }
		
		$dataForm = null;
        $dataForm = '
		
		<label for="nik">NIK:</label>
		<input type="text" id="nik" name="nik" value="' . $this->prosespasien->getNik($i) . '" required>
		<input type="hidden" name="id" value="' . $this->prosespasien->getId($i) . '" >

            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" value="' . $this->prosespasien->getNama($i) . '" required>
            
            <label for="tempat">Tempat:</label>
            <input type="text" id="tempat" name="tempat" value="' . $this->prosespasien->getTempat($i) . '" required>
            
            <label for="tl">Tanggal Lahir:</label>
            <input type="date" id="tl" name="tl" value="' . $this->prosespasien->getTl($i) . '" required>
            
			<label for="gender">Gender:</label>
			 <select id="gender" name="gender" >' . $dataOptionGender .
            '</select>
			
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" value="' . $this->prosespasien->getEmail($i) . '" required>
            
            <label for="telp">No Telepon:</label>
            <input type="text" id="telp" name="telp" value="' . $this->prosespasien->getTelp($i) . '" required>
            
			<br>
			<button type="submit" class="btn btn-success text-white" name="btn-edit" id="btn-add">Edit</button>
			<br>
			<a type="button" class="btn btn-primary text-white nav-link active" href="index.php ">Cancel</a>';


        $view = new Template("templates/form.html");
        $view->replace("ACTION", "Edit");
        $view->replace("DATA_FORM", $dataForm);
        $view->write();
	}

	function edit($id, $data)
	{
		$this->prosespasien->editDataPasien($id, $data);
	}
}
