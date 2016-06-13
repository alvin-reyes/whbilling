{include file="sections/header.tpl"}
<div class="row">
    <div class="col-md-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>{$d['name']}</h5>

            </div>
            <div class="ibox-content">
                <div class="alert alert-danger" id="emsg">
                    <span id="emsgbody"></span>
                </div>
                <form class="form-horizontal" method="post" id="pg-conf" role="form">

                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="name" name="name" value="{$d['name']}" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="settings" class="col-sm-3 control-label">Settings Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="settings" name="settings" value="{$d['settings']}" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="value" class="col-sm-3 control-label">Value</label>
                        <div class="col-sm-9">
                            <textarea id="value" class="form-control" rows="3">{$d['value']}</textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="status" class="col-sm-3 control-label">Status</label>
                        <div class="col-sm-9">
                            <select name="status" id="status" class="form-control">
                                <option value="Active" {if $d['status'] eq 'Active'}selected="selected" {/if}>Active</option>
                                <option value="Inactive" {if $d['status'] eq 'Inactive'}selected="selected" {/if}>Inactive</option>

                            </select>

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="c1" class="col-sm-3 control-label">
                            {if ($d['name'] eq 'Paypal') OR ($d['name'] eq 'Stripe')}
Currency Code
                                {else}
                                Custom Param 1
                            {/if}
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="c1" name="c1" value="{$d['c1']}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="c2" class="col-sm-3 control-label">
                            {if $d['name'] eq 'Paypal'}
                                Conversion Rate
                            {else}
                                Custom Param 2
                            {/if}
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="c2" name="c2" value="{$d['c2']}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="c3" class="col-sm-3 control-label">Custom Param 3</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="c3" name="c3" value="{$d['c3']}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="c4" class="col-sm-3 control-label">Custom Param 4</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="c4" name="c4" value="{$d['c4']}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="c5" class="col-sm-3 control-label">Custom Param 5</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="c5" name="c5" value="{$d['c5']}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                            <input type="hidden" name="pgid" id="pgid" value="{$d['id']}">
                            <button type="submit" id="submit" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button>
                            | Or <a href="{$_url}settings/pg/"> Back To The List</a>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </div>



</div>




{include file="sections/footer.tpl"}
