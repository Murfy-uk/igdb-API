<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class SearchDropdown extends Component
{
    public $search = '';
    public $searchResults = [];
    public function render()
    {
        $this->searchResults = Http::withHeaders(config('services.igdb'))
        ->withBody(
            "search \"{$this->search}\";
                        fields name, slug, cover.url;
                        limit 8;
                    ", "text/plain"
        )
        ->post('https://api.igdb.com/v4/games/')->json();

        // dump($this->searchResults);
        return view('livewire.search-dropdown');
    }
}
