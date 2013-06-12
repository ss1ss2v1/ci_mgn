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
	<h1>Voucher Pengeluaran Kas/Bank</h1>
	<div id="data_header">
        <span onclick="f_add_rvh()" class="my_css_flat_button_mini" style="margin-left:5px; margin-bottom:0px;" title="Tambah voucher baru">Tambah</span>    
        <ul>
            <li style="margin-right:5px; height:24px; background: black; color: white;">
                <ul>
                    <li class="tb_col_head" style="width:73px;"></li>
                    <li class="tb_col_head" style="width:90px;">Nomor</li>
                    <li class="tb_col_head" style="width:60px;">Tanggal</li>
                    <li class="tb_col_head" style="width:130px;">Keterangan (Untuk)</li>
                    <li class="tb_col_head" style="width:50px;">Kepada</li>
                    <li class="tb_col_head" style="width:55px;">Referensi</li>
                    <li class="tb_col_head" style="width:60px; text-align: right;">Nominal</li>
                </ul>
            </li>
        <?php if ($rv_headers != false) { ?>         
        <?php foreach ($rv_headers as $rv_header) { $k = preg_replace('~[!"#\$%&/\(\)=\?\*\+\-\.,;:_\']~', '', $rv_header['PV_Nomor']); ?>
            <li id="rv_<?php echo $k; ?>" class="tb_row" style="margin-right:5px; height:20px;">
                <ul class="data_row" style="height:20px;">
                    <li class="tb_col" style="width:12px;"><img src="<?php echo base_url().'includes/icons/'; ?>cross_10.png" title="Hapus data" alt="Hapus data" id="rvh_del_<?php echo $k; ?>"  onclick="f_del_rvh('<?php echo $rv_header['PV_Nomor'] ?>')" style="cursor:pointer;"/></li>
                    <li class="tb_col" style="width:12px;"><a href="<?php echo base_url().'payment_voucher/edit?rv='.$rv_header['PV_Nomor']; ?>" ><img src="<?php echo base_url().'includes/icons/'; ?>edit_10.png" title="Edit data" alt="Edit data" id="rvh_edit_<?php echo $k; ?>" style="cursor:pointer;"/></a></li>
                    <li class="tb_col" style="width:12px;"><a href="<?php echo base_url().'payment_voucher/view?rv='.$rv_header['PV_Nomor']; ?>" ><img src="<?php echo base_url().'includes/icons/'; ?>view1.png" title="View data" alt="View data" id="rvh_edit_<?php echo $k; ?>" style="cursor:pointer;"/></a></li>
                    <li class="tb_col" style="width:12px;"><a href="<?php echo base_url().'payment_voucher/cetak?rv='.$rv_header['PV_Nomor']; ?>" ><img src="<?php echo base_url().'includes/icons/'; ?>print_icon.png" title="Print data" alt="Print data" id="rvh_edit_<?php echo $k; ?>" style="cursor:pointer;"/></a></li>
                    <li class="tb_col" style="width:85px;"><?php echo $rv_header['PV_Nomor']; ?></li>
                    <li class="tb_col" style="width:65px;"><?php echo date('d-m-Y', strtotime($rv_header['PV_Tanggal'])); ?></li>
                    <li class="tb_col" style="width:130px;"><?php echo $rv_header['PV_Keterangan']; ?></li>
                    <li class="tb_col" style="width:50px;"><?php echo $rv_header['PV_Identitas']; ?></li>
                    <li class="tb_col" style="width:55px;"><?php echo $rv_header['PV_Referensi']; ?></li>
                    <li class="tb_col" style="width:80px; text-align: right;"><?php echo 'Rp. ' . number_format($rv_header['PV_Total_Rupiah'], 2, ',', '.'); ?></li>
                </ul>
                <div id="rvh_container_<?php echo  $rv_header['PV_Nomor_Record']; ?>" class="rvh_container">
                </div>
            </li>
        <?php } } ?>
        </ul>
    </div>
    <div id="dialog-confirm" title="Hapus voucher" style="font-size: 11px; display: none;">
        <p><span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span>Voucher ini akan dihapus dan tidak dapat dipanggil kembali. Yakin ?</p>
    </div>    
</div>
<script>
   function f_add_rvh() 
   { 
        window.location="<?php echo base_url().'payment_voucher/add_new'; ?>";
   }
   
   function f_del_rvh(v)
   {
        $( "#dialog-confirm" ).dialog({
            resizable: false,
            height:160,
            width: 400,
            modal: true,
            buttons: {"Hapus voucher": function() 
                {
                    $( this ).dialog( "close" );
                    $.ajax( { type: "GET", 
                            url: "<?php echo base_url().'payment_voucher/ajax_delete_voucher?rv='; ?>"+v, 
                            success: function(data) 
                            { 
                                if (data.result) { $('#rv_'+data.target).remove(); alert("Data Berhasil Dihapus"); } 
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