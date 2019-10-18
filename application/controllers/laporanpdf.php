<?php
Class Laporanpdf extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library('TPdf');
   
        
        //$this->load->view('laporanpdf/report', $data);
    }

public function index()
    {
        $data = array(
            'nama' => $this->session->userdata('nama'), 
            'cabang' => $this->session->userdata('cabang'),
            'report' => $this->model->TampilData('order by periode asc')->result_array(),
            // 'report1' => $this->model->TampilData1('order by periode asc')->result_array(),
            
            'sinkronisasi' => $this->model->Sinkronisasi('order by periode asc')->result_array(),
            // 'sinkronisasivar' => $this->model->Sinkronisasivar('order by periode asc')->result_array(),

            //'periode' => $this->session->userdata('periode'),
            'reportbulan' => $this->model->GetDataReport('order by periode asc')->result_array(),
        
);
          

        

function tampil_report(){

    $vtanggal=$this->input->post('inputtanggal');
    $data['tampil_report']=$this->model->TampilData('where periode = $vtanggal ')->result_array();
    
    }
        $this->template->display('laporanpdf/reportvar', $data);
    }

    


    

// function datareport(){
//         $pdf = new TPdf('l','mm','legal', array(216, 330));
//         $pdf->setTopMargin(3);
//         $pdf->setLeftMargin(3);
//         $pdf->setAutoPageBreak(true);
//         // membuat halaman baru
//         $pdf->AddPage('LEGAL', array(216, 330));
//         // setting jenis font yang akan digunakan
//         $pdf->SetFont('helvetica','B',10);
//         // $uraian_allrs = $this->db->get('eksekutifreport')->result();
//         // foreach ($uraian_allrs as $row)
//         // {
//         //$pencapaian = $this->db->get('get_semuadataall')->result();
   
//         // mencetak string 
//         $pdf->Cell(350,4,'EKSEKUTIF REPORT',0,1,'C');
//         $pdf->SetFont('helvetica','B',8);
//         $sql=date('M Y');
//         $pdf->Cell(350,4,'PENCAPAIAN '.$sql, 0,1,'C');
//         $pdf->SetFont('helvetica','B',8);
//         $pdf->Cell(350,4,'HERMINA HOSPITAL GROUP',0,1,'C');

//         // Memberikan space kebawah agar tidak terlalu rapat
//         $pdf->Cell(10,4,'',0,1);
//         $pdf->SetFillColor(36,96,84);
//         $pdf->SetFont('helvetica','B',6.5);
//         $pdf->SetFillColor(36,96,84);
//         //$pdf->SetDrawColor(36,96,84);
//         //$pdf->SetTextColor(36,96,84);



//         //$pdf->Cell(15,6,'periode',1,0); 
            
//         $html='<br>
      
//         <table border="1" cellspacing="1"  cellpadding="2">
//             <tr>
            
//                       <th>PERIODE</th>
//                       <th>URAIAN</th>
//                       <th>HHG</th>
//                       <th>JTN</th>
//                       <th>KMYR</th>
//                       <th>BEKASI</th>
//                       <th>DEPOK</th>
//                       <th>DM</th>
//                       <th>BOGOR</th>
//                       <th>PST</th>
//                       <th>PDRN</th>
//                       <th>TPRAHU</th>
//                       <th>SKBM</th>
//                       <th>TGR</th>
//                       <th>GW</th>
//                       <th>ARCA</th>
//                       <th>GLXY</th>
//                       <th>PLB</th>
//                       <th>CPT</th>
//                       <th>MKS</th>
//                       <th>SPG</th>
//                       <th>BYMK</th>
//                       <th>SOLO</th>
//                       <th>CIRUAS</th>
//                       <th>YOGYA</th>
//                       <th>BITUNG</th>
//                       <th>MKSR</th>
//                       <th>BLKPPN</th>
//                       <th>MDN</th>
//                       <th>PDM</th>
//                       <th>PWT</th>
//                       <th>CAPAI</th>
//             </tr>';

      
//         $pdf->SetFont('helvetica','',7);
//         $vtanggal=$this->input->post('inputtanggal');
//         $uraian_allrs = $this->model->TampilData("where periode = '$vtanggal'")->result();
//         // //$pencapaian = $this->db->get('eksekutifreport')->result();
            
