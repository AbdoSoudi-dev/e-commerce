import Vuex from "vuex";
import createPersistedState from "vuex-persistedstate";

const store = new Vuex.Store({
    state () {
        return {
            user:{},
            token:""
        }
    },
    mutations:{
        setUser(state,payload){
            state.user = payload;
        },
        setToken(state,payload){
            state.token = payload;
        },
    },
    plugins: [createPersistedState()],

});

export default store;
