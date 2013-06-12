
<div id="edit_account_container_<?php echo $account_type ?>" class="edit_account_container">
    <?php if ($message!=false) { ?>
        <div class="err_box">
            <?php echo $message; ?>
        </div>
    <?php } ?>
    <form id="frm_edit_account_<?php echo $account_type ?>" method="POST" action="<?php echo base_url().'account/ajax_edit_account'; ?>">
        <ul>
            <li>
                <label style="width:110px;">Nomor Rekening:</label>
                <span><strong><?php echo $account_number; ?></strong></span>
            </li>
            <li>
                <label style="width:110px;">Nama Rekening:</label>
                <input type="text" name="account_name" maxlength="80" title="Nama rekening" id="account_name" style="width: 300px; <?php echo (form_error('account_name')!=false) ? 'background:#f5c8c8;' : ''; ?>" value="<?php echo set_value('account_name', $account_name);?>" />
            </li>
            <?php if (form_error('account_name')!=false) { ?>
                <li class="err_text"><?php echo form_error('account_name') ?></li>
            <?php } ?>
            <li>
                <span onclick="f_save_edit_account(<?php echo $account_type; ?>)" class="my_css_flat_button_mini" style="margin-left:114px;" title="Simpan">Simpan</span>
                <span onclick="f_cancel_edit_account(<?php echo $account_type; ?>)" class="my_css_flat_button_mini"  title="Batal">Batal</span>            
            </li>
        </ul>
        <input type="hidden" name="account_number" value="<?php echo $account_number; ?>" />
        <input type="hidden" name="account_type" value="<?php echo $account_type; ?>" />
    </form>
</div>

<?php if ($with_script) { ?> 
<script>
    function f_save_edit_account(t)
    {
        $.ajax( { type: "POST", 
                    url: "<?php echo base_url().'account/ajax_edit_account'; ?>", 
                    data: $('#frm_edit_account_'+t).serialize(), 
                    success: function(data) 
                        { 
                            if (data.result) {
                             $('#acc_'+data.target).empty().append(data.newdata);
                             $('#edit_account_container_'+t).remove(); } 
                            else 
                            {
                              $('#edit_account_container_'+t).remove();
                              $('#acc_list_container_'+t).append(data.message); }                                 
                        }, 
                    error: function(data) { alert("Terjadi kesalahan"); },
                    dataType: 'json' });                          
    }
    function f_cancel_edit_account(t)
    {
     $('#edit_account_container_'+t).remove();   
    }
</script>
<?php } ?>