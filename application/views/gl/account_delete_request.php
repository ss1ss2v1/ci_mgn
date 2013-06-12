
<div id="delete_account_container_<?php echo $account['Account_Type'] ?>" class="delete_account_container">
    <?php if ($message!=false) { ?>
        <div class="err_box">
            <?php echo $message; ?>
        </div>
    <?php } ?>
    <div class="warning_box">
        <p>Perhatian ! : Data yang sudah dihapus tidak dapat dikembalikan</p>
    </div>    
    <form id="frm_delete_account_<?php echo $account['Account_Type'] ?>" method="POST" action="<?php echo base_url().'account/ajax_delete_account'; ?>">    
        <ul>
            <li><label style="width:114px;">Nomor Rekening:</label><span><strong><?php echo $account['Account_Number']; ?></strong></span></li>
            <li><label style="width:114px;">Nama Rekening:</label><span><strong><?php echo $account['Account_Name']; ?></strong></span></li>
            <li><label style="width:114px;">Tipe Rekening:</label><span><strong><?php echo $account['Account_Type_Name']; ?></strong></span></li>
            <li>
                <span onclick="f_delete_account_request(<?php echo $account['Account_Type']; ?>)" class="my_css_flat_button_mini" style="margin-left:114px;" title="Simpan">Hapus</span>
                <span onclick="f_cancel_delete_account(<?php echo $account['Account_Type']; ?>)" class="my_css_flat_button_mini" title="Batal">Batal</span>            
            </li>
        </ul>
        <input type="hidden" name="account_number" value="<?php echo $account['Account_Number']; ?>" />
        <input type="hidden" name="account_type" value="<?php echo $account['Account_Type']; ?>" />
    </form>
</div>

<?php if ($with_script) { ?> 
<script>
    function f_delete_account_request(t)
    {
        $.ajax( { type: "POST", 
                    url: "<?php echo base_url().'account/ajax_delete_account'; ?>", 
                    data: $('#frm_delete_account_'+t).serialize(), 
                    success: function(data) 
                        { 
                            if (data.result) {
                             $('#acc_'+data.target).remove();
                             $('#delete_account_container_'+t).remove(); } 
                            else 
                            {
                                $('#delete_account_container_'+t).remove();   
                                alert(data.message); }
                        }, 
                    error: function(data) { alert("Terjadi kesalahan"); },
                    dataType: 'json' });                          
    }
    function f_cancel_delete_account(t)
    {        
        $('#delete_account_container_'+t).remove();   
    }
</script>
<?php } ?>