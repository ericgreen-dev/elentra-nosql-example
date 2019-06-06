<template>
    <div>
        Maria Example
    </div>
</template>

<script>
    import { mapActions, mapGetters } from 'vuex';

    export default {
        name: 'maria-example',
        methods: {
            ...mapActions('maria', [
                'fetchUserData'
            ])
        },
        computed: {
            ...mapGetters('maria', [
                'getUserData'
            ])
        },
        async mounted() {
            try {
                await this.fetchUserData({ user: 12 });
                console.log(this.getUserData(12))
            } catch (e) {
                //
            }
        }
    }
</script>

<style scoped>

</style>