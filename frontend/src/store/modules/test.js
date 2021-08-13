

const state = {
    counter : 1
};

const getters = {
    counter: (state) =>{
        return state.counter
    },
    getCount : (state) =>  {
        return state.counter * 2;
    },
    multiCount : (state) => (multiCount) =>{
        return state.counter * multiCount
    }
};

const actions = {
    insertAfter1second({commit})
    {
        setTimeout(function(){
            commit("increase")
        },1000)
    }
};

const mutations = {
    increase(state)
    {
        return state.counter++
    },
    n_increase(state, n)
    {
        state.counter += n
    }
};


export default {
    state,
    getters,
    actions,
    mutations
}