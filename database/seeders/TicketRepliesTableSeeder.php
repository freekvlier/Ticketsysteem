<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TicketReply;

class TicketRepliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        TicketReply::factory(20)->create();
    }
}
