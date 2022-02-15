<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $before  = Carbon::now()->subMonths(2)->timestamp;
        // $after  = Carbon::now()->addMonths(2)->timestamp;
        // $current  = Carbon::now()->timestamp;
        // $afterFourMonths = Carbon::now()->addMonths(4)->timestamp;

        // ddd(config('services.igdb'));
        // $popularGames = Http::withHeaders(config('services.igdb'))
        //     ->withBody(
        //         "fields name, cover.url, first_release_date, total_rating_count, platforms.abbreviation, rating;
        //     where total_rating_count > 1
        //     & platforms = (48, 49, 130, 6)
        //     & (first_release_date >= $before
        //     & first_release_date < $after);
        //     sort total_rating_count desc;
        //     limit 12;",
        //     'text/plain'
        //     )
        // ->post('https://api.igdb.com/v4/games/')->json();

        // $recentlyReviewed = Http::withHeaders(config('services.igdb'))->withBody(
        //     "fields name, cover.url, first_release_date, platforms.abbreviation, rating, rating_count, summary;
        //     where platforms = (48, 49, 130, 6)
        //     & (first_release_date >= $before
        //     & first_release_date < $current
        //     & rating_count > 5);
        //     sort rating desc;
        //     limit 3;",
        //     'text/plain'
        // )
        //     ->post('https://api.igdb.com/v4/games')->json();


            // $mostAnticipated = Http::withHeaders(config('services.igdb'))->withBody(
            //     "fields name, cover.url, first_release_date, platforms.abbreviation, rating, rating_count, summary;
            //     where platforms = (48, 49, 130, 6)
            //     & cover != null
            //     & (first_release_date >= $current
            //     & first_release_date < $afterFourMonths);
            //     sort rating desc;
            //     limit 4;",
            //     'text/plain'
            // )
            //     ->post('https://api.igdb.com/v4/games')->json();

    //        dump($mostAnticipated);


            // $comingSoon = Http::withHeaders(config('services.igdb'))->withBody(
            //     "fields name, cover.url, first_release_date, platforms.abbreviation, rating, rating_count, summary;
            //     where platforms = (48,49,130,6)
            //     & cover != null
            //     & first_release_date >= $current;
            //     sort rating desc;
            //     limit 4;",
            //     'text/plain'
            // )
            //     ->post('https://api.igdb.com/v4/games')->json();

    //        dump($comingSoon);


    // dump($mostAnticipated, $comingSoon);
            return view('index', [
                // 'popularGames'        => $popularGames,
                // 'recentlyReviewed' => $recentlyReviewed,
                // 'mostAnticipated'  => $mostAnticipated,
                // 'comingSoon'       => $comingSoon,
            ]);



        // return view('index', [
        //     'popularGames' => $popularGames,
        //     'recentlyReviewed' => $recentlyReviewed,
        // ]);
    }

      /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */

     public function show($slug)
    {
        $this->slug = $slug;

        $game = Cache::remember('game', 7, function () {

            $temp =  Http::withHeaders(config('services.igdb'))
                ->withBody("
                    fields name, cover.url, first_release_date, platforms.abbreviation, total_rating,
                    slug, involved_companies.company.name, genres.name, aggregated_rating, summary,
                    websites.*, videos.*, screenshots.*, similar_games.cover.url, similar_games.name,
                    similar_games.rating, similar_games.platforms.abbreviation, similar_games.slug;
                    where slug = \"{$this->slug}\";
                    ","text/plain"
                )
                ->post('https://api.igdb.com/v4/games')->json();

                // dump($temp);
        return $temp;
        });


        abort_if(!$game[0], 404);



        return view('show', [
            'game' => $this->formatForView($game[0]),
        ]);

    }

    private function formatForView($game)
    {
        return collect($game)->merge([
            'summary' => array_key_exists('summary', $game) ? $game['summary'] : null,
            'coverImageUrl'     => array_key_exists('cover', $game) ? Str::replaceFirst('thumb','cover_big',$game['cover']['url']) : null,
            'genres'            => array_key_exists('genres', $game) ? collect($game['genres'])->pluck('name')->implode(', ') : null,
            'involvedCompanies' => array_key_exists('involved_companies', $game) ? $game['involved_companies'][0]['company']['name'] : null,
            'platforms'         => array_key_exists('platforms', $game) ? collect($game['platforms'])->pluck('abbreviation')->implode(', '): null,
            'memberRating'      => array_key_exists('total_rating', $game) ? round($game['total_rating']) : null,
            'criticRating'      => array_key_exists('aggregated_rating', $game) ? round($game['aggregated_rating']) : null,
            'trailer'           => array_key_exists('videos', $game) ? 'https://youtube.com/embed/'.$game['videos']['0']['video_id'] : null,
            'screenshots'       => array_key_exists('screenshots', $game) ? collect($game['screenshots'])->map(function ($screenshot) {
                return [
                    'big' => Str::replaceFirst('thumb', 'screenshot_big', $screenshot['url']),
                    'huge' => Str::replaceFirst('thumb', 'screenshot_huge', $screenshot['url']),

                ];
            })->take(9) : null,
            'similarGames' => array_key_exists('similarGames', $game) ? collect($game['similar_games'])->map(function ($game) {
                return collect($game)->merge([
                    'coverImageUrl' => array_key_exists('cover', $game) ? Str::replaceFirst('thumb', 'cover_big', $game['cover']['url']) : 'https://via.placeholder.com/264x352',
                    'rating' => isset($game['rating']) ? round($game['rating']) : null,
                    'platforms' => array_key_exists('platforms', $game) ? collect($game['platforms'])->pluck('abbreviation')->implode(', ') : null,
                ]);
            })->take(6) : null,
            'socials' => [
                'website' => array_key_exists('website', $game) ? collect($game['websites'])->first() : null,
                'facebook' => array_key_exists('facebook', $game) ? collect($game['websites'])->filter(function ($website) {
                    return Str::contains($website['url'], 'facebook');
                })->first() : null,
                'twitter' => array_key_exists('twitter', $game) ? collect($game['websites'])->filter(function ($website) {
                    return Str::contains($website['url'], 'twitter');
                })->first() : null,
                'instagram' => array_key_exists('instagram', $game) ? collect($game['websites'])->filter(function ($website) {
                    return Str::contains($website['url'], 'instagram');
                })->first() : null,
            ]

        ]);
    }






        /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}







// name, cover.url, first_release_date, platforms.abbreviation, total_rating,
//                     slug, involved_companies.company.name, genres.name, aggregated_rating, summary,
//                     websites.*, videos.*, screenshots.*, similar_games.cover.url, similar_games.name,
//                     similar_games.rating, similar_games.platforms.abbreviation, similar_games.slug
