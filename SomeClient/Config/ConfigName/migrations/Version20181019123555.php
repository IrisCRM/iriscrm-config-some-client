<?php

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20181019123555 extends AbstractMigration
{

    public function getDescription()
    {
        return "Добавление нового поля";
    }
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->addSql("insert into iris_Table_Column (ID, createid, createdate, modifyid, modifydate, TableID, Name, Code, IsDuplicate, DefaultValue, fkName, fkTableID, pkName, IndexName, ColumnTypeID, isNotNull, OnDeleteID, OnUpdateID, Description) values ('7a7a5be1-d2ae-328f-b48f-68e6e9ea16bd', '005405b7-8344-49f6-98a2-e1891cbff803', now(), '005405b7-8344-49f6-98a2-e1891cbff803', now(), 'bc2c8307-85b4-3acd-833a-3fd1380b0ccb', 'Новое поле', 'newfield', '0', NULL, NULL, NULL, NULL, NULL, '8e1d85be-6230-4c6f-6905-1aa87d25fa98', '0', NULL, NULL, NULL);");
        $this->addSql("alter table iris_task add newfield character varying(1000);");
        $this->addSql("comment on column iris_task.newfield is 'Новое поле';");

    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $this->addSql("delete from iris_Table_Column where id='7a7a5be1-d2ae-328f-b48f-68e6e9ea16bd'");
        $this->addSql("alter table iris_task drop newfield;");

    }
}
