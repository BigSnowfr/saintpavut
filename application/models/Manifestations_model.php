<?php
/**
 * Created by PhpStorm.
 * User: Etienne
 * Date: 08/09/2016
 * Time: 10:16
 */
class Manifestations_model extends CI_Model {

    // On indique sur quelle table on travail
    protected $table = 'stpavu_manifs';

    public function __construct()
    {
        // On appel la BDD
        $this->load->database();
    }

    // Appel des manifestations, $slug indique l'id de la manif, $offset indique le décalage dans la BDD et $limit indique le nombre maximum de manif, le sujet en impose 4.
    public function get_manifestations($slug = FALSE, $offset=false, $limit=4)
    {
        // On test si on indique un ID ou un offset
        if ($slug === FALSE && $offset === false)
        {
            // Aucun parametre n'est passé, on appel toutes les manif avec la jointure de la table salle
            $this->db->join('stpavu_salles', $this->table.'.manif_salle_code = stpavu_salles.salle_code');
            $query = $this->db->get($this->table);
            return $query->result_array();
        }
        // Un offset est passé à travers l'URL
        else if ($slug === FALSE)
        {
            // On oblige l'offset à être positif
            if ($offset < 1)
            {
                $offset = 1;
            }else
            {
                    $offset = ($offset - 1) * $limit;
            }
            //On appel toutes les manifs avec la jointure de la table salle avec toujours une limite à 4 et un offset qui dépend de l'URL
            $this->db->join('stpavu_salles', $this->table.'.manif_salle_code = stpavu_salles.salle_code');
            $query = $this->db->get($this->table, $limit, $offset);
            $result['rows'] = $query->result_array();
            $result['num_results'] = $this->db->count_all_results($this->table);
            return $result;
        // Seulement un ID est passé dans ce cas, on affiche donc une seule manif
        }else
        {
            $this->db->join('stpavu_salles', $this->table.'.manif_salle_code = stpavu_salles.salle_code');
            $query = $this->db->get_where($this->table, array('manif_id' => $slug));
            return $query->row_array();
        }
    }

    // Requette pour créer la barre de réservations
    public function uneseule($id)
    {
        $this->db->select('salle_place_max');
        $this->db->select_sum('abo_qte_place_reservee', 'totalresa');
        $this->db->join($this->table, $this->table.'.manif_id = stpavu_resa.manif_ide');
        $this->db->join('stpavu_salles', $this->table.'.manif_salle_code = stpavu_salles.salle_code');
        $query = $this->db->get_where('stpavu_resa', array('manif_id' => $id));
        return $query->result();
    }

    // On appel un nombre de manifestation aléatoirement, afin de rendre l'index dynamique
    public function getManifestionRandom($limit)
    {
        $this->db->order_by('manif_id', 'RANDOM');
        $query = $this->db->get($this->table, $limit, 0);
        return $query->result_array();
    }

    // On appel que les manifestations où l'intitulé comporte le terme passé en paramètre
    public function getManifRecherche($terme)
    {
        $this->db->select('*');
        $this->db->like('manif_intitul',$terme);
        $query=$this->db->get($this->table);
        return $query->result_array();
    }

    // Appel des données pour créer le graphique de réservation par ville
    public function getCamembert($id)
    {
        $this->db->select('abo_ville, COUNT(abo_ville) as total');
        $this->db->group_by('abo_ville');
        $this->db->join('stpavu_abonnes', 'stpavu_abonnes.abo_id = stpavu_resa.abo_iden');
        $this->db->join($this->table, $this->table.'.manif_id = stpavu_resa.manif_ide');
        $this->db->order_by('abo_ville','ASC');
        $query = $this->db->get_where('stpavu_resa', array('manif_ide' => $id));
        $result['rows'] = $query->result_array();
        return $result;
    }

    // On compte le nombre de réservation pour chaque manifestation
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