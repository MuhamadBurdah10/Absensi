

<!DOCTYPE html>
<html>
<head>
  <title>Laporan Absensi</title>
  <style type="text/css">
   .upper { text-transform: uppercase; }
   .lower { text-transform: lowercase; }
   .cap   { text-transform: capitalize; }
   .small { font-variant:   small-caps; }

  /* #page{
   size: 8.27in 11.69in;
   margin: .5in .5in .5in;
   mso-header-margin: .5in;
   mso-paper-sourch: 0;
   }*/
  table{
      border-collapse: collapse;
      width: 100%;
      margin: 0;
  }
  table th{
      border:1px solid #000;
      padding: 3px;
      font-weight: bold;
      text-align: center;
  }
  table td{
      border:1px solid #000;
      padding: 2px;
      vertical-align: top;
       padding: 2px;
  }

  #tr{
  font-size: 10px;
  text-transform: capitalize;
}
s{

  font-size: 8px;
}
</style>
</head>
<div class="container-fluid">
<body onload="window.print();">
 <div id="page">
            <div class="mt-2">
             <div >
             <img src="<?php echo config_item('assets'); ?>mt/media/logo/logonya.png" style="padding:0 0 0 10px;  float:left;  width: 40px;"> <center><p class="mb-0 font-weight-" style="font-size: 13px">REKAP LAPORAN PRESENSI <br>
              PEMERINTAH KOTA BOGOR <br>KECAMATAN BOGOR TIMUR <br>Jl.Raya PajajaranNo.16 Telp. (0251) 8326773 Bogor 16143 </p></center>
             <!--  <hr class="line-title mt-0"> -->
             </div>
            </div>
          <p id='tr' class="mb-0"><?php 
          $awal= $tgl_awal ;
          $akhir= $tgl_akhir ;
          ?>
              Laporan Tanggal / Bulan :   <?php if ($awal == null ) { ?>
                        <?= date('d-m-Y') ?>
                      <?php }  
                       else { ?>
                        <span style="color: green; font-size: 13px">  <?=date('d-m-Y', strtotime($awal)); ?></span>
                      <?php  }?>

              S/d Tanggal / Bulan : 
                 <?php if ($akhir == null ) { ?>
                     <?= date('d-m-Y') ?>
                      <?php } else { ?>
                      <span style="color: green; font-size: 13px">  <?=date('d-m-Y', strtotime($akhir)); ?></span>
                      <?php  }?>
               </p>
            <table class="border" border="1" style="width:100% ">
                <thead>
                <tr id="tr" class="font-weight-bold">
                      <th >No</th>
                      <th style="width: 70px">Tanggal / Bulan</th>
                      <th style="width: 45px">Nama Pegawai</th>
                      <th style="width: 45px">Jumlah Masuk</th>
                     <!--  <td style="width: 45px">Jam Keluar</td> -->
                     <!--  <td>Jumlah Absen</td>    -->   
                </tr>
                </thead>
                <tbody>
                    <?php $no=1;
                     $jumlah=0;
                     foreach ($absen as $i) { 
                      $jumlah= $jumlah+$no; 
                     ?>  
                    <tr id='tr' style="">
                      <td style="width: 30px"><?= $no?></td>
                      <td style="width: 50px" ><?=date('m-Y', strtotime($i->tgl_absen )); ?></td>
                      <td style="width: 145px"><?=strtolower(ucwords( $i->nama_pegawai));?></td>
                      <td style="width: 50px" ><?=($i->jumlah ); ?></td>
                      <!--  <td style="width: 50px" ><?=($i->jam_keluar ); ?></td> -->
                    </tr>
                    <?php $no++; } ;
                    ?>
                    <!-- <tfoot>
                <tr>
                  <th id="tr">Jumlah Kehadiran</th>
                  <th id="tr" colspan="3"><?php echo number_format($jumlah); ?></th>
                </tr>  
               </tfoot>  --> 
                    
            </table>
            <br>
            <p>laporan Kegiatan</p>
             <table class="border" border="1" style="width:100% ">
                <thead>
                <tr>
                      <th>No</th>
                      <th>Tanggal Kegiatan</th>
                      <th>Nama Pegawai</th>
                      <th>Nama Kegiatan</th>
                      <th>Mulai Kegiatan</th>
                      <th>Selesai Kegiatan</th>
                      <th>Nilai</th>
                      <th>Status</th>
                     <!--  <th width="15%">Aksi</th> -->
                    </tr>
                </thead>
                <tbody>
                     <?php
                    $no = 1;
                    foreach ($kegiatan as $row) {
                      $status = $row->status_kegiatan;
                       $nilai=$row->nilai_kegiatan; 

                      ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $row->created_at; ?></td>
                        <td><?php echo ucfirst($row->nama_pegawai); ?></td>
                        <td><?php echo $row->nama_kegiatan; ?></td>
                        <td><?php echo $row->start_date; ?></td>
                        <td><?php echo $row->end_date; ?></td>
                        <!-- <td><a href="<?= site_url("karyawan/download/".$row->surat_kegiatan."/surat"); ?>">Lihat</a></td>
                        <td><?php echo $row->rincian_kegiatan; ?></td> -->
                       <?php if ($nilai == null) { ?>
                        <td><span class='badge badge-danger badge'>Belum Dinilai</span>    </td >
                      <?php  }else{ ?>
                        <td><?php echo $row->nilai_kegiatan; ?></td>
                       <?php }?>

                      <?php if ($status == '0' ) { ?>
                        <td><span class='badge badge-warning'>Pending</span> 
                      <?php } 
                       else { ?>
                        <td><span class='badge badge-primary'>Selesai</span> 
                      <?php  }?>
                        
                      </tr>
                    <?php
                      $no++;
                    }
                    ?>
            </table>

             <div class="card-header py-3">
               <div class="col-lg-6 mb-0 mb-lg-0 mr-5" style="float:right;">
                <h5>BOGOR, <?php echo(date('d-m-Y'));?>.<br>
                Manager<br> <br>
                 <img src="<?php echo config_item('assets'); ?>img/ttd.png" style="padding:0 0 0 0px;  float:left;  width: 100px;"> <br><br><br><br><br>
                <u>Rena da frina, SP. MM</u><br>
                </h5>
</div></div>


  </body>
  </div>
  </html>

