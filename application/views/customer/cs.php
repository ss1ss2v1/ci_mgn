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
	<h1>Tambah Pelanggan</h1>
    <form id="frm_add_cs" method="POST" action="<?php echo base_url().'c_customer/add_new'; ?>">
	<div id="entry_header">
                <ul>
            <li><label>Kode Pelanggan:</label><input title="Isi Kode Pelanggan" type="text" name="Customer_Kode" id="Customer_Kode" maxlength="20" style="width:150px;"value="<?php echo set_value('Customer_Kode', '');?>" <?php echo (form_error('Customer_Kode')!=false) ? 'style="background:#f5c8c8"' : ''; ?> /></li>
            <?php if (form_error('Customer_Kode')!=false) { ?>
            <li><label></label><?php echo form_error('Customer_Kode', '<span class="err_text">', '</span>'); ?></li>
            <?php } ?>  
            
            
            
            
            <li><label>Nama Perusahaan:</label><input title="Isi Perusahaan Pelanggan" type="text" name="Customer_Perusahaan" id="Customer_Perusahaan" maxlength="20" style="width:150px; value="<?php echo set_value('Customer_Perusahaan', '');?>" <?php echo (form_error('Customer_Perusahaan')!=false) ? 'style="background:#f5c8c8"' : ''; ?> /></li>
            <?php if (form_error('Customer_Perusahaan')!=false) { ?>
            <li><label></label><?php echo form_error('Customer_Perusahaan', '<span class="err_text">', '</span>'); ?></li>
            <?php } ?> 
            <li><label>Nama  Kontak:</label><input title="Isi Kontak Pelanggan" type="text" name="Customer_Kontak" id="Customer_Kontak" maxlength="20" style="width:150px; value="<?php echo set_value('Customer_Kontak', '');?>" <?php echo (form_error('Customer_Kontak')!=false) ? 'style="background:#f5c8c8"' : ''; ?> /></li>              
            <li><label>Alamat:</label><input title="Isi Alamat" type="text" name="Customer_Alamat" id="Customer_Alamat" maxlength="20" style="width:150px; value="<?php echo set_value('Customer_Alamat', '');?>" <?php echo (form_error('Customer_Alamat')!=false) ? 'style="background:#f5c8c8"' : ''; ?> /></li>
              
            <li><label>Kota:</label><input title="Isi Kota" type="text" name="Customer_Kota" id="Customer_Kota" maxlength="20" style="width:150px; value="<?php echo set_value('Customer_Kota', '');?>" <?php echo (form_error('Customer_Kota')!=false) ? 'style="background:#f5c8c8"' : ''; ?> /></li>
                
            
            <li><label>Kode Pos:</label><input title="Isi Kode Pos" type="text" name="Customer_Kode_Pos" id="Customer_Kode_Pos" maxlength="20" style="width:150px; value="<?php echo set_value('Customer_Kode_Pos', '');?>" <?php echo (form_error('Customer_Kode_Pos')!=false) ? 'style="background:#f5c8c8"' : ''; ?> /></li>
             
            <li><label>Nomor Telepon 1:</label><input title="Isi Telepon 1" type="text" name="Customer_Telepon_1" id="Customer_Telepon_1" maxlength="20"  style="width:150px; value="<?php echo set_value('Customer_Telepon_1', '');?>" <?php echo (form_error('Customer_Telepon_1')!=false) ? 'style="background:#f5c8c8"' : ''; ?> /></li>
             
            <li><label>Nomor Telepon 2:</label><input title="Isi Telepon 2" type="text" name="Customer_Telepon_2" id="Customer_Telepon_2" maxlength="20" style="width:150px; value="<?php echo set_value('Customer_Telepon_2', '');?>" <?php echo (form_error('Customer_Telepon_2')!=false) ? 'style="background:#f5c8c8"' : ''; ?> /></li>
            
            <li><label>Nomor Fax:</label><input title="Isi Nomor Fax" type="text" name="Customer_Fax" id="Customer_Fax" maxlength="20" style="width:150px; value="<?php echo set_value('Customer_Fax', '');?>" <?php echo (form_error('Customer_Fax')!=false) ? 'style="background:#f5c8c8"' : ''; ?> /></li>
            
            <li><label>Email:</label><input title="Isi Email" type="text" name="Customer_Email" id="Customer_Email" maxlength="20" style="width:150px; value="<?php echo set_value('Customer_Email', '');?>" <?php echo (form_error('Customer_Email')!=false) ? 'style="background:#f5c8c8"' : ''; ?> /></li>
            
            <?php if (form_error('Customer_Email')!=false) { ?>
            <li><label></label><?php echo form_error('Customer_Email', '<span class="err_text">', '</span>'); ?></li>
            <?php } ?> 
            <li><label>Pakai Pajak</label>
            <input title="Isi Pajak Ya" type="radio" name="Customer_Pakai_Pajak" id="Customer_Pakai_Pajak" style="width:35px;" value="1" <?php echo set_radio('Customer_Pakai_Pajak', '1',TRUE); ?> />Ya
            <input title="Isi Pajak Tidak" type="radio" name="Customer_Pakai_Pajak" id="Customer_Pakai_Pajak" style="width:35px;" value="0"<?php echo set_radio('Customer_Pakai_Pajak', '0' ); ?>  />Tidak
            </li>
            
            <li><label>Nomor NPWP:</label><input title="Isi Nomor NPWP" type="text" name="Customer_NPWP" id="Customer_NPWP" maxlength="20" style="width:150px; value="<?php echo set_value('Customer_NPWP', '');?>" <?php echo (form_error('Customer_NPWP')!=false) ? 'style="background:#f5c8c8"' : ''; ?> /></li>
            <li><label>Nomor PKP:</label><input title="Isi Nomor PKP" type="text" name="Customer_PKP" id="Customer_PKP" maxlength="20" style="width:150px; value="<?php echo set_value('Customer_PKP', '');?>" <?php echo (form_error('Customer_PKP')!=false) ? 'style="background:#f5c8c8"' : ''; ?> /></li>
           
            <li><label>Alamat Pajak:</label><input title="Isi Alamat Pajak" type="text" name="Customer_Alamat_Pajak" id="Customer_Alamat_Pajak" maxlength="20" style="width:150px; value="<?php echo set_value('Customer_Alamat_Pajak', '');?>" <?php echo (form_error('Customer_Alamat_Pajak')!=false) ? 'style="background:#f5c8c8"' : ''; ?> /></li>
            
            <li><label>Tanggal PKP:</label><input title="Isi Tanggal PKP" type="text" name="Customer_Tanggal_PKP" id="Customer_Tanggal_PKP" maxlength="20" style="width:150px; value="<?php echo set_value('Customer_Tanggal_PKP', '');?>" <?php echo (form_error('Customer_Tanggal_PKP')!=false) ? 'style="background:#f5c8c8"' : ''; ?> /></li>
            
                <label></label>
                <input type="submit" value="Simpan" name="simpan" style="width:75px;"/>
                <input type="reset" value="Batal" name="batal" style="width:75px;" onclick="history.back();" />
            </li>
        </ul>
    </div>   
    <div id="entry_detail">
    <ul class="tb_head">
            <li id="tb_head_spacer" class="tb_col_head" style="width:2px"></li>
            <li id="tb_head_del" class="tb_col_head tb_col_del_icon"><img id="add_rvd_icon" src="<?php echo base_url().'includes/icons/'; ?>add_10.png" title="Tambah baris data" alt="Tambah baris data" id="rvd_add"  onclick="f_add_rvd()" style="cursor:pointer;"/></li>
            <li id="tb_head_no" class="tb_col_head tb_col_nomor">No</li>
            <li id="tb_head_referensi" class="tb_col_head tb_col_referensi">Nama Perusahaan</li>
            <li id="tb_head_account" class="tb_col_head tb_col_account">Nama Kontak</li>
            <li id="tb_head_unit" class="tb_col_head tb_col_unit">Alamat</li>
            <li id="tb_head_spacer" class="tb_col_head" style="width:0px"></li>
            <li id="tb_head_project" class="tb_col_head tb_col_project">Kota</li>
            <li id="tb_head_identitas" class="tb_col_head tb_col_identitas">Email</li>
            <li id="tb_head_spacer" class="tb_col_head" style="width:0px"></li>
            <li id="tb_head_keterangan" class="tb_col_head tb_col_keterangan">Nomor NPWP</li>
            <li id="tb_head_nominal" class="tb_col_head tb_col_nominal">Nomor PKP</li>
        </ul> 
         <?php $total=0; ?>
        <?php if ($this->input->post("no_urut")) { 
            $no_urut=$this->input->post("no_urut");
            $referensi =$this->input->post("referensi");
            $account =$this->input->post("account");
            $project =$this->input->post("project");
            $unit =$this->input->post("unit");
            $identitas =$this->input->post("identitas");
            $keterangan =$this->input->post("keterangan");
            $rupiah =$this->input->post("rupiah");
            $i=1; 
            foreach ($no_urut as $no => $urut)
            { $rupiah[$no] = (float)str_replace(',','', $rupiah[$no]); ?>
                <ul id="d_row_<?php echo $i ?>" class="tb_row" style="border-bottom: 1px dotted black; ">
                    <li class="tb_col" style="width:2px;"></li>
                    <li class="tb_col tb_col_del_icon"><img src="<?php echo base_url().'includes/icons/'; ?>cross_10.png" title="Hapus data" alt="Hapus data" id="rvd_del_<?php echo $i ?>"  onclick="f_del_rvd(<?php echo $i ?>)" style="cursor:pointer;"/></li>
                    <li class="tb_col tb_col_nomor"><input maxlength="3" type="text" class="no_urut tb_col_nomor" name="no_urut[<?php echo $i ?>]" id="no_urut_<?php echo $i ?>" value="<?php echo $urut ?>" /></li>
                    <li class="tb_col tb_col_referensi"><input maxlength="20" type="text" class="referensi tb_col_referensi" name="referensi[<?php echo $i ?>]" id="referensi_<?php echo $i ?>" value="<?php echo $referensi[$no]; ?>" /></li>
                    <li class="tb_col">
                        <div class="tb_col_account" style="display: block; border-left: 1px dotted gray;">      
                            <input maxlength="15" type="text" class="tb_col_account" name="account[<?php echo $i ?>]" id="account_<?php echo $i ?>" value="<?php echo $account[$no]; ?>" onchange="check_rekening(<?php echo $i ?>)" />
                            <select id="cbo_account_<?php echo $i ?>" name="cbo_account_<?php echo $i ?>" style="display:none;" class="tb_col_account" onchange="cbo_account_change(<?php echo $i; ?>)" onblur="cbo_account_blur(<?php echo $i; ?>)"><?php echo $this->account_model->get_account_for_option(false, false, true, $account[$no]); ?></select>
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
                            <span class="field_info tb_col_identitas" id="identitas_nama_<?php echo $i ?>" style="width:100px;"><?php echo $this->identitas_model->get_identitas_nama($identitas[$no]); ?></span>
                        </div>
                    </li>
                    <li class="tb_col"><textarea maxlength="100" spellcheck="false" autocorrect="off" class="tb_col_keterangan" style="resize: none;" name="keterangan[<?php echo $i ?>]" id="keterangan_<?php echo $i ?>"><?php echo $keterangan[$no]; ?></textarea></li>
                    <li class="tb_col"><input maxlength="16" class="rupiah tb_col_nominal" type="text" name="rupiah[<?php echo $i ?>]" id="rupiah_<?php echo $i ?>" value="<?php echo number_format((float)$rupiah[$no], 2, '.', ','); ?>" onblur="hitung_total(<?php echo $i ?>)" onkeydown="return f_onlyNumbers(event)" /></li>                    
                </ul>                 
            <?php $i++; $total += (float)$rupiah[$no]; } ?>
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
            <li id="tb_head_nominal" class="tb_col_head tb_col_nominal"><span id="totalRupiah" style="font-weight: bold;"><?php echo number_format($total, 2, '.', ','); ?></span></li>
        </ul>           
    </div>
    </form>
</div>
<script>
    var nIndex=0; 
    Number.prototype.formatMoney = function(decPlaces, thouSeparator, decSeparator) { var n = this, decPlaces = isNaN(decPlaces = Math.abs(decPlaces)) ? 2 : decPlaces, decSeparator = decSeparator == undefined ? "." : decSeparator, thouSeparator = thouSeparator == undefined ? "," : thouSeparator, sign = n < 0 ? "-" : "", i = parseInt(n = Math.abs(+n || 0).toFixed(decPlaces)) + "", j = (j = i.length) > 3 ? j % 3 : 0; return sign + (j ? i.substr(0, j) + thouSeparator : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thouSeparator) + (decPlaces ? decSeparator + Math.abs(n - i).toFixed(decPlaces).slice(2) : ""); };     
    String.prototype.replaceAll = function( token, newToken, ignoreCase ) { var _token; var str = this + ""; var i = -1; if ( typeof token === "string" ) { if ( ignoreCase ) { _token = token.toLowerCase(); while( ( i = str.toLowerCase().indexOf( token, i >= 0 ? i + newToken.length : 0 ) ) !== -1 ) { str = str.substring( 0, i ) + newToken + str.substring( i + token.length ); } } else { return this.split( token ).join( newToken ); } } return str; }; 
    function f_onlyNumbers(e){ var keynum; var keychar; if(window.event) { keynum = e.keyCode; } if(e.which){ keynum = e.which; } if((keynum == 8 || keynum == 9 || keynum == 46 || (keynum >= 35 && keynum <= 40) || (e.keyCode >= 96 && e.keyCode <= 105))) return true; if(keynum == 110 || keynum == 190) { return true; } keychar = String.fromCharCode(keynum); return !isNaN(keychar); }
    function format(n, sep, decimals) { sep = sep || "."; decimals = decimals || 2; return n.toLocaleString().split(sep)[0] + sep + n.toFixed(decimals).split(sep)[1]; }    

    function f_add_rvd() { $('#add_rvd_icon').attr('src', '<?php echo base_url().'includes/images/fb-loader.gif'; ?>'); n = nIndex++; m = $('.no_urut').length; $.ajax( { type: "GET", url: "<?php echo base_url().'c_customer/ajax_request_new_row?n='; ?>"+n, success: function(data) { if (data.result) { $('#tb_bot_total').before(data.newdata); n++; $('#referensi_'+n).val($('#RV_Referensi').val()); if (m>0) { $('#keterangan_'+n).val($('#keterangan_'+m).val()); $('#unit_'+n).val($('#unit_'+m).val()); $('#unit_name_'+n).empty().append($('#unit_name_'+m).text()); $('#project_'+n).val($('#project_'+m).val()); $('#project_name_'+n).empty().append($('#project_name_'+m).text()); $('#identitas_'+n).val($('#identitas_'+m).val()); $('#identitas_nama_'+n).empty().append($('#identitas_nama_'+m).text()); } else { ai = $('#RV_Unit_Code').val().split(' - '); $('#unit_'+n).val(ai[0]); $('#unit_name_'+n).empty().append(ai[1]); if ($('#RV_Project').val() != '') { ai = $('#RV_Project').val().split(' - '); $('#project_'+n).val(ai[0]); $('#project_name_'+n).empty().append(ai[1]); } if ($('#RV_Kepada').val() != '') { ai = $('#RV_Dari').val().split(' - '); $('#identitas_'+n).val(ai[0]); $('#identitas_nama_'+n).empty().append(ai[1]); } $('#keterangan_'+n).val($('#RV_Keterangan').val()); } $('#add_rvd_icon').attr('src', '<?php echo base_url().'includes/icons/add_10.png'; ?>'); $('#account_'+n).focus(); } else { alert(data.message); $('#add_rvd_icon').attr('src', '<?php echo base_url().'includes/icons/add_10.png'; ?>'); } }, error: function(data) { alert("Terjadi kesalahan"); $('#add_rvd_icon').attr('src', '<?php echo base_url().'includes/icons/add_10.png'; ?>'); }, dataType: 'json' }); }

    
    $("#Customer_Tanggal_PKP" ).change( function() {
        $("#Customer_Tanggal_PKP" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
    });
    
    $(function() { 
        $("#Customer_Tanggal_PKP" ).datepicker(); 
         });    
    
</script>
</body>
</html>