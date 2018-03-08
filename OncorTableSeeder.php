<?php

use Illuminate\Database\Seeder;

class OncorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for($i=8; $i<22;  $i++){
           
            for($k=0; $k<51; $k=$k+15){
               if($k==0){
                   $k='00';
               }
         DB::table('oncors')->insert([
            'vreme' =>$i.':'.$k ,
            'pacient_id'=>0
        ]);
        }
        }
    }
}
