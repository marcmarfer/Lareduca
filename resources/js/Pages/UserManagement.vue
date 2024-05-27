<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { defineProps } from 'vue';

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
</script>

<template>
    <AppLayout title="Dashboard">
        <div v-if="currentUserRole.some(role => role.name === 'admin')">
            <button>New User</button>
            <table>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Rol(es)</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="user in users" :key="user.id">
                        <td>{{ user.name }}</td>
                        <td>{{ user.email }}</td>
                        <td>{{ formatRoles(user.roles) }}</td>
                        <td>
                            <button>Editar</button>
                            <button>Borrar</button>
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


<style scoped>
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
</style>
