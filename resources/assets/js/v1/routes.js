import React, {Component} from 'react'
import {Route, Switch} from 'react-router-dom'

// import * as global from '../global'

/*************** VIEWS PAGE ***************/
/* authentication */
import Login from './views/auth/Login'
import Register from './views/auth/Register'
import Reset from './views/auth/Reset'

/* Component UI */
import Dashboard from './views/Dashboard'
import Table from './views/Table'
import Pagination from './views/Pagination'
import Scroll from './views/Scroll'
import ViewComponent from './views/Viewcomponent'

/* PAGES */
import Home from './views/pages/Home'

export default class routes extends Component{
    render(){
        return(
                <Switch>
                    <Route exact path="/" name="Login" component={Login} />
                    <Route exact path="/login" name="Login" component={Login} />
                    <Route exact path="/register" name="Register" component={Register} />
                    <Route exact path="/password/reset" name="Reset" component={Reset} />

                    <Route exact auth="true" path={'/home'} name="Home" component={Home} />

                    <Route exact auth="true" path={'/en'} name="Dashboard" component={Dashboard} />
                    <Route exact auth="true" path={'/en/dashboard'} name="Dashboard" component={Dashboard} />
                    <Route exact auth="true" path={'/en/ui/table'} name="Table" component={Table} />
                    <Route exact auth="true" path={'/en/ui/pagination'} name="Pagination" component={Pagination} />
                    <Route exact auth="true" path={'/en/ui/scroll'} name="Scroll" component={Scroll} />
                    <Route exact auth="true" path={'/en/ui/component'} name="Component" component={ViewComponent} />
                </Switch>
        );
    }
}