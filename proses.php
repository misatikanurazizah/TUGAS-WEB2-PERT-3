<?php
// include 'database.php';
// $db = new Database();

// $aksi = $_GET['aksi'];

// if ($aksi = 'tambah'){
   // $db->tambahData($_POST['nama'],$_POST['jns_kelamin'],$_POST['alamat'],$_POST['nohp'],$_POST['gambar']);
   // $_SESSION['message'] = "Data berhasil ditambahkan!";
   // $_SESSION['msg_type'] = "success";
    // header("Location: index.php");
// } elseif ($aksi == "update") {
  //  $db->updateData($_POST['id'], $_POST['nama'], $_POST['jns_kelamin'], $_POST['alamat'], $_POST['nohp'], $_POST['gambar']);
  //  $_SESSION['message'] = "Data berhasil diupdate!";
  //  $_SESSION['msg_type'] = "warning";
  //  header("Location: index.php");
// } elseif ($aksi == "hapus") {
 //   $db->hapusData($_GET['id']);
  //  $_SESSION['message'] = "Data berhasil dihapus!";
  //  $_SESSION['msg_type'] = "danger";
 //   header("Location: index.php");
// }
include 'database.php';
$db_0026 = new Database();

$aksi = $_GET['aksi'];

function uploadGambar() {
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === 0) {
        $targetDir = "uploads/"; // Direktori untuk menyimpan gambar
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true); // Membuat folder jika belum ada
        }

        $fileName = basename($_FILES['gambar']['name']);
        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $allowedTypes = ['jpg', 'jpeg', 'png']; // Format yang diizinkan

        if (!in_array($fileExt, $allowedTypes)) {
            return false; // Tipe file tidak diizinkan
        }

        $fileNewName = uniqid() . '.' . $fileExt;
        $targetFile = $targetDir . $fileNewName;

        // Pindahkan file yang diupload ke direktori target
        if (move_uploaded_file($_FILES['gambar']['tmp_name'], $targetFile)) {
            return $targetFile; // Mengembalikan path file gambar
        } else {
            return false; // Gagal upload
        }
    }
    return false;
}
if ($aksi == 'tambah') {
    $gambar = uploadGambar(); // Panggil fungsi upload gambar

    if ($gambar) {
        // Tambahkan data ke database bersama dengan path gambar
        $db_0026->tambahData($_POST['nama'], $_POST['jns_kelamin'], $_POST['alamat'], $_POST['nohp'], $gambar);
        header("location:index.php?status=success");
        exit();
    } else {
        header("location:index.php?status=error"); // Jika upload gambar gagal
        exit();
    }
}
elseif ($aksi == 'update') {
    $gambar = uploadGambar(); // Upload gambar baru jika ada

    if ($gambar) {
        // Update data beserta gambar baru
        $db_0026->updateData($_POST['id'], $_POST['nama'], $_POST['jns_kelamin'], $_POST['alamat'], $_POST['nohp'], $gambar);
    } else {
        // Update data tanpa mengubah gambar (tidak diupload gambar baru)
        $db_0026->updateData($_POST['id'], $_POST['nama'], $_POST['jns_kelamin'], $_POST['alamat'], $_POST['nohp'], null);
    }
    header("location:index.php?");
    exit();
}
elseif ($aksi == 'hapus') {
    $db_0026->hapusData($_GET['id']);
    header("location:index.php?");
    exit();
}
?>