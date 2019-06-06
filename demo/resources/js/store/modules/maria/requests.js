import * as Types from './types';

/**
 * Fetch a user's data (GraphQL)
 *
 * @param {int} user
 *
 * @return {object}
 */
export const fetchUserData = ({ user }) => ({
    mutations: [
        { type: `maria/${Types.FETCH_USER_DATA_REQUEST}`, meta: { user } },
        { type: `maria/${Types.FETCH_USER_DATA_SUCCESS}`, meta: { user } },
        { type: `maria/${Types.FETCH_USER_DATA_FAILURE}`, meta: { user } }
    ],
    schema: 'maria',
    query: `query FetchUserData {
                user_data(user: ${user}) {
                    user { email, id },
                    data { primary_contact { primary_email } }
                }
            }`
});

/**
 * Fetch users (REST)
 *
 * @return {object}
 */
export const fetchUsers = () => ({
    mutations: [
        `maria/${Types.FETCH_USERS_REQUEST}`,
        `maria/${Types.FETCH_USERS_SUCCESS}`,
        `maria/${Types.FETCH_USERS_FAILURE}`,
    ],
    path: '/maria/users',
});