//         foreach ($uraian_allrs as $row)
//         {

//             $html.='<tr>
              
//               <td>'.$row['periode'].'</td>
//                             <td>'.$row['nama_uraian'].'</td>

//                       <td style="background-color:  '.$row['warnaselhhg'].'" >'.$row['hhg'].'</td>
//                       <td  style="background-color: '.$row['warnaseljtn'].'">'.$row['jtn'].'</td>
//                       <td  style="background-color: '.$row['warnaselkmyr'].'">'.$row['kmyr'].'</td>
//                       <td  style="background-color: '.$row['warnaselbekasi'].'">'.$row['bks'].'</td>
//                       <td  style="background-color: '.$row['warnaseldepok'].'">'.$row['depok'].'</td>
//                       <td  style="background-color: '.$row['warnaseldm'].'">'. $row['dm'].'</td>
//                       <td  style="background-color: '.$row['warnaselbogor'].'">'.$row['bogor'].'</td>
//                       <td  style="background-color: '.$row['warnaselpst'].'">'.$row['pst'].'</td>
//                       <td  style="background-color: '.$row['warnaselpdrn'].'">'.$row['pdrn'].'</td>
//                       <td  style="background-color: '.$row['warnaseltprahu'].'">'.$row['tprahu'].'</td>
//                       <td  style="background-color: '.$row['warnaselskbm'].'">'.$row['skbm'].'</td>
//                       <td  style="background-color: '.$row['warnaseltgr'].'">'.$row['tgr'].'</td>
//                       <td  style="background-color: '.$row['warnaselgw'].'">'.$row['gw'].'></td>
//                       <td  style="background-color: '.$row['warnaselarca'].'">'.$row['arca'].'</td>
//                       <td  style="background-color: '.$row['warnaselglxy'].'">'.$row['glxy'].'</td>
//                       <td  style="background-color: '.$row['warnaselplb'].'">'.$row['plb'].'</td>
//                       <td  style="background-color: '.$row['warnaselcpt'].'">'.$row['cpt'].'</td>
//                       <td  style="background-color: '.$row['warnaselmks'].'">'.$row['mks'].'</td>
//                       <td  style="background-color: '.$row['warnaselspg'].'">'.$row['spg'].'</td>
//                       <td  style="background-color: '.$row['warnaselbymk'].'">'.$row['bymk'].'</td>
//                       <td  style="background-color: '.$row['warnaselsolo'].'">'.$row['solo'].'</td>
//                       <td  style="background-color: '.$row['warnaselciruas'].'">'.$row['ciruas'].'</td>
//                       <td  style="background-color: '.$row['warnaselyogya'].'">'.$row['yogya'].'</td>
//                       <td  style="background-color: '.$row['warnaselbitung'].'">'.$row['bitung'].'</td>
//                       <td  style="background-color: '.$row['warnaselmksr'].'">'.$row['mksr'].'</td>
//                       <td  style="background-color: '.$row['warnaselblkppn'].'">'.$row['blkppn'].'</td>
//                       <td  style="background-color: '.$row['warnaselmdn'].'">'.$row['mdn'].'</td>
//                       <td  style="background-color: '.$row['warnaselpdm'].'">'.$row['pdm'].'</td>
//                       <td  style="background-color: '.$row['warnaselpwt'].'">'.$row['pwt'].'</td>
//                       <td id="id30">'.number_format($row['capai'],2).'</td>
//             </tr>';
//         }
        
//          $pdf->writeHTML($html, true, false, true, false, '');
//          $pdf->Output('eksekutifreport.pdf','I');

//     }

    }
