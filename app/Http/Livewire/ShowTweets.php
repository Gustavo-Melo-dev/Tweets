<?php

namespace App\Http\Livewire;

use App\Models\Tweet;
use Livewire\Component;

class ShowTweets extends Component
{

    public $content;
    public $showTweets;

    protected $rules = [
        'content' => 'required|min:3|max:255'
    ];

    public function showTweets() {
        return Tweet::with('user')->get();
    }

    public function createTweets() {
        $this->validate();
        
        auth()->user()->tweets()->create([
            'content' => $this->content,
        ]);
        
        $this->content = '';
    }

    public function like($tweet_id) {
        $tweet = Tweet::find($tweet_id);

        $tweet->likes()->create([
            'user_id' => auth()->user()->id
        ]);
    }

    public function deslike($tweet_id) {
        $tweet = Tweet::find($tweet_id);

        $tweet->likes()->delete($tweet);
    }

    public function mount() {
        $this->showTweets = $this->showTweets();
    }

    public function render()
    {
        return view('livewire.show-tweets');
    }
}
