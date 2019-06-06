export default {

    /**
     * Get users
     *
     * @param {object} state
     * @return {object}
     */
    users: (state) => Object.values(state.users),

    /**
     * Get a user's data
     *
     * @param {object} state
     * @return {object}
     */
    getUserData: (state) => (user) => state.data[user],

};
