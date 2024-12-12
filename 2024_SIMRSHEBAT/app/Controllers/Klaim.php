<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Controllers;

/**
 * Description of Radiologi
 *
 * @author lapto
 */
class Klaim extends Api{
	
	public function getKlaim() {
		$input = json_decode(file_get_contents('php://input'));
		$listParam = [
			'norm',
			'tgl_mulai',
			'tgl_akhir',
		];
		$output = array();
		$output['status'] = "gagal";
		$output['pesan'] = "";
		if($this->evalParam($input, $listParam)){
			$parameter = '';
			if ($input->norm > '') {
				$parameter .= "AND pasien.no_rm = '$input->norm'";
			}
			if ($input->tgl_mulai > '') {
				$parameter .= "AND order_rad.tgl_rencana_rad = '$input->tgl_mulai'";
			}
			if ($input->tgl_akhir > '') {
				$parameter .= "AND kunjungan_rad.tgl_masuk = '$input->tgl_akhir'";
			}

			if ($parameter == '') {
				$query = "
				SELECT
				pasien.no_rm,
				pasien.nama,
				unit.nama_unit,
				transaksi.id_transaksi,
				kunjungan.id_kunjungan,
				kunjungan.tgl_masuk,
				penjamin_transaksi.no_sjp
				FROM
				kunjungan
				INNER JOIN transaksi ON transaksi.id_transaksi = kunjungan.id_transaksi 
				OR transaksi.id_transaksi = kunjungan.id_transaksi
				LEFT JOIN unit ON kunjungan.id_unit = unit.id_unit
				JOIN pasien USING ( no_rm )
				inner JOIN penjamin_transaksi ON transaksi.id_transaksi = penjamin_transaksi.id_transaksi 
				ORDER BY
				id_transaksi DESC 
				"; 
			} else {
				$query = "
				SELECT 	pasien.no_rm,	pasien.nama, pasien.alamat,	order_rad.tgl_rencana_rad,	kunjungan_rad.id_kunjungan as id_kunjungan_rad,	unit.nama_unit,	order_rad.order_produk,	transaksi.id_transaksi,	kunjungan.id_kunjungan,	kunjungan_rad.tgl_masuk tgl_masuk_rad,	pegawai.id_pegawai,	pegawai.nama_pegawai,nama_kamar, kunjungan.id_pegawai id_pengirim,kunjungan_rad.id_cara_keluar
				FROM	order_rad
				JOIN kunjungan USING ( id_kunjungan )
				FULL JOIN kunjungan kunjungan_rad ON kunjungan_rad.id_kunjungan = order_rad.id_kunjungan_rad
				JOIN transaksi ON transaksi.id_transaksi = kunjungan.id_transaksi 
				OR transaksi.id_transaksi = kunjungan_rad.id_transaksi
				LEFT JOIN unit ON kunjungan.id_unit = unit.id_unit
				JOIN pasien USING ( no_rm )
				LEFT JOIN pegawai ON kunjungan_rad.id_pegawai = pegawai.id_pegawai
				JOIN penjamin_transaksi  ON transaksi.id_transaksi=penjamin_transaksi.id_transaksi
				LEFT JOIN kamar on kamar.id_kamar = kunjungan.id_kamar
				WHERE	( order_rad.id_kunjungan IS NOT NULL OR kunjungan_rad.id_unit LIKE'5%' )".$parameter."ORDER BY id_transaksi DESC
				"; 
				
			}
		}
		if (!empty($this->db->query($query)->getResult())) {
			$output['status'] = "sukses";
			$output['pesan'] = "";
			$output['data'] = $this->db->query($query)->getResult();
		} else {
			$output['status'] = "gagal";
			$output['pesan'] = "Pasien tidak ditemukan";
		}
		echo json_encode($output);
	}
	
	public function getHasilRad(){
		$input = json_decode(file_get_contents('php://input'));
		$listParam = [
			'norm',
			'tgl_renc',
			'tgl_kunj',
		];
		$output = array();
		$output['status'] = "gagal";
		$output['pesan'] = "";

		$parameter = '';
		if ($input->norm > '') {
			$parameter .= "AND pasien.no_rm = '$input->norm'";
		}
		if ($input->tgl_renc > '') {
			$parameter .= "AND order_rad.tgl_rencana_rad = '$input->tgl_renc'";
		}
		if ($input->tgl_kunj > '') {
			$parameter .= "AND kunjungan.tgl_masuk = '$input->tgl_kunj'";
		}
		
		$query = "
		SELECT hasil_radiologi.id_kunjungan,pasien.no_rm,pasien.nama,pasien.alamat,order_rad.tgl_rencana_rad,kunjungan.tgl_masuk,order_rad.order_produk,order_rad.id_kunjungan kunj_lama,lama.tgl_masuk tgl_lama,nama_unit,nama_kamar
		FROM hasil_radiologi
		JOIN kunjungan ON kunjungan.id_kunjungan=hasil_radiologi.id_kunjungan
		left JOIN order_rad on order_rad.id_kunjungan_rad=hasil_radiologi.id_kunjungan
		LEFT JOIN kunjungan lama on lama.id_kunjungan=order_rad.id_kunjungan
		JOIN transaksi on (transaksi.id_transaksi=kunjungan.id_transaksi) or (transaksi.id_transaksi=lama.id_transaksi)
		JOIN pasien ON pasien.no_rm = hasil_radiologi.no_rm
		LEFT JOIN unit on unit.id_unit=lama.id_unit
		left JOIN kamar ON kamar.id_kamar=lama.id_kamar
		WHERE kunjungan.tgl_keluar is NOT NULL ".$parameter."
		ORDER BY kunjungan.id_kunjungan DESC"; 
		
		
		if (!empty($this->db->query($query)->getResult())) {
			$output['status'] = "sukses";
			$output['pesan'] = "";
			$output['data'] = $this->db->query($query)->getResult();
		} else {
			$output['status'] = "gagal";
			$output['pesan'] = "Pasien tidak ditemukan";
		}
		echo json_encode($output);
	}
	
