<?php
require('../pdf/tfpdf.php');
include 'connect.php';

$ma = $_POST['ma'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$day = $_POST['day'];

$pdf = new tFPDF();
$pdf->AddPage();

// Add a Unicode font (uses UTF-8)
$pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
$pdf->SetFont('DejaVu','',18);

$sql = "select * from donhang
    inner join giohang on donhang.id = giohang.id_DonHang
    inner join sanpham on giohang.id_SanPham = sanpham.id where donhang.id = '$ma'";

    $ketqua = mysqli_query($connect, $sql);
	$kq = mysqli_fetch_array($ketqua);


$pdf->Write(10,'                              CHI TIẾT HOÁ ĐƠN');
$pdf->SetFont('DejaVu','',12);
$pdf->Ln(10);  
$pdf->Write(20, 'Mã đơn hàng:   ');
$pdf->Write(20, $ma);
$pdf->Ln(10);  
$pdf->Write(20, 'Tên khách hàng:   ');
$pdf->Write(20, $name);
$pdf->Ln(10);  
$pdf->Write(20, 'Số điện thoại:   ');
$pdf->Write(20, $phone);
$pdf->Ln(10);  
$pdf->Write(20, 'Email:   ');
$pdf->Write(20, $email);
$pdf->Ln(10);  
$pdf->Write(20, 'Địa chỉ:   ');
$pdf->Write(20, $address);
$pdf->Ln(10);  
$pdf->Write(20, 'Thời gian đặt:   ');
$pdf->Write(20, $day);
$pdf->SetFont('DejaVu','',10);
	$pdf->Ln(30);

	$width_cell=array(10,105,20,30,30);

	$pdf->Cell($width_cell[0],10,'STT',1,0,'C');
	$pdf->Cell($width_cell[1],10,'Tên sản phẩm',1,0,'C');
	$pdf->Cell($width_cell[2],10,'Số lượng',1,0,'C');
	$pdf->Cell($width_cell[3],10,'Đơn giá',1,0,'C'); 
	$pdf->Cell($width_cell[4],10,'Thành tiền',1,1,'C'); 
	$i = 0;
	$tong = 0;
	foreach($ketqua as $value) {
		$tien = $value['SoLuongBan'] * ($value['Gia'] - $value['GiaGiam']);
		$tong += $tien;
		$i++;
	$pdf->SetFont('DejaVu','',8);
	$pdf->Cell($width_cell[0],10,$i,1,0,'C');
	$pdf->Cell($width_cell[1],10,$value['TenSP'],1,0,'C');
	$pdf->Cell($width_cell[2],10,$value['SoLuongBan'],1,0,'C');
	$pdf->Cell($width_cell[3],10,(number_format(($value['Gia'] - $value['GiaGiam']), 0, '.', '.')."đ"),1,0,'C');
	$pdf->Cell($width_cell[4],10,(number_format($tien, 0, '.', '.')."đ"),1,1,'C');



	}

    


	if(isset($kq['TienGiamGia'])) {
		$thanhtien = $tong - $kq['TienGiamGia'] + 30000;
	}
	else {
		$thanhtien = $tong + 30000;
	}
	


	$pdf->Ln(20);
	$pdf->SetFont('DejaVu','',12);
	$pdf->Write(10,'                                                                                                Tổng cộng: ');
	$pdf->Write(10, number_format($tong, 0, '.', '.')." đ");
	$pdf->Ln(10);
	$pdf->Write(10,'                                                                                                Voucher giảm giá: ');
	$pdf->Write(10, number_format($kq['TienGiamGia'], 0, '.', '.')." đ");
	$pdf->Ln(10);
	$pdf->SetFont('DejaVu','',10);
	$pdf->Write(10,'                                                                                                                    Phí vận chuyển: ');
	$pdf->Write(10, number_format(30000, 0, '.', '.')." đ");
	$pdf->Ln(10);
	$pdf->SetFont('DejaVu','',12);
	$pdf->Write(10,'                                                                                                 Thành tiền: ');
	$pdf->Write(10, number_format($thanhtien, 0, '.', '.')." đ");
	$pdf->Ln(10);

	

$pdf->Output();
?>