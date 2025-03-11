<?php

namespace App\Livewire\Auth;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Profile extends Component
{
    use WithFileUploads;
    
    public $showAlert = true;
    public $user;
    public $name;
    public $email;
    public $phone;
    public $address;
    public $image;

    public function mount() {
        $this->user = Auth::user();
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->phone = $this->user->phone;
        $this->address = $this->user->address;
        $this->image = $this->user->image;
    }

    public function update() {
        $fields = $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|string',
            'address' => 'required|string',
        ]);

        if ($this->image instanceof UploadedFile) {
            $this->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            // Delete old Image
            if ($this->user->image && Storage::disk('public')->exists($this->user->image)) {
                Storage::disk('public')->delete($this->user->image);
            }

            // Set image name
            $file = $this->image;
            $extension = $file->getClientOriginalExtension();
            $filename = 'post_image_'.date("Ymd_His").'_00'.Auth::user()->id.'.'.$extension;

            // comporess image
            $manager = new ImageManager(new Driver());
            $image = $manager->read($file);
            $encodedImage = $image->scale(height: 400)->encode();

            // Set image path and Store image
            $path = "user_images/". $filename;
            Storage::disk('public')->put($path, (string) $encodedImage, 'public'); 

            $fields['image'] = $path;
        } else {
            unset($fields['image']); // ✅ Remove `image` From Fields If Not Selected
        }

        $this->user->update($fields);
        session()->flash('update', 'Profile updated successfully.');
        $this->showAlert = true;
        return $this->redirect(route('auth.profile'), navigate: true);
    }

    public function render()
    {
        return view('livewire.auth.profile');
    }
}
