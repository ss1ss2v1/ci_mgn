<?php

/**
 * @author Fajrie R Aradea
 * @copyright 2013
 */

?>

<ul id="d_row_<?php echo $row; ?>" class="tb_row" style="border-bottom: 1px dotted black; ">
    <li class="tb_col" style="width:2px;"></li>
    <li class="tb_col tb_col_del_icon"><img src="<?php echo base_url().'includes/icons/'; ?>cross_10.png" title="Hapus data" alt="Hapus data" id="rvd_del_<?php echo $row; ?>"  onclick="f_del_rvd(<?php echo $row; ?>)" style="cursor:pointer;"/></li>
    <li class="tb_col tb_col_nomor"><input maxlength="3" type="text" class="no_urut tb_col_nomor" name="no_urut[<?php echo $row; ?>]" id="no_urut_<?php echo $row; ?>" value="<?php echo $row*5; ?>" /></li>
    <li class="tb_col"><input maxlength="20" type="text" class="referensi tb_col_nama_kategori" name="Nama_Kategori[<?php echo $row; ?>]" id="Nama_Kategori_<?php echo $row; ?>" value="" /></li>     
    <li class="tb_col"><input maxlength="20" type="text" class="referensi tb_col_kelompok_kategori" name="Kelompok_Kategori[<?php echo $row; ?>]" id="Kelompok_Kategori_<?php echo $row; ?>" value="" /></li>                              
</ul>