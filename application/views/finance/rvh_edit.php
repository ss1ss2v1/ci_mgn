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
	<h1>Ubah Voucher Penerimaan Kas/Bank</h1>
    <form id="frm_edit_rvh" method="POST" action="<?php echo base_url().'receipt_voucher/edit'; ?>">
	<div id="entry_header">
        <ul>
            <li><label>Nomor Voucher:</label><span style="font-weight: bold;"><?php echo $rvh['RV_Nomor']; ?></span></li>
            <li><label>Tanggal:</label><input title="Isi dengan tanggal voucher" type="text" name="RV_Tanggal" id="RV_Tanggal" maxlength="10" value="<?php echo set_value('RV_Tanggal', date('Y-m-d', strtotime($rvh['RV_Tanggal'])));?>" <?php echo (form_error('RV_Tanggal')!=false) ? 'style="background:#f5c8c8"' : ''; ?> /></li>
            <?php if (form_error('RV_Tanggal')!=false) { ?>
            <li><label></label><?php echo form_error('RV_Tanggal', '<span class="err_text">', '</span>'); ?></li>
            <?php } ?>            
            <li><label>No Referensi:</label><input title="Isi dengan nomor referensi (po/faktur/dll)" type="text" name="RV_Referensi" id="RV_Referensi" maxlength="20" value="<?php echo set_value('RV_Referensi', $rvh['RV_Referensi']);?>" /></li>
            <li><label>Diterima dari:</label><select name="RV_Dari" id="RV_Dari" style="width:350px;"><?php echo $identitas_list; ?></select></li>
            <li>
                <label></label>
                <span>Identitas (baru) : </span>
                <input type="text" title="Isi dengan kode identitas objek akuntansi" name="RV_Identitas" id="RV_Identitas" maxlength="20" style="width:100px;<?php echo (form_error('RV_Identitas')!=false) ? 'background:#f5c8c8' : ''; ?>" />
                <input type="text" title="Isi dengan nama identitas objek akuntansi" name="RV_Nama_Identitas" id="RV_Nama_Identitas" maxlength="20" style="width:300px;<?php echo (form_error('RV_Nama_Identitas')!=false) ? 'background:#f5c8c8' : ''; ?>" />
            </li>
            <?php if (form_error('RV_Dari')!=false) { ?>
            <li><label></label><?php echo form_error('RV_Dari', '<span class="err_text">', '</span>'); ?></li>
            <?php } ?>            
            <li><label>Untuk:</label><input title="Isi dengan keterangan umum transaksi" type="text" name="RV_Keterangan" id="RV_Keterangan" maxlength="100" value="<?php echo set_value('RV_Keterangan', $rvh['RV_Keterangan']);?>" style="width:300px;<?php echo (form_error('RV_Keterangan')!=false) ? 'background:#f5c8c8' : ''; ?>" /></li>
            <?php if (form_error('RV_Keterangan')!=false) { ?>
            <li><label></label><?php echo form_error('RV_Keterangan', '<span class="err_text">', '</span>'); ?></li>
            <?php } ?>            
            <li><label>Jenis Penerimaan:</label><select name="RV_Receipt_Type" style="width:110px;"><option value="Kas">Kas</option><option value="Bank">Bank</option></select></li>
            <li><label>Rekening:</label><select name="RV_Account_Number" style="width:350px;"><?php echo $account_list; ?></select></li>
            <li><label>Kode Unit Usaha:</label><select id="RV_Unit_Code" name="RV_Unit_Code" style="width:200px;"><?php echo $unit_list; ?></select></li>
            <li><label>Proyek/Order:</label><select id="RV_Project" name="RV_Project" style="width:300px;"><?php echo $project_list; ?></select></li>
            <li>
                <label></label>
                <span>Proyek/Order (baru) : </span>
                <input type="text" title="Isi dengan nomor kontrak atau kosongkan jika transaksi bukan transaksi proyek" name="RV_Project_Contract_Number" id="RV_Project_Contract_Number" maxlength="20"  style="width:100px;<?php echo (form_error('RV_Project_Contract_Number')!=false) ? 'background:#f5c8c8' : ''; ?>" />
                <input type="text" title="Isi dengan keterangan kontrak atau kosongkan jika transaksi bukan transaksi proyek" name="RV_Project_Name" id="RV_Project_Name" maxlength="100" style="width:300px;<?php echo (form_error('RV_Project_Name')!=false) ? 'background:#f5c8c8' : ''; ?>" />
            </li>
            <input type="hidden" name="RV_Nomor" value="<?php echo $rvh['RV_Nomor']; ?>" />
        </ul>
    </div>
    <div id="entry_detail">
        <ul class="tb_head">
            <li id="tb_head_spacer" class="tb_col_head" style="width:2px"></li>
            <li id="tb_head_del" class="tb_col_head tb_col_del_icon"><img id="add_rvd_icon" src="<?php echo base_url().'includes/icons/'; ?>add_10.png" title="Tambah baris data" alt="Tambah baris data" id="rvd_add"  onclick="f_add_rvd()" style="cursor:pointer;"/></li>
            <li id="tb_head_no" class="tb_col_head tb_col_nomor">No</li>
            <li id="tb_head_referensi" class="tb_col_head tb_col_referensi">Referensi</li>
            <li id="tb_head_account" class="tb_col_head tb_col_account">Rekening</li>
            <li id="tb_head_unit" class="tb_col_head tb_col_unit">Unit</li>
            <li id="tb_head_spacer" class="tb_col_head" style="width:0px"></li>
            <li id="tb_head_project" class="tb_col_head tb_col_project">Proyek</li>
            <li id="tb_head_identitas" class="tb_col_head tb_col_identitas">Identitas</li>
            <li id="tb_head_spacer" class="tb_col_head" style="width:0px"></li>
            <li id="tb_head_keterangan" class="tb_col_head tb_col_keterangan">Keterangan</li>
            <li id="tb_head_nominal" class="tb_col_head tb_col_nominal">Nominal</li>
        </ul>

        <?php 
            if ($this->input->post("no_urut"))  
            { 
            $no_urut=$this->input->post("no_urut");
            $referensi =$this->input->post("referensi");
            $account =$this->input->post("account");
            $project =$this->input->post("project");
            $unit =$this->input->post("unit");
            $identitas =$this->input->post("identitas");
            $keterangan =$this->input->post("keterangan");
            $rupiah =$this->input->post("rupiah");
            $i=1; $total=0;
            foreach ($no_urut as $no => $urut)
            { $rupiah[$no] = (float)str_replace(',','', $rupiah[$no]); ?>
                <ul id="d_row_<?php echo $i ?>" class="tb_row" style="border-bottom: 1px dotted black; ">
                    <li class="tb_col" style="width:2px;"></li>
                    <li class="tb_col tb_col_del_icon"><img src="<?php echo base_url().'includes/icons/'; ?>cross_10.png" title="Hapus data" alt="Hapus data" id="rvd_del_<?php echo $i ?>"  onclick="f_del_rvd(<?php echo $i ?>)" style="cursor:pointer;"/></li>
                    <li class="tb_col"><input maxlength="3" type="text" class="no_urut tb_col_nomor" name="no_urut[<?php echo $i ?>]" id="no_urut_<?php echo $i ?>" value="<?php echo $urut ?>" /></li>
                    <li class="tb_col"><input maxlength="20" type="text" class="referensi tb_col_referensi" name="referensi[<?php echo $i ?>]" id="referensi_<?php echo $i ?>" value="<?php echo $referensi[$no]; ?>" /></li>
                    <li class="tb_col">
                        <div class="tb_col_account" style="display: block; border-left: 1px dotted gray;">      
                            <input maxlength="15" type="text" class="tb_col_account" name="account[<?php echo $i ?>]" id="account_<?php echo $i ?>" value="<?php echo $account[$no]; ?>" onchange="check_rekening(<?php echo $i ?>)" />
                            <select id="cbo_account_<?php echo $i ?>" name="cbo_account_<?php echo $i ?>" style="display:none; width:180px;" onchange="cbo_account_change(<?php echo $i; ?>)" onblur="cbo_account_blur(<?php echo $i; ?>)"><?php echo $this->account_model->get_account_for_option(false, false, true, $account[$no]); ?></select>
                            <span class="field_info tb_col_account" id="account_name_<?php echo $i ?>"><?php echo $this->account_model->get_account_name($account[$no]); ?></span>
                        </div>
                    </li>
                    <li class="tb_col">
                        <div class="tb_col_unit" style="display: block;  border-left: 1px dotted gray;">
                            <input maxlength="4" type="text" class="tb_col_unit" name="unit[<?php echo $i ?>]" id="unit_<?php echo $i ?>" value="<?php echo $unit[$no]; ?>" onchange="check_unit(<?php echo $i ?>)" />
                            <select class="tb_col_unit" id="cbo_unit_<?php echo $i ?>" name="cbo_unit_<?php echo $i ?>" style="display:none;" onchange="cbo_unit_change(<?php echo $i; ?>)" onblur="cbo_unit_blur(<?php echo $i; ?>)"><?php echo $this->unit_model->get_unit_for_option($unit[$no]); ?></select>
                            <span class="field_info tb_col_unit" id="unit_name_<?php echo $i ?>"><?php echo $this->unit_model->get_unit_name($unit[$no]); ?></span>
                        </div>
                    </li>
                    <li class="tb_col">
                        <div class="tb_col_project" style="display: block;  border-left: 1px dotted gray;">
                            <input maxlength="20" type="text" class="tb_col_project" name="project[<?php echo $i ?>]" id="project_<?php echo $i ?>" value="<?php echo $project[$no]; ?>" onchange="check_project(<?php echo $i ?>)" />
                            <select class="tb_col_project" id="cbo_project_<?php echo $i ?>" name="cbo_project_<?php echo $i ?>" style="display:none;" onchange="cbo_project_change(<?php echo $i; ?>)" onblur="cbo_project_blur(<?php echo $i; ?>)"><?php echo $this->project_model->get_project_for_option($project[$no]); ?></select>
                            <span class="field_info tb_col_project" id="project_name_<?php echo $i ?>"><?php echo $this->project_model->get_project_name($project[$no]); ?></span>
                        </div>
                    </li>
                    <li class="tb_col">
                        <div class="tb_col_identitas" style="display: block;  border-left: 1px dotted gray;">
                            <input maxlength="20" type="text" class="tb_col_identitas" name="identitas[<?php echo $i ?>]" id="identitas_<?php echo $i ?>" value="<?php echo $identitas[$no]; ?>" onchange="check_identitas(<?php echo $i ?>)" />
                            <select class="tb_col_identitas" id="cbo_identitas_<?php echo $i ?>" name="cbo_identitas_<?php echo $i ?>" style="display:none;" onchange="cbo_identitas_change(<?php echo $i; ?>)" onblur="cbo_identitas_blur(<?php echo $i; ?>)"><?php echo $this->identitas_model->get_identitas_for_option($identitas[$no]); ?></select>
                            <span class="field_info tb_col_identitas" id="identitas_nama_<?php echo $i ?>"><?php echo $this->identitas_model->get_identitas_nama($identitas[$no]); ?></span>
                        </div>
                    </li>
                    <li class="tb_col"><textarea maxlength="100" spellcheck="false" autocorrect="off" class="tb_col_keterangan" style="resize: none;" name="keterangan[<?php echo $i ?>]" id="keterangan_<?php echo $i ?>"><?php echo $keterangan[$no]; ?></textarea></li>                    
                    <li class="tb_col"><input maxlength="16" class="rupiah tb_col_nominal" type="text" name="rupiah[<?php echo $i ?>]" id="rupiah_<?php echo $i ?>" value="<?php echo number_format((float)$rupiah[$no], 2, '.', ','); ?>" onblur="hitung_total(<?php echo $i ?>)" onkeydown="return f_onlyNumbers(event)" /></li>                    
                </ul>                 
            <?php $i++; $total += (float)$rupiah[$no]; } ?>
        <?php } else { $i=1; $urut=5; $total=0;
            foreach ($rvds as $rvd) { ?>
                <ul id="d_row_<?php echo $i; ?>" class="tb_row" style="border-bottom: 1px dotted black; ">
                    <li class="tb_col" style="width:2px;"></li>
                    <li class="tb_col tb_col_del_icon"><img src="<?php echo base_url().'includes/icons/'; ?>cross_10.png" title="Hapus data" alt="Hapus data" id="rvd_del_<?php echo $i; ?>"  onclick="f_del_rvd('<?php echo $i ?>')" style="cursor:pointer;"/></li>
                    <li class="tb_col"><input maxlength="3" type="text" class="no_urut tb_col_nomor" name="no_urut[<?php echo $i; ?>]" id="no_urut_[<?php echo $i; ?>]" value="<?php echo set_value('no_urut['.$i.']', $i * 5); ?>" /></li>
                    <li class="tb_col"><input maxlength="20" type="text" class="referensi tb_col_referensi" name="referensi[<?php echo $i; ?>]" id="referensi_<?php echo $i; ?>" value="<?php echo set_value('referensi_['.$i.']', $rvd['RVD_Nomor_Referensi']); ?>" /></li>
                    <li class="tb_col">
                        <div class="tb_col_account" style="display: block; border-left: 1px dotted gray;">
                            <input maxlength="15" type="text" class="tb_col_account" name="account[<?php echo $i; ?>]" id="account_<?php echo $i; ?>" value="<?php echo set_value('account_['.$i.']', $rvd['RVD_Nomor_Rekening_Lawan']); ?>" onchange="check_rekening(<?php echo $i; ?>)" />
                            <select class="tb_col_account" id="cbo_account_<?php echo $i ?>" name="cbo_account_<?php echo $i ?>" style="display:none;" onchange="cbo_account_change(<?php echo $i; ?>)" onblur="cbo_account_blur(<?php echo $i; ?>)"><?php echo $this->account_model->get_account_for_option(false, false, true, set_value('account_['.$i.']', $rvd['RVD_Nomor_Rekening_Lawan'])); ?></select>
                            <span class="field_info tb_col_account" id="account_name_<?php echo $i; ?>"><?php echo $rvd['Account_Name']; ?></span>
                        </div>
                    </li>
                    <li class="tb_col">
                        <div class="tb_col_unit" style="display: block;  border-left: 1px dotted gray;">
                            <input maxlength="4" type="text" class="tb_col_unit" name="unit[<?php echo $i; ?>]" id="unit_<?php echo $i; ?>" value="<?php echo set_value('unit_['.$i.']', $rvd['RVD_Unit_Code_Lawan']); ?>" onchange="check_unit(<?php echo $i; ?>)" />
                            <select class="tb_col_unit" id="cbo_unit_<?php echo $i ?>" name="cbo_unit_<?php echo $i ?>" style="display:none;" onchange="cbo_unit_change(<?php echo $i; ?>)" onblur="cbo_unit_blur(<?php echo $i; ?>)"><?php echo $this->unit_model->get_unit_for_option(set_value('unit_['.$i.']', $rvd['RVD_Unit_Code_Lawan'])); ?></select>
                            <span class="field_info tb_col_unit" id="unit_name_<?php echo $i; ?>"><?php echo $rvd['Unit_Name']; ?></span>
                        </div>
                    </li>
                    <li class="tb_col">
                        <div class="tb_col_project" style="display: block;  border-left: 1px dotted gray;">
                            <input maxlength="20" type="text" class="tb_col_project" name="project[<?php echo $i; ?>]" id="project_<?php echo $i; ?>" value="<?php echo set_value('project_['.$i.']', $rvd['RVD_Project_Contract_Number_Lawan']); ?>" onchange="check_project(<?php echo $i; ?>)" />
                            <select class="tb_col_project" id="cbo_project_<?php echo $i ?>" name="cbo_project_<?php echo $i ?>" style="display:none;" onchange="cbo_project_change(<?php echo $i; ?>)" onblur="cbo_project_blur(<?php echo $i; ?>)"><?php echo $this->project_model->get_project_for_option(set_value('project_['.$i.']', $rvd['RVD_Project_Contract_Number_Lawan'])); ?></select>
                            <span class="field_info tb_col_project" id="project_name_<?php echo $i; ?>"><?php echo $rvd['PD_Description']; ?></span>
                        </div>
                    </li>
                    <li class="tb_col">
                        <div class="tb_col_identitas" style="display: block;  border-left: 1px dotted gray;">
                            <input maxlength="20" type="text" class="tb_col_identitas" name="identitas[<?php echo $i; ?>]" id="identitas_<?php echo $i; ?>" value="<?php echo set_value('identitas_['.$i.']', $rvd['RVD_Identitas_Lawan']); ?>" onchange="check_identitas(<?php echo $i; ?>)" />
                            <select class="tb_col_identitas" id="cbo_identitas_<?php echo $i ?>" name="cbo_identitas_<?php echo $i ?>" style="display:none;" onchange="cbo_identitas_change(<?php echo $i; ?>)" onblur="cbo_identitas_blur(<?php echo $i; ?>)"><?php echo $this->identitas_model->get_identitas_for_option(set_value('identitas_['.$i.']', $rvd['RVD_Identitas_Lawan'])); ?></select>
                            <span class="field_info tb_col_identitas" id="identitas_nama_<?php echo $i; ?>"><?php echo $rvd['ID_Description']; ?></span>
                        </div>
                    </li>
                    <li class="tb_col"><textarea maxlength="100" spellcheck="false" autocorrect="off" style="resize: none;" class="tb_col_keterangan" name="keterangan[<?php echo $i ?>]" id="keterangan_<?php echo $i ?>"><?php echo set_value('keterangan_['.$i.']', $rvd['RVD_Keterangan']); ?></textarea></li>
                    <li class="tb_col"><input maxlength="16" class="rupiah tb_col_nominal" type="text" name="rupiah[<?php echo $i; ?>]" id="rupiah_<?php echo $i; ?>" value="<?php echo set_value('rupiah_['.$i.']', number_format($rvd['RVD_Rupiah'], 2, '.', ',')); ?>" onblur="hitung_total()" /></li>                    
                </ul>
        <?php $i++; $total += $rvd['RVD_Rupiah']; } } ?>
        
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
            <li id="tb_head_nominal" class="tb_col_head tb_col_nominal"><span id="totalRupiah" style="font-weight: bold;"><?php echo number_format($total, 2, '.', ','); ?></span></li>
        </ul>                            
    </div>
    <div style="margin-left:5px; margin-bottom:5px;">
        <input type="submit" value="Ubah" name="simpan" />
        <input type="reset" value="Batal" name="batal" onclick="cancel_save();" />
    </div>
    </form>
    <div class="warning_box">Perhatian !! : Data dengan no rekening kosong atau rekening tidak dikenal atau memiliki nominal nol atau negatif tidak akan disimpan</div>      
