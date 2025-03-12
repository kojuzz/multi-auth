<div x-data="{ darkMode: @entangle('darkMode') }"
     x-init="
        if (darkMode) { document.documentElement.classList.add('dark'); }
        $watch('darkMode', value => {
            if (value) {
                document.documentElement.classList.add('dark');
                localStorage.setItem('theme', 'dark');
            } else {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('theme', 'light');
            }
        });
     ">
    <button wire:click="toggleDarkMode" 
        class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5">
        <div x-show="darkMode">
            <x-svg icon="sun" />
        </div>
        <div x-show="!darkMode">
            <x-svg icon="moon" />
        </div>
    </button>
</div>