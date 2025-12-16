<?php
class Createur {

    public string $nom;
    public string $prenom;
    public string $linkedin;
    public string $mail;
    public string $telephone;

    public function __construct(string $nom, string $prenom, string $linkedin, string $mail, string $tel)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->linkedin = $linkedin;
        $this->mail = $mail;
        $this->telephone = $tel;
    }
}