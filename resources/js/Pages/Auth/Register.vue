<script setup>
import { useForm } from '@inertiajs/vue3';

const form = useForm({
    username: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <div class="gradient-background">
        <div class="general-container">
            <img src="/imgs/logo.svg" alt="Logo Lareduca" class="logo-image">
            <form @submit.prevent="submit" class="custom-form">
                <div>
                    <label for="username" class="label">Username</label>
                    <input
                        id="username"
                        v-model="form.username"
                        type="text"
                        class="input"
                        required
                        autofocus
                        autocomplete="username"
                    />
                    <span class="error">{{ form.errors.username }}</span>
                </div>

                <div class="mt-4">
                    <label for="email" class="label">Email</label>
                    <input
                        id="email"
                        v-model="form.email"
                        type="email"
                        class="input"
                        required
                        autocomplete="username"
                    />
                    <span class="error">{{ form.errors.email }}</span>
                </div>

                <div class="mt-4">
                    <label for="password" class="label">Password</label>
                    <input
                        id="password"
                        v-model="form.password"
                        type="password"
                        class="input"
                        required
                        autocomplete="new-password"
                    />
                    <span class="error">{{ form.errors.password }}</span>
                </div>

                <div class="mt-4">
                    <label for="password_confirmation" class="label">Confirm Password</label>
                    <input
                        id="password_confirmation"
                        v-model="form.password_confirmation"
                        type="password"
                        class="input"
                        required
                        autocomplete="new-password"
                    />
                    <span class="error">{{ form.errors.password_confirmation }}</span>
                </div>

                <div class="mt-4">
                    <button type="submit" class="button" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Register
                    </button>
                </div>
            </form>
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

.general-container {
    text-align: center;
    font-family: 'Poppins', sans-serif;
}

.logo-image {
    height: 10rem;
    width: 10rem;
    background-color: #D9D9D9;
    border-radius: 50%;
}

.custom-form {
    max-width: 400px;
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
    border-radius: 0.25rem;
    border: 1px solid #ccc;
}

.error {
    color: #ff4444;
    font-size: 0.8rem;
}

.button {
    width: 100%;
    padding: 0.5rem;
    font-size: 1rem;
    border: none;
    border-radius: 0.25rem;
    background-color: #FF4565;
    color: white;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.button:hover {
    background-color: #D80036;
}
</style>
