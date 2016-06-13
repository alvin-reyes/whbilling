{include file="sections/header.tpl"}
<div class="wrapper wrapper-content animated fadeInUp">

<div class="ibox">
<div class="ibox-title">
    <h5>List {$type}s</h5>
    <div class="ibox-tools">
        <a href="{$_url}ps/p-new" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Add Product</a>
        <a href="{$_url}ps/s-new" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Add Service</a>
    </div>
</div>
<div class="ibox-content">
<div class="input-group"><input type="text" placeholder="Search" id="txtsearch" class="input-sm form-control"> <span class="input-group-btn">
                                        <button type="button" id="search" class="btn btn-sm btn-primary"> Search</button> </span></div>
    <input type="hidden" id="stype" value="{$type}">

<div class="project-list mt-md">
    <div id="progressbar">
    </div>

<div id="sysfrm_ajaxrender">


</div>


</div>
</div>
</div>
</div>
{include file="sections/footer.tpl"}