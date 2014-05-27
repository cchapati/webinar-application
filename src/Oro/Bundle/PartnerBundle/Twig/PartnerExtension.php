<?php

namespace Oro\Bundle\PartnerBundle\Twig;

use Symfony\Bridge\Doctrine\ManagerRegistry;
use Doctrine\Common\Persistence\ObjectRepository;

use Oro\Bundle\PartnerBundle\Entity\Partner;
use OroCRM\Bundle\AccountBundle\Entity\Account;

class PartnerExtension extends \Twig_Extension
{
    /**
     * @var ObjectRepository
     */
    protected $partnerRepository;

    /**
     * @param ManagerRegistry $managerRegistry
     * @param string $partnerClass
     */
    public function __construct(ManagerRegistry $managerRegistry, $partnerClass)
    {
        $this->partnerRepository = $managerRegistry->getManager()->getRepository($partnerClass);
    }

    /**
     * Returns a list of functions to add to the existing list.
     *
     * @return array An array of functions
     */
    public function getFunctions()
    {
        return array(
            'oro_partner_get_by_account' => new \Twig_Function_Method($this, 'getPartner'),
        );
    }

    /**
     * @param Account $account
     * @return Partner
     */
    public function getPartner(Account $account)
    {
        return $this->partnerRepository->findOneBy(
            array('account' => $account)
        );
    }

    /**
     * Returns the name of the extension.
     *
     * @return string
     */
    public function getName()
    {
        return 'oro_partner';
    }
}
