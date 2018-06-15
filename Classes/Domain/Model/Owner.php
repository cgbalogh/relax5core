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
 * Owner
 */
class Owner extends \TYPO3\CMS\Extbase\Domain\Model\FrontendUser
{
    /**
     * pwdChangeDate
     *
     * @var \DateTime
     */
    protected $pwdChangeDate = null;

    /**
     * Settings
     *
     * @var string
     */
    protected $settings = '';

    /**
     * Void
     *
     * @var bool
     */
    protected $void = false;

    /**
     * Position
     *
     * @var string
     */
    protected $position = '';

    /**
     * Team
     *
     * @var string
     */
    protected $team = '';

    /**
     * Pool
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5core\Domain\Model\Owner>
     */
    protected $pool = null;

    /**
     * Returns the pwdChangeDate
     *
     * @return \DateTime $pwdChangeDate
     */
    public function getPwdChangeDate()
    {
        return $this->pwdChangeDate;
    }

    /**
     * Sets the pwdChangeDate
     *
     * @param \DateTime $pwdChangeDate
     * @return void
     */
    public function setPwdChangeDate(\DateTime $pwdChangeDate)
    {
        $this->pwdChangeDate = $pwdChangeDate;
    }

    /**
     * @return string
     */
    public function getFullname()
    {
        return $this->getLastName() . ' ' . $this->getFirstName() . ' (' . $this->getUsername() . ')';
    }

    /**
     * getUsergroups
     *
     * @return array
     */
    function getUsergroups()
    {
        $usergroups = [];
        if ($this->uid) {
            $result = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows('usergroup', 'fe_users', 'uid=' . $this->uid);
            $usergroups = explode(',', $result[0]['usergroup']);
            foreach ($this->usergroup as $usergroup) {
                $usergroupList[$usergroup->getUid()] = $usergroup;
            }
            for ($i = 0; $i < count($usergroups); $i++) {
                $usergroups[$i] = $usergroupList[$usergroups[$i]];
            }
        }
        return $usergroups;
    }

    /**
     * Returns the settings
     *
     * @return string $settings
     */
    public function getSettings()
    {
        return $this->settings;
    }

    /**
     * Returns the settings as array
     *
     * @return array $settings
     */
    public function getSettingsArray()
    {
        return unserialize($this->settings);
    }

    /**
     * Sets the settings
     *
     * @param string $settings
     * @return void
     */
    public function setSettings($settings)
    {
        $this->settings = $settings;
    }

    /**
     * Returns the void
     *
     * @return bool $void
     */
    public function getVoid()
    {
        return $this->void;
    }

    /**
     * Sets the void
     *
     * @param bool $void
     * @return void
     */
    public function setVoid($void)
    {
        $this->void = $void;
    }

    /**
     * Returns the boolean state of void
     *
     * @return bool
     */
    public function isVoid()
    {
        return $this->void;
    }

    /**
     * Returns the position
     *
     * @return string $position
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Sets the position
     *
     * @param string $position
     * @return void
     */
    public function setPosition($position)
    {
        $this->position = $position;
    }

    /**
     * Returns the team
     *
     * @return string $team
     */
    public function getTeam()
    {
        return $this->team;
    }

    /**
     * Sets the team
     *
     * @param string $team
     * @return void
     */
    public function setTeam($team)
    {
        $this->team = $team;
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
        $this->pool = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Adds a Owner
     *
     * @param \CGB\Relax5core\Domain\Model\Owner $pool
     * @return void
     */
    public function addPool(\CGB\Relax5core\Domain\Model\Owner $pool)
    {
        $this->pool->attach($pool);
    }

    /**
     * Removes a Owner
     *
     * @param \CGB\Relax5core\Domain\Model\Owner $poolToRemove The Owner to be removed
     * @return void
     */
    public function removePool(\CGB\Relax5core\Domain\Model\Owner $poolToRemove)
    {
        $this->pool->detach($poolToRemove);
    }

    /**
     * Returns the pool
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5core\Domain\Model\Owner> $pool
     */
    public function getPool()
    {
        return $this->pool;
    }

    /**
     * Sets the pool
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5core\Domain\Model\Owner> $pool
     * @return void
     */
    public function setPool(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $pool)
    {
        $this->pool = $pool;
    }
}
