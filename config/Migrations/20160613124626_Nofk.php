<?php
use Migrations\AbstractMigration;

class Nofk extends AbstractMigration
{

    public function up()
    {
        $this->table('ratings')
            ->dropForeignKey([], 'ratings_ibfk_1')
            ->dropForeignKey([], 'ratings_ibfk_2')
            ->update();

        $this->table('employees')
            ->changeColumn('id', 'biginteger'
            )
            ->update();
        $this->table('skills')
            ->changeColumn('id', 'biginteger'
            )
            ->update();
    }

    public function down()
    {

        $this->table('employees')
            ->changeColumn('id', 'string', [
                'default' => '',
                'length' => 10,
                'null' => false,
            ])
            ->update();

        $this->table('skills')
            ->changeColumn('id', 'string', [
                'default' => null,
                'length' => 40,
                'null' => false,
            ])
            ->update();

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
}

