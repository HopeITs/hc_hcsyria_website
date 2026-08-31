/**
 * Shared front-end bootstrap for the Vite bundle.
 *
 * Only packages declared in package.json are imported here. The old Laravel 5
 * scaffolding also pulled in vue, jquery and popper.js, none of which were ever
 * installed -- and jQuery/Bootstrap are served to pages as static files from
 * public/js/ rather than through this bundle.
 */

import axios from 'axios';
import 'bootstrap';

window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Register the CSRF token as a default header so every outgoing request
 * carries it automatically instead of attaching it by hand each time.
 */
const token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}
