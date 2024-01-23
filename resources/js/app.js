import { createApp } from 'vue';
import FlightSearch from './components/FlightSearch.vue';

const app = createApp({});
app.component('flight-search', FlightSearch);
app.mount('#app');
