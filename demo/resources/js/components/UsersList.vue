<template>
    <div class="card">
        <div class="card-header">Users</div>
        <div class="card-body">
            <ul v-if="users.length" class="list-group list-group-flush">
                <li class="list-group-item" v-for="(user) in users">
                    <users-list-item :user="user" :key="user.id"></users-list-item>
                </li>
            </ul>
            <div v-else>Loading...</div>
        </div>
    </div>
</template>

<script>
    import UsersListItem from './UsersListItem';

    export default {
        name: 'users-list',
        components: {
            UsersListItem
        },
        props: {
            users: {
                type: Array,
                default: () => []
            }
        }
    }
</script>

<style scoped>

</style>