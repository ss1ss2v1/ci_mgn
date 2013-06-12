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
	<link rel="stylesheet" href="<?php echo base_url() . 'includes/css/'; ?>mgn-01.css" />    
	
</head>
<body>

    <?php $this->load->view('include/scripts'); ?> 
	
<div id="container">
	<h1>Print Voucher Penerimaan Kas/Bank</h1>
	<form id="frm_edit_rvh" method="POST" action="<?php echo base_url().'receipt_voucher/cetak'; ?>">
    <div id="entry_header">
        <ul>
            <li><label>Nomor Voucher:</label><span style="font-weight: bold;"><?php echo $rvh['RV_Nomor']; ?></span></li>
            <li><label>Tanggal:</label><?php echo $rvh['RV_Tanggal'];?></li>          
            <li><label>No Referensi:</label><?php echo $rvh['RV_Referensi'];?></li>
            <li><label>Diterima dari:</label><?php echo $rvh['RV_Dari'];?></li>
            <li><label>Identitas (baru) :</label><?php echo $rvh ['RV_Identitas'];?></li>           
            <li><label>Untuk:</label><?php echo $rvh['RV_Keterangan'];?></li>            
            <li><label>Rekening:</label><?php echo $rvh ['RV_Account_Number'];?></li>
            <li><label>Kode Unit Usaha:</label><?php echo $rvh ['RV_Unit_Code'];?></li>
        </ul>
    </div>
    <div id="entry_detail">
    <ul class="tb_head">
            <li id="tb_head_spacer" class="tb_col_head" style="width:4px"></li>
            <li id="tb_head_RVD_Nomor_Record" class="tb_col_head tb_col_nomor" style="width:48px;">No</li>
            <li id="tb_head_RVD_Nomor_Record" class="tb_col_head tb_col_nomor" style="width:60px;">Referensi</li>
            <li id="tb_head_RVD_Nomor_Record" class="tb_col_head tb_col_nomor" style="width:65px;">Rekening</li>
            <li id="tb_head_RVD_Nomor_Record" class="tb_col_head tb_col_nomor" style="width:35px;">Unit</li>
            <li id="tb_head_RVD_Nomor_Record" class="tb_col_head tb_col_nomor" style="width:60px;">Project</li>
            <li id="tb_head_RVD_Nomor_Record" class="tb_col_head tb_col_nomor" style="width:60px;">Identitas</li>
            <li id="tb_head_RVD_Nomor_Record" class="tb_col_head tb_col_nomor" style="width:78px;">Keterangan</li>
            <li id="tb_head_RVD_Nomor_Record" class="tb_col_head tb_col_nomor" style="width:75px;">Nominal</li>
        </ul>
        
        <?php foreach ($rvds as $rvd) { ?>
                <ul id="d_row_" class="tb_row" style="border-bottom: 1px dotted black; ">
                    <li class="tb_col" style="width:40px;"></li>
                    <li class="tb_col" style="width:25px;"><?php echo $rvd['RVD_Nomor_Urut']  ?></li>
                    <li class="tb_col" style="width:65px;"><?php echo $rvd['RVD_Nomor_Referensi']  ?></li>
                    <li class="tb_col" style="width:65px;"><?php echo $rvd['RVD_Nomor_Rekening_Lawan']  ?></li>                   
                    <li class="tb_col" style="width:45px;"><?php echo $rvd['RVD_Unit_Code_Lawan']  ?></li>                    
                    <li class="tb_col" style="width:50px;"><?php echo $rvd['RVD_Project_Contract_Number_Lawan']  ?></li>
                    <li class="tb_col" style="width:65px;"><?php echo $rvd['RVD_Identitas_Lawan']  ?></li>
                    <li class="tb_col" style="width:90px;"><?php echo $rvd['RVD_Keterangan']  ?></li>
                    <li class="tb_col" style="width:65px;"><?php echo $rvd['RVD_Rupiah']  ?></li>
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
            <li id="tb_head_project" class="tb_col_head tb_col_project" ></li>
            <li id="tb_head_identitas" class="tb_col_head tb_col_identitas"></li>
            <li id="tb_head_spacer" class="tb_col_head" style="width:0px"></li>
            <li id="tb_head_keterangan" class="tb_col_head tb_col_keterangan"></li>
            <li id="tb_head_nominal" class="tb_col_head tb_col_nominal"></li>
        </ul>                            
    </div>
    </form>
    <div class="warning_box">Perhatian !! : Data penerimaan ini bisa di cetak </div>      
</div>
<script>
    var nIndex=0; 
    Number.prototype.formatMoney = function(decPlaces, thouSeparator, decSeparator) { var n = this, decPlaces = isNaN(decPlaces = Math.abs(decPlaces)) ? 2 : decPlaces, decSeparator = decSeparator == undefined ? "." : decSeparator, thouSeparator = thouSeparator == undefined ? "," : thouSeparator, sign = n < 0 ? "-" : "", i = parseInt(n = Math.abs(+n || 0).toFixed(decPlaces)) + "", j = (j = i.length) > 3 ? j % 3 : 0; return sign + (j ? i.substr(0, j) + thouSeparator : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thouSeparator) + (decPlaces ? decSeparator + Math.abs(n - i).toFixed(decPlaces).slice(2) : ""); };     
    String.prototype.replaceAll = function( token, newToken, ignoreCase ) { var _token; var str = this + ""; var i = -1; if ( typeof token === "string" ) { if ( ignoreCase ) { _token = token.toLowerCase(); while( ( i = str.toLowerCase().indexOf( token, i >= 0 ? i + newToken.length : 0 ) ) !== -1 ) { str = str.substring( 0, i ) + newToken + str.substring( i + token.length ); } } else { return this.split( token ).join( newToken ); } } return str; }; 
    function f_onlyNumbers(e){ var keynum; var keychar; if(window.event) { keynum = e.keyCode; } if(e.which){ keynum = e.which; } if((keynum == 8 || keynum == 9 || keynum == 46 || (keynum >= 35 && keynum <= 40) || (e.keyCode >= 96 && e.keyCode <= 105))) return true; if(keynum == 110 || keynum == 190) { return true; } keychar = String.fromCharCode(keynum); return !isNaN(keychar); }    
    function format(n, sep, decimals) { sep = sep || "."; decimals = decimals || 2; return n.toLocaleString().split(sep)[0] + sep + n.toFixed(decimals).split(sep)[1]; }    

    $(document).ready(function () { if ($('#PV_Kepada').val() != '') { ai = $('#PV_Kepada').val().split(' - '); $('#PV_Identitas').val(ai[0]); $('#PV_Nama_Identitas').val(ai[1]); } if ($('#PV_Project').val() != '') { ai = $('#PV_Project').val().split(' - '); $('#PV_Project_Contract_Number').val(ai[0]); $('#PV_Project_Name').val(ai[1]); } $("#PV_Tanggal" ).datepicker({defaultDate:new Date(<?php echo date( 'Y'); ?>, <?php echo date('m')-1; ?>, <?php echo date('d'); ?> ), dateFormat: 'yy-mm-dd'}); });

    function f_add_rvd() { $('#add_rvd_icon').attr('src', '<?php echo base_url().'includes/images/fb-loader.gif'; ?>'); n = nIndex++; m = $('.no_urut').length; $.ajax( { type: "GET", url: "<?php echo base_url().'receipt_voucher/ajax_request_new_row?n='; ?>"+n, success: function(data) { if (data.result) { $('#tb_bot_total').before(data.newdata); n++; $('#referensi_'+n).val($('#PV_Referensi').val()); if (m>0) { $('#keterangan_'+n).val($('#keterangan_'+m).val()); $('#unit_'+n).val($('#unit_'+m).val()); $('#unit_name_'+n).empty().append($('#unit_name_'+m).text()); $('#project_'+n).val($('#project_'+m).val()); $('#project_name_'+n).empty().append($('#project_name_'+m).text()); $('#identitas_'+n).val($('#identitas_'+m).val()); $('#identitas_nama_'+n).empty().append($('#identitas_nama_'+m).text()); } else { ai = $('#PV_Unit_Code').val().split(' - '); $('#unit_'+n).val(ai[0]); $('#unit_name_'+n).empty().append(ai[1]); if ($('#PV_Project').val() != '') { ai = $('#PV_Project').val().split(' - '); $('#project_'+n).val(ai[0]); $('#project_name_'+n).empty().append(ai[1]); } if ($('#PV_Kepada').val() != '') { ai = $('#PV_Kepada').val().split(' - '); $('#identitas_'+n).val(ai[0]); $('#identitas_nama_'+n).empty().append(ai[1]); } $('#keterangan_'+n).val($('#PV_Keterangan').val()); } $('#add_rvd_icon').attr('src', '<?php echo base_url().'includes/icons/add_10.png'; ?>'); $('#account_'+n).focus(); } else { alert(data.message); $('#add_rvd_icon').attr('src', '<?php echo base_url().'includes/icons/add_10.png'; ?>'); } }, error: function(data) { alert("Terjadi kesalahan"); $('#add_rvd_icon').attr('src', '<?php echo base_url().'includes/icons/add_10.png'; ?>'); }, dataType: 'json' }); }
    function cancel_save() {window.location="<?php echo base_url().'receipt_voucher'; ?>"; }    
    function f_del_rvd(n) { $('#d_row_'+n).remove(); hitung_total(); }

    function account_focus(n) { $('#account_'+n).hide(); $('#cbo_account_'+n).show().focus(); }
    function cbo_account_blur(n) { $('#cbo_account_'+n).hide(); $('#account_'+n).show(); ai = $('#cbo_account_'+n).val()        .split(' - '); $('#account_'+n).val(ai[0]); $('#account_name_'+n).empty().append(ai[1]); }
    function cbo_account_change(n) { ai = $('#cbo_account_'+n).val().split(' - '); $('#account_'+n).val(ai[0]); $('             #account_name_'+n).empty().append(ai[1]); }    

    function unit_focus(n) { $('#unit_'+n).hide(); $('#cbo_unit_'+n).show().focus(); }
    function cbo_unit_blur(n) { $('#cbo_unit_'+n).hide(); $('#unit_'+n).show(); ai = $('#cbo_unit_'+n).val().split(' - '); $    ('#unit_'+n).val(ai[0]); $('#unit_name_'+n).empty().append(ai[1]); }
    function cbo_unit_change(n) { ai = $('#cbo_unit_'+n).val().split(' - '); $('#unit_'+n).val(ai[0]); $('#unit_name_'+n)       .empty().append(ai[1]); }    

    function project_focus(n) { $('#project_'+n).hide(); $('#cbo_project_'+n).show().focus(); }
    function cbo_project_blur(n) { $('#cbo_project_'+n).hide(); $('#project_'+n).show(); ai = $('#cbo_project_'+n).val()        .split(' - '); $('#project_'+n).val(ai[0]); $('#project_name_'+n).empty().append(ai[1]); }
    function cbo_project_change(n) { ai = $('#cbo_project_'+n).val().split(' - '); $('#project_'+n).val(ai[0]); $('             #project_name_'+n).empty().append(ai[1]); }    

    function identitas_focus(n) { $('#identitas_'+n).hide(); $('#cbo_identitas_'+n).show().focus(); }
    function cbo_identitas_blur(n) { $('#cbo_identitas_'+n).hide(); $('#identitas_'+n).show(); ai = $('#cbo_identitas_'+n)      .val().split(' - '); $('#identitas_'+n).val(ai[0]); $('#identitas_nama_'+n).empty().append(ai[1]); }
    function cbo_identitas_change(n) { ai = $('#cbo_identitas_'+n).val().split(' - '); $('#identitas_'+n).val(ai[0]); $('       #identitas_nama_'+n).empty().append(ai[1]); }    
    
    function check_rekening(n) { $.ajax( { type: "GET", url: "<?php echo base_url().'account/ajax_get_account_name?a='; ?>"     +$('#account_'+n).val(), success: function(data) { if (data.result) { $('#account_name_'+n).empty().append(data.newdata)    ; }      else { $('#account_name_'+n).empty().append('Tidak dikenal'); } }, error: function(data) { alert("Terjadi              kesalahan"); },        dataType: 'json' }); }
    function check_unit(n) { $.ajax( { type: "GET", url: "<?php echo base_url().'profitcenter/ajax_get_unit_name?u='; ?>"+$(    '#unit_'+n).val(), success: function(data) { if (data.result) { $('#unit_name_'+n).empty().append(data.newdata); } else     { $('#unit_name_'+n).empty().append('Tidak dikenal'); } }, error: function(data) { alert("Terjadi kesalahan"); },           dataType: 'json' }); }    
    function check_identitas(n) { $.ajax( { type: "GET", url: "<?php echo base_url().'identitas/ajax_get_identitas_name?i=';    ?>"+$('#identitas_'+n).val(), success: function(data) { if (data.result) { $('#identitas_nama_'+n).empty().append(data      .newdata); } else { $('#identitas_nama_'+n).empty().append('Umum/Tanpa identitas'); } }, error: function(data) {            alert(          "Terjadi kesalahan"); }, dataType: 'json' }); }    
    function check_project(n) { $.ajax( { type: "GET", url: "<?php echo base_url().'project/ajax_get_project_name?p='; ?>"+$    ('#project_'+n).val(), success: function(data) { if (data.result) { $('#project_name_'+n).empty().append(data.newdata);     } else { $('#project_name_'+n).empty().append('Non-Project'); } }, error: function(data) { alert("Terjadi kesalahan"); }    , dataType: 'json' }); }    
        
    function hitung_total() { var sum = 0; $('.rupiah').each(function(){sum += parseFloat(this.value.replaceAll(',',''));});    $('#totalRupiah').empty().append(sum.formatMoney(2,',','.')); return sum; }    
    
    $("#PV_Project").change(function() { ai = $(this).val().split(' - '); $('#PV_Project_Contract_Number').val(ai[0]); $('      #PV_Project_Name').val(ai[1]); });    
    $("#PV_Kepada").change(function() { ai = $(this).val().split(' - '); $('#PV_Identitas').val(ai[0]); $('                     #PV_Nama_Identitas').val(ai[1]); });    
    //$("#PV_Tanggal" ).change( function() { $("#PV_Tanggal" ).datepicker( "option", "dateFormat", "yy-mm-dd" ); });
        
    $(function() {$("#PV_Tanggal" ).datepicker(); });
    
    
</script>
</body>
</html>