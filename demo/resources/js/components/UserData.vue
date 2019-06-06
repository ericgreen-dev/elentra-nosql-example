<template>
    <div class="card">
        <template v-if="user">
            <div class="card-header">{{ user.name }}</div>
            <div class="card-body">
                <div class="p-3 text-center" v-if="isLoading">Loading...</div>
                <form v-else>
                    <h5>Primary Contact</h5>
                    <div class="form-row pb-3">
                        <div class="col-md-6 mb-3">
                            <label for="primary_email">Email Address</label>
                            <input type="email" class="form-control" id="primary_email" placeholder="email@example.com">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="primary_phone">Phone Number</label>
                            <input type="tel" class="form-control" id="primary_phone" placeholder="(000) 000-0000">
                        </div>
                    </div>
                    <h5>Emergency Contact</h5>
                    <div class="form-row pb-3">
                        <div class="col-md-6 mb-3">
                            <label for="emergency_email">Email Address</label>
                            <input type="email" class="form-control" id="emergency_email" placeholder="email@example.com" disabled>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="emergency_phone">Phone Number</label>
                            <input type="tel" class="form-control" id="emergency_phone" placeholder="(000) 000-0000" disabled>
                        </div>
                    </div>
                    <h5>Primary Address</h5>
                    <div class="form-row pb-3">
                        <div class="col-md-6 mb-3">
                            <label for="street_number">Street Number</label>
                            <input type="text" class="form-control" id="street_number" placeholder="Street Number" disabled>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="street_name">Street Name</label>
                            <input type="text" class="form-control" id="street_name" placeholder="Street Name" disabled>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="postal_code">Postal Code</label>
                            <input type="text" class="form-control" id="postal_code" placeholder="Postal Code" disabled>
                        </div>
                    </div>
                </form>
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
        data() {
            return {
                isLoading: false,
                isSaving: false
            };
        },
        props: {
            user: {
                type: Object
            }
        },
        computed: {

        },
        methods: {
            ...mapActions('maria', [
                'setUser',
                'fetchUserData'
            ]),
            onClose() {
                this.setUser(null);
            },
            async onSave() {

            }
        },
        watch: {
            async user() {
                this.isLoading = true;
                try {
                    await this.fetchUserData({ user: this.user.id });
                } catch (e) {
                    //
                }
                this.isLoading = false;
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