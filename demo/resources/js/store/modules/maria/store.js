import actions from './actions';
import getters from './getters';
import mutations from './mutations';
import initialState from './state';

export default {
    actions,
    getters,
    mutations,
    strict: true,
    namespaced: true,
    state: initialState()
};
