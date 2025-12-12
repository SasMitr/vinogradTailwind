import Alpine from 'alpinejs';
// import { Alpine, Livewire } from '../../../vendor/livewire/livewire/dist/livewire.esm';

import collapse from '@alpinejs/collapse'
import persist from '@alpinejs/persist'

import './assets/custom'
import './index'

// Livewire.start()

window.Alpine = Alpine
Alpine.plugin(collapse)
Alpine.plugin(persist)

Alpine.start()
