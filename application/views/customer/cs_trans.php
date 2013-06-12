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
    <?php $this->load->helper('form'); ?>


<div id="container">
	<h1>View Pelanggan</h1>
    <form id="frm_trans_cs" method="POST" action="">
	<div id="entry_header">
        <form id="frm_trans_cs" method="POST" action="">
        <ul>
            <li><label>Kode Pelanggan:</label><span style="font-weight: bold;"><?php echo $rvh['Customer_Kode']; ?></span></li>
            <li><label>Perusahaan:</label><span style="font-weight: bold;"><?php echo $rvh['Customer_Perusahaan']; ?></span></li>
            <li><label>Kontak:</label><span style="font-weight: bold;"><?php echo $rvh['Customer_Kontak']; ?></span></li>
            <li><label>Alamat:</label><span style="font-weight: bold;"><?php echo $rvh['Customer_Alamat']; ?></span></li>
            <li><label>Kode Pos:</label><span style="font-weight: bold;"><?php echo $rvh['Customer_Kode_Pos']; ?></span></li>
            <li><label>Email:</label><span style="font-weight: bold;"><?php echo $rvh['Customer_Email']; ?></span></li>
            <li><label>Telepon 1:</label><span style="font-weight: bold;"><?php echo $rvh['Customer_Telepon_1']; ?></span></li>
            <li><label>Telepon 2:</label><span style="font-weight: bold;"><?php echo $rvh['Customer_Telepon_2']; ?></span></li>
            <li><label>Fax:</label><span style="font-weight: bold;"><?php echo $rvh['Customer_Fax']; ?></span></li>
            <li><label>Pakai Pajak:</label><span style="font-weight: bold;"><?php echo $rvh['Customer_Pakai_Pajak']; ?></span></li>
            <li><label>NPWP:</label><span style="font-weight: bold;"><?php echo $rvh['Customer_NPWP']; ?></span></li>
            <li><label>Alamat Pajak:</label><span style="font-weight: bold;"><?php echo $rvh['Customer_Alamat_Pajak']; ?></span></li>
            <li><label>Tanggal PKP:</label><span style="font-weight: bold;"><?php echo $rvh['Customer_Tanggal_PKP']; ?></span></li>
            </ul>
        </form>
    </div>
    <div id="entry_detail">
    
     <ul class="tb_head">
            <li id="tb_head_spacer" class="tb_col_head" style="width:2px"></li>
            <li id="tb_head_Tanggal_Transaksi" class="tb_col_head tb_col_Tanggal_Transaksi" style="width:120px;">Tanggal Transaksi</li>
            <li id="tb_head_Periode" class="tb_col_head tb_col_Periode" style="width:50px;">Periode</li>
            <li id="tb_head_Jenis_Transaksi" class="tb_col_head tb_col_Jenis_Transaksi" style="width:90px;">Jenis Transaksi</li>
            <li id="tb_head_Nilai_Transaksi_IDR" class="tb_col_head tb_col_Nilai_Transaksi_IDR" style="width:90px;">Nilai Transaksi IDR</li>
            <li id="tb_head_Kode_Referensi_1" class="tb_col_head tb_col_Kode_Referensi_1" style="width:90px;">Kode Referensi 1</li>
            <li id="tb_head_Kode_Referensi_2" class="tb_col_head tb_col_Kode_Referensi_2" style="width:90px;">Kode Referensi 2</li>
            <li id="tb_head_Kode_Referensi_3" class="tb_col_head tb_col_Kode_Referensi_3" style="width:90px;">Kode Referensi 3</li>
            <li id="tb_head_Unit_Code" class="tb_col_head tb_col_Unit_Code" style="width:90px;">Unit Code</li>
        </ul>
        
        <?php foreach ($rvds as $rvd) { ?>
                <ul id="d_row_" class="tb_row" style="border-bottom: 1px dotted black; ">
                    <li class="tb_col" style="width:2px;"></li>
                    <li class="tb_col" style="width:120px;"><?php echo $rvd['Tanggal_Transaksi']  ?></li>
                    <li class="tb_col" style="width:50px;"><?php echo $rvd['Periode']  ?></li>
                    <li class="tb_col" style="width:90px;"><?php echo $rvd['Jenis_Transaksi']  ?></li>
                    <li class="tb_col" style="width:90px;"><?php echo $rvd['Nilai_Transaksi_IDR']  ?></li> 
                    <li class="tb_col" style="width:90px;"><?php echo $rvd['Kode_Referensi_1']  ?></li> 
                    <li class="tb_col" style="width:90px;"><?php echo $rvd['Kode_Referensi_2']  ?></li> 
                    <li class="tb_col" style="width:90px;"><?php echo $rvd['Kode_Referensi_3']  ?></li> 
                    <li class="tb_col" style="width:90px;"><?php echo $rvd['Unit_Code']  ?></li>                    
                </ul>               
                <?php } ?>
        <ul class="tb_head" id="tb_bot_total">
            <li id="tb_head_spacer" class="tb_col_head" style="width:2px"></li>
            <li id="tb_head_del" class="tb_col_head tb_col_del_icon"></li>
            <li id="tb_head_no" class="tb_col_head tb_col_nomor"></li>
            <li id="tb_head_referensi" class="tb_col_head tb_col_referensi"></li>
            <li id="tb_head_account" class="tb_col_head tb_col_account"></li>
            <li id="tb_head_unit" class="tb_col_head tb_col_unit"></li>
            <li id="tb_head_spacer" class="tb_col_head" style="width:0px"></li>
            <li id="tb_head_project" class="tb_col_head tb_col_project"></li>
            <li id="tb_head_identitas" class="tb_col_head tb_col_identitas"></li>
            <li id="tb_head_spacer" class="tb_col_head" style="width:0px"></li>
            <li id="tb_head_keterangan" class="tb_col_head tb_col_keterangan" ></li>
            <li id="tb_head_nominal" class="tb_col_head tb_col_nominal"></li>
        </ul>                           
    </div>
    <div style="margin-left:5px; margin-bottom:5px;">
        <input type="reset" value="Back" name="back" onclick="cancel_save()" />
    </div>
    </form>
    <div class="warning_box">Perhatian !! : Data dengan no rekening kosong atau rekening tidak dikenal atau memiliki nominal nol atau negatif tidak akan disimpan</div>         
