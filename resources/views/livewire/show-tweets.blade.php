<div class="containe">
    <div class="container d-flex flex-column">
        <p>{{$content}}</p>
        <form method="post" wire:submit.prevent="createTweets">
            <input type="text" id="content" name="content" wire:model="content">
            @error('content')
                <span class="py-5">{{ $message }}</span>
            @enderror
            <button type="submit">Criar Tweet</button>
        </form>

        @foreach ($showTweets as $tweet)
            <p>{{ $tweet->user->name }} - {{ $tweet->content}} - 
                @if( $tweet->likes->count())
                    <a href="#"  wire:click.prevent="deslike({{ $tweet->id }})">Descurtir</a>
                @else
                    <a href="#" wire:click.prevent="like({{ $tweet->id }})">Curtir</a>
                @endif
            </p>
        @endforeach
    </div>
</div>
