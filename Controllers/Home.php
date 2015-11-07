<?php
namespace Controllers;
use Resources, Models;

class Home extends Resources\Controller{
	
	/**
		* @Author				: Localhost {Ferdhika Yudira}
		* @Email				: fer@dika.web.id
		* @Web					: http://dika.web.id
		* @Date					: 2015-11-07 14:39:08
	**/

	function __construct(){
		parent::__construct();

		//Load model
		$this->m_prov = new Models\M_prov;

		$this->request = new Resources\Request;
	}

	public function index(){
		$data['title'] = 'Hello world!';
		$data['provinsi'] = $this->m_prov->ambilProvinsi();

		$this->output('home', $data);
    }

	public function kabupaten(){
		$propinsiID = $this->request->get('id');
		$kabupaten = $this->m_prov->ambilKabupaten($propinsiID);

		echo "Kabupaten : ";
		echo "<select id='kabupaten' onChange='loadKecamatan()'>";
		foreach ($kabupaten as $kab){
			echo "<option value='$kab->id'>$kab->nama</option>";
		}
		echo "</select></div>";
	}

	public function kecamatan(){
		$kabupatenID = $this->request->get('id');
		$kecamatan = $this->m_prov->ambilKecamatan($kabupatenID);

		echo "Kecamatan : ";
		echo "<select id='kecamatan' onChange='loadDesa()'>";
		foreach ($kecamatan as $kec){
			echo "<option value='$kec->id'>$kec->nama</option>";
		}
		echo"</select></div>";
	}

	public function desa(){
		$kecamatanID = $this->request->get('id');
		$desa = $this->m_prov->ambilDesa($kecamatanID);

		echo "Desa : ";
		echo "<select>";
		foreach ($desa as $des){
			echo "<option value='$des->id'>$des->nama</option>";
		}
		echo"</select></div>";
	}
}