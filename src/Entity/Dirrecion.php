<?php

namespace App\Entity;

use App\Repository\DirrecionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DirrecionRepository::class)
 */
class Dirrecion
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
    private $calle;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numero;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $puertaPisoEscalera;

    /**
     * @ORM\Column(type="integer")
     */
    private $codPostal;

    /**
     * @ORM\ManyToOne(targetEntity=Cliente::class, inversedBy="direcciones")
     * @ORM\JoinColumn(nullable=false)
     */
    private $cliente;

    /**
     * @ORM\OneToMany(targetEntity=Cliente::class, mappedBy="pedido")
     */
    private $clientes;

    /**
     * @ORM\OneToOne(targetEntity=Municipios::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $municipio;

    /**
     * @ORM\OneToOne(targetEntity=Provincias::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $provincia;

    public function __construct()
    {
        $this->clientes = new ArrayCollection();
    }



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCalle(): ?string
    {
        return $this->calle;
    }

    public function setCalle(string $calle): self
    {
        $this->calle = $calle;

        return $this;
    }

    public function getNumero(): ?string
    {
        return $this->numero;
    }

    public function setNumero(string $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getPuertaPisoEscalera(): ?string
    {
        return $this->puertaPisoEscalera;
    }

    public function setPuertaPisoEscalera(?string $puertaPisoEscalera): self
    {
        $this->puertaPisoEscalera = $puertaPisoEscalera;

        return $this;
    }

    public function getCodPostal(): ?int
    {
        return $this->codPostal;
    }

    public function setCodPostal(int $codPostal): self
    {
        $this->codPostal = $codPostal;

        return $this;
    }

    public function getCliente(): ?Cliente
    {
        return $this->cliente;
    }

    public function setCliente(?Cliente $cliente): self
    {
        $this->cliente = $cliente;

        return $this;
    }

    /**
     * @return Collection<int, Cliente>
     */
    public function getClientes(): Collection
    {
        return $this->clientes;
    }

    public function addCliente(Cliente $cliente): self
    {
        if (!$this->clientes->contains($cliente)) {
            $this->clientes[] = $cliente;
            $cliente->setPedido($this);
        }

        return $this;
    }

    public function removeCliente(Cliente $cliente): self
    {
        if ($this->clientes->removeElement($cliente)) {
            // set the owning side to null (unless already changed)
            if ($cliente->getPedido() === $this) {
                $cliente->setPedido(null);
            }
        }

        return $this;
    }

    public function getMunicipio(): ?Municipios
    {
        return $this->municipio;
    }

    public function setMunicipio(Municipios $municipio): self
    {
        $this->municipio = $municipio;

        return $this;
    }

    public function getProvincia(): ?Provincias
    {
        return $this->provincia;
    }

    public function setProvincia(Provincias $provincia): self
    {
        $this->provincia = $provincia;

        return $this;
    }


}
