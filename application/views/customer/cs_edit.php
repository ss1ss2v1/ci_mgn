<!doctype html>
<!--[if lt IE 7 ]><html lang="en" class="no-js ie6"><![endif]-->
<!--[if IE 7 ]><html lang="en" class="no-js ie7"><![endif]-->
<!--[if IE 8 ]><html lang="en" class="no-js ie8"><![endif]-->
<!--[if IE 9 ]><html lang="en" class="no-js ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en" class="no-js"><!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title><?php echo 'Mahakarya Gemilang Nusantara' ?></title>
	<meta name="description" content="Sistem Akuntansi PT. Mahakarya Gemilang Nusantara"/> 
	<meta name="keywords" content=""/>
	<?php $this->load->view('include/my_head'); ?> 
	<link rel="stylesheet" href="<?php echo base_url() . 'includes/css/'; ?>mgn-01.css" />    
	
</head>
<body>

    <?php $this->load->view('include/scripts'); ?> 
	<?php $this->load->view('include/header'); ?> 



<div id="container">
	<h1>Ubah Pelanggan</h1>
	<div id="entry_header">
        <form id="frm_edit_cs" method="POST" action="<?php echo base_url().'c_customer/edit'; ?>">
        <ul>
            <li><label>Kode Pelanggan:</label><span style="font-weight: bold;"><?php echo $rvh['Customer_Kode']; ?></span></li>
            <li><label>Nama Perusahaan:</label><input title="Isi Perusahaan Pelanggan)" type="text" name="Customer_Perusahaan" id="Customer_Perusahaan" maxlength="20" style="width:150px;" value="<?php echo set_value('Customer_Perusahaan', $rvh['Customer_Perusahaan']);?>"  <?php echo (form_error('Customer_Perusahaan')!=false) ? 'style="background:#f5c8c8"' : ''; ?>  /></li>
            <?php if (form_error('Customer_Perusahaan')!=false) { ?>
            <li><label></label><?php echo form_error('Customer_Perusahaan', '<span class="err_text">', '</span>'); ?></li>
            <?php } ?>  
            <li><label>Nama Kontak:</label><input title="Isi Kontak Pelanggan)" type="text" name="Customer_Kontak" id="Customer_Kontak" maxlength="20" style="width:150px;" value="<?php echo set_value('Customer_Kontak', $rvh['Customer_Kontak']);?>" /></li>
            <li><label>Alamat:</label><input title="Isi Alamat Pelanggan)" type="text" name="Customer_Alamat" id="Customer_Alamat" maxlength="20" style="width:150px;" value="<?php echo set_value('Customer_Alamat', $rvh['Customer_Alamat']);?>" /></li>
            <li><label>Kota:</label><input title="Isi Kota Pelanggan)" type="text" name="Customer_Kota" id="Customer_Kontak" maxlength="20" style="width:150px;" value="<?php echo set_value('Customer_Kota', $rvh['Customer_Kota']);?>" /></li>          
            <li><label>Kode Pos:</label><input title="Isi Kode Pos Pelanggan)" type="text" name="Customer_Kode_Pos" id="Customer_Kode_Pos" style="width:150px;" maxlength="20" value="<?php echo set_value('Customer_Kode_Pos', $rvh['Customer_Kode_Pos']);?>" /></li>  
            <li><label>Telepon 1:</label><input title="Isi Telepon 1)" type="text" name="Customer_Telepon_1" id="Customer_Telepon_1" maxlength="20" style="width:150px;" value="<?php echo set_value('Customer_Telepon_1', $rvh['Customer_Telepon_1']);?>" /></li>
            <li><label>Telepon 2:</label><input title="Isi Telepon 2)" type="text" name="Customer_Telepon_2" id="Customer_Telepn_2" maxlength="20" style="width:150px;" value="<?php echo set_value('Customer_Telepon_2', $rvh['Customer_Telepon_2']);?>" /></li>
            <li><label>Nomor Fax:</label><input title="Isi Nomor Fax)" type="text" name="Customer_Fax" id="Customer_Fax" maxlength="20" style="width:150px;" value="<?php echo set_value('Customer_Fax', $rvh['Customer_Fax']);?>" /></li>
            <li><label>Email:</label><input title="Isi Kontak Pelanggan)" type="text" name="Customer_Email" id="Customer_Email" maxlength="20" style="width:150px;" value="<?php echo set_value('Customer_Email', $rvh['Customer_Email']);?>" /></li>
            <li><label>Pakai Pajak</label>
            <input title="Isi Pajak Ya" type="radio" name="Customer_Pakai_Pajak" id="Customer_Pakai_Pajak" style="width:35px;" value="1" <?php echo set_radio('Customer_Pakai_Pajak', '1',($rvh['Customer_Pakai_Pajak']==1) ? true : false); ?> />Ya
            <input title="Isi Pajak Tidak" type="radio" name="Customer_Pakai_Pajak" id="Customer_Pakai_Pajak" style="width:35px;" value="0"<?php echo set_radio('Customer_Pakai_Pajak', '0',($rvh['Customer_Pakai_Pajak']==0) ? true : false ); ?>  />Tidak
            </li>
            <li><label>Nomor NPWP:</label><input title=" Isi NPWP)" type="text" name="Customer_NPWP" id="Customer_NPWP" maxlength="20" style="width:150px;" value="<?php echo set_value('Customer_NPWP', $rvh['Customer_NPWP']);?>" /></li>
            <li><label>Nomor PKP:</label><input title="Isi PKP)" type="text" name="Customer_PKP" id="Customer_PKP" maxlength="20" style="width:150px;" value="<?php echo set_value('Customer_PKP', $rvh['Customer_PKP']);?>" /></li>
            <li><label>Alamat Pajak:</label><input title="Alamat Pajak)" type="text" name="Customer_Alamat_Pajak" id="Customer_Alamat_Pajak" maxlength="20" style="width:150px;" value="<?php echo set_value('Customer_Alamat_Pajak', $rvh['Customer_Alamat_Pajak']);?>" /></li>
            <li><label>Tanggal PKP:</label><input title="Isi Tanggal PKP)" type="text" name="Customer_Tanggal_PKP" id="Customer_Tanggal_PKP" maxlength="20" style="width:150px;" value="<?php echo set_value('Customer_Tanggal_PKP', $rvh['Customer_Tanggal_PKP']);?>" /></li>          
                <label></label>
                <input type="submit" value="Ubah" name="simpan" style="width:75px;" />
                <input type="reset" value="Batal" name="batal"  style="width:75px;" onclick="history.back();" />
            </li>
            <input type="hidden" name="Customer_Kode" value="<?php echo $rvh['Customer_Kode']; ?>" />
        </ul>
        </form>
    </div>
</div>
<script>
    $("#Customer_Tanggal_PKP" ).change( function() {
        $("#Customer_Tanggal_PKP" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
    });
        
    $(function() { 
        $("#Customer_Tanggal_PKP" ).datepicker(); 
         });    
    
</script>
</body>
</html>