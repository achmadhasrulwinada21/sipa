<?php
class Excel_import_model extends CI_Model
{
	function select()
	{
		$this->db->order_by('satuanid', 'ASC');
		$query = $this->db->get('satuanproduk');
		return $query;
	}

	function insert($data)
	{
		$this->db->insert_batch('satuanproduk', $data);
	}


	function selectsetdis()
	{
		$this->db->order_by('idsetdis', 'DESC');
		$query = $this->db->get('master_setup_dist');
		return $query;
	}

	function insertsetdis($data)
	{
		$this->db->insert_batch('master_setup_dist', $data);
	}

	function selectalum()
	{
		// $this->db->select('kode_produk , nama_produk, deskripsi, tipe_produk, koper, harga, satuanid, merk');
		$this->db->where('tipe_produk','TP002');
		$this->db->order_by('idproduk', 'DESC');
		$query = $this->db->get('master_produk');
		return $query;
	}

	function insertalum($data)
	{
		$this->db->insert_batch('master_produk', $data);
	}

	function selectobat()
	{
		// $this->db->select('kode_produk , nama_produk, deskripsi, tipe_produk, koper, harga, satuanid, merk');
		$this->db->where('tipe_produk','TP001');
		$this->db->order_by('idobat', 'DESC');
		$query = $this->db->get('master_obat');
		return $query;
	}

	function insertobat($data)
	{
		$this->db->insert_batch('master_obat', $data);
	}

	function selectalkes()
	{
		// $this->db->select('kode_produk , nama_produk, deskripsi, tipe_produk, koper, harga, satuanid, merk');
		$this->db->where('tipe_produk','TP003');
		$this->db->order_by('idproduk', 'DESC');
		$query = $this->db->get('master_produk');
		return $query;
	}

	function insertalkes($data)
	{
		$this->db->insert_batch('master_produk', $data);
	}

	function selectdepbang()
	{
		// $this->db->select('kode_produk , nama_produk, deskripsi, tipe_produk, koper, harga, satuanid, merk');
		$this->db->where('tipe_produk','TP004');
		$this->db->order_by('idproduk', 'DESC');
		$query = $this->db->get('master_produk');
		return $query;
	}

	function insertdepbang($data)
	{
		$this->db->insert_batch('master_produk', $data);
	}

	//perusahaan

	function selectperalum()
	{
		// $this->db->select('kode_produk , nama_produk, deskripsi, tipe_produk, koper, harga, satuanid, merk');
		$this->db->where('id_tipe_produk','TP002');
		$this->db->order_by('id_perusahaan', 'DESC');
		$query = $this->db->get('master_perusahaan');
		return $query;
	}

	function insertperalum($data)
	{
		$this->db->insert_batch('master_perusahaan', $data);
	}


	//perusahaan obat
	
	function selectperobat()
	{
		// $this->db->select('kode_produk , nama_produk, deskripsi, tipe_produk, koper, harga, satuanid, merk');
		$this->db->where('id_tipe_produk','TP001');
		$this->db->order_by('createdate', 'DESC');
		$query = $this->db->get('master_perusahaan');
		return $query;
	}

	function insertperobat($data)
	{
		$this->db->insert_batch('master_perusahaan', $data);
	}
	

	//perusahaan distributor obat
	
	function selectperdisobat()
	{
		// $this->db->select('kode_produk , nama_produk, deskripsi, tipe_produk, koper, harga, satuanid, merk');
		$this->db->where('id_tipe_produk','TP001');
		$this->db->order_by('createdate', 'DESC');
		$query = $this->db->get('master_distributor');
		return $query;
	}

	function insertperdisobat($data)
	{
		$this->db->insert_batch('master_distributor', $data);
	}
	

       	//perusahaan alkes
	
		function selectperalkes()
	{
		// $this->db->select('kode_produk , nama_produk, deskripsi, tipe_produk, koper, harga, satuanid, merk');
		$this->db->where('id_tipe_produk','TP003');
		$this->db->order_by('createdate', 'DESC');
		$query = $this->db->get('master_perusahaan');
		return $query;
	}

	function insertperalkes($data)
	{
		$this->db->insert_batch('master_perusahaan', $data);
	}



//perusahaan depbang

	function selectperdepbang()
	{
		// $this->db->select('kode_produk , nama_produk, deskripsi, tipe_produk, koper, harga, satuanid, merk');
		$this->db->where('id_tipe_produk','TP004');
		$this->db->order_by('id_perusahaan', 'DESC');
		$query = $this->db->get('master_perusahaan');
		return $query;
	}

	function insertperdepbang($data)
	{
		$this->db->insert_batch('master_perusahaan', $data);
	}






















}
