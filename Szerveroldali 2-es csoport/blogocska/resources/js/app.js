import './bootstrap';

import Alpine from 'alpinejs';
import { createEditor } from '@likhaeditor/likhaeditor';
import '@likhaeditor/likhaeditor/style.css';

window.Alpine = Alpine;
window.createEditor = createEditor;

Alpine.start();
