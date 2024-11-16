<template>
  <div>
    <h2>Login</h2>
    <form @submit.prevent="login">
      <div>
        <label>Email</label>
        <input type="email" v-model="form.email" required />
      </div>
      <div>
        <label>Password</label>
        <input type="password" v-model="form.password" required />
      </div>
      <button type="submit">Login</button>
      <p v-if="form.errors">{{ form.errors }}</p>
    </form>
  </div>
</template>

<script lang="ts" setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3'; // Import helper useForm dari Inertia

// Define form data
const form = useForm({
  email: '',
  password: '',
});

// Login function
const login = () => {
  form.post('/login', {
    onSuccess: () => {
      // Redirect to dashboard after successful login
      form.reset();
    },
    onError: () => {
      // Error handling, form.errors akan otomatis diisi oleh Inertia
    },
  });
};
</script>
