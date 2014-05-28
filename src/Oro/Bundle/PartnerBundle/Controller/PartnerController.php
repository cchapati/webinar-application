<?php

namespace Oro\Bundle\PartnerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

use Oro\Bundle\SecurityBundle\Annotation\AclAncestor;

use OroCRM\Bundle\AccountBundle\Entity\Account;
use Oro\Bundle\PartnerBundle\Entity\Partner;

class PartnerController extends Controller
{
    /**
     * @Route("/account/{accountId}/view", name="oro_partner_account_view", requirements={"accountId"="\d+"})
     * @AclAncestor("orocrm_account_view")
     * @ParamConverter("account", options={"id" = "accountId"})
     * @Template
     */
    public function viewAction(Account $account)
    {
        $repository = $this->getDoctrine()->getRepository('OroPartnerBundle:Partner');
        $partner = $repository->findOneByAccount($account);
        return array(
            'account' => $account,
            'partner' => $partner,
        );
    }

    /**
     * @Route("/account/{accountId}/create", name="oro_partner_account_create", requirements={"accountId"="\d+"})
     * @AclAncestor("orocrm_account_update")
     * @ParamConverter("account", options={"id" = "accountId"})
     * @Template("OroPartnerBundle:Partner:update.html.twig")
     */
    public function createAction(Account $account)
    {
        $partner = new Partner();
        $partner->setAccount($account);
        return $this->update($partner);
    }

    /**
     * Edit user form
     *
     * @Route("/update/{id}", name="oro_partner_update", requirements={"id"="\d+"})
     * @AclAncestor("orocrm_account_update")
     * @Template
     */
    public function updateAction(Partner $partner)
    {
        return $this->update($partner);
    }

    /**
     * @param Partner $partner
     * @return array
     */
    protected function update(Partner $partner)
    {
        $form = $this->createForm('oro_partner');
        $form->setData($partner);
        $success = false;

        if ('POST' === $this->get('request')->getMethod()) {
            $form->submit($this->getRequest());
            if ($form->isValid()) {
                $manager = $this->getDoctrine()->getManager();
                $manager->persist($partner);
                $manager->flush($partner);

                $success = true;
            }
        }

        return array(
            'success' => $success,
            'entity' => $partner,
            'form'   => $form->createView()
        );
    }
}
