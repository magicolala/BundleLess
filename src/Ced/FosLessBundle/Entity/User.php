<?php

namespace Ced\FosLessBundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface;

use Doctrine\ORM\Mapping as ORM;

/**
* User
*
* @ORM\Table(name="user")
* @ORM\Entity(repositoryClass="Ced\FosLessBundle\Repository\UserRepository")
*/
class User implements UserInterface
{
    /**
    * @var int
    *
    * @ORM\Column(name="id", type="integer")
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    */
    private $id;

    /**
    * @var string
    *
    * @ORM\Column(name="name", type="string", length=255, nullable=true)
    */
    private $name;

    /**
    * @var string
    *
    * @ORM\Column(name="email", type="string", length=255, nullable=true)
    */
    private $email;

    /**
    * @var string
    *
    * @ORM\Column(name="username", type="string", length=255, nullable=true, unique=true)
    */
    private $username;

    /**
    * @var string
    *
    * @ORM\Column(name="roles", type="string", length=255, nullable=true)
    */
    private $roles;

    /**
    * @var string
    *
    * @ORM\Column(name="password", type="string", length=255, nullable=true)
    */
    private $password;

    /**
    * @var string
    *
    * @ORM\Column(name="salt", type="string", length=255, nullable=true)
    */
    private $salt;


    /**
    * Get id
    *
    * @return integer
    */
    public function getId()
    {
        return $this->id;
    }

    /**
    * Set name
    *
    * @param string $name
    * @return User
    */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
    * Get name
    *
    * @return string
    */
    public function getName()
    {
        return $this->name;
    }

    /**
    * Set email
    *
    * @param string $email
    * @return User
    */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
    * Get email
    *
    * @return string
    */
    public function getEmail()
    {
        return $this->email;
    }

    /**
    * Set username
    *
    * @param string $username
    * @return User
    */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
    * Get username
    *
    * @return string
    */
    public function getUsername()
    {
        return $this->username;
    }

    /**
    * Set roles
    *
    * @param string $roles
    * @return User
    */
    public function setRoles($roles)
    {
        $this->roles = $roles;

        return $this;
    }

    /**
    * Get roles
    *
    * @return string
    */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
    * Set password
    *
    * @param string $password
    * @return User
    */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
    * Get password
    *
    * @return string
    */
    public function getPassword()
    {
        return $this->password;
    }

    /**
    * Set salt
    *
    * @param string $salt
    * @return User
    */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
    * Get salt
    *
    * @return string
    */
    public function getSalt()
    {
        return $this->salt;
    }

    public function __construct() {
        // De base, on va attribuer au nouveau utilisateur, le rôle « ROLE_USER »
        $this->roles = array("ROLE_USER");
        // Chaque utilisateur va se voir attribuer une clé permettant
        // de saler son mot de passe. Cela n'est pas obligatoire,
        // on pourrait mettre $salt à null
        $this->salt = base_convert(sha1(uniqid(mt_rand(), true)), 16, 36);
    }

    public function eraseCredentials() {
        // Ici nous n'avons rien à effacer.
        // Cela aurait été le cas si nous avions un mot de passe en clair.
    }
}
