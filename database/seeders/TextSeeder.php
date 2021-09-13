<?php

namespace Database\Seeders;

use App\Models\Text;
use Illuminate\Database\Seeder;

class TextSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // \DB::table('texts')->delete();

        $texts = [
            /**
             * global text
             */
            [
                'uuid' => 'global.1',
                'label' => 'globale voir nos resources',
                'editor' => false,
                'content' => 'Voir nos resources'
            ],
            
            /**
             * footer
             */
            [
                'uuid' => 'footer.1',
                'label' => 'footer adresse',
                'editor' => false,
                'content' => '1234 Sample. Street, Example State 35624'
            ],
            [
                'uuid' => 'footer.2',
                'label' => 'footer titre 1',
                'editor' => false,
                'content' => 'Quick Links'
            ],
            [
                'uuid' => 'footer.3',
                'label' => 'footer titre 4',
                'editor' => false,
                'content' => 'Quick Links'
            ],
            [
                'uuid' => 'footer.4',
                'label' => 'footer titre 3',
                'editor' => false,
                'content' => 'Quick Links'
            ],

            /**
             * Home page
             */
            [
                'uuid' => 'home.1',
                'label' => 'accueil hero 1',
                'editor' => false,
                'content' => 'Construire un monde meilleur, un étudiant à la fois'
            ],
            [
                'uuid' => 'home.2',
                'label' => 'accueil hero 2',
                'editor' => true,
                'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nisi diam pharetra enim vivamus id consequat nibh.</p>'
            ],
            [
                'uuid' => 'home.3',
                'label' => 'accueil description titre',
                'editor' => false,
                'content' => 'Porta nec, lacinia tellus ultricies'
            ],
            [
                'uuid' => 'home.4',
                'label' => 'accueil description contenu',
                'editor' => true,
                'content' => '
                <p>
                    “Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lacus consequat urna faucibus imperdiet et aliquam viverra. Porta nec, lacinia tellus ultricies quis interdum.
                </p> 
                <p>
                    Egestas augue tristique amet, nullam nisl, tellus. Faucibus suspendisse lorem elit proin nulla tincidunt neque maecenas at. Quis ultrices ultrices euismod egestas morbi dictumst facilisis proin viverra”
                </p>'
            ],
            [
                'uuid' => 'home.5',
                'label' => 'accueil description nom',
                'editor' => false,
                'content' => 'Wade Wilson'
            ],
            [
                'uuid' => 'home.6',
                'label' => 'accueil description role',
                'editor' => false,
                'content' => 'Directeur'
            ],
            [
                'uuid' => 'home.7',
                'label' => 'accueil stats titre',
                'editor' => false,
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'
            ],
            [
                'uuid' => 'home.8',
                'label' => 'accueil stats 1',
                'editor' => false,
                'content' => 'Eu sed arcu mattis nunc.'
            ],
            [
                'uuid' => 'home.9',
                'label' => 'accueil stats 2',
                'editor' => false,
                'content' => 'Eu sed arcu mattis nunc.'
            ],
            [
                'uuid' => 'home.10',
                'label' => 'accueil stats 3',
                'editor' => false,
                'content' => 'Eu sed arcu mattis nunc.'
            ],
            [
                'uuid' => 'home.11',
                'label' => 'accueil stats 4',
                'editor' => false,
                'content' => 'Eu sed arcu mattis nunc.'
            ],
            [
                'uuid' => 'home.12',
                'label' => 'accueil article titre',
                'editor' => false,
                'content' => 'Nouvelles et Evènements'
            ],
        ];

        foreach ($texts as $t) {
            Text::firstOrCreate(['uuid' => $t['uuid']], $t);
        }
    }
}