</div>
<script>

    var nIndex=0; 
    Number.prototype.formatMoney = function(decPlaces, thouSeparator, decSeparator) { var n = this, decPlaces = isNaN(decPlaces = Math.abs(decPlaces)) ? 2 : decPlaces, decSeparator = decSeparator == undefined ? "." : decSeparator, thouSeparator = thouSeparator == undefined ? "," : thouSeparator, sign = n < 0 ? "-" : "", i = parseInt(n = Math.abs(+n || 0).toFixed(decPlaces)) + "", j = (j = i.length) > 3 ? j % 3 : 0; return sign + (j ? i.substr(0, j) + thouSeparator : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thouSeparator) + (decPlaces ? decSeparator + Math.abs(n - i).toFixed(decPlaces).slice(2) : ""); };     
    String.prototype.replaceAll = function( token, newToken, ignoreCase ) { var _token; var str = this + ""; var i = -1; if ( typeof token === "string" ) { if ( ignoreCase ) { _token = token.toLowerCase(); while( ( i = str.toLowerCase().indexOf( token, i >= 0 ? i + newToken.length : 0 ) ) !== -1 ) { str = str.substring( 0, i ) + newToken + str.substring( i + token.length ); } } else { return this.split( token ).join( newToken ); } } return str; }; 
    function f_onlyNumbers(e){ var keynum; var keychar; if(window.event) { keynum = e.keyCode; } if(e.which){ keynum = e.which; } if((keynum == 8 || keynum == 9 || keynum == 46 || (keynum >= 35 && keynum <= 40) || (e.keyCode >= 96 && e.keyCode <= 105))) return true; if(keynum == 110 || keynum == 190) { return true; } keychar = String.fromCharCode(keynum); return !isNaN(keychar); }
    function format(n, sep, decimals) { sep = sep || "."; decimals = decimals || 2; return n.toLocaleString().split(sep)[0] + sep + n.toFixed(decimals).split(sep)[1]; }    

    $(document).ready(function () { if ($('#RV_Dari').val() != '') { ai = $('#RV_Dari').val().split(' - '); $('#RV_Identitas').val(ai[0]); $('#RV_Nama_Identitas').val(ai[1]); } if ($('#RV_Project').val() != '') { ai = $('#RV_Project').val().split(' - '); $('#RV_Project_Contract_Number').val(ai[0]); $('#RV_Project_Name').val(ai[1]); } $("#RV_Tanggal" ).datepicker({defaultDate:new Date(<?php echo date( 'Y'); ?>, <?php echo date('m')-1; ?>, <?php echo date('d'); ?> ), dateFormat: 'yy-mm-dd'}); });

    function account_focus(n) { $('#account_'+n).hide(); $('#cbo_account_'+n).show().focus(); }
    function cbo_account_blur(n) { $('#cbo_account_'+n).hide(); $('#account_'+n).show(); ai = $('#cbo_account_'+n).val().split(' - '); $('#account_'+n).val(ai[0]); $('#account_name_'+n).empty().append(ai[1]); }
    function cbo_account_change(n) { ai = $('#cbo_account_'+n).val().split(' - '); $('#account_'+n).val(ai[0]); $('#account_name_'+n).empty().append(ai[1]); }    

    function unit_focus(n) { $('#unit_'+n).hide(); $('#cbo_unit_'+n).show().focus(); }
    function cbo_unit_blur(n) { $('#cbo_unit_'+n).hide(); $('#unit_'+n).show(); ai = $('#cbo_unit_'+n).val().split(' - '); $('#unit_'+n).val(ai[0]); $('#unit_name_'+n).empty().append(ai[1]); }
    function cbo_unit_change(n) { ai = $('#cbo_unit_'+n).val().split(' - '); $('#unit_'+n).val(ai[0]); $('#unit_name_'+n).empty().append(ai[1]); }    

    function project_focus(n) { $('#project_'+n).hide(); $('#cbo_project_'+n).show().focus(); }
    function cbo_project_blur(n) { $('#cbo_project_'+n).hide(); $('#project_'+n).show(); ai = $('#cbo_project_'+n).val().split(' - '); $('#project_'+n).val(ai[0]); $('#project_name_'+n).empty().append(ai[1]); }
    function cbo_project_change(n) { ai = $('#cbo_project_'+n).val().split(' - '); $('#project_'+n).val(ai[0]); $('#project_name_'+n).empty().append(ai[1]); }    

    function identitas_focus(n) { $('#identitas_'+n).hide(); $('#cbo_identitas_'+n).show().focus(); }
    function cbo_identitas_blur(n) { $('#cbo_identitas_'+n).hide(); $('#identitas_'+n).show(); ai = $('#cbo_identitas_'+n).val().split(' - '); $('#identitas_'+n).val(ai[0]); $('#identitas_nama_'+n).empty().append(ai[1]); }
    function cbo_identitas_change(n) { ai = $('#cbo_identitas_'+n).val().split(' - '); $('#identitas_'+n).val(ai[0]); $('#identitas_nama_'+n).empty().append(ai[1]); }    

    function f_add_rvd() { $('#add_rvd_icon').attr('src', '<?php echo base_url().'includes/images/fb-loader.gif'; ?>'); n = nIndex++; m = $('.Customer_Kode').length; $.ajax( { type: "GET", url: "<?php echo base_url().'c_customer/ajax_request_new_row?n='; ?>"+n, success: function(data) { if (data.result) { $('#tb_bot_total').before(data.newdata); n++; $('#referensi_'+n).val($('#RV_Referensi').val()); if (m>0) { $('#keterangan_'+n).val($('#keterangan_'+m).val()); $('#unit_'+n).val($('#unit_'+m).val()); $('#unit_name_'+n).empty().append($('#unit_name_'+m).text()); $('#project_'+n).val($('#project_'+m).val()); $('#project_name_'+n).empty().append($('#project_name_'+m).text()); $('#identitas_'+n).val($('#identitas_'+m).val()); $('#identitas_nama_'+n).empty().append($('#identitas_nama_'+m).text()); } else { ai = $('#RV_Unit_Code').val().split(' - '); $('#unit_'+n).val(ai[0]); $('#unit_name_'+n).empty().append(ai[1]); if ($('#RV_Project').val() != '') { ai = $('#RV_Project').val().split(' - '); $('#project_'+n).val(ai[0]); $('#project_name_'+n).empty().append(ai[1]); } if ($('#RV_Kepada').val() != '') { ai = $('#RV_Dari').val().split(' - '); $('#identitas_'+n).val(ai[0]); $('#identitas_nama_'+n).empty().append(ai[1]); } $('#keterangan_'+n).val($('#RV_Keterangan').val()); } $('#add_rvd_icon').attr('src', '<?php echo base_url().'includes/icons/add_10.png'; ?>'); $('#account_'+n).focus(); } else { alert(data.message); $('#add_rvd_icon').attr('src', '<?php echo base_url().'includes/icons/add_10.png'; ?>'); } }, error: function(data) { alert("Terjadi kesalahan"); $('#add_rvd_icon').attr('src', '<?php echo base_url().'includes/icons/add_10.png'; ?>'); }, dataType: 'json' }); }
    function cancel_save() {window.location="<?php echo base_url().'c_customer'; ?>"; }
    function f_del_rvd(n) { $('#d_row_'+n).remove(); hitung_total(); }
    
    function check_rekening(n) { $.ajax( { type: "GET", url: "<?php echo base_url().'account/ajax_get_account_name?a='; ?>"+$('#account_'+n).val(), success: function(data) { if (data.result) { $('#account_name_'+n).empty().append(data.newdata); } else { $('#account_name_'+n).empty().append('Tidak dikenal'); } }, error: function(data) { alert("Terjadi kesalahan"); }, dataType: 'json' }); }
    function check_unit(n) { $.ajax( { type: "GET", url: "<?php echo base_url().'profitcenter/ajax_get_unit_name?u='; ?>"+$('#unit_'+n).val(), success: function(data) { if (data.result) { $('#unit_name_'+n).empty().append(data.newdata); } else { $('#unit_name_'+n).empty().append('Tidak dikenal'); } }, error: function(data) { alert("Terjadi kesalahan"); }, dataType: 'json' }); }    
    function check_identitas(n) { $.ajax( { type: "GET", url: "<?php echo base_url().'identitas/ajax_get_identitas_name?i='; ?>"+$('#identitas_'+n).val(), success: function(data) { if (data.result) { $('#identitas_nama_'+n).empty().append(data.newdata); } else { $('#identitas_nama_'+n).empty().append('Umum/Tanpa identitas'); } }, error: function(data) { alert("Terjadi kesalahan"); }, dataType: 'json' }); }    
    function check_project(n) { $.ajax( { type: "GET", url: "<?php echo base_url().'project/ajax_get_project_name?p='; ?>"+$('#project_'+n).val(), success: function(data) { if (data.result) { $('#project_name_'+n).empty().append(data.newdata); } else { $('#project_name_'+n).empty().append('Non-Project'); } }, error: function(data) { alert("Terjadi kesalahan"); }, dataType: 'json' }); }    
        
    function hitung_total() { var sum = 0; $('.rupiah').each(function(){sum += parseFloat(this.value.replaceAll(',',''));}); $('#totalRupiah').empty().append(sum.formatMoney(2,',','.')); return sum; }    
    
    $("#RV_Project").change(function() { ai = $(this).val().split(' - '); $('#RV_Project_Contract_Number').val(ai[0]); $('#RV_Project_Name').val(ai[1]); });    
    $("#RV_Dari").change(function() { ai = $(this).val().split(' - '); $('#RV_Identitas').val(ai[0]); $('#RV_Nama_Identitas').val(ai[1]); });    
    //$("#RV_Tanggal" ).change( function() { $("#RV_Tanggal" ).datepicker( "option", "dateFormat", "yy-mm-dd" ); });        
        
    $(function() {$("#RV_Tanggal" ).datepicker(); }); 
    
</script>
    
</script>
</body>
</html>