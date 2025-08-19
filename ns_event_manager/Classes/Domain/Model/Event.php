<?php

declare(strict_types=1);

namespace NITSAN\NsEventManager\Domain\Model;

use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use TYPO3\CMS\Extbase\Annotation\ORM as Extbase;
use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3\CMS\Extbase\Annotation\Validate;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use NITSAN\NsEventManager\Domain\Validator\TitleValidator;
use NITSAN\NsEventManager\Domain\Validator\ModeValidator;


/**
 * This file is part of the "EventCrud" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2025 
 */

/**
 * text
 */
class Event extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * title
     *
     * @var string
     * 
     */
    #[Validate(['validator' => 'NotEmpty'])]
  #[Validate([
        'validator' => 'RegularExpression',
        'options' => [
            'regularExpression' => '/^[a-z0-9]+$/i'
        ]
    ])]
      #[Validate([
        'validator' => TitleValidator::class,
    ])]

    // VALIDATION 1 :CONTINUE ONLY IF NAME CONTAINS 0-9 OR A-Z CHARACTER.NO SPACE ,NO COMMA.
    protected $title = null;
      /**
     * name
     *
     * @var string   
     */
    protected $name = '';


    /**
     * Sets the name
     *
     * @param string $name
     * @return void
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * description
     *
     * @var string
     */
    #[Validate(['validator' => 'NotEmpty'])]
     #[Validate([
        'validator' => 'StringLength',
        'options' => ['minimum' => 1],
    ])]
    
    //VALIDATION 2:  DESCRIPTION MUST CONTAIN MORE THAN 100 CHARACTERS
    protected $description = null;

    /**
     * organizerName
     *
     * @var string
     */
    #[Validate(['validator' => 'NotEmpty'])]
  
    protected $organizerName = null;
    public function getName()
    {
        return $this->name;
    }

    /**
     * mode
     *
     * @var string
     */
    #[Validate(['validator' => 'NotEmpty'])]
    #[Validate([
        'validator' => ModeValidator::class,
    ])]
    protected $mode = null;

    /**
     * location
     *
     * @var \NITSAN\NsEventManager\Domain\Model\Location
     */
    protected $location = null;

    /**
     * Returns the title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the title
     *
     * @param string $title
     * @return void
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * Returns the description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the description
     *
     * @param string $description
     * @return void
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    /**
     * Returns the organizerName
     *
     * @return string
     */
    public function getOrganizerName()
    {
        return $this->organizerName;
    }

    /**
     * Sets the organizerName
     *
     * @param string $organizerName
     * @return void
     */
    public function setOrganizerName(string $organizerName)
    {
        $this->organizerName = $organizerName;
    }
    /**
     * image
     *
     * @var FileReference
     */
    protected $image = null;
    

    /**
     * Returns the mode
     *
     * @return string
     */
    public function getMode()
    {
        return $this->mode;
    }

    /**
     * Sets the mode
     *
     * @param string $mode
     * @return void
     */
    public function setMode(string $mode)
    {
        $this->mode = $mode;
    }

    /**
     * Returns the location
     *
     * @return \NITSAN\NsEventManager\Domain\Model\Location
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Sets the location
     *
     * @param \NITSAN\NsEventManager\Domain\Model\Location $location
     * @return void
     */
    public function setLocation(\NITSAN\NsEventManager\Domain\Model\Location $location)
    {
        $this->location = $location;
    }
     /**
     * Returns the image
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    public function getImage():?FileReference
        {
        return $this->image;
    }
    /**
     * Sets the image
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
     * @return void
     */
    public function setImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $image)
    {
        $this->image = $image;
    }


    public function addImage(FileReference $image): void
    {
        $this->image->attach($image);
    }

    public function removeImage(FileReference $image): void
    {
        $this->image->detach($image);
    }

     public function findBySearch(string $term): QueryResultInterface
    {
        
        $query = $this->createQuery();
        if (!empty($term)) {
            $query->matching(
                $query->like('title', '%' . $term . '%')
            );
        }

        return $query->execute();
    }

}
