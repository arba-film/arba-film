import React, {Component} from 'react'
import {connect} from 'react-redux'

import Layout from './layouts/Main'

class Dashboard extends Component {
    render() {
        return (
            <Layout container={
                <div className="content">
                    <div className="jumbotron" data-pages="parallax">
                        <div className=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
                            <div className="inner">
                                <ol className="breadcrumb">
                                    <li className="breadcrumb-item"><a href="#">Dashboard</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>

                    <div className="container-fluid container-fixed-lg">
                        <div className="center-margin text-center p-t-200">
                            <h2><b>{this.props.user.name}</b></h2>
                            <h3> We are still not ready. Feature is currently being developed :)</h3>
                            <button onClick={()=>this.props.update('Arbi Mauday')}>Change Name</button>
                        </div>
                    </div>
                </div>
            }/>
        )
    }
}

const mapStateToProps = (state) =>{
    return{
        user: state.user
    }
};

const mapDispatchToProps = (dispatch) => {
    return{
        update: (name) =>{
            dispatch({
                type: 'Update',
                payload: name
            });
        }
    }
};

export default connect(mapStateToProps, mapDispatchToProps)(Dashboard);