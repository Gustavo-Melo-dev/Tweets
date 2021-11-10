<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class UploadPhoto extends Component
{

    use WithFileUploads;

    public $photo;

    protected $rules = [
        'photo' => 'required|image'
    ];

    public function storagePhoto(){
        $this->validate();

        $user = auth()->user();

        $nameFile = Str::slug($user->name) . '.' . $this->photo->getClientOriginalExtension();
        
        $path = $this->photo->storeAs('users', $nameFile);
 
        
        if($path){
            $user->profile_photo_path = $path;
            $user->save();
        }

        return redirect('tweets');
    }

    public function render()
    {
        return view('livewire.user.upload-photo');
    }
}
