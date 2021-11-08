<?php

namespace App\Http\Livewire;

use App\Models\Tweet;
use Livewire\Component;

class ShowTweets extends Component
{

    public $message = "Testando!";
    public $showTweets;

    public function showTweets() {
        return Tweet::with('user')->get();
    }

    public function mount() {
        $this->showTweets = $this->showTweets();
    }

    public function render()
    {
        return view('livewire.show-tweets');
    }
}
