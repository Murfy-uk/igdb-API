<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class RecentlyReviewed extends Component
{
    public $recentlyReviewed = [];

    public function loadRecentlyReviewed()
    {
        $before  = Carbon::now()->subMonths(3)->timestamp;
        $current  = Carbon::now()->timestamp;

        $unformattedRecentlyReviewed = Http::withHeaders(config('services.igdb'))->withBody(
            "fields name, cover.url, slug, first_release_date, platforms.abbreviation, rating, rating_count, summary;
            where platforms = (48, 49, 130, 6)
            & (first_release_date >= $before
            & first_release_date < $current
            & rating_count > 5);
            sort rating desc;
            limit 3;",
            'text/plain'
        )
            ->post('https://api.igdb.com/v4/games')->json();
            // dump($this->recentlyReviewed = $this->formatForView($unformattedRecentlyReviewed));
        $this->recentlyReviewed = $this->formatForView($unformattedRecentlyReviewed);

        collect($this->recentlyReviewed)->filter(function ($game) {
            return $game['rating'];
        })->each(function ($game) {

            // dump($game['rating'] / 100);
            $this->emit('reviewedGameWithRatingAdded', [
                'slug' => 'reviewed_'.$game['slug'],
                'rating' => $game['rating'] / 100,
            ]);
        });
    }

    private function formatForView($gamesToFormat)
    {
        return collect($gamesToFormat)->map(function ($game) {
            return collect($game)->merge([
                'coverImageUrl' => Str::replaceFirst('thumb','cover_big',$game['cover']['url']),
                'platforms' => collect($game['platforms'])->pluck('abbreviation')->implode(', '),
                'rating' => isset($game['rating']) ? round($game['rating']) : null,
            ]);
        })->toArray();


    }

    public function render()
    {
        return view('livewire.recently-reviewed');
    }
}
