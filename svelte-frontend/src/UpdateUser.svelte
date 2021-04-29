<script>
  import axios from "axios";
  import { api } from "./App.svelte";

  let userID;
  let userData = { firstName: "", lastName: "" };

  function updateUser() {
    if (
      !userID ||
      userData.firstName.length === 0 ||
      userData.lastName.length === 0
    )
      return;

    axios.patch(`${api}/${userID}`, userData).then((response) => {
      location.reload();
    });
  }
</script>

<div class="card">
  <h2>Update User</h2>
  <label for="id">ID</label>
  <input bind:value={userID} type="number" />
  <label for="firstName">First Name</label>
  <input bind:value={userData.firstName} type="text" />
  <label for="lastName">Last Name</label>
  <input bind:value={userData.lastName} type="text" />
  <button on:click={updateUser}>Submit</button>
</div>

<style>
  h2 {
    text-align: center;
  }
</style>
