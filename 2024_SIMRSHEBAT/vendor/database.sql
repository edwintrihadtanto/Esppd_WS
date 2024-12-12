/*
 Navicat Premium Data Transfer

 Source Server         : db
 Source Server Type    : PostgreSQL
 Source Server Version : 140007
 Source Host           : localhost:5432
 Source Catalog        : postgres
 Source Schema         : public

 Target Server Type    : PostgreSQL
 Target Server Version : 140007
 File Encoding         : 65001

 Date: 27/02/2023 19:33:44
*/


-- ----------------------------
-- Sequence structure for bayar_id_bayar_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."bayar_id_bayar_seq";
CREATE SEQUENCE "public"."bayar_id_bayar_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for detail_component_id_detail_component_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."detail_component_id_detail_component_seq";
CREATE SEQUENCE "public"."detail_component_id_detail_component_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for detail_transaksi_id_detail_transaksi_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."detail_transaksi_id_detail_transaksi_seq";
CREATE SEQUENCE "public"."detail_transaksi_id_detail_transaksi_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for group_id_group_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."group_id_group_seq";
CREATE SEQUENCE "public"."group_id_group_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for jenis_component_id_jenis_component_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."jenis_component_id_jenis_component_seq";
CREATE SEQUENCE "public"."jenis_component_id_jenis_component_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for jenis_pembayaran_id_jenis_pembayaran_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."jenis_pembayaran_id_jenis_pembayaran_seq";
CREATE SEQUENCE "public"."jenis_pembayaran_id_jenis_pembayaran_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for jenis_produk_id_jenis_produk_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."jenis_produk_id_jenis_produk_seq";
CREATE SEQUENCE "public"."jenis_produk_id_jenis_produk_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for kunjungan_id_kunjungan_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."kunjungan_id_kunjungan_seq";
CREATE SEQUENCE "public"."kunjungan_id_kunjungan_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for modul_id_modul_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."modul_id_modul_seq";
CREATE SEQUENCE "public"."modul_id_modul_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for parent_model_id_parent_group_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."parent_model_id_parent_group_seq";
CREATE SEQUENCE "public"."parent_model_id_parent_group_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for pegawai_id_pegawai_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."pegawai_id_pegawai_seq";
CREATE SEQUENCE "public"."pegawai_id_pegawai_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for penjamin_id_penjamin_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."penjamin_id_penjamin_seq";
CREATE SEQUENCE "public"."penjamin_id_penjamin_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for produk_id_produk_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."produk_id_produk_seq";
CREATE SEQUENCE "public"."produk_id_produk_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for tarif_id_tarif_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."tarif_id_tarif_seq";
CREATE SEQUENCE "public"."tarif_id_tarif_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for tipe_pembayaran_id_tipe_pembayaran_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."tipe_pembayaran_id_tipe_pembayaran_seq";
CREATE SEQUENCE "public"."tipe_pembayaran_id_tipe_pembayaran_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for transaksi_id_transaksi_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."transaksi_id_transaksi_seq";
CREATE SEQUENCE "public"."transaksi_id_transaksi_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for user_kd_user_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."user_kd_user_seq";
CREATE SEQUENCE "public"."user_kd_user_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Table structure for bayar
-- ----------------------------
DROP TABLE IF EXISTS "public"."bayar";
CREATE TABLE "public"."bayar" (
  "id_bayar" int4 NOT NULL DEFAULT nextval('bayar_id_bayar_seq'::regclass),
  "id_transaksi" int4 NOT NULL,
  "id_pembayaran" int4 NOT NULL,
  "jumlah" float8 NOT NULL,
  "id_user" int4 NOT NULL,
  "tgl_bayar" timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP
)
;

-- ----------------------------
-- Records of bayar
-- ----------------------------

-- ----------------------------
-- Table structure for detail_component
-- ----------------------------
DROP TABLE IF EXISTS "public"."detail_component";
CREATE TABLE "public"."detail_component" (
  "id_detail_component" int8 NOT NULL DEFAULT nextval('detail_component_id_detail_component_seq'::regclass),
  "id_detail_transaksi" int4 NOT NULL,
  "id_jenis_component" int4 NOT NULL,
  "id_pegawai" int4,
  "jumlah" float8 NOT NULL
)
;

