<template>
    <div>
      <AppLayout title="Dashboard">
        <div class="tasks-main-container">
          <h1>Mis cursos:</h1>
          <div class="courses-general-container">
            <a v-for="course in userCourses" :key="course.id" :href="`/dashboard/courses/${course.id}`">
              <div class="courses-containers">
                <span style="font-weight: 600; font-size: 1.75rem;">{{ course.name }}</span>
                <span style="font-size: 1.35rem; text-align:center">{{ course.description }}</span>
              </div>
            </a>
          </div>
  
          <h1>Juegos educativos:</h1>
          <div class="educational-games-general-container">
            <a v-for="game in educationalGames" :key="game.id" :href="`/dashboard/games/${game.id}`">
              <div class="educational-games-containers">
                <span style="font-weight: 600; font-size: 1.75rem;">{{ game.name }}</span>
                <span style="font-size: 1.35rem; text-align:center">{{ game.description }}</span>
              </div>
            </a>
          </div>
        </div>
      </AppLayout>
    </div>
</template>
  
<script setup>
  import AppLayout from '@/Layouts/AppLayout.vue';
  
  const props = defineProps({
    userCourses: Array,
    educationalGames: Array
  });
</script>
  
<style scoped>
h1 {
  font-size: 2rem;
  font-family: 'Raleway', sans-serif;
  color: white;
  margin-bottom: 20px;
}
  
.tasks-main-container {
  background-color: #2B2D42;
  padding: 2rem;
  border-radius: 10px;
}
  
.courses-general-container, .educational-games-general-container {
  display: flex;
  flex-wrap: wrap;
  gap: 30px;
  align-items: center;
  margin-bottom: 20px;
   font-family: 'Poppins', sans-serif;
}
  
.courses-containers, .educational-games-containers {
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
  transition: transform 0.3s;
  cursor: pointer;
}
  
.courses-containers:hover, .educational-games-containers:hover {
  transform: scale(1.05);
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