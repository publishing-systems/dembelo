<?php

/* Copyright (C) 2015 Michael Giesler
 *
 * This file is part of Dembelo.
 *
 * Dembelo is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Dembelo is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License 3 for more details.
 *
 * You should have received a copy of the GNU Affero General Public License 3
 * along with Dembelo. If not, see <http://www.gnu.org/licenses/>.
 *
 * @package DembeloMain
 */
namespace DembeloMain\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class ReadPath
 *
 * @MongoDB\Document
 */
class ReadPath
{

    /**
     * @MongoDB\Id
     */
    protected $id;

    /**
     * @MongoDB\ObjectId
     */
    protected $userId;

    /**
     * @MongoDB\ObjectId
     */
    protected $textnodeId;

    /**
     * @MongoDB\Date
     */
    protected $timestamp;

    /**
     * @MongoDB\ObjectId
     */
    protected $previousTextnodeId;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return mixed
     */
    public function getTextnodeId()
    {
        return $this->textnodeId;
    }

    /**
     * @param mixed $textnodeId
     */
    public function setTextnodeId($textnodeId)
    {
        $this->textnodeId = $textnodeId;
    }

    /**
     * @return mixed
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * @param mixed $timestamp
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
    }

    /**
     * @return mixed
     */
    public function getPreviousTextnodeId()
    {
        return $this->previousTextnodeId;
    }

    /**
     * @param mixed $previousTextnodeId
     */
    public function setPreviousTextnodeId($previousTextnodeId)
    {
        $this->previousTextnodeId = $previousTextnodeId;
    }
}
