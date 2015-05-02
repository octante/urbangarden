<?php
/*
 * This file is part of the UrbanGarden package.
 *
 * (c) Issel Guberna <issel.guberna@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Urban\UserBundle\Entity;


use Symfony\Component\Security\Core\User\UserInterface;
use Urban\UserBundle\Entity\Interfaces\AbstractUserInterface;

abstract class AbstractUser
    implements UserInterface, AbstractUserInterface
{
    /**
     * User Id
     *
     * @var int
     */
    protected $id;

    /**
     * User creation date
     *
     * @var \Datetime
     */
    protected $createdAt;

    /**
     * Last user data update
     *
     * @var \Datetime
     */
    protected $updatedAt;

    /**
     * Last login from user
     *
     * @var \Datetime
     */
    protected $lastLogin;

    /**
     * User password
     *
     * @var string
     */
    protected $password;

    /**
     * True if user has activated his account, false otherwise.
     *
     * @var boolean
     */
    protected $isActive;

    /**
     * User name
     *
     * @var string
     */
    protected $name;

    /**
     * User surname
     *
     * @var string
     */
    protected $surname;

    /**
     * User email account
     *
     * @var string
     */
    protected $email;

    /**
     * Updates user updated date when user is persisted or updated
     */
    public function setUpdatedAt()
    {
        $this->updatedAt = new \Datetime();
    }

    /**
     * @return \Datetime $updatedAt
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param \Datetime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return \Datetime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param boolean $isActive
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    }

    /**
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * @param \Datetime $lastLogin
     */
    public function setLastLogin($lastLogin)
    {
        $this->lastLogin = $lastLogin;
    }

    /**
     * @return \Datetime
     */
    public function getLastLogin()
    {
        return $this->lastLogin;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $surname
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    /**
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->email;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @inheritdoc
     */
    public function getSalt()
    {
        return "";
    }

    public function eraseCredentials(){}

    /**
     * Get user full name
     *
     * @return string Full name
     */
    public function getFullName()
    {
        return trim($this->name . ' ' . $this->surname);
    }

    /**
     * String representation of the Customer
     *
     * @return string
     */
    public function __toString()
    {
        return $this->getFullName();
    }
}