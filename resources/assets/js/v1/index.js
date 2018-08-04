import React , {Component} from 'react';
import ReactDom from 'react-dom';
import {Provider} from 'react-redux';

// set Router
import { BrowserRouter } from 'react-router-dom';
/*Router Page*/
import Routes from './routes';
/*Redux store*/
import store from './reducers';

ReactDom.render(
    <BrowserRouter>
        <Provider store={store}>
            <Routes/>
        </Provider>
    </BrowserRouter>
, document.getElementById('root'));

// ReactDom.render((
//     <Routes/>
// ), document.getElementById('root'));