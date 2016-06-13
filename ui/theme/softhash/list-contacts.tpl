{include file="sections/header.tpl"}

<div class="row">
    <div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-body">

                <form class="form-horizontal" method="post" action="{$_url}contacts/list/">
                    <div class="form-group">
                        <div class="col-md-8">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <span class="fa fa-search"></span>
                                </div>
                                <input type="text" name="name" class="form-control" placeholder="Search by Name..."/>
                                <div class="input-group-btn">
                                    <button class="btn btn-primary">Search</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">

                            <a href="{$_url}contacts/add/" class="btn btn-success btn-block"><i class="fa fa-plus"></i> Add New Contact</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

<div class="row">
    <div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-body">
<h3>Filter by Tags</h3>
                <ul class="tag-list" style="padding: 0">
                 {foreach $t as $ts}
                     <li><a href="{$_url}contacts/list/{$ts['text']}/"><i class="fa fa-tag"></i> {$ts['text']}</a></li>
                 {/foreach}
                </ul>
            </div>
        </div>

    </div>
</div>

<div class="row">

    {foreach $d as $ds}
        <div class="col-md-3 sdiv">
            <!-- CONTACT ITEM -->
            <div class="panel panel-default">
                <div class="panel-body profile">
                    <div class="profile-image">
                        {if $ds['img'] eq 'gravatar'}
                            <img src="http://www.gravatar.com/avatar/{($ds['email'])|md5}?s=200" class="img-thumbnail img-responsive" alt="{$ds['fname']} {$ds['lname']}">
                        {elseif $ds['img'] eq ''}
                            <img src="{$app_url}sysfrm/uploads/system/profile-icon.png" class="img-thumbnail img-responsive" alt="{$ds['fname']} {$ds['lname']}">
                        {else}
                            <img src="{$ds['img']}" class="img-thumbnail img-responsive" alt="{$ds['account']}">
                        {/if}
                    </div>
                    <div class="profile-data">
                        <div class="profile-data-name">{$ds['account']}</div>

                    </div>

                </div>
                <div class="panel-body">
                    <div class="contact-info">

                        <p><small>Email</small><br/>{if $ds['email'] neq ''}{$ds['email']} {else} n/a {/if}</p>

                        <p>
                            <a href="{$_url}contacts/view/{$ds['id']}/" class="btn btn-primary btn-xs"><i class="fa fa-search"></i> View</a>

                            <a href="delete/crm-user/{$ds['id']}/" class="btn btn-danger btn-xs cdelete" id="uid{$ds['id']}"><i class="fa fa-trash"></i> Delete</a>
                        </p>
                    </div>
                </div>
            </div>
            <!-- END CONTACT ITEM -->
        </div>
    {/foreach}


</div>
<div class="row">
    <div class="col-md-12">
       {$paginator['contents']}
    </div>
</div>
{include file="sections/footer.tpl"}