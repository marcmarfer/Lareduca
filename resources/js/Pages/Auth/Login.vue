<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import Checkbox from '@/Components/Checkbox.vue';

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

    <Head title="Log in" />
    <div class="gradient-background">
        <div class="general-container">
            <img src="/imgs/logo.svg" alt="Logo Lareduca" class="logo-image">
            <h1>Lar<span class="red">educa</span></h1>
            <form @submit.prevent="submit" class="custom-form">
                <div>
                    <label for="email" class="label">Email</label>
                    <input id="email" v-model="form.email" type="email" class="input" required autofocus
                        autocomplete="username" />
                    <span class="error">{{ form.errors.email }}</span>
                </div>

                <div class="mt-4">
                    <label for="password" class="label">Password</label>
                    <input id="password" v-model="form.password" type="password" class="input" required
                        autocomplete="current-password" />
                    <span class="error">{{ form.errors.password }}</span>
                </div>

                <div class="flex items-center mt-4">
                    <label class="checkbox-label flex items-center">
                        <Checkbox v-model:checked="form.remember" name="remember" class="checkbox-input" />
                        <span class="checkbox-span">Remember me</span>
                    </label>
                    <Link v-if="canResetPassword" :href="route('password.request')"
                        class="forgot-password-link ml-auto">
                    Forgot your password?
                    </Link>
                </div>

                <div class="flex justify-center mt-7">
                    <button class="button" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Log in
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


.forgot-password-link {
    text-decoration: none;
    color: white;
    font-size: 1rem;
    transition: color 0.2s ease;
}

.forgot-password-link:hover {
    color: #FF4565;
}

.checkbox-label,
.checkbox-input {
    cursor: pointer;
}

.checkbox-span {
    margin-left: 0.5rem;
}
</style>
