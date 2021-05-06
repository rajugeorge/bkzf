<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User implements UserInterface, \Serializable
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $role;

    /**
     * @ORM\Column(type="datetime")
     */
    private $lastlogin;

    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }
    
    /*public function getRole(): ?string
    {
        return $this->role;
    }*/

    public function getRoles(){

        $role = $this->role;

        return [$role];
    }

    public function setRole(string $role): self
    {
        $this->role = $role;

        return $this;
    }

    /*public function getLastlogin(): ?\DateTimeInterface
    {
        return $this->lastlogin;
    }*/

    public function setLastlogin(): self
    {
        $this->lastlogin = new \DateTime("now");

        return $this;
    }

    public function getSalt(){}

    public function eraseCredentials(){}

    public function serialize(){
        return serialize([
            $this->id,
            $this->firstname,
            $this->lastname,
            $this->username,
            $this->password,
            $this->role,
            $this->email,
            $this->lastlogin,
        ]);
    }

    public function unserialize($serialized)
    {
        list(
            $this->id,
            $this->firstname,
            $this->lastname,
            $this->username,
            $this->password,
            $this->role,
            $this->email,
            $this->lastlogin,
        ) = unserialize($serialized, ['allowed_classes'=>false]);
    }


}
