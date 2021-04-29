<script>
  import axios from "axios";
  import { api } from "./App.svelte";

  let userData = { firstName: "", lastName: "" };

  function createUser() {
    if (userData.firstName.length === 0 || userData.lastName.length === 0)
      return;

    axios.post(api, userData).then((response) => {
      location.reload();
    });
  }
</script>

<div class="card">
  <h2>Create User</h2>
  <label for="firstName">First Name</label>
  <input bind:value={userData.firstName} type="text" />
  <label for="lastName">Last Name</label>
  <input bind:value={userData.lastName} type="text" />
  <button on:click={createUser}>Submit</button>
</div>

<style>
  h2 {
    text-align: center;
  }
</style>
