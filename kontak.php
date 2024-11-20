<?php
if (isset($_POST["kirim"])) {
    $nim = $_POST["nim"]; //menangkap data nim
    $nama = $_POST["nama"]; //menangkap data nama
    if (isset($_POST["jk"])) { //ngecek gender udh terisi/blm
        $jk = $_POST["jk"];
    } else {
        $jk = " "; //klo gender nda terisi, brarti gender kosong
    }
    $matkul = isset($_POST["matkul"]) ? implode(", ", $_POST["matkul"]) : " "; //isset buat ngecek isi. karena matkul sebuah array/list pakai implode.  separator buat spasi antara pemweb, dll
    $domisili = $_POST["domisili"];
    $lahir = $_POST["lahir"];
    //error buat mastiin lo file yg kita masukin adalah foto (bukan zip dll)
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) { //pakai $_FILES krn foto berupa file 
        $foto = 'wchng/' . basename(path: $_FILES['foto']['name']); //basename berfungsi masukin nama file upload//....
        move_uploaded_file(from: $_FILES['foto']['tmp_name'], to: $foto);
    } else {
        $foto = 'default.jpg'; //jika tidak ada foto yg di upload
    }
    $alamat = $_POST["alamat"];
    //menampilkan hasil inputan
    echo "
                        <table>
                            <tr>
                                <td>
                                    <img src='$foto' alt='Foto'>
                                </td>
                                <td>
                                    <table>
                                        <tr>
                                            <p>NIM : $nim</p>
                                        </tr>
                                        <tr>
                                            <p>Nama : $nama</p>
                                        </tr>
                                        <tr>
                                            <p>Jenis Kelamin : $jk</p>
                                        </tr>
                                        <tr>
                                            <p>Kota : $domisili</p>
                                        </tr>
                                        <tr>
                                            <p>Tanggal Lahir : $lahir</p>
                                        </tr>
                                        <tr>
                                            <p>Matkul : $matkul</p>
                                        </tr>
                                        <tr>
                                            <p>Alamat : $alamat</p>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                        ";
}
?>
<form method="post" enctype="multipart/form-data">
    <table cellpadding="10" border="0">
        <tr>
            <td>NIM</td>
            <td><input type="text" name="nim" placeholder="Masukkan Nim..."></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td><input type="text" name="nama" size="50"></td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>
                <input type="radio" name="jk" value="Pria"> Pria
                <input type="radio" name="jk" value="Wanita"> Wanita
            </td>
        </tr>
        <tr>
            <td>Mata Kuliah</td>
            <td>
                <input type="checkbox" name="matkul[]" value="Pemrograman WEB"> Pemrograman WEB
                <input type="checkbox" name="matkul[]" value="Riset Operasi"> Riset Operasi
                <input type="checkbox" name="matkul[]" value="Manajemen Basis Data"> Manajemen Basis Data
            </td>
        </tr>
        <tr>
            <td>Domisili</td>
            <td>
                <select name="domisili">
                    <option>Pontianak</option>
                    <option>Singkawang</option>
                    <option>Sambas</option>
                    <option>Sintang</option>
                </select> <br>
            </td>
        </tr>
        <tr>
            <td>Tgl Lahir</td>
            <td><input type="date" name="lahir"> <br></td>
        </tr>
        <tr>
            <td>Foto</td>
            <td><input type="file" name="foto"> <br></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td><textarea name="alamat"></textarea></td>
        </tr>
        <tr>
            <td><button type="submit" name="kirim" value="Kirim">Kirim</td>
        </tr>
    </table>
</form>