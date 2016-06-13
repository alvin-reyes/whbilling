{include file="sections/header.tpl"}
<div class="row animated fadeInDown">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Total Email Sent: {$cnt} </h5>
                <a href="#" class="btn btn-primary btn-sm pull-right" id="clear_logs"><i class="fa fa-list"></i> Clear Old Data</a>



            </div>
            <div class="ibox-content" id="sysfrm_ajaxrender">


                <table class="table table-bordered sys_table" id="sys_logs">
                    <thead>
                    <tr>
                        <th width="5%">ID</th>
                        <th>Date</th>
                        <th>Sent To</th>
                        <th width="60%">Subject</th>
                        <th>Manage</th>

                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>


        </div>
    </div>
</div>
{include file="sections/footer.tpl"}