	public function listPenjamnRad(){
		$input = json_decode(file_get_contents('php://input'));
		
		$output=array();
		$output['status'] = "gagal";
		$output['pesan'] = "";
		$output['data'] = "";
		$query = "SELECT id_penjamin, nama_penjamin from penjamin JOIN penjamin_pasien USING (id_penjamin) JOIN pasien USING (no_rm) WHERE no_rm = '".$input."'";
		$output['data'] =$this->db->query($query)->getResult();
		$output['status'] = "sukses";
		$output['pesan'] = "";
		echo json_encode($output);
	}
	
	public function dokterRad(){	
		$output = array();	
		$query = "SELECT * from dokter_klinik 
		JOIN pegawai USING (id_pegawai) 
		WHERE id_unit LIKE '5%'";      
		$output['status'] = "sukses";
		$output['pesan'] = "";
		$output['data'] =$this->db->query($query)->getResult();
		echo json_encode($output);
	}
	
	public function pegawai(){	
		$input = json_decode(file_get_contents('php://input'));
		
		$output['status'] = "gagal";
		$output['pesan'] = "";
		$output['data'] = "";
		
		$query = "SELECT * from pegawai  
		WHERE id_pegawai = '$input'";      
		$output['status'] = "sukses";
		$output['pesan'] = "";
		$output['data'] =$this->db->query($query)->getResult();
		echo json_encode($output);
	}
	
	public function Verifikator(){
		$input = json_decode(file_get_contents('php://input'));
		
		$output['status'] = "gagal";
		$output['pesan'] = "";
		$output['data'] = "";
		$query = "SELECT id_kunjungan,no_rm,pengirim,pembaca,pegawai.nama_pegawai nama_pembaca,hasil_pembacaan
		FROM	hasil_radiologi
		JOIN pegawai ON pembaca = id_pegawai	
		
		WHERE no_rm = '$input'";
		
		if($this->db->query($query)->getResult()){
			$output['status']   = "sukses";
			$output['pesan']   = "Berhasil";
			$output['data'] = $this->db->query($query)->getResult();
		}else{
			$output['status']   = "gagal";
			$output['pesan']   = "Belum Menambah Hasil Radiologi";
		}
		echo json_encode($output);	
	}
	
	public function cekhasilLngsung(){
		$input = json_decode(file_get_contents('php://input'));		

		$output = array();
		$output['status']   = "gagal";
		$output['pesan']    = "";
		
		$cekTrans = "SELECT pengirim FROM hasil_radiologi WHERE id_kunjungan='$input'";

		$output['status'] = "sukses";
		$output['data'] = /* */$this->db->query($cekTrans)->getRow();
		
		echo json_encode($output); 
	}
	
	public function getListProdukRad() {
		$input = json_decode(file_get_contents('php://input'));
		
		$list_produk['status'] = "gagal";
		$list_produk['pesan'] = "";
		$list_produk['data'] = "";
		$query = "SELECT id_produk,nama_produk FROM produk WHERE id_produk IN $input";
		$list_produk['status'] = "sukses";		        		
		$list_produk['data'] = $this->db->query($query)->getResult();
		echo json_encode($list_produk);		
	}
	
	public function RadProd(){
		$input = json_decode(file_get_contents('php://input'));
		$listParam = [
			'kd_produk',
			'nama_produk',
			'id_penjamin'
		];		      
		$output = array();
		$output['status'] = "gagal";
		$output['pesan'] = "";
		
		if($this->evalParam($input, $listParam)){
			$parameter = '';
			if ($input->kd_produk > '') {
				$parameter .= "AND LOWER(kd_produk) LIKE '$input->kd_produk%'";
			}
			if ($input->nama_produk > '') {
				$parameter .= "AND LOWER(nama_produk) LIKE '%$input->nama_produk%'";
			}			
			if ($parameter == '') {
				$query = "SELECT ROW_NUMBER () OVER ( ORDER BY id_produk ) AS no, id_produk,kd_produk,nama_produk,harga,id_tarif FROM produk JOIN tarif USING (id_produk) WHERE tgl_selesai is null AND id_jenis_produk='4' AND id_penjamin=$input->id_penjamin";
			} else {
				$query = "
				SELECT ROW_NUMBER () OVER ( ORDER BY id_produk ) AS no, id_produk,kd_produk,nama_produk,harga,id_tarif FROM produk JOIN tarif USING (id_produk) WHERE tgl_selesai is null AND id_jenis_produk='4' AND id_penjamin=$input->id_penjamin".$parameter."  
				";
			} 
			$output['status'] = "sukses";			
			$output['data'] = $this->db->query($query)->getResult();			
		} 
		echo json_encode($output);
	}
	
