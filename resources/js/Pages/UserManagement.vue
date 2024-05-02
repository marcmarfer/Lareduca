<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';

const formatRoles = (roles) => {
    if (!roles || roles.length === 0) {
        return 'no roles assigned';
    }
    return roles.map(role => role.name).join(', ');
};

const props = defineProps({
    users: Array,
});
</script>

<template>
    <AppLayout title="Dashboard">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <div>
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