{include file="sections/header.tpl"}
<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">

    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Add Contact</h5>

            </div>
            <div class="ibox-content">
                <div class="alert alert-danger" id="emsg">
                    <span id="emsgbody"></span>
                </div>

                <form class="form-horizontal" id="rform">

                    <div class="form-group"><label class="col-lg-2 control-label" for="account">Full Name</label>

                        <div class="col-lg-10"><input type="text" id="account" name="account" class="form-control" autocomplete="off">

                        </div>
                    </div>

                    <div class="form-group"><label class="col-lg-2 control-label" for="email">Email</label>

                        <div class="col-lg-10"><input type="text" id="email" name="email" class="form-control" autocomplete="off">

                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-2 control-label" for="phone">Phone</label>

                        <div class="col-lg-10"><input type="text" id="phone" name="phone" class="form-control" autocomplete="off">

                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-2 control-label" for="address">Address</label>

                        <div class="col-lg-10"><input type="text" id="address" name="address" class="form-control" autocomplete="off">

                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-2 control-label" for="city">City</label>

                        <div class="col-lg-10"><input type="text" id="city" name="city" class="form-control" autocomplete="off">

                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-2 control-label" for="state">State/Region</label>

                        <div class="col-lg-10"><input type="text" id="state" name="state" class="form-control" autocomplete="off">

                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-2 control-label" for="zip">ZIP/Postal Code </label>

                        <div class="col-lg-10"><input type="text" id="zip" name="zip" class="form-control" autocomplete="off">

                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-2 control-label" for="country">Country</label>

                        <div class="col-lg-10">

                            <select name="country" id="country">
                                <option value="">Select Country</option>
                               {$countries}
                            </select>

                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-2 control-label" for="tags">Tags</label>

                        <div class="col-lg-10"><input type="text" id="tags" name="tags" style="width:100%">

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">

                            <button class="btn btn-primary" type="submit" id="submit"><i class="fa fa-check"></i> Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


</div>
{include file="sections/footer.tpl"}