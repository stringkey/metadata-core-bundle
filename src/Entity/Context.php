<?php declare(strict_types=1);

namespace Stringkey\MetadataCoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Stringkey\MetadataCoreBundle\Repository\ContextRepository;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Table(name: 'context')]
#[ORM\Entity(repositoryClass: ContextRepository::class)]

class Context
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    protected ?int $id;

    #[ORM\Column(name: 'name', type: 'string')]
    #[Assert\NotBlank(message: 'Name should not be blank')]
    protected string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function setId($id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function __toString()
    {
        return $this->name;
    }
}
