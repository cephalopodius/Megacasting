<?php
class bdd
{

    public function __construct()
    {
        $this->hydrate();
    }

    public function hydrate()
    {
        $bdd = new PDO('mysql:host=localhost;dbname=ppe', 'root', '');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $bdd;
    }
}
?>