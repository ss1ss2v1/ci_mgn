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

	<h1>Daftar Rekening Akuntansi</h1>
	<div id="account">
        <ul>
            <li style="margin-right:5px; height:24px; background: black; color: white;">
                <ul>
                    <li class="tb_col_head" style="width:20px"></li>
                    <li class="tb_col_head" style="width:10%">Tipe</li>
                    <li class="tb_col_head" style="width:20%">Nama Tipe</li>
                </ul>
            </li>
        <?php foreach ($account_type as $acc) { ?>
            <li class="tb_row" style="margin-right:5px;">
                <ul >
                    <li class="tb_col" style="width:20px"><img src="<?php echo base_url().'includes/icons/'; ?>view_sidetree_10.png" title="Buka/Tutup" alt="Buka/Tutup" id="view_sidetree" onclick="f_view_sidetree(<?php echo $acc['Account_Type'] ?>)" style="cursor:pointer;"/></li>
                    <li class="tb_col" style="width:10%"><?php echo $acc['Account_Type'] ?></li>
                    <li class="tb_col" style="width:30%"><?php echo $acc['Account_Type_Name'] ?></li>
                </ul>
                <div id="acc_list_container_<?php echo $acc['Account_Type']; ?>" class="account_detail_list">
                    Lorem Item
                </div>
            </li>
        <?php } ?>
        </ul>
    </div>
</div>
<script>
   function f_view_sidetree(t) 
   { 
        if ($('#acc_list_container_'+t).is(':visible')) { $('#acc_list_container_'+t).hide('slow'); } else
        {
        var jq = $.get("<?php echo base_url().'account/ajax_get_acc_list?t='; ?>" + t, function(data){
                if (data.result) { $('#acc_list_container_'+t).empty().append(data.message); $('#acc_list_container_'+t).show('normal');} else alert('gagal membuka halaman');}, "json") ; }
    }    
</script>

</body>
</html>