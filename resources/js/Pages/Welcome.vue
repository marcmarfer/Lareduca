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
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  
  <div class="gradient-background">
    <div class="general-container">
      <img src="/imgs/logo.svg" alt="Logo Lareduca" class="logo-image">
      <h1>Bienvenido al portal de Lareduca!</h1>      
      <div class="button-container">
        <nav v-if="canLogin">
          <Link :href="route('login')" class="login-button">Log in</Link>
          <Link v-if="canRegister" :href="route('register')" class="register-button">Register</Link>
        </nav>
      </div>
    </div>
  </div>
</template>

<style scoped>
h1 {
  font-size: 3rem;
  font-family: 'Poppins', sans-serif;
  color: white;
  margin: 20px 0px 20px 0px;
}

.logo-image {
  color: white;
  height: 10rem;
  width: 10rem;
  background-color: #D9D9D9;
  border-radius: 50%;
}

.general-container {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}

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
  padding: 10px;
  margin: 10px;
  border-radius: 5px;
  text-decoration: none;
  color: #fff;
  background-color: #FF4565;
  border: 1px solid transparent;
  transition: background-color 0.3s ease;
  width: 12rem;
  height: 3rem;
  text-align: center;
}

.login-button:hover,
.register-button:hover {
  background-color: #D80036;
}
</style>
