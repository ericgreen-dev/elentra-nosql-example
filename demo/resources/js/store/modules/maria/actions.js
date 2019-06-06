import * as Types from  './types';
import * as Requests from './requests';
import {SET_CURRENT_USER} from "./types";


export default {

    /**
     * Set the current user
     *
     * @param {Function} commit
     * @param {int}      user
     *
     * @return {*}
     */
    setUser({ commit }, user) {
        return commit({ type: Types.SET_CURRENT_USER, payload: user });
    },

    /**
     * Fetch system users
     *
     * @param {Function} dispatch
     *
     * @return {Promise<*>}
     */
    async fetchUsers({ dispatch }) {
        return dispatch('api', Requests.fetchUsers(), { root: true });
    },

    /**
     * Fetch as user's data
     *
     * @param {Function} dispatch
     * @param {int}      user
     *
     * @return {Promise<*>}
     */
    async fetchUserData({ dispatch }, { user }) {
        return dispatch('graphql', Requests.fetchUserData({ user }), { root: true });
    }

};
