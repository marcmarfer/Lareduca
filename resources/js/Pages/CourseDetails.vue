<template>
    <div>
      <AppLayout title="Dashboard">
        <main class="tasks-main-container">
          <div class="top-container">
            <h1>{{ course.name }}</h1>
            <button v-if="currentUserRole.some(role => role.name === 'admin')" class="add-assignment-button"><a :href="`/dashboard/courses/${course.id}/add-assignment`">Add assignment</a></button>
          </div>
  
          <div v-if="assignments.length">
            <h2 class="assignments-title">Assignments</h2>
            <div class="assignments-list">
              <div v-for="assignment in assignments" :key="assignment.id" class="assignment-item">
                <h3>{{ assignment.title }}</h3>
                <p>{{ assignment.description }}</p>
                <p>Due Date: {{ assignment.due_date }}</p>
                <p>Assigned by: {{ assignedByNames[assignment.assigned_by] }}</p>
                <button v-if="currentUserRole.some(role => role.name === 'admin')" class="delete-assignment-button" @click="deleteAssignment(assignment.id)">Delete assignment</button>
              </div>
            </div>
          </div>
          <div v-else>
            <p class="no-assignments">No assignments available.</p>
          </div>
        </main>
      </AppLayout>
    </div>
</template>
  
<script setup>
import { ref, onMounted } from 'vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import axios from 'axios';

const props = defineProps({
  course: Object,
  assignments: Array,
  currentUserRole: Array
});

const assignedByNames = ref({});

const getUserById = async (userId) => {
  try {
    const response = await axios.get(`/api/users/${userId}`);
    return response.data.name;
  } catch (error) {
    console.error(`Error fetching user with ID ${userId}:`, error);
    return 'Unknown';
  }
};

const fetchAssignedByNames = async () => {
  const userIds = [...new Set(props.assignments.map(a => a.assigned_by))];
  for (const userId of userIds) {
    if (!assignedByNames.value[userId]) {
      const userName = await getUserById(userId);
      assignedByNames.value = {
        ...assignedByNames.value,
        [userId]: userName
      };
    }
  }
};

onMounted(() => {
  fetchAssignedByNames();
});

const deleteAssignment = async (assignmentId) => {
  try {
    const response = await axios.delete(`/api/delete-assignment/${assignmentId}`);
    console.log(response.data);
    window.location.reload();
  } catch (error) {
    console.error(error);
  }
};
</script>
  
<style scoped>
.top-container {
  display: flex;
  justify-content: space-between;
  margin-bottom: 40px;
}
  
h1 {
  font-weight: 600;
  font-size: 2.5rem;
  color: white;
}

h2 {
  font-weight: 600;
  font-size: 2rem;
  margin-bottom: 20px;
}

h3 {
  font-weight: 600;
  font-size: 1.8rem;
  margin-bottom: 10px;
}
  
p {
  font-size: 1.5rem;
  margin-bottom: 10px;
}

.assignments-title {
  color: white;
}
 
.assignments-list {
  list-style-type: none;
  padding: 0;
}
  
.assignment-item {
  border-radius: 10px;
  display: flex;
  flex-direction: column;
  background-color: #8D99AE;
  color: #2B2D42;
  width: 100%;
  padding: 20px;
  margin-bottom: 20px;
  justify-content: center;
}
  
.no-assignments {
  font-size: 1.5rem;
  color: white;
}
  
.tasks-main-container {
  background-color: #2B2D42;
  padding: 2rem;
  border-radius: 10px;
  font-family: 'Poppins', sans-serif;
  max-height: 96.5vh;
  overflow: auto;
}

button {
  color: white;
  height: 3rem;
  width: 12rem;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s;
}
  
.add-assignment-button {
  background-color: #fc7b44;
}

.add-assignment-button:hover {
  background-color: #dd632f;
}
  
.delete-assignment-button {
  background-color: #FF4565;
}
  
.delete-assignment-button:hover {
  background-color: #EF233C;
}
  
</style>
  