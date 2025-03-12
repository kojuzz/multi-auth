<aside
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-14 transition-transform -translate-x-full bg-white border-r border-gray-200 md:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    aria-label="Sidenav" id="drawer-navigation">
    <div class="overflow-y-auto py-5 px-3 h-full bg-white dark:bg-gray-800">
        <ul class="space-y-2">
            <li>
                <a wire:navigate href="{{ route('super.dashboard') }}" class="side-link-secondary group">
                    <x-svg icon="side_dashboard" />
                    <span class="ml-3">Overview</span>
                </a>
            </li>
            <li>                
                <a wire:navigate href="{{ route('super.dashboard') }}" class="side-link-secondary group">
                    <x-svg icon="side_menu" />
                    <span class="ml-3">Manage Categories</span>
                </a>
            </li>
            <li>
                <a href="{{ route('super.dashboard') }}" class="side-link-secondary group">
                    <x-svg icon="side_category" />
                    <span class="ml-3">Manage Tags</span>
                </a>
            </li>

            {{-- Manage Posts --}}
            <li>
                {{-- Posts Dropdown Button --}}
                <button type="button" class="side-link-primary group" aria-controls="dropdown-pages" data-collapse-toggle="posts-dropdown">
                    <x-svg icon="side_posts" />
                    <span class="flex-1 ml-3 text-left whitespace-nowrap">Posts</span>
                    <x-svg icon="side_arrow_down" />
                </button>

                {{-- Posts Dropdown Menu --}}
                <ul id="posts-dropdown" class="hidden py-2 space-y-2">
                    {{-- Manage Category --}}
                    <li>
                        <a href="#" class="side-link-accent group">Create Post</a>
                    </li>
                    <li>
                        <a href="#" class="side-link-accent group">Manage Posts</a>
                    </li>
                </ul>
            </li>
        </ul>

        <ul class="pt-5 mt-5 space-y-2 border-t border-gray-200 dark:border-gray-700">
            <li>
                <a wire:navigate href="{{ route('home') }}" class="side-link-secondary group">
                    <x-svg icon="side_home" />
                    <span class="ml-3">Home</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
