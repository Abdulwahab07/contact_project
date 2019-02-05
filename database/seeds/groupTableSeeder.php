<?php

use Illuminate\Database\Seeder;

class groupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
       // DB::statement('SET FORGIN_KEY_CHECKS=0');
      //  DB::table('groups')->truncate();

        $groups = [
            ['id' => 1 , 'name' => 'family' , 'created_at' => new DateTime , 'updated_at' => new DateTime ],
            ['id' => 2 , 'name' => 'friends' , 'created_at' => new DateTime , 'updated_at' => new DateTime ],
            ['id' => 3 , 'name' => 'clients' , 'created_at' => new DateTime , 'updated_at' => new DateTime ],
            ['id' => 4 , 'name' => 'schoolership' , 'created_at' => new DateTime , 'updated_at' => new DateTime ],
        ];

        foreach ($groups as $group) {
            DB::table('groups')->insert($group);
        }
    }
}
