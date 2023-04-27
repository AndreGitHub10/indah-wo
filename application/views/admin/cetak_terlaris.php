<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cetak Terlaris</title>
</head>
<body onload="window.print() ">
<table width="100%" border="0">
  <tr>
    <td width="15%" rowspan="3"><img src="<?php echo base_url()?>assets/front-end/images/logo.png" width="70%" height="30%" /></td>
    <td width="70%">&nbsp;</td>
    <td width="15%">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" bgcolor="#FFFFFF"><h2>RANGRANG SHOP<br /></h2>
    Jl. Zainal Abidin Pagar Alam No.8, Labuhan Ratu, Kedaton, Kota Bandar Lampung, Lampung 35142</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"> <hr size="3" color="#000000"/> </td>
  </tr>
  <tr>
    <td colspan="3" align="center"><strong>Laporan Terlaris <br />
    <?php
    	if (!empty($tgl1)){
			echo "Dari tanggal ".$tgl1. "<br> Sampai tanggal ".$tgl2;
		}
	?>
      <br />
    </strong></td>
  </tr>
  <tr>
    <td colspan="3"><table width="100%" border="1" cellpadding="0" cellspacing="0">
       <thead>
                              <tr style="background-color: #c4c4ff;color:white"> 
                                <th>No</th> 
                                <th>Tgl Transaksi</th>
                                <th>Nama Produk</th>
                                <th>Total Pembelian</th>
                                <th>Total Transaksi</th>
                                <th>Peringkat</th> 
                              </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $no         = 1;
                                $peringkat  = 1;
                                foreach($dt1 as $r){ 
                            ?>
                            <tr style="background-color: white"> 
                                <td align="center" style="background-color: white"><?php echo $no++; ?></td> 
                                <td align="center"><?php echo $r->tgl_transaksi?></td>
                                <td align="center"><?php echo $r->nama_produk?></td>
                                <td align="center"><?php echo $r->total?></td>
                                <td align="center"><?php echo "Rp ".number_format($r->total_harga,0,",",".")?></td> 
                                <td align="center">
                                    <?php echo $peringkat++; ?>
                                </td>
                            </tr>
                            <?php } ?>
                            
                           
                        </tbody>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"><table width="100%" border="0">
      <tr>
        <td width="70%">&nbsp;</td>
        <td width="30%">Bandarlampung, <?php echo date('Y-m-d');?></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><strong>Kabid Penmad Prov Lampung</strong></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>