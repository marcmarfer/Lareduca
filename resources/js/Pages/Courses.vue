<template>
    <div>
        <AppLayout title="Dashboard">
            <div class="courses-main-container">
                <h1>Cursos disponibles:</h1>
                <div class="courses-general-container">
                    <div class="courses-containers" v-for="course in availableCourses" :key="course.id">
                        <span style="font-weight: 600; font-size: 1.75rem;">{{ course.name }}</span>
                        <span style="font-size: 1.35rem; text-align:center">{{ course.description }}</span>
                        <button @click="enrollUser(course.id)">Subscribe</button>
                    </div>
                </div>

                <h1>Mis cursos:</h1>
                <div class="courses-general-container">
                    <div class="courses-containers" v-for="course in userCourses" :key="course.id">
                        <span style="font-weight: 600; font-size: 1.75rem;">{{ course.name }}</span>
                        <span style="font-size: 1.35rem; text-align:center">{{ course.description }}</span>
                        <button @click="unenrollUser(course.id)">Unsubscribe</button>
                    </div>
                </div>
            </div>
        </AppLayout>
    </div>
</template>


<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import axios from 'axios';

const props = defineProps({
    availableCourses: Array,
    userCourses: Array
});

const enrollUser = async (courseId) => {
    try {
        const response = await axios.post('/api/enroll-user', { courseId });
        console.log(response.data);
        window.location.reload();
    } catch (error) {
        console.error(error);
    }
};

const unenrollUser = async (courseId) => {
    try {
        const response = await axios.post('/api/unenroll-user', { courseId });
        console.log(response.data);
        window.location.reload();
    } catch (error) {
        console.error(error);
    }
};
</script>

<style scoped>
h1 {
    font-size: 2rem;
    font-family: 'Raleway', sans-serif;
    color: white;
    margin-bottom: 20px;
}

.courses-main-container {
    background-color: #2B2D42;
    padding: 2rem;
    border-radius: 10px;
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
}

button {
    margin-top: 1rem;
    background-color: #FF4565;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

button:hover {
    background-color: #EF233C;
}
</style>