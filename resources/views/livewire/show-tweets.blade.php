<div>
    <p>{{$message}}</p>
    <input type="text" id="message" name="message" wire:model="message">

    <hr>

    {{-- @foreach($tweets as $tweet)
        <p>{{ $tweet->user->name }} - {{ $tweet->content}}</p>
    @endforeach --}}

    @foreach ($showTweets as $tweet)
        <p>{{ $tweet->user->name }} - {{ $tweet->content}}</p>
    @endforeach
</div>
