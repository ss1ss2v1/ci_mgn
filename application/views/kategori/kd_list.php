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
	<h1>Daftar Kategori</h1>
	<div id="data_header">
        <span onclick="f_add_kd()" class="my_css_flat_button_mini" style="margin-left:5px; margin-bottom:0px;" title="Tambah voucher baru">Tambah</span>    
        <ul>
            <li style="margin-right:5px; height:24px; background: black; color: white;">
                <ul>
                    <li class="tb_col_head" style="width:12px;"></li>
                    <li class="tb_col_head" style="width:12px;"></li>
                    <li class="tb_col_head" style="width:50px;">Kode</li>
                    <li class="tb_col_head" style="width:100px;">Nama Kategori</li>
                    <li class="tb_col_head" style="width:90px;">Kelompok Kategori</li>
                </ul>
            </li>
        <?php 
        if($kd_headers) {
        foreach ($kd_headers as $kd_header) { 
            $k = preg_replace('~[!"#\$%&/\(\)=\?\*\+\-\.,;:_\']~', '', $kd_header['Kode_Kategori']); ?>
            <li id="kd_<?php echo $k; ?>" class="tb_row" style="margin-right:5px; height:20px;">
                <ul class="data_row" style="height:25px;">
                    <li class="tb_col" style="width:12px;"><img src="<?php echo base_url().'includes/icons/'; ?>cross_10.png" title="Hapus data" alt="Hapus data" id="kd_del_<?php echo $k; ?>"  onclick="f_del_kd('<?php echo $kd_header['Kode_Kategori'] ?>')" style="cursor:pointer;"/></li>
                    <li class="tb_col" style="width:12px;"><a href="<?php echo base_url().'c_kategori/edit?kd='.$kd_header['Kode_Kategori']; ?>" ><img src="<?php echo base_url().'includes/icons/'; ?>edit_10.png" title="Edit data" alt="Edit data" id="kd_edit_<?php echo $k; ?>" onclick="f_edit_kd(<?php echo $kd_header['Kode_Kategori'] ?>)" style="cursor:pointer;"/></a></li>
                    <li class="tb_col" style="width:50px;"><?php echo $kd_header['Kode_Kategori']; ?></li>
                    <li class="tb_col" style="width:100px;"><?php echo $kd_header['Nama_Kategori']; ?></li>
                    <li class="tb_col" style="width:90px;"><?php echo $kd_header['Kelompok_Kategori']; ?></li>
                </ul>
                <div id="cs_container_<?php echo  $kd_header['Kode_Kategori']; ?>" class="cs_container">
                </div>
            </li>
        <?php }} ?>
        </ul>
    </div>
    <div id="dialog-confirm" title="Hapus Kategori" style="font-size: 11px; display: none;">
        <p><span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span>Kategori  ini akan dihapus dan tidak dapat dipanggil kembali. Yakin ?</p>
    </div>    
</div>
<script>
   function f_add_kd() 
   { 
        window.location="<?php echo base_url().'c_kategori/add_new'; ?>";
   }
   
   function f_del_kd(v)
   {
        $( "#dialog-confirm" ).dialog(      {
            resizable: false,
            height:160,
            width: 400,
            modal: true,
            buttons: {"Hapus kategori": function() 
                {
                    $( this ).dialog( "close" );
                    $.ajax( { type: "GET", 
                            url: "<?php echo base_url().'c_kategori/ajax_delete_kategori?kd='; ?>"+v, 
                            success: function(data) 
                            { 
                                if (data.result) { $('#kd_'+data.target).remove(); alert("Data Berhasil Dihapus"); } 
                                else 
                                { alert(data.message); } }, 
                            error: function(data) { alert("Terjadi kesalahan"); },
                            dataType: 'json' }); 
                },
                Cancel: function() {
                $( this ).dialog( "close" );
                },  
            }
        });
   }    
</script>

</body>
</html>