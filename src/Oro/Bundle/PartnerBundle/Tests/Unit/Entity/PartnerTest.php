<?php

namespace Oro\Bundle\PartnerBundle\Tests\Unit\Entity;

use Oro\Bundle\PartnerBundle\Entity\Partner;

class PartnerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Partner
     */
    protected $entity;

    protected function setUp()
    {
        $this->entity = new Partner();
    }

    public function testPartnershipStartedAt()
    {
        $this->assertNull($this->entity->getPartnershipStartedAt());

        $value = new \DateTime();
        $this->entity->setPartnershipStartedAt($value);
        $this->assertEquals($value, $this->entity->getPartnershipStartedAt());
    }

    public function testGitHubAccount()
    {
        $this->assertNull($this->entity->getGitHubAccount());

        $value = 'username';
        $this->entity->setGitHubAccount($value);
        $this->assertEquals($value, $this->entity->getGitHubAccount());
    }
}
