<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="tb_person")
 * @ORM\Entity(repositoryClass="App\Repository\PersonRepository")
 */
class Person
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=11, unique=false)
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=100, unique=false)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=200, unique=false)
     */
    private $photo;


    /**
     * @ORM\Column(type="json")
     */
    private $skills = [];

    /**
     * @ORM\Column(type="string", length=11, unique=false)
     */
    private $cpf;

    /**
     * @ORM\Column(type="string", length=100, unique=false)
     */
    private $bankName;

    /**
     * @ORM\Column(type="string", length=10, unique=false)
     */
    private $agency;

    /**
     * @ORM\Column(type="string", length=10, unique=false)
     */
    private $account;

    /**
     * @var User
     *
     * @ORM\OneToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @return mixed
     */
    public function getSkills()
    {
        return $this->skills;
    }

    /**
     * @return mixed
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * @return mixed
     */
    public function getBankName()
    {
        return $this->bankName;
    }

    /**
     * @return mixed
     */
    public function getAgency()
    {
        return $this->agency;
    }

    /**
     * @return mixed
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @param mixed $photo
     */
    public function setPhoto($photo): void
    {
        $this->photo = $photo;
    }

    /**
     * @param mixed $skills
     */
    public function setSkills($skills): void
    {
        $this->skills = $skills;
    }

    /**
     * @param mixed $cpf
     */
    public function setCpf($cpf): void
    {
        $this->cpf = $cpf;
    }

    /**
     * @param mixed $bankName
     */
    public function setBankName($bankName): void
    {
        $this->bankName = $bankName;
    }

    /**
     * @param mixed $agency
     */
    public function setAgency($agency): void
    {
        $this->agency = $agency;
    }

    /**
     * @param mixed $account
     */
    public function setAccount($account): void
    {
        $this->account = $account;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }


}
