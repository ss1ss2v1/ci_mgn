
<div id="add_account_container_<?php echo $account_type ?>" class="add_account_container">
    <?php if ($message!=false) { ?>
        <div class="err_box">
            <?php echo $message; ?>
        </div>
    <?php } ?>
    <form id="frm_add_account_<?php echo $account_type ?>" method="POST" action="<?php echo base_url().'account/ajax_add_account'; ?>">
        <ul>
            <li>
                <label style="width:110px;">Nomor Rekening:</label>
                <input type="text" name="account_number" maxlength="15" title="Nomor rekening" id="account_number" value="<?php echo set_value('account_number');?>" <?php echo (form_error('account_number')!=false) ? 'style="background:#f5c8c8"' : ''; ?> />
            </li>
            <?php if (form_error('account_number')!=false) { ?>
            <li class="err_text"><?php echo form_error('account_number') ?></li>
            <?php } ?>
            <li>
                <label style="width:110px;">Nama Rekening:</label>
                <input type="text" name="account_name" maxlength="80" title="Nama rekening" id="account_name" style="width: 300px; <?php echo (form_error('account_name')!=false) ? 'background:#f5c8c8;' : ''; ?>" value="<?php echo set_value('account_name');?>" />
            </li>
            <?php if (form_error('account_name')!=false) { ?>
                <li class="err_text"><?php echo form_error('account_name') ?></li>
            <?php } ?>
            <li>
                <span onclick="f_save_account(<?php echo $account_type; ?>)" class="my_css_flat_button_mini" style="margin-left:114px;" title="Simpan">Simpan</span>
                <span onclick="f_cancel_account(<?php echo $account_type; ?>)" class="my_css_flat_button_mini"  title="Batal">Batal</span>            
            </li>
        </ul>
        <input type="hidden" name="account_type" value="<?php echo $account_type?>" />
    </form>
</div>

<?php if ($with_script) { ?> 
<script>
    function f_save_account(t)
    {
        $.ajax( { type: "POST", 
                    url: "<?php echo base_url().'account/ajax_add_account'; ?>", 
                    data: $('#frm_add_account_'+t).serialize(), 
                    success: function(data) 
                        { 
                            if (data.result) {
                             $('#acc_list_'+t).append(data.newdata);
                             alert('data berhasil disimpan'); }
                             $('#add_account_container_'+t).remove();
                             $('#acc_list_container_'+t).append(data.message);
                        }, 
                    error: function(data) { alert("Terjadi kesalahan"); },
                    dataType: 'json' });                          
    }
    function f_cancel_account(t)
    {
     $('#add_account_container_'+t).remove();   
    }
</script>
<?php } ?>