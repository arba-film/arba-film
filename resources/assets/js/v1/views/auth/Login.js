import React, {Component } from 'react'
import {Link} from 'react-router-dom'
import Main from './Main' // Template Login

class Login extends Component {
    render() {
        return (
            <Main showForm={
                <div>
                    <p className="p-t-35">Sign into your pages account / <Link to={'/register'}>Regis Account</Link></p>
                    <form id="form-login" className="p-t-15" role="form" action="/crm/dashboard" method="get">
                        <div className="form-group form-group-default">
                            <label>Login</label>
                            <div className="controls">
                                <input type="text" name="email" placeholder="Email" className="form-control" required/>
                            </div>
                        </div>
                        <div className="form-group form-group-default">
                            <label>Password</label>
                            <div className="controls">
                                <input type="password" className="form-control" name="password" placeholder="Password" required/>
                            </div>
                        </div>
                        <div className="row">
                            <div className="col-md-6 no-padding sm-p-l-10">
                                <div className="checkbox ">
                                    <input type="checkbox" value="1" id="checkbox1"/>
                                    <label htmlFor="checkbox1">Keep Me Signed in</label>
                                </div>
                            </div>
                            <div className="col-md-6 d-flex align-items-center justify-content-end">
                                <Link to={'/password/reset'} className="text-info small">Forgot Password?</Link>
                            </div>
                        </div>
                        <button className="btn btn-info btn-cons m-t-10" type="submit">Sign in</button>
                    </form>
                </div>
            } />
        );
    }
}

export default Login;