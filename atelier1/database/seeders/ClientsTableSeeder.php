<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ClientsTableSeeder extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
public function run()
{
$faker = \Faker\Factory::create();
DB::table("clients")->insert([
"npr" => $faker->name(),
"adresse" => $faker->address,
"email" => $faker->unique()->safeEmail,
]);
}
}