	public function saveKunjunganRad(){
		$input = json_decode(file_get_contents('php://input'));
		$listParam=[
			'id_unit',
			'id_transaksi',
			'id_pegawai',
			'status_kunjungan'
		];
		
		$hasil = array();
		$hasil['status']   	= "gagal";
		$hasil['pesan']    	= "";
		$hasil['data'] 		= "";
		
		//Cek tutup transaksi
		$queryCektutup="SELECT * FROM transaksi WHERE id_transaksi = $input->id_transaksi";
		$cekTgltutup = $this->db->query($queryCektutup)->getRow()->tgl_tutup;

		if(empty($cekTgltutup)){
			//Cek Kunjungan lab 
			$queryCeknull = "SELECT * FROM order_rad WHERE id_kunjungan = $input->id_kunjungan AND tgl_rencana_rad = '".$input->tgl_rencana_rad."'ORDER BY urut_masuk desc";
			$cekNull=$this->db->query($queryCeknull)->getResult();
			
			if(empty($cekNull[0]->id_kunjungan_rad)){
				if($this->evalParam($input,$listParam)){
					$queryaddKunjRad="INSERT INTO Kunjungan("
						. "id_unit, "
						. "id_transaksi, "
						. "id_pegawai,"
						. "status_kunjungan"
						. ") VALUES("
						. "'".$input->id_unit."',"
						. "'".$input->id_transaksi."',"
						. "'".$input->id_pegawai."',"
						. "'".$input->status_kunjungan."')returning id_kunjungan";
					//Start Query Checking
						$this->db->transStart();
						$id_kunjungan = $this->db->query($queryaddKunjRad)->getRow()->id_kunjungan;
						
						$queryUpdateOrderRad="UPDATE order_rad set id_kunjungan_rad='".$id_kunjungan."' WHERE tgl_rencana_rad='".$input->tgl_rencana_rad."' AND id_kunjungan='".$input->id_kunjungan."' AND urut_masuk=".$cekNull[0]->urut_masuk." ";

						$this->db->query($queryUpdateOrderRad);

						$queryaddhasilrad = "INSERT INTO hasil_radiologi (id_kunjungan,no_rm,cito,pengirim,pembaca)VALUES($id_kunjungan,'$input->norm','$input->cito',$input->id_pengirim,$input->id_pegawai)";
						$this->db->query($queryaddhasilrad);
						
					//End Query Checking
						$this->db->transComplete(); 
						
						if($this->db->transStatus()){
							$hasil['status']   = "sukses";
							$hasil['pesan']   = "Berhasil";
							$hasil['data'] = $id_kunjungan;
						}else{
							$hasil['status']   = "gagal";
							$hasil['pesan']   = "Data Gagal Disimpan";
						}
					}
				}else{
					$hasil['status']   = "gagal";
					$hasil['pesan']   = "Order Sudah Dibuat";
				}
			}else{
				$hasil['status']   = "gagal";
				$hasil['pesan']   = "Transaksi Sudah Ditutup Silahkan Hubungi Kasir";
			}
			echo json_encode($hasil);				
		}
		
