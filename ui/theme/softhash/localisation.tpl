{include file="sections/header.tpl"}
<div class="row">


    <div class="col-md-6">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Localisation</h5>

            </div>
            <div class="ibox-content">

                <form role="form" name="localisation" method="post" action="{$_url}settings/lc-post">






                    <div class="form-group">
                        <label for="tzone">Timezone</label>
                        <select name="tzone" id="tzone">
                            {foreach $tlist as $value => $label}
                                <option value="{$value}" {if $_c['timezone'] eq $value}selected="selected" {/if}>{$label}</option>
                            {/foreach}


                        </select>
                    </div>

                    <div class="form-group">
                        <label for="country">Default Country</label>
                        <select name="country" id="country">
                            <option value="">Select Country</option>
                            {$countries}
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="lan">Date Format</label>
                        <select class="form-control" name="df" id="df">
                            <option value="d/m/Y" {if $_c['df'] eq 'd/m/Y'} selected="selected" {/if}>{date('d/m/Y')}</option>
                            <option value="d.m.Y" {if $_c['df'] eq 'd.m.Y'} selected="selected" {/if}>{date('d.m.Y')}</option>
                            <option value="d-m-Y" {if $_c['df'] eq 'd-m-Y'} selected="selected" {/if}>{date('d-m-Y')}</option>
                            <option value="m/d/Y" {if $_c['df'] eq 'm/d/Y'} selected="selected" {/if}>{date('m/d/Y')}</option>
                            <option value="Y/m/d" {if $_c['df'] eq 'Y/m/d'} selected="selected" {/if}>{date('Y/m/d')}</option>
                            <option value="Y-m-d" {if $_c['df'] eq 'Y-m-d'} selected="selected" {/if}>{date('Y-m-d')}</option>
                            <option value="M d Y" {if $_c['df'] eq 'M d Y'} selected="selected" {/if}>{date('M d Y')}</option>
                            <option value="d M Y" {if $_c['df'] eq 'd M Y'} selected="selected" {/if}>{date('d M Y')}</option>
                            <option value="jS M y" {if $_c['df'] eq 'jS M y'} selected="selected" {/if}>{date('jS M y')}</option>

                        </select>
                    </div>


                    <div class="form-group">
                        <label for="lan">{$_L['Default_Language']}</label>
                        <select class="form-control" name="lan" id="lan">
                            <option value="arabic" {if $_c['language'] eq 'arabic'} selected="selected" {/if}>Arabic</option>
                            <option value="bengali" {if $_c['language'] eq 'bengali'} selected="selected" {/if}>Bengali</option>
                            <option value="azerbaijani" {if $_c['language'] eq 'azerbaijani'} selected="selected" {/if}>Azerbaijani</option>
                            <option value="catalan" {if $_c['language'] eq 'catalan'} selected="selected" {/if}>Catalan</option>
                            <option value="croatian" {if $_c['language'] eq 'croatian'} selected="selected" {/if}>Croatian</option>
                            <option value="czech" {if $_c['language'] eq 'czech'} selected="selected" {/if}>Czech</option>
                            <option value="danish" {if $_c['language'] eq 'danish'} selected="selected" {/if}>Danish</option>
                            <option value="dutch" {if $_c['language'] eq 'dutch'} selected="selected" {/if}>Dutch</option>
                            <option value="en-us" {if $_c['language'] eq 'en-us'} selected="selected" {/if}>English</option>
                            <option value="farsi" {if $_c['language'] eq 'farsi'} selected="selected" {/if}>Farsi</option>
                            <option value="french" {if $_c['language'] eq 'french'} selected="selected" {/if}>French</option>
                            <option value="german" {if $_c['language'] eq 'german'} selected="selected" {/if}>German</option>
                            <option value="hungarian" {if $_c['language'] eq 'hungarian'} selected="selected" {/if}>Hungarian</option>
                            <option value="italian" {if $_c['language'] eq 'italian'} selected="selected" {/if}>Italian</option>
                            <option value="norwegian" {if $_c['language'] eq 'norwegian'} selected="selected" {/if}>Norwegian</option>
                            <option value="portuguese-br" {if $_c['language'] eq 'portuguese-br'} selected="selected" {/if}>Portuguese-br</option>
                            <option value="portuguese-pt" {if $_c['language'] eq 'portuguese-pt'} selected="selected" {/if}>Portuguese-pt</option>
                            <option value="russian" {if $_c['language'] eq 'russian'} selected="selected" {/if}>Russian</option>
                            <option value="spanish" {if $_c['language'] eq 'spanish'} selected="selected" {/if}>Spanish</option>
                            <option value="swedish" {if $_c['language'] eq 'swedish'} selected="selected" {/if}>Swedish</option>
                            <option value="turkish" {if $_c['language'] eq 'turkish'} selected="selected" {/if}>Turkish</option>
                            <option value="ukranian" {if $_c['language'] eq 'ukranian'} selected="selected" {/if}>Ukranian</option>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="dec_point">Decimal Point</label>
                        <input type="text" class="form-control" id="dec_point" name="dec_point" value="{$_c['dec_point']}">

                    </div>
                    <div class="form-group">
                        <label for="thousands_sep">Thousands Separator</label>
                        <input type="text" class="form-control" id="thousands_sep" name="thousands_sep" value="{$_c['thousands_sep']}">

                    </div>

                    <div class="form-group">
                        <label for="currency_code">Currency Code</label>
                        <input type="text" class="form-control" id="currency_code" name="currency_code" value="{$_c['currency_code']}">
                        <span class="help-block">Keep it blank if you do not want to show currency code</span>
                    </div>


                    <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button>
                </form>

            </div>
        </div>



    </div>

</div>




{include file="sections/footer.tpl"}
