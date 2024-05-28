<template>
    <AppLayout title="Dashboard">
        <div v-if="currentUserRole.some(role => role.name === 'admin')" class="user-management-general-container">
            <button @click="showAddUserForm = true">New User</button>

            <div v-if="showAddUserForm" class="add-user-form">
                <h2>Add New User</h2>
                <form @submit.prevent="addUser">
                    <label for="name">Name:</label>
                    <input type="text" v-model="newUser.name" id="name" required />

                    <label for="email">Email:</label>
                    <input type="email" v-model="newUser.email" id="email" required />

                    <label for="password">Password:</label>
                    <input type="password" v-model="newUser.password" id="password" required />

                    <label for="roles">Role:</label>
                    <select v-model="newUser.role_id" id="roles" required>
                        <option value="1">Admin</option>
                        <option value="2">Student</option>
                        <option value="3">Teacher</option>
                    </select>

                    <button type="submit">Add User</button>
                    <button type="button" @click="showAddUserForm = false">Cancel</button>
                </form>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role(s)</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="user in users" :key="user.id">
                        <td>{{ user.name }}</td>
                        <td>{{ user.email }}</td>
                        <td>{{ formatRoles(user.roles) }}</td>
                        <td>
                            <a>Edit</a>
                            <a @click="deleteUser(user.id)">Delete</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div v-else>
            <p>You have no permissions to see this view!</p>
        </div>
    </AppLayout>
</template>

<script setup>
import { ref } from 'vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import axios from 'axios';
import bcrypt from 'bcryptjs';

const formatRoles = (roles) => {
  if (!roles || roles.length === 0) {
    return 'no roles assigned';
  }
  return roles.map(role => role.name).join(', ');
};

const props = defineProps({
    users: Array,
    currentUserRole: Array
});

const showAddUserForm = ref(false);
const newUser = ref({
    name: '',
    email: '',
    password: '',
    role_id: ''
});

const addUser = async () => {
    try {
        const userData = { ...newUser.value};
        const response = await axios.post('/api/add-user', userData);
        console.log(response.data);
        window.location.reload();
    } catch (error) {
        console.error(error);
    }
};

const deleteUser = async (userId) => {
    try {
        await axios.delete(`/api/delete-role/${userId}/roles`);
        await axios.delete(`/api/delete-course-enrollments/${userId}/courses`);
        
        const response = await axios.delete(`/api/delete-user/${userId}`);
        console.log(response.data);
        window.location.reload();
    } catch (error) {
        console.error(error);
    }
};
</script>

<style scoped>
.user-management-general-container {
    overflow: auto;
    height: 96.5vh;
}

table {
    width: 100%;
    border-collapse: collapse;
    color: #D9D9D9;
    font-family: 'Poppins', sans-serif;
}

table th,
table td {
    padding: 8px;
    border-bottom: 1px solid #2B2D42;
}

table th {
    background-color: #2B2D42;
    font-weight: bold;
    text-align: left;
}

table tbody tr {
    background-color: #3B3E5A;
}

table tbody tr:hover {
    background-color: rgb(45, 47, 70);
}

.add-user-form {
    background-color: #2B2D42;
    padding: 2rem;
    border-radius: 10px;
    margin: 0 0 1rem 0;
}

.add-user-form h2 {
    font-size: 2rem;
    margin-bottom: 1rem;
    color: #fff;
}

.add-user-form label {
    display: block;
    margin-bottom: 0.5rem;
    color: #D9D9D9;
}

.add-user-form input,
.add-user-form select {
    width: 100%;
    padding: 0.5rem;
    margin-bottom: 1rem;
    border-radius: 5px;
    border: 1px solid #D9D9D9;
}

button {
    background-color: #FF4565;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-bottom: 1rem;
}

button[type="submit"] {
    background-color: #FF8652;
}

button[type="button"] {
    background-color: #FF4565;
    margin-left: 1rem;
}

button:hover {
    opacity: 0.8;
}

a {
    margin-right: 1rem;
    cursor: pointer;
}
</style>