<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  class Cmsspotsintegration {

  	public function loadCmsSpots($page) {
  		$page = addslashes($page);

  		$ci =& get_instance();
  		$ci->load->database();
  		$query = $ci->db->query('SELECT * FROM cms_spots WHERE `page` = \''.$page.'\'');

  		foreach ($query->result() as $row) {
  		  $data[$row->key] = $row->data;
  		}

  		return $data;
  	}

  }

  