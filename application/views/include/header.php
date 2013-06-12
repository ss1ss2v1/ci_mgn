<?php

/**
 * @author Fajrie R Aradea
 * @copyright 2013
 */

?>

    <img src="<?php echo base_url().'includes/images/';?>mgn-logo.png" style="margin-top:0px;" />	
	<ul class="menuTemplate3 decor3_1" license="mylicense">
        <li><a href="<?php echo base_url() ?>">Home</a></li>
        <li class="separator"></li>
        <li><a href="#Data-Master" class="arrow">Data Master</a>
            <div class="drop decor3_2" style="width: 360px;">
                <div class='left'>
                    <b>Home</b>
                    <div>
                        <a href="#">Setup Data Perusahaan</a><br />
                        <a href="#">Daftar Pemakai</a><br />
                        <a href="<?php echo base_url().'account'; ?>">Daftar Rekening Akuntansi</a><br />
                        <a href="#">Daftar Rekening Bank</a><br />
                        <a href="<?php echo base_url().'c_customer' ?>">Daftar Pelanggan</a><br />
                        <a href="#">Daftar Supplier</a><br />
                        <a href="<?php echo base_url().'c_kategori' ?>">Kategori Persediaan</a><br />
                        <a href="<?php echo base_url().'c_stok' ?>">Daftar Persediaan</a>
                    </div>
                </div>
                <div class='left' style="text-align:right; width:160px;">
                    <img src="<?php echo base_url().'includes/images/'; ?>hd7.png" style="width:128px; height:128px;" /><br />
                    <a href="#">Hubungi Kami</a>
                </div>                
                <div style='clear: both;'></div>
            </div>
        </li>
    <li class="separator"></li>
    <li><a href="#Akunting" class="arrow">Akuntansi & Keuangan</a>
        <div class="drop decor3_2" style="width: 200px;">
            <div class='left'>
                <b>Akuntansi</b>
                <div>
                    <a href="#">Jurnal Double Entry</a><br />
                    <a href="#">Jurnal Single Entry</a><br />
                </div>
                <b>Keuangan</b>
                <div>
                    <a href="<?php echo base_url().'receipt_voucher'; ?>">Penerimaan Kas/Bank</a><br />
                    <a href="<?php echo base_url().'payment_voucher'; ?>">Pengeluaran Kas/Bank</a><br />
                    -----------------------------<br />
                    <a href="#">Terima Faktur Tagihan</a><br />
                    <a href="#">Pembayaran Faktur Tagihan</a><br />
                </div>
            </div>
        </div>
    </li>
    <li class="separator"></li>
    <li><a href="#Web-Menu" class="arrow">Pengadaan</a>
        <div class="drop decor3_2 dropToLeft2" style="width: 200px;">
            <div class='left'>
                <b>Pengadaan Barang</b>
                <div>
                    <a href="#">Permintaan Pembeliaan</a><br />
                    <a href="#">Pesanan Pembelian</a><br />
                </div>
                <b>Gudang</b>
                <div>
                    <a href="#">Penerimaan Barang</a><br />
                    <a href="#">Retur</a><br />
                </div>
            </div>
        </div>
    </li>
    <li class="separator"></li>
</ul>