
import './bootstrap';
import Alpine from 'alpinejs';
import * as Turbo from '@hotwired/turbo';

window.Alpine = Alpine;
window.Turbo = Turbo;
// Optional: Configure Turbo if needed
// Turbo.session.drive = false; // This would disable Turbo if you want to debug

Alpine.start(); 

