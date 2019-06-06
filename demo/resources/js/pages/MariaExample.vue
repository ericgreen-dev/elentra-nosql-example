<template>
    <div>
        <div class="row" v-if="users.length">
            <div class="col-sm-4">
                <users-list v-if="users.length" :users="users"></users-list>
            </div>
            <div class="col-sm-8">
                <user-data :user="currentUser"></user-data>
            </div>
        </div>
        <div v-else>Loading...</div>
    </div>
</template>

<script>
    import { mapActions, mapGetters } from 'vuex';
    import UsersList from '../components/UsersList';
    import UserData from '../components/UserData';

    export default {
        name: 'maria-example',
        components: {
            UsersList,
            UserData
        },
        methods: {
            ...mapActions('maria', [
                'fetchUsers',
            ])
        },
        computed: {
            ...mapGetters('maria', [
                'users',
                'currentUser'
            ])
        },
        async mounted() {
            try {
                await this.fetchUsers();
            } catch (e) {
                //
            }
        }
    }
</script>

<style scoped>

</style>