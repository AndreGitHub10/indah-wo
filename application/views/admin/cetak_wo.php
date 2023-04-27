<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cetak WO</title>
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
    <td colspan="3" align="center"><strong>Laporan Wedding Organizer</strong></td>
  </tr>
  <tr>
    <td colspan="3"><table width="100%" border="1" cellpadding="0" cellspacing="0"> 
                            <thead>
                              <tr style="background-color: #c4c4ff;color:white"> 
                                <th>No</th>
                                <th>Nama Pemilik</th>
                                <th>Nama wo</th>
                                <th>Deskripsi wo</th> 
                                <th>Rek wo</th>
                                <th>Email</th>
                                <th>Status</th> 
                              </tr>
                        </thead>
                        <tbody>
                            <?php $no=1;
                                foreach($this->M_data->data("tbl_wo")->result() as $r){
                            ?>
                            <tr style="background-color: white"> 
                                <td style="background-color: white"><?php echo $no++; ?></td>
                                <td><?php echo $r->nama_pemilik; ?></td>                               
                                <td><?php echo $r->nama_wo; ?></td>                               
                                <td><?php echo $r->deskripsi_wo; ?></td>                               
                                <td><?php echo $r->rek_wo; ?></td>                               
                                <td><?php echo $r->email; ?></td>                               
                                <td><?php echo $r->status; ?></td>                               
                                 
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
        <td width="65%">&nbsp;</td>
        <td width="35%" align="center">Bandarlampung, <?php echo date('Y-m-d');?></td>
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