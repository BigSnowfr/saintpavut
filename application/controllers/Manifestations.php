<?php
/**
 * Created by PhpStorm.
 * User: Etienne
 * Date: 08/09/2016
 * Time: 10:21
 */
class Manifestations extends CI_Controller{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('manifestations_model');
        $this->load->helper('url_helper');
    }
    public function index()
    {
        $config['first_url'] = base_url().'index.php/';
        $this->load->library('pagination');
        $this->pagination->initialize($config);
        $data['liens'] =  $this->pagination->create_links();
        $data['manifestations'] = $this->manifestations_model->get_manifestations();
        $data['title'] = 'Manifs';
        $this->load->view('templates/header', $data);
        $this->load->view('manifestations/index', $data);
        $this->load->view('templates/footer', $data);
    }
    public function details($i)
    {
        $config['first_url'] = base_url().'index.php/';
        $data['manifestations_item'] = $this->manifestations_model->get_manifestations($i);
        $data['count'] = $this->manifestations_model->countReservation($i);
        $data['title'] = 'Détails';
        $this->load->view('templates/header', $data);
        $this->load->view('manifestations/view', $data);
        $this->load->view('templates/footer', $data);
    }

    public function pagination($i = 1){
        $this->load->library('pagination');

        $limit = 4;

        $data['title']='Page : '.$i;
        $data['manifestations'] = $this->manifestations_model->get_manifestations(false, $i, $limit);

        $config = array();

        $config['base_url'] = './';
        $config['total_rows'] = $data['manifestations']['num_results'];
        $config['per_page'] = $limit;
        //which uri segment indicates pagination number
        $config['uri_segment'] = 3;
        $config['use_page_numbers'] = TRUE;
        //max links on a page will be shown
        $config['num_links'] = 2;
        //various pagination configuration
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();


        $data['manifestations'] = $data['manifestations']['rows'];

       if(!file_exists(APPPATH.'views/manifestations/index.php'))
        {
            // Erreur 404 lorsqu'on ne trouve pas le fichier demandé
            show_404();
        }
        $this->load->view('templates/header.php', $data);
        $this->load->view('manifestations/index.php', $data);
        $this->load->view('templates/footer.php', $data);
    }

    public function createPDF()
    {
        $this->load->library('Pdf');

        $pdf=new Pdf();
        $pdf->AddPage();
        $pdf->SetTextColor(0,0,0);
        $pdf->SetFont('helvetica','B',10);
        $pdf->Cell(20,20,"Centre culturel de Saint-Pavut");
        $pdf->Image(site_url().'/public/photos/after02.jpg',50,30,110,197);
        $pdf->SetXY(150,260);
        $pdf->Cell(0,15,"imprimé le ".date("d/m/Y"));
        $pdf->AddPage();
        $manifestations = $this->manifestations_model->get_manifestations();
        foreach ($manifestations as $manifestation)
        {
            $y=$pdf->GetY();
            if($y>230){
                $pdf->SetXY(180,260);
                $pdf->Cell(0,10,$pdf->PageNo());
                $pdf->AddPage();
            }
            $pdf->SetTextColor(255,255,255);
            $pdf->SetFillColor(0,0,0);
            $pdf->Cell(0,13,$manifestation['manif_intitul']." ( le ".$manifestation['manif_date']." )",1,1,1,1);
            $y=$pdf->GetY();
            $pdf->SetTextColor(0,0,0);
            $pdf->SetFillColor(255,255,255);
            $pdf->SetXY(10,$y+1);
            $pdf->Cell(150,42,"",1,1,1,1);
            $pdf->SetXY(15,$y);
            $pdf->MultiCell(125,10,$manifestation['manif_description'],0,'L',false);
            $pdf->SetXY(15,$y+30);
            $pdf->SetFillColor(255,255,255);
            $pdf->Cell(100,8,$manifestation['manif_prix_place']*1.34." Dollars par place seulement!",1,1,1,1);
            $pdf->Image(site_url()."public/photos/".$manifestation['manif_photo'],170,$y+1,30,40);
            $pdf->Ln(10);
        }
        $pdf->Output();


    }

}