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
	<h1>Tambah Stok</h1>
    <form id="frm_add_stk" method="POST" action="<?php echo base_url().'c_stok/add_new'; ?>">
	<div id="entry_header">
            <ul>
            <li><label>Kode Stok:</label><input title="Isi Kode Stok" type="text" name="STK_Kode_Stok" id="STK_Kode_Stok" maxlength="20" style="width:150px;"value="<?php echo set_value('STK_Kode_Stok', '');?>" <?php echo (form_error('STK_Kode_Stok')!=false) ? 'style="background:#f5c8c8"' : ''; ?> /></li>
            <?php if (form_error('STK_Kode_Stok')!=false) { ?>
            <li><label></label><?php echo form_error('STK_Kode_Stok', '<span class="err_text">', '</span>'); ?></li>
            <?php } ?>  
            <li><label>Nama Stok:</label><input title="Isi Nama Stok" type="text" name="STK_Nama_Stok" id="STK_Nama_Stok" maxlength="20" style="width:150px;"value="<?php echo set_value('STK_Nama_Stok', '');?>" <?php echo (form_error('STK_Nama_Stok')!=false) ? 'style="background:#f5c8c8"' : ''; ?> /></li>
            <li><label>Deskripsi:</label><input title="Isi Deskripsi" type="text" name="STK_Deskripsi" id="STK_Deskripsi" maxlength="20" style="width:150px;"value="<?php echo set_value('STK_Deskripsi', '');?>" <?php echo (form_error('STK_Deskripsi')!=false) ? 'style="background:#f5c8c8"' : ''; ?> /></li>                              
            <li><label>Satuan:</label><input title="Isi Satuan" type="text" name="STK_Satuan" id="STK_Satuan" maxlength="20" style="width:150px;"value="<?php echo set_value('STK_Satuan', '');?>" <?php echo (form_error('STK_Satuan')!=false) ? 'style="background:#f5c8c8"' : ''; ?> /></li>
            <li><label>Kelompok Stok:</label><input title="Isi Kelompok Stok" type="text" name="STK_Kelompok_Stok" id="STK_Kelompok_Stok" maxlength="20" style="width:150px;"value="<?php echo set_value('STK_Kelompok_Stok', '');?>" <?php echo (form_error('STK_Kelompok_Stok')!=false) ? 'style="background:#f5c8c8"' : ''; ?> /></li>
            <li><label>Kode Kategori:</label><input title="Isi Kode Kategori" type="text" name="STK_Kode_Kategori" id="STK_Kode_Kategori" maxlength="20" style="width:150px;"value="<?php echo set_value('STK_Kode_Kategori', '');?>" <?php echo (form_error('STK_Kode_Kategori')!=false) ? 'style="background:#f5c8c8"' : ''; ?> /></li>
            <li><label>Minimum Order:</label><input title="Isi Minimum Order" type="text" name="STK_Minimum_Order" id="STK_Minimum_Order" maxlength="20" style="width:150px;"value="<?php echo set_value('STK_Minimum_Order', '');?>" <?php echo (form_error('STK_Minimum_Order')!=false) ? 'style="background:#f5c8c8"' : ''; ?> /></li>   
            <li><label>Waktu Pengiriman:</label><input title="Isi Waktu Pengiriman" type="text" name="STK_Waktu_Pengiriman" id="STK_Waktu_Pengiriman" maxlength="20" style="width:150px;"value="<?php echo set_value('STK_Waktu_Pengiriman', '');?>" <?php echo (form_error('STK_Waktu_Pengiriman')!=false) ? 'style="background:#f5c8c8"' : ''; ?> /></li>
            <li><label>Jam Pengerjaan:</label><input title="Isi Jam Pengerjaan" type="text" name="STK_Jam_Pengerjaan" id="STK_Jam_Pengerjaan" maxlength="20" style="width:150px;"value="<?php echo set_value('STK_Jam_Pengerjaan', '');?>" <?php echo (form_error('STK_Jam_Pengerjaan')!=false) ? 'style="background:#f5c8c8"' : ''; ?> /></li>
            <li><label>Jumlah Tenaga Kerja:</label><input title="Isi Jumlah Tenaga Kerja" type="text" name="STK_Jumlah_Tenaga_Kerja" id="STK_Jumlah_Tenaga_Kerja" maxlength="20" style="width:150px;"value="<?php echo set_value('STK_Jumlah_Tenaga_Kerja', '');?>" <?php echo (form_error('STK_Jumlah_Tenaga_Kerja')!=false) ? 'style="background:#f5c8c8"' : ''; ?> /></li>
            <li><label>Kode Stok Induk:</label><input title="Isi Kode Stok Induk" type="text" name="STK_Kode_Stok_Induk" id="STK_Kode_Stok_Induk" maxlength="20" style="width:150px;"value="<?php echo set_value('STK_Kode_Stok_Induk', '');?>" <?php echo (form_error('STK_Kode_Stok_Induk')!=false) ? 'style="background:#f5c8c8"' : ''; ?> /></li>
            
                <label></label>
                <input type="submit" value="Simpan" name="simpan" style="width:75px;"/>
                <input type="reset" value="Batal" name="batal" style="width:75px;" onclick="history.back();" />
        </ul>
    </div>   
    </form>
</div>
</body>
</html>