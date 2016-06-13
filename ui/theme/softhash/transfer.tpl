{include file="sections/header.tpl"}
<div class="row">
    <div class="col-md-4">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>New Transfer</h5>

            </div>
            <div class="ibox-content">
                <div class="alert alert-danger" id="emsg">
                    <span id="emsgbody"></span>
                </div>
                <form class="form-horizontal" method="post" id="tform" role="form">
                    <div class="form-group">
                        <label for="faccount" class="col-sm-3 control-label">From</label>
                        <div class="col-sm-9">
                            <select id="faccount" name="faccount">
                                <option value="">Choose an Account</option>
                                {foreach $d as $ds}
                                    <option value="{$ds['account']}">{$ds['account']}</option>
                                {/foreach}


                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="taccount" class="col-sm-3 control-label">To</label>
                        <div class="col-sm-9">
                            <select id="taccount" name="taccount">
                                <option value="">Choose an Account</option>
                                {foreach $d as $ds}
                                    <option value="{$ds['account']}">{$ds['account']}</option>
                                {/foreach}


                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="date" class="col-sm-3 control-label">Date</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control"  value="{$mdate}" name="date" id="date" datepicker data-date-format="yyyy-mm-dd" data-auto-close="true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description" class="col-sm-3 control-label">Description</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="description" name="description">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="amount" class="col-sm-3 control-label">Amount</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control amount" id="amount"  data-a-sign="{$_c['currency_code']} " data-d-group="2" name="amount">
                        </div>
                    </div>





                    <div class="form-group">
                        <label for="tags" class="col-sm-3 control-label">Tags</label>
                        <div class="col-sm-9">
                            <input type="text" id="tags" style="width: 100%" name="tags">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3">
                            &nbsp;
                        </div>
                        <div class="col-sm-9">
                            <h4><a href="#" id="a_toggle">Advanced</a> </h4>
                        </div>
                    </div>
                    <div id="a_hide">

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label">Method</label>
                            <div class="col-sm-9">
                                <select id="pmethod" name="pmethod">
                                    <option value="">Select Payment Method</option>
                                    {foreach $pms as $pm}
                                        <option value="{$pm['name']}">{$pm['name']}</option>
                                    {/foreach}


                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="ref" class="col-sm-3 control-label">Ref#</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="ref" name="ref">
                                <span class="help-block">e.g. Transaction ID, Check No.</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                            <button type="submit" id="submit" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Recent Transfers</h5>

            </div>
            <div class="ibox-content">

                <table class="table table-bordered sys_table">
                    <thead>
                    <tr>
                        <th>Account</th>
                        <th>Description</th>
                        <th>Amount</th>

                    </tr>
                    </thead>
                    <tbody>

                    {foreach $tr as $trs}
                        <tr>
                            <td>{$trs['account']}</td>
                            <td><a href="{$_url}transactions/manage/{$trs['id']}/">{$trs['description']}</a> </td>
                            <td>{$trs['amount']}</td>
                        </tr>
                    {/foreach}

                    </tbody>
                </table>

            </div>
        </div>
    </div>

</div>

{include file="sections/footer.tpl"}
