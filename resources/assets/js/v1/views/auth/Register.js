import React, {Component} from 'react'
import {Link} from 'react-router-dom'
import Main from './Main' // Template Login
import {Redirect} from 'react-router-dom'

import {post} from '../../lib/api'

class Register extends Component {
    constructor(){
        super();
        this.state = {
            redirect : false
        }
    }

    handleSubmit(e){
        e.preventDefault();

        var form = $('#form-register').serialize();
        var iv = {fullName: 'Arbi Mauday',name:'Arbi', email:'arbi@gmail.com'};
        console.log(form)
        post('/api/auth/register', iv)
        .then((res)=>{
            console.log(res);
            if (!res.data.isFailed) {
                alert('Try again..!!')
            } else {
                $(document).ready(function () {
                    $('.login-wrapper').pgNotification({
                        style: 'flip',
                        message: res.data.message,
                        position: 'top-right',
                        timeout: 3500,
                        type: 'info'
                    }).show();
                    setTimeout(function(){ redirect(); }, 3501);
                });
            }
        })

        const redirect = () =>{
            this.setState({redirect:true});
        }
    }

    render() {
        if(this.state.redirect){
            return <Redirect to="/login" />
        }
        return (
            <Main showForm={
                <div>
                    <p className="p-t-35">Register account / <Link to={'/login'}>Login</Link></p>
                    <form id="form-register" className="p-t-15" role="form" onSubmit={this.handleSubmit.bind(this)}>
                        <div className="form-group form-group-default">
                            <label>Full Name</label>
                            <div className="controls">
                                <input type="text" name="fullName" placeholder="Full Name" className="form-control" required/>
                            </div>
                        </div>
                        <div className="form-group form-group-default">
                            <label>Name</label>
                            <div className="controls">
                                <input type="text" className="form-control" name="name" placeholder="Name" required/>
                            </div>
                        </div>
                        <div className="form-group form-group-default">
                            <label>E-mail Address</label>
                            <div className="controls">
                                <input type="email" className="form-control" name="email" placeholder="Email Address" required/>
                            </div>
                        </div>
                        <div className="form-group form-group-default">
                            <label>Password</label>
                            <div className="controls">
                                <input type="password" className="form-control" name="password" placeholder="Password" required/>
                            </div>
                        </div>
                        <div className="form-group form-group-default">
                            <label>Confirm Password</label>
                            <div className="controls">
                                <input type="password" className="form-control" placeholder="Confirm Password" required/>
                            </div>
                        </div>

                        <button className="btn btn-info btn-cons m-t-10" type="submit">Register</button>
                    </form>
                </div>
            } />
        );
    }
}

export default Register;