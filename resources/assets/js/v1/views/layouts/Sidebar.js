import React, {Component} from 'react'
import {Link} from 'react-router-dom'

export default class Sidebar extends Component {
    render() {
        return (

            <nav className="page-sidebar" data-pages="sidebar">
                
                <div className="sidebar-overlay-slide from-top" id="appMenu">

                </div>
                <div className="sidebar-header">
                    <img src="/core/img/logo_crm.png" alt="logo"
                         data-src="/core/img/logo_crm.png"
                         data-src-retina="/core/img/logo_crm.png" width="140"/>
                    <div className="custom-div-btn-page">
                        <a id="custom-btn-page" href="javascript:;" className="btn-link pg-menu custom-btn-page"></a>
                    </div>
                </div>

                <div className="sidebar-menu">
                    <ul className="menu-items">
                        <li className="m-t-30">
                            <Link to="/home" className="detailed">
                                <span className="title">Home</span>
                            </Link>
                            <span className="icon-thumbnail"><i data-feather="airplay"></i></span>
                        </li>
                        <li className="">
                            <a  href="javascript:;"className="">
                                <span className="title">Element UI</span>
                                <span className="arrow"></span>
                            </a>
                            <span className="icon-thumbnail"><i data-feather="cpu"></i></span>
                            <ul className="sub-menu">
                                <li className="">
                                    <Link to="/en/ui/table">Table</Link>
                                    <span className="icon-thumbnail">tb</span>
                                </li>
                                <li className="">
                                    <Link to="/en/ui/pagination">Pagination</Link>
                                    <span className="icon-thumbnail">pn</span>
                                </li>
                                <li className="">
                                    <Link to="/en/ui/scroll">Scroll</Link>
                                    <span className="icon-thumbnail">sc</span>
                                </li>
                                <li className="">
                                    <Link to="/en/ui/component">Component</Link>
                                    <span className="icon-thumbnail">cp</span>
                                </li>
                            </ul>
                        </li>

                    </ul>
                    <div className="clearfix"></div>
                </div>
            </nav>
        )
    }
}
