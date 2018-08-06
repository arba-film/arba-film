import React, {Component} from 'react'
import {connect} from 'react-redux'

import Layout from '../layouts/Main'

class Home extends Component {
    render() {
        return (
            <Layout container={
                <div className="content">
                    <div className="container-fluid container-fixed-lg m-t-35">
                        <div className="row">

                            <div className="col-md-2">
                                <div className="card card-default card-bg-dark">
                                    <div className="card-block no-padding">
                                        <img src="https://upload.wikimedia.org/wikipedia/en/thumb/3/36/SamsonPoster.jpeg/220px-SamsonPoster.jpeg" width="100%" height="250px" alt=""/>
                                    </div>
                                    <div className="card-header p-t-15 text-white">
                                        <div className="card-title">
                                            Samson 2018
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
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

export default connect(mapStateToProps, mapDispatchToProps)(Home);