		public function saveProdRad(){
			$input = json_decode(file_get_contents('php://input'));
			$listParam=[
				'id_unit',
				'id_transaksi',
				'id_pegawai',
				'id_penjamin',
				'id_kunjungan_rad',
				'id_produk'
			];
			
			$hasil = array();
			$hasil['status']   	= "gagal";
			$hasil['pesan']    	= "";
			$hasil['data'] 		= "";
			
		//Cek tutup transaksi
			$queryCektutup="SELECT * FROM transaksi WHERE id_transaksi = $input->id_transaksi";
			$cekTgltutup = $this->db->query($queryCektutup)->getRow()->tgl_tutup;
			
			if(empty($cekTgltutup)){
				if($this->evalParam($input,$listParam)){
					if(is_array($input->id_produk)){
					//Start Query Checking
						$this->db->transStart();
					/* $queryaddjurnal="
						INSERT INTO ac_jurnal_detail (
							id_gl,
							keterangan,
							id_pegawai
						)VALUES(
							'',
							'Penjualan',
							$user->id_pegawai
						)";
						$this->db->query($queryaddjurnal); */
						foreach($input->id_produk as $produk_baru){
							$id_produk = $produk_baru->id_produk;
							$queryaddDetilKunj = "INSERT INTO detail_kunjungan("
								. "id_kunjungan, "
								. "id_produk "
								. ") VALUES("
								. "'".$input->id_kunjungan_rad."',"
								. "'".$id_produk."')returning id_detail_kunjungan;";			
								
								$queryTarif="SELECT * FROM tarif WHERE tgl_selesai is null AND id_produk = ".$id_produk." AND id_penjamin=$input->id_penjamin";
								$queryUpdatePosting="UPDATE kunjungan set posting='t' WHERE  id_transaksi='".$input->id_transaksi."'";
								$this->db->query($queryUpdatePosting);
								
								$id_detail_kunjungan = $this->db->query($queryaddDetilKunj)->getRow()->id_detail_kunjungan;
								$id_tarif = $this->db->query($queryTarif)->getRow();
								
								$queryDetilTrans="INSERT INTO detail_transaksi("
									. "id_transaksi, "
									. "id_kunjungan, "							
									. "id_produk, "
									. "id_tarif, "
									. "qty, "
									. "id_detail_kunjungan"							
									. ") VALUES ("
									. "'".$input->id_transaksi."',"
									. "'".$input->id_kunjungan_rad."',"
									. "'".$id_produk."',"
									. "'".$id_tarif->id_tarif."',"
									. "'1',"
									. "'".$id_detail_kunjungan."')returning id_detail_transaksi;";
									
									$id_detail_transaksi = $this->db->query($queryDetilTrans)->getRow()->id_detail_transaksi;
									
						/* if($input->cito==1){
							$queryaddDetilComp="
							INSERT INTO detail_component (
							id_detail_transaksi,
							id_jenis_component,
							id_pegawai,
							harga
							)VALUES(
							$id_detail_transaksi,
							4,
							$input->id_pegawai,
							50000
							)";
							
							$this->db->query($queryaddDetilComp);
						} */
						
						$queryDetilComp="UPDATE detail_component set id_pegawai='".$input->id_pegawai."' WHERE id_jenis_component='3' AND id_detail_transaksi='".$id_detail_transaksi."'";
						// var_dump($queryDetilComp);
						$this->db->query($queryDetilComp);
					}
					
					//End Query Checking
					$this->db->transComplete(); 
				}else{
					//Start Query Checking
					$this->db->transStart();
					$queryaddDetilKunj = "INSERT INTO detail_kunjungan("
						. "id_kunjungan, "
						. "id_produk "
						. ") VALUES("
						. "'".$input->id_kunjungan_rad."',"
						. "'".$input->id_produk."')returning id_detail_kunjungan;";			
						
						$queryTarif="SELECT * FROM tarif WHERE tgl_selesai is null AND id_produk = ".$input->id_produk." AND id_penjamin=$input->id_penjamin";
						$queryUpdatePosting="UPDATE kunjungan set posting='t' WHERE  id_transaksi='".$input->id_transaksi."'";
						$this->db->query($queryUpdatePosting);
						
						$id_detail_kunjungan = $this->db->query($queryaddDetilKunj)->getRow()->id_detail_kunjungan;
						$id_tarif = $this->db->query($queryTarif)->getRow();
						
						$queryDetilTrans="INSERT INTO detail_transaksi("
							. "id_transaksi, "
							. "id_kunjungan, "							
							. "id_produk, "
							. "id_tarif, "
							. "qty, "
							. "id_detail_kunjungan"							
							. ") VALUES ("
							. "'".$input->id_transaksi."',"
							. "'".$input->id_kunjungan_rad."',"
							. "'".$input->id_produk."',"
							. "'".$id_tarif->id_tarif."',"
							. "'1',"
							. "'".$id_detail_kunjungan."')returning id_detail_transaksi;";
							
							$id_detail_transaksi = $this->db->query($queryDetilTrans)->getRow()->id_detail_transaksi;
							
					/* if($input->cito==1){
							$queryaddDetilComp="
							INSERT INTO detail_component (
							id_detail_transaksi,
							id_jenis_component,
							id_pegawai,
							harga
							)VALUES(
							$id_detail_transaksi,
							4,
							$input->id_pegawai,
							50000
							)";
							
							$this->db->query($queryaddDetilComp);
						} */
						
						$queryDetilComp="UPDATE detail_component set id_pegawai='".$input->id_pegawai."' WHERE id_jenis_component='3' AND id_detail_transaksi='".$id_detail_transaksi."'";
					// var_dump($queryDetilComp);
						$this->db->query($queryDetilComp);
						
				//End Query Checking
						$this->db->transComplete(); 
					}
					
					if($this->db->transStatus()){
						$hasil['status']   = "sukses";
						$hasil['pesan']   = "Berhasil";
					}else{
						$hasil['status']   = "gagal";
						$hasil['pesan']   = "";
						$hasil['data'] = "";
					}
					echo json_encode($hasil);			
				}
			}
		}

