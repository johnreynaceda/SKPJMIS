<?php
namespace Database\Seeders;

use App\Models\CellBlock;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name'      => 'Administrator',
            'username'  => 'admin',
            'email'     => 'admin@gmail.com',
            'password'  => bcrypt('password'),
            'user_type' => 'admin',
        ]);

      
        CellBlock::create([
            'name'     => 'UNO',
            'capacity' => 10,
        ]);
        CellBlock::create([
            'name'     => 'DOS',
            'capacity' => 10,
        ]);
        CellBlock::create([
            'name'     => 'TRES',
            'capacity' => 10,
        ]);
        CellBlock::create([
            'name'     => 'KWATRO',
            'capacity' => 10,
        ]);
        CellBlock::create([
            'name'     => 'SINGKO',
            'capacity' => 10,
        ]);
        CellBlock::create([
            'name'     => 'KITCHEN BOY',
            'capacity' => 10,
        ]);

    }
}
