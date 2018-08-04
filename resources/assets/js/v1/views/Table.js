import React, {Component} from 'react'
import Layout from './layouts/Main'

export default class Table extends Component {
    constructor() {
        super();
        this.state = {
            listTbl2: [],
            value: {
                app: '', des: '', price: '', note: ''
            }
        };
        this.modalOpen = this.modalOpen.bind(this);
        this.handleSubmit = this.handleSubmit.bind(this);
    }

    modalOpen(){ // show modal
        $('#addNewAppModal').modal('show');
    }

    handleSubmit(e){ // submit
        e.preventDefault();
        this.state.listTbl2.push({
            appName: this.state.value.app, description: this.state.value.des,
            price: this.state.value.price, notes: this.state.value.note
        });
        this.setState(this.state);
        $('#addNewAppModal').modal('hide'); // hide modal
        this.setState({
            value : {
                app: '', des: '', price: '', note: ''
            }
        });
    }

    componentWillMount(){ // list data
        this.state.listTbl2 = [
            {appName: 'Hyperlapes', description: 'Description goes here', price: 'FREE', notes: 'Notes go here'},
            {appName: 'Facebook', description: 'Description goes here', price: 'FREE', notes: 'Notes go here'},
            {appName: 'Twitter', description: 'Description goes here', price: 'FREE', notes: 'Notes go here'},
            {appName: 'Foursquare', description: 'Description goes here', price: 'FREE', notes: 'Notes go here'},
            {appName: 'Angry Birds', description: 'Description goes here', price: 'FREE', notes: 'Notes go here'},
            {appName: 'GX App', description: 'Description goes here', price: 'FREE', notes: 'Notes go here'},
            {appName: 'Sbn Customer', description: 'Description goes here', price: 'FREE', notes: 'Notes go here'},
        ];
    }

    componentDidMount(){ // set data table
        $(document).ready(function() {
            var table = $('#tableWithDynamicRows');

           table.dataTable({
               "sDom": "<t><'row'<p i>>",
               "destroy": true,
               "scrollCollapse": true,
               "oLanguage": {
                   "sLengthMenu": "_MENU_ ",
                   "sInfo": "Showing <b>_START_ to _END_</b> of _TOTAL_ entries"
               },
               "iDisplayLength": 5
           });

            // search box for table
            $('#search-table').keyup(function() {
                table.fnFilter($(this).val());
            });
        });
    }

