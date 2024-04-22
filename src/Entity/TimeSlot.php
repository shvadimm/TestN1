<?php

namespace App\Entity;

use App\Repository\TimeSlotRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TimeSlotRepository::class)]
class TimeSlot
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE)]
    private ?\DateTimeImmutable $date = null;

    #[ORM\Column(type: Types::TIME_IMMUTABLE)]
    private ?\DateTimeImmutable $start_time = null;

    #[ORM\Column]
    private ?int $duration = null;

    /**
     * @var Collection<int, Reservation>
     */
    #[ORM\OneToMany(targetEntity: Reservation::class, mappedBy: 'timeSlot')]
    private Collection $reservations;

    public function __construct()
    {
        $this->reservations = new ArrayCollection();
    }

    public function getTimeSummary() {
        return sprintf("%s - %s (%dh)",
            $this->start_time->format('H:i'),
            ($this->duration + (int)$this->start_time->format('H')).':'.$this->start_time->format('i'),
            $this->duration,
        );
    }

    public function __toString() {
        return sprintf("%s %s - %s (%dh)",
            $this->date->format('d/m/Y'),
            $this->start_time->format('H:i'),
            ($this->duration + (int)$this->start_time->format('H')).':'.$this->start_time->format('i'),
            $this->duration,
        );
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeImmutable
    {
        return $this->date;
    }

    public function setDate(\DateTimeImmutable $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function setDuration(int $duration): static
    {
        $this->duration = $duration;

        return $this;
    }

    public function getStartTime(): ?\DateTimeImmutable
    {
        return $this->start_time;
    }

    public function setStartTime(\DateTimeImmutable $start_time): static
    {
        $this->start_time = $start_time;

        return $this;
    }

    /**
     * @return Collection<int, Reservation>
     */
    public function getReservations(): Collection
    {
        return $this->reservations;
    }

    public function addReservation(Reservation $reservation): static
    {
        if (!$this->reservations->contains($reservation)) {
            $this->reservations->add($reservation);
            $reservation->setTimeSlot($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): static
    {
        if ($this->reservations->removeElement($reservation)) {
            // set the owning side to null (unless already changed)
            if ($reservation->getTimeSlot() === $this) {
                $reservation->setTimeSlot(null);
            }
        }

        return $this;
    }
}
