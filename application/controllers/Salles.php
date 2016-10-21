<?php
/**
 * Created by PhpStorm.
 * User: Etienne
 * Date: 08/09/2016
 * Time: 10:21
 */
class Salles extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        // On charge le model Salle et on appel la fonction CodeIgniter pour gérer les URL
        $this->load->model('salles_model');
        $this->load->helper('url_helper');
    }

    public function index()
    {
        // On récupère toutes les salles de la BDD
        $data['salles'] = $this->salles_model->get_salles();
        // On définit le titre de la page
        $data['title'] = 'Nos salles';

        // On envoi nos données sur la view situé dans views/salles/index
        $this->load->view('templates/header', $data);
        $this->load->view('salles/index', $data);
        $this->load->view('templates/footer', $data);
    }
}