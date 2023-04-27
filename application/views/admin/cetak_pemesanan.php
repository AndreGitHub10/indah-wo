<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cetak Pemesanan</title>
</head>
<body onload="window.print() ">
<table width="100%" border="0">
  <tr>
    <td width="15%" rowspan="3"><img src="<?php echo base_url()?>/assets/front-end/images/logo.png" width="70%" height="100px" /></td>
    <td width="70%">&nbsp;</td>
    <td width="15%">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" bgcolor="#FFFFFF"><h2>WEDDING ORGANIZER<br /></h2>
      <div>
        <p>Jl. Ikan Tembangkang Gg Ikan Laes Nomor 10, Bandar Lampung, Indonesia</p>
      </div>
    <div> </div></td>
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
    <td colspan="3" align="center"><strong>Laporan Pemesanan <br />
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
       <thead style="background-color:white;">
                              <tr> 
                                <th>No</th>
                                <th>Nama Pelanggan</th>
                                <th>Nama WO</th>
                                <th>No Transaksi</th>
                                <th>Tgl Transaksi</th>
                                <th>Total Transaksi</th>
                                <th>Tujuan Pengiriman</th> 
                                <th>Rincian</th> 
                                <th>Status</th>
                              </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no  = 1;
                                foreach($dt1 as $r){
                                  $idwo = $r->id_wo;
                                  $idtran = $r->id_transaksi;
                                  $catatan  = $r->catatan;

                                  $nama_wo = $this->M_data->data("tbl_wo",array("id_wo"=>$idwo))->row()->nama_wo;
																	
																	$id_prov    = $r->id_prov;
                                  $id_kabkot  = $r->id_kabkot;
                                  $id_kec     = $r->id_kec;

                                  $nama_prov  = $this->M_data->data("tbl_prov",array("id_prov"=>$id_prov))->row()->nama_prov;

																	$dtkk=$this->M_data->data("tbl_kabkot",array("id_kabkot"=>$id_kabkot))->row();
                                  $nama_kabkot  = $dtkk->nama_kabkot;
                                  $ongkir       = $dtkk->ongkir;

                                  $nama_kec  = $this->M_data->data("tbl_kec",array("id_kec"=>$id_kec))->row()->nama_kec;  

                                  $total_transaksi = $r->total_transaksi;

                                  $totalnya = $ongkir + $total_transaksi;
                            ?>
                            <tr> 
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $this->M_data->data("tbl_pelanggan",array("id_pelanggan"=>$r->id_pelanggan))->row()->nama_pelanggan?></td>
                                <td><?php echo $nama_wo?></td>
                                <td><?php echo $idtran?></td>
                                <td><?php echo $r->tgl_transaksi?></td>
                                <td><?php echo "Rp ".number_format($totalnya,0,",",".")?></td> 
                                <td><?php echo $nama_prov." - ".$nama_kabkot." - ".$nama_kec;?></td>
                                <td><?php echo $catatan?></td>
                                <td><?php echo $r->status?></td>
                            </tr>
                            <?php } ?>
                            
                           
                        </tbody>
                    </table>
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
        <td width="30%" align="center">Bandarlampung, <?php echo date('Y-m-d');?></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td align="center">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td align="center">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td align="center">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td align="center"><strong><u>Velita Nur Anggraini, S.Kom.</u><br />
          Direktur Utama WO<br />
        </strong></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>