    render() {
        // console.log(this.props.location.pathname)
        return (
            <Layout container={
                <div className="content">
                    <div className="jumbotron" data-pages="parallax">
                        <div className=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
                            <div className="inner">
                                <ol className="breadcrumb">
                                    <li className="breadcrumb-item">Element UI</li>
                                    <li className="breadcrumb-item active"><a href="#">Table</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>

                    <div className="container-fluid container-fixed-lg">
                        <div className="row">

                            <div className="col-md-12 m-b-30">

                                <div
                                    className="widget-11-2 card no-border card-condensed no-margin widget-loader-circle align-self-stretch d-flex flex-column">
                                    <div className="card-header ">
                                        <div className="card-title">Pages detailed view table</div>
                                    </div>
                                    <div className="card-block">
                                        <div className="table-responsive">
                                            <table className="table table-striped table-hover settingDT">
                                                <thead className="bg-master-lighter">
                                                <tr>
                                                    <th className="text-black">Name</th>
                                                    <th className="text-black">Division (Branch)</th>
                                                    <th className="text-black">Active</th>
                                                    <th className="text-black">Start Date</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>Revolution Begins</td>
                                                    <td>Active</td>
                                                    <td>40,000 USD</td>
                                                    <td>April 13, 2014</td>
                                                </tr>
                                                <tr>
                                                    <td>Revolution Begins</td>
                                                    <td>Active</td>
                                                    <td>70,000 USD</td>
                                                    <td>April 13, 2014</td>
                                                </tr>
                                                <tr>
                                                    <td>Revolution Begins</td>
                                                    <td>Active</td>
                                                    <td>20,000 USD</td>
                                                    <td>April 13, 2014</td>
                                                </tr>
                                                <tr>
                                                    <td>Revolution Begins</td>
                                                    <td>Active</td>
                                                    <td>90,000 USD</td>
                                                    <td>April 13, 2014</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div className="col-md-12 m-b-30">

                                <div
                                    className="widget-11-2 card no-border card-condensed no-margin widget-loader-circle align-self-stretch d-flex flex-column">
                                    <div className="card-header ">
                                        <div className="card-title col-md-12">Table with Dynamic Rows</div>

                                        <div className="col-md-12 no-padding m-t-15">
                                            <div className="pull-left">
                                                <div className="col-xs-12">
                                                    <button onClick={this.modalOpen} className="btn btn-primary btn-cons"><i
                                                        className="fa fa-plus"></i> Add row
                                                    </button>
                                                </div>
                                            </div>
                                            <div className="pull-right">
                                                <div className="col-xs-12">
                                                    <input type="text" id="search-table" className="form-control pull-right" placeholder="Search"/>
                                                </div>
                                            </div>
                                            <div className="clearfix"></div>
                                        </div>
                                    </div>
                                    <div className="card-block">
                                        <table className="table table-hover demo-table-dynamic table-responsive-block"
                                               id="tableWithDynamicRows">
                                            <thead className="bg-master-lighter">
                                            <tr>
                                                <th>App name</th>
                                                <th>Description</th>
                                                <th>Price</th>
                                                <th>Notes</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            {
                                                this.state.listTbl2.map(function(vm, i) {
                                                    return (
                                                        <tr key={i}>
                                                            <td>{vm.appName}</td>
                                                            <td>{vm.description}</td>
                                                            <td>{vm.price}</td>
                                                            <td>{vm.notes}</td>
                                                        </tr>
                                                    );
                                                })
                                            }
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    {/*ADD MODAL*/}
                    <div className="modal fade stick-up" id="addNewAppModal" role="dialog"
                         aria-labelledby="addNewAppModal" aria-hidden="true">
                        <div className="modal-dialog">
                            <div className="modal-content">
                                <div className="modal-header clearfix ">
                                    <button type="button" className="close" data-dismiss="modal" aria-hidden="true">
                                        <i className="pg-close fs-14"></i>
                                    </button>
                                    <h4 className="p-b-5"><span className="semi-bold">New</span> App</h4>
                                </div>
                                <form role="form" onSubmit={this.handleSubmit} id="intoTable">
                                    <div className="modal-body">
                                        <p className="small-text">Create a new app using this form, make sure you fill
                                            them all</p>

                                        <div className="row">
                                            <div className="col-sm-12">
                                                <div className="form-group form-group-default">
                                                    <label>name</label>
                                                    <input type="text" className="form-control" value={this.state.value.app}
                                                           onChange={(e) => {
                                                               this.state.value.app = e.target.value;
                                                               this.setState(this.state)
                                                           }}
                                                           name="appName"
                                                           placeholder="Name of your app"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div className="row">
                                            <div className="col-sm-12">
                                                <div className="form-group form-group-default">
                                                    <label>Description</label>
                                                    <input type="text" className="form-control" value={this.state.value.des}
                                                           onChange={(e) => {
                                                               this.state.value.des = e.target.value;
                                                               this.setState(this.state)
                                                           }}
                                                           name="description"
                                                           placeholder="Tell us more about it"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div className="row">
                                            <div className="col-sm-6">
                                                <div className="form-group form-group-default">
                                                    <label>Price</label>
                                                    <input type="text" className="form-control" value={this.state.value.price}
                                                           onChange={(e) => {
                                                               this.state.value.price = e.target.value;
                                                               this.setState(this.state)
                                                           }}
                                                           name="price"
                                                           placeholder="your price"/>
                                                </div>
                                            </div>
                                            <div className="col-sm-6">

                                                <div className="form-group form-group-default">
                                                    <label>Notes</label>
                                                    <input type="text" className="form-control" value={this.state.value.note}
                                                           onChange={(e) => {
                                                               this.state.value.note = e.target.value;
                                                               this.setState(this.state)
                                                           }}
                                                           name="notes"
                                                           placeholder="a note"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div className="modal-footer">
                                        <button type="submit" className="btn btn-primary btn-cons">Add</button>
                                        <button type="button" className="btn btn-cons" data-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            }/>
        )
    }
}