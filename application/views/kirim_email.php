 <?php
 // Konfigurasi email.        
        $this->email->from('achmadhasrulwinada.com','uul');   
        $this->email->to($kirim_email->kontak);   
        // $this->email->attach('https://masrud.com/themes/masrud/img/logo.png');
         $this->email->subject('Surat Permohonan Suku Bunga dan Pinjaman ' . $kirim_email->no_surat);
         $this->email->message('Surat Permohonan anda telah diperiksa oleh Kepala Departemen ( http://localhost/sipas/bunga )');

        if ($this->email->send())
        	{
            echo 'Sukses! email berhasil dikirim.';
        }
        else
        {
            echo 'Error! email tidak dapat dikirim.';
        }

?>