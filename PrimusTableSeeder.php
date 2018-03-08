<?php

use Illuminate\Database\Seeder;

class PrimusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
   {
    for($i=8; $i<22;  $i++){
            for($k=0; $k<51; $k=$k+10){
               if($k==0){
                   $k='00';
               }
         DB::table('primuses')->insert([
            'vreme' =>$i.':'.$k ,
            'pacient_id'=>0
        ]);
        }
       }
    }
}
