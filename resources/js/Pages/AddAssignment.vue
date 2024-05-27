<template>
  <div>
    <AppLayout title="Dashboard">
      <div class="tasks-main-container">
        <h1>Add Assignment</h1>
        <form @submit.prevent="submitAssignment">
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" v-model="form.title" id="title" required />
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <textarea v-model="form.description" id="description" required></textarea>
          </div>
          <div class="form-group">
            <label for="dueDate">Due Date and Time</label>
            <input type="datetime-local" v-model="form.dueDate" id="dueDate" required />
          </div>
          <div class="form-group">
            <label for="totalPoints">Total Points</label>
            <input type="number" v-model="form.totalPoints" id="totalPoints" required />
          </div>
          <div class="form-group">
            <label for="status">Status</label>
            <select v-model="form.status" id="status" required>
              <option value="pending">Pending</option>
              <option value="completed">Completed</option>
              <option value="graded">Graded</option>
            </select>
          </div>
          <div class="form-group">
            <label for="fileAttachment">File Attachment (Optional)</label>
            <input type="text" v-model="form.fileAttachment" id="fileAttachment" />
          </div>
          <div class="form-group">
            <label for="assignmentType">Assignment Type</label>
            <select v-model="form.assignmentType" id="assignmentType" required>
              <option value="homework">Homework</option>
              <option value="quiz">Quiz</option>
              <option value="project">Project</option>
            </select>
          </div>
          <button type="submit">Submit</button>
        </form>
      </div>
    </AppLayout>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';
import AppLayout from '@/Layouts/AppLayout.vue';

const form = ref({
  title: '',
  description: '',
  dueDate: '',
  totalPoints: '',
  status: 'pending',
  assignedBy: '',
  fileAttachment: '',
  assignmentType: 'homework'
});

onMounted(() => {
  //doing this to get the courseId from the URL
  const pathArray = window.location.pathname.split('/');
  const courseId = pathArray[pathArray.length - 2];
  form.value.courseId = courseId;

  axios.get('/api/user-logged-in')
    .then(response => {
      form.value.assignedBy = response.data.id;
    })
    .catch(error => {
      console.error('Error fetching user data:', error);
    });
});

const submitAssignment = async () => {
  try {
    const response = await axios.post('/api/add-assignment', form.value);
    alert(response.data.message);
  } catch (error) {
    console.error(error);
    alert('Error adding assignment');
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

.tasks-main-container {
  background-color: #2b2d42;
  padding: 2rem;
  border-radius: 10px;
  max-height: 95vh;
  overflow-y: auto;
}

.form-group {
  margin-bottom: 15px;
}

label {
  display: block;
  margin-bottom: 5px;
  font-size: 1.25rem;
  color: white;
}

input,
textarea,
select {
  width: 100%;
  padding: 10px;
  border: 1px solid #8d99ae;
  border-radius: 5px;
  font-size: 1rem;
}

button {
  background-color: #fc7b44;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s;
  font-size: 1rem;
}

button:hover {
  background-color: #dd632f;
}
</style>
