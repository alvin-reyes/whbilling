{include file="sections/header.tpl"}
<div class="row">
    <div class="col-md-6">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>General Settings</h5>

            </div>
            <div class="ibox-content">

                <form role="form" name="accadd" method="post" action="{$_url}settings/app-post">
                    <div class="form-group">
                        <label for="company">Application Name/ Company Name</label>
                        <input type="text" class="form-control" id="company" name="company" value="{$_c['CompanyName']}">
                        <span class="help-block">This Name will be shown on the Title</span>
                    </div>
                    {*<div class="form-group">*}
                    {*<label for="currency_code">Currency Code</label>*}
                    {*<input type="text" class="form-control" id="currency_code" name="currency_code" value="{$_c['currency_code']}">*}
                    {*</div>*}

                    <div class="form-group">
                        <label for="theme">Theme</label>
                        <select name="theme" id="theme" class="form-control">
                            <option value="softhash" {if $_c['theme'] eq 'softhash'}selected="selected" {/if}>Softhash</option>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nstyle">Style</label>
                        <select name="nstyle" id="nstyle" class="form-control">
                            <option value="dark" {if $_c['nstyle'] eq 'dark'}selected="selected" {/if}>Dark</option>
                            {*<option value="blue" {if $_c['nstyle'] eq 'blue'}selected="selected" {/if}>Blue</option>*}

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="caddress">Pay To Address</label>

                        <textarea class="form-control" id="caddress" name="caddress" rows="3">{$_c['caddress']}</textarea>
                        <span class="help-block">You can use html tag</span>
                    </div>


                    <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button>
                </form>

            </div>
        </div>

        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Logo</h5>


            </div>
            <div class="ibox-content">

                <img class="logo" src="sysfrm/uploads/system/logo.png" alt="Logo">
                <br><br>
                <form role="form" name="logo" enctype="multipart/form-data" method="post" action="{$_url}settings/logo-post">
                    <div class="form-group">
                        <label for="exampleInputFile">Upload New Logo</label>
                        <input type="file" id="file" name="file">
                        <p class="help-block">This will replace existing logo. You may also change logo by replacing file - sysfrm/uploads/system/logo.png</p>
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button>
                </form>


            </div>
        </div>

    </div>



</div>




{include file="sections/footer.tpl"}
