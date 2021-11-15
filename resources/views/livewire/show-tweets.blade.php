<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Tweets') }}
    </h2>
</x-slot>

<div class="flex justify-center align-items-center w-full py-5 flex-wrap">
    <div class="flex flex-col justify-center align-items-center py-5 w-2/5">
        <form method="post" wire:submit.prevent="createTweets">
            <input placeholder="Tweets \O/" type="text" id="content" name="content" wire:model="content" class=" w-full rounded-full border-indigo-700">
            @error('content')
                <span class="py-5">{{ $message }}</span>
            @enderror
            <div class="flex justify-center py-5">
                <button type="submit" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-full">
                    Criar Tweet
                </button>
            </div>
        </form>

        @foreach ($showTweets as $tweet)
        <div class="flex w-full">
            <div class="w-full justify-center align-items-center px-20 col sm:col-md-3">
                @if ($tweet->user->profile_photo_path)
                    <div class="max-w-md py-4 px-8 bg-white shadow-lg rounded-lg my-20">
                        <div class="flex justify-center md:justify-end -mt-16">
                            <a href="/upload">
                                <img class="w-20 h-20 object-cover rounded-full border-2 border-indigo-500" src="{{ Storage::url($tweet->user->profile_photo_path) }}" alt="{{ $tweet->user->name }}">
                            </a>
                        </div>
                        <div>
                            <h2 class="text-gray-800 text-3xl font-semibold">{{ $tweet->user->name }}</h2>
                            <p class="mt-2 text-gray-600">{{ $tweet->content}}</p>
                        </div>
                        <div class="flex justify-end mt-4">
                            @if( $tweet->likes->count())
                                <a href="#"  wire:click.prevent="deslike({{ $tweet->id }})" class="text-xl font-medium text-indigo-500">Descurtir</a>
                            @else
                                <a href="#" wire:click.prevent="like({{ $tweet->id }})" class="text-xl font-medium text-indigo-500">Curtir</a>
                            @endif
                        </div>
                    </div>
                @else
                    <div class="max-w-md py-4 px-8 bg-white shadow-lg rounded-lg my-20">
                        <div class="flex justify-center md:justify-end -mt-16">
                            <a href="/upload">
                                <img class="w-20 h-20 object-cover rounded-full border-2 border-indigo-500" src="css/img/no-image.png" alt="{{ $tweet->user->name }}">
                            </a>
                        </div>
                        <div>
                            <h2 class="text-gray-800 text-3xl font-semibold">{{ $tweet->user->name }}</h2>
                            <p class="mt-2 text-gray-600">{{ $tweet->content}}</p>
                        </div>
                        <div class="flex justify-end mt-4">
                            @if( $tweet->likes->count())
                                <a href="#"  wire:click.prevent="deslike({{ $tweet->id }})" class="text-xl font-medium text-indigo-500">Descurtir</a>
                            @else
                                <a href="#" wire:click.prevent="like({{ $tweet->id }})" class="text-xl font-medium text-indigo-500">Curtir</a>
                            @endif
                        </div>
                    </div>
                @endif
            </div>
        </div>
        @endforeach
    </div>
</div>
