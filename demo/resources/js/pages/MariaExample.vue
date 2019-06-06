<template>
    <div>
        <users-list v-if="users.length" :users="users"></users-list>
    </div>
</template>

<script>
    import { mapActions, mapGetters } from 'vuex';
    import UsersList from '../components/UsersList';

    export default {
        name: 'maria-example',
        components: {
            UsersList
        },
        methods: {
            ...mapActions('maria', [
                'fetchUsers',
            ])
        },
        computed: {
            ...mapGetters('maria', [
                'users'
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