-- ----------------------------
-- Records of detail_component
-- ----------------------------

-- ----------------------------
-- Table structure for detail_transaksi
-- ----------------------------
DROP TABLE IF EXISTS "public"."detail_transaksi";
CREATE TABLE "public"."detail_transaksi" (
  "id_detail_transaksi" int4 NOT NULL DEFAULT nextval('detail_transaksi_id_detail_transaksi_seq'::regclass),
  "id_transaksi" int4 NOT NULL,
  "id_kunjungan" int4 NOT NULL,
  "id_produk" int4 NOT NULL,
  "tgl_input" timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  "id_bayar" int4,
  "id_tarif" int4 NOT NULL,
  "jumlah" float8 NOT NULL DEFAULT 0.0,
  "diskon" float8 NOT NULL DEFAULT 0
)
;

-- ----------------------------
-- Records of detail_transaksi
-- ----------------------------

-- ----------------------------
-- Table structure for group
-- ----------------------------
DROP TABLE IF EXISTS "public"."group";
CREATE TABLE "public"."group" (
  "id_group" int4 NOT NULL DEFAULT nextval('group_id_group_seq'::regclass),
  "nama_group" varchar(255) COLLATE "pg_catalog"."default" NOT NULL
)
;

-- ----------------------------
-- Records of group
-- ----------------------------

-- ----------------------------
-- Table structure for group_member
-- ----------------------------
DROP TABLE IF EXISTS "public"."group_member";
CREATE TABLE "public"."group_member" (
  "id_group" int4 NOT NULL,
  "id_user" int4 NOT NULL
)
;

-- ----------------------------
-- Records of group_member
-- ----------------------------

-- ----------------------------
-- Table structure for jenis_component
-- ----------------------------
DROP TABLE IF EXISTS "public"."jenis_component";
CREATE TABLE "public"."jenis_component" (
  "id_jenis_component" int4 NOT NULL DEFAULT nextval('jenis_component_id_jenis_component_seq'::regclass),
  "jenis_component" varchar(255) COLLATE "pg_catalog"."default" NOT NULL
)
;

-- ----------------------------
-- Records of jenis_component
-- ----------------------------

