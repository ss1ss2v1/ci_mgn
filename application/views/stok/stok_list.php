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
	<h1>Daftar Stok</h1>
	<div id="data_header">
        <span onclick="f_add_stk()" class="my_css_flat_button_mini" style="margin-left:5px; margin-bottom:0px;" title="Tambah stok baru">Tambah</span>    
        <ul>
            <li style="margin-right:5px; height:24px; background: black; color: white;">
                <ul>
                    <li class="tb_col_head" style="width:12px;"></li>
                    <li class="tb_col_head" style="width:12px;"></li>
                    <li class="tb_col_head" style="width:50px;">Kode Stok</li>
                    <li class="tb_col_head" style="width:100px;">Nama Stok</li>
                    <li class="tb_col_head" style="width:90px;">Deskripsi</li>
                    <li class="tb_col_head" style="width:90px;">Satuan</li>
                    <li class="tb_col_head" style="width:90px;">Kelompok Stok</li>
                    <li class="tb_col_head" style="width:90px;">Kode Kategori</li>
                    <li class="tb_col_head" style="width:90px;">Minimum Order</li>
                    <li class="tb_col_head" style="width:90px;">Waktu Pengiriman</li>
                    <li class="tb_col_head" style="width:90px;">Jam Pengerjaan</li>
                    <li class="tb_col_head" style="width:120px;">Jumlah Tenaga Kerja</li>
                    <li class="tb_col_head" style="width:90px;">Kode Stok Induk</li>
                </ul>
            </li>
        <?php 
        if($stk_headers) {
        foreach ($stk_headers as $stk_header) { 
            $k = preg_replace('~[!"#\$%&/\(\)=\?\*\+\-\.,;:_\']~', '', $stk_header['STK_Kode_Stok']); ?>
            <li id="stk_<?php echo $k; ?>" class="tb_row" style="margin-right:5px; height:20px;">
                <ul class="data_row" style="height:25px;">
                    <li class="tb_col" style="width:12px;"><img src="<?php echo base_url().'includes/icons/'; ?>cross_10.png" title="Hapus data" alt="Hapus data" id="stk_del_<?php echo $k; ?>"  onclick="f_del_stk('<?php echo $stk_header['STK_Kode_Stok'] ?>')" style="cursor:pointer;"/></li>
                    <li class="tb_col" style="width:12px;"><a href="<?php echo base_url().'c_stok/edit?stk='.$stk_header['STK_Kode_Stok']; ?>" ><img src="<?php echo base_url().'includes/icons/'; ?>edit_10.png" title="Edit data" alt="Edit data" id="stk_edit_<?php echo $k; ?>" onclick="f_edit_stk(<?php echo $stk_header['STK_Kode_Stok'] ?>)" style="cursor:pointer;"/></a></li>
                    <li class="tb_col" style="width:50px;"><?php echo $stk_header['STK_Kode_Stok']; ?></li>
                    <li class="tb_col" style="width:100px;"><?php echo $stk_header['STK_Nama_Stok']; ?></li>
                    <li class="tb_col" style="width:90px;"><?php echo $stk_header['STK_Deskripsi']; ?></li>
                    <li class="tb_col" style="width:90px;"><?php echo $stk_header['STK_Satuan']; ?></li>
                    <li class="tb_col" style="width:90px;"><?php echo $stk_header['STK_Kelompok_Stok']; ?></li>
                    <li class="tb_col" style="width:90px;"><?php echo $stk_header['STK_Kode_Kategori']; ?></li>
                    <li class="tb_col" style="width:90px;"><?php echo $stk_header['STK_Minimum_Order']; ?></li>
                    <li class="tb_col" style="width:90px;"><?php echo $stk_header['STK_Waktu_Pengiriman']; ?></li>
                    <li class="tb_col" style="width:90px;"><?php echo $stk_header['STK_Jam_Pengerjaan']; ?></li>
                    <li class="tb_col" style="width:120px;"><?php echo $stk_header['STK_Jumlah_Tenaga_Kerja']; ?></li>
                    <li class="tb_col" style="width:90px;"><?php echo $stk_header['STK_Kode_Stok_Induk']; ?></li>
                </ul>
                <div id="stk_container_<?php echo  $stk_header['STK_Kode_Stok']; ?>" class="stk_container">
                </div>
            </li>
        <?php }} ?>
        </ul>
    </div>
    <div id="dialog-confirm" title="Hapus Stok" style="font-size: 11px; display: none;">
        <p><span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span>Stok  ini akan dihapus dan tidak dapat dipanggil kembali. Yakin ?</p>
    </div>    
</div>
<script>
   function f_add_stk() 
   { 
        window.location="<?php echo base_url().'c_stok/add_new'; ?>";
   }
   
   function f_del_stk(v)
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
                            url: "<?php echo base_url().'c_stok/ajax_delete_stok?stk='; ?>"+v, 
                            success: function(data) 
                            { 
                                if (data.result) { $('#stk_'+data.target).remove(); alert("Data Berhasil Dihapus"); } 
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