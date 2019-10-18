<?php
class FTPUpload{
    
    var $CI;
    

    public function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->library('ftp');
    }
    
    function upload($files,$name) {
        if (FTP_SFTP) {
            $this->uploadSftp($files,$name); 
        } else {
            $this->uploadftp($files,$name);
        }
    }
    
    function uploadFtp($files,$name) {
        $config = array();
        $config['hostname'] = FTP_HOST;
        $config['port'] = FTP_PORT;
        $config['username'] = FTP_USER;
        $config['password'] = FTP_PASSWORD;
        $config['debug'] = FTP_DEBUG;
                    
        $fileLocation = $files['userfile']['tmp_name'];

        // check extension
        if (strtoupper(substr($_FILES['userfile']['name'], -3)) != strtoupper(UPLOAD_IMAGE_TYPE))
            throw new Exception(lang_param(array(UPLOAD_IMAGE_TYPE),"validation_file_type"));

        // check size
        if ($_FILES['userfile']['size'] > UPLOAD_IMAGE_SIZE * 1024)
            throw new Exception(lang_param(array(UPLOAD_IMAGE_SIZE),"validation_file_size"));

        $this->CI->ftp->connect($config);

        // get absolute path
	$dest = FCPATH.(FOLDER_IMAGE_ASSET.$name.".".UPLOAD_IMAGE_TYPE);
	
        // put via ftp and set chmod to read
	$this->CI->ftp->upload($fileLocation, $dest, 'binary');
	$this->CI->ftp->chmod($dest , DIR_READ_MODE); 

        $this->CI->ftp->close(); 
    }
    
    function uploadSftp($files,$name) {
        require_once LIB_SECLIB.'/Net/SFTP.php';
        
        $sftp = new Net_SFTP(FTP_HOST);
        if (!$sftp->login(FTP_USER, FTP_PASSWORD)) {
            throw new Exception("Cannot connect SFTP");
        }

        $fileLocation = $files['userfile']['tmp_name'];

        // check extension
        if (strtoupper(substr($_FILES['userfile']['name'], -3)) != strtoupper(UPLOAD_IMAGE_TYPE))
            throw new Exception(lang_param(array(UPLOAD_IMAGE_TYPE),"validation_file_type"));

        // check size
        if ($_FILES['userfile']['size'] > UPLOAD_IMAGE_SIZE * 1024)
            throw new Exception(lang_param(array(UPLOAD_IMAGE_SIZE),"validation_file_size"));

        // get absolute path
	$dest = FCPATH.(FOLDER_IMAGE_ASSET.$name.".".UPLOAD_IMAGE_TYPE);
	
        $sftp->put($dest, $fileLocation, NET_SFTP_LOCAL_FILE);
       

    }
    
}
?>
