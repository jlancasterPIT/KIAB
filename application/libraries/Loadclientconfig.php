<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  class Loadclientconfig {
  	
  	public function loadConfig() {
  		$ci =& get_instance();
  		$ci->load->database();
  		$query = $ci->db->get('clientConfig');

  		foreach ($query->result() as $row) {
  		  $data[$row->key] = $row->value;
  		}

      $query = $ci->db->get('enabledModules');

      foreach ($query->result() as $row) {
        $data[$row->moduleName] = $row->enabled;
      }

  		return $data;
  	}

  }

  