import React, {Component} from 'react'

import Datatable from './datatable'

export default class Index extends Component {
    constructor() {
        super();
        this.state = {
            listData: []
        }
    }

    componentWillMount(){
        this.setState({
            listData: [
                {appName: 'Hyperlapes', description: 'Description goes here', price: 'FREE', notes: 'Notes go here'},
                {appName: 'Facebook', description: 'Description goes here', price: 'FREE', notes: 'Notes go here'},
                {appName: 'Twitter', description: 'Description goes here', price: 'FREE', notes: 'Notes go here'},
                {appName: 'Foursquare', description: 'Description goes here', price: 'FREE', notes: 'Notes go here'},
                {appName: 'Angry Birds', description: 'Description goes here', price: 'FREE', notes: 'Notes go here'},
                {appName: 'GX App', description: 'Description goes here', price: 'FREE', notes: 'Notes go here'},
                {appName: 'Sbn Customer', description: 'Description goes here', price: 'FREE', notes: 'Notes go here'},
            ]
        });
    }

    render() {
        return (
            <div className="col-md-12 m-b-10">

                <div className="card no-border m-b-10">
                    <div className="card-header">
                        <div className="card-title">Table Component</div>
                        <div className="pull-title">
                            {/*make column search*/}
                            <div className="col-xs-12 pull-right">
                                <input type="text" id="search-nameTableId" className="form-control" placeholder="Search"/>
                            </div>
                        </div>
                    </div>
                    <div className="card-block">
                        <Datatable
                            dataTh={['App name','Description','Price', 'Notes']}
                            dataTd={this.state.listData}
                            idTable={"nameTableId"}
                            displayLength={5}
                        />
                    </div>
                </div>

            </div>
        )
    }
}