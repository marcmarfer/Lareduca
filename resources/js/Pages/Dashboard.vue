<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { ref, onMounted } from 'vue';
import axios from 'axios';

const props = defineProps({
    userCourses: Array
});

const userName = ref('');

onMounted(() => {
    axios.get('/api/user-logged-in')
    .then(response => {
        userName.value = response.data.name;
    })
    .catch(error => {
      console.error('Error fetching user data:', error);
    });
});
</script>

<template>
    <AppLayout title="Dashboard">
        <div class="home-main-container">
            <h1>Welcome to the <span class="lareduca-text">Lareduca</span> network, {{ userName }}!</h1>
            <img src="/imgs/home-image.jpg" alt="">
            <h2>Mis cursos:</h2>
            <div class="courses-general-container">
                <a class="courses-containers" v-for="course in userCourses" :key="course.id" :href="`/dashboard/courses/${course.id}`">
                    <span style="font-weight: 600; font-size: 1.75rem;">{{ course.name }}</span>
                    <span style="font-size: 1.35rem; text-align:center">{{ course.description }}</span>
                </a>
            </div>
        </div>
    </AppLayout>
</template>

<style scoped>
h1 {
    font-size: 3rem;
    color: white;
    margin-bottom: 20px;
    font-family: 'Poppins', sans-serif;
    text-align: center;
}

h2 {
    font-size: 2rem;
    font-family: 'Raleway', sans-serif;
    color: white;
    margin-bottom: 20px;
}

.home-main-container {
    background-color: #2B2D42;
    padding: 2rem;
    border-radius: 10px;
    max-height: 96.5vh;
    overflow: auto;
}

img {
    width: 100%;
    height: auto;
    border-radius: 10px;
    margin-bottom: 20px;
}

.lareduca-text {
    color: #FF4565;
}

.courses-general-container {
    display: flex;
    flex-wrap: wrap;
    gap: 30px;
    align-items: center;
    margin-bottom: 20px;
    font-family: 'Poppins', sans-serif;
}

.courses-containers {
    border-radius: 10px;
    display: flex;
    flex-direction: column;
    background-color: #8D99AE;
    color: #2B2D42;
    width: 25rem;
    height: 15rem;
    padding: 20px;
    justify-content: center;
    align-items: center;
    cursor: pointer;
}
</style>
