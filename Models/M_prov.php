<?php
namespace Models;
use Resources;

class M_prov{

	/**
		* @Author				: Localhost {Ferdhika Yudira}
		* @Email				: fer@dika.web.id
		* @Web					: http://dika.web.id
		* @Date					: 2015-11-07 14:40:52
	**/

	function __construct(){
		$this->db = new Resources\Database;
		$this->tb_provinsi = 'provinsi';
		$this->tb_kabupaten = 'kabupaten';
		$this->tb_kecamatan = 'kecamatan';
		$this->tb_desa = 'desa';
	}

	public function ambilProvinsi(){
		$query = $this->db->select()->from($this->tb_provinsi)->getAll();
    	return $query;
	}

	public function ambilKabupaten($id){
		$query = $this->db->select()->from($this->tb_kabupaten)->where('id_prov', '=', $id)->getAll();
        return $query;
	}

	public function ambilKecamatan($id){
		$query = $this->db->select()->from($this->tb_kecamatan)->where('id_kabupaten', '=', $id)->getAll();
        return $query;
	}

	public function ambilDesa($id){
		$query = $this->db->select()->from($this->tb_desa)->where('id_kecamatan', '=', $id)->getAll();
        return $query;
	}

}