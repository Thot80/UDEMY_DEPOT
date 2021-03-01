<?php

class UserManager
{
    private $db;

    public function __construct(PDO $db)
    {
        $this->setDb($db);
    }

    /**
     * @param mixed $db
     */
    public function setDb(PDO $db): void
    {
        $this->db = $db;
    }

    /**
     * @return mixed
     */
    public function getDb()
    {
        return $this->db;
    }
    //******************************************************* CRUD *********************************************************

    // Cette fonction nécessite l'instanciation d'un objet User en amont, le rentre dans la BDD, puis hydrate l'objet
    // avec l'id auto-incrémentée lors de la création en BDD
    public function addUser(User $user)
    {
        $req = 'INSERT INTO user (nom, prenom, tel, email) VALUES (:nom, :prenom, :tel, :email)';
        $addUser = $this->db->prepare($req);
        $addUser->bindValue(':nom', $user->getNom(), PDO::PARAM_STR);
        $addUser->bindValue(':prenom', $user->getPrenom(), PDO::PARAM_STR);
        $addUser->bindValue(':tel', $user->getTel(), PDO::PARAM_STR);
        $addUser->bindValue(':email', $user->getEmail(), PDO::PARAM_STR);
        $addUser->execute();
        $user->hydrate(['id' => $this->db->lastInsertId()]);
    }

    // On met à jour les infos sur l'User via l'objet puis on transmet ces modifications à la BDD
    public function updateUser(User $user)
    {
        $req = 'UPDATE User SET nom = :nom, prenom = :prenom, tel = :tel, email = :email WHERE id = :id';
        $updateUser = $this->db->prepare($req);
        $updateUser->bindValue(':nom', $user->getNom(), PDO::PARAM_STR);
        $updateUser->bindValue(':prenom', $user->getPrenom(), PDO::PARAM_STR);
        $updateUser->bindValue(':tel', $user->getTel(), PDO::PARAM_STR);
        $updateUser->bindValue(':email', $user->getEmail(), PDO::PARAM_STR);
        $updateUser->bindValue(':id', $user->getId(), PDO::PARAM_INT);
        $updateUser->execute();
    }
    public function deleteUser($id)
    {
        $req = 'DELETE FROM User WHERE id = :id';
        $deleteUser = $this->db->prepare($req);
        $deleteUser->bindParam(':id', $id, PDO::PARAM_INT);
        $deleteUser->execute();
    }
    public function getUser($id)
    {
        $req = 'SELECT * FROM User WHERE id = :id';
        $selectAll = $this->db->prepare($req);
        $selectAll->bindParam(':id', $id, PDO::PARAM_INT);
        $selectAll->execute();
        $user = $selectAll->fetch(PDO::FETCH_ASSOC);
        return new User($user);
    }
    public function getUserList()
    {
        $userList = [];
        $req = 'SELECT * FROM User';
        $selectAll = $this->db->prepare($req);
        $selectAll->execute();
        while ($user = $selectAll->fetch(PDO::FETCH_ASSOC))
        {
            $userList[] = new User($user);
        }
        return $userList;
    }
    public function countUser()
    {
        $req = 'SELECT count(*) FROM User';
        $count = $this->db->prepare($req);
        $count->execute();
        return $count->fetchColumn();
    }
}