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
    query:
`query FetchUserData {
    user_data(user: ${user}) {
        user { email, id },
        data { 
            primary_contact { 
                primary_email,
                primary_phone
            },
            emergency_contact {
                primary_email,
                primary_phone
            },
            primary_address {
                street_number,
                street_name,
                postal_code
            }
        }
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


/**
 * Update a user's data (GraphQL)
 *
 * @param {int}    user
 * @param {object} data
 *
 * @return {object}
 */
export const updateUserData = ({ user, data: { primaryContact: { primaryEmail, primaryPhone }} }) => ({
    mutations: [
        { type: `maria/${Types.UPDATE_USER_DATA_REQUEST}`, meta: { user } },
        { type: `maria/${Types.UPDATE_USER_DATA_SUCCESS}`, meta: { user } },
        { type: `maria/${Types.UPDATE_USER_DATA_FAILURE}`, meta: { user } }
    ],
    schema: 'maria',
    query:
`mutation UpdateUserData {
    update_contact(
        user_id: ${user}, 
        data: { 
            primary_phone: ${JSON.stringify(primaryPhone)}, 
            primary_email: ${JSON.stringify(primaryEmail)} 
    }) {
        data { 
            primary_contact { 
                primary_email,
                primary_phone
            }
        }
    }
}`
});