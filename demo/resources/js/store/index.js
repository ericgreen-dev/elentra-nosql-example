import { Store } from 'vuex';
import MariaDB from './modules/maria/store';

/**
 * Create a new mutation object
 *
 * @param {string|object} mutation
 * @param {*}             payload
 * @param {boolean}       error
 *
 * @return {*}
 */
const makeMutation = (mutation, payload = undefined, error = false) => {
    if (typeof mutation === 'string') {
        return { type: mutation, payload, error };
    }
    return { type: mutation.type, meta: mutation.meta, payload, error };
};

/**
 * Clean args and strip out any undefined
 *
 * @param {object} args
 * @return {object}
 */
const clean = (args) => Object.keys(args).reduce((cleaned, key) => {
    if (args[key] !== undefined) {
        cleaned[key] = args[key];
    }
    return cleaned;
}, {});


export default new Store({
    state: {},
    strict: true,
    mutations: {},
    getters: {},
    modules: {
        maria: MariaDB
    },

    /**
     * Root Store Actions
     */
    actions: {

        /**
         * Make a request to the REST API
         *
         * @param {Function} commit
         * @param {Array}    mutations
         * @param {string}   method
         * @param {string}   path
         * @param {object}   args
         * @param {object}   headers
         *
         * @return {Promise<*>}
         */
        async api({ commit }, { mutations, method = 'get', path, args = null, headers = {} }) {
            if (mutations.length > 2) {
                commit(makeMutation(mutations[0]));
            }

            let data,
                json,
                response;

            try {
                let request = {
                    headers: new Headers({...{'Content-Type': 'application/json'}, ...headers})
                };

                if (method !== 'get' && args !== null) {
                    request.body = JSON.stringify(clean(args));
                }

                response = await fetch(
                    method === 'get' && args !== null
                        ? API_PATH + path + $.param(clean(args))
                        : API_PATH + path,
                    { ...request }
                );
                data = await response.text();

                try {
                    json = JSON.parse(data);
                } catch (e) {
                    //
                }

                commit(makeMutation(mutations[mutations.length > 2 ? 1 : 0], json || data));

            } catch (e) {
                if (mutations.length > 2) {
                    commit({ ...makeMutation(mutations[2], e, true) });
                } else {
                    console.error(e);
                }
                throw e;
            }

            return response;
        },

        /**
         * Make a request to the GraphQL API
         *
         * @param {Function} commit
         * @param {Array}    mutations
         * @param {string}   schema
         * @param {string}   query
         * @param {object}   args
         * @param {object}   headers
         *
         * @return {Promise<*>}
         */
        async graphql({ commit }, { mutations, query, schema = 'default', headers = {} }) {
            if (mutations.length > 2) {
                commit(makeMutation(mutations[0]));
            }

            let data, response;

            try {
                let response = await fetch(`${GRAPHQL_PATH}/${schema}?query=${encodeURIComponent(query)}`, {
                    method: 'get',
                    headers: new Headers({...{'Content-Type': 'application/json'}, ...headers})
                });

                try {
                    data = await response.json();
                } catch (e) {
                    //
                }

                commit(makeMutation(mutations[mutations.length > 2 ? 1 : 0], data));

            } catch (e) {
                if (mutations.length > 2) {
                    commit({ ...makeMutation(mutations[2], e, true) });
                } else {
                    console.error(e);
                }
                throw e;
            }

            return response;
        }

    },
});
