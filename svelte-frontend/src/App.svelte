<script context="module">
  export const api = "http://127.0.0.1:8000/api/user_data";
</script>

<script>
  import CreateUser from "./CreateUser.svelte";
  import UpdateUser from "./UpdateUser.svelte";
  import UserList from "./UserList.svelte";
</script>

<main>
  <div class="container">
    <div class="row">
      <div class="col-sm-3">
        <CreateUser />
        <UpdateUser />
      </div>
      <div class="col-md">
        <UserList />
      </div>
    </div>
  </div>
</main>
