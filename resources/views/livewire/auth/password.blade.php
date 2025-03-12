<main class="p-4 md:ml-64 h-auto pt-20">
    <x-message/>
    <h1 class="page-title">Change Password</h1>
    <div class="grid grid-cols-1 lg:grid-cols-2  gap-4 mb-4">
        <div>
            <div class="card">
                <h1 class="text-center mb-10">Change Password</h1>
                <div id="accordion-collapse" data-accordion="collapse">
                    <form wire:submit.prevent="changePassword" class="px-6">

                        {{-- Current Password --}}
                        <div class="my-5">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" wire:model="password">
                            @error("password")
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

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

                        <div class="my-5">
                            <button class="btn-primary my-2">Update Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div>
            <x-auth.user-card :user="$user" />
        </div>
    </div>
</main>
