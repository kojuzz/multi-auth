<main class="p-4 md:ml-64 h-auto pt-20">
    <x-message/>
    <h1 class="page-title">Edit Profile</h1>
    <div class="grid grid-cols-1 lg:grid-cols-2  gap-4 mb-4">
        <div>
            <div class="card">
                <h1 class="text-center mb-10">Edit Information</h1>
                <form wire:submit.prevent="update" class="px-6" enctype="multipart/form-data">

                    {{-- Name --}}
                    <div class="my-5">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" wire:model="name">
                        @error("name")
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div class="my-5">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" wire:model="email">
                        @error("email")
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Phone --}}
                    <div class="my-5">
                        <label for="phone">Phone</label>
                        <input type="text" name="text" id="phone" wire:model="phone">
                        @error("phone")
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Address --}}
                    <div class="my-5">
                        <label for="address">Address</label>
                        <textarea class="rounded-lg border-gray-300" wire:model="address" id="address"></textarea>
                        @error("address")
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Profile Image --}}
                    <div class="my-5" x-data="{ preview: null }">
                        <label for="image">
                            Profile Image
                        </label>
                        <input type="file" name="image" id="image" wire:model="image" accept="image/*" onchange="loadFile(event)">  
                        @error("image")
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror              
                    </div>

                    {{-- Submit Button --}}
                    <div class="my-5">
                        <button class="btn-primary my-2">Update</button>
                    </div>
                </form>
            </div>
        </div>
        <div>
            <x-auth.user-card :user="$user" />
        </div>
    </div>

    @section('scripts')
    <script>
        function loadFile(event) {
            var reader = new FileReader();
            reader.onload = function () {
                var photo = document.getElementById("photo");
                photo.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
    @endsection

</main>