		function addOrderRad(){
			$input = json_decode(file_get_contents('php://input'));
			$listParam = [
				'user',
				'id_kunjungan',
				'tgl_rencana_rad',
				'order_produk'
			];
			$output = array();
			$output['status'] = "gagal";
			$output['pesan'] = "";
			$output['data'] = "";
			if($this->evalParam($input, $listParam)){
				$json_order = json_encode($input->order_produk);
				$json_order = str_replace('"',"''",$json_order);
				$json_order = str_replace('[',"(",$json_order);
				$json_order = str_replace(']',")",$json_order);
				$query = "SELECT * FROM order_rad WHERE id_kunjungan = '$input->id_kunjungan' ORDER BY urut_masuk desc";
				$hasil = $this->db->query($query);
				if($hasil->getNumRows() > 0){
					$order_lama = $hasil->getRow();
					if($order_lama->id_kunjungan_rad > ''){
                    // $output['pesan'] = "Kunjungan Radiologi sudah dibuat";
						$query = "INSERT INTO order_rad(
							tgl_rencana_rad,
							order_produk,
							id_user,
							urut_masuk,
							id_kunjungan
							)VALUES (
							'$input->tgl_rencana_rad',
							'$json_order',
							'$input->user',
							'".($order_lama->urut_masuk +1)."',
							'$input->id_kunjungan')";
							
							if($this->db->query($query)){
								$output['status'] = "sukses";
								$output['pesan'] = "Order Radiologi berhasil ditambahkan";
							}else{
								$output['status'] = "gagal";
								$output['pesan'] = "Order Radiologi gagal ditambahkan";
							}
						}else{
							$query = "
							UPDATE order_rad
							SET tgl_rencana_rad = '$input->tgl_rencana_rad',
							order_produk = '$json_order',
							id_user = '$input->user'
							WHERE id_kunjungan = '$input->id_kunjungan' AND urut_masuk=$order_lama->urut_masuk
							";
							if($this->db->query($query)){
								$output['status'] = "sukses";
								$output['pesan'] = "Order Radiologi berhasil ditambahkan";
							}else{
								$output['pesan'] = "Order Radiologi gagal diupdate";
							}
						}
					}else{
						$query = "
						INSERT INTO order_rad(tgl_rencana_rad, order_produk, id_user, id_kunjungan)
						VALUES ('$input->tgl_rencana_rad',
							'$json_order',
							'$input->user', 
							'$input->id_kunjungan')
						";
						if($this->db->query($query)){
							$output['status'] = "sukses";
							$output['pesan'] = "Order Radiologi berhasil ditambahkan";
						}else{
							$output['status'] = "gagal";
							$output['pesan'] = "Order Radiologi gagal ditambahkan";
						}
					}
				}
				$this->hasil($output);
			}
			
			public function viewDetProdRad(){
				$input = json_decode(file_get_contents('php://input'));
				$listParam = [
					'id_kunjungan_rad',
				];

				$output = array();
				$output['status'] = "gagal";
				$output['pesan'] = "";
				if($this->evalParam($input, $listParam)){
					$detil_transaksi = "SELECT ROW_NUMBER () OVER ( ORDER BY id_detail_transaksi ) AS no, produk.nama_produk, pegawai.nama_pegawai,detail_transaksi.total_harga,id_produk,tgl_input 
					FROM detail_transaksi 
					JOIN produk USING(id_produk)
					JOIN kunjungan USING (id_kunjungan)
					JOIN pegawai USING(id_pegawai)
					WHERE id_kunjungan = $input->id_kunjungan_rad";
					
					$output['status'] = "sukses";
					$output['data'] = /* */$this->db->query($detil_transaksi)->getResult();
					
					echo json_encode($output); 
				}
			}
			
			public function delDetilProd(){
				$input = json_decode(file_get_contents('php://input'));
				$listParam = [
					'id_kunjungan_rad',
				];
				$output = array();
				$output['status'] = "gagal";
				$output['pesan'] = "";
				if($this->evalParam($input, $listParam)){
					$delet_prod = " DELETE FROM detail_transaksi WHERE id_kunjungan='$input->id_kunjungan_rad' AND id_produk='$input->id_produk' AND tgl_input='$input->tgl_input'; DELETE FROM detail_kunjungan WHERE id_kunjungan='$input->id_kunjungan_rad' AND id_produk='$input->id_produk'; ";			
					if ($this->db->query($delet_prod)) {
						$output['status']   = "sukses";
						$output['pesan']    = "Sukses Hapus Produk";
					} else {
						$output['status']   = "gagal";
						$output['pesan']    = "Gagal Hapus Produk";
					}						
					$this->hasil($output); 
				}
			}
			
			function addOrderRadLangsung(){
				$input = json_decode(file_get_contents('php://input'));
				$listParam = [
					'nik',
					'nama',
					'hubungan',
					'no_hp',
					'alamat',
					'id_user',
					'no_rm'
				];
				$hasilquery=[];
				$nama_pegawai=[];
				
				$hasil = array();
				$hasil['status'] = "gagal";
				$hasil['pesan'] = "";
				if($this->evalParam($input, $listParam)){
					
			//Start Query Checking
					$this->db->transStart();
					$queryaddTrans = "INSERT INTO transaksi("
						. "id_user, "
						. "no_rm, "
						. "id_penanggung_jawab,"
						. "hubungan_penanggung_jawab,"
						. "no_hp_penanggung_jawab,"
						. "alamat_penanggung_jawab"
						. ") VALUES("
						. "'".$input->id_user."',"
						. "'".$input->no_rm."',"
						. "'".$input->nik."',"
						. "'".$input->hubungan."',"
						. "'".$input->no_hp."',"
						. "'".$input->alamat."')returning id_transaksi";
						$id_transaksi = $this->db->query($queryaddTrans)->getRow()->id_transaksi;
						
						$queryaddpenjmTrans="INSERT INTO penjamin_transaksi("
							. "id_transaksi, "
							. "id_penjamin, "
							. "cara_masuk"
							. ") VALUES("
							. "'".$id_transaksi."',"
							. "'".$input->id_penjamin."',"
							. "'2')";
							$this->db->query($queryaddpenjmTrans);
							
							$queryaddKunjRad="INSERT INTO kunjungan("
								. "id_unit, "
								. "id_transaksi, "
								. "id_pegawai"
								. ") VALUES("
								. "'5001',"
								. "'".$id_transaksi."',"
								. "'".$input->id_pegawai."')returning id_kunjungan";
								$id_kunjungan=$this->db->query($queryaddKunjRad)->getRow()->id_kunjungan;
								
								$queryaddhasilrad = "
								INSERT INTO hasil_radiologi (id_kunjungan,no_rm,pengirim,pembaca,cito)VALUES(
									$id_kunjungan,'$input->no_rm',null,$input->id_pegawai,'$input->cito')";

								$this->db->query($queryaddhasilrad);
								

								$querypenyakit = "
								INSERT INTO mr_penyakit (no_rm,id_unit,id_penyakit,id_kunjungan,status_diag,id_transaksi)VALUES(
									'$input->no_rm','5001','$input->diagnosa',$id_kunjungan,0,$id_transaksi)";
// var_dump($querypenyakit);	
								$this->db->query($querypenyakit);
								
								/* */$queryNamaPegawai="SELECT id_pegawai,nama_pegawai,id_kunjungan,id_transaksi from pegawai  
								JOIN kunjungan USING (id_pegawai)
								WHERE kunjungan.id_kunjungan='$id_kunjungan'"; 

								$nama_pegawai=$this->db->query($queryNamaPegawai)->getResult();						

			//End Query Checking
								$this->db->transComplete(); 			
								
								if($this->db->transStatus()){
									$hasil['status']   = "sukses";
									$hasil['pesan']   = "Berhasil";
									$hasil['data'] = $nama_pegawai;
								}else{
									$hasil['status']   = "gagal";
									$hasil['pesan']   = "";
									$hasil['data'] = "";
								}
								echo json_encode($hasil);			
							}
						}
						
						public function viewCaraKeluar(){
							$query = "SELECT * FROM cara_keluar";		
							$output['status'] = "sukses";
							$output['data'] = /* */$this->db->query($query)->getResult();
							echo json_encode($output); 
						}
						
						public function savePasienKeluar(){
							$input = json_decode(file_get_contents('php://input'));
							$listParam = [
								'id_kunjungan',
								'id_cara_keluar'
							];
							$output = array();
							$output['status'] = "gagal";
							$output['pesan'] = "";
							if($this->evalParam($input, $listParam)){
								
								$json_order='';			
								for($i=0;$i<count($input->id_produk);$i++){				
									$id_produk = $input->id_produk[$i]->id_produk;
									$json_order=$json_order."''".$id_produk."'',";	
								}
								$order=substr($json_order, 0, -1);
								$queryupdate = "UPDATE order_rad SET order_produk = '($order)' WHERE id_kunjungan_rad = $input->id_kunjungan";
								$queryupdate2 = "UPDATE hasil_radiologi SET pengirim = '$input->pengirim' WHERE id_kunjungan = $input->id_kunjungan";

								$this->db->query($queryupdate);
								$this->db->query($queryupdate2);
								
								$query="UPDATE kunjungan SET id_cara_keluar=".$input->id_cara_keluar.", tgl_keluar= CURRENT_DATE, jam_keluar= CURRENT_TIMESTAMP,posting='t' 
								WHERE id_kunjungan='$input->id_kunjungan'";
								$this->db->query($query);
								
								$queryjurnal="
								
								";
								$this->db->query($queryjurnal);
								
	// var_dump($queryupdate);
			if ($this->db->query($queryupdate)) { //true
				$output['status'] = "sukses";
				$output['pesan']  = "Berhasil";
			} else {
				$output['status'] = "gagal";
				$output['pesan'] = "update gagal, silahkan ulangi!";
			}
			echo json_encode($output); 
		}		
	}
	
	public function viewDiagnosa(){
		$input = json_decode(file_get_contents('php://input'));

		$output = array();
		$output['status'] = "gagal";
		$output['pesan'] = "";
		$query="SELECT mr_penyakit.id_penyakit,penyakit FROM mr_penyakit 
		JOIN penyakit on penyakit.id_penyakit=mr_penyakit.id_penyakit
		WHERE id_kunjungan='$input'";
// var_dump($query);
		if ($this->db->query($query)) {
			$output['status']   = "sukses";
			$output['pesan']    = "";
			$output['data']    = $this->db->query($query)->getRow();
		} else {
			$output['status']   = "gagal";
			$output['pesan']    = "Diagnosa Tidak Ditemukan";
		}						
		$this->hasil($output); 
	}
	
	public function saveHslRad(){
		$input = json_decode(file_get_contents('php://input'));
		$listParam = [
			'id_kunjungan_rad',
			'hasil_pembacaan'
		];
		$output = array();
		$output['status'] = "gagal";
		$output['pesan'] = "";
		if($this->evalParam($input, $listParam)){
			$queryaddhasilrad="UPDATE hasil_radiologi set hasil_pembacaan= '$input->hasil_pembacaan' WHERE id_kunjungan='$input->id_kunjungan_rad'";
			
		if ($this->db->query($queryaddhasilrad)) { //true
			$output['status'] = "sukses";
			$output['pesan']  = "Berhasil";
		} else {
			$output['status'] = "gagal";
			$output['pesan'] = "update gagal, silahkan ulangi!";
		}
		echo json_encode($output); 
	}
}

