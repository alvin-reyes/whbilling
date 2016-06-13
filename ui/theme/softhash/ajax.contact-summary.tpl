<table class="table table-hover margin bottom">
    <thead>
    <tr>

        <th colspan="3">Accounting Summary</th>

    </tr>
    </thead>
    <tbody>
    <tr>

        <td> Total Income
        </td>
        <td class="text-center"><span class="label label-primary">{$_c['currency_code']} {number_format($ti,2,$_c['dec_point'],$_c['thousands_sep'])}</span></td>
        {*<td class="text-center"><button class="btn btn-outline btn-primary btn-xs" type="button"><i class="fa fa-plus"></i></button></td>*}

    </tr>
    <tr>

        <td> Total Expense
        </td>
        <td class="text-center"><span class="label label-danger">{$_c['currency_code']} {number_format($te,2,$_c['dec_point'],$_c['thousands_sep'])}</span></td>
        {*<td class="text-center"><button class="btn btn-outline btn-danger btn-xs" type="button"><i class="fa fa-minus"></i></button></td>*}

    </tr>

    </tbody>
</table>