import React, {Component} from  'react'
import Layout from './layouts/Main'

export default class Scroll extends Component {
    render() {
        return (
            <Layout container={
                <div className="content">
                    <div className="jumbotron" data-pages="parallax">
                        <div className=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
                            <div className="inner">
                                <ol className="breadcrumb">
                                    <li className="breadcrumb-item">Element UI</li>
                                    <li className="breadcrumb-item active"><a href="#">Scroll</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>

                    <div className="container-fluid container-fixed-lg">
                        <div className="center-margin text-center p-t-200">
                            <h2><b>Coming Soon!</b></h2>
                            <h3> We are still not ready. Feature is currently being developed :)</h3>
                        </div>
                    </div>
                </div>
            }/>
        )
    }
}