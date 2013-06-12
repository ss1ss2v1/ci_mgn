/*
SQLyog Ultimate v8.82 
MySQL - 5.5.16 : Database - dbmgn
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`dbmgn` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `dbmgn`;

/*Table structure for table `account` */

DROP TABLE IF EXISTS `account`;

CREATE TABLE `account` (
  `Account_Number` varchar(15) NOT NULL,
  `Account_Name` varchar(80) DEFAULT NULL,
  `Account_Type` varchar(20) DEFAULT NULL,
  `Account_Is_Group` tinyint(4) DEFAULT '0' COMMENT 'Header atau Detail',
  `Account_Level` tinyint(4) DEFAULT '1' COMMENT 'Otomatis di code saat tambah account baru',
  `Account_Parent` varchar(15) DEFAULT NULL COMMENT 'Otomatis di tentukan saat tambah account',
  `Account_Flag` int(4) DEFAULT '0' COMMENT 'Untuk kebutuhan khusus.',
  `Account_Currency` varchar(3) DEFAULT 'IDR',
  `Account_Reconcialable` tinyint(4) DEFAULT '1',
  `Account_Budget_Percentage` decimal(10,0) DEFAULT '100',
  `OriginalSourceNumber` varchar(20) DEFAULT NULL COMMENT 'Cadangan',
  `OriginalDBName` text COMMENT 'Cadangan',
  `Is_Single_Currency` tinyint(4) DEFAULT '1' COMMENT 'Cadangan',
  `Included_In_Daily_Cash` tinyint(4) DEFAULT '0' COMMENT 'Hanya utk rekening Kas/Bank',
  `Included_In_Revaluation` tinyint(4) DEFAULT '0' COMMENT 'Hanya utk Aktiva Tetap',
  `Included_In_Depreciation` tinyint(4) DEFAULT '0' COMMENT 'Hanya utk Aktiva Tetap',
  `Kode_Bank_Indonesia` varchar(10) DEFAULT NULL COMMENT 'Cadangan',
  `Kode_Laporan_BI_1` varchar(12) DEFAULT NULL COMMENT 'Cadangan',
  `Kode_Laporan_BI_2` varchar(12) DEFAULT NULL COMMENT 'Cadangan',
  `Kode_Laporan_BI_3` varchar(12) DEFAULT NULL COMMENT 'Cadangan',
  `Kode_Laporan_BI_4` varchar(12) DEFAULT NULL COMMENT 'Cadangan',
  `Kode_Laporan_BI_5` varchar(12) DEFAULT NULL COMMENT 'Cadangan',
  `Kode_Laporan_BI_6` varchar(12) DEFAULT NULL COMMENT 'Cadangan',
  `Account_Is_Active` tinyint(4) DEFAULT '1' COMMENT '0=Non Aktif 1=Aktif',
  `Created_By` varchar(32) DEFAULT NULL COMMENT 'user ID Hash',
  `Created_Date` datetime DEFAULT NULL,
  `Creator_Ip` varchar(100) DEFAULT NULL,
  `Disactivated_By` varchar(32) DEFAULT NULL COMMENT 'User ID Hash',
  `Disactivated_Date` datetime DEFAULT NULL,
  `Disactivated_Ip` varchar(100) DEFAULT NULL,
  `Disactivated_Switch_Balance_To` varchar(15) DEFAULT NULL COMMENT 'Saldo di oper ke no rekening',
  `Last_Updated_By` varchar(32) DEFAULT NULL,
  `Last_Updated_Date` datetime DEFAULT NULL,
  `Last_Updated_Ip` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Account_Number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `account` */

insert  into `account`(`Account_Number`,`Account_Name`,`Account_Type`,`Account_Is_Group`,`Account_Level`,`Account_Parent`,`Account_Flag`,`Account_Currency`,`Account_Reconcialable`,`Account_Budget_Percentage`,`OriginalSourceNumber`,`OriginalDBName`,`Is_Single_Currency`,`Included_In_Daily_Cash`,`Included_In_Revaluation`,`Included_In_Depreciation`,`Kode_Bank_Indonesia`,`Kode_Laporan_BI_1`,`Kode_Laporan_BI_2`,`Kode_Laporan_BI_3`,`Kode_Laporan_BI_4`,`Kode_Laporan_BI_5`,`Kode_Laporan_BI_6`,`Account_Is_Active`,`Created_By`,`Created_Date`,`Creator_Ip`,`Disactivated_By`,`Disactivated_Date`,`Disactivated_Ip`,`Disactivated_Switch_Balance_To`,`Last_Updated_By`,`Last_Updated_Date`,`Last_Updated_Ip`) values ('1','Harta','1',1,1,NULL,0,'IDR',1,'100',NULL,NULL,1,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('1100.0001','Kas','1',0,2,'1',1,'IDR',1,'100',NULL,NULL,1,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'System','2013-02-25 09:15:56','127.0.0.1',NULL,NULL,NULL,NULL,NULL,NULL,NULL),('1100.0002','Bank 1','1',0,2,'1',2,'IDR',1,'100',NULL,NULL,1,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('1100.0005','Bank 2','1',0,2,'1',2,'IDR',1,'100',NULL,NULL,1,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'System','2013-02-20 01:55:27','::1',NULL,NULL,NULL,NULL,NULL,NULL,NULL),('2','Hutang','2',1,1,NULL,0,'IDR',1,'100',NULL,NULL,1,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('2100.0001','Hutang yuuuuk','2',0,2,'2',2,'IDR',1,'100',NULL,NULL,1,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'System','2013-02-20 01:56:53','::1',NULL,NULL,NULL,NULL,'System','2013-02-20 07:01:32','::1'),('2100.0002','Hutang Elu','2',0,2,'2',0,'IDR',1,'100',NULL,NULL,1,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'System','2013-02-20 01:57:57','127.0.0.1',NULL,NULL,NULL,NULL,NULL,NULL,NULL),('3','Modal','3',1,1,NULL,0,'IDR',1,'100',NULL,NULL,1,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('3100.0001','Modal Gue','3',0,2,'3',0,'IDR',1,'100',NULL,NULL,1,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'System','2013-02-20 01:57:39','127.0.0.1',NULL,NULL,NULL,NULL,NULL,NULL,NULL),('4','Pendapatan','4',1,1,NULL,0,'IDR',1,'100',NULL,NULL,1,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('4101.0001','Pendapatan Usaha','4',0,2,'4',0,'IDR',1,'100',NULL,NULL,1,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'System','2013-02-20 05:15:02','127.0.0.1',NULL,NULL,NULL,NULL,NULL,NULL,NULL),('5','Biaya','5',1,1,NULL,0,'IDR',1,'100',NULL,NULL,1,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `account_flag` */

DROP TABLE IF EXISTS `account_flag`;

CREATE TABLE `account_flag` (
  `Account_Flag` int(4) NOT NULL DEFAULT '0',
  `Account_Flag_Name` varchar(80) DEFAULT NULL,
  `Account_Flag_Type` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`Account_Flag`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `account_flag` */

insert  into `account_flag`(`Account_Flag`,`Account_Flag_Name`,`Account_Flag_Type`) values (0,'Lain-lain',1),(1,'Kas',1),(2,'Bank',1),(3,'Persediaan Barang Dagangan',1),(4,'Persediaan Bahan Baku',1),(5,'Persediaan Barang Setengah Jadi',1),(6,'Piutang Dagang/Usaha',1),(7,'Aktiva Tetap',1),(8,'Amortisasi/Penyusutan',1),(9,'Uang Muka Pembelian',1),(31,'Hutang Dagang/Usaha',2),(32,'Hutang Afiliasi',2),(33,'Hutang Pemegang Saham',2),(34,'Hutang Leasing',2),(35,'Uang Muka Penjualan',2),(40,'Hutang Pajak',2),(41,'Biaya YMH Dibayar',2),(42,'Hutang Tidak Lancar',2),(43,'Hutang Bank',2),(61,'Laba/Rugi Tahun Berjalan',3),(62,'Laba/Rugi Tahun Lalu',3),(91,'Pendapatan',4),(92,'Pendapatan Lain-lain',4),(121,'Harga Pokok Penjualan',5),(122,'Biaya Operasional (Umum)',5),(123,'Biaya Amortisasi/Penyusutan',5),(124,'Biaya Lain-lain',5),(125,'Pajak',5),(126,'Biaya Selisih Kurs',5),(201,'Biaya Pegawai',5),(202,'Biaya Administrasi Umum',5);

/*Table structure for table `account_mutasi` */

DROP TABLE IF EXISTS `account_mutasi`;

CREATE TABLE `account_mutasi` (
  `Tahun_Buku` int(11) NOT NULL DEFAULT '2012',
  `Account_Number` varchar(15) NOT NULL,
  `Currency_ID` varchar(3) NOT NULL DEFAULT 'IDR',
  `Beginning_Balance` double DEFAULT '0',
  `Debet_01` double DEFAULT '0',
  `Debet_02` double DEFAULT '0',
  `Debet_03` double DEFAULT '0',
  `Debet_04` double DEFAULT '0',
  `Debet_05` double DEFAULT '0',
  `Debet_06` double DEFAULT '0',
  `Debet_07` double DEFAULT '0',
  `Debet_08` double DEFAULT '0',
  `Debet_09` double DEFAULT '0',
  `Debet_10` double DEFAULT '0',
  `Debet_11` double DEFAULT '0',
  `Debet_12` double DEFAULT '0',
  `Kredit_01` double DEFAULT '0',
  `Kredit_02` double DEFAULT '0',
  `Kredit_03` double DEFAULT '0',
  `Kredit_04` double DEFAULT '0',
  `Kredit_05` double DEFAULT '0',
  `Kredit_06` double DEFAULT '0',
  `Kredit_07` double DEFAULT '0',
  `Kredit_08` double DEFAULT '0',
  `Kredit_09` double DEFAULT '0',
  `Kredit_10` double DEFAULT '0',
  `Kredit_11` double DEFAULT '0',
  `Kredit_12` double DEFAULT '0',
  `R_Balance` double DEFAULT '0',
  `RB_Debet_01` double DEFAULT '0',
  `RB_Debet_02` double DEFAULT '0',
  `RB_Debet_03` double DEFAULT '0',
  `RB_Debet_04` double DEFAULT '0',
  `RB_Debet_05` double DEFAULT '0',
  `RB_Debet_06` double DEFAULT '0',
  `RB_Debet_07` double DEFAULT '0',
  `RB_Debet_08` double DEFAULT '0',
  `RB_Debet_09` double DEFAULT '0',
  `RB_Debet_10` double DEFAULT '0',
  `RB_Debet_11` double DEFAULT '0',
  `RB_Debet_12` double DEFAULT '0',
  `RB_Kredit_01` double DEFAULT '0',
  `RB_Kredit_02` double DEFAULT '0',
  `RB_Kredit_03` double DEFAULT '0',
  `RB_Kredit_04` double DEFAULT '0',
  `RB_Kredit_05` double DEFAULT '0',
  `RB_Kredit_06` double DEFAULT '0',
  `RB_Kredit_07` double DEFAULT '0',
  `RB_Kredit_08` double DEFAULT '0',
  `RB_Kredit_09` double DEFAULT '0',
  `RB_Kredit_10` double DEFAULT '0',
  `RB_Kredit_11` double DEFAULT '0',
  `RB_Kredit_12` double DEFAULT '0',
  PRIMARY KEY (`Tahun_Buku`,`Account_Number`,`Currency_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `account_mutasi` */

insert  into `account_mutasi`(`Tahun_Buku`,`Account_Number`,`Currency_ID`,`Beginning_Balance`,`Debet_01`,`Debet_02`,`Debet_03`,`Debet_04`,`Debet_05`,`Debet_06`,`Debet_07`,`Debet_08`,`Debet_09`,`Debet_10`,`Debet_11`,`Debet_12`,`Kredit_01`,`Kredit_02`,`Kredit_03`,`Kredit_04`,`Kredit_05`,`Kredit_06`,`Kredit_07`,`Kredit_08`,`Kredit_09`,`Kredit_10`,`Kredit_11`,`Kredit_12`,`R_Balance`,`RB_Debet_01`,`RB_Debet_02`,`RB_Debet_03`,`RB_Debet_04`,`RB_Debet_05`,`RB_Debet_06`,`RB_Debet_07`,`RB_Debet_08`,`RB_Debet_09`,`RB_Debet_10`,`RB_Debet_11`,`RB_Debet_12`,`RB_Kredit_01`,`RB_Kredit_02`,`RB_Kredit_03`,`RB_Kredit_04`,`RB_Kredit_05`,`RB_Kredit_06`,`RB_Kredit_07`,`RB_Kredit_08`,`RB_Kredit_09`,`RB_Kredit_10`,`RB_Kredit_11`,`RB_Kredit_12`) values (2012,'1100.0002','IDR',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);

/*Table structure for table `account_mutasi_identitas` */

DROP TABLE IF EXISTS `account_mutasi_identitas`;

CREATE TABLE `account_mutasi_identitas` (
  `Tahun_Buku` int(11) NOT NULL DEFAULT '2012',
  `Identitas` varchar(20) NOT NULL DEFAULT 'GENERAL',
  `Account_Number` varchar(15) NOT NULL,
  `Currency_ID` varchar(3) NOT NULL DEFAULT 'IDR',
  `Beginning_Balance` double DEFAULT '0',
  `Debet_01` double DEFAULT '0',
  `Debet_02` double DEFAULT '0',
  `Debet_03` double DEFAULT '0',
  `Debet_04` double DEFAULT '0',
  `Debet_05` double DEFAULT '0',
  `Debet_06` double DEFAULT '0',
  `Debet_07` double DEFAULT '0',
  `Debet_08` double DEFAULT '0',
  `Debet_09` double DEFAULT '0',
  `Debet_10` double DEFAULT '0',
  `Debet_11` double DEFAULT '0',
  `Debet_12` double DEFAULT '0',
  `Kredit_01` double DEFAULT '0',
  `Kredit_02` double DEFAULT '0',
  `Kredit_03` double DEFAULT '0',
  `Kredit_04` double DEFAULT '0',
  `Kredit_05` double DEFAULT '0',
  `Kredit_06` double DEFAULT '0',
  `Kredit_07` double DEFAULT '0',
  `Kredit_08` double DEFAULT '0',
  `Kredit_09` double DEFAULT '0',
  `Kredit_10` double DEFAULT '0',
  `Kredit_11` double DEFAULT '0',
  `Kredit_12` double DEFAULT '0',
  `R_Balance` double DEFAULT '0',
  `RB_Debet_01` double DEFAULT '0',
  `RB_Debet_02` double DEFAULT '0',
  `RB_Debet_03` double DEFAULT '0',
  `RB_Debet_04` double DEFAULT '0',
  `RB_Debet_05` double DEFAULT '0',
  `RB_Debet_06` double DEFAULT '0',
  `RB_Debet_07` double DEFAULT '0',
  `RB_Debet_08` double DEFAULT '0',
  `RB_Debet_09` double DEFAULT '0',
  `RB_Debet_10` double DEFAULT '0',
  `RB_Debet_11` double DEFAULT '0',
  `RB_Debet_12` double DEFAULT '0',
  `RB_Kredit_01` double DEFAULT '0',
  `RB_Kredit_02` double DEFAULT '0',
  `RB_Kredit_03` double DEFAULT '0',
  `RB_Kredit_04` double DEFAULT '0',
  `RB_Kredit_05` double DEFAULT '0',
  `RB_Kredit_06` double DEFAULT '0',
  `RB_Kredit_07` double DEFAULT '0',
  `RB_Kredit_08` double DEFAULT '0',
  `RB_Kredit_09` double DEFAULT '0',
  `RB_Kredit_10` double DEFAULT '0',
  `RB_Kredit_11` double DEFAULT '0',
  `RB_Kredit_12` double DEFAULT '0',
  PRIMARY KEY (`Tahun_Buku`,`Identitas`,`Account_Number`,`Currency_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `account_mutasi_identitas` */

/*Table structure for table `account_mutasi_project` */

DROP TABLE IF EXISTS `account_mutasi_project`;

CREATE TABLE `account_mutasi_project` (
  `Tahun_Buku` int(11) NOT NULL DEFAULT '2012',
  `Project_Number` varchar(20) NOT NULL,
  `Account_Number` varchar(15) NOT NULL,
  `Currency_ID` varchar(3) NOT NULL DEFAULT 'IDR',
  `Beginning_Balance` double DEFAULT '0',
  `Debet_01` double DEFAULT '0',
  `Debet_02` double DEFAULT '0',
  `Debet_03` double DEFAULT '0',
  `Debet_04` double DEFAULT '0',
  `Debet_05` double DEFAULT '0',
  `Debet_06` double DEFAULT '0',
  `Debet_07` double DEFAULT '0',
  `Debet_08` double DEFAULT '0',
  `Debet_09` double DEFAULT '0',
  `Debet_10` double DEFAULT '0',
  `Debet_11` double DEFAULT '0',
  `Debet_12` double DEFAULT '0',
  `Kredit_01` double DEFAULT '0',
  `Kredit_02` double DEFAULT '0',
  `Kredit_03` double DEFAULT '0',
  `Kredit_04` double DEFAULT '0',
  `Kredit_05` double DEFAULT '0',
  `Kredit_06` double DEFAULT '0',
  `Kredit_07` double DEFAULT '0',
  `Kredit_08` double DEFAULT '0',
  `Kredit_09` double DEFAULT '0',
  `Kredit_10` double DEFAULT '0',
  `Kredit_11` double DEFAULT '0',
  `Kredit_12` double DEFAULT '0',
  `R_Balance` double DEFAULT '0',
  `RB_Debet_01` double DEFAULT '0',
  `RB_Debet_02` double DEFAULT '0',
  `RB_Debet_03` double DEFAULT '0',
  `RB_Debet_04` double DEFAULT '0',
  `RB_Debet_05` double DEFAULT '0',
  `RB_Debet_06` double DEFAULT '0',
  `RB_Debet_07` double DEFAULT '0',
  `RB_Debet_08` double DEFAULT '0',
  `RB_Debet_09` double DEFAULT '0',
  `RB_Debet_10` double DEFAULT '0',
  `RB_Debet_11` double DEFAULT '0',
  `RB_Debet_12` double DEFAULT '0',
  `RB_Kredit_01` double DEFAULT '0',
  `RB_Kredit_02` double DEFAULT '0',
  `RB_Kredit_03` double DEFAULT '0',
  `RB_Kredit_04` double DEFAULT '0',
  `RB_Kredit_05` double DEFAULT '0',
  `RB_Kredit_06` double DEFAULT '0',
  `RB_Kredit_07` double DEFAULT '0',
  `RB_Kredit_08` double DEFAULT '0',
  `RB_Kredit_09` double DEFAULT '0',
  `RB_Kredit_10` double DEFAULT '0',
  `RB_Kredit_11` double DEFAULT '0',
  `RB_Kredit_12` double DEFAULT '0',
  PRIMARY KEY (`Tahun_Buku`,`Project_Number`,`Account_Number`,`Currency_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `account_mutasi_project` */

/*Table structure for table `account_mutasi_unit` */

DROP TABLE IF EXISTS `account_mutasi_unit`;

CREATE TABLE `account_mutasi_unit` (
  `Tahun_Buku` int(11) NOT NULL DEFAULT '2012',
  `Unit_Code` varchar(4) NOT NULL DEFAULT '0000',
  `Account_Number` varchar(15) NOT NULL,
  `Currency_ID` varchar(3) NOT NULL DEFAULT 'IDR',
  `Beginning_Balance` double DEFAULT '0',
  `Debet_01` double DEFAULT '0',
  `Debet_02` double DEFAULT '0',
  `Debet_03` double DEFAULT '0',
  `Debet_04` double DEFAULT '0',
  `Debet_05` double DEFAULT '0',
  `Debet_06` double DEFAULT '0',
  `Debet_07` double DEFAULT '0',
  `Debet_08` double DEFAULT '0',
  `Debet_09` double DEFAULT '0',
  `Debet_10` double DEFAULT '0',
  `Debet_11` double DEFAULT '0',
  `Debet_12` double DEFAULT '0',
  `Kredit_01` double DEFAULT '0',
  `Kredit_02` double DEFAULT '0',
  `Kredit_03` double DEFAULT '0',
  `Kredit_04` double DEFAULT '0',
  `Kredit_05` double DEFAULT '0',
  `Kredit_06` double DEFAULT '0',
  `Kredit_07` double DEFAULT '0',
  `Kredit_08` double DEFAULT '0',
  `Kredit_09` double DEFAULT '0',
  `Kredit_10` double DEFAULT '0',
  `Kredit_11` double DEFAULT '0',
  `Kredit_12` double DEFAULT '0',
  `R_Balance` double DEFAULT '0',
  `RB_Debet_01` double DEFAULT '0',
  `RB_Debet_02` double DEFAULT '0',
  `RB_Debet_03` double DEFAULT '0',
  `RB_Debet_04` double DEFAULT '0',
  `RB_Debet_05` double DEFAULT '0',
  `RB_Debet_06` double DEFAULT '0',
  `RB_Debet_07` double DEFAULT '0',
  `RB_Debet_08` double DEFAULT '0',
  `RB_Debet_09` double DEFAULT '0',
  `RB_Debet_10` double DEFAULT '0',
  `RB_Debet_11` double DEFAULT '0',
  `RB_Debet_12` double DEFAULT '0',
  `RB_Kredit_01` double DEFAULT '0',
  `RB_Kredit_02` double DEFAULT '0',
  `RB_Kredit_03` double DEFAULT '0',
  `RB_Kredit_04` double DEFAULT '0',
  `RB_Kredit_05` double DEFAULT '0',
  `RB_Kredit_06` double DEFAULT '0',
  `RB_Kredit_07` double DEFAULT '0',
  `RB_Kredit_08` double DEFAULT '0',
  `RB_Kredit_09` double DEFAULT '0',
  `RB_Kredit_10` double DEFAULT '0',
  `RB_Kredit_11` double DEFAULT '0',
  `RB_Kredit_12` double DEFAULT '0',
  PRIMARY KEY (`Tahun_Buku`,`Unit_Code`,`Account_Number`,`Currency_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `account_mutasi_unit` */

/*Table structure for table `account_type` */

DROP TABLE IF EXISTS `account_type`;

CREATE TABLE `account_type` (
  `Account_Type` tinyint(4) NOT NULL DEFAULT '1',
  `Account_Type_Name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Account_Type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `account_type` */

insert  into `account_type`(`Account_Type`,`Account_Type_Name`) values (1,'Aktiva'),(2,'Pasiva Hutang'),(3,'Pasiva Modal'),(4,'Pendapatan'),(5,'Biaya-biaya');

/*Table structure for table `ap_supplier_accounts` */

DROP TABLE IF EXISTS `ap_supplier_accounts`;

CREATE TABLE `ap_supplier_accounts` (
  `Kode_Supplier` varchar(20) NOT NULL,
  `Kode_Mata_Uang` varchar(3) NOT NULL DEFAULT 'IDR' COMMENT 'CurrencyID',
  `Rekening_Kas_Bank_Pembayar` varchar(15) DEFAULT NULL COMMENT 'dari tabel account tipe 1',
  `Rekening_Hutang` varchar(15) DEFAULT NULL COMMENT 'dari tabel account tipe 2',
  `Rekening_Deposit` varchar(15) DEFAULT NULL COMMENT 'dari tabel account tipe 1',
  `Nama_Bank_Penerima` varchar(30) DEFAULT NULL,
  `Cabang_Bank_Penerima` varchar(40) DEFAULT NULL,
  `Alamat_Bank_Penerima` varchar(80) DEFAULT NULL,
  `Swift_Code_Bank_Penerima` varchar(10) DEFAULT NULL,
  `Nomor_Rekening_Bank_Penerima` varchar(20) DEFAULT NULL,
  `Nama_Rekening_Bank_Penerima` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Kode_Supplier`,`Kode_Mata_Uang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ap_supplier_accounts` */

/*Table structure for table `ap_supplier_historis` */

DROP TABLE IF EXISTS `ap_supplier_historis`;

CREATE TABLE `ap_supplier_historis` (
  `Nomor_Record` bigint(20) NOT NULL AUTO_INCREMENT,
  `Kode_Supplier` varchar(20) NOT NULL,
  `Periode` varchar(6) NOT NULL,
  `Kode_Mata_Uang` varchar(3) DEFAULT 'IDR' COMMENT 'CurrencyID',
  `Saldo_Awal` double DEFAULT '0',
  `Pembayaran_Deposit` double DEFAULT '0',
  `Pembelian` double DEFAULT '0',
  `Nota_Debet` double DEFAULT '0',
  `Nota_Kredit` double DEFAULT '0',
  `Pembayaran` double DEFAULT '0',
  `Retur` double DEFAULT '0',
  `Saldo_Akhir` double DEFAULT '0' COMMENT 'Cadangan',
  `Saldo_Awal_PPn` double DEFAULT '0',
  `Ppn_Pembelian` double DEFAULT '0',
  `Ppn_Nota_Debet` double DEFAULT '0',
  `Ppn_Nota_Kredit` double DEFAULT '0',
  `Ppn_Retur` double DEFAULT '0',
  `Saldo_Akhir_Ppn` double DEFAULT '0',
  PRIMARY KEY (`Kode_Supplier`,`Periode`),
  UNIQUE KEY `Nomor_Record` (`Nomor_Record`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ap_supplier_historis` */

/*Table structure for table `ap_supplier_transaksi` */

DROP TABLE IF EXISTS `ap_supplier_transaksi`;

CREATE TABLE `ap_supplier_transaksi` (
  `Nomor_Record` bigint(20) NOT NULL AUTO_INCREMENT,
  `Kode_Supplier` varchar(20) DEFAULT NULL,
  `Tanggal_Transaksi` datetime DEFAULT NULL,
  `Periode` varchar(6) DEFAULT NULL,
  `Jenis_Transaksi` varchar(2) DEFAULT NULL COMMENT 'CR=Buy, DB=Pay, DN=Debet Note, CN=Credit Note',
  `Nilai_Transaksi_IDR` double DEFAULT '0',
  `Nilai_Transaksi_Asing` double DEFAULT '0',
  `Kode_Referensi_1` varchar(20) DEFAULT NULL,
  `Kode_Referensi_2` varchar(20) DEFAULT NULL,
  `Kode_Referensi_3` varchar(20) DEFAULT NULL,
  `Unit_Code` varchar(4) DEFAULT NULL COMMENT 'Cadangan, sudah ada ditransaksi masing2',
  PRIMARY KEY (`Nomor_Record`),
  KEY `Kode_Supplier` (`Kode_Supplier`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ap_supplier_transaksi` */

/*Table structure for table `ap_suppliers` */

DROP TABLE IF EXISTS `ap_suppliers`;

CREATE TABLE `ap_suppliers` (
  `Supplier_Nomor_Record` bigint(20) NOT NULL AUTO_INCREMENT,
  `Supplier_Kode` varchar(20) NOT NULL,
  `Supplier_Perusahaan` varchar(100) DEFAULT NULL,
  `Supplier_Kontak` varchar(80) DEFAULT NULL,
  `Supplier_Alamat` varchar(200) DEFAULT NULL,
  `Supplier_Kota` varchar(20) DEFAULT NULL,
  `Supplier_Kode_Pos` varchar(5) DEFAULT NULL,
  `Supplier_Telepon_1` varchar(20) DEFAULT NULL,
  `Supplier_Telepon_2` varchar(20) DEFAULT NULL,
  `Supplier_Fax` varchar(20) DEFAULT NULL,
  `Supplier_Email` varchar(60) DEFAULT NULL,
  `Supplier_URL` varchar(100) DEFAULT NULL,
  `Supplier_Mata_Uang` varchar(3) DEFAULT NULL,
  `Supplier_Cara_Bayar` varchar(6) DEFAULT NULL COMMENT 'Tunai / Kredit',
  `Supplier_Termin_Pembayaran` smallint(6) DEFAULT '30' COMMENT 'Hari jangka waktu',
  `Supplier_Kode_Diskon` varchar(2) DEFAULT NULL COMMENT 'Cadangan',
  `Supplier_Kode_Khusus` varchar(2) DEFAULT NULL COMMENT 'Cadangan',
  `Supplier_Kode_Nilai_Tukar` varchar(2) DEFAULT NULL COMMENT 'Cadangan (Currency Rate Code)',
  `Supplier_Akumulasi_Debet` double DEFAULT '0',
  `Supplier_Akumulasi_Kredit` double DEFAULT '0',
  `Supplier_Akumulasi_Deposit` double DEFAULT '0',
  `Supplier_Saldo_Debet` double DEFAULT '0',
  `Supplier_Saldo_Kredit` double DEFAULT '0',
  `Supplier_Saldo_Deposit` double DEFAULT '0',
  `Supplier_Pakai_Pajak` tinyint(4) DEFAULT '1' COMMENT '0=Non Tax 1=Taxable',
  `Supplier_NPWP` varchar(20) DEFAULT NULL,
  `Supplier_PKP` varchar(20) DEFAULT NULL,
  `Supplier_Alamat_Pajak` varchar(100) DEFAULT NULL,
  `Supplier_Tanggal_PKP` varchar(10) DEFAULT NULL,
  `Supplier_Is_Active` tinyint(4) DEFAULT '1',
  `Created_By` varchar(32) DEFAULT NULL,
  `Created_Date` datetime DEFAULT NULL,
  `Creator_Ip` varchar(60) DEFAULT NULL,
  `Last_Modified_By` varchar(32) DEFAULT NULL,
  `Last_Modified_Date` datetime DEFAULT NULL,
  `Last_Modified_IP` varchar(60) DEFAULT NULL,
  `Disactivated_By` varchar(32) DEFAULT NULL,
  `Disactivated_Date` datetime DEFAULT NULL,
  `Disactivated_IP` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`Supplier_Kode`),
  UNIQUE KEY `Supplier_Nomor_Record` (`Supplier_Nomor_Record`),
  CONSTRAINT `FK_ap_suppliers` FOREIGN KEY (`Supplier_Kode`) REFERENCES `ap_supplier_transaksi` (`Kode_Supplier`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ap_suppliers` */

/*Table structure for table `ar_customer_accounts` */

DROP TABLE IF EXISTS `ar_customer_accounts`;

CREATE TABLE `ar_customer_accounts` (
  `Kode_Customer` varchar(20) NOT NULL,
  `Kode_Mata_Uang` varchar(3) NOT NULL DEFAULT 'IDR' COMMENT 'CurrencyID',
  `Rekening_Kas_Bank_Penerima` varchar(15) DEFAULT NULL COMMENT 'dari tabel account tipe 1',
  `Rekening_Piutang` varchar(15) DEFAULT NULL COMMENT 'dari tabel account tipe 2',
  `Rekening_Deposit` varchar(15) DEFAULT NULL COMMENT 'dari tabel account tipe 1',
  `Nama_Bank_Pembayar` varchar(30) DEFAULT NULL,
  `Cabang_Bank_Pembayar` varchar(40) DEFAULT NULL,
  `Alamat_Bank_Pembayar` varchar(80) DEFAULT NULL,
  `Swift_Code_Bank_Pembayar` varchar(10) DEFAULT NULL,
  `Nomor_Rekening_Bank_Pembayar` varchar(20) DEFAULT NULL,
  `Nama_Rekening_Bank_Pembayar` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Kode_Customer`,`Kode_Mata_Uang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ar_customer_accounts` */

/*Table structure for table `ar_customer_historis` */

DROP TABLE IF EXISTS `ar_customer_historis`;

CREATE TABLE `ar_customer_historis` (
  `Nomor_Record` bigint(20) NOT NULL AUTO_INCREMENT,
  `Kode_Customer` varchar(20) NOT NULL,
  `Periode` varchar(6) NOT NULL,
  `Kode_Mata_Uang` varchar(3) DEFAULT 'IDR' COMMENT 'CurrencyID',
  `Saldo_Awal` double DEFAULT '0',
  `Pembayaran_Deposit` double DEFAULT '0',
  `Penjualan` double DEFAULT '0',
  `Nota_Debet` double DEFAULT '0',
  `Nota_Kredit` double DEFAULT '0',
  `Pembayaran` double DEFAULT '0',
  `Retur` double DEFAULT '0',
  `Saldo_Akhir` double DEFAULT '0' COMMENT 'Cadangan',
  `Saldo_Awal_PPn` double DEFAULT '0',
  `Ppn_Pembelian` double DEFAULT '0',
  `Ppn_Nota_Debet` double DEFAULT '0',
  `Ppn_Nota_Kredit` double DEFAULT '0',
  `Ppn_Retur` double DEFAULT '0',
  `Saldo_Akhir_Ppn` double DEFAULT '0',
  PRIMARY KEY (`Kode_Customer`,`Periode`),
  UNIQUE KEY `Nomor_Record` (`Nomor_Record`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ar_customer_historis` */

/*Table structure for table `ar_customer_transaksi` */

DROP TABLE IF EXISTS `ar_customer_transaksi`;

CREATE TABLE `ar_customer_transaksi` (
  `Nomor_Record` bigint(20) NOT NULL AUTO_INCREMENT,
  `Kode_Customer` varchar(20) DEFAULT NULL,
  `Tanggal_Transaksi` datetime DEFAULT NULL,
  `Periode` varchar(6) DEFAULT NULL,
  `Jenis_Transaksi` varchar(2) DEFAULT NULL COMMENT 'CR=Buy, DB=Pay, DN=Debet Note, CN=Credit Note',
  `Nilai_Transaksi_IDR` double DEFAULT '0',
  `Nilai_Transaksi_Asing` double DEFAULT '0',
  `Kode_Referensi_1` varchar(20) DEFAULT NULL,
  `Kode_Referensi_2` varchar(20) DEFAULT NULL,
  `Kode_Referensi_3` varchar(20) DEFAULT NULL,
  `Unit_Code` varchar(4) DEFAULT NULL COMMENT 'Cadangan, sudah ada ditransaksi masing2',
  PRIMARY KEY (`Nomor_Record`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ar_customer_transaksi` */

/*Table structure for table `ar_customers` */

DROP TABLE IF EXISTS `ar_customers`;

CREATE TABLE `ar_customers` (
  `Customer_Nomor_Record` bigint(20) NOT NULL AUTO_INCREMENT,
  `Customer_Kode` varchar(20) NOT NULL,
  `Customer_Perusahaan` varchar(100) DEFAULT NULL,
  `Customer_Kontak` varchar(80) DEFAULT NULL,
  `Customer_Alamat` varchar(200) DEFAULT NULL,
  `Customer_Kota` varchar(20) DEFAULT NULL,
  `Customer_Kode_Pos` varchar(5) DEFAULT NULL,
  `Customer_Telepon_1` varchar(20) DEFAULT NULL,
  `Customer_Telepon_2` varchar(20) DEFAULT NULL,
  `Customer_Fax` varchar(20) DEFAULT NULL,
  `Customer_Email` varchar(60) DEFAULT NULL,
  `Customer_URL` varchar(100) DEFAULT NULL,
  `Customer_Mata_Uang` varchar(3) DEFAULT NULL,
  `Customer_Cara_Bayar` varchar(6) DEFAULT NULL COMMENT 'Tunai / Kredit',
  `Customer_Termin_Pembayaran` smallint(6) DEFAULT '30' COMMENT 'Hari jangka waktu',
  `Customer_Kode_Diskon` varchar(2) DEFAULT NULL COMMENT 'Cadangan',
  `Customer_Kode_Khusus` varchar(2) DEFAULT NULL COMMENT 'Cadangan',
  `Customer_Kode_Nilai_Tukar` varchar(2) DEFAULT NULL COMMENT 'Cadangan (Currency Rate Code)',
  `Customer_Akumulasi_Debet` double DEFAULT '0',
  `Customer_Akumulasi_Kredit` double DEFAULT '0',
  `Customer_Akumulasi_Deposit` double DEFAULT '0',
  `Customer_Saldo_Debet` double DEFAULT '0',
  `Customer_Saldo_Kredit` double DEFAULT '0',
  `Customer_Saldo_Deposit` double DEFAULT '0',
  `Customer_Pakai_Pajak` tinyint(4) DEFAULT '1' COMMENT '0=Non Tax 1=Taxable',
  `Customer_NPWP` varchar(20) DEFAULT NULL,
  `Customer_PKP` varchar(20) DEFAULT NULL,
  `Customer_Alamat_Pajak` varchar(100) DEFAULT NULL,
  `Customer_Tanggal_PKP` varchar(10) DEFAULT NULL,
  `Customer_Is_Active` tinyint(4) DEFAULT '1',
  `Created_By` varchar(32) DEFAULT NULL,
  `Created_Date` datetime DEFAULT NULL,
  `Creator_Ip` varchar(60) DEFAULT NULL,
  `Last_Modified_By` varchar(32) DEFAULT NULL,
  `Last_Modified_Date` datetime DEFAULT NULL,
  `Last_Modified_IP` varchar(60) DEFAULT NULL,
  `Disactivated_By` varchar(32) DEFAULT NULL,
  `Disactivated_Date` datetime DEFAULT NULL,
  `Disactivated_IP` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`Customer_Kode`),
  UNIQUE KEY `Customer_Nomor_Record` (`Customer_Nomor_Record`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ar_customers` */

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `category_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

/*Data for the table `category` */

insert  into `category`(`category_id`,`name`) values (1,'Action'),(2,'Animation'),(3,'Children'),(4,'Classics'),(5,'Comedy'),(6,'Documentary'),(7,'Drama'),(8,'Family'),(9,'Foreign'),(10,'Games'),(11,'Horror'),(12,'Music'),(13,'New'),(14,'Sci-Fi'),(15,'Sports'),(16,'Travel');

/*Table structure for table `ci_sessions` */

DROP TABLE IF EXISTS `ci_sessions`;

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) DEFAULT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Note: This is the default CodeIgniter session table.';

/*Data for the table `ci_sessions` */

insert  into `ci_sessions`(`session_id`,`ip_address`,`user_agent`,`last_activity`,`user_data`) values ('233ad264d08c0ee5bc45858ccee44733','::1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:18.0) Gecko/20100101 Firefox/18.0',1360971819,'a:3:{s:9:\"user_data\";s:0:\"\";s:17:\"flash:old:message\";s:64:\"<p class=\"status_msg\">You have been successfully logged out.</p>\";s:10:\"flexi_auth\";a:7:{s:15:\"user_identifier\";b:0;s:7:\"user_id\";b:0;s:5:\"admin\";b:0;s:5:\"group\";b:0;s:10:\"privileges\";b:0;s:22:\"logged_in_via_password\";b:0;s:19:\"login_session_token\";b:0;}}');

/*Table structure for table `cibi_user_profiles` */

DROP TABLE IF EXISTS `cibi_user_profiles`;

CREATE TABLE `cibi_user_profiles` (
  `upro_id` int(11) NOT NULL AUTO_INCREMENT,
  `upro_uacc_fk` int(11) NOT NULL,
  `upro_id_hash` varchar(64) DEFAULT NULL,
  `upro_company` varchar(50) NOT NULL,
  `upro_first_name` varchar(50) NOT NULL,
  `upro_last_name` varchar(50) NOT NULL,
  `upro_nick_name` varchar(100) DEFAULT NULL,
  `upro_about_me` longtext,
  `upro_contact_company` varchar(100) DEFAULT NULL,
  `upro_phone` varchar(25) NOT NULL,
  `upro_star` decimal(10,0) DEFAULT '0',
  `upro_sms_verified` tinyint(4) DEFAULT '0',
  `upro_sms_by` varchar(64) DEFAULT NULL,
  `upro_sms_date` datetime DEFAULT NULL,
  `upro_phone_verified` tinyint(4) DEFAULT '0',
  `upro_called_by` varchar(64) DEFAULT NULL,
  `upro_called_date` datetime DEFAULT NULL,
  `upro_visit_verified` tinyint(4) DEFAULT '0',
  `upro_visit_by` varchar(64) DEFAULT NULL,
  `upro_visit_date` datetime DEFAULT NULL,
  `upro_contact_name` varchar(100) DEFAULT NULL,
  `upro_contact_phone` varchar(40) DEFAULT NULL,
  `upro_hide_phone` tinyint(4) DEFAULT '0',
  `upro_contact_handphone` varchar(40) DEFAULT NULL,
  `upro_hide_handphone` tinyint(4) DEFAULT '0',
  `upro_contact_sms` varchar(40) DEFAULT NULL,
  `upro_hide_sms` tinyint(4) DEFAULT '0',
  `upro_contact_bb_pin` varchar(8) DEFAULT NULL,
  `upro_hide_bb_pin` tinyint(4) DEFAULT '0',
  `upro_contact_ym` varchar(64) DEFAULT NULL,
  `upro_hide_ym` tinyint(4) DEFAULT '0',
  `upro_contact_url` varchar(100) DEFAULT NULL,
  `upro_hide_url` tinyint(4) DEFAULT '0',
  `upro_contact_whatsapp` varchar(20) DEFAULT NULL,
  `upro_hide_whatsapp` tinyint(4) DEFAULT '0',
  `upro_contact_line` varchar(20) DEFAULT NULL,
  `upro_hide_line` tinyint(4) DEFAULT '0',
  `upro_contact_skype` varchar(20) DEFAULT NULL,
  `upro_hide_skype` tinyint(4) DEFAULT '0',
  `upro_contact_fax` varchar(20) DEFAULT NULL,
  `upro_hide_fax` tinyint(4) DEFAULT '0',
  `upro_hide_email` tinyint(4) DEFAULT '0',
  `upro_contact_country` varchar(32) NOT NULL DEFAULT 'Indonesia',
  `upro_contact_province` varchar(32) NOT NULL DEFAULT 'DKI Jakarta',
  `upro_contact_city` varchar(32) NOT NULL DEFAULT 'Jakarta',
  `upro_contact_district` varchar(32) DEFAULT NULL,
  `upro_contact_kecamatan` varchar(32) DEFAULT NULL,
  `upro_contact_kelurahan` varchar(32) DEFAULT NULL,
  `upro_contact_zip` varchar(6) DEFAULT '00000',
  `upro_contact_address` varchar(100) NOT NULL DEFAULT 'Jakarta',
  `upro_hide_address` tinyint(4) DEFAULT '0',
  `upro_contact_office_name` varchar(100) DEFAULT NULL,
  `upro_contact_longitude` varchar(16) DEFAULT NULL,
  `upro_contact_latitude` varchar(16) DEFAULT NULL,
  `upro_contact_parkir` tinyint(4) NOT NULL DEFAULT '0',
  `upro_contact_transportation_desc` varchar(100) DEFAULT NULL,
  `upro_contact_sex` varchar(6) NOT NULL DEFAULT 'Pria',
  `upro_contact_dob` date DEFAULT '0000-00-00',
  `upro_newsletter` tinyint(1) NOT NULL DEFAULT '0',
  `upro_paypal_email` varchar(100) NOT NULL,
  `upro_need_customer` tinyint(4) DEFAULT '1',
  `upro_need_sales_force` tinyint(4) DEFAULT '1',
  `upro_need_worker` tinyint(4) DEFAULT '1',
  `upro_order_instruction` longtext,
  `upro_use_company_instead_of_name` tinyint(4) DEFAULT '0',
  `upro_need_payment` tinyint(4) DEFAULT '1',
  `upro_need_shipping` tinyint(4) DEFAULT '1',
  `upro_need_order_instructions` tinyint(4) DEFAULT '1',
  `upro_hide_payment` tinyint(4) DEFAULT '0',
  `upro_hide_shipping` tinyint(4) DEFAULT '0',
  `upro_hide_order_intructions` tinyint(4) DEFAULT '0',
  `upro_date_added` datetime DEFAULT NULL,
  `upro_ip_added` varchar(40) DEFAULT NULL,
  `upro_date_updated` datetime DEFAULT NULL,
  `upro_ip_updated` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`upro_id`,`upro_paypal_email`),
  UNIQUE KEY `upro_id` (`upro_id`),
  KEY `upro_uacc_fk` (`upro_uacc_fk`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

/*Data for the table `cibi_user_profiles` */

insert  into `cibi_user_profiles`(`upro_id`,`upro_uacc_fk`,`upro_id_hash`,`upro_company`,`upro_first_name`,`upro_last_name`,`upro_nick_name`,`upro_about_me`,`upro_contact_company`,`upro_phone`,`upro_star`,`upro_sms_verified`,`upro_sms_by`,`upro_sms_date`,`upro_phone_verified`,`upro_called_by`,`upro_called_date`,`upro_visit_verified`,`upro_visit_by`,`upro_visit_date`,`upro_contact_name`,`upro_contact_phone`,`upro_hide_phone`,`upro_contact_handphone`,`upro_hide_handphone`,`upro_contact_sms`,`upro_hide_sms`,`upro_contact_bb_pin`,`upro_hide_bb_pin`,`upro_contact_ym`,`upro_hide_ym`,`upro_contact_url`,`upro_hide_url`,`upro_contact_whatsapp`,`upro_hide_whatsapp`,`upro_contact_line`,`upro_hide_line`,`upro_contact_skype`,`upro_hide_skype`,`upro_contact_fax`,`upro_hide_fax`,`upro_hide_email`,`upro_contact_country`,`upro_contact_province`,`upro_contact_city`,`upro_contact_district`,`upro_contact_kecamatan`,`upro_contact_kelurahan`,`upro_contact_zip`,`upro_contact_address`,`upro_hide_address`,`upro_contact_office_name`,`upro_contact_longitude`,`upro_contact_latitude`,`upro_contact_parkir`,`upro_contact_transportation_desc`,`upro_contact_sex`,`upro_contact_dob`,`upro_newsletter`,`upro_paypal_email`,`upro_need_customer`,`upro_need_sales_force`,`upro_need_worker`,`upro_order_instruction`,`upro_use_company_instead_of_name`,`upro_need_payment`,`upro_need_shipping`,`upro_need_order_instructions`,`upro_hide_payment`,`upro_hide_shipping`,`upro_hide_order_intructions`,`upro_date_added`,`upro_ip_added`,`upro_date_updated`,`upro_ip_updated`) values (17,9,'0ade7c2cf97f75d009975f4d720d1fa6c19f4897','','Juleha','Jelek','Juleha Jelek','Banyak alasan mengapa harus menggunakan Simdik Profesional (SMS) atau Simdik Terpadu. Simdik Profesional (SMS) atau Simdik terpadu memiliki manfaat bagi seluruh warga sekolah.\nApa sih manfaatnya  bagi sekolah ?\n\n12345\n\nasldslad asld\n alsdkals dkasd\nasldlasdk as\nasdlkasld\n\nAmpppppunnnnn','PT. JULEHA JELEK ','79190229','3',1,NULL,NULL,1,NULL,NULL,1,NULL,NULL,NULL,'79190229',1,'0856111111',1,'0856111111',1,'pinbb',1,'mc-gyver',1,'http://www.bandel.com',1,'0856111111',1,'0856111111',1,'0856111111',1,'0856111111',1,1,'Indonesia','DKI Jakarta','Jakarta Selatan',NULL,NULL,NULL,'12751','Jl. Pangeran Jayakarta gg Kalimati No. 12A ',0,'Perkantoran Cumi-Cumi',NULL,NULL,0,NULL,'Pria','2013-01-01',0,'',1,1,1,'Ngomong-ngomong kok cara pemesanannya bisa ilang ya ?\r\n\r\nEh gak kok tadi cuma salah field aja',1,1,1,1,0,0,0,NULL,NULL,NULL,NULL),(19,10,'b1d5781111d84f7b3fe45a0852e59758cd7a87e5','','minah','tertawa','minah tertawa',NULL,NULL,'','0',0,NULL,NULL,0,NULL,NULL,1,NULL,NULL,NULL,NULL,0,NULL,0,NULL,0,NULL,0,NULL,0,NULL,0,NULL,0,NULL,0,NULL,0,NULL,0,0,'Indonesia','DKI Jakarta','Jakarta',NULL,NULL,NULL,'00000','Jakarta',0,NULL,NULL,NULL,0,NULL,'0','1987-10-28',0,'',1,1,1,'ayo monggo dipesan-pesan',1,1,1,1,0,0,0,NULL,NULL,NULL,NULL),(20,11,'17ba0791499db908433b80f37c5fbc89b870084b','','mirna','salasa','mirna salasa','Lorem ipsum dolor sit amet-amet jabang bayi.\nKalau suka jangan bilang tak suka\nsupaya enak sama enak','PT. MIRNA SALASA','','0',1,NULL,NULL,1,NULL,NULL,1,NULL,NULL,NULL,'239203n2329',0,'120192012 10291',0,'29382 392832',0,'293829',0,'32892',0,'',0,'9232938',0,'29382938',0,'2938293',0,'',0,0,'Indonesia','DKI Jakarta','Jakarta',NULL,NULL,NULL,'00000','Jakarta',0,'',NULL,NULL,0,NULL,'Pria','2013-01-01',0,'',1,1,1,'',1,1,1,1,0,0,0,NULL,NULL,NULL,NULL),(21,12,'7b52009b64fd0a2a49e6d8a939753077792b0554','','kumkum','pecicilan','kumkum pecicilan',NULL,NULL,'','0',1,NULL,NULL,1,NULL,NULL,1,NULL,NULL,NULL,NULL,0,NULL,0,NULL,0,NULL,0,NULL,0,NULL,0,NULL,0,NULL,0,NULL,0,NULL,0,0,'Indonesia','DKI Jakarta','Jakarta',NULL,NULL,NULL,'00000','Jakarta',0,NULL,NULL,NULL,0,NULL,'0','1973-09-12',0,'',1,1,1,NULL,1,1,1,1,0,0,0,NULL,NULL,NULL,NULL),(22,13,'bd307a3ec329e10a2cff8fb87480823da114f8f4','','Bulan','Nirwana','Bulan Nirwana',NULL,NULL,'','0',0,NULL,NULL,0,NULL,NULL,1,NULL,NULL,NULL,NULL,0,NULL,0,NULL,0,NULL,0,NULL,0,NULL,0,NULL,0,NULL,0,NULL,0,NULL,0,0,'Indonesia','DKI Jakarta','Jakarta',NULL,NULL,NULL,'00000','Jakarta',0,NULL,NULL,NULL,0,NULL,'0','1998-07-12',0,'',1,1,1,NULL,1,1,1,1,0,0,0,NULL,NULL,NULL,NULL),(23,14,'fa35e192121eabf3dabf9f5ea6abdbcbc107ac3b','','sundari','sukoco',NULL,NULL,NULL,'','0',1,NULL,NULL,1,NULL,NULL,1,NULL,NULL,NULL,'',0,'',0,'',0,'',0,'',0,NULL,0,'',0,'',0,'',0,'',0,0,'Indonesia','','',NULL,NULL,NULL,'','',0,'',NULL,NULL,0,NULL,'Wanita','2010-02-01',0,'',1,1,1,NULL,1,1,1,1,0,0,0,NULL,NULL,NULL,NULL),(24,15,'f1abd670358e036c31296e66b3b66c382ac00812','','jamilah','al-kazab',NULL,NULL,NULL,'','0',0,NULL,NULL,0,NULL,NULL,0,NULL,NULL,NULL,'',0,'',0,'',0,'',0,'',0,NULL,0,'',0,'',0,'',0,'',0,0,'Indonesia','','',NULL,NULL,NULL,'','',0,'',NULL,NULL,0,NULL,'Pria','2013-01-01',0,'',1,1,1,NULL,0,1,1,1,0,0,0,'2013-01-13 00:14:22','127.0.0.1',NULL,NULL),(25,16,'1574bddb75c78a6fd2251d61e2993b5146201319','','suneo','neo',NULL,NULL,NULL,'','0',0,NULL,NULL,0,NULL,NULL,0,NULL,NULL,NULL,'',0,'',0,'',0,'',0,'',0,NULL,0,'',0,'',0,'',0,'',0,0,'Indonesia','','',NULL,NULL,NULL,'','',0,'',NULL,NULL,0,NULL,'Pria','1998-05-01',0,'',1,1,1,NULL,0,1,1,1,0,0,0,'2013-01-13 00:15:04','127.0.0.1',NULL,NULL),(26,17,'0716d9708d321ffb6a00818614779e779925365c','','imelda','marcos',NULL,NULL,NULL,'','0',0,NULL,NULL,0,NULL,NULL,0,NULL,NULL,NULL,'',0,'',0,'',0,'',0,'',0,NULL,0,'',0,'',0,'',0,'',0,0,'Indonesia','','',NULL,NULL,NULL,'','',0,'',NULL,NULL,0,NULL,'Wanita','1963-05-30',0,'',1,1,1,NULL,0,1,1,1,0,0,0,'2013-01-13 00:16:18','127.0.0.1',NULL,NULL),(27,18,'9e6a55b6b4563e652a23be9d623ca5055c356940','','beki','bebi',NULL,NULL,NULL,'','0',0,NULL,NULL,0,NULL,NULL,0,NULL,NULL,NULL,'',0,'',0,'',0,'',0,'',0,NULL,0,'',0,'',0,'',0,'',0,0,'Indonesia','','',NULL,NULL,NULL,'','',0,'',NULL,NULL,0,NULL,'Wanita','1964-06-04',0,'',1,1,1,NULL,0,1,1,1,0,0,0,'2013-01-13 00:18:30','127.0.0.1',NULL,NULL),(28,19,'b3f0c7f6bb763af1be91d9e74eabfeb199dc1f1f','','niken','tiramisu','niken tiramisu',NULL,NULL,'','0',0,NULL,NULL,0,NULL,NULL,0,NULL,NULL,NULL,NULL,0,NULL,0,NULL,0,NULL,0,NULL,0,NULL,0,NULL,0,NULL,0,NULL,0,NULL,0,0,'Indonesia','DKI Jakarta','Jakarta',NULL,NULL,NULL,'00000','Jakarta',0,NULL,NULL,NULL,0,NULL,'0','1985-03-12',0,'',1,1,1,NULL,0,1,1,1,0,0,0,NULL,NULL,NULL,NULL),(29,20,'91032ad7bbcb6cf72875e8e8207dcfba80173f7c','','monika','yunita','monika yunita',NULL,'','','0',0,NULL,NULL,0,NULL,NULL,0,NULL,NULL,NULL,'',0,'',0,'',0,'',0,'',0,'',0,'',0,'',0,'',0,'',0,0,'Indonesia','DKI Jakarta','Jakarta',NULL,NULL,NULL,'00000','Jakarta',0,'',NULL,NULL,0,NULL,'Pria','2013-01-01',0,'',1,1,1,'',0,1,1,1,0,0,0,NULL,NULL,NULL,NULL);

/*Table structure for table `exchange_rate` */

DROP TABLE IF EXISTS `exchange_rate`;

CREATE TABLE `exchange_rate` (
  `Record_Number` bigint(20) NOT NULL AUTO_INCREMENT,
  `Periode` varchar(8) NOT NULL COMMENT 'YYYYMMDD',
  `Currency_ID` varchar(3) NOT NULL DEFAULT 'USD',
  `Nilai_Tukar_Pajak` double DEFAULT '1',
  `Nilai_Tukar_Pasar` double DEFAULT '1',
  `Nilai_Tukar_Akunting` double DEFAULT '1',
  `Is_Active` tinyint(4) DEFAULT '1',
  `Created_By` varchar(32) DEFAULT NULL,
  `Created_Date` datetime DEFAULT NULL,
  `Creator_Ip` varchar(100) DEFAULT NULL,
  `Disactivated_By` varchar(32) DEFAULT NULL,
  `Disactivated_Date` datetime DEFAULT NULL,
  `Disactivated_Ip` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Record_Number`),
  KEY `periode` (`Periode`,`Currency_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `exchange_rate` */

/*Table structure for table `fin_payment_voucher` */

DROP TABLE IF EXISTS `fin_payment_voucher`;

CREATE TABLE `fin_payment_voucher` (
  `PV_Nomor` varchar(20) NOT NULL,
  `PV_Tanggal` datetime DEFAULT NULL,
  `PV_Periode` varchar(6) DEFAULT NULL,
  `PV_Type` varchar(4) DEFAULT NULL,
  `PV_Identitas` varchar(20) DEFAULT NULL,
  `PV_Unit_Code` varchar(4) DEFAULT NULL,
  `PV_Referensi` varchar(20) DEFAULT NULL,
  `PV_Project_Contract_Number` varchar(20) DEFAULT NULL,
  `PV_Currency_ID` varchar(3) DEFAULT 'IDR',
  `PV_Transaction_Rate` double DEFAULT '1',
  `PV_Tax_Rate` double DEFAULT '1',
  `PV_Total_Rupiah` double DEFAULT '0',
  `PV_Total_Asing` double DEFAULT '0',
  `PV_Kepada` varchar(100) DEFAULT NULL,
  `PV_Keterangan` varchar(100) DEFAULT NULL,
  `PV_Printing_Counter` bigint(20) DEFAULT '0',
  `PV_Printing_Check_Digit` varchar(3) DEFAULT NULL,
  `PV_Account_Number` varchar(15) DEFAULT NULL,
  `PV_Payment_Type` varchar(4) DEFAULT 'Bank',
  `PV_Nomor_Cheque` varchar(20) DEFAULT NULL,
  `PV_Tanggal_Cheque` datetime DEFAULT NULL,
  `PV_Nama_Bank_Cheque` varchar(30) DEFAULT NULL,
  `PV_Cheque_Sudah_Dikiring` tinyint(4) DEFAULT '0',
  `PV_Cheque_Tanggal_Kliring` datetime DEFAULT NULL,
  `PV_Voucher_Jurnal` varchar(20) DEFAULT NULL,
  `PV_Disiapkan_Oleh` varchar(32) DEFAULT NULL,
  `PV_Disiapkan_Tanggal` varchar(10) DEFAULT NULL,
  `PV_Diperiksa_Oleh` varchar(32) DEFAULT NULL,
  `PV_Diperiksa_Tanggal` varchar(10) DEFAULT NULL,
  `PV_Disetujui_Oleh` varchar(32) DEFAULT NULL,
  `PV_Disetujui_Tanggal` varchar(10) DEFAULT NULL,
  `PV_Dibayar_Oleh` varchar(32) DEFAULT NULL,
  `PV_Dibayar_Tanggal` varchar(10) DEFAULT NULL,
  `PV_Diterima_Oleh` varchar(32) DEFAULT NULL,
  `PV_Diterima_Tanggal` varchar(10) DEFAULT NULL,
  `PV_Dibukukan_Oleh` varchar(32) DEFAULT NULL,
  `PV_Dibukukan_Tanggal` varchar(10) DEFAULT NULL,
  `PV_Sumber` varchar(4) DEFAULT NULL,
  `PV_Referensi_Sumber_1` varchar(20) DEFAULT NULL,
  `PV_Referensi_Sumber_2` varchar(20) DEFAULT NULL,
  `Created_By` varchar(32) DEFAULT NULL,
  `Created_Date` datetime DEFAULT NULL,
  `Creator_Ip` varchar(60) DEFAULT NULL,
  `Last_Modified_By` varchar(32) DEFAULT NULL,
  `Last_Modified_Date` datetime DEFAULT NULL,
  `Last_Modified_Ip` varchar(60) DEFAULT NULL,
  `PV_Record_Is_Active` tinyint(4) DEFAULT '1',
  `Disactivated_By` varchar(32) DEFAULT NULL,
  `Disactivated_Date` datetime DEFAULT NULL,
  `Disactivated_Ip` varchar(60) DEFAULT NULL,
  `Booked_By` varchar(32) DEFAULT NULL,
  `Booked_Date` datetime DEFAULT NULL,
  `Booked_Ip` varchar(60) DEFAULT NULL,
  `Verified` tinyint(4) DEFAULT '1',
  `Approved` tinyint(4) DEFAULT '1',
  `Booked` tinyint(4) DEFAULT '1',
  `Paid` tinyint(4) DEFAULT '1',
  `Posted` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`PV_Nomor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `fin_payment_voucher` */

/*Table structure for table `fin_payment_voucher_d` */

DROP TABLE IF EXISTS `fin_payment_voucher_d`;

CREATE TABLE `fin_payment_voucher_d` (
  `PVD_Nomor_Record` bigint(20) NOT NULL AUTO_INCREMENT,
  `PVD_Nomor_Voucher` varchar(20) DEFAULT NULL,
  `PVD_Nomor_Urut` int(11) DEFAULT '0',
  `PVD_Unit_Code_Lawan` varchar(4) DEFAULT NULL,
  `PVD_Identitas_Lawan` varchar(20) DEFAULT NULL,
  `PVD_Project_Contract_Number_Lawan` varchar(20) DEFAULT NULL,
  `PVD_Nomor_Rekening_Lawan` varchar(15) DEFAULT NULL,
  `PVD_Nomor_Referensi` varchar(20) DEFAULT NULL,
  `PVD_Keterangan` varchar(100) DEFAULT NULL,
  `PVD_Rupiah` double DEFAULT '0',
  `PVD_Uang_Asing` double DEFAULT '0',
  PRIMARY KEY (`PVD_Nomor_Record`),
  KEY `Nomor_Voucher` (`PVD_Nomor_Voucher`,`PVD_Nomor_Urut`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `fin_payment_voucher_d` */

/*Table structure for table `fin_receipt_voucher` */

DROP TABLE IF EXISTS `fin_receipt_voucher`;

CREATE TABLE `fin_receipt_voucher` (
  `RV_Nomor_Record` bigint(20) NOT NULL AUTO_INCREMENT,
  `RV_Nomor` varchar(20) DEFAULT NULL,
  `RV_Tanggal` datetime DEFAULT NULL,
  `RV_Periode` varchar(6) DEFAULT NULL,
  `RV_Type` varchar(4) DEFAULT NULL,
  `RV_Identitas` varchar(20) DEFAULT NULL,
  `RV_Unit_Code` varchar(4) DEFAULT NULL,
  `RV_Referensi` varchar(20) DEFAULT NULL,
  `RV_Project_Contract_Number` varchar(20) DEFAULT NULL,
  `RV_Currency_ID` varchar(3) DEFAULT 'IDR',
  `RV_Transaction_Rate` double DEFAULT '1',
  `RV_Tax_Rate` double DEFAULT '1',
  `RV_Total_Rupiah` double DEFAULT '0',
  `RV_Total_Asing` double DEFAULT '0',
  `RV_Dari` varchar(100) DEFAULT NULL,
  `RV_Keterangan` varchar(100) DEFAULT NULL,
  `RV_Printing_Counter` bigint(20) DEFAULT '0',
  `RV_Printing_Check_Digit` varchar(3) DEFAULT NULL,
  `RV_Account_Number` varchar(15) DEFAULT NULL,
  `RV_Receipt_Type` varchar(4) DEFAULT 'Bank',
  `RV_Nomor_Cheque` varchar(20) DEFAULT NULL,
  `RV_Tanggal_Cheque` datetime DEFAULT NULL,
  `RV_Nama_Bank_Cheque` varchar(30) DEFAULT NULL,
  `RV_Cheque_Sudah_Dikiring` tinyint(4) DEFAULT '0',
  `RV_Cheque_Tanggal_Kliring` datetime DEFAULT NULL,
  `RV_Voucher_Jurnal` varchar(20) DEFAULT NULL,
  `RV_Disiapkan_Oleh` varchar(32) DEFAULT NULL,
  `RV_Disiapkan_Tanggal` varchar(10) DEFAULT NULL,
  `RV_Diperiksa_Oleh` varchar(32) DEFAULT NULL,
  `RV_Diperiksa_Tanggal` varchar(10) DEFAULT NULL,
  `RV_Disetujui_Oleh` varchar(32) DEFAULT NULL,
  `RV_Disetujui_Tanggal` varchar(10) DEFAULT NULL,
  `RV_Dibayar_Oleh` varchar(32) DEFAULT NULL,
  `RV_Dibayar_Tanggal` varchar(10) DEFAULT NULL,
  `RV_Diterima_Oleh` varchar(32) DEFAULT NULL,
  `RV_Diterima_Tanggal` varchar(10) DEFAULT NULL,
  `RV_Dibukukan_Oleh` varchar(32) DEFAULT NULL,
  `RV_Dibukukan_Tanggal` varchar(10) DEFAULT NULL,
  `RV_Sumber` varchar(4) DEFAULT NULL,
  `RV_Referensi_Sumber_1` varchar(20) DEFAULT NULL,
  `RV_Referensi_Sumber_2` varchar(20) DEFAULT NULL,
  `RV_Record_Is_Active` tinyint(4) DEFAULT '1',
  `Created_By` varchar(32) DEFAULT NULL,
  `Created_Date` datetime DEFAULT NULL,
  `Creator_Ip` varchar(60) DEFAULT NULL,
  `Last_Modified_By` varchar(32) DEFAULT NULL,
  `Last_Modified_Date` datetime DEFAULT NULL,
  `Last_Modified_Ip` varchar(60) DEFAULT NULL,
  `Disactivated_By` varchar(32) DEFAULT NULL,
  `Disactivated_Date` datetime DEFAULT NULL,
  `Disactivated_Ip` varchar(60) DEFAULT NULL,
  `Booked_By` varchar(32) DEFAULT NULL,
  `Booked_Date` datetime DEFAULT NULL,
  `Booked_Ip` varchar(60) DEFAULT NULL,
  `Verified` tinyint(4) DEFAULT '1',
  `Approved` tinyint(4) DEFAULT '1',
  `Booked` tinyint(4) DEFAULT '1',
  `Paid` tinyint(4) DEFAULT '1',
  `Posted` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`RV_Nomor_Record`),
  UNIQUE KEY `NomorVoucher` (`RV_Nomor`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `fin_receipt_voucher` */

/*Table structure for table `fin_receipt_voucher_d` */

DROP TABLE IF EXISTS `fin_receipt_voucher_d`;

CREATE TABLE `fin_receipt_voucher_d` (
  `RVD_Nomor_Record` bigint(20) NOT NULL AUTO_INCREMENT,
  `RVD_Nomor_Voucher` varchar(20) DEFAULT NULL,
  `RVD_Nomor_Urut` int(11) DEFAULT '0',
  `RVD_Unit_Code_Lawan` varchar(4) DEFAULT NULL,
  `RVD_Identitas_Lawan` varchar(20) DEFAULT NULL,
  `RVD_Project_Contract_Number_Lawan` varchar(20) DEFAULT NULL,
  `RVD_Nomor_Rekening_Lawan` varchar(15) DEFAULT NULL,
  `RVD_Nomor_Referensi` varchar(20) DEFAULT NULL,
  `RVD_Keterangan` varchar(100) DEFAULT NULL,
  `RVD_Rupiah` double DEFAULT '0',
  `RVD_Uang_Asing` double DEFAULT '0',
  PRIMARY KEY (`RVD_Nomor_Record`),
  KEY `Nomor_Voucher` (`RVD_Nomor_Voucher`,`RVD_Nomor_Urut`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `fin_receipt_voucher_d` */

/*Table structure for table `gl_identitas` */

DROP TABLE IF EXISTS `gl_identitas`;

CREATE TABLE `gl_identitas` (
  `Identitas` varchar(20) NOT NULL,
  `ID_Description` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Identitas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `gl_identitas` */

insert  into `gl_identitas`(`Identitas`,`ID_Description`) values ('AMIN','Si Amin'),('GEMA','PT. GEMA MUSTIKA SWARA'),('MINAH','Si Minah'),('NASIB','Si Nasib'),('SOMA','Kang Soma'),('TELE','PT. TELETUBIES CHUBBY INDONESIA'),('TUKUL','Mr Tukul'),('UMUM','UMUM');

/*Table structure for table `gl_jurnal` */

DROP TABLE IF EXISTS `gl_jurnal`;

CREATE TABLE `gl_jurnal` (
  `Jurnal_Record_Number` bigint(20) NOT NULL AUTO_INCREMENT,
  `Jurnal_Nomor_Jurnal` varchar(20) DEFAULT NULL,
  `Jurnal_Kode_Unit` varchar(4) DEFAULT NULL,
  `Jurnal_Tipe` tinyint(4) DEFAULT '0' COMMENT '0=Double Entry 1=Single Entry',
  `Jurnal_Tanggal_Voucher` datetime DEFAULT NULL,
  `Jurnal_Periode_Voucher` varchar(6) DEFAULT NULL,
  `Jurnal_Keterangan` varchar(200) DEFAULT NULL,
  `Jurnal_CurrencyID` varchar(3) DEFAULT NULL,
  `Jurnal_Transaction_Rate` double DEFAULT '1' COMMENT 'Ada di header tetapi tetap gunakan yg di detail untuk proses, untuk menjaga perbedaan rate per detail',
  `Jurnal_Tax_Rate` double DEFAULT '1' COMMENT 'Cadangan. Ada di header tetapi tetap gunakan yg di detail untuk proses, untuk menjaga perbedaan rate per detail',
  `Jurnal_Account_Number` varchar(15) DEFAULT NULL COMMENT 'Dibutuhkan untuk jurnal single entry ',
  `Jurnal_Kode_Sumber` varchar(4) DEFAULT NULL COMMENT 'dari gl_sumber',
  `Jurnal_Referensi_1` varchar(20) DEFAULT NULL,
  `Jurnal_Referensi_2` varchar(20) DEFAULT NULL,
  `Jurnal_Is_Active` tinyint(4) DEFAULT '1' COMMENT '1=Active 0=Disactivated',
  `Jurnal_Group_ID` varchar(4) DEFAULT NULL COMMENT 'Cadangan',
  `Jurnal_Disiapkan_Oleh` varchar(32) DEFAULT NULL,
  `Jurnal_Disiapkan_Tanggal` varchar(10) DEFAULT NULL,
  `Jurnal_Disetujui_Oleh` varchar(32) DEFAULT NULL COMMENT 'Nama Input (Approved)',
  `Jurnal_Disetujui_Tanggal` varchar(10) DEFAULT NULL COMMENT 'Tanggal Input (Approved)',
  `Jurnal_Diperiksa_Oleh` varchar(32) DEFAULT NULL,
  `Jurnal_Diperiksa_Tanggal` varchar(10) DEFAULT NULL,
  `Jurnal_Diperkenankan_Oleh` varchar(32) DEFAULT NULL COMMENT 'Nama Input (Accepted)',
  `Jurnal_Diperkenankan_Tanggal` varchar(10) DEFAULT NULL COMMENT 'Tanggal Input (Accepted)',
  `Jurnal_Printing_Counter` bigint(20) DEFAULT NULL,
  `Jurnal_Last_Printed_By` varchar(32) DEFAULT NULL COMMENT 'User ID Hash ',
  `Jurnal_Last_Printed_Date` datetime DEFAULT NULL,
  `Jurnal_Last_Printed_Check_Digit` varchar(20) DEFAULT NULL,
  `Original_Source_Number` varchar(20) DEFAULT NULL COMMENT 'Nomor jurnal sumber jika jurnal hasil copy/import',
  `Original_DB_Name` text COMMENT 'Nama Database sumber copy / impor',
  `Created_By` varchar(32) DEFAULT NULL COMMENT 'user id hash',
  `Created_Date` datetime DEFAULT NULL,
  `Creator_Ip` varchar(60) DEFAULT NULL,
  `Last_Modified_By` varchar(32) DEFAULT NULL,
  `Last_Modified_Date` datetime DEFAULT NULL,
  `Last_Modified_Ip` varchar(60) DEFAULT NULL,
  `Disactivated_By` varchar(32) DEFAULT NULL,
  `Disactivated_Date` datetime DEFAULT NULL,
  `Disactivated_Ip` varchar(60) DEFAULT NULL,
  `Re_Activated_By` varchar(32) DEFAULT NULL,
  `Re_Activated_Date` datetime DEFAULT NULL,
  `Re_Activated_Ip` varchar(60) DEFAULT NULL,
  `Verified_By` varchar(32) DEFAULT NULL,
  `Verified_Date` datetime DEFAULT NULL,
  `Verified_Ip` varchar(60) DEFAULT NULL,
  `Posted_By` varchar(32) DEFAULT NULL COMMENT 'Untuk Kompatibilitas Saja',
  `Posted_Date` datetime DEFAULT NULL COMMENT 'Untuk Kompatibilitas Saja',
  `Posted_Ip` varchar(60) DEFAULT NULL COMMENT 'Untuk Kompatibilitas Saja',
  `Closed_By` varchar(32) DEFAULT NULL COMMENT 'Untuk Kompatibilitas Saja',
  `Closed_Date` datetime DEFAULT NULL COMMENT 'Untuk Kompatibilitas Saja',
  `Closed_Ip` varchar(60) DEFAULT NULL COMMENT 'Untuk Kompatibilitas Saja',
  PRIMARY KEY (`Jurnal_Record_Number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `gl_jurnal` */

/*Table structure for table `gl_jurnal_detail` */

DROP TABLE IF EXISTS `gl_jurnal_detail`;

CREATE TABLE `gl_jurnal_detail` (
  `JD_Nomor_Record` bigint(20) NOT NULL AUTO_INCREMENT,
  `JD_Voucher_Jurnal` varchar(20) DEFAULT NULL,
  `JD_Nomor_Urut` smallint(6) DEFAULT '0' COMMENT 'Nomor urut baris',
  `JD_Referensi` varchar(20) DEFAULT NULL,
  `JD_Account_Number` varchar(15) DEFAULT NULL,
  `JD_Project_Contract_Number` varchar(20) DEFAULT NULL,
  `JD_Identitas` varchar(20) DEFAULT NULL,
  `JD_Unit_Code` varchar(4) DEFAULT NULL,
  `JD_Description` varchar(100) DEFAULT NULL,
  `JD_Nominal` double DEFAULT '0',
  `JD_Uang_Asing` double DEFAULT '0',
  `JD_CurrencyID` varchar(3) DEFAULT NULL COMMENT 'Redundan tp kelak dibutuhkan',
  `JD_Tanggal_Voucher` datetime DEFAULT NULL COMMENT 'Redundan tp kelak dibutuhkan',
  `JD_Periode_Voucher` varchar(6) DEFAULT NULL COMMENT 'Redundan tp kelak dibutuhkan',
  `JD_Transaction_Rate` double DEFAULT '1' COMMENT 'Redundan tp kelak dibutuhkan',
  `JD_Tax_Rate` double DEFAULT '1' COMMENT 'Redundan tp kelak dibutuhkan',
  `JD_Referensi_2` varchar(20) DEFAULT NULL,
  `JD_Referensi_3` varchar(20) DEFAULT NULL,
  `Created_By` varchar(32) DEFAULT NULL,
  `Created_Date` datetime DEFAULT NULL,
  `Creator_Ip` varchar(60) DEFAULT NULL,
  `Last_Modified_By` varchar(32) DEFAULT NULL,
  `Last_Modified_Date` datetime DEFAULT NULL,
  `Last_Modified_Ip` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`JD_Nomor_Record`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `gl_jurnal_detail` */

/*Table structure for table `gl_profit_centers` */

DROP TABLE IF EXISTS `gl_profit_centers`;

CREATE TABLE `gl_profit_centers` (
  `Unit_Code` varchar(4) NOT NULL DEFAULT '0000',
  `Unit_Name` varchar(40) DEFAULT NULL,
  `Special_Identifier_Flag` tinyint(4) DEFAULT '0',
  `Unit_Is_Active` tinyint(4) DEFAULT '1',
  `Created_By` varchar(32) DEFAULT NULL,
  `Created_Date` datetime DEFAULT NULL,
  `Creator_Ip` varchar(100) DEFAULT NULL,
  `Disactivated_By` varchar(32) DEFAULT NULL,
  `Disactivated_Date` datetime DEFAULT NULL,
  `Disactivated_Ip` varchar(100) DEFAULT NULL,
  `Last_Updated_By` varchar(32) DEFAULT NULL,
  `Last_Updated_Date` datetime DEFAULT NULL,
  `Last_Updated_Ip` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Unit_Code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `gl_profit_centers` */

insert  into `gl_profit_centers`(`Unit_Code`,`Unit_Name`,`Special_Identifier_Flag`,`Unit_Is_Active`,`Created_By`,`Created_Date`,`Creator_Ip`,`Disactivated_By`,`Disactivated_Date`,`Disactivated_Ip`,`Last_Updated_By`,`Last_Updated_Date`,`Last_Updated_Ip`) values ('00','Umum',0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('01','Marketing',0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('02','Produksi',0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `gl_projects` */

DROP TABLE IF EXISTS `gl_projects`;

CREATE TABLE `gl_projects` (
  `Project_Contract_Number` varchar(20) NOT NULL,
  `Description` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Project_Contract_Number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `gl_projects` */

insert  into `gl_projects`(`Project_Contract_Number`,`Description`) values ('00000','Non Proyek / Order'),('SPK/II/2013/001','Pengadaan Saluran Air'),('SPK/II/2013/002','Pengadaan Manusia Kera');

/*Table structure for table `gl_sumber` */

DROP TABLE IF EXISTS `gl_sumber`;

CREATE TABLE `gl_sumber` (
  `Kode_Sumber` varchar(4) NOT NULL,
  `Keterangan_Sumber` varchar(40) DEFAULT NULL,
  `Keterangan_Reff_1` varchar(20) DEFAULT NULL,
  `Keterangan_Reff_2` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Kode_Sumber`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `gl_sumber` */

/*Table structure for table `stk_master` */

DROP TABLE IF EXISTS `stk_master`;

CREATE TABLE `stk_master` (
  `stk_kode` varchar(15) NOT NULL,
  `stk_nama_bahan_baku` varchar(100) DEFAULT NULL,
  `stk_dibeli` tinyint(4) DEFAULT '1',
  `stk_satuan_beli` varchar(20) DEFAULT NULL,
  `stk_satuan_pakai` varchar(20) DEFAULT NULL,
  `stk_konversi_satuan` double DEFAULT '1',
  `stk_induk` varchar(15) DEFAULT NULL,
  `stk_jam_produksi` double DEFAULT '0',
  `stk_jumlah_pegawai` double DEFAULT '0',
  PRIMARY KEY (`stk_kode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `stk_master` */

/*Table structure for table `sys_counter` */

DROP TABLE IF EXISTS `sys_counter`;

CREATE TABLE `sys_counter` (
  `Company_Code` varchar(16) NOT NULL DEFAULT '0000000000000000',
  `Counter_Group` varchar(30) NOT NULL,
  `Counter_Group_ID` varchar(3) NOT NULL,
  `Counter_Description` varchar(100) DEFAULT NULL,
  `Counter_Prefix` varchar(4) DEFAULT NULL,
  `Counter_Separator` varchar(1) DEFAULT NULL,
  `Counter_Prefix_Position` tinyint(4) DEFAULT '2',
  `Counter_Max_Digit` tinyint(4) DEFAULT '5',
  `Counter_Max_Number` bigint(20) DEFAULT '1',
  `Counter_Last_Number` bigint(20) DEFAULT '0',
  `Counter_Reset_Mode` tinyint(4) DEFAULT '0' COMMENT '0=Harian, 1=Mingguan, 2=Bulanan, 3=Tahunan, 9=No Reset',
  `Counter_Number_Format` varchar(20) DEFAULT NULL,
  `Counter_Is_Default` tinyint(4) DEFAULT '0' COMMENT '1=Default digunakan oleh semua transaksi jika belum didefinikan',
  `Counter_Is_Active` tinyint(4) DEFAULT '1',
  `Created_By` varchar(32) DEFAULT NULL,
  `Created_Date` datetime DEFAULT NULL,
  `Creator_Ip` varchar(100) DEFAULT NULL,
  `Last_Updated_By` varchar(32) DEFAULT NULL,
  `Last_Updated_Date` datetime DEFAULT NULL,
  `Last_Updated_Ip` varchar(100) DEFAULT NULL,
  `Disactivated_By` varchar(32) DEFAULT NULL,
  `Disactivated_Date` datetime DEFAULT NULL,
  `Disactivated_Ip` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Company_Code`,`Counter_Group`,`Counter_Group_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `sys_counter` */

/*Table structure for table `sys_counter_detail` */

DROP TABLE IF EXISTS `sys_counter_detail`;

CREATE TABLE `sys_counter_detail` (
  `Company_Code` varchar(16) NOT NULL DEFAULT '0000000000000000' COMMENT 'Cadangan',
  `Counter_Group` varchar(30) NOT NULL,
  `Counter_Group_Id` varchar(4) NOT NULL,
  `Counter_Tahun` int(11) NOT NULL DEFAULT '2011',
  `Counter_Bulan` tinyint(4) NOT NULL DEFAULT '1',
  `Counter_Start_Number` bigint(20) DEFAULT '0',
  `Counter_Last_Number` bigint(20) DEFAULT '0',
  PRIMARY KEY (`Company_Code`,`Counter_Group`,`Counter_Group_Id`,`Counter_Tahun`,`Counter_Bulan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `sys_counter_detail` */

/*Table structure for table `sys_descriptions` */

DROP TABLE IF EXISTS `sys_descriptions`;

CREATE TABLE `sys_descriptions` (
  `Description_Row_Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Description_Company_Code` varchar(16) DEFAULT '0000000000000000' COMMENT 'Cadangan',
  `Description_Type` varchar(3) DEFAULT NULL,
  `Description_Text` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`Description_Row_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `sys_descriptions` */

/*Table structure for table `sys_parameters` */

DROP TABLE IF EXISTS `sys_parameters`;

CREATE TABLE `sys_parameters` (
  `Parameter_Company_Code` varchar(16) NOT NULL DEFAULT '0000000000000000' COMMENT 'Cadangan',
  `Parameter_Object_Id` varchar(32) NOT NULL,
  `Parameter_Description` varchar(255) DEFAULT NULL,
  `Parameter_Type` tinyint(4) DEFAULT '0',
  `Parameter_Value` text,
  `Parameter_Default_Value` text,
  `Parameter_Value_Type` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`Parameter_Company_Code`,`Parameter_Object_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `sys_parameters` */

/*Table structure for table `sys_parameters_log` */

DROP TABLE IF EXISTS `sys_parameters_log`;

CREATE TABLE `sys_parameters_log` (
  `Parameter_Record_Number` bigint(20) NOT NULL AUTO_INCREMENT,
  `Parameter_Company_Code` varchar(16) DEFAULT '0000000000000000' COMMENT 'Cadangan',
  `Parameter_Object_Id` varchar(32) DEFAULT NULL,
  `Parameter_Old_Value` text,
  `Parameter_New_Value` text,
  `Last_Updated_By` varchar(32) DEFAULT NULL,
  `Last_Updated_Date` datetime DEFAULT NULL,
  `Last_Updated_Ip` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Parameter_Record_Number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `sys_parameters_log` */

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id`,`name`,`dob`) values (1,'sdsds','2011-01-01');

/*Table structure for table `user_accounts` */

DROP TABLE IF EXISTS `user_accounts`;

CREATE TABLE `user_accounts` (
  `uacc_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uacc_id_hash` varchar(64) DEFAULT NULL,
  `uacc_group_fk` smallint(5) unsigned NOT NULL,
  `uacc_email` varchar(100) NOT NULL,
  `uacc_username` varchar(100) NOT NULL,
  `uacc_password` varchar(60) NOT NULL,
  `uacc_ip_address` varchar(40) NOT NULL,
  `uacc_salt` varchar(40) NOT NULL,
  `uacc_activation_token` varchar(40) NOT NULL,
  `uacc_forgotten_password_token` varchar(40) NOT NULL,
  `uacc_forgotten_password_expire` datetime NOT NULL,
  `uacc_update_email_token` varchar(40) NOT NULL,
  `uacc_update_email` varchar(100) NOT NULL,
  `uacc_active` tinyint(1) unsigned NOT NULL,
  `uacc_suspend` tinyint(1) unsigned NOT NULL,
  `uacc_fail_login_attempts` smallint(5) NOT NULL,
  `uacc_fail_login_ip_address` varchar(40) NOT NULL,
  `uacc_date_fail_login_ban` datetime NOT NULL COMMENT 'Time user is banned until due to repeated failed logins',
  `uacc_date_last_login` datetime NOT NULL,
  `uacc_date_added` datetime NOT NULL,
  PRIMARY KEY (`uacc_id`),
  UNIQUE KEY `uacc_id` (`uacc_id`),
  KEY `uacc_group_fk` (`uacc_group_fk`),
  KEY `uacc_email` (`uacc_email`),
  KEY `uacc_username` (`uacc_username`),
  KEY `uacc_fail_login_ip_address` (`uacc_fail_login_ip_address`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

/*Data for the table `user_accounts` */

insert  into `user_accounts`(`uacc_id`,`uacc_id_hash`,`uacc_group_fk`,`uacc_email`,`uacc_username`,`uacc_password`,`uacc_ip_address`,`uacc_salt`,`uacc_activation_token`,`uacc_forgotten_password_token`,`uacc_forgotten_password_expire`,`uacc_update_email_token`,`uacc_update_email`,`uacc_active`,`uacc_suspend`,`uacc_fail_login_attempts`,`uacc_fail_login_ip_address`,`uacc_date_fail_login_ban`,`uacc_date_last_login`,`uacc_date_added`) values (1,'356a192b7913b04c54574d18c28d46e6395428ab',3,'admin@admin.com','admin','$2a$08$lSOQGNqwBFUEDTxm2Y.hb.mfPEAt/iiGY9kJsZsd4ekLJXLD.tCrq','127.0.0.1','XKVT29q2Jr','','','0000-00-00 00:00:00','','',1,0,0,'','0000-00-00 00:00:00','2013-02-16 00:43:49','2011-01-01 00:00:00'),(2,'da4b9237bacccdf19c0760cab7aec4a8359010b0',2,'moderator@moderator.com','moderator','$2a$08$q.0ZhovC5ZkVpkBLJ.Mz.O4VjWsKohYckJNx4KM40MXdP/zEZpwcm','0.0.0.0','ZC38NNBPjF','','','0000-00-00 00:00:00','','',1,0,0,'','0000-00-00 00:00:00','2012-04-10 21:58:02','2011-08-04 16:49:07'),(3,'77de68daecd823babbb58edb1c8e14d7106e83bb',1,'public@public.com','public','$2a$08$GlxQ00VKlev2t.CpvbTOlepTJljxF2RocJghON37r40mbDl4vJLv2','127.0.0.1','CDNFV6dHmn','','','0000-00-00 00:00:00','','',1,0,0,'','0000-00-00 00:00:00','2013-02-02 06:29:57','2011-09-15 12:24:45'),(9,'0ade7c2cf97f75d009975f4d720d1fa6c19f4897',1,'juleha1@email.com','juleha1@email.c','$2a$08$VzelDeMV4kFCcVerlflHNuQtSx58VwhvUre4CWHOVbo2EBdXtEm.S','127.0.0.1','qx5k5z7gHY','','','0000-00-00 00:00:00','','',1,0,0,'','0000-00-00 00:00:00','2013-02-13 08:04:43','2012-12-27 03:42:03'),(10,'b1d5781111d84f7b3fe45a0852e59758cd7a87e5',1,'minah@email.com','minah@email.com','$2a$08$LPq/bNocS5msVRAYGe2OkOzMU.n4bAfMzPBMJQ0d2RlgyJGDTkXhm','::1','ZFZTzDJMNx','','','0000-00-00 00:00:00','','',1,0,0,'','0000-00-00 00:00:00','2013-01-27 02:06:30','2012-12-30 09:21:33'),(11,'17ba0791499db908433b80f37c5fbc89b870084b',1,'mirna@email.com','mirna@email.com','$2a$08$CUp1BG5Dt8Fz.bTPfd2MD.lUhqrDVKtwwZmLX6uLHtvEE.X2pcSS6','::1','2SGjngw5C9','','','0000-00-00 00:00:00','','',1,0,0,'','0000-00-00 00:00:00','2013-01-27 15:21:32','2012-12-30 09:54:12'),(12,'7b52009b64fd0a2a49e6d8a939753077792b0554',1,'kumkum@email.com','kumkum@email.co','$2a$08$MpHtLbUDqrUY3cC.aebUJ.LBhEux1x9f.VMgrSMUCPtIEs7Fv9CbS','::1','xXkSptDZHr','','','0000-00-00 00:00:00','','',1,0,0,'','0000-00-00 00:00:00','2013-01-05 02:59:45','2013-01-05 00:52:53'),(13,'bd307a3ec329e10a2cff8fb87480823da114f8f4',1,'bulan@email.com','bulan@email.com','$2a$08$k4Cau/AAZhhE7lj6lkaFsettpktoEPI1PdBM31Qd40VqGs27R1d0C','127.0.0.1','r7D3SJPtDn','','','0000-00-00 00:00:00','','',1,0,0,'','0000-00-00 00:00:00','2013-01-21 08:50:12','2013-01-05 09:12:28'),(14,'fa35e192121eabf3dabf9f5ea6abdbcbc107ac3b',1,'sundari@email.com','sundari@email.c','$2a$08$d5.QDgbqxoi7FAvmOa9OG.fiNkYcNzOgwJhd5pi/wIH9nhu7fI07S','127.0.0.1','Dz6cmzPxvT','','','0000-00-00 00:00:00','','',1,0,0,'','0000-00-00 00:00:00','2013-01-21 07:39:46','2013-01-06 02:43:47'),(15,'f1abd670358e036c31296e66b3b66c382ac00812',1,'jamilah@email.com','jamilah@email.com','$2a$08$rZXUVtkLAICICjtYEdEOh.krFKjFz6xpJjCkV63vs1P9jJ1y8a6W2','127.0.0.1','MWDpvqyrdJ','','','0000-00-00 00:00:00','','',1,0,0,'','0000-00-00 00:00:00','2013-01-13 00:14:23','2013-01-13 00:14:22'),(16,'1574bddb75c78a6fd2251d61e2993b5146201319',1,'suneo@email.com','suneo@email.com','$2a$08$7ddEsumkvAFwZj629WG83.0PYvBu4xTIX3p4qB70AFdtidp5fmXuG','127.0.0.1','BtyfRx9QFX','','','0000-00-00 00:00:00','','',1,0,0,'','0000-00-00 00:00:00','2013-01-21 14:19:13','2013-01-13 00:15:04'),(17,'0716d9708d321ffb6a00818614779e779925365c',1,'imelda@email.com','imelda@email.com','$2a$08$svLUdhwT4RTVXj3hRt.PpuRQM3rxXDnU9rN7naVRwZ7aedORzLguG','127.0.0.1','jwh6mx9GyY','','','0000-00-00 00:00:00','','',1,0,0,'','0000-00-00 00:00:00','2013-01-13 00:16:20','2013-01-13 00:16:18'),(18,'9e6a55b6b4563e652a23be9d623ca5055c356940',1,'biki@email.com','biki@email.com','$2a$08$KQliwbZQBioBwjWc78YWQOlrgGTUoTGUoY3e.NvWLkHiscO4tvAjm','127.0.0.1','RKjnDMDwJb','','','0000-00-00 00:00:00','','',1,0,0,'','0000-00-00 00:00:00','2013-01-13 00:18:31','2013-01-13 00:18:30'),(19,'b3f0c7f6bb763af1be91d9e74eabfeb199dc1f1f',1,'niken@email.com','niken@email.com','$2a$08$10cxHdjyK4CNjrCPWe7jD.mJPqV1sK0lXw9s3aFIFb8ofMg5271qy','::1','K6hmwWSjSQ','','','0000-00-00 00:00:00','','',1,0,0,'','0000-00-00 00:00:00','2013-01-24 03:24:49','2013-01-18 09:42:12'),(20,'91032ad7bbcb6cf72875e8e8207dcfba80173f7c',1,'monika@email.com','monika@email.com','$2a$08$jg4OzhcxUcMrLUkV81y0duG0RfHLjoPiK0xqzTWAzX7/ZQ2eZpH1u','::1','PrCSPPDVpv','','','0000-00-00 00:00:00','','',1,0,0,'','0000-00-00 00:00:00','2013-01-24 03:28:46','2013-01-18 10:21:48');

/*Table structure for table `user_groups` */

DROP TABLE IF EXISTS `user_groups`;

CREATE TABLE `user_groups` (
  `ugrp_id` smallint(5) NOT NULL AUTO_INCREMENT,
  `ugrp_name` varchar(20) NOT NULL,
  `ugrp_desc` varchar(100) NOT NULL,
  `ugrp_admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`ugrp_id`),
  UNIQUE KEY `ugrp_id` (`ugrp_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `user_groups` */

insert  into `user_groups`(`ugrp_id`,`ugrp_name`,`ugrp_desc`,`ugrp_admin`) values (1,'Public','Public User : has no admin access rights.',0),(2,'Moderator','Admin Moderator : has partial admin access rights.',1),(3,'Master Admin','Master Admin : has full admin access rights.',1);

/*Table structure for table `user_login_sessions` */

DROP TABLE IF EXISTS `user_login_sessions`;

CREATE TABLE `user_login_sessions` (
  `usess_uacc_fk` int(11) NOT NULL,
  `usess_series` varchar(40) NOT NULL,
  `usess_token` varchar(40) NOT NULL,
  `usess_login_date` datetime NOT NULL,
  PRIMARY KEY (`usess_token`),
  UNIQUE KEY `usess_token` (`usess_token`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user_login_sessions` */

insert  into `user_login_sessions`(`usess_uacc_fk`,`usess_series`,`usess_token`,`usess_login_date`) values (9,'','1ff8edf96a07d0a4a1f30a0c8885446b7e7d7b97','2013-02-13 08:05:02'),(9,'','e71168190ad4c2fde5548c7a4c2793ec772dad37','2013-02-02 12:04:22');

/*Table structure for table `user_privilege_users` */

DROP TABLE IF EXISTS `user_privilege_users`;

CREATE TABLE `user_privilege_users` (
  `upriv_users_id` smallint(5) NOT NULL AUTO_INCREMENT,
  `upriv_users_uacc_fk` int(11) NOT NULL,
  `upriv_users_upriv_fk` smallint(5) NOT NULL,
  PRIMARY KEY (`upriv_users_id`),
  UNIQUE KEY `upriv_users_id` (`upriv_users_id`) USING BTREE,
  KEY `upriv_users_uacc_fk` (`upriv_users_uacc_fk`),
  KEY `upriv_users_upriv_fk` (`upriv_users_upriv_fk`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `user_privilege_users` */

insert  into `user_privilege_users`(`upriv_users_id`,`upriv_users_uacc_fk`,`upriv_users_upriv_fk`) values (1,1,1),(2,1,2),(3,1,3),(4,1,4),(5,1,5),(6,1,6),(7,1,7),(8,1,8),(9,1,9),(10,1,10),(11,1,11),(12,2,1),(13,2,2),(14,2,3),(15,2,6);

/*Table structure for table `user_privileges` */

DROP TABLE IF EXISTS `user_privileges`;

CREATE TABLE `user_privileges` (
  `upriv_id` smallint(5) NOT NULL AUTO_INCREMENT,
  `upriv_name` varchar(20) NOT NULL,
  `upriv_desc` varchar(100) NOT NULL,
  PRIMARY KEY (`upriv_id`),
  UNIQUE KEY `upriv_id` (`upriv_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `user_privileges` */

insert  into `user_privileges`(`upriv_id`,`upriv_name`,`upriv_desc`) values (1,'View Users','User can view user account details.'),(2,'View User Groups','User can view user groups.'),(3,'View Privileges','User can view privileges.'),(4,'Insert User Groups','User can insert new user groups.'),(5,'Insert Privileges','User can insert privileges.'),(6,'Update Users','User can update user account details.'),(7,'Update User Groups','User can update user groups.'),(8,'Update Privileges','User can update user privileges.'),(9,'Delete Users','User can delete user accounts.'),(10,'Delete User Groups','User can delete user groups.'),(11,'Delete Privileges','User can delete user privileges.');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
