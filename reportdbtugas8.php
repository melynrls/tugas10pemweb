<?php
include('connect.php');
require_once("dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$query = mysqli_query($konek,"select * from pendaftaransiswa");
$html = '<center><h3>Pendaftaran Siswa Baru</h3></center><hr/><br/>';
 // Menuliskan nama kolom
$html .= '<table border="1" width="100%">
<tr>
<th>No</th>
<th>Jenis Pendaftaran</th>
<th>Tanggal Masuk Sekolah</th>
<th>NIS</th>
<th>Nomor Peserta Ujian</th>
<th>Pernah PAUD</th>
<th>Pernah TK</th>
<th>No. Seri SKHUN Sebelumnya</th>
<th>No. Seri Ijazah Sebelumnya</th>
<th>Hobi</th>
<th>Cita-cita</th>
<th>Nama Lengkap</th>
<th>Jenis Kelamin</th>
<th>NISN</th>
<th>NIK</th>
<th>Tempat Lahir</th>
<th>Tanggal Lahir</th>
<th>Agama</th>
<th>Berkebutuhan Khusus</th>
<th>Alamat Jalan</th>
<th>RT</th>
<th>RW</th>
<th>Dusun</th>
<th>Kelurahan/Desa</th>
<th>Kecamatan</th>
<th>Kode Pos</th>
<th>Tempat Tinggal</th>
<th>Moda Transportasi</th>
<th>No. HP</th>
<th>No. Telepon</th>
<th>E-mail Pribadi</th>
<th>Penerima KPS/PKH/KIP</th>
<th>No. KPS/PKH/KIP</th>
<th>Kewarganegaraan</th>
</tr>';
// Mengambil data pada database dan export to pdf
$no = 1;
while($row = mysqli_fetch_array($query))
{
	$html .= "<tr> 
	<td>".$no."</td>
	<td>".$row['jenisdaftar']."</td>
	<td>".$row['tglmasuk']."</td>
	<td>".$row['nis']."</td>
	<td>".$row['noujian']."</td>
	<td>".$row['paud']."</td>
	<td>".$row['tk']."</td>
	<td>".$row['noskhun']."</td>
	<td>".$row['noijazah']."</td>
	<td>".$row['hobi']."</td>
	<td>".$row['citacita']."</td>
	<td>".$row['namalengkap']."</td>
	<td>".$row['jkel']."</td>
	<td>".$row['nisn']."</td>
	<td>".$row['nik']."</td>
	<td>".$row['tempatlahir']."</td>
	<td>".$row['tgllahir']."</td>
	<td>".$row['agama']."</td>
	<td>".$row['kebutuhankhusus']."</td>
	<td>".$row['jalan']."</td>
	<td>".$row['rt']."</td>
	<td>".$row['rw']."</td>
	<td>".$row['dusun']."</td>
	<td>".$row['kel']."</td>
	<td>".$row['kec']."</td>
	<td>".$row['pos']."</td>
	<td>".$row['tinggal']."</td>
	<td>".$row['transportasi']."</td>
	<td>".$row['nohp']."</td>
	<td>".$row['notelp']."</td>
	<td>".$row['email']."</td>
	<td>".$row['kps']."</td>
	<td>".$row['nokps']."</td>
	<td>".$row['kwn']."</td>
	</tr>";
	$no++;
}
$html .= "</html>";
$dompdf->loadHtml($html);

$dompdf->setPaper('A4','landscape');// Setting ukuran dan orientasi kertas

$dompdf->render();// Rendering dari HTML Ke PDF

$dompdf->stream('pendaftaran_siswa.pdf');// Melakukan output file PDF
?>
