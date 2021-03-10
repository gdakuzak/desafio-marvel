<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Symfony\Component\Console\Output\ConsoleOutput;
use DB;


class CharactersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $choices = ['Deadpool','Punisher','Wolverine','Scarlet Witch','Thor','Daredevil','Colossus','Doctor Strange','Gambit','Spider-Man'];
        // $choices = ['Deadpool'];
        $this->command->info("===================================================");
        $this->command->info("---> J.A.R.V.I.S Security Protocol                 ");
        $this->command->info("===================================================");
        $this->command->info("---> Trying to access Projetc 42 Database...        ");

        if(env('MARVEL_URL') != '' && env('MARVEL_PRIVATE') != '' && env('MARVEL_PUBLIC') != '') 
        {
            $hash=md5('1'.env('MARVEL_PRIVATE').env('MARVEL_PUBLIC'));
            $t42 = Http::get(env('MARVEL_URL')."/v1/public/characters?ts=1&apikey=".env('MARVEL_PUBLIC')."&hash=".$hash."&name=Edwin%20Jarvis");

            if($t42->status() == 200)
            {
                $this->command->info("---> Access Project 42: authorized                 ");
                $this->command->info("---> Accessing heroes and villains database        ");
                $this->command->info("===================================================");
                $this->command->info("---> Authorized download ".count($choices)." profiles");
                $this->command->info("---> Authorized and restored by: Stark             ");
                $this->command->info("===================================================");

                foreach($choices as $choice)
                {
                    $response = Http::get(env('MARVEL_URL')."/v1/public/characters?ts=1&apikey=".env('MARVEL_PUBLIC')."&hash=".$hash."&name=".$choice);
                    $response = $response->collect();
                    $character = DB::table('characters')->find($response['data']['results'][0]['id']);
                    if($character == null)
                    {
                        $character_id = $response['data']['results'][0]['id'];
                        $insert = DB::table('characters')->insert([
                            'id' => $character_id,
                            'name' => $response['data']['results'][0]['name'],
                            'description' =>  $response['data']['results'][0]['description'],
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);

                        foreach($response['data']['results'][0]['comics']['items'] as $item)
                        {
                            $comic_id = basename($item['resourceURI']);
                            $comic = DB::table('comics')->find($comic_id);
                            
                            if($comic == null)
                            {
                                DB::table('comics')->insert([
                                    'id' => $comic_id,
                                    'name' => $item['name'],
                                    'created_at' => now(),
                                    'updated_at' => now(),
                                ]);
                            }

                            DB::table('characters_comics')->insert([
                                'character_id' => $character_id,
                                'comic_id' => $comic_id,
                                'created_at' => now(),
                                'updated_at' => now(),
                            ]);

                        } // end foreach comics

                        foreach($response['data']['results'][0]['series']['items'] as $item)
                        {
                            $serie_id = basename($item['resourceURI']);
                            $serie = DB::table('series')->find($serie_id);
                            
                            if($serie == null)
                            {
                                DB::table('series')->insert([
                                    'id' => $serie_id,
                                    'name' => $item['name'],
                                    'created_at' => now(),
                                    'updated_at' => now(),
                                ]);
                            }

                            DB::table('characters_series')->insert([
                                'character_id' => $character_id,
                                'serie_id' => $serie_id,
                                'created_at' => now(),
                                'updated_at' => now(),
                            ]);

                        } // end foreach series

                        foreach($response['data']['results'][0]['events']['items'] as $item)
                        {
                            $event_id = basename($item['resourceURI']);
                            $event = DB::table('events')->find($event_id);
                            
                            if($event == null)
                            {
                                DB::table('events')->insert([
                                    'id' => $event_id,
                                    'name' => $item['name'],
                                    'created_at' => now(),
                                    'updated_at' => now(),
                                ]);
                            }

                            DB::table('characters_events')->insert([
                                'character_id' => $character_id,
                                'event_id' => $event_id,
                                'created_at' => now(),
                                'updated_at' => now(),
                            ]);

                        } // end foreach events

                        foreach($response['data']['results'][0]['stories']['items'] as $item)
                        {
                            $story_id = basename($item['resourceURI']);
                            $story = DB::table('stories')->find($story_id);
                            
                            if($story == null)
                            {
                                DB::table('stories')->insert([
                                    'id' => $story_id,
                                    'name' => $item['name'],
                                    'type' => $item['type'],
                                    'created_at' => now(),
                                    'updated_at' => now(),
                                ]);
                            }

                            DB::table('characters_stories')->insert([
                                'character_id' => $character_id,
                                'story_id' => $story_id,
                                'created_at' => now(),
                                'updated_at' => now(),
                            ]);

                        } // end foreach stories
                    } //end if character
                } //end foreach
            } else 
            {
                goto insertManual;
            }
        } else {
            insertManual:
            // if don't access the 42 project database, input Avengers #1 info.
            $this->command->info("---> Access Project 42: did not establish connection");
            $this->command->info("---> Insering Avengers #1 profiles                  ");
            $this->command->info("===================================================");

            DB::table('characters')->insert([
                'name' => 'Thor',
                'description' => "As the Norse God of thunder and lightning, Thor wields one of the greatest weapons ever made, the enchanted hammer Mjolnir. While others have described Thor as an over-muscled, oafish imbecile, he's quite smart and compassionate.  He's self-assured, and he would never, ever stop fighting for a worthwhile cause.",
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('characters')->insert([
                'name' => 'Hulk',
                'description' => 'Caught in a gamma bomb explosion while trying to save the life of a teenager, Dr. Bruce Banner was transformed into the incredibly powerful creature called the Hulk. An all too often misunderstood hero, the angrier the Hulk gets, the stronger the Hulk gets.',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('characters')->insert([
                'name' => 'Hank Pym',
                'description' => ' ',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('characters')->insert([
                'name' => 'Janet Van Dyne',
                'description' => 'When Janet Van Dyne\'s father died, she convinced her father\'s associate Hank Pym to give her a supply of "Pym particles"; Pym also subjected her to a procedure which granted her the ability to, upon shrinking, grow wings and fire blasts of energy, which she called her "wasp\'s stings"',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('characters')->insert([
                'name' => 'Tony Stark',
                'description' => ' ',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('comics')->insert([
                'name' => 'Avengers #1 (1961)',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('events')->insert([
                'name' => 'Avengers',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('series')->insert([
                'name' => 'Avengers',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('stories')->insert([
                'name' => 'Avengers',
                'type' => 'cover',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $chars = DB::table('characters')->get();

            foreach($chars as $char)
            {
                DB::table('characters_comics')->insert([
                    'character_id' => $char->id,
                    'comic_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                DB::table('characters_stories')->insert([
                    'character_id' => $char->id,
                    'story_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                DB::table('characters_series')->insert([
                    'character_id' => $char->id,
                    'serie_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                DB::table('characters_events')->insert([
                    'character_id' => $char->id,
                    'event_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
