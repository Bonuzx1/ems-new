<?php
/**
 * Created by PhpStorm.
 * User: DERBIE
 * Date: 2/19/2018
 * Time: 8:24 PM
 */
?>
</div>
<!-- /.content-wrapper -->

<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-201 <a href="#">Sean Biggy</a>.</strong> All rights
    reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li><a href="#" data-toggle="tab"><i class="fa fa-home"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
        <!-- Home tab content -->
        <div class="tab" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Recent Activity</h3>
            <ul class="control-sidebar-menu">
                <li>
                    <a href="javascript:void(0)">
                        <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                            <p>Will be 23 on April 24th</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <i class="menu-icon fa fa-user bg-yellow"></i>

                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading">New Comments</h4>

                            <p>filtered strong language</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                            <p>nora@example.com</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <i class="menu-icon fa fa-file-code-o bg-green"></i>

                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading">New upcoming events</h4>

                            <p>check the events page</p>
                        </div>
                    </a>
                </li>
            </ul>
            <!-- /.control-sidebar-menu -->
        </div>
        <!-- /.tab-pane -->
        <!-- Stats tab content -->
        <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
    </div>
</aside>
<!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->


<!-- jQuery 3 -->
<script src="asset/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="asset/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="asset/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="asset/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="asset/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="asset/js/demo.js"></script>
<!-- jQuery Version 1.11.1 -->
<script src="asset/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="asset/js/bootstrap.min.js"></script>

<!-- FullCalendar -->
<script src="asset/js/moment.min.js"> </script>
<script src="asset/js/fullcalendar.min.js"></script>
<script src="asset/js/datatable.js"></script>
<script src="asset/js/bootstrap.datatable.js"></script>
<script src="asset/js/select2.min.js"></script>
<script src="asset/js/iCheck.min.js"></script>
<script src="asset/js/inputmask.js"></script>
<script src="asset/js/html5.js"></script>

<script type="text/javascript">

    $(document).ready(function() {
        $("#save-when-to-publish").toggle(0);
        $("#date-to-publish").toggle(0);
        $('#calendar').fullCalendar({
            header: {
                left: 'av',
                center: 'title',
                right: 'prev,next today'
            },
            selectable: true,
            selectHelper: true,
            editable: true,
            select: function(start, end) {

                $('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
                $('#ModalAdd').modal('show');
            }
        });
        $("#edit-when-to-publish").click(function () {
            // $("#date-to-publish").removeAttr('disabled');
            $("#date-to-publish").toggle(1);
            $("#save-when-to-publish").toggle(1);
            $("#when-to-publish").text('');
            $(this).toggle(0);

        });
        $("#save-when-to-publish").click(function () {
            if ($("#date-to-publish").val()==='' || $("#date-to-publish").val()===moment().format("YYYY-MM-DD"))
            {
                $("#when-to-publish").text(' Immediately');
                $("#date-to-publish").toggle(0);
                // $("#date-to-publish").attr('disabled', 'disabled');
                $(this).toggle(0);
                $("#edit-when-to-publish").toggle(1);
            }
        });
        $("#date-to-publish").change(function (e) {

            var when = ($("#date-to-publish").val());

            $("#save-when-to-publish").click(function () {
                if(when==='') {
                    $("#when-to-publish").text(' Immediately');
                    console.log(this);
                    $("#date-to-publish").toggle(0);
                    $(this).toggle(0);
                    $("#edit-when-to-publish").toggle(1);

                }
                else if (when===moment().format("YYYY-MM-DD")){
                    $("#when-to-publish").text(' Immediately');
                    $("#date-to-publish").toggle(0);
                    $("#edit-when-to-publish").toggle(1);
                    $(this).toggle(0);

                }else if (when!==moment().format("YYYY-MM-DD")&&when!==''){
                    $("#when-to-publish").text('');
                    $("#when-to-publish").text(' On: '+when);
                    $("#date-to-publish").toggle(0);
                    $("#edit-when-to-publish").toggle(1);
                    $(this).toggle(0);

                }
            });
        });
        $("#user_form").on('submit', function (e) {
            console.log($(this).serialize());
            return;
        });
        $("#table").DataTable();
        $('.select2').select2();
        $('.textarea').wysihtml5()

    });

</script>

</body>
</html>

