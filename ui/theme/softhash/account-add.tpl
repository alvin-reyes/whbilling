
{include file="sections/header.tpl"}
<div class="row">
    <div class="col-md-6">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>{$_L['Add_New_Account']}</h5>

            </div>
            <div class="ibox-content">

                <form role="form" name="accadd" method="post" action="{$_url}accounts/add-post">
                    <div class="form-group">
                        <label for="account">Account Title</label>
                        <input type="text" class="form-control" id="account" name="account">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" id="description" name="description">
                    </div>
                    <div class="form-group">
                        <label for="balance">Initial Balance</label>
                        <input type="text" class="form-control" id="balance" name="balance">
                    </div>


                    <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button>
                </form>

            </div>
        </div>



    </div>



</div>




{include file="sections/footer.tpl"}
