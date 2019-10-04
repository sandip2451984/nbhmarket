<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=180, unique=false)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=180, unique=false)
     */
    private $surname;

    /**
     * @ORM\Column(type="date", unique=false)
     */
    private $dateOfBirth;

    /**
     * @ORM\Column(type="string", length=15, unique=false)
     */
    private $phoneNumber;

    /**
     * @ORM\Column(type="text", unique=false, nullable=true)
     */
    private $address = "Test Address";

    /**
     * @ORM\Column(type="string", length=2, unique=false, nullable=true)
     */
    private $country = "IN";

    /**
     * @ORM\Column(type="string", length=180, unique=true, nullable=true)
     */
    private $tradingAccountNumber = "00010115";

    /**
     * @ORM\Column(type="float", unique=false, nullable=true)
     */
    private $balance=100.50;

    /**
     * @ORM\Column(type="integer", unique=false, nullable=true)
     */
    private $openTrades=3;

    /**
     * @ORM\Column(type="integer", unique=false, nullable=true)
     */
    private $closeTrades=5;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(max = 4096)
     */
    public $plainPassword;

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    public function setPlainPassword($password)
    {
        $this->plainPassword = $password;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        $this->plainPassword = null;
    }

    /**
     * Set name.
     *
     * @param string $name
     *
     * @return User
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set surname.
     *
     * @param string $surname
     *
     * @return User
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get surname.
     *
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set dateOfBirth.
     *
     * @param \DateTime $dateOfBirth
     *
     * @return User
     */
    public function setDateOfBirth($dateOfBirth)
    {
        $this->dateOfBirth = $dateOfBirth;

        return $this;
    }

    /**
     * Get dateOfBirth.
     *
     * @return \DateTime
     */
    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }

    /**
     * Set phoneNumber.
     *
     * @param string $phoneNumber
     *
     * @return User
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * Get phoneNumber.
     *
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Set address.
     *
     * @param string $address
     *
     * @return User
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address.
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set country.
     *
     * @param int $country
     *
     * @return User
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country.
     *
     * @return int
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set tradingAccountNumber.
     *
     * @param string $tradingAccountNumber
     *
     * @return User
     */
    public function setTradingAccountNumber($tradingAccountNumber)
    {
        $this->tradingAccountNumber = $tradingAccountNumber;

        return $this;
    }

    /**
     * Get tradingAccountNumber.
     *
     * @return string
     */
    public function getTradingAccountNumber()
    {
        return $this->tradingAccountNumber;
    }

    /**
     * Set balance.
     *
     * @param float $balance
     *
     * @return User
     */
    public function setBalance($balance)
    {
        $this->balance = $balance;

        return $this;
    }

    /**
     * Get balance.
     *
     * @return float
     */
    public function getBalance()
    {
        return $this->balance;
    }

    /**
     * Set openTrades.
     *
     * @param int $openTrades
     *
     * @return User
     */
    public function setOpenTrades($openTrades)
    {
        $this->openTrades = $openTrades;

        return $this;
    }

    /**
     * Get openTrades.
     *
     * @return int
     */
    public function getOpenTrades()
    {
        return $this->openTrades;
    }

    /**
     * Set closeTrades.
     *
     * @param int $closeTrades
     *
     * @return User
     */
    public function setCloseTrades($closeTrades)
    {
        $this->closeTrades = $closeTrades;

        return $this;
    }

    /**
     * Get closeTrades.
     *
     * @return int
     */
    public function getCloseTrades()
    {
        return $this->closeTrades;
    }
}
