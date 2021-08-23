<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sermon;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('sermons')->delete();
        $json = file_get_contents("storage\sermons.json", "sermons.json");
        // error_log($json); //CHECKS FILE PATH IS CORRECT
        $data = json_decode(rtrim($json, "\0"));
        // error_log("JSON DECODED" . $data);

        foreach ((array)$data as $serm) {
            Sermon::create(
                array(
                    'number' => $serm->number,
                    'contents' => $serm->contents
                )
            );
        }
    }
}
