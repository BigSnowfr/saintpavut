<?php
/**
 * Created by PhpStorm.
 * User: Etienne
 * Date: 08/09/2016
 * Time: 10:16
 */
class Manifestations_model extends CI_Model {


    protected $table = 'stpavu_manifs';

    public function __construct()
    {
        $this->load->database();
    }

    public function get_manifestations($slug = FALSE, $offset=false, $limit=10)
    {
        if ($slug === FALSE && $offset === false)
        {
            $this->db->join('stpavu_salles', 'stpavu_manifs.manif_salle_code = stpavu_salles.salle_code');
            $query = $this->db->get('stpavu_manifs');
            return $query->result_array();
        }
        else if ($slug === FALSE)
        {
            if ($offset > 0) {
                $offset = ($offset - 1) * $limit;
            }
            $this->db->join('stpavu_salles', 'stpavu_manifs.manif_salle_code = stpavu_salles.salle_code');
            $query = $this->db->get('stpavu_manifs', $limit, $offset);
            $result['rows'] = $query->result_array();
            $result['num_results'] = $this->db->count_all_results('stpavu_manifs');
            return $result;
        }else
        {
            $this->db->join('stpavu_salles', 'stpavu_manifs.manif_salle_code = stpavu_salles.salle_code');
            $query = $this->db->get_where('stpavu_manifs', array('manif_id' => $slug));
            return $query->row_array();
        }
    }

    public function getManifRecherche($terme)
    {
        $this->db->select('*');
        $this->db->like('manif_intitul',$terme);
        $query=$this->db->get("stpavu_manifs");
        return $query->result_array();
    }

  public function getCamembert($id)
  {
      $this->db->select('abo_ville, COUNT(abo_ville) as total');
      $this->db->group_by('abo_ville');
      $this->db->select('abo_ville');
      $this->db->join('stpavu_abonnes', 'stpavu_abonnes.abo_id = stpavu_resa.abo_iden');
      $this->db->join('stpavu_manifs', 'stpavu_manifs.manif_id = stpavu_resa.manif_ide');
      $this->db->order_by('abo_ville','ASC');
      $query = $this->db->get_where('stpavu_resa', array('manif_ide' => $id));
      $result['rows'] = $query->result_array();
      return $result;
  }

    public function countReservation($id)
    {
        $nombre = 0;
        $this->db->where('manif_ide',$id);
        $query = $this->db->get('stpavu_resa');
        $query = $query->result_array();
        foreach ($query as $cle => $val)
        {
            $nombre += $val['abo_qte_place_reservee'];
        }
        return $nombre;
    }
}