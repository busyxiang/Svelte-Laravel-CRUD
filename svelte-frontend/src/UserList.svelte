<script>
  import { onMount } from "svelte";
  import axios from "axios";
  import { api } from "./App.svelte";

  let users = [];

  onMount(async () => {
    axios.get(api).then((response) => {
      users = response.data;
    });
  });

  function deleteUser(user) {
    axios.delete(`${api}/${user.id}`).then((response) => {
      location.reload();
    });
  }
</script>

<div class="card fluid">
  <table>
    <caption>Users</caption>
    <thead>
      <tr>
        <th>id</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Remove</th>
      </tr>
    </thead>
    <tbody>
      {#each users as user}
        <tr>
          <td>{user.id}</td>
          <td>{user.firstName}</td>
          <td>{user.lastName}</td>
          <td>
            <button on:click={deleteUser(user)}>delete</button>
          </td>
        </tr>
      {/each}
    </tbody>
  </table>
</div>
