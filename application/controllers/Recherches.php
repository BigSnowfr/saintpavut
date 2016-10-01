<?php
/**
 * Created by PhpStorm.
 * User: Etienne
 * Date: 08/09/2016
 * Time: 09:53
 */
class Recherches extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('manifestations_model');
        $this->load->helper('url_helper');
    }
    public function index()
    {

        $data['title'] = 'Recherche Ajax';

        $data['manifestations'] = $this->manifestations_model->get_manifestations();
        $data['title'] = 'Manifs';
        $this->load->view('templates/header', $data);
        $this->load->view('recherches/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function getmanifsrecherche()
    {
        $data['manifrecherche'] = $this->manifestations_model->getManifRecherche($this->input->post('terme'));
        header('Content-Type: application/json');
        echo json_encode( $data );
    }
}