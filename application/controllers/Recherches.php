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
        // On charge le model Manifestations et on appel la fonction CodeIgniter pour gérer les URL
        $this->load->model('manifestations_model');
        $this->load->helper('url_helper');
    }
    // On charge l'index
    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('recherches/index');
        $this->load->view('templates/footer');
    }
    // On appel toutes les manifs
    public function getmanifsrecherche()
    {
        // On précise un paramètre envoyé en POST lors de la requette
        $data['manifrecherche'] = $this->manifestations_model->getManifRecherche($this->input->post('terme'));
        // On envoi à la vue toutes les manifs selectionné au format JSON
        header('Content-Type: application/json');
        echo json_encode( $data );
    }
}