</div>
<script>

    var nIndex=<?php echo --$i; ?>; 
    Number.prototype.formatMoney = function(decPlaces, thouSeparator, decSeparator) { var n = this, decPlaces = isNaN(decPlaces = Math.abs(decPlaces)) ? 2 : decPlaces, decSeparator = decSeparator == undefined ? "." : decSeparator, thouSeparator = thouSeparator == undefined ? "," : thouSeparator, sign = n < 0 ? "-" : "", i = parseInt(n = Math.abs(+n || 0).toFixed(decPlaces)) + "", j = (j = i.length) > 3 ? j % 3 : 0; return sign + (j ? i.substr(0, j) + thouSeparator : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thouSeparator) + (decPlaces ? decSeparator + Math.abs(n - i).toFixed(decPlaces).slice(2) : ""); };     
    String.prototype.replaceAll = function( token, newToken, ignoreCase ) { var _token; var str = this + ""; var i = -1; if ( typeof token === "string" ) { if ( ignoreCase ) { _token = token.toLowerCase(); while( ( i = str.toLowerCase().indexOf( token, i >= 0 ? i + newToken.length : 0 ) ) !== -1 ) { str = str.substring( 0, i ) + newToken + str.substring( i + token.length ); } } else { return this.split( token ).join( newToken ); } } return str; }; 
    function format(n, sep, decimals) { sep = sep || "."; decimals = decimals || 2; return n.toLocaleString().split(sep)[0] + sep + n.toFixed(decimals).split(sep)[1]; }    
    function f_onlyNumbers(e){ var keynum; var keychar; if(window.event) { keynum = e.keyCode; } if(e.which){ keynum = e.which; } if((keynum == 8 || keynum == 9 || keynum == 46 || (keynum >= 35 && keynum <= 40) || (e.keyCode >= 96 && e.keyCode <= 105))) return true; if(keynum == 110 || keynum == 190) { return true; } keychar = String.fromCharCode(keynum); return !isNaN(keychar); }    

    $(document).ready(function () { if ($('#RV_Dari').val() != '') { ai = $('#RV_Dari').val().split(' - '); $('#RV_Identitas').val(ai[0]); $('#RV_Nama_Identitas').val(ai[1]); } if ($('#RV_Project').val() != '') { ai = $('#RV_Project').val().split(' - '); $('#RV_Project_Contract_Number').val(ai[0]); $('#RV_Project_Name').val(ai[1]); } $("#RV_Tanggal" ).datepicker({defaultDate:new Date(<?php echo date( 'Y', strtotime( $rvh['RV_Tanggal'])); ?>, <?php echo date( 'm', strtotime( $rvh['RV_Tanggal']))-1; ?>, <?php echo date( 'd', strtotime( $rvh['RV_Tanggal'])); ?> ), dateFormat: 'yy-mm-dd'}); });

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
    
    function f_add_rvd() { $('#add_rvd_icon').attr('src', '<?php echo base_url().'includes/images/fb-loader.gif'; ?>'); n = nIndex++; m = $('.no_urut').length; $.ajax( { type: "GET", url: "<?php echo base_url().'receipt_voucher/ajax_request_new_row?n='; ?>"+n, success: function(data) { if (data.result) { $('#tb_bot_total').before(data.newdata); n++; $('#referensi_'+n).val($('#RV_Referensi').val()); if (m>0) { $('#keterangan_'+n).val($('#keterangan_'+m).val()); $('#unit_'+n).val($('#unit_'+m).val()); $('#unit_name_'+n).empty().append($('#unit_name_'+m).text()); $('#project_'+n).val($('#project_'+m).val()); $('#project_name_'+n).empty().append($('#project_name_'+m).text()); $('#identitas_'+n).val($('#identitas_'+m).val()); $('#identitas_nama_'+n).empty().append($('#identitas_nama_'+m).text()); } else { ai = $('#RV_Unit_Code').val().split(' - '); $('#unit_'+n).val(ai[0]); $('#unit_name_'+n).empty().append(ai[1]); if ($('#RV_Project').val() != '') { ai = $('#RV_Project').val().split(' - '); $('#project_'+n).val(ai[0]); $('#project_name_'+n).empty().append(ai[1]); } if ($('#RV_Kepada').val() != '') { ai = $('#RV_Dari').val().split(' - '); $('#identitas_'+n).val(ai[0]); $('#identitas_nama_'+n).empty().append(ai[1]); } $('#keterangan_'+n).val($('#RV_Keterangan').val()); } $('#add_rvd_icon').attr('src', '<?php echo base_url().'includes/icons/add_10.png'; ?>'); $('#account_'+n).focus(); } else { alert(data.message); $('#add_rvd_icon').attr('src', '<?php echo base_url().'includes/icons/add_10.png'; ?>'); } }, error: function(data) { alert("Terjadi kesalahan"); $('#add_rvd_icon').attr('src', '<?php echo base_url().'includes/icons/add_10.png'; ?>'); }, dataType: 'json' }); }
    function cancel_save() {window.location="<?php echo base_url().'receipt_voucher'; ?>"; }
    function f_del_rvd(n) { $('#d_row_'+n).remove(); hitung_total(); }
    
    function check_rekening(n) { $.ajax( { type: "GET", url: "<?php echo base_url().'account/ajax_get_account_name?a='; ?>"+$('#account_'+n).val(), success: function(data) { if (data.result) { $('#account_name_'+n).empty().append(data.newdata); } else { $('#account_name_'+n).empty().append('Tidak dikenal'); } }, error: function(data) { alert("Terjadi kesalahan"); }, dataType: 'json' }); }
    function check_unit(n) { $.ajax( { type: "GET", url: "<?php echo base_url().'profitcenter/ajax_get_unit_name?u='; ?>"+$('#unit_'+n).val(), success: function(data) { if (data.result) { $('#unit_name_'+n).empty().append(data.newdata); } else { $('#unit_name_'+n).empty().append('Tidak dikenal'); } }, error: function(data) { alert("Terjadi kesalahan"); }, dataType: 'json' }); }    
    function check_identitas(n) { $.ajax( { type: "GET", url: "<?php echo base_url().'identitas/ajax_get_identitas_name?i='; ?>"+$('#identitas_'+n).val(), success: function(data) { if (data.result) { $('#identitas_nama_'+n).empty().append(data.newdata); } else { $('#identitas_nama_'+n).empty().append('Umum/Tanpa identitas'); } }, error: function(data) { alert("Terjadi kesalahan"); }, dataType: 'json' }); }    
    function check_project(n) { $.ajax( { type: "GET", url: "<?php echo base_url().'project/ajax_get_project_name?p='; ?>"+$('#project_'+n).val(), success: function(data) { if (data.result) { $('#project_name_'+n).empty().append(data.newdata); } else { $('#project_name_'+n).empty().append('Non-Project'); } }, error: function(data) { alert("Terjadi kesalahan"); }, dataType: 'json' }); }    
        
    function hitung_total() { var sum = 0; $('.rupiah').each(function(){sum += parseFloat(this.value.replaceAll(',',''));}); $('#totalRupiah').empty().append(sum.formatMoney(2,',','.')); return sum; }    
    
    $("#RV_Project").change(function() { ai = $(this).val().split(' - '); $('#RV_Project_Contract_Number').val(ai[0]); $('#RV_Project_Name').val(ai[1]); });    
    $("#RV_Dari").change(function() { ai = $(this).val().split(' - '); $('#RV_Identitas').val(ai[0]); $('#RV_Nama_Identitas').val(ai[1]); });    
//    $("#RV_Tanggal" ).change( function() { $("#RV_Tanggal" ).datepicker( "option", "dateFormat", "yy-mm-dd" ); });        
    $(function() {$("#RV_Tanggal" ).datepicker(); }); 
    
</script>
</body>
</html>