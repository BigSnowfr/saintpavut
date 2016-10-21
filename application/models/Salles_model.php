<?php
/**
 * Created by PhpStorm.
 * User: Etienne
 * Date: 08/09/2016
 * Time: 10:16
 */
class Salles_model extends CI_Model {

    // On indique le nom de la table dans la BDD
    protected $salleBDD = 'stpavu_salles';

    public function __construct()
    {
        // Appel de la base de donnée
        $this->load->database();
    }

    // Afficher toutes les salles
    public function get_salles()
    {
        // Aucun paramètre n'est passé donc on récupère toutes les salles
        $this->db->select('*');
        $this->db->order_by('salle_nom','ASC');
        $this->db->from($this->salleBDD);
        $query = $this->db->get();
        return $query->result_array();
    }
}