<?php
namespace CGB\Relax5core\Domain\Model;

/***
 *
 * This file is part of the "relax5core" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2017 Christoph Balogh <cb@lustige-informatik.at>
 *
 ***/

/**
 * Appointment
 */
class Appointment extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * Person
     *
     * @var \CGB\Relax5core\Domain\Model\Person
     */
    protected $person = null;

    /**
     * Company
     *
     * @var \CGB\Relax5core\Domain\Model\Company
     */
    protected $company = null;

    /**
     * @var DateTime
     */
    protected $crdate = null;

    /**
     * @var DateTime
     */
    protected $tstamp = null;

    /**
     * forceSync
     * not persisted, will force sync with exchange
     *
     * @var bool $forceSync
     */
    protected $forceSync = false;

    /**
     * Date
     *
     * @var \DateTime
     * @validate NotEmpty
     */
    protected $date = null;

    /**
     * Subject
     *
     * @var string
     * @validate NotEmpty
     */
    protected $subject = '';

    /**
     * Duration
     *
     * @var int
     */
    protected $duration = 0;

    /**
     * Details
     *
     * @var string
     */
    protected $details = '';

    /**
     * Appointment Type
     *
     * @var int
     */
    protected $appointmentType = 0;

    /**
     * Appointment Status
     *
     * @var int
     */
    protected $appointmentStatus = 0;

    /**
     * Priority
     *
     * @var int
     */
    protected $priority = 0;

    /**
     * MSOLID
     *
     * @var string
     */
    protected $msolid = '';

    /**
     * Permissions
     *
     * @var int
     */
    protected $permissions = 0;

    /**
     * Name
     *
     * @var string
     */
    protected $name = '';

    /**
     * Address
     *
     * @var string
     */
    protected $address = '';

    /**
     * Contact
     *
     * @var string
     */
    protected $contact = '';

    /**
     * Result
     *
     * @var int
     */
    protected $result = 0;

    /**
     * Result Text
     *
     * @var string
     */
    protected $resultText = '';

    /**
     * Next Action
     *
     * @var int
     */
    protected $nextAction = 0;

    /**
     * Next Action Text
     *
     * @var string
     */
    protected $nextActionText = '';

    /**
     * Contact State
     *
     * @var int
     */
    protected $contactState = 0;

    /**
     * Task
     *
     * @var int
     */
    protected $task = 0;

    /**
     * Postponed Counter
     *
     * @var int
     */
    protected $postponedCounter = 0;

    /**
     * Subject Original
     *
     * @var string
     */
    protected $subjectOrig = 0;

    /**
     * Done
     *
     * @var \DateTime
     */
    protected $done = null;

    /**
     * Owner
     *
     * @var \CGB\Relax5core\Domain\Model\Owner
     * @lazy
     */
    protected $owner = null;

    /**
     * Usergroup
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FrontendUserGroup
     * @lazy
     */
    protected $usergroup = null;

    /**
     * Creator
     *
     * @var \CGB\Relax5core\Domain\Model\Owner
     * @lazy
     */
    protected $creator = null;

    /**
     * Creator
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5core\Domain\Model\Owner>
     * @lazy
     */
    protected $attendees = null;

    /**
     * Returns the date
     *
     * @return \DateTime $date
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Sets the date
     *
     * @param \DateTime $date
     * @return void
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * Returns the subject
     *
     * @return string $subject
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Sets the subject
     *
     * @param string $subject
     * @return void
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    /**
     * Returns the duration
     *
     * @return int $duration
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Sets the duration
     *
     * @param int $duration
     * @return void
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
    }

    /**
     * Returns the details
     *
     * @return string $details
     */
    public function getDetails()
    {
        return $this->details;
    }

    /**
     * Sets the details
     *
     * @param string $details
     * @return void
     */
    public function setDetails($details)
    {
        $this->details = $details;
    }

    /**
     * Returns the appointmentType
     *
     * @return int $type
     */
    public function getAppointmentType()
    {
        return $this->appointmentType;
    }

    /**
     * Sets the appointmentType
     *
     * @param int $appointmentType
     * @return void
     */
    public function setAppointmentType($appointmentType)
    {
        $this->appointmentType = $appointmentType;
    }

    /**
     * Returns the appointmentStatus
     *
     * @return int $appointmentStatus
     */
    public function getAppointmentStatus()
    {
        return $this->appointmentStatus;
    }

    /**
     * Sets the appointmentStatus
     *
     * @param int $appointmentStatus
     * @return void
     */
    public function setAppointmentStatus($appointmentStatus)
    {
        $this->appointmentStatus = $appointmentStatus;
    }

    /**
     * Returns the priority
     *
     * @return int $priority
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * Sets the priority
     *
     * @param int $priority
     * @return void
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;
    }

    /**
     * Returns the msolid
     *
     * @return string $msolid
     */
    public function getMsolid()
    {
        return $this->msolid;
    }

    /**
     * Sets the msolid
     *
     * @param string $msolid
     * @return void
     */
    public function setMsolid($msolid)
    {
        $this->msolid = $msolid;
    }

    /**
     * Returns the permissions
     *
     * @return int $permissions
     */
    public function getPermissions()
    {
        return $this->permissions;
    }

    /**
     * Sets the permissions
     *
     * @param int $permissions
     * @return void
     */
    public function setPermissions($permissions)
    {
        $this->permissions = $permissions;
    }

    /**
     * Returns the name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the name
     *
     * @param string $name
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Returns the address
     *
     * @return string $address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Sets the address
     *
     * @param string $address
     * @return void
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * Returns the contact
     *
     * @return string $contact
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * Sets the contact
     *
     * @param string $contact
     * @return void
     */
    public function setContact($contact)
    {
        $this->contact = $contact;
    }

    /**
     * Returns the result
     *
     * @return int $result
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * Sets the result
     *
     * @param int $result
     * @return void
     */
    public function setResult($result)
    {
        $this->result = $result;
    }

    /**
     * Returns the contactState
     *
     * @return int $contactState
     */
    public function getContactState()
    {
        return $this->contactState;
    }

    /**
     * Sets the contactState
     *
     * @param int $contactState
     * @return void
     */
    public function setContactState($contactState)
    {
        $this->contactState = $contactState;
    }

    /**
     * Returns the task
     *
     * @return int $task
     */
    public function getTask()
    {
        return $this->task;
    }

    /**
     * Sets the task
     *
     * @param int $task
     * @return void
     */
    public function setTask($task)
    {
        $this->task = $task;
    }

    /**
     * @return \CGB\Relax5core\Domain\Model\Person
     */
    function getPerson()
    {
        return $this->person;
    }

    /**
     * @param \CGB\Relax5core\Domain\Model\Person $person
     */
    function setPerson($person)
    {
        $this->person = $person;
    }

    /**
     * @return \CGB\Relax5core\Domain\Model\Company
     */
    function getCompany()
    {
        return $this->company;
    }

    /**
     * @param \CGB\Relax5core\Domain\Model\Company $company
     */
    function setCompany($company)
    {
        $this->company = $company;
    }

    /**
     * Returns the owner
     *
     * @return \CGB\Relax5core\Domain\Model\Owner $owner
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Sets the owner
     *
     * @param \CGB\Relax5core\Domain\Model\Owner $owner
     * @return void
     */
    public function setOwner($owner)
    {
        $this->owner = $owner;
    }

    /**
     * Returns the usergroup
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FrontendUserGroup $usergroup
     */
    public function getUsergroup()
    {
        return $this->usergroup;
    }

    /**
     * Sets the usergroup
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FrontendUserGroup $usergroup
     * @return void
     */
    public function setUsergroup($usergroup)
    {
        $this->usergroup = $usergroup;
    }

    /**
     * Returns the creator
     *
     * @return \CGB\Relax5core\Domain\Model\Owner $creator
     */
    public function getCreator()
    {
        return $this->creator;
    }

    /**
     * Sets the creator
     *
     * @param \CGB\Relax5core\Domain\Model\Owner $creator
     * @return void
     */
    public function setCreator(\CGB\Relax5core\Domain\Model\Owner $creator)
    {
        $this->creator = $creator;
    }

    /**
     * Returns pastOrFuture
     * -1 if appointment is past and NOT cancelled or done
     * 0 if appointment is past and done
     * +1 if appointment is in the future
     *
     * @return int
     */
    public function getPastOrFuture()
    {
        $now = new \DateTime();
        if ($this->date <= $now && $this->appointmentStatus <= 2) {
            return -1;
        } elseif ($this->date <= $now) {
            return 0;
        } else {
            return 1;
        }
    }

    /**
     * Returns the postponedCounter
     *
     * @return int $postponedCounter
     */
    public function getPostponedCounter()
    {
        return $this->postponedCounter;
    }

    /**
     * Sets the postponedCounter
     *
     * @param int $postponedCounter
     * @return void
     */
    public function setPostponedCounter($postponedCounter)
    {
        $this->postponedCounter = $postponedCounter;
    }

    /**
     * @return int
     */
    public function getNextAction()
    {
        return $this->nextAction;
    }

    /**
     * @param int $nextAction
     */
    public function setNextAction($nextAction)
    {
        $this->nextAction = $nextAction;
    }

    /**
     * @return DateTime
     */
    public function getCrdate()
    {
        return $this->crdate;
    }

    /**
     * @return DateTime
     */
    public function getTstamp()
    {
        return $this->tstamp;
    }

    /**
     * @return array
     */
    public function getExchangeDataArray()
    {
        $details = '';
        if ($this->person) {
            $details .= $this->person->getUid() . ': ' . $this->person->getLastName() . ' ' . $this->person->getFirstName() . '

';
            foreach ($this->person->getContacts() as $contact) {
                $details .= ($contact->getType() ? $contact->getType()->getName() : '') . ': ' . $contact->getContact() . '
';
            }
            $details .= '
';
            foreach ($this->person->getAddresses() as $address) {
                $details .= $address->getAddressCompound() . '
';
            }
        }
        if ($this->company) {
            $details .= $this->company->getUid() . ': ' . $this->company->getShortName() . ' ' . $this->company->getName() . '

 ';
            foreach ($this->company->getContacts() as $contact) {
                $details .= ($contact->getType() ? $contact->getType()->getName() : '') . ': ' . $contact->getContact() . '
';
            }
            $details .= '
';
            foreach ($this->company->getAddresses() as $address) {
                $details .= $address->getAddressCompound() . '
';
            }
        }
        $details .= '
----
' . trim(strip_tags($this->details));
        $subjectAddendum = ': ' . ($this->person ? $this->person->getNameCompound() : '') . ($this->company ? $this->company->getNameCompound() : ' [#') . $this->getUid() . ']';
        if ($this->attendees->count() > 0) {
            $meetingInvitations = 'SendToAllAndSaveCopy';
            foreach ($this->attendees as $attendee) {
                $attendees[] = $attendee->getEmail();
            }
        } else {
            $meetingInvitations = 'SendToNone';
            $attendees = null;
        }
        return [
            'subject' => $this->subject . $subjectAddendum,
            'start' => $this->date ? $this->date->getTimestamp() : 0,
            'end' => ($this->date ? $this->date->getTimestamp() : 0) + $this->duration,
            'location' => $this->address,
            'body' => $details,
            'meetingInvitations' => $meetingInvitations,
            'folder' => 'calendar',
            'freeBusyStatus' => 'Busy',
            'category' => 'webRelax',
            'isAllDayEvent' => false,
            'bodyType' => 'Text',
            'attendees' => $attendees,
            'msolid' => $this->msolid
        ];
    }

    /**
     * @param \CGB\Relax5core\Domain\Model\Appointment $appointment
     */
    public function setExchange(\CGB\Relax5core\Domain\Model\Appointment $appointment)
    {
        \CGB\Relax5core\Service\DivService::syncWithExchange($appointment);
    }

    /**
     * __construct
     */
    public function __construct()
    {
        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }

    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     *
     * @return void
     */
    protected function initStorageObjects()
    {
        $this->attendees = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Adds a Owner
     *
     * @param \CGB\Relax5core\Domain\Model\Owner $attendee
     * @return void
     */
    public function addAttendee(\CGB\Relax5core\Domain\Model\Owner $attendee)
    {
        $this->attendees->attach($attendee);
    }

    /**
     * Removes a Owner
     *
     * @param \CGB\Relax5core\Domain\Model\Owner $attendeeToRemove The Owner to be removed
     * @return void
     */
    public function removeAttendee(\CGB\Relax5core\Domain\Model\Owner $attendeeToRemove)
    {
        $this->attendees->detach($attendeeToRemove);
    }

    /**
     * Returns the attendees
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5core\Domain\Model\Owner> $attendees
     */
    public function getAttendees()
    {
        return $this->attendees;
    }

    /**
     * Sets the attendees
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5core\Domain\Model\Owner> $attendees
     * @return void
     */
    public function setAttendees(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $attendees)
    {
        $this->attendees = $attendees;
    }

    /**
     * Returns the subjectOrig
     *
     * @return string subjectOrig
     */
    public function getSubjectOrig()
    {
        return $this->subjectOrig;
    }

    /**
     * Sets the subjectOrig
     *
     * @param string $subjectOrig
     * @return void
     */
    public function setSubjectOrig($subjectOrig)
    {
        $this->subjectOrig = $subjectOrig;
    }

    /**
     * @param bool $forceSync
     */
    function setForceSync($forceSync)
    {
        $this->forceSync = $forceSync;
    }

    /**
     * @return bool
     */
    function getForceSync()
    {
        return $this->forceSync;
    }

    /**
     * Returns the done
     *
     * @return \DateTime $done
     */
    public function getDone()
    {
        return $this->done;
    }

    /**
     * Sets the done
     *
     * @param \DateTime $done
     * @return void
     */
    public function setDone(\DateTime $done)
    {
        $this->done = $done;
    }

    /**
     * Returns the resultText
     *
     * @return string $resultText
     */
    public function getResultText()
    {
        return $this->resultText;
    }

    /**
     * Sets the resultText
     *
     * @param string $resultText
     * @return void
     */
    public function setResultText($resultText)
    {
        $this->resultText = $resultText;
    }

    /**
     * Returns the nextActionText
     *
     * @return string $nextActionText
     */
    public function getNextActionText()
    {
        return $this->nextActionText;
    }

    /**
     * Sets the nextActionText
     *
     * @param string $nextActionText
     * @return void
     */
    public function setNextActionText($nextActionText)
    {
        $this->nextActionText = $nextActionText;
    }
}
