<?php

namespace Database\Seeders;

use App\Models\Piece_a_preparer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PieceAPreparerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('piece_a_preparers')->delete();

        $pieces_a_preparer = [];

        foreach($pieces_a_preparer as $piece){
            Piece_a_preparer::create($piece);
        }
    }
}
