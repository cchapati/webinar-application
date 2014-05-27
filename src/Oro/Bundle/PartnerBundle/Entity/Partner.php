<?php

namespace Oro\Bundle\PartnerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Oro\Bundle\EntityConfigBundle\Metadata\Annotation\Config;
use Oro\Bundle\PartnerBundle\Model\ExtendPartner;
use OroCRM\Bundle\AccountBundle\Entity\Account;

/**
 * Partner
 *
 * @ORM\Table(name="oro_partner")
 * @ORM\Entity
 * @Config(
 *  defaultValues={
 *      "entity"={"icon"="icon-briefcase"},
 *  }
 * )
 */
class Partner extends ExtendPartner
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="partnership_started_at", type="date")
     */
    private $partnershipStartedAt;

    /**
     * @var string
     *
     * @ORM\Column(name="github_account", type="string", length=255, nullable=true)
     */
    private $gitHubAccount;

    /**
     * @var Account
     *
     * @ORM\OneToOne(targetEntity="OroCRM\Bundle\AccountBundle\Entity\Account")
     * @ORM\JoinColumn(name="account_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $account;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set partnership started at
     *
     * @param \DateTime $partnershipStartedAt
     * @return Partner
     */
    public function setPartnershipStartedAt($partnershipStartedAt)
    {
        $this->partnershipStartedAt = $partnershipStartedAt;

        return $this;
    }

    /**
     * Get partnership started at
     *
     * @return \DateTime
     */
    public function getPartnershipStartedAt()
    {
        return $this->partnershipStartedAt;
    }

    /**
     * Set github account
     *
     * @param string $githubAccount
     * @return Partner
     */
    public function setGitHubAccount($githubAccount)
    {
        $this->gitHubAccount = $githubAccount;

        return $this;
    }

    /**
     * Get github account
     *
     * @return string
     */
    public function getGitHubAccount()
    {
        return $this->gitHubAccount;
    }

    /**
     * @param Account $account
     */
    public function setAccount($account)
    {
        $this->account = $account;
    }

    /**
     * @return Account
     */
    public function getAccount()
    {
        return $this->account;
    }
}
