
{include file="sections/header.tpl"}
<div class="row">
    <div class="col-md-6">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Edit TAX</h5>

            </div>
            <div class="ibox-content">

                <form role="form" name="accadd" method="post" action="{$_url}settings/edit-tax-post/">
                    <div class="form-group">
                        <label for="taxname">Name</label>
                        <input type="text" class="form-control" id="taxname" name="taxname" value="{$d['name']}">
                    </div>
                    <div class="form-group">
                        <label for="taxrate">Rate</label>
                        <input type="text" class="form-control" id="taxrate" name="taxrate" value="{$d['rate']}">
                    </div>

<input type="hidden" id="tid" name="tid" value="{$d['id']}">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button> | Or <a href="{$_url}tax/list/"> Back To The List</a>
                </form>

            </div>
        </div>



    </div>



</div>




{include file="sections/footer.tpl"}
