<script setup>
  import { Head, Link } from '@inertiajs/vue3';

  defineProps({
      canLogin: {
          type: Boolean,
      },
      canRegister: {
          type: Boolean,
      }
  });
</script>

<template>
  <div class="gradient-background">
    <div class="button-container">
      <nav v-if="canLogin" class="flex justify-center">
        <Link
            :href="route('login')"
            class="login-button"
        >
            Log in
        </Link>
        <Link
            v-if="canRegister"
            :href="route('register')"
            class="register-button"
        >
            Register
        </Link>
      </nav>
    </div>
  </div>
</template>

<style scoped>
  .gradient-background {
    background: linear-gradient(45deg, #0C0F14, #444769);
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .button-container {
    text-align: center;
  }

  .login-button,
  .register-button {
    display: inline-block;
    padding: 10px 20px;
    margin: 10px;
    border-radius: 5px;
    text-decoration: none;
    color: #fff;
    background-color: #FF2D20;
    border: 1px solid transparent;
    transition: background-color 0.3s ease;
  }

  .login-button:hover,
  .register-button:hover {
    background-color: #D32027;
  }
</style>