public function deleteorder(){
	$input = json_decode(file_get_contents('php://input'));
	$listParam = [
		'id_kunjungan_rad',
		'id_transaksi'
	];
	
	$output = array();
	$output['status'] = "gagal";
	$output['pesan'] = "";
	if($this->evalParam($input, $listParam)){
		$queryCektutup="SELECT * FROM transaksi WHERE id_transaksi = $input->id_transaksi";
		$cekTgltutup = $this->db->query($queryCektutup)->getRow()->tgl_tutup;
		if(empty($cekTgltutup)){
			$delet_kunj = "DELETE FROM kunjungan WHERE id_kunjungan='$input->id_kunjungan_rad';DELETE FROM hasil_radiologi WHERE id_kunjungan='$input->id_kunjungan_rad';UPDATE order_rad set id_kunjungan_rad=null WHERE id_kunjungan_rad='$input->id_kunjungan_rad';";     
	// var_dump($delet_kunj);
			if ($this->db->query($delet_kunj)) {
				$output['status']   = "sukses";
				$output['pesan']    = "Sukses Hapus Produk";
			} else {
				$output['status']   = "gagal";
				$output['pesan']    = "Gagal Hapus Produk";
			}                       
		}else{
			$output['status']   = "gagal";
			$output['pesan']    = "Transaksi Sudah di Tutup";
		}	
	}else{
		$output['status']   = "gagal";
		$output['pesan']    = "Oder Belum Dilakukan";
	}
	$this->hasil($output); 
}

