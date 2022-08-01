/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.4.22-MariaDB : Database - bengkel
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
USE `bengkel`;

/*Table structure for table `cart` */

DROP TABLE IF EXISTS `cart`;

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `ID_Suku_Cadang` varchar(30) NOT NULL,
  `cart_qty` int(11) NOT NULL,
  PRIMARY KEY (`cart_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `cart` */

/*Table structure for table `customer` */

DROP TABLE IF EXISTS `customer`;

CREATE TABLE `customer` (
  `ID_pemilik` varchar(6) NOT NULL,
  `nama_pemilik` varchar(30) DEFAULT NULL,
  `alamat_pemilik` varchar(90) DEFAULT NULL,
  `telp_pemilik` varchar(12) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ID_pemilik`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `customer` */

insert  into `customer`(`ID_pemilik`,`nama_pemilik`,`alamat_pemilik`,`telp_pemilik`,`email`,`username`,`password`,`role`) values 
(' 12','Aryo','Madiun','081234189999','aryo@gmail.com','aryopanduuu','aryo','admin'),
('CUS001','lia','lialia','085706568677','lia@gmail.com','lialia','lia','customer'),
('CUS002','test','test','1234','test@gmail.com','test','test','customer'),
('CUS003','cok','cok','123123123123','cok@gmail.com','cokc','cok','customer'),
('CUS004','Aryo','Madiun','111111','pandu@gmail.com','aryopanduuu','pandu','customer'),
('CUS005','anjay','anjay','123123123123','anjay@gmail.com','anjay','anjay','customer'),
('CUS006','aryo1','madiun','123123123123','aryo1@gmail.com','aryo1','aryo1','customer'),
('CUS007','aryo2','Madiun','123123123123','aryo2@gmail.com','aryo2','aryo2','customer');

/*Table structure for table `detail_nota_suku_cadang` */

DROP TABLE IF EXISTS `detail_nota_suku_cadang`;

CREATE TABLE `detail_nota_suku_cadang` (
  `No_Nota_Suku_Cadang` varchar(7) NOT NULL,
  `ID_Suku_Cadang` varchar(20) NOT NULL,
  `Banyak` int(11) DEFAULT NULL,
  PRIMARY KEY (`No_Nota_Suku_Cadang`,`ID_Suku_Cadang`),
  KEY `dnsc_IDSC_fk` (`ID_Suku_Cadang`),
  CONSTRAINT `dnsc_IDSC_fk` FOREIGN KEY (`ID_Suku_Cadang`) REFERENCES `suku_cadang` (`ID_Suku_Cadang`),
  CONSTRAINT `dnsc_notasukucadang_fk` FOREIGN KEY (`No_Nota_Suku_Cadang`) REFERENCES `nota_suku_cadang` (`No_Nota_Suku_Cadang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `detail_nota_suku_cadang` */

insert  into `detail_nota_suku_cadang`(`No_Nota_Suku_Cadang`,`ID_Suku_Cadang`,`Banyak`) values 
('NSC0001','1',5),
('NSC0002','1',1),
('NSC0003','1',2),
('NSC0004','1',3),
('NSC0005','1',1),
('NSC0006','1',2),
('NSC0007','1',1),
('NSC0008','1',1),
('NSC0009','1',1),
('NSC0010','1',2),
('NSC0011','1',1);

/*Table structure for table `jabatan` */

DROP TABLE IF EXISTS `jabatan`;

CREATE TABLE `jabatan` (
  `ID_Jabatan` char(1) NOT NULL,
  `Nama_Jabatan` varchar(10) DEFAULT NULL,
  `Gaji_Pokok` int(11) DEFAULT NULL,
  `Tunjangan` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_Jabatan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `jabatan` */

insert  into `jabatan`(`ID_Jabatan`,`Nama_Jabatan`,`Gaji_Pokok`,`Tunjangan`) values 
('5','Mekanik',200000,200000);

/*Table structure for table `kendaraan` */

DROP TABLE IF EXISTS `kendaraan`;

CREATE TABLE `kendaraan` (
  `NO_STNK` varchar(10) NOT NULL,
  `ID_Pemilik` varchar(6) DEFAULT NULL,
  `ID_Tipe` char(4) DEFAULT NULL,
  `No_Mesin` varchar(14) DEFAULT NULL,
  `No_Rangka` varchar(18) DEFAULT NULL,
  `Tahun` int(11) DEFAULT NULL,
  `Warna` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`NO_STNK`),
  KEY `kndr_IDPemilik_fk` (`ID_Pemilik`),
  KEY `kndr_IDTipe_fk` (`ID_Tipe`),
  CONSTRAINT `kndr_IDPemilik_fk` FOREIGN KEY (`ID_Pemilik`) REFERENCES `customer` (`ID_pemilik`),
  CONSTRAINT `kndr_IDTipe_fk` FOREIGN KEY (`ID_Tipe`) REFERENCES `tipe_kendaraan` (`ID_tipe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `kendaraan` */

/*Table structure for table `meminta` */

DROP TABLE IF EXISTS `meminta`;

CREATE TABLE `meminta` (
  `ID_PKB` varchar(5) NOT NULL,
  `ID_Perintah_Kerja` varchar(4) NOT NULL,
  PRIMARY KEY (`ID_PKB`,`ID_Perintah_Kerja`),
  KEY `mnt_IDPrthKrj_fk` (`ID_Perintah_Kerja`),
  CONSTRAINT `mnt_IDPKB_fk` FOREIGN KEY (`ID_PKB`) REFERENCES `pkb` (`ID_PKB`),
  CONSTRAINT `mnt_IDPrthKrj_fk` FOREIGN KEY (`ID_Perintah_Kerja`) REFERENCES `perintah_kerja` (`ID_Perintah_Kerja`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `meminta` */

/*Table structure for table `nota_suku_cadang` */

DROP TABLE IF EXISTS `nota_suku_cadang`;

CREATE TABLE `nota_suku_cadang` (
  `No_Nota_Suku_Cadang` varchar(7) NOT NULL,
  `Tgl_Nota_Suku_Cadang` date DEFAULT NULL,
  `ID_pemilik` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`No_Nota_Suku_Cadang`),
  KEY `pemilik_fk` (`ID_pemilik`),
  CONSTRAINT `pemilik_fk` FOREIGN KEY (`ID_pemilik`) REFERENCES `customer` (`ID_pemilik`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `nota_suku_cadang` */

insert  into `nota_suku_cadang`(`No_Nota_Suku_Cadang`,`Tgl_Nota_Suku_Cadang`,`ID_pemilik`) values 
('NSC0001','2022-01-09','CUS001'),
('NSC0002','2022-01-11','CUS001'),
('NSC0003','2022-01-11','CUS001'),
('NSC0004','2022-01-11','CUS001'),
('NSC0005','2022-01-11','CUS001'),
('NSC0006','2022-01-11','CUS001'),
('NSC0007','2022-01-13','CUS002'),
('NSC0008','2022-01-13','CUS007'),
('NSC0009','2022-01-13','CUS007'),
('NSC0010','2022-01-13','CUS002'),
('NSC0011','2022-01-13','CUS007');

/*Table structure for table `pegawai` */

DROP TABLE IF EXISTS `pegawai`;

CREATE TABLE `pegawai` (
  `ID_Pegawai` varchar(6) NOT NULL,
  `ID_Jabatan` char(1) DEFAULT NULL,
  `Nama_Pegawai` varchar(30) DEFAULT NULL,
  `Alamat_Pegawai` varchar(30) DEFAULT NULL,
  `Tlp_Pegawai` varchar(12) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ID_Pegawai`),
  KEY `pgw_ID_fk` (`ID_Jabatan`),
  CONSTRAINT `pgw_ID_fk` FOREIGN KEY (`ID_Jabatan`) REFERENCES `jabatan` (`ID_Jabatan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `pegawai` */

insert  into `pegawai`(`ID_Pegawai`,`ID_Jabatan`,`Nama_Pegawai`,`Alamat_Pegawai`,`Tlp_Pegawai`,`email`,`username`,`password`,`role`) values 
('P1','5','Aryo Pandu','Jl.Kerta Mulya No.17','081234189999','1234@gmail.com','1234','1234','admin');

/*Table structure for table `pembayaran` */

DROP TABLE IF EXISTS `pembayaran`;

CREATE TABLE `pembayaran` (
  `id_pembayaran` varchar(5) NOT NULL,
  `No_Nota_Suku_Cadang` varchar(7) NOT NULL,
  `tgl_pembayaran` date NOT NULL,
  `total_harga` int(11) NOT NULL,
  `bukti_pembayaran` blob NOT NULL,
  PRIMARY KEY (`id_pembayaran`),
  KEY `pembayaran_pkb_fk` (`No_Nota_Suku_Cadang`),
  CONSTRAINT `fk_nsc_nota_suku_cadang` FOREIGN KEY (`No_Nota_Suku_Cadang`) REFERENCES `nota_suku_cadang` (`No_Nota_Suku_Cadang`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `pembayaran` */

insert  into `pembayaran`(`id_pembayaran`,`No_Nota_Suku_Cadang`,`tgl_pembayaran`,`total_harga`,`bukti_pembayaran`) values 
('B0001','NSC0001','2022-01-09',750000,'PWBF Praktikum (1).png'),
('B0002','NSC0002','2022-01-11',150000,''),
('B0003','NSC0002','2022-01-11',150000,'6 siswa-01.png'),
('B0004','NSC0002','2022-01-11',150000,'3.png'),
('B0005','NSC0002','2022-01-11',150000,'3.png'),
('B0006','NSC0002','2022-01-11',150000,'6 siswa-01.png'),
('B0007','NSC0002','2022-01-11',150000,'6 siswa-01.png'),
('B0008','NSC0003','2022-01-11',300000,'7 Sementara-01.png'),
('B0009','NSC0003','2022-01-11',300000,'7 Sementara-01.png'),
('B0010','NSC0003','2022-01-11',300000,''),
('B0011','NSC0003','2022-01-11',300000,'3 wajib-01.png'),
('B0012','NSC0003','2022-01-11',300000,'3 wajib-01.png'),
('B0013','NSC0004','2022-01-11',450000,'7.png'),
('B0014','NSC0005','2022-01-11',150000,'7 Sementara-01.png'),
('B0015','NSC0006','2022-01-11',300000,'7.png'),
('B0016','NSC0007','2022-01-13',150000,'7 Sementara-01.png'),
('B0017','NSC0009','2022-01-13',150000,'6 siswa-01.png'),
('B0018','NSC0010','2022-01-13',300000,'carbon (2).png'),
('B0019','NSC0011','2022-01-13',150000,'');

/*Table structure for table `perintah_kerja` */

DROP TABLE IF EXISTS `perintah_kerja`;

CREATE TABLE `perintah_kerja` (
  `ID_Perintah_Kerja` varchar(4) NOT NULL,
  `Nama_perintah_Kerja` varchar(30) DEFAULT NULL,
  `Harga_Layanan` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_Perintah_Kerja`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `perintah_kerja` */

insert  into `perintah_kerja`(`ID_Perintah_Kerja`,`Nama_perintah_Kerja`,`Harga_Layanan`) values 
('','Masang Baut',5000);

/*Table structure for table `pkb` */

DROP TABLE IF EXISTS `pkb`;

CREATE TABLE `pkb` (
  `ID_PKB` varchar(5) NOT NULL,
  `NO_STNK` varchar(10) DEFAULT NULL,
  `ID_Pegawai` varchar(6) DEFAULT NULL,
  `No_Nota_Suku_Cadang` varchar(7) DEFAULT NULL,
  `Tgl_Terima` date DEFAULT NULL,
  `Jam_Terima` time DEFAULT NULL,
  `KM_Terakhir` int(11) DEFAULT NULL,
  `Waktu_Pengerjaan` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_PKB`),
  KEY `pkb_NOSTNK_fk` (`NO_STNK`),
  KEY `pkb_IDPegawai_fk` (`ID_Pegawai`),
  KEY `pkb_NoNotaSukuCadang_fk` (`No_Nota_Suku_Cadang`),
  CONSTRAINT `pkb_IDPegawai_fk` FOREIGN KEY (`ID_Pegawai`) REFERENCES `pegawai` (`ID_Pegawai`),
  CONSTRAINT `pkb_NOSTNK_fk` FOREIGN KEY (`NO_STNK`) REFERENCES `kendaraan` (`NO_STNK`),
  CONSTRAINT `pkb_NoNotaSukuCadang_fk` FOREIGN KEY (`No_Nota_Suku_Cadang`) REFERENCES `nota_suku_cadang` (`No_Nota_Suku_Cadang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `pkb` */

/*Table structure for table `suku_cadang` */

DROP TABLE IF EXISTS `suku_cadang`;

CREATE TABLE `suku_cadang` (
  `ID_Suku_Cadang` varchar(20) NOT NULL,
  `Nama_Suku_cadang` varchar(30) DEFAULT NULL,
  `Harga_Satuan` int(11) DEFAULT NULL,
  `Gambar` text NOT NULL,
  `Stok` int(100) DEFAULT NULL,
  PRIMARY KEY (`ID_Suku_Cadang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `suku_cadang` */

insert  into `suku_cadang`(`ID_Suku_Cadang`,`Nama_Suku_cadang`,`Harga_Satuan`,`Gambar`,`Stok`) values 
('1','Oli',150000,'oli.png',4);

/*Table structure for table `tipe_kendaraan` */

DROP TABLE IF EXISTS `tipe_kendaraan`;

CREATE TABLE `tipe_kendaraan` (
  `ID_tipe` char(4) NOT NULL,
  `nama_tipe` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ID_tipe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tipe_kendaraan` */

/* Trigger structure for table `customer` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `before_insert_customer` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `before_insert_customer` BEFORE INSERT ON `customer` FOR EACH ROW 
BEGIN
    SET NEW.id_pemilik = CONCAT('CUS',LPAD((
    IFNULL((SELECT CAST(SUBSTR(id_pemilik,4,3)AS INT) 
    FROM customer
    ORDER BY id_pemilik DESC 
    LIMIT 1),0)+1),3,"0"));
END */$$


DELIMITER ;

/* Trigger structure for table `nota_suku_cadang` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `before_insert_nsc` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `before_insert_nsc` BEFORE INSERT ON `nota_suku_cadang` FOR EACH ROW 
BEGIN
    SET NEW.no_nota_suku_cadang = CONCAT('NSC',LPAD((
    IFNULL((SELECT CAST(SUBSTR(no_nota_suku_cadang,4,4)AS INT) 
    FROM nota_suku_cadang
    ORDER BY no_nota_suku_cadang DESC 
    LIMIT 1),0)+1),4,"0"));
END */$$


DELIMITER ;

/* Trigger structure for table `pembayaran` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `before_insert_pembayaran` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `before_insert_pembayaran` BEFORE INSERT ON `pembayaran` FOR EACH ROW 
BEGIN
	SET NEW.id_pembayaran = CONCAT('B',LPAD((
	IFNULL((SELECT CAST(SUBSTR(id_pembayaran,2,4)AS INT) 
	FROM pembayaran
	ORDER BY id_pembayaran DESC 
	LIMIT 1),0)+1),4,"0"));
END */$$


DELIMITER ;

/* Function  structure for function  `total` */

/*!50003 DROP FUNCTION IF EXISTS `total` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `total`(id VARCHAR(7)) RETURNS int(11)
BEGIN
DECLARE hitung INT;
SELECT SUM(sc.harga_satuan * dn.banyak) INTO hitung
FROM detail_nota_suku_cadang dn, suku_cadang sc
WHERE sc.id_suku_cadang = dn.id_suku_cadang
	AND dn.no_nota_suku_cadang = id;
RETURN hitung;
END */$$
DELIMITER ;

/*Table structure for table `pembelian` */

DROP TABLE IF EXISTS `pembelian`;

/*!50001 DROP VIEW IF EXISTS `pembelian` */;
/*!50001 DROP TABLE IF EXISTS `pembelian` */;

/*!50001 CREATE TABLE  `pembelian`(
 `no_nota_suku_cadang` varchar(7) ,
 `nama_pemilik` varchar(30) ,
 `email` varchar(50) 
)*/;

/*View structure for view pembelian */

/*!50001 DROP TABLE IF EXISTS `pembelian` */;
/*!50001 DROP VIEW IF EXISTS `pembelian` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pembelian` AS select `nsc`.`No_Nota_Suku_Cadang` AS `no_nota_suku_cadang`,`cus`.`nama_pemilik` AS `nama_pemilik`,`cus`.`email` AS `email` from (`nota_suku_cadang` `nsc` join `customer` `cus` on(`cus`.`ID_pemilik` = `nsc`.`ID_pemilik`)) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
