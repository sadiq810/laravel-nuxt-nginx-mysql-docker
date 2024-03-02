<template>
  <div>
    <h1>SSR DATA</h1>
    <h3>{{ data?.message }}</h3>
    <table>
      <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
      </tr>
      </thead>
      <tbody>
        <tr v-for="user in data?.users" :key="user.id">
          <td>{{ user.id }}</td>
          <td>{{ user.name }}</td>
          <td>{{ user.email }}</td>
        </tr>
      </tbody>
    </table>
    <hr>

    <h3>Non SSR Call Result</h3>
    <table>
      <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
      </tr>
      </thead>
      <tbody>
      <tr v-for="user in usersList" :key="user.id">
        <td>{{ user.id }}</td>
        <td>{{ user.name }}</td>
        <td>{{ user.email }}</td>
      </tr>
      </tbody>
    </table>
  </div>
</template>
<script lang="ts" setup>
  const { data, pending, error, refresh } = await useAsyncData("users", () => $fetch(useRuntimeConfig().public.apiSsrBase + "/ssr"));

  let usersList = useState("usersList", () => ([]));

  onMounted(async() => {
    let response = await $fetch(useRuntimeConfig().public.apiBase + "/non-ssr");
    usersList.value = response?.users;
  })

</script>
