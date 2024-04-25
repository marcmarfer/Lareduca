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
  <div class="flex h-screen">
    <nav class="bg-gray-800 text-white border-r border-gray-700 flex-shrink-0 w-72">
      <div class="h-16 flex items-center justify-center">
        <Link :href="route('dashboard')">
          <img src="/imgs/logo.svg" alt="Logo Lareduca" class="logo-image" />
        </Link>
      </div>
      <div class="py-4 space-y-1 flex flex-col">
        <NavLink
          :href="route('dashboard.home')"
          :active="route().current('dashboard.home')"
          class="px-6 py-3 block text-white"
        >
          Home
        </NavLink>
        <NavLink
          :href="route('dashboard.user-management')"
          :active="route().current('dashboard.user-management')"
          class="px-6 py-3 block text-white"
        >
          User Management
        </NavLink>
        <NavLink
          :href="route('dashboard.statistics')"
          :active="route().current('dashboard.statistics')"
          class="px-6 py-3 block text-white"
        >
          Statistics
        </NavLink>
        <NavLink
          :href="route('dashboard.courses')"
          :active="route().current('dashboard.courses')"
          class="px-6 py-3 block text-white"
        >
          Courses
        </NavLink>
        <NavLink
          :href="route('dashboard.tasks')"
          :active="route().current('dashboard.tasks')"
          class="px-6 py-3 block text-white"
        >
          Tasks
        </NavLink>
        <NavLink
          :href="route('dashboard.grades')"
          :active="route().current('dashboard.grades')"
          class="px-6 py-3 block text-white"
        >
          Grades
        </NavLink>
        <NavLink
          :href="route('dashboard.contacts')"
          :active="route().current('dashboard.contacts')"
          class="px-6 py-3 block text-white"
        >
          Contacts
        </NavLink>
      </div>

      <div class="border-t border-gray-700 px-6 py-3">
        <div class="flex items-center space-x-4">
          <button
            @click="showingUserDropdown = !showingUserDropdown"
            class="text-sm font-semibold relative"
          >
            {{ $page.props.auth.user.name }}
            <div
              v-show="showingUserDropdown"
              class="absolute left-0 mt-2 w-48 bg-gray-900 rounded-md shadow-lg"
            >
              <div class="py-1">
                <DropdownLink
                  :href="route('profile.show')"
                  class="block px-4 py-2 text-sm hover:bg-gray-700"
                >
                  Profile
                </DropdownLink>
                <!-- Logout Button -->
                <button
                  @click="logout"
                  class="block w-full text-left px-4 py-2 text-sm hover:bg-gray-700"
                >
                  Logout
                </button>
              </div>
            </div>
          </button>
        </div>
      </div>
    </nav>

    <div class="flex flex-col flex-1">
      <header class="bg-gray-200 border-b border-gray-300 px-4 py-6">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ title }}</h2>
      </header>

      <main class="py-12 px-4 flex-1">
        <div class="max-w-7xl mx-auto">
          <div class="bg-white shadow-xl sm:rounded-lg p-6">
            <slot />
          </div>
        </div>
      </main>
    </div>
  </div>
</template>
