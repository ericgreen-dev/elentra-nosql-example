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
        state.users[meta.user] = payload.data;
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

};
