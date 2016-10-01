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
        $this->load->model('salles_model');
        $this->load->helper('url_helper');
    }
    public function index()
    {
        $data['salles'] = $this->salles_model->get_salles();
        $data['title'] = 'Nos salles';

        $this->load->view('templates/header', $data);
        $this->load->view('salles/index', $data);
        $this->load->view('templates/footer', $data);
    }
    public function view($slug = NULL)
    {
        $data['salle_item'] = $this->salles_model->get_salles($slug);
        if (empty($data['salles_item']))
        {
            show_404();
        }
        $data['title'] = $data['salles_item']['title'];

        $this->load->view('templates/header', $data);
        $this->load->view('salles/view', $data);
        $this->load->view('templates/footer', $data);
    }
}