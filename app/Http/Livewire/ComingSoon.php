<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class ComingSoon extends Component
{

    public $comingSoon = [];

    public function loadComingSoon()
    {
        $current  = Carbon::now()->timestamp;


        $unformattedGamesComingSoon = Http::withHeaders(config('services.igdb'))->withBody(
            "fields name, cover.url, first_release_date, platforms.abbreviation, rating, rating_count, summary;
            where platforms = (48,49,130,6)
            & cover != null
            & first_release_date >= $current;
            sort rating desc;
            limit 4;",
            'text/plain'
        )
            ->post('https://api.igdb.com/v4/games')->json();

        $this->comingSoon = $this->formatForView($unformattedGamesComingSoon);
    }

    private function formatForView($gamesToFormat)
    {
        $current = Carbon::now()->timestamp;
        return collect($gamesToFormat)->map(function ($game) {
            return collect($game)->merge([
                'coverImageUrl' => Str::replaceFirst('thumb','cover_small',$game['cover']['url']),
                'release_date' => date("d M Y", $game["first_release_date"]),
            ]);
        });
    }

    public function render()
    {
        return view('livewire.coming-soon');
    }
}
