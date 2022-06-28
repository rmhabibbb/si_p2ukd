<html><head><style type="text/css">.wrapper-page {
    page-break-after: always;
}

.wrapper-page:last-child {
    page-break-after: avoid;
}</style></head><body style="width: 100%; font-size: 12px; font-family: 'Times New Roman'; padding: 0.5in 0.5in;">
    
    <div class="wrapper-page">
    <h1 style="font-size: 14px; text-align: center;"><u>SURAT PERNYATAAN</u></h1>
    <br><br>
    <p >Saya yang bertanda tangan dibawah  ini : </p>
    <table >
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td><?=$profil->nama_petugas?></td>
        </tr>
        <tr>
            <td>Tempat, Tanggal Lahir</td>
            <td>:</td>
            <td><?=$profil->tempat_lahir?>, <?=date('j', strtotime($profil->tanggal_lahir))?> <?=$this->Laporan_m->get_namabulan(date('m', strtotime($profil->tanggal_lahir)))?> <?=date('Y', strtotime($profil->tanggal_lahir))?></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td><?=$profil->alamat?>, RT. <?=$profil->rt?>, RW. <?=$profil->rw?>, kec. <?=$profil->kecamatan?>, kel. <?=$profil->kelurahan?>, <?=$profil->kabupaten?></td>
        </tr>
        <tr>
            <td>Wilyah Tugas</td>
            <td>:</td>
            <td><?=$profil->wilayah_tugas?></td>
        </tr>
    </table>
    <br><br>
    <p style="text-align: justify;text-indent: 50px;">Dengan ini menyatakan dengan sebenarnya bahwa saya sebagai Petugas Penghubung Urusan Keagamaan Desa/Kelurahan, Berdasarkan Keputusan Gubernur Sumatera Selatan Nomor 761/KPTS/III/2018 (sesuai SK) Tanggal 31 Desember 2018. Telah melaksanakan tugas sebagai P2UKD sejak 1 Januari 2021.</p>
    <br>
     <p style="text-align: justify;text-indent: 50px;">Demikian Surat Pernyataan ini saya buat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya.</p>
     <br><br>
     <table width="100%">
        <tr>
            <td style="width: 30%"></td>
            <td style="width: 40%"></td> 
            <td style="width: 30%">
                <p>Palembang, <?=date('j')?> <?=$this->Laporan_m->get_namabulan(date('m'))?> <?=date('Y')?><br>Yang Menyatakan,</p></td>
        </tr> 
         
        </table>
     <br> <br> <br><br><br><br>
     <table width="100%">
        <tr>
            <td style="width: 30%"></td>
            <td style="width: 40%"></td> 
            <td style="width: 30%">
                <p><?=$profil->nama_petugas?></p></td>
        </tr>
     </table>
     <table width="100%">
        <tr>
            <td style="width: 30%"></td>
            <td style="width: 40%; text-align: center;">Mengetahui,</td>  
            <td style="width: 30%"></td>  
        </tr>
     </table> 
     <table width="100%">
        <tr>
            <td style="width: 30%">Kepala KUA</td>
            <td style="width: 40%; text-align: center;"></td>  
            <td style="width: 30%">Kepala Desa/Kelurahan</td>  
        </tr>
        <tr>
            <td style="width: 30%">Kecamatan <?=$profil->kecamatan?>,</td>
            <td style="width: 40%; text-align: center;"></td>  
            <td style="width: 30%"><?=$profil->kelurahan?>,</td>  
        </tr>
     </table> 
     <br> <br> <br><br><br><br>
      <table width="100%">
        <tr>
            <td style="width: 30%"><u>........................................</u></td>
            <td style="width: 40%; text-align: center;"></td>  
            <td style="width: 30%"><u>........................................</u></td>
        </tr> 
        <tr>
            <td style="width: 30%">NIP.</td>
            <td style="width: 40%; text-align: center;"></td>  
            <td style="width: 30%">NIP.</td>
        </tr> 
     </table> 
     <br><br> <br> 
     <p>Keterangan : <br>
    Asli dikirim ke Biro Kesra Sumsel<br>
    Fotocopy untuk Arsip :<br>
    1.  KUA Kecamatan<br>
    2.  Desa/Kelurahan<br>
    3.  Yang bersangkutan<br>
    </p>  
