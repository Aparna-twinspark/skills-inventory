<?php
use Phinx\Seed\AbstractSeed;

/**
 * Employees seed.
 */
class EmployeesSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $data = [];
        for ($i = 0; $i < 100; $i++) {
          $data[] = [
              'name'      => $faker->userName,
              'password'      => sha1($faker->password),
              'email'         => $faker->email,
              'role'          => $this->_assignRole(),
              'created'       => date('Y-m-d H:i:s'),
              'modified'      => date('Y-m-d H:i:s'),
          ];
      }

      $this->insert('employees', $data);
    }
    
    private function _assignRole()
    {
        if (rand(1,100)<=10)
        {
            return 'Admin';
        }
        return 'Employee';
    }
}
