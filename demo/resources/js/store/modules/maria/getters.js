export default {

    /**
     * Get users
     *
     * @param {object} state
     * @return {object}
     */
    users: (state) => Object.values(state.users),

    /**
     * Get the currently selected user
     *
     * @param state
     * @return {object}
     */
    currentUser: (state) => state.users[state.ui.user],

    /**
     * Get a user's data
     *
     * @param {object} state
     * @return {object}
     */
    getUserData: (state) => (user) => state.data[user],

};
