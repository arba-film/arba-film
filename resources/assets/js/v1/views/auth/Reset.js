import React, {Component} from 'react'
import {Link} from 'react-router-dom'
import Main from './Main' // Template Login

class Reset extends Component {
    render() {
        return (
            <Main showForm={
                <div>
                    <p className="p-t-35">Reset Password / <Link to={'/login'}>Login</Link> / <Link to={'/register'}>Regis Account</Link></p>
                    <form id="form-login" className="p-t-15" role="form" action="/crm/dashboard" method="get">
                        <div className="form-group form-group-default">
                            <label>Email Address</label>
                            <div className="controls">
                                <input type="text" name="email" placeholder="Email" className="form-control" required/>
                            </div>
                        </div>
                        <button className="btn btn-info btn-cons m-t-10" type="submit">Sent Password Reset Link</button>
                    </form>
                </div>
            } />
        );
    }
}

export default Reset;