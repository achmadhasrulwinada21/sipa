<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Email extends CI_Controller {
	public function __construct()
		{	
			parent::__construct();
        	 	}
		

 public function  kirim_email($id_sbunga)
		{
			 $config = [
               'useragent' => 'CodeIgniter',
               'protocol'  => 'smtp',
               'mailpath'  => '/usr/sbin/sendmail',
               'smtp_host' => 'ssl://smtp.gmail.com',
               'smtp_user' => 'achmadhasrulwinada@gmail.com',   // Ganti dengan email gmail Anda.
               'smtp_pass' => '0000000015041990',             // Password gmail Anda.
               'smtp_port' => 465,
               'smtp_keepalive' => TRUE,
               'smtp_crypto' => 'SSL',
               'wordwrap'  => TRUE,
               'wrapchars' => 80,
               'mailtype'  => 'html',
               'charset'   => 'utf-8',
               'validate'  => TRUE,
               'crlf'      => "\r\n",
               'newline'   => "\r\n",
	];			
				
        $this->load->library('email', $config);
		                           		 
			$query['kirim_email'] = $this->db->get_where('sukubunga',['id_sbunga'=>$id_sbunga])->row();
			  $this->load->view('kirim_email', $query);                     		
	  }	

	  public function  kirim_emaill($id_sbunga)
		{
			 $config = [
               'useragent' => 'CodeIgniter',
               'protocol'  => 'smtp',
               'mailpath'  => '/usr/sbin/sendmail',
               'smtp_host' => 'ssl://smtp.gmail.com',
               'smtp_user' => 'achmadhasrulwinada@gmail.com',   // Ganti dengan email gmail Anda.
               'smtp_pass' => '0000000015041990',             // Password gmail Anda.
               'smtp_port' => 465,
               'smtp_keepalive' => TRUE,
               'smtp_crypto' => 'SSL',
               'wordwrap'  => TRUE,
               'wrapchars' => 80,
               'mailtype'  => 'html',
               'charset'   => 'utf-8',
               'validate'  => TRUE,
               'crlf'      => "\r\n",
               'newline'   => "\r\n",
	];			
				
        $this->load->library('email', $config);
		                           		 
			$query['kirim_emaill'] = $this->db->get_where('sukubunga',['id_sbunga'=>$id_sbunga])->row();
			  $this->load->view('kirim_emaill', $query);                     		
	  }	

	  public function  kirim_emailll($id_sbunga)
		{
			 $config = [
               'useragent' => 'CodeIgniter',
               'protocol'  => 'smtp',
               'mailpath'  => '/usr/sbin/sendmail',
               'smtp_host' => 'ssl://smtp.gmail.com',
               'smtp_user' => 'achmadhasrulwinada@gmail.com',   // Ganti dengan email gmail Anda.
               'smtp_pass' => '0000000015041990',             // Password gmail Anda.
               'smtp_port' => 465,
               'smtp_keepalive' => TRUE,
               'smtp_crypto' => 'SSL',
               'wordwrap'  => TRUE,
               'wrapchars' => 80,
               'mailtype'  => 'html',
               'charset'   => 'utf-8',
               'validate'  => TRUE,
               'crlf'      => "\r\n",
               'newline'   => "\r\n",
	];			
				
        $this->load->library('email', $config);
		                           		 
			$query['kirim_emailll'] = $this->db->get_where('sukubunga',['id_sbunga'=>$id_sbunga])->row();
			  $this->load->view('kirim_emailll', $query);                     		
	  }	
                }
				
	