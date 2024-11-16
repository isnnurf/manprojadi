<template>
  <div>
    <h2>Admin Login</h2>
    <form @submit.prevent="login">
      <div>
        <label>Email</label>
        <input type="email" v-model="email" required />
      </div>
      <div>
        <label>Password</label>
        <input type="password" v-model="password" required />
      </div>
      <button type="submit">Login</button>
      <p v-if="errorMessage">{{ errorMessage }}</p>
    </form>
  </div>
</template>

<script setup>
import { ref } from "vue";
import axios from "axios";

// Reactive variables
const email = ref("");
const password = ref("");
const errorMessage = ref("");

// Login function
const login = async () => {
  try {
    await axios.post("/admin/login", {
      email: email.value,
      password: password.value,
    });

    // Redirect after successful login (optional)
    // this.$router.push("/admin/dashboard");
  } catch (error) {
    errorMessage.value = "Login failed. Please check your credentials.";
  }
};
</script>
