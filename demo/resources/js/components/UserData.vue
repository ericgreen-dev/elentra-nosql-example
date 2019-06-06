<template>
    <div class="card">
        <template v-if="user">
            <div class="card-header">{{ user.name }}</div>
            <div class="card-body">
                <div v-if="notice.visible" class="alert" :class="notice.type" role="alert">{{ notice.message }}</div>
                <div class="p-3 text-center" v-if="isLoading">Loading...</div>
                <form v-else>
                    <h5>Primary Contact</h5>
                    <div class="form-row pb-3">
                        <div class="col-md-6 mb-3">
                            <label for="primary_email">Email Address</label>
                            <input type="email" class="form-control" id="primary_email" placeholder="email@example.com" v-model="data.primary_contact.primary_email" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="primary_phone">Phone Number</label>
                            <input type="tel" class="form-control" id="primary_phone" placeholder="(000) 000-0000" v-model="data.primary_contact.primary_phone" required>
                        </div>
                    </div>
                    <h5>Emergency Contact</h5>
                    <div class="form-row pb-3">
                        <div class="col-md-6 mb-3">
                            <label for="emergency_email">Email Address</label>
                            <input type="email" class="form-control" id="emergency_email" placeholder="email@example.com" :value="data.emergency_contact.primary_email" disabled>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="emergency_phone">Phone Number</label>
                            <input type="tel" class="form-control" id="emergency_phone" placeholder="(000) 000-0000" :value="data.emergency_contact.primary_phone" disabled>
                        </div>
                    </div>
                    <h5>Primary Address</h5>
                    <div class="form-row pb-3">
                        <div class="col-md-6 mb-3">
                            <label for="street_number">Street Number</label>
                            <input type="text" class="form-control" id="street_number" placeholder="Street Number" :value="data.primary_address.street_number" disabled>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="street_name">Street Name</label>
                            <input type="text" class="form-control" id="street_name" placeholder="Street Name" :value="data.primary_address.street_name" disabled>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="postal_code">Postal Code</label>
                            <input type="text" class="form-control" id="postal_code" placeholder="Postal Code" :value="data.primary_address.postal_code" disabled>
                        </div>
                    </div>
                </form>
                <div class="d-flex justify-content-between">
                    <button class="btn btn-outline-secondary" :disabled="isSaving" @click.prevent="onClose">Cancel</button>
                    <button class="btn btn-success" :disabled="isSaving" @click.prevent="onSave">Save</button>
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
                isSaving: false,
                data: {
                    primary_contact: {
                        primary_email: '',
                        primary_phone: ''
                    },
                    emergency_contact: {
                        primary_email: '',
                        primary_phone: ''
                    },
                    primary_address: {
                        street_number: '',
                        street_name: '',
                        postal_code: ''
                    }
                },
                notice: {
                    type: '',
                    message: '',
                    visible: false,
                    timeout: null
                }
            };
        },
        props: {
            user: {
                type: Object
            },
        },
        computed: {
            ...mapGetters('maria', [
                'getUserData'
            ])
        },
        methods: {
            ...mapActions('maria', [
                'setUser',
                'fetchUserData',
                'updateUserData'
            ]),
            showNotice(type, message, timeout = 1000) {
                if (this.notice.timeout) {
                    clearTimeout(this.notice.timeout);
                }
                this.notice.type    = `alert-${type}`;
                this.notice.message = message;
                this.notice.visible = true;
                this.notice.timeout = setTimeout(() => this.clearNotice(), timeout);
            },
            clearNotice() {
                this.notice.visible = false;
            },
            onClose() {
                this.setUser(null);
            },
            async onSave() {
                this.isSaving = true;
                try {
                    await this.updateUserData({
                        user: this.user.id,
                        data: {
                            primaryContact: {
                                primaryEmail: this.data.primary_contact.primary_email,
                                primaryPhone: this.data.primary_contact.primary_phone
                            }
                        }
                    });
                    this.showNotice('success', 'User successfully updated!');
                } catch (e) {
                    this.showNotice('danger', 'An error occurred while trying to update this user.');
                }
                this.isSaving = false;
            }
        },
        watch: {
            async user() {
                this.isLoading = true;
                this.notice.visible = false;
                try {
                    await this.fetchUserData({ user: this.user.id });
                    this.data = this.getUserData(this.user.id);
                } catch (e) {
                    this.showNotice('danger', 'An error occurred while trying to fetch this user\'s data.');
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