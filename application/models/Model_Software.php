<?php

    class Model_Software extends CI_Model{
        
        public function __construct()
        {
            parent::__construct();
        }

        public function view_data() 
        {
            return $this->db->get('requestor');
        }
    }