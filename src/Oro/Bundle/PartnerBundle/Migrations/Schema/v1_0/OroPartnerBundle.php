<?php

namespace Oro\Bundle\PartnerBundle\Migrations\Schema\v1_0;

use Doctrine\DBAL\Schema\Schema;

use Oro\Bundle\MigrationBundle\Migration\Migration;
use Oro\Bundle\MigrationBundle\Migration\QueryBag;

class OroPartnerBundle implements Migration
{
    /**
     * @inheritdoc
     */
    public function up(Schema $schema, QueryBag $queries)
    {
        /** Generate table oro_partner **/
        $table = $schema->createTable('oro_partner');
        $table->addColumn('id', 'integer', ['autoincrement' => true]);
        $table->addColumn('account_id', 'integer', ['notnull' => false]);
        $table->addColumn('partnership_started_at', 'date', []);
        $table->addColumn('github_account', 'string', ['length' => 255], ['notnull' => false]);
        $table->setPrimaryKey(['id']);
        $table->addUniqueIndex(['account_id'], 'UNIQ_F98CC8C09B6B5FBA');
        /** End of generate table oro_partner **/

        /** Generate foreign keys for table oro_partner **/
        $table = $schema->getTable('oro_partner');
        $table->addForeignKeyConstraint(
            $schema->getTable('orocrm_account'),
            ['account_id'],
            ['id'],
            ['onDelete' => 'CASCADE', 'onUpdate' => null]
        );
        /** End of generate foreign keys for table oro_partner **/
    }
}
