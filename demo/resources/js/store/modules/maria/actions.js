import * as Requests from './requests';

export default {

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
