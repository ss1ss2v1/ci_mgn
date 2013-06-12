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
	<h1>Daftar Pelanggan</h1>
	<div id="data_header">
        <span onclick="f_add_cs()" class="my_css_flat_button_mini" style="margin-left:5px; margin-bottom:0px;" title="Tambah voucher baru">Tambah</span>    
        <ul>
            <li style="margin-right:5px; height:24px; background: black; color: white;">
                <ul>
                    <li class="tb_col_head" style="width:12px;"></li>
                    <li class="tb_col_head" style="width:12px;"></li>
                    <li class="tb_col_head" style="width:12px;"></li>
                    <li class="tb_col_head" style="width:12px;"></li>
                    <li class="tb_col_head" style="width:12px;"></li>
                    <li class="tb_col_head" style="width:50px;">Kode</li>
                    <li class="tb_col_head" style="width:100px;">Perusahaan</li>
                    <li class="tb_col_head" style="width:90px;">Kontak</li>
                    <li class="tb_col_head" style="width:90px;">Kota</li>
                    <li class="tb_col_head" style="width:90px;">Telepon</li>
                    <li class="tb_col_head" style="width:90px;">Fax</li>
                    <li class="tb_col_head" style="width:150px;">Email</li>
                </ul>
            </li>
        <?php 
        if($cs_headers) {
        foreach ($cs_headers as $cs_header) { 
            $k = preg_replace('~[!"#\$%&/\(\)=\?\*\+\-\.,;:_\']~', '', $cs_header['Customer_Kode']); ?>
            <li id="cs_<?php echo $k; ?>" class="tb_row" style="margin-right:5px; height:20px;">
                <ul class="data_row" style="height:25px;">
                    <li class="tb_col" style="width:12px;"><img src="<?php echo base_url().'includes/icons/'; ?>cross_10.png" title="Hapus data" alt="Hapus data" id="cs_del_<?php echo $k; ?>"  onclick="f_del_cs('<?php echo $cs_header['Customer_Kode'] ?>')" style="cursor:pointer;"/></li>
                    <li class="tb_col" style="width:12px;"><a href="<?php echo base_url().'c_customer/edit?cs='.$cs_header['Customer_Kode']; ?>" ><img src="<?php echo base_url().'includes/icons/'; ?>edit_10.png" title="Edit data" alt="Edit data" id="cs_edit_<?php echo $k; ?>" onclick="f_edit_cs(<?php echo $cs_header['Customer_Kode'] ?>)" style="cursor:pointer;"/></a></li>
                    <li class="tb_col" style="width:12px;"><a href="<?php echo base_url().'c_customer/view?cs='.$cs_header['Customer_Kode']; ?>" ><img src="<?php echo base_url().'includes/icons/'; ?>view1.png" title="Lihat data" alt="Lihat data" id="cs_edit_<?php echo $k; ?>" onclick="f_edit_cs(<?php echo $cs_header['Customer_Kode'] ?>)" style="cursor:pointer;"/></a></li>
                    <li class="tb_col" style="width:12px;"><a href="<?php echo base_url().'c_customer/history?cs='.$cs_header['Customer_Kode']; ?>" ><img src="<?php echo base_url().'includes/icons/'; ?>ikon_history.png" title="History" alt="History" id="cs_edit_<?php echo $k; ?>" onclick="f_edit_cs(<?php echo $cs_header['Customer_Kode'] ?>)" style="cursor:pointer;"/></a></li>
                    <li class="tb_col" style="width:12px;"><a href="<?php echo base_url().'c_customer/account?cs='.$cs_header['Customer_Kode']; ?>" ><img src="<?php echo base_url().'includes/icons/'; ?>ikon_akun.png" title="Akun" alt="Akun" id="cs_edit_<?php echo $k; ?>" onclick="f_edit_cs(<?php echo $cs_header['Customer_Kode'] ?>)" style="cursor:pointer;"/></a></li>
                    <li class="tb_col" style="width:50px;"><?php echo $cs_header['Customer_Kode']; ?></li>
                    <li class="tb_col" style="width:100px;"><?php echo $cs_header['Customer_Perusahaan']; ?></li>
                    <li class="tb_col" style="width:90px;"><?php echo $cs_header['Customer_Kontak']; ?></li>
                    <li class="tb_col" style="width:90px;"><?php echo $cs_header['Customer_Kota']; ?></li>
                    <li class="tb_col" style="width:90px;"><?php echo $cs_header['Customer_Telepon_1']; ?></li>
                    <li class="tb_col" style="width:90px;"><?php echo $cs_header['Customer_Fax']; ?></li>
                    <li class="tb_col" style="width:150px;"><?php echo $cs_header['Customer_Email']; ?></li>
                </ul>
                <div id="cs_container_<?php echo  $cs_header['Customer_Nomor_Record']; ?>" class="cs_container">
                </div>
            </li>
        <?php }} ?>
        </ul> 
    </div>
    <div id="dialog-confirm" title="Hapus voucher" style="font-size: 11px; display: none;">
        <p><span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span>Pelanggan  ini akan dihapus dan tidak dapat dipanggil kembali. Yakin ?</p>
    </div>    
</div>
<script>
   function f_add_cs() 
   { 
        window.location="<?php echo base_url().'c_customer/add_new'; ?>";
   }
   
   function f_del_cs(v)
   {
        $( "#dialog-confirm" ).dialog({
            resizable: false,
            height:160,
            width: 400,
            modal: true,
            buttons: {"Hapus pelanggan": function() 
                {
                    $( this ).dialog( "close" );
                    $.ajax( { type: "GET", 
                            url: "<?php echo base_url().'c_customer/ajax_delete_customer?cs='; ?>"+v, 
                            success: function(data) 
                            { 
                                if (data.result) { $('#cs_'+data.target).remove(); } 
                                else 
                                { alert(data.message); } }, 
                            error: function(data) { alert("Terjadi kesalahan"); },
                            dataType: 'json' }); 
                },
                Cancel: function() {
                $( this ).dialog( "close" );
                } }
        });
   }    
</script>

</body>
</html>