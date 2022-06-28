<html><head><style type="text/css">div.page_break + div.page_break{
    page-break-before: always;
}</style></head><body style="width: 100%; font-size: 12px; font-family: 'Times New Roman'; padding: 0.5in 1in;">
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
    <div class="page_break"></div>
</body></html>