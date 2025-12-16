<?php
class Carte {

    public string $adresse;
    public string $code_postal;
    public string $ville;

    public function __construct(string $adresse, string $code_postal, string $ville)
    {
        $this->adresse = $adresse;
        $this->code_postal = $code_postal;
        $this->ville = $ville;
    }

    public function adresseComplete(): string {
        return $this->adresse . $this->code_postal . $this->ville;
    }
}