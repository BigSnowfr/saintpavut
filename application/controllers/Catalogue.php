<?php
/**
 * Created by PhpStorm.
 * User: Etienne
 * Date: 08/09/2016
 * Time: 10:21
 */
class Catalogue extends CI_Controller{


    public function __construct()
    {
        parent::__construct();
        // On charge le model Manifestations et on appel la fonction CodeIgniter pour gérer les URL
        $this->load->model('manifestations_model');
        $this->load->helper('url_helper');
    }

    // Appel de la page index
    public function index()
    {
        $config['first_url'] = site_url();
        $this->load->library('pagination');
        // On récupère toutes les manifestations
        $data['manifestations'] = $this->manifestations_model->get_manifestations();
        $this->load->view('templates/header', $data);
        $this->load->view('manifestations/index', $data);
        $this->load->view('templates/footer', $data);
    }

    // Appel de la vue détail d'une manifestation
    public function details($i)
    {
        $config['first_url'] = site_url();
        // On appel une seule manifestations dont l'ID est définit dans l'URL
        $data['manifestations_item'] = $this->manifestations_model->get_manifestations($i);
        // On compte le nombre de réservation pour cette manifestation
        $data['count'] = $this->manifestations_model->countReservation($i);
        $this->load->view('templates/header', $data);
        $this->load->view('manifestations/view', $data);
        $this->load->view('templates/footer', $data);
    }

    // Gestion de la barre de réservation
    public function barre($i)
    {
        // Appel des informations concernant une seule manif afin de créer la barre de réservation
        $data['uneseule'] = $this->manifestations_model->uneseule($i);
        $this->load->view('manifestations/barre', $data);
    }

    // Gestion de la pagination de la liste des manifestations
    public function pagination($i = 1){

        // On charge la librairie CodeIgniter qui gère la pagination
        $this->load->library('pagination');

        // On limite à 4 le nombre de manifestations par page
        $limit = 4;

        // On définit le titre de la page pour savoir sur laquelle on se situe.
        $data['title']='Page : '.$i;
        // On fait la requette vers le modèle en spécifiant un offset précisé dans l'URL et une limite définit forcément à 4
        $data['manifestations'] = $this->manifestations_model->get_manifestations(false, $i, $limit);

        $config = array();
        $config['base_url'] = './';
        $config['total_rows'] = $data['manifestations']['num_results'];
        $config['per_page'] = $limit;
        // On indique quel paramètre de l'URL spécifie l'offset
        $config['uri_segment'] = 3;
        $config['use_page_numbers'] = TRUE;
        //Nombre de lien visible dans barre de pagination
        $config['num_links'] = 4;
        //various pagination configuration
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        // On indique à quoi doit ressembler la flèche précédent
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        // On indique à quoi doit ressembler la flèche suivant
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        // On ajoute la classe active au bouton correspondant à la page actuelle
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        // On insert dans le tableau envoyé à la vue le code de la pagination
        $data['pagination'] = $this->pagination->create_links();

        // On insert dans le tableau envoyé à la vue le code des manifestatons
        $data['manifestations'] = $data['manifestations']['rows'];

        // On vérifie que la page demandé existe sinon on envoi une page 404
       if(!file_exists(APPPATH.'views/manifestations/index.php'))
        {
            // Erreur 404 lorsqu'on ne trouve pas le fichier demandé
            show_404();
        }
        $this->load->view('templates/header.php', $data);
        $this->load->view('manifestations/index.php', $data);
        $this->load->view('templates/footer.php', $data);
    }

    // Création du PDF des manifestations
    public function createPDF()
    {
        // On charge la libraire qui gère la création de PDF
        $this->load->library('Pdf');

        // On instancie l'objet
        $pdf=new Pdf();
        // On crée une première page
        $pdf->AddPage();
        // On indique que le texte doit être noir
        $pdf->SetTextColor(0,0,0);
        // On sélectionne la police et la taille
        $pdf->SetFont('helvetica','B',10);
        // On écrit le titre du PDF en spécifiant les coordonnées
        $pdf->Cell(20,20,"Centre culturel de Saint-Pavut");
        // On insert une image en spécifiant la taille et les coordonnées
        $pdf->Image(site_url().'/public/photos/after02.jpg',50,30,110,197);
        // On se place en base de page est on indique la date de création du PDF, mis à jour dynamiquement
        $pdf->SetXY(150,260);
        $pdf->Cell(0,15,"imprimé le ".date("d/m/Y"));
        // On ajoute une nouvelle page
        $pdf->AddPage();
        // On appel toutes les manifestations de la base de donnée
        $manifestations = $this->manifestations_model->get_manifestations();
        // Pour chaque manifestation on effectue ça
        foreach ($manifestations as $manifestation)
        {
            // On test si il reste de la place en bas de page pour ajouter une manifestation
            $y=$pdf->GetY();
            if($y>230){
                // Si on est en bas on indique le numéro de la page
                $pdf->SetXY(180,260);
                $pdf->Cell(0,10,$pdf->PageNo());
                // Et on ajoute la page suivante
                $pdf->AddPage();
            }
            // On indique que le texte doit être blanc maintenant
            $pdf->SetTextColor(255,255,255);
            // La couleur d'arrière plan doit être noir
            $pdf->SetFillColor(0,0,0);
            // On inscrit le nom et la date de la manifestation dans le cadre correspondant aux coordonnées spécifiées
            $pdf->Cell(0,13,$manifestation['manif_intitul']." ( le ".$manifestation['manif_date']." )",1,1,1,1);
            // On récupère la nouvelle coordonnée Y après ajout du bloc de titre
            $y=$pdf->GetY();
            // On indique que le texte doit être noir maintenant
            $pdf->SetTextColor(0,0,0);
            // La couleur d'arrière plan doit être blanc
            $pdf->SetFillColor(255,255,255);
            // On indique le décalage du bloc qui va être crée, on le décale de 2 vers le bas sur l'axe Y
            $pdf->SetXY(10,$y+2);
            // On indique la taille de ce bloc
            $pdf->Cell(150,42,"",1,1,1,1);
            // On décale encore de 5
            $pdf->SetXY(15,$y+5);
            // On ajoute la description de la manifestations dans le bloc
            $pdf->MultiCell(125,10,$manifestation['manif_description'],0,'L',false);
            // On décale de 30 sur Y
            $pdf->SetXY(15,$y+30);
            // On remplie de blanc le fond
            $pdf->SetFillColor(255,255,255);
            // On indique le prix en dollars de la place
            $pdf->Cell(100,8,$manifestation['manif_prix_place']*1.34." Dollars par place seulement!",1,1,1,1);
            // On ajoute l'image au coordonnées spécifiées
            $pdf->Image(site_url()."public/photos/".$manifestation['manif_photo'],170,$y+1,30,40);
            $pdf->Ln(10);
        }
        // On rend le PDF une fois que l'on a traité toute les manifs
        $pdf->Output();
    }
}