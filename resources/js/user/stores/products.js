import Vuex from "vuex";
import api from "../../axios.js";

const store = new Vuex.Store({
    state () {
        return {
            products:{},
        }
    },
    getters:{
        getProducts(state){
            return state.products;
        },
    },
    actions:{
        async getProducts(context){
            try {
                const {data} = await api.get('products')
                context.commit('setProducts', data);
            } catch (error) {
                throw error
            }
        },
    },
    mutations:{
        setProducts(state,data){
            state.products = data;
        },
    }
});

export default store;
