<?php

namespace Oro\Bundle\PartnerBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PartnerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add(
            'partnershipStartedAt',
            'oro_date',
            array(
                'label' => 'oro.partner.partnership_started_at.label',
                'required' => true,
            )
        );

        $builder->add(
            'gitHubAccount',
            'text',
            array(
                'label' => 'oro.partner.git_hub_account.label',
                'required' => false,
            )
        );
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => 'Oro\Bundle\PartnerBundle\Entity\Partner',
            )
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'oro_partner';
    }
}
