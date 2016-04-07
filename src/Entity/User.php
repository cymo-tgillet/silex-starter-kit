<?php

namespace App\Entity;

use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\EntityListeners({"App\Listener\UserListener"})
 * @ORM\Table(name="users")
 */
class User implements UserInterface
{
    /** @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue(strategy="AUTO") **/
    private $id;

    /** @ORM\Column(type="datetime", name="created_at") **/
    private $createdAt;

    /** @ORM\Column(type="string", length=64, name="creator_ip") **/
    private $creatorIp;

    /** @ORM\Column(type="string", unique=true) **/
    private $email;

    /** @var  string */
    private $plainPassword;

    /** @ORM\Column(type="string", name="passwd") **/
    private $password;

    /** @ORM\Column(type="string", name="password_recovery_hash", nullable=true, unique=true) **/
    private $passwordRecoveryHash;


    public function __construct()
    {
    }

    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        // Entity
        $metadata->addConstraints([
            new UniqueEntity(['fields' => 'email']),
        ]);

        // Email
        $metadata->addPropertyConstraints('email', [
            new Assert\NotBlank(),
            new Assert\Email(),
        ]);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return User
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param mixed $createdAt
     * @return User
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreatorIp()
    {
        return $this->creatorIp;
    }

    /**
     * @param mixed $creatorIp
     * @return User
     */
    public function setCreatorIp($creatorIp)
    {
        $this->creatorIp = $creatorIp;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getRoles()
    {
        return array('ROLE_USER');
    }

    /**
     * @inheritdoc
     */
    public function getSalt()
    {
        return null;
    }

    /**
     * @inheritdoc
     */
    public function getUsername()
    {
        return $this->email;
    }

    /**
     * @inheritdoc
     */
    public function eraseCredentials()
    {
        $this->plainPassword = null;
    }

    /**
     * @return string
     */
    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    /**
     * @param string $plainPassword
     * @return $this
     */
    public function setPlainPassword($plainPassword)
    {
        $this->plainPassword = $plainPassword;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPasswordRecoveryHash()
    {
        return $this->passwordRecoveryHash;
    }

    /**
     * @param mixed $passwordRecoveryHash
     */
    public function setPasswordRecoveryHash($passwordRecoveryHash)
    {
        $this->passwordRecoveryHash = $passwordRecoveryHash;
    }
}
