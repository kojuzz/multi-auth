<main class="p-4 md:ml-64 h-auto pt-20">
    <x-message/>

    <div class="grid grid-cols-1 lg:grid-cols-2  gap-4 mb-4">
        <div>
            <div class="card py-20">
                <h1 class="text-center mb-10">Edit Profile</h1>
                <form wire:submit.prevent="update" class="px-6">
                    <div class="my-5">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" wire:model="name">
                    </div>
                    @error("name")
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                    <div class="my-5">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" wire:model="email">
                    </div>
                    @error("email")
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                    <div class="my-5">
                        <label for="phone">Phone</label>
                        <input type="text" name="text" id="phone" wire:model="phone">
                    </div>
                    @error("phone")
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                    <div class="my-5">
                        <label for="address">Address</label>
                        <textarea class="rounded-lg" wire:model="address" id="address"></textarea>
                    </div>
                    @error("address")
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                    <div class="my-5">
                        <button class="btn-primary my-2">Update</button>
                    </div>
                </form>
            </div>
        </div>
        <div>
            <div class="card-faded py-20">
                <div class="my-5">
                    <img id="photo" class="w-56 h-40 object-cover mb-3 rounded-lg shadow-lg mx-auto"
                        src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=random"
                        alt="Bonnie image" />
                </div>
                <h2 class="text-center" my-5>{{ $user->name }}</h2>
                <table class="w-full items-center table-auto">
                    <tr class="text-center">
                        <td>Email</td>
                        <td>:</td>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr class="text-center">
                        <td>Phone</td>
                        <td>:</td>
                        <td>{{ $user->phone }}</td>
                    </tr>
                    <tr class="text-center">
                        <td>Role</td>
                        <td>:</td>
                        <td>{{ $user->role }}</td>
                    </tr>
                    <tr class="text-center">
                        <td>Status</td>
                        <td>:</td>
                        <td>
                            @if ($user->status == "1")
                                Active
                            @else
                                Inactive
                            @endif
                        </td>
                    </tr>
                    <tr class="text-center">
                        <td>Address</td>
                        <td>:</td>
                        <td class="max-w-20">{{ $user->address }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</main>
