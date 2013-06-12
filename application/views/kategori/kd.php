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
	<h1>Tambah Kategori</h1>
    <form id="frm_add_cs" method="POST" action="<?php echo base_url().'c_kategori/add_new'; ?>">
	<div id="entry_header">
            <ul>
            <li><label>Kode Kategori:</label><input title="Isi Kode Kategori" type="text" name="Kode_Kategori" id="Kode_Kategori" maxlength="20" style="width:150px;"value="<?php echo set_value('Kode_Kategori', '');?>" <?php echo (form_error('Kode_Kategori')!=false) ? 'style="background:#f5c8c8"' : ''; ?> /></li>
            <?php if (form_error('Kode_Kategori')!=false) { ?>
            <li><label></label><?php echo form_error('Kode_Kategori', '<span class="err_text">', '</span>'); ?></li>
            <?php } ?>   
            <li><label>Nama Kategori:</label><input title="Isi Nama Kategori" type="text" name="Nama_Kategori" id="Nama_Kategori" maxlength="20" style="width:150px;"value="<?php echo set_value('Nama_Kategori', '');?>" <?php echo (form_error('Nama_Kategori')!=false) ? 'style="background:#f5c8c8"' : ''; ?> /></li>
            <li><label>Kelompok Kategori:</label><input title="Isi Kelompok Kategori" type="text" name="Kelompok_Kategori" id="Kelompok_Kategori" maxlength="20" style="width:150px;"value="<?php echo set_value('Kelompok_Kategori', '');?>" <?php echo (form_error('Kelompok_Kategori')!=false) ? 'style="background:#f5c8c8"' : ''; ?> /></li>
            
            
                <label></label>
                <input type="submit" value="Simpan" name="simpan" style="width:75px;"/>
                <input type="reset" value="Batal" name="batal" style="width:75px;" onclick="history.back();" />
        </ul>
    </div>  
</body>
</html>