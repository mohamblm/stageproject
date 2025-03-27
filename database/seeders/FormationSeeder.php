<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Formation;
use Carbon\Carbon;

class FormationSeeder extends Seeder
{
    public function run()
    {
        $formations = [
            [
                'etablissement_id' => 1, // Make sure this ID exists in 'etablissements' table
                'domaine_id' => 1, // Modified domaine_id to 1
                'nom' => 'sions médicaux',
                'description' => 'Apprenez à créer des applications web modernes avec HTML, CSS, JavaScript, Laravel et React.',
                'sub_titles' => json_encode([
                    'You will learn how to design beautiful websites using Figma, an interface design tool used by designers at Uber, Airbnb and Microsoft.',
                    'You will learn secret tips of Freelance Web Designers and how they make great money freelancing online.',
                    'Understand how to use both the Jupyter Notebook and create .py files',
                    'You will learn how to take your designs and build them into powerful websites using WebFlow, a state of the art site builder used by teams at Dell, NASA and more.',
                    'Get an understanding of how to create GUIs in the Jupyter Notebook system!'
                ]),
                'for_whos'=> json_encode([
                    'Développeurs web débutants',
                    'Développeurs web intermédiaires',
                    'Développeurs web avancés',
                    'Développeurs web juniors',
                    'Développeurs web seniors',
                ]),
                'requirements' => json_encode([
                    'Aucune connaissance préalable requise',
                    'Un ordinateur avec accès à Internet',
                    'Un navigateur web moderne (Chrome, Firefox, Safari, Edge)',
                    'Un éditeur de code (VS Code, Sublime Text, Atom, etc.)',
                    'Un compte GitHub (gratuit)',
                ]),
                'includes' => json_encode([
                    '6 heures de vidéo à la demande',
                    '1 article',
                    '1 ressource téléchargeable',
                    'Accès sur appareil mobile et TV',
                    'Certificat de fin de formation',
                ]),
                'languages' => json_encode([
                    'Français','Darija','Arabe','Anglais'
                ]),
                'image' => 'formations1.jpg',
                'trend' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nom' => 'Management',
                'description' => 'Management stratégique, organisationnel, opérationnel, et des équipes.',
                'domaine_id' => 1, // Modified domaine_id to 2
                'image' => 'management.jpg',
                'etablissement_id' => 1,
                'sub_titles' => json_encode([
                    'You will learn how to design beautiful websites using Figma, an interface design tool used by designers at Uber, Airbnb and Microsoft.',
                    'You will learn secret tips of Freelance Web Designers and how they make great money freelancing online.',
                    'Understand how to use both the Jupyter Notebook and create .py files',

                ]),
                'for_whos'=> json_encode([
                    'Développeurs web débutants',
                    'Développeurs web intermédiaires',
                    'Développeurs web avancés',
                    'Développeurs web juniors',
                    'Développeurs web seniors',
                ]),
                'requirements' => json_encode([
                    'Aucune connaissance préalable requise',
                    'Un ordinateur avec accès à Internet',
                    'Un navigateur web moderne (Chrome, Firefox, Safari, Edge)',
                    'Un éditeur de code (VS Code, Sublime Text, Atom, etc.)',
                    'Un compte GitHub (gratuit)',
                ]),
                'includes' => json_encode([
                    '6 heures de vidéo à la demande',
                    '1 article',
                    '1 ressource téléchargeable',
                    'Accès sur appareil mobile et TV',
                    'Certificat de fin de formation',
                ]),
                'languages' => json_encode([
                    'Français'
                ]),
            ],
            [
                'nom' => 'Finances et gestion financière',
                'description' => 'Procédure budgétaire et comptable, gestion et stratégie financière, fiscalité.',
                'domaine_id' => 1, // Modified domaine_id to 3
                'image' => 'finances_gestion.jpg',
                'etablissement_id' => 1,
                'sub_titles' => json_encode([
                    'You will learn how to design beautiful websites using Figma, an interface design tool used by designers at Uber, Airbnb and Microsoft.',
                    'You will learn secret tips of Freelance Web Designers and how they make great money freelancing online.',

                ]),
            ],
            [
                'nom' => 'Communication',
                'description' => 'Stratégie de communication, techniques et outils de communication.',
                'domaine_id' => 1, // Modified domaine_id to 4
                'image' => 'communication.jpg',
                'etablissement_id' => 1,
            ],
            [
                'nom' => 'Informatique et systèmes d’information',
                'description' => 'Architecture et administration des systèmes d’information, réseaux et télécommunication.',
                'domaine_id' => 1, // Modified domaine_id to 5
                'image' => 'informatique_systemes.jpg',
                'etablissement_id' => 1,
            ],
            [
                'nom' => 'Sécurité - Hygiène',
                'description' => 'Prévention et opération d’incendie, sécurité dans la ville, gestion des risques technologiques et naturels.',
                'domaine_id' => 1,
                'image' => 'securite_hygiene.jpg',
                'etablissement_id' => 1,
            ],
            [
                'nom' => 'Commerce et marketing',
                'description' => 'Stratégie marketing, technique commerciale et de vente.',
                'domaine_id' => 1,
                'image' => 'commerce_marketing.jpg',
                'etablissement_id' => 1,
            ],
            [
                'nom' => 'Qualité',
                'description' => 'Amélioration de la qualité, assurance qualité, système de management qualité.',
                'domaine_id' => 1,
                'image' => 'qualite.jpg',
                'etablissement_id' => 1,
            ],
            [
                'nom' => 'Technique',
                'description' => 'Gestion de la production, gestion et maîtrise de l’énergie, gestion de la maintenance.',
                'domaine_id' => 1,
                'image' => 'technique.jpg',
                'etablissement_id' => 1,
            ],
            [
                'nom' => 'Logistique',
                'description' => 'Gestion des approvisionnements, gestion des stocks, gestion des magasins.',
                'domaine_id' => 1,
                'image' => 'logistique.jpg',
                'etablissement_id' => 1,
            ],
            [
                'nom' => 'Environnement',
                'description' => 'Politique d’environnement, gestion des ressources, traitement des eaux usées et gestion des déchets.',
                'domaine_id' => 1,
                'image' => 'environnement.jpg',
                'etablissement_id' => 1,
            ],
            [
                'nom' => 'Affaires juridiques',
                'description' => 'Mode et gestion des services publics, achats publics, contrats et assurances.',
                'domaine_id' => 1,
                'image' => 'affaires_juridiques.jpg',
                'etablissement_id' => 1,
            ],
            [
                'nom' => 'Langues',
                'description' => 'Aspect général des langues, aspect technique et commercial des langues.',
                'domaine_id' => 1,
                'image' => 'langues.jpg',
                'etablissement_id' => 1,
            ],
            [
                'nom' => 'Santé',
                'description' => 'Soins médicaux, secourisme, biomédical, soins dentaires et analyses médicales.',
                'domaine_id' => 1,
                'image' => 'sante.jpg',
                'etablissement_id' => 1,
            ],
        ];

        foreach ($formations as $formation) {
            Formation::create($formation);
        }
    }
}