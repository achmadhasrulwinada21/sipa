	  
//GAMBAR SKEMA 


//1.SIPA punya web service satu url saja(center) json array
//2.Cabang RS punya service untuk ngambil data center sipa(31 RS) dengan msg2 web service RS yang akan menginsert automatik ke tabel harga obat dengan bantuan
//  cron job php dengan estimasi waktu.
		  
		  
		  
//coding web service ambil data dari url(web sipa harga obat)



<?php
Class apidata extends CI_Controller{


         $sumber='http://192.168.2.2/apidatamasterhhg/index.php/Dokter';
	  
	     $json=file_get_contents($sumber);


	        if( $json==''){


				 	       		$this->session->set_flashdata('error',"Data Service Cabang RS Kosong.Hubungi IT Support untuk masalah koneksi data web service cabang rs jika tak terhubung service terima kasih.");
						        redirect('laporanjaminanpasien');

				 	       }



        
	      $data=json_decode($json,true);

	  foreach($data as $a)
	{

	  if(is_array($a))
	 {

	    foreach($a as $key => $b)
	{


	print "<br>";

	print "<br>";


	 		        	$koders=$b['koders'];
				        $namars = $b['namars'];
				       
				        $tangkapdatamonitoring="

				      INSERT INTO tblm_rs (koders,namars) 

				      SELECT '$koders', '$namars'
					  


				           

				       ;";
					   
					   
		}	

	 }

	}

}	


//3.Buka linuux dulu baru perintah cron job : crontab -e :


					// -> 00 2 * * * /kepath phpmu/servicesipa.php
