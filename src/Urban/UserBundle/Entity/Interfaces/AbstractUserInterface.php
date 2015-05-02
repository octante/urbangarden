<?php
/*
 * This file is part of the UrbanGarden package.
 *
 * (c) Issel Guberna <issel.guberna@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Urban\UserBundle\Entity\Interfaces;


interface AbstractUserInterface
{
    public function setUpdatedAt();
    public function getUpdatedAt();
    public function setCreatedAt($createdAt);
    public function getCreatedAt();
    public function setEmail($email);
    public function getEmail();
    public function setId($id);
    public function getId();
    public function setIsActive($isActive);
    public function getIsActive();
    public function setLastLogin($lastLogin);
    public function getLastLogin();
    public function setName($name);
    public function getName();
    public function setSurname($surname);
    public function getSurname();
    public function getUsername();
    public function setPassword($password);
    public function getPassword();
    public function getFullName();
} 