import React,{Component} from 'react'
// import * as global from '../../../global'
import Sidebar from './Sidebar'
import Header from './Header'

class Main extends Component{
    componentDidMount(){
        $(document).ready(function() {
            /* AJAX SETUP FOR ALL AJAX REQUEST */
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                error: function (xhr) {
                    // alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
                    let xhrResponse = JSON.parse(xhr.responseText);
                    let errorMsg = 'Request Status: ' + xhr.status + ' Error: ' + xhrResponse.message + ' Exception: ' + xhrResponse.exception;

                    $('.page-container').pgNotification({
                        style: 'bar',
                        message: errorMsg,
                        position: 'top',
                        timeout: 0,
                        type: 'error'
                    }).show();
                }
            });

            feather.replace({
                'width': 16,
                'height': 16
            });

            $('#custom-btn-page').click(function(){
                var x = $('.page-sidebar').hasClass('custom-page-sidebar');
                if(x){
                    $('.page-sidebar').removeClass('custom-page-sidebar');
                    $('.content').removeClass('custom-content');
                    $('.page-sidebar').removeAttr("style");
                }else{
                    $('.page-sidebar').addClass('custom-page-sidebar');
                    $('.content').addClass('custom-content');
                    $('.page-sidebar').attr("style", "transform: translate3d(0px, 0px, 0px) !important");
                }

                $(document).ready(function(){
                    $('.custom-page-sidebar').hover(
                        function(){
                            $('.custom-page-sidebar').attr("style", "transform: translate(210px, 0px) !important; left: -210px");
                        },
                        function () {
                            $('.custom-page-sidebar').attr("style", "transform: translate3d(0px, 0px, 0px) !important");
                        }
                    );
                });

                $(window).on('resize', function(){
                    var screen = $(window).width();
                    if(screen < 1215){
                        $('.page-sidebar').removeClass('custom-page-sidebar');
                        $('.content').removeClass('custom-content');
                    }
                });
            });
        });
    }

    render(){
        $('#root').removeClass('login-wrapper');
        $('body').css('zoom','80%');
        return(
            <div>
                <Sidebar/>

                <div className="page-container">
                    <Header/>

                    <div className="page-content-wrapper">
                        {this.props.container}
                    </div>
                </div>
            </div>
        )
    }
}

export default Main;