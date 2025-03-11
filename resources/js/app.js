import './bootstrap';
import 'flowbite';
import 'flowbite';

document.addEventListener('livewire:navigated', () => {
    import('flowbite').then(module => {
        module.initFlowbite();
    });
});