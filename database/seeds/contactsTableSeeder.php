<?php

use Illuminate\Database\Seeder;

class contactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
     //   DB::table('contacts')->truncate();

        $contacts = [];


            $contacts[] = [
                ['group_id' => 1 ,
                    'name' => 'Saeed',
                'email' => 'saeed@hotmail.com',
                'phone' => '0568244233',
                'address' => "King Fahad 62456 Khamis",
                'company' => 'AFHSR',
                'created_at' => new DateTime,
                'updated_at' => new DateTime
                ]
                ,
                ['group_id' => 2 ,
                    'name' => 'Saad',
                    'email' => 'saad@hotmail.com',
                    'phone' => '0568244244',
                    'address' => "King Fahad 62444 Jazan",
                    'company' => 'STC',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime
                ]
                ,
                ['group_id' => 3 ,
                    'name' => 'Saud',
                    'email' => 'saud@hotmail.com',
                    'phone' => '0568244200',
                    'address' => "King Ali 62456 Abha",
                    'company' => 'SABIC',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime
                ]
                ,
                ['group_id' => 3 ,
                    'name' => 'Ahmad',
                    'email' => 'ahmad@hotmail.com',
                    'phone' => '0568200100',
                    'address' => "Saary 62406 Jeddah",
                    'company' => 'Kingdom',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime]

            ];


        foreach ($contacts as $contact) {
            DB::table('contacts')->insert($contact);
        }

    }
}