</div>
	<?php foreach ($laporan as $row) { 
		$list_kegiatan = $this->Kegiatan_m->get(['id_laporan' => $row->id_laporan]);
	?>
    <div class="wrapper-page"> 
    	<h1 style="font-size: 14px; text-align: center;"><u>LAPORAN KEGIATAN<br>PETUGAS PENGHUBUNG URUSAN KEAGAMAAN DESA/KELURAHAN (P2UKD)</u></h1>
    	<br><br><br>
    	 <table >
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td><?=$profil->nama_petugas?></td>
        </tr>
         <tr>
            <td>Tempat Tugas</td>
            <td>:</td>
            <td><?=$profil->wilayah_tugas?></td>
        </tr>
        <tr>
            <td>Kabupaten/Kota</td>
            <td>:</td>
            <td><?=$profil->kabupaten?></td>
        </tr>
        <tr>
            <td>Laporan Bulan</td>
            <td>:</td>
            <td><?=$this->Laporan_m->get_namabulan($row->bulan)?> <?=$row->tahun?></td>
        </tr>
       
    </table>

    <br><br><br>

    <table border="1"  style="border-collapse: collapse;" width="100%">
    	<tr >
    		<th>NO</th>
    		<th>Hari, Tanggal</th>
    		<th>Uraian Kegiatan</th>
    		<th>Keterangan</th>
    	</tr>
    	<?php $i = 1; foreach ($list_kegiatan as $k) { ?>
    		
    		<tr>
	    		<td style="padding: 10px; text-align: center;"><?=$i++?></td>
	    		<td style="padding: 10px"><?= $this->Kegiatan_m->get_tgl($k->tanggal_kegiatan) ?></td>
	    		<td style="padding: 10px"><?= $k->nama_kegiatan ?></td>
                <td style="padding: 10px"><?= $k->keterangan ?></td>
	    	</tr>
    	<?php  } ?>
    </table>

     <table width="100%">
        <tr>
            <td style="width: 30%"></td>
            <td style="width: 40%"></td> 
            <td style="width: 30%">
                <p>Palembang, <?=date('j')?> <?=$this->Laporan_m->get_namabulan(date('m'))?> <?=date('Y')?><br>P2UKD/K,</p></td>
        </tr> 
         
        </table>
     <br> <br> <br><br><br><br>
     <table width="100%">
        <tr>
            <td style="width: 30%"></td>
            <td style="width: 40%"></td> 
            <td style="width: 30%">
                <p><?=$profil->nama_petugas?></p></td>
        </tr>
     </table>
     <table width="100%">
        <tr>
            <td style="width: 30%"></td>
            <td style="width: 40%; text-align: center;">Mengetahui,</td>  
            <td style="width: 30%"></td>  
        </tr>
     </table> 
     <table width="100%">
        <tr>
            <td style="width: 30%">Kepala KUA</td>
            <td style="width: 40%; text-align: center;"></td>  
            <td style="width: 30%">Kepala Desa/Kelurahan</td>  
        </tr>
        <tr>
            <td style="width: 30%">Kecamatan <?=$profil->kecamatan?>,</td>
            <td style="width: 40%; text-align: center;"></td>  
            <td style="width: 30%"><?=$profil->kelurahan?>,</td>  
        </tr>
     </table> 
     <br> <br> <br><br><br><br>
      <table width="100%">
        <tr>
            <td style="width: 30%"><u>........................................</u></td>
            <td style="width: 40%; text-align: center;"></td>  
            <td style="width: 30%"><u>........................................</u></td>
        </tr> 
        <tr>
            <td style="width: 30%">NIP.</td>
            <td style="width: 40%; text-align: center;"></td>  
            <td style="width: 30%">NIP.</td>
        </tr> 
     </table> 
    </div>


	<?php } ?>
</body></html>