<div>
    <h1>Upload Foto</h1>
    <form action="#" method="post" wire:submit.prevent="storagePhoto()">
        <input type="file" name="photo" id="photo" wire:model="photo"> <br>
        @error('photo')
            {{ $message }}
        @enderror
        <button type="submit">Upload</button>
    </form>
</div>
