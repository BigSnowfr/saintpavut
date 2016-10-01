<?php
/**
 * Created by PhpStorm.
 * User: Etienne
 * Date: 08/09/2016
 * Time: 10:16
 */
class Salles_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_salles($slug = FALSE)
    {
        if ($slug === FALSE)
        {
            $this->db->select('*');
            $this->db->from('stpavu_salles');
            /**$this->db->join('stpavu_salles', 'stpavu_manifs.manif_salle_code = stpavu_salles.salle_code');**/
            $query = $this->db->get();
            return $query->result_array();
        }
        $query = $this->db->get_where('salle', array('slug' => $slug));
        return $query->row_array();
    }
}