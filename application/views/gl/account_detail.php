
    <span onclick="f_add_account(<?php echo $account_type; ?>)" class="my_css_flat_button_mini" style="margin-left:10px;" title="Tambah rekening baru">Tambah</span>
        <ul id="acc_list_<?php echo $account_type; ?>" class="acc_list">
        <?php if ($account != false) { ?>
            <?php foreach ($account as $acc) { ?>
                <li id="acc_<?php echo str_replace('.','',$acc['Account_Number']); ?>"> 
                    <ul class="acc_detail_row">
                        <li class="tb_col" style="width:14px"><img src="<?php echo base_url().'includes/icons/'; ?>cross_10.png" title="Hapus rekening" onclick="f_delete_account(<?php echo $account_type; ?>,'<?php echo $acc['Account_Number']; ?>')" /></li>                        
                        <li class="tb_col" style="width:14px"><img src="<?php echo base_url().'includes/icons/'; ?>edit_10.png" title="Ubah rekening" onclick="f_edit_account(<?php echo $account_type; ?>, '<?php echo $acc['Account_Number']; ?>')" /></li>                        
                        <li class="tb_col" style="width:100px"><?php echo $acc['Account_Number']; ?></li>
                        <li class="tb_col" style="width:260px"><?php echo $acc['Account_Name']; ?></li>
                    </ul>
                </li>
            <?php } ?>
    <?php } ?>
        </ul>        
    
<script>
    function f_add_account(t) 
    {
        if ( $('#delete_account_container_'+t).is(':visible'))  $('#delete_account_container_'+t).remove();        
        if ( $('#edit_account_container_'+t).is(':visible'))  $('#edit_account_container_'+t).remove();        
        if (! $('#add_account_container_'+t).is(':visible'))  
        {        
            var jq = $.get("<?php echo base_url().'account/ajax_add_request?t='; ?>" + t, function(data){if (data.result) { $('#acc_list_container_'+t).append(data.message); } else alert('gagal membuka halaman');}, "json") ; 
        }        
    }
    
    function f_edit_account(t,s)
    {
        if ( $('#edit_account_container_'+t).is(':visible'))  $('#edit_account_container_'+t).remove();        
        if ( $('#delete_account_container_'+t).is(':visible'))  $('#delete_account_container_'+t).remove();        
        if ( $('#add_account_container_'+t).is(':visible'))  $('#add_account_container_'+t).remove();        
        var jq = $.get("<?php echo base_url().'account/ajax_edit_request?t='; ?>" + t + "&s=" + s, function(data){if (data.result) { $('#acc_list_container_'+t).append(data.message); } else alert('gagal membuka halaman');}, "json") ; 
    }

    function f_delete_account(t,s)
    {
        if ( $('#delete_account_container_'+t).is(':visible'))  $('#delete_account_container_'+t).remove();        
        if ( $('#edit_account_container_'+t).is(':visible'))  $('#edit_account_container_'+t).remove();        
        if ( $('#add_account_container_'+t).is(':visible'))  $('#add_account_container_'+t).remove(); 
        var jq = $.get("<?php echo base_url().'account/ajax_delete_request?t='; ?>" + t + "&s=" + s, function(data){if (data.result) { $('#acc_list_container_'+t).append(data.message); } else alert('gagal membuka halaman');}, "json") ; 
    }
    
</script>
