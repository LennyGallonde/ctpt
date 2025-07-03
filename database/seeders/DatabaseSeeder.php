<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Article;
use App\Models\CategorieAge;
use App\Models\Edito;
use App\Models\EquipeJoueur;
use App\Models\EquipePedagogique;
use App\Models\Photo;
use App\Models\Sport;
use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //\App\Models\User::factory(10)->create();
        //Les utilisateurs
        $user1 = \App\Models\User::factory()->create([
            'name' => 'Test User',
            'firstname' => 'Test',
            'email' => 'test@example.com',
            'estAdmin'=> 1,
            "password" => bcrypt("admin")
        ]);

        $faker = Faker::create('fr_FR'); // Pour des prénoms français
        $usersFilles = [];
        $usersGarçons = [];
        // 3 filles
        for ($i = 0; $i < 3; $i++) {
            $userF = User::create([
                'name' => $faker->lastName,
                'firstname' => $faker->firstNameFemale,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('password'), // mot de passe générique
                'estVisible' => $faker->boolean,
                'cheminPhoto' => null,

            ]);
            array_push($usersFilles, $userF->id);
            // 3 garçons
            $userG = User::create([
                'name' => $faker->lastName,
                'firstname' => $faker->firstNameMale,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('password'),
                'estVisible' => $faker->boolean,
                'cheminPhoto' => null,

            ]);
            array_push($usersGarçons, $userG->id);
        }


        //Les sports
        $tennis = Sport::create(["nom" => "tennis"]);
        $squash = Sport::create(["nom" => "squash"]);
        //Les categories d'ages
        $cat1 = CategorieAge::create(["nom" => "11-12 ans"]);
        $cat2 = CategorieAge::create(["nom" => "Equipe 1 (Adulte)"]);
        $cat3 = CategorieAge::create(["nom" => "Equipe 2 (Adulte)"]);
        //Les Equipe de Joueur
        $equipe1M = EquipeJoueur::create(["nom" => "Equipe 1 Tennis Masculine", "annee" => "2024/2025", "sport_id" => $tennis->id, "cat_age_id" => $cat2->id]);
        $equipe1F = EquipeJoueur::create(["nom" => "Equipe 1 Tennis Féminine", "annee" => "2024/2025", "sport_id" => $tennis->id, "cat_age_id" => $cat2->id]);
        $equipe3AdoM = EquipeJoueur::create(["nom" => "Equipe 11-12ans Tennis Masculine", "annee" => "2024/2025", "sport_id" => $tennis->id, "cat_age_id" => $cat1->id]);
        $equipe3AdoF = EquipeJoueur::create(["nom" => "Equipe 11-12ans Tennis Féminine", "annee" => "2024/2025", "sport_id" => $tennis->id, "cat_age_id" => $cat1->id]);
        //Les photos des equipes de Joueurs
        $photoAdo11F = Photo::create(["chemin" => "photos/equipesJoueurs/11F.jpg", "equipe_joueurs_id" => 4, "estPrincipale" => 1]);
        $photoAdo11G = Photo::create(["chemin" => "photos/equipesJoueurs/11G.jpg", "equipe_joueurs_id" => 3, "estPrincipale" => 1]);
        // Inscrire les utilisateur dans des equipes
        $equipe1M->utilisateurs()->attach([$user1->id]);
        $equipe3AdoM->utilisateurs()->attach($usersGarçons);
        $equipe3AdoF->utilisateurs()->attach($usersFilles);

        // Les articles
        $article1 = Article::create([
            'titre' => 'Retour sur le tournoi interne de juin 2025',
            'texte' => "Le tournoi interne du Club de Tennis de Belleville s’est achevé ce dimanche dans une ambiance conviviale. Plus de 40 participants, de tous âges, ont pris part à la compétition. Bravo à Julie Lemoine qui remporte la finale féminine, et à Clément Dubois sacré chez les hommes. Rendez-vous en septembre pour le prochain tournoi !",
            'user_id' => 1,
            'sport_id'=>1
        ]);

        $article2 = Article::create([
            'titre' => 'Nouveau coach au club : bienvenue à Stéphane !',
            'texte' => "Le Club est heureux d’accueillir Stéphane Morel, notre nouveau coach diplômé d’État. Fort de 10 ans d’expérience en ligue régionale, il proposera des entraînements tous niveaux dès le 1er juillet. Les inscriptions sont ouvertes à l’accueil du club ou par téléphone.",
            'user_id' => 1,
             'sport_id'=>2
        ]);
           $article3 = Article::create([
            'titre' => 'Retour sur le tournoi interne de Juillet 2025',
            'texte' => "Le tournoi interne du Club de Tennis de Belleville s’est achevé ce dimanche dans une ambiance conviviale. Plus de 40 participants, de tous âges, ont pris part à la compétition. Bravo à Julie Lemoine qui remporte la finale féminine, et à Clément Dubois sacré chez les hommes. Rendez-vous en septembre pour le prochain tournoi !",
            'user_id' => 1,
             'sport_id'=>1
        ]);

        $article4 = Article::create([
            'titre' => 'Nouveau coach au club : bienvenue à Marc !',
            'texte' => "Le Club est heureux d’accueillir Marc Martin, notre nouveau coach diplômé d’État. Fort de 10 ans d’expérience en ligue régionale, il proposera des entraînements tous niveaux dès le 1er juillet. Les inscriptions sont ouvertes à l’accueil du club ou par téléphone.",
            'user_id' => 1,
             'sport_id'=>1
        ]);
           $article5 = Article::create([
            'titre' => 'Retour sur le tournoi interne de Aout 2025',
            'texte' => "Le tournoi interne du Club de Tennis de Belleville s’est achevé ce dimanche dans une ambiance conviviale. Plus de 40 participants, de tous âges, ont pris part à la compétition. Bravo à Julie Lemoine qui remporte la finale féminine, et à Clément Dubois sacré chez les hommes. Rendez-vous en septembre pour le prochain tournoi !",
            'user_id' => 1,
             'sport_id'=>1
        ]);

        $article6 = Article::create([
            'titre' => 'Nouveau coach au club : bienvenue à Loubna !',
            'texte' => "Le Club est heureux d’accueillir Loubna Hamil, notre nouveau coach diplômé d’État. Fort de 10 ans d’expérience en ligue régionale, elle proposera des entraînements tous niveaux dès le 1er juillet. Les inscriptions sont ouvertes à l’accueil du club ou par téléphone.",
            'user_id' => 1,
             'sport_id'=>null
        ]);
        // Les Photos des articles
        $photoArticle1 = Photo::create(["chemin" => "photos/equipesJoueurs/11F.jpg", "articles_id" => 1, "estPrincipale" => 1]);
        $photoArticle2 = Photo::create(["chemin" => "photos/equipesJoueurs/11G.jpg", "articles_id" => 1, "estPrincipale" => 1]);
  $photoArticle3 = Photo::create(["chemin" => "photos/equipesJoueurs/11F.jpg", "articles_id" => 3, "estPrincipale" => 1]);
        $photoArticle4 = Photo::create(["chemin" => "photos/equipesJoueurs/11G.jpg", "articles_id" => 4, "estPrincipale" => 1]);
          $photoArticle5 = Photo::create(["chemin" => "photos/equipesJoueurs/11F.jpg", "articles_id" => 5, "estPrincipale" => 1]);
        $photoArticle6 = Photo::create(["chemin" => "photos/equipesJoueurs/11G.jpg", "articles_id" => 6, "estPrincipale" => 1]);

         $equipeTennis = EquipePedagogique::create(["nom" => "Entraineur Tennis", "sport_id" => $tennis->id, "cat_age_id" => $cat2->id]);
        $equipeTennis->utilisateurs()->attach($user1);

        $edito=Edito::create(["titre"=>"Bienvenue au Tennis et Squash du Plessis Trévise",
        "texte"=>"Lorem blabla bla"]);
        }
}
