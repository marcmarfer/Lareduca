<script setup>
import { ref } from "vue";
import { Head, Link, router } from "@inertiajs/vue3";
import ApplicationMark from "@/Components/ApplicationMark.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import NavLink from "@/Components/NavLink.vue";

defineProps({
  title: String,
});

const showingUserDropdown = ref(false);

const logout = () => {
  router.post(route("logout"));
};
</script>

<template>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet" />
  <div class="general-container">
    <nav class="text-white">
      <Link :href="route('dashboard')">
      <div class="logo-container">
        <img src="/imgs/logo.svg" alt="Logo Lareduca" class="logo-image" />
        Lareduca
      </div>
      </Link>
      <div class="navigation-links-container">
        <NavLink :href="route('dashboard')" :active="route().current('dashboard')" class="navigation-links">
          Home
        </NavLink>
        <NavLink :href="route('dashboard.user-management')" :active="route().current('dashboard.user-management')"
          class="navigation-links">
          User Management
        </NavLink>
        <NavLink :href="route('dashboard.statistics')" :active="route().current('dashboard.statistics')"
          class="navigation-links">
          Statistics
        </NavLink>
        <NavLink :href="route('dashboard.courses')" :active="route().current('dashboard.courses')"
          class="navigation-links">
          Courses
        </NavLink>
        <NavLink :href="route('dashboard.tasks')" :active="route().current('dashboard.tasks')" class="navigation-links">
          Tasks
        </NavLink>
        <NavLink :href="route('dashboard.grades')" :active="route().current('dashboard.grades')"
          class="navigation-links">
          Grades
        </NavLink>
        <NavLink :href="route('dashboard.contacts')" :active="route().current('dashboard.contacts')"
          class="navigation-links">
          Contacts
        </NavLink>
      </div>

      <div class="profile-container">
        <div class="flex items-center space-x-4">
          <button @click="showingUserDropdown = !showingUserDropdown" class="text-sm font-semibold relative">
            {{ $page.props.auth.user.name }}
            <div v-show="showingUserDropdown" class="absolute bottom-8 w-48 bg-gray-900 rounded-md shadow-lg">
              <div class="py-1">
                <a :href="route('profile.show')" class="block w-full text-left px-4 py-2 text-sm hover:bg-gray-700">
                  Profile
                </a>
                <!-- Logout Button -->
                <button @click="logout" class="block w-full text-left px-4 py-2 text-sm hover:bg-gray-700">
                  Logout
                </button>
              </div>
            </div>
          </button>
        </div>
      </div>
    </nav>

    <div class="flex flex-col flex-1">
      <main class="py-12 px-4 flex-1">
        <div class="max-w-7xl mx-auto">
          <slot />
        </div>
      </main>
    </div>
  </div>
</template>

<style scoped>
.general-container {
  display: flex;
  height: 100vh;
  background-color: #8D99AE;
}

nav {
  width: 22rem;
  background-color: #2B2D42;
  padding: 1.25rem 0rem 0rem 1.25rem;
}

.logo-image {
  width: 5rem;
  background-color: #D9D9D9;
  border-radius: 50%;
  margin-right: 1rem;
}

.logo-container {
  font-family: "Poppins", sans-serif;
  display: flex;
  align-items: center;
  font-size: 1.75rem;
}

.navigation-links-container {
  display: flex;
  flex-direction: column;
  padding-top: 3rem;
}

.navigation-links {
  font-family: "Poppins", sans-serif;
  font-size: 1.125rem;
  color: white;
  margin-bottom: 2rem;
  font-weight: 300;
}

.profile-container {
  position: absolute;
  bottom: 1.25rem;
  left: 1.25rem;
}
</style>
