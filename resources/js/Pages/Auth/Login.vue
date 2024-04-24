<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.transform(data => ({
        ...data,
        remember: form.remember ? 'on' : '',
    })).post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <div class="gradient-background">
        <div class="general-container">
            <img src="/imgs/logo.svg" alt="Logo Lareduca" class="logo-image">
            <h1>Lar<span class="rojo">educa</span></h1>
            <form @submit.prevent="submit" class="custom-form">
                <div>
                    <label for="email" class="label">Email</label>
                    <input
                        id="email"
                        v-model="form.email"
                        type="email"
                        class="input"
                        required
                        autofocus
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
                        autocomplete="current-password"
                    />
                    <span class="error">{{ form.errors.password }}</span>
                </div>

                <div class="block mt-4">
                    <label class="flex items-center">
                        <Checkbox v-model:checked="form.remember" name="remember" />
                        <span class="ms-2 text-sm text-gray-600">Remember me</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <Link v-if="canResetPassword" :href="route('password.request')" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Forgot your password?
                    </Link>

                    <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Log in
                    </PrimaryButton>
                </div>
            </form>
        </div>
    </div>
</template>

<style scoped>
h1 {
    font-size: 5rem;
    letter-spacing: 0.25rem;
    color: white;
    margin: 20px 0px 20px 0px;
}

.rojo {
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
    font-family: 'Poppins', sans-serif;
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
