{include file="sections/header.tpl"}
<div class="row">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Reports- Income Vs Expense </h5>

        </div>
        <div class="ibox-content">


                <h4>Income Vs Expense</h4>
                <hr>
                <h5>Total Income: {$_c['currency_code']} {number_format($ai,2,$_c['dec_point'],$_c['thousands_sep'])}</h5>
                <h5>Total Expense: {$_c['currency_code']} {number_format($ae,2,$_c['dec_point'],$_c['thousands_sep'])}</h5>
                <hr>
                Income - Expense = {$_c['currency_code']} {number_format($aime,2,$_c['dec_point'],$_c['thousands_sep'])}
                <hr>
                <h5>Total Expense This Month: {$_c['currency_code']} {number_format($mi,2,$_c['dec_point'],$_c['thousands_sep'])}</h5>
                <h5>Total Income This Month: {$_c['currency_code']} {number_format($me,2,$_c['dec_point'],$_c['thousands_sep'])}</h5>
                <hr>
                Income - Expense = {$_c['currency_code']} {number_format($mime,2,$_c['dec_point'],$_c['thousands_sep'])}
                <hr>



                <h4>Income Vs Expense This Year</h4>
                <hr>
                <div id="placeholder" class="flot-placeholder"></div>
                <hr>


        </div>
    </div>

</div>
 <!-- Row end-->


<!-- Row end-->


<!-- Row end-->

{include file="sections/footer.tpl"}
