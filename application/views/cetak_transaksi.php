<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body onload="window.print()">
<?php
  $id_prov    = $dtrans->id_prov;
                                    $id_kabkot  = $dtrans->id_kabkot;
                                    $id_kec     = $dtrans->id_kec;

                                    $nama_prov  = $this->M_data->data("tbl_prov",array("id_prov"=>$id_prov))->row()->nama_prov;

																		$dtkk=$this->M_data->data("tbl_kabkot",array("id_kabkot"=>$id_kabkot))->row();
                                    $nama_kabkot  = $dtkk->nama_kabkot;
                                    $ongkir       = $dtkk->ongkir;

                                    $nama_kec  = $this->M_data->data("tbl_kec",array("id_kec"=>$id_kec))->row()->nama_kec;  

                                    $total_transaksi = $dtrans->total_transaksi;

                                    $totalnya = $ongkir + $total_transaksi;
?>
<table width="40%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="3"><img src="<?php echo base_url()?>assets/front-end/images/logo2.png" width="100%" height="50px" /></td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"><table width="100%" border="1" cellspacing="0" cellpadding="1">
      <tr>
        <td width="40%">Nomor Transaksi</td>
        <td width="60%"><?php echo $dtrans->id_transaksi?></td> 
      </tr>
      <tr>
        <td>Tanggal Transaksi</td>
        <td><?php echo $dtrans->tgl_transaksi?></td> 
      </tr>
      <tr>
        <td>Total Transaksi</td>
        <td><?php echo "Rp. ".number_format($totalnya,0,",",".")?></td> 
      </tr>
      <tr>
        <td>Tujuan Pengiriman</td>
        <td><?php echo $nama_prov." - ".$nama_kabkot." - ".$nama_kec;?></td> 
      </tr>
      
    </table></td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3">Terimakasih telah menyewa jasa wedding organizer ditempat kami</td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td width="17%">&nbsp;</td>
    <td width="24%">&nbsp;</td>
    <td width="59%" align="center">Bandarlampung, 
    <?php
	date_default_timezone_set('Asia/Jakarta');
   function tanggal_indo($tanggal, $cetak_hari = false)
{
  $hari = array ( 1 =>    'Senin',
        'Selasa',
        'Rabu',
        'Kamis',
        'Jumat',
        'Sabtu',
        'Minggu'
      );
      
  $bulan = array (1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
      );
  $split    = explode('-', $tanggal);
  $tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
  
  if ($cetak_hari) {
    $num = date('N', strtotime($tanggal));
    return $hari[$num] . ', ' . $tgl_indo;
  }
  return $tgl_indo;
}
$tgl = date('Y-m-d');
echo tanggal_indo ($tgl); // Hasil: 20 Maret 2016;
?>
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center"><strong><u>Velita Nur Anggraini, S.Kom.</u><br />
Direktur Utama WO</strong></td>
  </tr>
</table>
</body>
</html>