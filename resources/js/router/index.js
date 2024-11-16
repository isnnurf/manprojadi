import { createApp } from 'vue';
import { createRouter, createWebHistory } from 'vue-router';
import App from './App.vue';
import Home from './';
import Login from './Pages/Login.vue';

const routes = [
  { path: '/', component: Login },
  { path: '/home', component: Home, name: 'home' },
  { path: '/home', component: Home, name: 'home' },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

const app = createApp(App);
app.use(router);
app.mount('#app');
