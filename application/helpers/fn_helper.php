<?php 
function getName()
{
	$ci =& get_instance();
	$rs = $ci->db->where('id', $ci->session->userdata('id'))->get('user');
	return $rs->row()->name;
}