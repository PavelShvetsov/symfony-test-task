<?php

namespace App\Entity;

use App\Entity\IpApi;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\IpInfoRepository")
 */
class IpInfo
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $city;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $country;
    /**
     * @ORM\Column(type="string", length=15 ,unique=true)
     */
    private $ip;
    /**
    * @ORM\Column(type="datetime", nullable=false)
    */
    private $dateCreated;

    function __construct(IpApi $ipApi)
    {
        $info = $ipApi->getInfo();
        $this->city = $info['city'];
        $this->country = $info['country'];
        $this->ip = $info['ip'];
        $this->dateCreated = new \Datetime("now");
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getIp()
    {
        return $this->ip;
    }

    public function setIp($ip)
    {
        $this->ip = $ip;
    }

    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;
    }

    public function update(IpApi $ipApi){
        $info = $ipApi->getInfo();
        $this->city = $info['city'];
        $this->country = $info['country'];
    }

}
