<?php

/******************************************
Asisten Pemrogaman 11
 ******************************************/

include("model/Template.class.php");
include("model/DB.class.php");
include("model/Pasien.class.php");
include("model/TabelPasien.class.php");
include("view/TampilForm.php");

$tp = new TampilForm();


if (isset($_POST['submit'])) {
    $tp->addPasien($_POST);
}
else if(isset($_GET['id'])){
    $tp->tampilID($_GET['id']);
    // $tp->updatePasien($_POST);
} else if (isset($_POST['update'])) {
    $tp->updatePasien($_POST['id'], $_POST);
} else if(!isset($_GET['id'])){
    $tp->tampil();
    // $tp->tampilID($_GET['id']);
    // $tp->updatePasien($_POST);
}

