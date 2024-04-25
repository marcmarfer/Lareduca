<script setup>
import { Head, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    terms: false,
});
const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>

    <Head title="Register" />
    <div class="gradient-background">
        <div class="general-container">
            <img src="/imgs/logo.svg" alt="Logo Lareduca" class="logo-image">
            <h1>Lar<span class="red">educa</span></h1>
            <form @submit.prevent="submit" class="custom-form">
                <div>
                    <label for="username" class="label">Username</label>
                    <input id="username" v-model="form.name" type="text" class="input" required autofocus
                        autocomplete="username" />
                    <span class="error">{{ form.errors.name }}</span>
                </div>

                <div class="mt-4">
                    <label for="email" class="label">Email</label>
                    <input id="email" v-model="form.email" type="email" class="input" required
                        autocomplete="username" />
                    <span class="error">{{ form.errors.email }}</span>
                </div>

                <div class="mt-4">
                    <label for="password" class="label">Password</label>
                    <input id="password" v-model="form.password" type="password" class="input" required
                        autocomplete="new-password" />
                    <span class="error">{{ form.errors.password }}</span>
                </div>

                <div class="mt-4">
                    <label for="password_confirmation" class="label">Confirm Password</label>
                    <input id="password_confirmation" v-model="form.password_confirmation" type="password" class="input"
                        required autocomplete="new-password" />
                    <span class="error">{{ form.errors.password_confirmation }}</span>
                </div>

                <div class="mt-7 flex justify-center">
                    <button type="submit" class="button" :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<style scoped>
h1 {
    font-size: 5rem;
    color: white;
    margin: 10px 0px 10px 0px;
}

.red {
    color: #FF4565;
}

.gradient-background {
    background: linear-gradient(45deg, #0C0F14, #444769);
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

.general-container {
    font-family: 'Poppins', sans-serif;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    color: white;
}

.logo-image {
    height: 10rem;
    width: 10rem;
    background-color: #D9D9D9;
    border-radius: 50%;
}

.custom-form {
    width: 500px;
    margin: 0 auto;
}

.label {
    display: block;
    margin-bottom: 0.5rem;
    color: white;
}

.input {
    width: 100%;
    padding: 0.5rem;
    font-size: 1rem;
    background-color: #8D99AE;
    color: white;
    border: none;
    border-radius: 0.25rem;
}

.error {
    color: #ff4444;
    font-size: 0.8rem;
}

.button {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 10px;
    border-radius: 5px;
    text-decoration: none;
    color: #fff;
    background-color: #FF4565;
    border: 1px solid transparent;
    transition: background-color 0.3s ease;
    width: 12rem;
    height: 3rem;
    cursor: pointer;
}

.button:hover {
    background-color: #D80036;
}
</style>
