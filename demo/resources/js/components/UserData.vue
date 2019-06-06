<template>
    <div class="card">
        <template v-if="user">
            <div class="card-header">{{ user.name }}</div>
            <div class="card-body">
<!--                Loading...-->
                <div class="d-flex justify-content-between">
                    <button class="btn btn-outline-secondary" @click.prevent="onClose">Cancel</button>
                    <button class="btn btn-success" @click.prevent="onSave">Save</button>
                </div>
            </div>
        </template>
        <template v-else>
            <div class="card-body">Please select a user</div>
        </template>
    </div>
</template>

<script>
    import { mapGetters, mapActions } from 'vuex';

    export default {
        name: 'user-data',
        props: {
            user: {
                type: Object
            }
        },
        computed: {

        },
        methods: {
            ...mapActions('maria', [
                'setUser'
            ]),
            onClose() {
                this.setUser(null);
            },
            async onSave() {

            }
        }
    }
</script>

<style scoped>
    .card-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
</style>