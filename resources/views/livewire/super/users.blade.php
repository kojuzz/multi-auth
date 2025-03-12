<main class="p-4 md:ml-64 h-auto pt-20">
    <x-message/>
    <h1 class="page-title">Manage Users</h1>
    <div class="card">
        <table class="w-full text-sm text-left rtl:text-right">
            <thead class="text-xs uppercase text-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-700 ">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Role
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">

                        {{-- Name --}}
                        <td scope="row" class="px-6 py-4">
                            <span class="text-highlight">
                                {{ $user->name }}
                            </span>
                            <br>
                            <span class="text-accent">
                                @if ($user->name_se)
                                    ({{ $user->name_se }})
                                @endif
                            </span>
                        </td>
                                        
                        {{-- Status --}}
                        <td class="px-6 py-4 {{ $user->status == 1 ? 'text-highlight' : 'text-accent' }}">
                            @if ($user->status == 1)
                                <span class="flex gap-1">
                                    <x-svg icon="checked" />
                                    Enabled
                                </span>
                            @else
                                <span class="flex gap-1">
                                    <x-svg icon="disable" />
                                    Disabled
                                </span>
                            @endif
                        </td>
                                        
                        {{-- Role --}}
                        <td class="px-6 py-4 text-accent">
                            {{ $user->role }}
                        </td>

                        {{-- Action --}}
                        <td class="px-6 py-4">
                            <a wire:navigate href="{{ route('super.edit-user', $user->id) }}" class="text-link"  data-tooltip-target="user-edit{{ $user->id }}">
                                <x-svg icon="edit" />
                            </a>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div> 
</main>
