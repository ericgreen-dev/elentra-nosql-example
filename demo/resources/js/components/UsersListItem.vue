<template>
    <div class="d-flex justify-content-between">
        <a href="#" @click.prevent="onClick">{{user.name}}</a><span v-if="isActive"> > </span>
    </div>
</template>

<script>
    import { mapGetters, mapActions } from 'vuex';

    export default {
        name: 'users-list-item',
        props: {
            user: {
                type: Object,
                required: true
            }
        },
        computed: {
            ...mapGetters('maria', [
                'currentUser'
            ]),
            isActive() {
                return this.currentUser && this.user.id === this.currentUser.id;
            }
        },
        methods: {
            ...mapActions('maria', [
                'setUser'
            ]),
            onClick() {
                this.setUser(this.user.id);
            }
        }
    }
</script>

<style scoped>

</style>