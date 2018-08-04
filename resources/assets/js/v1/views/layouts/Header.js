import React, {Component} from 'react'
import {Link} from 'react-router-dom'
import {connect} from 'react-redux'

class Header extends Component{
    render(){
        return(
            <div id="nav-and-notification">
                <div className="header light bg-primary">
                    <a href="#" data-toggle="sidebar"
                       className="btn-link toggle-sidebar hidden-lg-up pg pg-menu custom-btn-page"></a>
                    {/*<div>*/}
                        {/*<div className="brand inline p-l-0"  style={{width: 230, marginTop: -7}}>*/}
                            {/*<img src="/core/img/logo_crm.png" alt="logo"*/}
                                 {/*data-src="/core/img/logo_crm.png"*/}
                                 {/*data-src-retina="/core/img/logo_crm.png" width="165"/>*/}
                            {/*<span className="text-white fs-14 ">v.</span>*/}
                        {/*</div>*/}
                    {/*</div>*/}
                    <div className="col-md-2 col-sm-1 hidden-xs"></div>
                    <div className="col-md-5 col-sm-8">
                        <div className="input-group">
                            <input type="text" id="search-box" className="form-control" placeholder="Search"/>
                        </div>
                    </div>

                    <div className="d-flex align-items-center">
                        <ul className="notification-list no-margin hidden-sm-down b-grey b-r no-style p-l-30 p-r-20">
                            <li className="p-r-10 inline">
                                <div className="dropdown"></div>
                            </li>
                            <li className="p-r-10 inline">
                                <a href="#" className="header-icon fa fa-comment white cursor m-b-5"
                                   style={{fontSize: 18}}></a>
                            </li>
                            <li className="p-r-10 inline">
                                <a href="#" className="header-icon pg pg-thumbs white"></a>
                            </li>
                        </ul>

                        <div className="pull-left p-r-10 fs-14 font-heading m-l-20 hidden-md-down">
                            <span className="semi-bold white">{this.props.user.name}</span>
                        </div>
                        <div className="dropdown pull-right ">
                            <button className="profile-dropdown-toggle" type="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                            <span className="thumbnail-wrapper d32 circular inline">
                                <img src="/core/img/profiles/avatar_small2x.jpg" alt="" width="32"
                                     height="32"/>
                            </span>
                            </button>
                            <div className="dropdown-menu dropdown-menu-right profile-dropdown" role="menu">
                                <a href="#" className="dropdown-item"><i className="fa fa-user"></i> Profile</a>
                                <a href="#" className="dropdown-item"><i className="fa fa-envelope"></i>
                                    Notifications</a>
                                <a href="#" className="dropdown-item"><i className="pg-signals"></i> Help</a>
                                <Link to="/" id="logout-btn" className="clearfix bg-master-lighter dropdown-item">
                                    <span className="pull-left">Logout</span>
                                    <span className="pull-right"><i className="pg-power"></i></span>
                                </Link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        )
    }
}


const mapStateToProps = (state)=>{
    return {
        user: state.user
    }
};

export default connect(mapStateToProps)(Header);