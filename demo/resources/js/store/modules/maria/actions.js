import * as Requests from './requests';

export default {

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
