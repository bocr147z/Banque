<?php 

class Titulaire
{
    private string $_nom;
    private string $_prenom;
    private string $_dateNaissance;
    private string $_ville;
    private array $_comptes;

    public function __construct ($nom, $prenom, $dateNaissance, $ville)
    {
        $this->_comptes = [];
        $this->_nom = $nom;
        $this->_prenom = $prenom;
        $this->_dateNaissance = $dateNaissance;
        $this->_ville = $ville;
    }

    public function setNom($nom)
    {
        $this->_nom = $nom;
    }

    public function setPrenom($prenom)
    {
        $this->_prenom = $prenom;
    }

    public function setDateNaissance($date)
    { 
        $this->_dateNaissance = $date;
    }

    public function setVille ($ville)
    {
        $this->_ville = $ville;
    }

    public function getNom()
    {
        return $this->_nom;
    }

    public function getPrenom()
    {
        return $this->_prenom;
    }

    public function getDateNaissance()
    {
        return $this->_dateNaissance;
    }

    public function getVille()
    {
        return $this->_ville;
    }

    public function addComptes(Compte $compte)
    {
        $this->_comptes[] = $compte;
    }

    public function afficherCompte()
    {
        foreach ($this->_comptes as $compte)
        {
            echo $compte;
        }
    }

    public function getAge()
    {
        $date = new DateTime($this->_dateNaissance);
        $today = new DateTime();
        $diff = $date->diff($today)->format("%y");
        return $diff;
    }

    public function __toString()
    {
        return "<strong>Titulaire: " . $this->getNom() . " " . $this->getPrenom() . " (" . $this->getAge() . " ans)"."</strong><br>";
    }
}
