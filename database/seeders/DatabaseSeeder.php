<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\CategorieAge;
use App\Models\EquipeJoueur;
use App\Models\Sport;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //\App\Models\User::factory(10)->create();

       $user1= \App\Models\User::factory()->create([
            'name' => 'Test User',
            'firstname'=>'Test',
            'email' => 'test@example.com',
            "password"=> bcrypt("admin")
        ]);

        $tennis=Sport::create(["nom"=>"tennis"]);
         $squash=Sport::create(["nom"=>"squash"]);

         $cat1=CategorieAge::create(["nom"=>"11-12 ans"]);
         $cat2=CategorieAge::create(["nom"=>"Equipe 1 (Adulte)"]);
        $cat3=CategorieAge::create(["nom"=>"Equipe 2 (Adulte)"]);

        $equipe1=EquipeJoueur::create(["nom"=>"Equipe 1 Tennis","annee"=>"2024/2025","sport_id"=>$tennis->id,"cat_age_id"=>$cat2->id]);

       $equipe1->utilisateurs()->attach([$user1->id]);


    }
}
