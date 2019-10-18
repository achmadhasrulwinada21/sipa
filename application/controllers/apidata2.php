<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class apidata2 extends CI_Controller{

public function index(){
	
	
	$sumber='http://192.168.2.2/apidatamasterhhg/index.php/Dokter';
	  
	  $json=file_get_contents($sumber);


		 $data=json_decode($json,true);

		foreach($data as $a => $b)
		{



			print "<br>";

			print "<br>";


	 		        $koders=$b['koders'];
				    $namars = $b['namars'];
				       
				        $tangkapdatamonitoring=
			  
		
							  " INSERT INTO tblm_rs(koders, namars) SELECT '$koders','$namars' WHERE NOT EXISTS (SELECT *
							  FROM tblm_rs
							  WHERE koders = '$koders'); 
							  
							  UPDATE tblm_rs set koders='$koders', namars='$namars' where koders='$koders'";
			  
			  
						;
					   
						$test=$this->db->query($tangkapdatamonitoring);
					   
			
					   
					   
			}	

	}
		 
		 
}
		 
		 
		 


