<?php
/**
 * Created by PhpStorm.
 * User: Etienne
 * Date: 08/09/2016
 * Time: 09:53
 */
class Pages extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // On charge le model Manifestations et on appel la fonction CodeIgniter pour gérer les URL
        $this->load->model('manifestations_model');
        $this->load->helper('url_helper');
    }

    public function index($page = 'index')
    {
        // On vérifie que la page demandé existe, sinon on affiche une page 404
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
            show_404();
        }else
        {
            // On appel 6 manifestations aléatoirement
            $data['manifestations'] = $this->manifestations_model->getManifestionRandom(6);
            // On envoi les données à la view
            $this->load->view('templates/header', $data);
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer', $data);
        }
    }
}