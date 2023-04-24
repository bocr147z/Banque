<?php 

class Compte {
    private string $_libelle;
    private float $_solde;
    private string $_devise;
    private Titulaire $_titulaire; // le titulaire ?

    public function __construct($libelle, $solde, $devise, Titulaire $titulaire)
    {
        $this->_libelle = $libelle;
        $this->_solde = $solde;
        $this->_devise = $devise;
        $this->_titulaire = $titulaire; // pourquoi un changement de _titulaire vers $titulaire
        $titulaire->addComptes($this);
    }

    public function setLibelle($libelle)
    {
        $this->_libelle = $libelle;
    }

    public function setSolde($solde)
    {       
        $this->_solde = $solde;
    }

    public function setDevise($devise)
    {
        $this->_devise = $devise;
    }

    public function getLibelle()
    {
        return $this->_libelle;
    }

    public function getSolde()
    {
        return $this->_solde;
    }

    public function getDevise()
    {
        return $this->_devise;
    }

    public function creditCompte($montant)
    {
        return $this->_solde += $montant; // += est _solde = _solde + $montant
    }

    public function debitCompte($montant)
    {
        if ($this->_solde >= $montant)
        {
            $this->_solde -= $montant; // += est _solde = _solde - $montant
        }
        else 
        {
            echo "Vous n'avez pas les fonds necéssaires<br>";
        }
    }
    
    public function virementTo($compte, $montant)
    {
        if ($this->_solde >= $montant)
        {
            $this->debitCompte($montant);
            $compte->creditCompte($montant);
        }
        else
        {
            echo "Fonds non disponible";
        }
    }

    public function __toString()
    {
        return $this->getLibelle() . " : " . $this->getSolde() . " " . $this->getDevise() . "<br>";
    }
}