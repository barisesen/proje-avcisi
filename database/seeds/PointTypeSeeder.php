<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PointTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            ['name' => 'create_project', 'value' => 50],
            ['name' => 'add_like_user', 'value' => 3],
            ['name' => 'add_comment_user', 'value' => 5],
            ['name' => 'add_comment_project', 'value' => 7],
            ['name' => 'add_like_project', 'value' => 5],
            ['name' => 'delete_comment_user', 'value' => -5],
            ['name' => 'delete_comment_project', 'value' => -7],
            ['name' => 'delete_like_user', 'value' => -3],
            ['name' => 'delete_like_project', 'value' => -5],
        ];
        foreach ($types as $type) {
            DB::table('point_types')->insert([
                'name' => $type['name'],
                'value' => $type['value'],
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);
        }
    }
}
