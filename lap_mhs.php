<?php
// memanggil library FPDF
require('fpdf184/fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l','mm','A5');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',16);
// mencetak string
$pdf->Cell(190,7,'PROGRAM STUDI TEKNIK INFORMATIKA',0,1,'C'); //mencetak 
output didalam pdf
$pdf->SetFont('Arial','B',12); //set font
$pdf->Cell(190,7,'DAFTAR MAHASISWA MAKUL PEMROGRAMAN WEB DINAMIS',0,1,'C'); 
//mencetak output didalam pdf
// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Arial','B',10); //setfont
$pdf->Cell(20,6,'NIM',1,0); 
$pdf->Cell(50,6,'NAMA MAHASISWA',1,0);
$pdf->Cell(25,6,'Fakultas',1,0);
$pdf->Cell(50,6,'Tanggal Lahir',1,0);
$pdf->Cell(30,6,'Alamat',1,1);
$pdf->SetFont('Arial','',10); 
include 'koneksi.php';
$mahasiswa = mysqli_query($con, "SELECT * FROM mahasiswa"); //memanggil data 
yang ada di dalam database
while ($row = mysqli_fetch_array($mahasiswa)){ //mengambil data
$pdf->Cell(20,6,$row['nim'],1,0);
$pdf->Cell(50,6,$row['nama'],1,0);
$pdf->Cell(25,6,$row['fakultas'],1,0);
$pdf->Cell(50,6,$row['tgllhr'],1,0);
$pdf->Cell(30,6,$row['alamat'],1,1);
}
$pdf->Output();
