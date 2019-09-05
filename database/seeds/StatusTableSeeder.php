<?php

use Illuminate\Database\Seeder;
use App\Status;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stat1 = new Status;
        $stat1->status = "Waiting for Approval";
        $stat1->save();

        $stat2 = new Status;
        $stat2->status = "Approved";
        $stat2->save();

        $stat3 = new Status;
        $stat3->status = "Rejected";
        $stat3->save();
    }
}
