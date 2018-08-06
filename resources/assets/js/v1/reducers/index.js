import {createStore, combineReducers, applyMiddleware} from 'redux'

/*************** LIST REDUCER FOR COMBINE / DAFTAR REDUCER UNTUK MENGGABUNGKAN  ***************/

const users = (state={name:'Arbi',email:'arbi@gmail.com'}, action) => {
    switch (action.type){
        case 'Update' :
            return state = {
                name: action.payload
            };
        default :
            return state;
    }
};


/* Created and Register Store */
const store = createStore(
    combineReducers({
        user:users
    })
);

export default store;