public function deleteorderlngsung(){
	$input = json_decode(file_get_contents('php://input'));
	$listParam = [
		'id_kunjungan_rad',
		'id_transaksi'
	];
	
	$output = array();
	$output['status'] = "gagal";
	$output['pesan'] = "";
	if($this->evalParam($input, $listParam)){
		$queryCektutup="SELECT * FROM transaksi WHERE id_transaksi = $input->id_transaksi";
		$cekTgltutup = $this->db->query($queryCektutup)->getRow()->tgl_tutup;
		if(empty($cekTgltutup)){
			$delet_kunj = "DELETE FROM detail_kunjungan WHERE id_kunjungan='$input->id_kunjungan_rad';UPDATE kunjungan set tgl_keluar=null,id_cara_keluar=null,jam_keluar=null WHERE id_kunjungan='$input->id_kunjungan_rad';";  /* DELETE FROM hasil_radiologi WHERE id_kunjungan='$input->id_kunjungan_rad'; */   
	// var_dump($delet_kunj);return;
			if ($this->db->query($delet_kunj)) {
				$output['status']   = "sukses";
				$output['pesan']    = "Sukses Hapus Produk";
			} else {
				$output['status']   = "gagal";
				$output['pesan']    = "Gagal Hapus Produk";
			}                       
		}else{
			$output['status']   = "gagal";
			$output['pesan']    = "Transaksi Sudah di Tutup";
		}	
	}else{
		$output['status']   = "gagal";
		$output['pesan']    = "Oder Belum Dilakukan";
	}
	$this->hasil($output); 
}

