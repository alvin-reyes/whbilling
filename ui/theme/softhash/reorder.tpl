{include file="sections/header.tpl"}
<div class="row">
    <div class="col-md-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Reorder {$ritem} Positions</h5>

            </div>
            <div class="ibox-content">


                <span id="resp">Drag'n drop the Items below for Repositioning.</span>
                <ol class="rounded-list" id="sorder">


                    {foreach $d as $ds}
                        <li id='recordsArray_{$ds['id']}'><a href="javascript:void(0)">{$ds['name']}</a></li>
                    {/foreach}

                </ol>

            </div>
        </div>



    </div>



</div>




{include file="sections/footer.tpl"}
