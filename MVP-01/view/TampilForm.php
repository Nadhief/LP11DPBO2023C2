<?php


include("KontrakForm.php");
include("presenter/ProsesPasien.php");

class TampilForm implements KontrakForm
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
		$data = null;

		//semua terkait tampilan adalah tanggung jawab view
		
			$data .= 
            '<div class="form-group">
                <label for="nik">NIK</label>
                <input type="text" class="form-control" id="nik" name="nik" required>
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="form-group">
                <label for="tempat">Tempat Lahir</label>
                <input type="text" class="form-control" id="tempat" name="tempat" required>
            </div>
            <div class="form-group">
                <label for="tl">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tl" name="tl" required>
            </div>
            <div class="form-group">
                <label for="gender">Jenis Kelamin</label>
                <select class="form-control" id="gender" name="gender" required>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="telp">Nomor Telepon</label>
                <input type="tel" class="form-control" id="telp" name="telp" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
            ';
		
		// Membaca template skin.html
		$this->tpl = new Template("templates/form.html");

		// Mengganti kode Data_Tabel dengan data yang sudah diproses
		$this->tpl->replace("FORM_DATA", $data);

		// Menampilkan ke layar
		$this->tpl->write();
	}
    function tampilID($i)
	{
        // ambil data dlu dari tabel pasien
        $this->prosespasien->prosesDataPasien();
        // bikin variabel buat ditaro di value

        $id = $this->prosespasien->getId($i);
        $nik = $this->prosespasien->getNik($i);
		$nama = $this->prosespasien->getNama($i);
		$tempat = $this->prosespasien->getTempat($i);
		$tl = $this->prosespasien->getTl($i);
		$gender = $this->prosespasien->getGender($i);
		$email = $this->prosespasien->getEmail($i);
		$telp = $this->prosespasien->getTelp($i);
        
		$data = null;

		//semua terkait tampilan adalah tanggung jawab view
		
			$data .= 
            '<div class="form-group">
                <input type="hidden" name="id" class="form-control" value="' . $id . '"> <br>
                <label for="nik">NIK</label>
                <input type="text" class="form-control" value="' . $nik . '" id="nik" name="nik" required>
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" value="' . $nama . '" id="nama" name="nama" required>
            </div>
            <div class="form-group">
                <label for="tempat">Tempat Lahir</label>
                <input type="text" class="form-control" value="' . $tempat . '" id="tempat" name="tempat" required>
            </div>
            <div class="form-group">
                <label for="tl">Tanggal Lahir</label>
                <input type="date" class="form-control" value="' . $tl . '" id="tl" name="tl" required>
            </div>
            <div class="form-group">
                <label for="gender">Jenis Kelamin</label>
                <select class="form-control" id="gender" name="gender" required>
                    <option value="Laki-laki"';
                    if ($gender == "Laki-laki") {
                        $data .= ' selected';
                    }
                    $data .= '>Laki-laki</option>
                    <option value="Perempuan"';
                    if ($gender == "Perempuan") {
                        $data .= ' selected';
                    }
                    $data .= '>Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" value="' . $email . '" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="telp">Nomor Telepon</label>
                <input type="tel" class="form-control" value="' . $telp . '" id="telp" name="telp" required>
            </div>
            <button type="submit" name="update" class="btn btn-primary">Simpan</button>
            ';
		
		// Membaca template skin.html
		$this->tpl = new Template("templates/form.html");

		// Mengganti kode Data_Tabel dengan data yang sudah diproses
		$this->tpl->replace("FORM_DATA", $data);

		// Menampilkan ke layar
		$this->tpl->write();
	}
    function addPasien($data){
        $this->prosespasien->addPasien($data);
    }
    function updatePasien($id, $data){
        $this->prosespasien->updatePasien($id, $data);
    }
}

