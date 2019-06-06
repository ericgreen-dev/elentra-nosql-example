export default {

    /**
     * Get a user's data
     *
     * @param {object} state
     * @return {object}
     */
    getUserData: (state) => (user) => state.users[user],

};
