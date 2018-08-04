import React, {Component} from 'react'
import Layout from './layouts/Main'

import ComponentIndex from './components/Index'

export default class ViewComponent extends Component {
    render() {

        return (
            <Layout container={
                <div className="content">
                    <div className="jumbotron" data-pages="parallax">
                        <div className=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
                            <div className="inner">
                                <ol className="breadcrumb">
                                    <li className="breadcrumb-item">Element UI</li>
                                    <li className="breadcrumb-item active"><a href="#">Component</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>

                    <div className="container-fluid container-fixed-lg">
                        <div className="row">
                            <ComponentIndex/>
                        </div>
                    </div>
                </div>
            }/>
        )
    }
}