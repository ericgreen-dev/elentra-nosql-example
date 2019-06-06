import Vue from 'vue';
import * as Types from './types';

export default {

    /**
     * Fetch User Data – Request
     *
     * @param {object} state
     * @param {*}      payload
     *
     * @return {void}
     */
    [Types.FETCH_USER_DATA_REQUEST] (state, payload) {
        //
    },

    /**
     * Fetch User Data – Success
     *
     * @param {object} state
     * @param {object} meta
     * @param {object} payload
     *
     * @return {void}
     */
    [Types.FETCH_USER_DATA_SUCCESS] (state, { payload, meta }) {
        state.data[meta.user] = payload.data.user_data.data;
    },

    /**
     * Fetch User Data – Failure
     *
     * @param {object} state
     * @param {*}      payload
     *
     * @return {void}
     */
    [Types.FETCH_USER_DATA_FAILURE] (state, payload) {
        //
    },

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * Fetch Users – Request
     *
     * @param {object} state
     * @param {*}      payload
     *
     * @return {void}
     */
    [Types.FETCH_USERS_REQUEST] (state, payload) {
        //
    },

    /**
     * Fetch Users – Success
     *
     * @param {object} state
     * @param {object} meta
     * @param {object} payload
     *
     * @return {void}
     */
    [Types.FETCH_USERS_SUCCESS] (state, { payload }) {
        payload.forEach(user => Vue.set(state.users, user.id, user));
    },

    /**
     * Fetch Users – Failure
     *
     * @param {object} state
     * @param {*}      payload
     *
     * @return {void}
     */
    [Types.FETCH_USERS_FAILURE] (state, payload) {
        //
    },

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * Set the currently visible user
     *
     * @param {object} state
     * @param {*}      payload
     *
     * @return {void}
     */
    [Types.SET_CURRENT_USER] (state, { payload }) {
        state.ui.user = payload;
    },

};
