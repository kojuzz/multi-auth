<div>
    {{-- Flash Message Session Start --}}
    @if (session("success"))
        <x-flash :msg="session('success')" bg="bg-green-500" showAlert="@entangle('showAlert')" />
    @elseif (session("update"))
        <x-flash :msg="session('update')" bg="bg-blue-500" showAlert="@entangle('showAlert')" />
    @elseif (session("failed"))
        <x-flash :msg="session('failed')" bg="bg-gray-500" showAlert="@entangle('showAlert')" />
    @elseif (session("delete"))
        <x-flash :msg="session('delete')" bg="bg-red-500" showAlert="@entangle('showAlert')" />
    @endif
    {{-- Flash Message Session End --}}
</div>