import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
import 'filepond/dist/filepond.min.css';
import * as FilePond from 'filepond'
window.FilePond = FilePond

import videojs from 'video.js';
window.videojs = videojs;
