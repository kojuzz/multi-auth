@props(['msg', 'bg' => 'bg-green-600', 'showAlert' => false])

{{-- Alert --}}
<div class="fixed bottom-0 right-0 mb-10 mr-10 z-50"
    x-data="{show: @entangle('showAlert')}"
    x-transition
    x-show="show"
    x-effect="if (show) setTimeout(() => show = false, 2000)"
> 
    <div class="px-12 py-4 text-slate-200 {{ $bg }} rounded-lg shadow dark:text-gray-400 dark:bg-gray-800 mx-auto">
        <div class="ms-3 text-sm font-normal">{{ $msg }}</div>
    </div>
</div>