public function cetakhasil(){
	$input = json_decode(file_get_contents('php://input'));
	$produk   = $_POST['order_produk'];
	$id_kunjungan_rad   = $_POST['id_kunjungan_rad'];
	$dokter_pengirim   = $_POST['dokter_pengirim'];
	$jk;
        // var_dump($input);
        // exit();
	$queryhasil = $this->db->query("SELECT ROW_NUMBER () OVER ( ORDER BY detail_kunjungan.id_produk ) AS no,produk.id_produk,produk.nama_produk,hasil_pembacaan
		FROM hasil_radiologi 
		JOIN detail_kunjungan on detail_kunjungan.id_kunjungan=hasil_radiologi.id_kunjungan
		JOIN produk on detail_kunjungan.id_produk=produk.id_produk
		WHERE hasil_radiologi.id_kunjungan='$id_kunjungan_rad'");
	
	$querypasien= $this->db->query("SELECT no_rm,nama,tgl_lahir,alamat,jenis_kelamin,nama_pegawai
		FROM kunjungan
		JOIN transaksi USING (id_transaksi)
		JOIN pasien USING (no_rm)
		JOIN pegawai USING (id_pegawai)
		WHERE id_kunjungan='$id_kunjungan_rad'")->getRow();
	
	$no_rm =$querypasien->no_rm;    
	$nama =$querypasien->nama;  
	$tgl_lahir =date_indo($querypasien->tgl_lahir); 
	$alamat =$querypasien->alamat;  
	$nama_pegawai =$querypasien->nama_pegawai;  
	if($querypasien->jenis_kelamin==true){$jk='Laki-laki';}else{$jk='Perempuan';}
    // var_dump($querypasien);  
	
	$html = "<html>
	<body>
	<table border='0' style='font-family: Arial, Helvetica, sans-serif;'>
	<tr>
	<td rowspan='5' align='right' style='width: 200px;text-align:right;float: right;'><img src='_assets/dist/img/darmayu.jpg' height='100px'></td>
	<td style='width: 600px;text-align: center;font-weight: bold;font-size: 20px;letter-spacing: 2px;'>
	RUMAH SAKIT UMUM
	<p style='font-size:30px;color:#14B937'>DARMAYU</p>
	</td>
	</tr>
	<tr>
	<td style='width: 600px;text-align: center;font-size: 12px;letter-spacing: 1px;'>Jl. Kapten Tendean No. 47, Kelurahan Demangan, Kecamatan Taman, Kota Madiun</td>
	</tr>
	<tr>
	<td style='width:600px;text-align: center;font-size: 14px;font-weight: bold;letter-spacing: 1px;'>Telp 0351-4109999 | Email : rsudarmayumdn@yahoo.com</td>
	</tr>
	</table>
	<hr style='height:5px;border-top:4px solid black;border-bottom:2px solid black;'>
	<table border='0' style='font-family: Arial, Helvetica, sans-serif;'>
	<tr>
	<td>Dokter Penanggung Jawab</td>
	<td>:</td>
	<td>$nama_pegawai</td>
	</tr>
	<tr>
	<td>RM</td>
	<td>:</td>
	<td>$no_rm</td>
	</tr>
	<tr>
	<td>Tanggal Periksa</td>
	<td>:</td>
	<td>".date_indo(date("Y-m-d"))."</td>
	</tr>
	<tr>
	<td>Nama Pasien</td>
	<td>:</td>
	<td>$nama</td>
	</tr>
	<tr>
	<td>Tanggal Lahir Pasien</td>
	<td>:</td>
	<td>$tgl_lahir</td>
	</tr>
	<tr>
	<td>Jenis Kelamin</td>
	<td>:</td>
	<td>$jk</td>
	</tr>
	<tr>
	<td>Alamat Pasien</td>
	<td>:</td>
	<td>$alamat</td>
	</tr>
	<tr>
	<td>Dokter Pengirim</td>
	<td>:</td>
	<td>$dokter_pengirim</td>
	</tr>
	</table><br><br>

	<table border='1' align='center'  style='border:1px solid black;border-collapse:collapse;width:100%'>
	<tr>
	<td style='border:1px solid black;text-align: center;font-weight: bold;width:50px;'>No</td>
	<td style='border:1px solid black;text-align: center;font-weight: bold;'>Nama Pemeriksaan</td>
	</tr>";
	
	foreach ($queryhasil->getResult() as $datahasil){
		$html .= "
		<tr>
		<td style='border:1px solid black;'>#$datahasil->no</td>
		<td style='border:1px solid black;'>$datahasil->nama_produk</td>
		</tr>";
	}
	
	$html .= "
	</table><br><br>
	<table border='0' style='font-family: Arial, Helvetica, sans-serif;'>
	<tr>
	<td>Hasil Pemeriksaan</td>
	<td>:</td>
	<td>$datahasil->hasil_pembacaan</td>
	</tr>
	</table><br><br>
	
	</body>
	</html>";
        // echo $html;
	$mpdf   = new \Mpdf\Mpdf([
		'mode' => 'utf-8',
		'format' => 'A4'
	]);
        //$mpdf=new \Mpdf\Mpdf('utf-8', array(160,80));
	$mpdf->AddPage(
            'P', // L - landscape, P - portrait
            '',
            '',
            '',
            '',
            2, // margin_left
            2, // margin right
            2, // margin top
            2, // margin bottom
            0, // margin header
            2
        ); // margin footer

	$mpdf->WriteHTML($html);
	$mpdf->Output("cetak_bill.pdf", 'I');
	exit;
        //echo $html;
        //$mpdf->Output('sep_termal.pdf', 'I');
        //$klien = str_replace(".","",$_SERVER['REMOTE_ADDR']);
        //$mpdf->Output($klien.'sep_termal.pdf', 'I');
}
}
