/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     1/10/2018 2:18:32 AM                         */
/*==============================================================*/


drop table if exists TB_ADMIN;

drop table if exists TB_DETAIL;

drop table if exists TB_KOPI;

drop table if exists TB_PEMBELIAN;

drop table if exists TB_USER;

/*==============================================================*/
/* Table: TB_ADMIN                                              */
/*==============================================================*/
create table TB_ADMIN
(
   KD_ADMIN             int not null AUTO_INCREMENT,
   USERNAME             varchar(55),
   PASSWORD             text,
   primary key (KD_ADMIN)
);

/*==============================================================*/
/* Table: TB_DETAIL                                             */
/*==============================================================*/
create table TB_DETAIL
(
   KD_DETAIL            int not null AUTO_INCREMENT,
   KD_PEMBELIAN         int,
   KD_KOPI              int,
   JUMLAH               int,
   TOTAL                int,
   primary key (KD_DETAIL)
);

/*==============================================================*/
/* Table: TB_KOPI                                               */
/*==============================================================*/
create table TB_KOPI
(
   KD_KOPI              int not null AUTO_INCREMENT,
   NAMA_KOPI            varchar(55),
   BERAT                int,
   ASAL_KOPI            varchar(55),
   HARGA                int,
   STOCK                int,
   primary key (KD_KOPI)
);

/*==============================================================*/
/* Table: TB_PEMBELIAN                                          */
/*==============================================================*/
create table TB_PEMBELIAN
(
   KD_PEMBELIAN         int not null AUTO_INCREMENT,
   KD_USER              int,
   TGL_PEMBELIAN        text,
   TOTAL                int,
   primary key (KD_PEMBELIAN)
);

/*==============================================================*/
/* Table: TB_USER                                               */
/*==============================================================*/
create table TB_USER
(
   KD_USER              int not null AUTO_INCREMENT,
   NAMA_USER            varchar(55),
   NO_TELP              text,
   EMAIL                text,
   PASSWORD             text,
   primary key (KD_USER)
);

alter table TB_DETAIL add constraint FK_DIBELI foreign key (KD_KOPI)
      references TB_KOPI (KD_KOPI) on delete restrict on update restrict;

alter table TB_DETAIL add constraint FK_MEMPUNYAI foreign key (KD_PEMBELIAN)
      references TB_PEMBELIAN (KD_PEMBELIAN) on delete restrict on update restrict;

alter table TB_PEMBELIAN add constraint FK_PEMBELIAN foreign key (KD_USER)
      references TB_USER (KD_USER) on delete restrict on update restrict;

