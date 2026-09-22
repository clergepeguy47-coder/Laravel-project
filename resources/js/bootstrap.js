import _ from 'lodash';
window._ = _;

import axios from 'axios';
window.axios = axios;

// Axios en mode AJAX
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// ------------------------------------------------------
// Laravel Echo + Pusher (OPTIONNEL)
// ------------------------------------------------------
// Si tu veux activer le temps réel, décommente ce bloc.
// Sinon, laisse tel quel (désactivé par défaut).

// import Echo from 'laravel-echo';
// import Pusher from 'pusher-js';

// window.Pusher = Pusher;

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: import.meta.env.VITE_PUSHER_APP_KEY,
//     cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER ?? 'mt1',
//     wsHost: import.meta.env.VITE_PUSHER_HOST ?? `ws-${import.meta.env.VITE_PUSHER_APP_CLUSTER}.pusher.com`,
//     wsPort: import.meta.env.VITE_PUSHER_PORT ?? 80,
//     wssPort: import.meta.env.VITE_PUSHER_PORT ?? 443,
//     forceTLS: (import.meta.env.VITE_PUSHER_SCHEME ?? 'https') === 'https',
//     enabledTransports: ['ws', 'wss'],
// });
