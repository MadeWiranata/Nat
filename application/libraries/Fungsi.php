<?php
class Fungsi{
    protected $ci;
    public function __construct()
    {
        $this->ci =& get_instance();
    }
    function user_login()
    { 
        $this->ci->load->model('user_m');
        $username = $this->ci->session->userdata('username');
        $user_data = $this->ci->user_m->get($username)->row();
        return $user_data;
    }
}