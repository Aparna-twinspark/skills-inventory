<?php
use Migrations\AbstractMigration;

class Initial extends AbstractMigration
{
    public function up()
    {

        $this->table('employees', ['id' => false, 'primary_key' => ['id']])
            ->addColumn('id', 'string', [
                'default' => '',
                'limit' => 10,
                'null' => false,
            ])
            ->addColumn('first_name', 'string', [
                'default' => null,
                'limit' => 20,
                'null' => false,
            ])
            ->addColumn('last_name', 'string', [
                'default' => null,
                'limit' => 20,
                'null' => false,
            ])
            ->addColumn('email_address', 'string', [
                'default' => null,
                'limit' => 40,
                'null' => false,
            ])
            ->addColumn('password', 'string', [
                'default' => null,
                'limit' => 20,
                'null' => false,
            ])
            ->addColumn('role', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->create();

        $this->table('ratings', ['id' => false, 'primary_key' => ['employee_id', 'skill_id']])
            ->addColumn('employee_id', 'string', [
                'default' => null,
                'limit' => 10,
                'null' => false,
            ])
            ->addColumn('skill_id', 'string', [
                'default' => null,
                'limit' => 40,
                'null' => false,
            ])
            ->addColumn('rating', 'string', [
                'default' => null,
                'limit' => 20,
                'null' => false,
            ])
            ->addIndex(
                [
                    'employee_id',
                ]
            )
            ->addIndex(
                [
                    'skill_id',
                ]
            )
            ->create();

        $this->table('skills', ['id' => false, 'primary_key' => ['id']])
            ->addColumn('id', 'string', [
                'default' => null,
                'limit' => 40,
                'null' => false,
            ])
            ->addColumn('skill_name', 'string', [
                'default' => null,
                'limit' => 40,
                'null' => false,
            ])
            ->create();

        $this->table('ratings')
            ->addForeignKey(
                'employee_id',
                'employees',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'skill_id',
                'skills',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();
    }

    public function down()
    {
        $this->table('ratings')
            ->dropForeignKey(
                'employee_id'
            )
            ->dropForeignKey(
                'skill_id'
            );

        $this->dropTable('employees');
        $this->dropTable('ratings');
        $this->dropTable('skills');
    }
}
