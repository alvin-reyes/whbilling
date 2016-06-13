
<form class="form-horizontal" id="rform">

    <div class="form-group"><label class="col-lg-2 control-label" for="fname">Account Name</label>

        <div class="col-lg-10"><input type="text" id="account" name="fname" class="form-control" value="{$d['account']}" autocomplete="off">

        </div>
    </div>

    <div class="form-group"><label class="col-lg-2 control-label" for="email">Email</label>

        <div class="col-lg-10"><input type="text" id="edit_email" name="edit_email" class="form-control" value="{$d['email']}" autocomplete="off">

        </div>
    </div>
    <div class="form-group"><label class="col-lg-2 control-label" for="phone">Phone</label>

        <div class="col-lg-10"><input type="text" id="phone" name="phone" class="form-control" value="{$d['phone']}" autocomplete="off">

        </div>
    </div>
    <div class="form-group"><label class="col-lg-2 control-label" for="address">Address</label>

        <div class="col-lg-10"><input type="text" id="address" name="address" class="form-control" value="{$d['address']}" autocomplete="off">

        </div>
    </div>
    <div class="form-group"><label class="col-lg-2 control-label" for="city">City</label>

        <div class="col-lg-10"><input type="text" id="city" name="city" class="form-control" value="{$d['city']}" autocomplete="off">

        </div>
    </div>
    <div class="form-group"><label class="col-lg-2 control-label" for="state">State/Region</label>

        <div class="col-lg-10"><input type="text" id="state" name="state" class="form-control" value="{$d['state']}" autocomplete="off">

        </div>
    </div>
    <div class="form-group"><label class="col-lg-2 control-label" for="zip">ZIP/Postal Code </label>

        <div class="col-lg-10"><input type="text" id="zip" name="zip" class="form-control" value="{$d['zip']}" autocomplete="off">

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

        <div class="col-lg-10"><input type="text" id="tags" name="tags" style="width:100%" value="{$d['tags']}">

        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">

            <button class="btn btn-primary" type="submit" id="submit"><i class="fa fa-check"></i> Submit</button>
        </div>
    </div>
</form>