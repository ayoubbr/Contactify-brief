<?php

class Contact
{
    private $connect;

    public function __construct(
        private $id = null,
        private $nom = '',
        private $prenom = '',
        private $email = '',
        private $telephone = ''
    ) {
        $database = new Database();
        $this->connect = $database->connect;
    }


    public function getId()
    {
        return $this->id;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getTelephone()
    {
        return $this->telephone;
    }

    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }

    // ====================== CREATE ============================= //
    public function create()
    {
        $query = "INSERT INTO contacts (nom, prenom, email, telephone) 
                      VALUES (:nom, :prenom, :email, :telephone)";

        try {

            $ready_query = $this->connect->prepare($query);

            $ready_query->bindValue(":nom", $this->nom);
            $ready_query->bindValue(":prenom", $this->prenom);
            $ready_query->bindValue(":email", $this->email);
            $ready_query->bindValue(":telephone", $this->telephone);

            return $ready_query->execute();
        } catch (PDOException $e) {

            return false;
        }
    }
    // ====================== READ ============================= //
    public function getAll()
    {
        try {
            $query = "SELECT * FROM contacts ORDER BY id";
            $ready_query = $this->connect->prepare($query);
            $ready_query->execute();

            return $ready_query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
    }
    // ====================== CRUD ============================= //
    // ====================== CRUD ============================= //
    // ====================== CRUD ============================= //
}
