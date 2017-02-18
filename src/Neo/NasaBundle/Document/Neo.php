<?php
/**
 * Created by PhpStorm.
 * User: tanushreepatra
 * Date: 16/2/17
 * Time: 8:25 PM
 */

namespace Neo\NasaBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Neo\NasaBundle\Traits\DocumentSerializer;

/**
 * @MongoDB\Document
 */
class Neo
{
    use DocumentSerializer;

    /**
     * @MongoDB\Id
     */
    protected $id;

    /**
     * @MongoDB\Field(type="date")
     */
    protected $date;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $reference;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $name;

    /**
     * @MongoDB\Field(type="float")
     */
    protected $speed;

    /**
     * @MongoDB\Field(type="boolean")
     */
    protected $hazardous;


    /**
     * Get id
     *
     * @return id $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set date
     *
     * @param date $date
     * @return $this
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * Get date
     *
     * @return date $date
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set reference
     *
     * @param string $reference
     * @return $this
     */
    public function setReference($reference)
    {
        $this->reference = $reference;
        return $this;
    }

    /**
     * Get reference
     *
     * @return string $reference
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set speed
     *
     * @param float $speed
     * @return $this
     */
    public function setSpeed($speed)
    {
        $this->speed = $speed;
        return $this;
    }

    /**
     * Get speed
     *
     * @return float $speed
     */
    public function getSpeed()
    {
        return $this->speed;
    }

    /**
     * Set hazardous
     *
     * @param boolean $hazardous
     * @return $this
     */
    public function setHazardous($hazardous)
    {
        $this->hazardous = $hazardous;
        return $this;
    }

    /**
     * Get hazardous
     *
     * @return boolean $hazardous
     */
    public function getHazardous()
    {
        return $this->hazardous;
    }
}
