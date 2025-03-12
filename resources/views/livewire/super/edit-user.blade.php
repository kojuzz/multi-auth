<main class="p-4 md:ml-64 h-auto pt-20">
    <x-message/>
    <h1 class="page-title">
        <a wire:navigate href="{{ route('super.users') }}" class="text-blue-400">Users</a>&nbsp;/
        {{ $user->name }}
    </h1>
    <div class="grid grid-cols-1 lg:grid-cols-2  gap-4 mb-4">
        <div>
            <div class="card">
                <h1 class="text-center mb-10">Reset Password</h1>
                <form wire:submit.prevent="change" class="border-b border-gray-300">

                    {{-- New Password --}}
                    <div class="my-5">
                        <label for="new_password">New Password</label>
                        <input type="password" name="new_password" id="new_password" wire:model="new_password">
                        @error("new_password")
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Confirm New Password --}}
                    <div class="my-5">
                        <label for="password_confirmation">Confirm New Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            wire:model="password_confirmation">
                            @error("password_confirmation")
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                    </div>

                    {{-- Submit Button --}}
                    <div class="my-5">
                        <button class="btn-primary my-2">Reset</button>
                    </div>
                </form>
                <div class="flex flex-wrap justify-between my-10 items-center">
                    <div class="w-1/2">
                        <h1>Change Status : </h1>
                    </div>
                    <div class="w-1/2">
                        @if ($user->status == 1)
                            <button class="btn-primary my-2" wire:click="status">
                                Disable
                            </button>
                        @else
                            <button class="btn-secondary my-2" wire:click="status">
                                Enable
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="card-faded">
                <div class="my-5">
                    @if ($user->image)
                        <div x-if="preview">
                            <img id="photo" wire:ignore class="w-56 h-40 object-cover mb-3 rounded-lg shadow-lg mx-auto" src="{{ Storage::url($user->image) }}" alt="{{ $user->name }} Image" />
                        </div>
                    @else 
                        <img id="photo" wire:ignore class="w-56 h-40 object-cover mb-3 rounded-lg shadow-lg mx-auto" src="https://ui-avatars.com/api/?name={{ $user->name }}&background=random" alt="Bonnie image" />
                    @endif                        
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
                                Enabled
                            @else
                                Disabled
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
</div>
