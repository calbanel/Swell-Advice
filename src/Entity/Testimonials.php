<?php

namespace App\Entity;

use App\Repository\TestimonialsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TestimonialsRepository::class)
 */
class Testimonials
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
    private $surferName;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="time")
     */
    private $duration;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $spot;

    /**
     * @ORM\Column(type="json")
     */
    private $pollution = [];

    /**
     * @ORM\Column(type="integer")
     */
    private $swimmerNb;

    /**
     * @ORM\Column(type="integer")
     */
    private $fishingBoatNb;

    /**
     * @ORM\Column(type="integer")
     */
    private $leisureBoatNb;

    /**
     * @ORM\Column(type="integer")
     */
    private $sailingBoatNb;

    /**
     * @ORM\Column(type="integer")
     */
    private $others;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSurferName(): ?string
    {
        return $this->surferName;
    }

    public function setSurferName(string $surferName): self
    {
        $this->surferName = $surferName;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getDuration(): ?\DateTimeInterface
    {
        return $this->duration;
    }

    public function setDuration(\DateTimeInterface $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    public function getSpot(): ?string
    {
        return $this->spot;
    }

    public function setSpot(string $spot): self
    {
        $this->spot = $spot;

        return $this;
    }

    public function getPollution(): ?array
    {
        return $this->pollution;
    }

    public function setPollution(array $pollution): self
    {
        $this->pollution = $pollution;

        return $this;
    }

    public function getSwimmerNb(): ?string
    {
        return $this->swimmerNb;
    }

    public function setSwimmerNb(string $swimmerNb): self
    {
        $this->swimmerNb = $swimmerNb;

        return $this;
    }

    public function getFishingBoatNb(): ?int
    {
        return $this->fishingBoatNb;
    }

    public function setFishingBoatNb(int $fishingBoatNb): self
    {
        $this->fishingBoatNb = $fishingBoatNb;

        return $this;
    }

    public function getLeisureBoatNb(): ?int
    {
        return $this->leisureBoatNb;
    }

    public function setLeisureBoatNb(int $leisureBoatNb): self
    {
        $this->leisureBoatNb = $leisureBoatNb;

        return $this;
    }

    public function getSailingBoatNb(): ?int
    {
        return $this->sailingBoatNb;
    }

    public function setSailingBoatNb(int $sailingBoatNb): self
    {
        $this->sailingBoatNb = $sailingBoatNb;

        return $this;
    }

    public function getOthers(): ?int
    {
        return $this->others;
    }

    public function setOthers(int $others): self
    {
        $this->others = $others;

        return $this;
    }
}
