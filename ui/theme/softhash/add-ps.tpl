{include file="sections/header.tpl"}
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">

        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Add {$type}</h5>
                    <div class="ibox-tools">
                       {if $type eq 'Product'}
                           <a href="{$_url}ps/p-list" class="btn btn-primary btn-xs">List Products</a>
                       {/if}
                        {if $type eq 'Service'}
                            <a href="{$_url}ps/s-list" class="btn btn-primary btn-xs">List Services</a>
                        {/if}


                    </div>
                </div>
                <div class="ibox-content">
                    <div class="alert alert-danger" id="emsg">
                        <span id="emsgbody"></span>
                    </div>

                    <form class="form-horizontal" id="rform">

                        <div class="form-group"><label class="col-lg-2 control-label" for="name">{$type} Name</label>

                            <div class="col-lg-10"><input type="text" id="name" name="name" class="form-control" autocomplete="off">

                            </div>
                        </div>

                        <div class="form-group"><label class="col-lg-2 control-label" for="sales_price">Sales Price</label>

                            <div class="col-lg-10"><input type="text" id="sales_price" name="sales_price" class="form-control" autocomplete="off">

                            </div>
                        </div>
                        <div class="form-group"><label class="col-lg-2 control-label" for="item_number">Item Number</label>

                            <div class="col-lg-10"><input type="text" id="item_number" value="{$nxt}" name="item_number" class="form-control" autocomplete="off">

                            </div>
                        </div>
                        <div class="form-group"><label class="col-lg-2 control-label" for="description">Description</label>

                            <div class="col-lg-10"><textarea id="description" class="form-control" rows="3"></textarea>

                            </div>
                        </div>


<input type="hidden" id="type" name="type" value="{$type}">



                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">

                                <button class="btn btn-sm btn-primary" type="submit" id="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>
{include file="sections/footer.tpl"}