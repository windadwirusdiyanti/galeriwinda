<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Album_model extends CI_Model {

    public function get_all_albums() {
        // Retrieve all albums from database
        return $this->db->get('albums')->result();
    }

    public function insert_album($data) {
        // Insert data into 'albums' table
        $this->db->insert('albums', $data);
    }
}
