import * as Types from './types';

/**
 * Fetch a user's data
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