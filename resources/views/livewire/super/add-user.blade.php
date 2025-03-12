<main class="p-4 md:ml-64 h-auto pt-20">
    <h1 class="page-title">Add User</h1>
    <div class="grid grid-cols-1 lg:grid-cols-2  gap-4 mb-4">
        <div>
            <div class="card">
                <h1 class="text-center mb-10">Add Information</h1>
                <form wire:submit.prevent="store" class="px-6" enctype="multipart/form-data">

                    {{-- Name --}}
                    <div class="my-5">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" wire:model.live="name">
                        @error("name")
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div class="my-5">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" wire:model.live="email">
                        @error("email")
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div class="my-5">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" wire:model="password">
                        @error("password")
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Role --}}
                    <div class="my-5">
                        <label for="role">Role</label>
                        <select name="role" id="role" wire:model="role" class="rounded-lg border-gray-300">
                            <option value="">Select Role</option>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                        @error("role")
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Submit Button --}}
                    <div class="my-5">
                        <button class="btn-primary my-2">Add</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="p-10">
            <h1 class="text-3xl uppercase font-bold text-center text-gray-500 dark:text-gray-100">Add More Users</h1>
            <div class="pt-4 md:pl-10 space-y-2">
                <p>Name : {{ $name }}</p>
                <p>Email : {{ $email }}</p>
            </div>
            <div class="px-5 lg:px-20">
                <x-svg icon="comment"/>
            </div>
        </div>
</div>
