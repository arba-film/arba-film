import React, {Component} from 'react'
import PropTypes from 'prop-types'
// import * as global from '../../../global'

class Main extends Component {

    render() {
        // document.getElementById('root').classList.add('login-wrapper');
        $('body').css('zoom','')
        $('#root').addClass('login-wrapper');
        return (
            <div className="login-wrapper" style={{overflow:'auto'}}>
                <div className="bg-pic">
                    <img src="/core/img/vector-bg-mount.jpg" data-src="/core/img/vector-bg-mount.jpg"
                         data-src-retina="/core/img/vector-bg-mount.jpg" alt="" className="lazy"/>
                    <div className="bg-caption pull-bottom sm-pull-bottom text-white p-l-20 m-b-20">
                        <h2 className="semi-bold text-white">Committed to Better Quaility</h2>
                        <p className="small">
                            Images Displayed are solely for representation purposes only, All work copyright of
                            respective
                            owner, otherwise © 2017 GlobalXtreme.
                        </p>
                    </div>
                </div>
                <div className="login-container bg-white" style={{display:'inline-table'}}>
                    <div className="p-l-50 m-l-20 p-r-50 m-r-20 p-t-50 m-t-50 sm-p-l-15 sm-p-r-15 sm-p-t-40">
                        <img src="/core/img/logo.png" alt="logo" data-src="/core/img/logo.png"
                             data-src-retina="/core/img/logo_2x.png" width="78" height="22"/>
                        <span className=" fs-14 ">v.</span>
                        {this.props.showForm}
                    </div>
                </div>
            </div>
        );
    }
}

Main.propTypes = {
    showForm: PropTypes.element.isRequired,
};

export default Main;