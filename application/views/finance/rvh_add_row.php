<?php

/**
 * @author Fajrie R Aradea
 * @copyright 2013
 */

?>

<ul id="d_row_<?php echo $row; ?>" class="tb_row" style="border-bottom: 1px dotted black; ">
    <li class="tb_col" style="width:2px;"></li>
    <li class="tb_col tb_col_del_icon"><img src="<?php echo base_url().'includes/icons/'; ?>cross_10.png" title="Hapus data" alt="Hapus data" id="rvd_del_<?php echo $row; ?>"  onclick="f_del_rvd(<?php echo $row; ?>)" style="cursor:pointer;"/></li>
    <li class="tb_col"><input maxlength="3" type="text" class="no_urut tb_col_nomor" name="no_urut[<?php echo $row; ?>]" id="no_urut_<?php echo $row; ?>" value="<?php echo $row*5; ?>" /></li>
    <li class="tb_col"><input maxlength="20" type="text" class="referensi tb_col_referensi" name="referensi[<?php echo $row; ?>]" id="referensi_<?php echo $row; ?>" value="" /></li>
    <li class="tb_col">
        <div class="tb_col_account" style="display: block; border-left: 1px dotted gray;">      
            <input maxlength="15" type="text" class="tb_col_account" name="account[<?php echo $row; ?>]" id="account_<?php echo $row; ?>" value="" onfocus="account_focus(<?php echo $row; ?>)" onchange="check_rekening(<?php echo $row; ?>)"   />
            <select class="tb_col_account" id="cbo_account_<?php echo $row; ?>" name="cbo_account_<?php echo $row; ?>" onchange="cbo_account_change(<?php echo $row; ?>)" onblur="cbo_account_blur(<?php echo $row; ?>)" style="display:none;"><?php echo $account_list; ?></select>
            <span class="field_info tb_col_account" id="account_name_<?php echo $row; ?>">Rekening belum ditentukan</span>
        </div>
    </li>
    <li class="tb_col">
        <div class="tb_col_unit" style="display: block;  border-left: 1px dotted gray;">
            <input maxlength="4" class="tb_col_unit" type="text" name="unit[<?php echo $row; ?>]" id="unit_<?php echo $row; ?>" value="" onfocus="unit_focus(<?php echo $row; ?>)" onchange="check_unit(<?php echo $row; ?>)" />
            <select class="tb_col_unit" id="cbo_unit_<?php echo $row; ?>" name="cbo_unit_<?php echo $row; ?>" onchange="cbo_unit_change(<?php echo $row; ?>)" onblur="cbo_unit_blur(<?php echo $row; ?>)" style="display:none;"><?php echo $unit_list; ?></select>
            <span class="field_info tb_col_unit" id="unit_name_<?php echo $row; ?>">Belum ditentukan</span>
        </div>
    </li>
    <li class="tb_col">
        <div class="tb_col_project" style="display: block;  border-left: 1px dotted gray;">
            <input maxlength="20" type="text" class="tb_col_project" name="project[<?php echo $row; ?>]" id="project_<?php echo $row; ?>" value="" onfocus="project_focus(<?php echo $row; ?>)" onchange="check_project(<?php echo $row; ?>)" />
            <select class="tb_col_project" id="cbo_project_<?php echo $row; ?>" name="cbo_project_<?php echo $row; ?>" onchange="cbo_project_change(<?php echo $row; ?>)" onblur="cbo_project_blur(<?php echo $row; ?>)" style="display:none;"><?php echo $project_list; ?></select>
            <span class="field_info tb_col_project" id="project_name_<?php echo $row; ?>">Belum ditentukan</span>
        </div>
    </li>
    <li class="tb_col">
        <div class="tb_col_identitas" style="display: block;  border-left: 1px dotted gray;">
            <input maxlength="20" type="text" class="tb_col_identitas" name="identitas[<?php echo $row; ?>]" id="identitas_<?php echo $row; ?>" value="" onfocus="identitas_focus(<?php echo $row; ?>)" onchange="check_identitas(<?php echo $row; ?>)" />
            <select class="tb_col_identitas" id="cbo_identitas_<?php echo $row; ?>" name="cbo_identitas_<?php echo $row; ?>" onchange="cbo_identitas_change(<?php echo $row; ?>)" onblur="cbo_identitas_blur(<?php echo $row; ?>)" style="display:none;"><?php echo $identitas_list; ?></select>
            <span class="field_info tb_col_identitas" id="identitas_nama_<?php echo $row; ?>">Belum ditentukan</span>
        </div>
    </li>
    <li class="tb_col"><textarea maxlength="100" spellcheck="false" autocorrect="off" class="tb_col_keterangan" style="resize: none;" name="keterangan[<?php echo $row?>]" id="keterangan_<?php echo $row ?>"></textarea></li>    
    <li class="tb_col"><input maxlength="16" class="rupiah tb_col_nominal" type="text" name="rupiah[<?php echo $row; ?>]" id="rupiah_<?php echo $row; ?>" value="0,00" onblur="hitung_total()" onkeydown="return f_onlyNumbers(event)" /></li>                    
</ul> 