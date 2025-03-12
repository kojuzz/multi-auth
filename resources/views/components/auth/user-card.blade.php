<div class="card-faded">
    <div class="my-5">
        @if ($user->image && Storage::disk('space')->exists($user->image))
            <div x-if="preview">
                <img id="photo" 
                    wire:ignore 
                    class="w-56 h-40 object-cover mb-3 rounded-lg shadow-lg mx-auto" 
                    src="{{ Storage::disk('space')->url($user->image) }}" 
                    alt="{{ $user->name }} Image" />
            </div>
        @else 
            <img id="photo" 
                wire:ignore 
                class="w-56 h-40 object-cover mb-3 rounded-lg shadow-lg mx-auto" 
                src="https://ui-avatars.com/api/?name={{ $user->name }}&background=random" 
                alt="{{ $user->name }} Image" />
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