-- ----------------------------
-- Table structure for jenis_pembayaran
-- ----------------------------
DROP TABLE IF EXISTS "public"."jenis_pembayaran";
CREATE TABLE "public"."jenis_pembayaran" (
  "id_jenis_pembayaran" int4 NOT NULL DEFAULT nextval('jenis_pembayaran_id_jenis_pembayaran_seq'::regclass),
  "deskripsi" varchar(255) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of jenis_pembayaran
-- ----------------------------

-- ----------------------------
-- Table structure for jenis_produk
-- ----------------------------
DROP TABLE IF EXISTS "public"."jenis_produk";
CREATE TABLE "public"."jenis_produk" (
  "id_jenis_produk" varchar(32) COLLATE "pg_catalog"."default" NOT NULL DEFAULT nextval('jenis_produk_id_jenis_produk_seq'::regclass),
  "id_parent" varchar(32) COLLATE "pg_catalog"."default",
  "deskripsi" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "pemasukan" bool NOT NULL DEFAULT true
)
;

-- ----------------------------
-- Records of jenis_produk
-- ----------------------------

-- ----------------------------
-- Table structure for kamar
-- ----------------------------
DROP TABLE IF EXISTS "public"."kamar";
CREATE TABLE "public"."kamar" (
  "id_kamar" varchar(5) COLLATE "pg_catalog"."default" NOT NULL,
  "nama_kamar" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "id_unit" varchar(5) COLLATE "pg_catalog"."default" NOT NULL
)
;

-- ----------------------------
-- Records of kamar
-- ----------------------------

-- ----------------------------
-- Table structure for kunjungan
-- ----------------------------
DROP TABLE IF EXISTS "public"."kunjungan";
CREATE TABLE "public"."kunjungan" (
  "id_kunjungan" int4 NOT NULL DEFAULT nextval('kunjungan_id_kunjungan_seq'::regclass),
  "id_unit" varchar(5) COLLATE "pg_catalog"."default" NOT NULL,
  "tgl_masuk" timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  "tgl_keluar" timestamp(6) DEFAULT NULL::timestamp without time zone,
  "id_transaksi" int4 NOT NULL,
  "id_kamar" varchar(5) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of kunjungan
-- ----------------------------

-- ----------------------------
-- Table structure for modul
-- ----------------------------
DROP TABLE IF EXISTS "public"."modul";
CREATE TABLE "public"."modul" (
  "id_modul" int4 NOT NULL DEFAULT nextval('modul_id_modul_seq'::regclass),
  "id_parent_modul" int4 NOT NULL,
  "nama_modul" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "url" varchar(255) COLLATE "pg_catalog"."default" NOT NULL
)
;

-- ----------------------------
-- Records of modul
-- ----------------------------

-- ----------------------------
-- Table structure for parent_modul
-- ----------------------------
DROP TABLE IF EXISTS "public"."parent_modul";
CREATE TABLE "public"."parent_modul" (
  "id_parent_modul" int4 NOT NULL DEFAULT nextval('parent_model_id_parent_group_seq'::regclass),
  "deskripsi" varchar(255) COLLATE "pg_catalog"."default" NOT NULL
)
;

-- ----------------------------
-- Records of parent_modul
-- ----------------------------

-- ----------------------------
-- Table structure for pasien
-- ----------------------------
DROP TABLE IF EXISTS "public"."pasien";
CREATE TABLE "public"."pasien" (
  "no_rm" varchar(6) COLLATE "pg_catalog"."default" NOT NULL,
  "nama_pasien" varchar(255) COLLATE "pg_catalog"."default" NOT NULL
)
;

-- ----------------------------
-- Records of pasien
-- ----------------------------

-- ----------------------------
-- Table structure for pegawai
-- ----------------------------
DROP TABLE IF EXISTS "public"."pegawai";
CREATE TABLE "public"."pegawai" (
  "id_pegawai" int4 NOT NULL DEFAULT nextval('pegawai_id_pegawai_seq'::regclass),
  "nama_pegawai" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "jenis_pegawai" int2 NOT NULL,
  "persentase" float4 NOT NULL DEFAULT 0,
  "no_id" varchar(255) COLLATE "pg_catalog"."default" NOT NULL
)
;
COMMENT ON COLUMN "public"."pegawai"."jenis_pegawai" IS '0: Perawat; 1: Dokter';

-- ----------------------------
-- Records of pegawai
-- ----------------------------

-- ----------------------------
-- Table structure for pembayaran
-- ----------------------------
DROP TABLE IF EXISTS "public"."pembayaran";
CREATE TABLE "public"."pembayaran" (
  "id_pembayaran" int4 NOT NULL DEFAULT nextval('tipe_pembayaran_id_tipe_pembayaran_seq'::regclass),
  "id_jenis_pembayaran" int4 NOT NULL,
  "deskripsi_pembayaran" varchar(255) COLLATE "pg_catalog"."default" NOT NULL
)
;

-- ----------------------------
-- Records of pembayaran
-- ----------------------------

-- ----------------------------
-- Table structure for penjamin
-- ----------------------------
DROP TABLE IF EXISTS "public"."penjamin";
CREATE TABLE "public"."penjamin" (
  "id_penjamin" int4 NOT NULL DEFAULT nextval('penjamin_id_penjamin_seq'::regclass),
  "nama_penjamin" varchar(255) COLLATE "pg_catalog"."default" NOT NULL
)
;

-- ----------------------------
-- Records of penjamin
-- ----------------------------

-- ----------------------------
-- Table structure for penjamin_transaksi
-- ----------------------------
DROP TABLE IF EXISTS "public"."penjamin_transaksi";
CREATE TABLE "public"."penjamin_transaksi" (
  "id_penjamin" int4 NOT NULL,
  "id_transaksi" int4 NOT NULL,
  "no_sjp" varchar(255) COLLATE "pg_catalog"."default" NOT NULL DEFAULT ''::character varying
)
;

-- ----------------------------
-- Records of penjamin_transaksi
-- ----------------------------

-- ----------------------------
-- Table structure for produk
-- ----------------------------
DROP TABLE IF EXISTS "public"."produk";
CREATE TABLE "public"."produk" (
  "id_produk" int4 NOT NULL DEFAULT nextval('produk_id_produk_seq'::regclass),
  "kd_produk" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "id_jenis_produk" varchar(32) COLLATE "pg_catalog"."default" NOT NULL,
  "nama_produk" varchar(255) COLLATE "pg_catalog"."default" NOT NULL
)
;

-- ----------------------------
-- Records of produk
-- ----------------------------

-- ----------------------------
-- Table structure for tarif
-- ----------------------------
DROP TABLE IF EXISTS "public"."tarif";
CREATE TABLE "public"."tarif" (
  "id_tarif" int4 NOT NULL DEFAULT nextval('tarif_id_tarif_seq'::regclass),
  "id_produk" int4 NOT NULL,
  "id_pembayaran" int4 NOT NULL,
  "tgl_berlaku" timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  "tgl_selesai" timestamp(6),
  "jumlah" float8 NOT NULL
)
;

-- ----------------------------
-- Records of tarif
-- ----------------------------

-- ----------------------------
-- Table structure for tarif_component
-- ----------------------------
DROP TABLE IF EXISTS "public"."tarif_component";
CREATE TABLE "public"."tarif_component" (
  "id_tarif" int4 NOT NULL,
  "id_jenis_component" int4 NOT NULL,
  "id_jenis_component_parent" int4,
  "operator" varchar(1) COLLATE "pg_catalog"."default" NOT NULL DEFAULT '='::character varying,
  "jumlah" float8 NOT NULL
)
;

-- ----------------------------
-- Records of tarif_component
-- ----------------------------

-- ----------------------------
-- Table structure for transaksi
-- ----------------------------
DROP TABLE IF EXISTS "public"."transaksi";
CREATE TABLE "public"."transaksi" (
  "id_transaksi" int4 NOT NULL DEFAULT nextval('transaksi_id_transaksi_seq'::regclass),
  "id_user" int4 NOT NULL,
  "no_mr" varchar(6) COLLATE "pg_catalog"."default" NOT NULL,
  "tgl_transaksi" timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  "tgl_tutup" timestamp(6) DEFAULT NULL::timestamp without time zone
)
;

-- ----------------------------
-- Records of transaksi
-- ----------------------------

-- ----------------------------
-- Table structure for trustee
-- ----------------------------
DROP TABLE IF EXISTS "public"."trustee";
CREATE TABLE "public"."trustee" (
  "id_group" int4 NOT NULL,
  "id_modul" int4 NOT NULL
)
;

-- ----------------------------
-- Records of trustee
-- ----------------------------

-- ----------------------------
-- Table structure for unit
-- ----------------------------
DROP TABLE IF EXISTS "public"."unit";
CREATE TABLE "public"."unit" (
  "id_unit" varchar(5) COLLATE "pg_catalog"."default" NOT NULL,
  "nama_unit" varchar(255) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of unit
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS "public"."users";
CREATE TABLE "public"."users" (
  "id_user" int4 NOT NULL DEFAULT nextval('user_kd_user_seq'::regclass),
  "user_name" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "password" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "nama" varchar(255) COLLATE "pg_catalog"."default" NOT NULL
)
;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO "public"."users" VALUES (1, 'TES', '40BD001563085FC35165329EA1FF5C5ECBDBBEEF', 'Tes');

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."bayar_id_bayar_seq"
OWNED BY "public"."bayar"."id_bayar";
SELECT setval('"public"."bayar_id_bayar_seq"', 1, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."detail_component_id_detail_component_seq"
OWNED BY "public"."detail_component"."id_detail_component";
SELECT setval('"public"."detail_component_id_detail_component_seq"', 1, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."detail_transaksi_id_detail_transaksi_seq"
OWNED BY "public"."detail_transaksi"."id_detail_transaksi";
SELECT setval('"public"."detail_transaksi_id_detail_transaksi_seq"', 1, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."group_id_group_seq"
OWNED BY "public"."group"."id_group";
SELECT setval('"public"."group_id_group_seq"', 1, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."jenis_component_id_jenis_component_seq"
OWNED BY "public"."jenis_component"."id_jenis_component";
SELECT setval('"public"."jenis_component_id_jenis_component_seq"', 1, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."jenis_pembayaran_id_jenis_pembayaran_seq"
OWNED BY "public"."jenis_pembayaran"."id_jenis_pembayaran";
SELECT setval('"public"."jenis_pembayaran_id_jenis_pembayaran_seq"', 1, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."jenis_produk_id_jenis_produk_seq"
OWNED BY "public"."jenis_produk"."id_jenis_produk";
SELECT setval('"public"."jenis_produk_id_jenis_produk_seq"', 1, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."kunjungan_id_kunjungan_seq"
OWNED BY "public"."kunjungan"."id_kunjungan";
SELECT setval('"public"."kunjungan_id_kunjungan_seq"', 1, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."modul_id_modul_seq"
OWNED BY "public"."modul"."id_modul";
SELECT setval('"public"."modul_id_modul_seq"', 1, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."parent_model_id_parent_group_seq"
OWNED BY "public"."parent_modul"."id_parent_modul";
SELECT setval('"public"."parent_model_id_parent_group_seq"', 1, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."pegawai_id_pegawai_seq"
OWNED BY "public"."pegawai"."id_pegawai";
SELECT setval('"public"."pegawai_id_pegawai_seq"', 1, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."penjamin_id_penjamin_seq"
OWNED BY "public"."penjamin"."id_penjamin";
SELECT setval('"public"."penjamin_id_penjamin_seq"', 1, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."produk_id_produk_seq"
OWNED BY "public"."produk"."id_produk";
SELECT setval('"public"."produk_id_produk_seq"', 1, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."tarif_id_tarif_seq"
OWNED BY "public"."tarif"."id_tarif";
SELECT setval('"public"."tarif_id_tarif_seq"', 1, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."tipe_pembayaran_id_tipe_pembayaran_seq"
OWNED BY "public"."pembayaran"."id_pembayaran";
SELECT setval('"public"."tipe_pembayaran_id_tipe_pembayaran_seq"', 1, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."transaksi_id_transaksi_seq"
OWNED BY "public"."transaksi"."id_transaksi";
SELECT setval('"public"."transaksi_id_transaksi_seq"', 1, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."user_kd_user_seq"
OWNED BY "public"."users"."id_user";
SELECT setval('"public"."user_kd_user_seq"', 2, true);

-- ----------------------------
-- Primary Key structure for table bayar
-- ----------------------------
ALTER TABLE "public"."bayar" ADD CONSTRAINT "bayar_pkey" PRIMARY KEY ("id_bayar");

-- ----------------------------
-- Primary Key structure for table detail_component
-- ----------------------------
ALTER TABLE "public"."detail_component" ADD CONSTRAINT "detail_component_pkey" PRIMARY KEY ("id_detail_component");

-- ----------------------------
-- Primary Key structure for table detail_transaksi
-- ----------------------------
ALTER TABLE "public"."detail_transaksi" ADD CONSTRAINT "detail_transaksi_pkey" PRIMARY KEY ("id_detail_transaksi");

-- ----------------------------
-- Primary Key structure for table group
-- ----------------------------
ALTER TABLE "public"."group" ADD CONSTRAINT "group_pkey" PRIMARY KEY ("id_group");

-- ----------------------------
-- Primary Key structure for table group_member
-- ----------------------------
ALTER TABLE "public"."group_member" ADD CONSTRAINT "group_member_pkey" PRIMARY KEY ("id_group", "id_user");

-- ----------------------------
-- Primary Key structure for table jenis_component
-- ----------------------------
ALTER TABLE "public"."jenis_component" ADD CONSTRAINT "jenis_component_pkey" PRIMARY KEY ("id_jenis_component");

-- ----------------------------
-- Primary Key structure for table jenis_pembayaran
-- ----------------------------
ALTER TABLE "public"."jenis_pembayaran" ADD CONSTRAINT "jenis_pembayaran_pkey" PRIMARY KEY ("id_jenis_pembayaran");

-- ----------------------------
-- Primary Key structure for table jenis_produk
-- ----------------------------
ALTER TABLE "public"."jenis_produk" ADD CONSTRAINT "jenis_produk_pkey" PRIMARY KEY ("id_jenis_produk");

-- ----------------------------
-- Primary Key structure for table kamar
-- ----------------------------
ALTER TABLE "public"."kamar" ADD CONSTRAINT "kamar_pkey" PRIMARY KEY ("id_kamar");

-- ----------------------------
-- Primary Key structure for table kunjungan
-- ----------------------------
ALTER TABLE "public"."kunjungan" ADD CONSTRAINT "kunjungan_pkey" PRIMARY KEY ("id_kunjungan");

-- ----------------------------
-- Primary Key structure for table modul
-- ----------------------------
ALTER TABLE "public"."modul" ADD CONSTRAINT "modul_pkey" PRIMARY KEY ("id_modul");

-- ----------------------------
-- Primary Key structure for table parent_modul
-- ----------------------------
ALTER TABLE "public"."parent_modul" ADD CONSTRAINT "parent_model_pkey" PRIMARY KEY ("id_parent_modul");

-- ----------------------------
-- Primary Key structure for table pasien
-- ----------------------------
ALTER TABLE "public"."pasien" ADD CONSTRAINT "pasien_pkey" PRIMARY KEY ("no_rm");

-- ----------------------------
-- Primary Key structure for table pegawai
-- ----------------------------
ALTER TABLE "public"."pegawai" ADD CONSTRAINT "pegawai_pkey" PRIMARY KEY ("id_pegawai");

-- ----------------------------
-- Primary Key structure for table pembayaran
-- ----------------------------
ALTER TABLE "public"."pembayaran" ADD CONSTRAINT "tipe_pembayaran_pkey" PRIMARY KEY ("id_pembayaran");

-- ----------------------------
-- Primary Key structure for table penjamin
-- ----------------------------
ALTER TABLE "public"."penjamin" ADD CONSTRAINT "penjamin_pkey" PRIMARY KEY ("id_penjamin");

-- ----------------------------
-- Primary Key structure for table penjamin_transaksi
-- ----------------------------
ALTER TABLE "public"."penjamin_transaksi" ADD CONSTRAINT "penjamin_transaksi_pkey" PRIMARY KEY ("id_penjamin", "id_transaksi");

-- ----------------------------
-- Primary Key structure for table produk
-- ----------------------------
ALTER TABLE "public"."produk" ADD CONSTRAINT "produk_pkey" PRIMARY KEY ("id_produk");

-- ----------------------------
-- Primary Key structure for table tarif
-- ----------------------------
ALTER TABLE "public"."tarif" ADD CONSTRAINT "tarif_pkey" PRIMARY KEY ("id_tarif");

-- ----------------------------
-- Primary Key structure for table tarif_component
-- ----------------------------
ALTER TABLE "public"."tarif_component" ADD CONSTRAINT "tarif_component_pkey" PRIMARY KEY ("id_tarif", "id_jenis_component");

-- ----------------------------
-- Primary Key structure for table transaksi
-- ----------------------------
ALTER TABLE "public"."transaksi" ADD CONSTRAINT "transaksi_pkey" PRIMARY KEY ("id_transaksi");

-- ----------------------------
-- Primary Key structure for table trustee
-- ----------------------------
ALTER TABLE "public"."trustee" ADD CONSTRAINT "trustee_pkey" PRIMARY KEY ("id_group", "id_modul");

-- ----------------------------
-- Primary Key structure for table unit
-- ----------------------------
ALTER TABLE "public"."unit" ADD CONSTRAINT "unit_pkey" PRIMARY KEY ("id_unit");

-- ----------------------------
-- Primary Key structure for table users
-- ----------------------------
ALTER TABLE "public"."users" ADD CONSTRAINT "user_pkey" PRIMARY KEY ("id_user");

-- ----------------------------
-- Foreign Keys structure for table bayar
-- ----------------------------
ALTER TABLE "public"."bayar" ADD CONSTRAINT "bayar_pembayaran" FOREIGN KEY ("id_pembayaran") REFERENCES "public"."pembayaran" ("id_pembayaran") ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE "public"."bayar" ADD CONSTRAINT "bayar_transaksi" FOREIGN KEY ("id_transaksi") REFERENCES "public"."transaksi" ("id_transaksi") ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE "public"."bayar" ADD CONSTRAINT "bayar_user" FOREIGN KEY ("id_user") REFERENCES "public"."users" ("id_user") ON DELETE SET NULL ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Keys structure for table detail_component
-- ----------------------------
ALTER TABLE "public"."detail_component" ADD CONSTRAINT "detail_component_detail_transaksi" FOREIGN KEY ("id_detail_transaksi") REFERENCES "public"."detail_transaksi" ("id_detail_transaksi") ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE "public"."detail_component" ADD CONSTRAINT "detail_component_jenis_component" FOREIGN KEY ("id_jenis_component") REFERENCES "public"."jenis_component" ("id_jenis_component") ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE "public"."detail_component" ADD CONSTRAINT "detail_component_pegawai" FOREIGN KEY ("id_pegawai") REFERENCES "public"."pegawai" ("id_pegawai") ON DELETE SET NULL ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Keys structure for table detail_transaksi
-- ----------------------------
ALTER TABLE "public"."detail_transaksi" ADD CONSTRAINT "detail_transaksi_bayar" FOREIGN KEY ("id_bayar") REFERENCES "public"."bayar" ("id_bayar") ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE "public"."detail_transaksi" ADD CONSTRAINT "detail_transaksi_kunjungan" FOREIGN KEY ("id_kunjungan") REFERENCES "public"."kunjungan" ("id_kunjungan") ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE "public"."detail_transaksi" ADD CONSTRAINT "detail_transaksi_produk" FOREIGN KEY ("id_produk") REFERENCES "public"."produk" ("id_produk") ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE "public"."detail_transaksi" ADD CONSTRAINT "detail_transaksi_tarif" FOREIGN KEY ("id_tarif") REFERENCES "public"."tarif" ("id_tarif") ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE "public"."detail_transaksi" ADD CONSTRAINT "detail_transaksi_transaksi" FOREIGN KEY ("id_transaksi") REFERENCES "public"."transaksi" ("id_transaksi") ON DELETE CASCADE ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Keys structure for table group_member
-- ----------------------------
ALTER TABLE "public"."group_member" ADD CONSTRAINT "group_member_group" FOREIGN KEY ("id_group") REFERENCES "public"."group" ("id_group") ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE "public"."group_member" ADD CONSTRAINT "group_member_user" FOREIGN KEY ("id_user") REFERENCES "public"."users" ("id_user") ON DELETE CASCADE ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Keys structure for table jenis_produk
-- ----------------------------
ALTER TABLE "public"."jenis_produk" ADD CONSTRAINT "jenis_produk_2" FOREIGN KEY ("id_parent") REFERENCES "public"."jenis_produk" ("id_jenis_produk") ON DELETE CASCADE ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Keys structure for table kamar
-- ----------------------------
ALTER TABLE "public"."kamar" ADD CONSTRAINT "kamar_unit" FOREIGN KEY ("id_unit") REFERENCES "public"."unit" ("id_unit") ON DELETE SET NULL ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Keys structure for table kunjungan
-- ----------------------------
ALTER TABLE "public"."kunjungan" ADD CONSTRAINT "kunjungan_kamar" FOREIGN KEY ("id_kamar") REFERENCES "public"."kamar" ("id_kamar") ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE "public"."kunjungan" ADD CONSTRAINT "kunjungan_transaksi" FOREIGN KEY ("id_transaksi") REFERENCES "public"."transaksi" ("id_transaksi") ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE "public"."kunjungan" ADD CONSTRAINT "kunjungan_unit" FOREIGN KEY ("id_unit") REFERENCES "public"."unit" ("id_unit") ON DELETE SET NULL ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Keys structure for table modul
-- ----------------------------
ALTER TABLE "public"."modul" ADD CONSTRAINT "modul_parent_modul" FOREIGN KEY ("id_parent_modul") REFERENCES "public"."parent_modul" ("id_parent_modul") ON DELETE CASCADE ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Keys structure for table pembayaran
-- ----------------------------
ALTER TABLE "public"."pembayaran" ADD CONSTRAINT "tipe_pembayaran_jenis_pembayaran" FOREIGN KEY ("id_jenis_pembayaran") REFERENCES "public"."jenis_pembayaran" ("id_jenis_pembayaran") ON DELETE SET NULL ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Keys structure for table penjamin_transaksi
-- ----------------------------
ALTER TABLE "public"."penjamin_transaksi" ADD CONSTRAINT "penjamin_transaksi_penjamin" FOREIGN KEY ("id_penjamin") REFERENCES "public"."penjamin" ("id_penjamin") ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE "public"."penjamin_transaksi" ADD CONSTRAINT "penjamin_transaksi_transaksi" FOREIGN KEY ("id_transaksi") REFERENCES "public"."transaksi" ("id_transaksi") ON DELETE CASCADE ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Keys structure for table produk
-- ----------------------------
ALTER TABLE "public"."produk" ADD CONSTRAINT "produk_jenis_produk" FOREIGN KEY ("id_jenis_produk") REFERENCES "public"."jenis_produk" ("id_jenis_produk") ON DELETE SET NULL ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Keys structure for table tarif
-- ----------------------------
ALTER TABLE "public"."tarif" ADD CONSTRAINT "tarif_pembayaran" FOREIGN KEY ("id_pembayaran") REFERENCES "public"."pembayaran" ("id_pembayaran") ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE "public"."tarif" ADD CONSTRAINT "tarif_produk" FOREIGN KEY ("id_produk") REFERENCES "public"."produk" ("id_produk") ON DELETE SET NULL ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Keys structure for table tarif_component
-- ----------------------------
ALTER TABLE "public"."tarif_component" ADD CONSTRAINT "tarif_componen_tarif" FOREIGN KEY ("id_tarif") REFERENCES "public"."tarif" ("id_tarif") ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE "public"."tarif_component" ADD CONSTRAINT "tarif_component_jenis_component" FOREIGN KEY ("id_jenis_component") REFERENCES "public"."jenis_component" ("id_jenis_component") ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE "public"."tarif_component" ADD CONSTRAINT "tarif_component_jenis_component_parent" FOREIGN KEY ("id_jenis_component_parent") REFERENCES "public"."jenis_component" ("id_jenis_component") ON DELETE SET NULL ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Keys structure for table transaksi
-- ----------------------------
ALTER TABLE "public"."transaksi" ADD CONSTRAINT "transaksi_pasien" FOREIGN KEY ("no_mr") REFERENCES "public"."pasien" ("no_rm") ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE "public"."transaksi" ADD CONSTRAINT "transaksi_user" FOREIGN KEY ("id_user") REFERENCES "public"."users" ("id_user") ON DELETE SET NULL ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Keys structure for table trustee
-- ----------------------------
ALTER TABLE "public"."trustee" ADD CONSTRAINT "trustee_group" FOREIGN KEY ("id_group") REFERENCES "public"."group" ("id_group") ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE "public"."trustee" ADD CONSTRAINT "trustee_modul" FOREIGN KEY ("id_modul") REFERENCES "public"."modul" ("id_modul") ON DELETE CASCADE ON UPDATE CASCADE;
