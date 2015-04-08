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


class User
{
    /**
     * User Id
     *
     * @var int
     */
    private $id;

    /**
     * User creation date
     *
     * @var \Datetime
     */
    private $createdAt;

    /**
     * Last user data update
     *
     * @var \Datetime
     */
    private $updatedAt;

    /**
     * Last login from user
     *
     * @var \Datetime
     */
    private $lastLogin;

    /**
     * User password
     *
     * @var string
     */
    private $password;

    /**
     * True if user has activated his account, false otherwise.
     *
     * @var boolean
     */
    private $isActive;

    /**
     * User username
     *
     * @var string
     */
    private $username;

    /**
     * User name
     *
     * @var string
     */
    private $name;

    /**
     * User surname
     *
     * @var string
     */
    private $surname;

    /**
     * User email account
     *
     * @var string
     */
    private $email;

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
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = md5($password);
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }
}