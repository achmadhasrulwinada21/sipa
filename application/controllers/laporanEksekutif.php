<?php
Class LaporanEksekutif extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library('pdf');
        $this->load->helper('url');
        $this->load->model('model');
        //$this->load->view('laporanpdf/report', $data);
    }

public function index()
    {
        $data = array(
            'nama' => $this->session->userdata('nama'), 
            'cabang' => $this->session->userdata('cabang'),
            'report' => $this->model->TampilData('order by periode asc')->result_array(),
            'sinkronisasi' => $this->model->Sinkronisasi('order by periode asc')->result_array(),
            //'periode' => $this->session->userdata('periode'),
            'reportbulan' => $this->model->GetDataReport('order by periode asc')->result_array(),
        
);
          

        

function tampil_report(){

    $vtanggal=$this->input->post('inputtanggal');
    $data['tampil_report']=$this->model->TampilData('where periode = $vtanggal ')->result_array();
    $this->load->view('laporaneksekutif/report',$data);
    }
        $this->load->view('laporaneksekutif/report', $data);
    }
    

function datareport(){
        
        $pdf = new FPDF('l','mm','legal', array(216, 330));
        $pdf->setTopMargin(3);
        $pdf->setLeftMargin(3);
        $pdf->setAutoPageBreak(true);
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',10);
        // $uraian_allrs = $this->db->get('eksekutifreport')->result();
        // foreach ($uraian_allrs as $row)
        // {
        //$pencapaian = $this->db->get('get_semuadataall')->result();
   
        // mencetak string 
        $pdf->Cell(350,4,'EKSEKUTIF REPORT',0,1,'C');
        $pdf->SetFont('Arial','B',8);
        $sql=date('M Y');
        $pdf->Cell(350,4,'PENCAPAIAN '.$sql, 0,1,'C');
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(350,4,'HERMINA HOSPITAL GROUP',0,1,'C');

        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,4,'',0,1);
        $pdf->SetFillColor(36,96,84);
        $pdf->SetFont('Arial','B',6.5);
        $pdf->SetFillColor(36,96,84);
        //$pdf->SetDrawColor(36,96,84);
        //$pdf->SetTextColor(36,96,84);



        //$pdf->Cell(15,6,'periode',1,0); 

        $pdf->Cell(21,6,'URAIAN',1,0,'C');
        $pdf->Cell(12,6,'HHG',1,0,'C');
        $pdf->Cell(14,6,'JTN',1,0,'C');
        $pdf->Cell(12,6,'KMYR',1,0,'C');
        $pdf->Cell(12,6,'BKS',1,0,'C');
        $pdf->Cell(12,6,'DEPOK',1,0,'C');
        $pdf->Cell(12,6,'DM',1,0,'C');
        $pdf->Cell(12,6,'BOGOR',1,0,'C');
        $pdf->Cell(12,6,'PST',1,0,'C');
        $pdf->Cell(10,6,'PDRN',1,0,'C');
        $pdf->Cell(11,6,'TPRAHU',1,0,'C');
        $pdf->Cell(10,6,'SKBM',1,0,'C');
        $pdf->Cell(9,6,'TGR',1,0,'C');
        $pdf->Cell(9,6,'GW',1,0,'C');
        $pdf->Cell(10,6,'ARCA',1,0,'C');
        $pdf->Cell(10,6,'GLXY',1,0,'C');
        $pdf->Cell(10,6,'PLB',1,0,'C');
        $pdf->Cell(10,6,'CPT',1,0,'C');
        $pdf->Cell(10,6,'MKS',1,0,'C');
        $pdf->Cell(10,6,'SPG',1,0,'C');
        $pdf->Cell(10,6,'BYMK',1,0,'C');
        $pdf->Cell(10,6,'SOLO',1,0,'C');
        $pdf->Cell(10,6,'CIRUAS',1,0,'C');
        $pdf->Cell(10,6,'YOGYA',1,0,'C');
        $pdf->Cell(10,6,'BITUNG',1,0,'C');
        $pdf->Cell(10,6,'MKSR',1,0,'C');
        $pdf->Cell(10,6,'BLKPPN',1,0,'C');
        $pdf->Cell(9,6,'MDN',1,0,'C');
        $pdf->Cell(9,6,'PDM',1,0,'C');
        $pdf->Cell(9,6,'PWT',1,0,'C');
        $pdf->Cell(16,6,'CAPAI',1,1,'C');
       
        //$pdf->Cell(15,6,'Pencapaian',1,1);

      
        $pdf->SetFont('Arial','',7);
        $vtanggal=$this->input->post('inputtanggal');
        $uraian_allrs = $this->model->TampilData("where periode = '$vtanggal'")->result();
        //$pencapaian = $this->db->get('eksekutifreport')->result();
    
        foreach ($uraian_allrs as $row)
        {
//             while($row = pg_fetch_array($uraian_allrs))
//                 $test=$row[0];
// {
         //while($d=pg_fetch_array( $uraian_allrs)) {


        //$dataall=$d[0];
        //$result = $this->model->SimpanInformasiR('alldata', $dataall);
           
           //$pdf->Cell(10,6,$dataall,1.1);
            //$pdf->Cell(15,6,$row->periode,1,0);
            $pdf->Cell(21,6,$row->nama_uraian,1,0,'C');
            $pdf->Cell(12,6,$row->hhg,1,0,'C');
            $pdf->Cell(14,6,$row->jtn,1,0,'C');
            $pdf->Cell(12,6,$row->kmyr,1,0,'C');
            $pdf->Cell(12,6,$row->bks,1,0,'C');
            $pdf->Cell(12,6,$row->depok,1,0,'C');
            $pdf->Cell(12,6,$row->dm,1,0,'C');
            $pdf->Cell(12,6,$row->bogor,1,0,'C');
            $pdf->Cell(12,6,$row->pst,1,0,'C');
            $pdf->Cell(10,6,$row->pdrn,1,0,'C');
            $pdf->Cell(11,6,$row->tprahu,1,0,'C');
            $pdf->Cell(10,6,$row->skbm,1,0,'C');
            $pdf->Cell(9,6,$row->tgr,1,0,'C');
            $pdf->Cell(9,6,$row->gw,1,0,'C');
            $pdf->Cell(10,6,$row->arca,1,0,'C');
            $pdf->Cell(10,6,$row->glxy,1,0,'C');
            $pdf->Cell(10,6,$row->plb,1,0,'C');
            $pdf->Cell(10,6,$row->cpt,1,0,'C');
            $pdf->Cell(10,6,$row->mks,1,0,'C');
            $pdf->Cell(10,6,$row->spg,1,0,'C');
            $pdf->Cell(10,6,$row->bymk,1,0,'C');
            $pdf->Cell(10,6,$row->solo,1,0,'C');
            $pdf->Cell(10,6,$row->ciruas,1,0,'C');
            $pdf->Cell(10,6,$row->yogya,1,0,'C');
            $pdf->Cell(10,6,$row->bitung,1,0,'C');
            $pdf->Cell(10,6,$row->mksr,1,0,'C');
            $pdf->Cell(10,6,$row->blkppn,1,0,'C');
            $pdf->Cell(9,6,$row->mdn,1,0,'C');
            $pdf->Cell(9,6,$row->pdm,1,0,'C');
            $pdf->Cell(9,6,$row->pwt,1,0,'C');
            $tot=$row->capai;
            $number = number_format($tot,2);
            $pdf->Cell(16,6,$number,1,1,'C');
           

            //$pdf->Cell(15,6,$row1->pencapaian,1,1);
            
        }


         $pdf->Output('eksekutifreport.pdf','I');

        }

    }
