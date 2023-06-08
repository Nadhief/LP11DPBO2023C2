<?php

/******************************************
Asisten Pemrogaman 11
 ******************************************/

class TabelPasien extends DB
{
	function getPasien()
	{
		// Query mysql select data pasien
		$query = "SELECT * FROM pasien";
		// Mengeksekusi query
		return $this->execute($query);
	}
	function getInsert($data)
	{
		$nik = $data['nik'];
		$nama = $data['nama'];
		$tempat = $data['tempat'];
		$tl = $data['tl'];
		$gender = $data['gender'];
		$email = $data['email'];
		$telp = $data['telp'];
        // Query MySQL untuk menyisipkan data pasien
        $query = "INSERT INTO pasien (id, nik, nama, tempat, tl, gender, email, telp) 
		VALUES ('', '$nik', '$nama', '$tempat', '$tl', '$gender', '$email', '$telp')";
        
        // Mengeksekusi query
        $this->execute($query);
	}

	function getUpdate($id, $data)
{
	// var_dump("Dinda Sange");
	// die;
    // try {
        $nik = $data['nik'];
        $nama = $data['nama'];
        $tempat = $data['tempat'];
        $tl = $data['tl'];
        $gender = $data['gender'];
        $email = $data['email'];
        $telp = $data['telp'];
        
    //     // Query MySQL untuk memperbarui data pasien
        $query = "UPDATE pasien SET nik = '$nik',nama = '$nama',tempat = '$tempat',tl = '$tl',gender = '$gender',email = '$email',telp = '$telp' WHERE id = '$id'";
        
		return $this->execute($query);
		
    //     // Mengikat parameter pada pernyataan SQL
    //     $params = array(':id' => $id);
        
    //     // Menjalankan pernyataan SQL dengan parameter yang sudah diikat
    // } catch (Exception $e) {
    //     // Memproses error
    //     echo "Error saat memperbarui data pasien: " . $e->getMessage();
    // }
}

	function getDelete($id)
	{
		// Query MySQL untuk menghapus data pasien
		$query = "DELETE FROM pasien WHERE id = '$id'";
		$this->execute($query);
			
	}

}
