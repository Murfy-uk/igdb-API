<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class PopularGames extends Component
{
    public $popularGames = [];

    public function loadPopularGames()
    {
            $this->before  = Carbon::now()->subMonths(2)->timestamp;
        $this->after  = Carbon::now()->addMonths(2)->timestamp;
        // Cache::flush();

        $unformattedPopularGames = Cache::remember('popularGames', 3, function () {
            return Http::withHeaders(config('services.igdb'))
                ->withBody(
                    "fields name, cover.url, slug, first_release_date, total_rating_count, platforms.abbreviation, rating;
                    where total_rating_count > 4
                    & platforms = (48, 49, 130, 6)
                    & (first_release_date >= $this->before
                    & first_release_date < $this->after);
                    sort total_rating_count desc;
                    limit 12;",
                    'text/plain'
                )
                ->post('https://api.igdb.com/v4/games/')->json();
        });

        $this->popularGames = $this->formatForView($unformattedPopularGames);

        collect($this->popularGames)->filter(function ($game) {
            return $game['rating'];
        })->each(function ($game) {

            // dump($game['rating'] / 100);
            $this->emit('gameWithRatingAdded', [
                'slug' => $game['slug'],
                'rating' => $game['rating'] / 100,
            ]);
        });

    }



    private function formatForView($gamesToFormat)
    {
        return collect($gamesToFormat)->map(function ($game){
            return collect($game)->merge([
                'coverImageUrl' => Str::replaceFirst('thumb','cover_big',$game['cover']['url']),
                'rating' => isset($game['rating']) ? round($game['rating']) : null,
                'platforms' => collect($game['platforms'])->pluck('abbreviation')->implode(', '),
            ]);
        });
    }
    public function render()
    {
        return view('livewire.popular-games');
    }
}
