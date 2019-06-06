<template>
    <div>
        <a href="#" @click.prevent="onClick">{{user.name}}</a>
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
            ])
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