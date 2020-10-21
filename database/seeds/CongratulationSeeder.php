<?php

use Illuminate\Database\Seeder;
use App\Models\Congratulation;
use App\User;

class CongratulationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $congratulations = [
            [
                'name' => 'default',
                'src' => asset('images/congratulations/default_congratulation.png'),
            ],
        ];

        foreach($congratulations as $congratulation){
            Congratulation::firstOrCreate($congratulation);
        }

        User::where('id', '<>', 0)
            ->update([
                'congratulation_id' => Congratulation::all()->first()->id
            ]);
    }
}
