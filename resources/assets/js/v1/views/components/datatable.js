import React, {Component} from 'react'

export default class DataTable extends Component{
    constructor(props){
        super(props)
        var checkIdTable = props.idTable?props.idTable:'idTable';

        this.state = {
            idTable : checkIdTable,
            idSearch : 'search-'+checkIdTable,
            displayLength: props.displayLength,
        }
    }

    componentDidMount(){ // set data table
        const idTable       = () => '#'+this.state.idTable;
        const idSearch      = () => '#'+this.state.idSearch;
        const displayLength = () => this.state.displayLength;

        $(document).ready(function() {
            var table = $(idTable());

            table.dataTable({
                "sDom": "<t><'row'<p i>>",
                "destroy": true,
                "scrollCollapse": true,
                "oLanguage": {
                    "sLengthMenu": "_MENU_ ",
                    "sInfo": "Showing <b>_START_ to _END_</b> of _TOTAL_ entries"
                },
                "iDisplayLength": displayLength()
            });

            // search box for table
            $(idSearch()).keyup(function() {
                table.fnFilter($(this).val());
            });
        });
    }

    render(){
        var dataTh  = this.props.dataTh; // This part for view column title
        var dataTd  = this.props.dataTd; // This part for view column data

        return(
            <table className="table table-hover demo-table-dynamic table-responsive-block" id={this.state.idTable}>
                <thead className="bg-master-lighter">
                <tr>
                    {
                        dataTh.map(function(vm,i){
                            return (
                                <th key={i}>{vm}</th>
                            );
                        })
                    }
                </tr>
                </thead>

                <tbody>
                {
                    dataTd.map(function(vb, i) {
                        return (
                            <tr key={i}>
                                {
                                    Object.keys(vb).map(function(vm,o){
                                        return (
                                            <td key={o}>{vb[vm]}</td>
                                        );
                                    })
                                }
                            </tr>
                        );
                    })
                }
                </tbody>
            </table>
        )
    }
}