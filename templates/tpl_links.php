<!--разметка для списка-->
<br>


<div class="container">
    <div class="row justify-content-md-center">

        <div class="col-md-3">
            <form id="datePicker" action="/links/select" method="GET">
                <input name="type" value="date" hidden/>
                <input type="text" name="daterange" class="form-control"
                       value="<?=$_SESSION['from']?> - <?=$_SESSION['till']?>"
                       autocomplete="off"/>
            </form>
        </div>
        <div class="col-md-3">
            <input name="type" value="changes" hidden/>
            <button form="linkDocsForm" formaction="/links/update" name="submitChanges" id="submitChanges"
                    type="button" class="btn btn-primary">Send  changes to
                database
            </button>
        </div>
    </div>
</div>

<script>
    $(function () {
        $('input[name="daterange"]').daterangepicker({
            showDropdowns: true,
            autoUpdateInput: true,
            // autoApply: true,
            opens: 'right',
            locale: {
                format: 'YYYY-MM-DD',
                cancelLabel: 'Clear'
            }
        });
        $('input[name="daterange"]').on('apply.daterangepicker', function (ev, picker) {
            $('#datePicker').submit();
        });

        $('input[name="daterange"]').on('cancel.daterangepicker', function (ev, picker) {
            $(this).val('');
        });
    });

    $('button[name="submitChanges"]').on('click', function () {
        $('form[name="linkDocsForm"]').submit();
    });

</script>
<br>
<div class="row">

    <div class="col">
        <form action="/links/update" method="post" name="linkDocsForm">
            <h4>PAYOUTS</h4>
            <table class="table table-sm table-responsive table-striped table-bordered table-hover">
                <thead class="thead-dark">
                <tr>
                    <th scope="col" style="min-width: 10px"></th>
                    <th scope="col" style="min-width: 20px">ID</th>
                    <th scope="col" style="min-width: 200px">DATE</th>
                    <th scope="col" style="width: 100%">AMOUNT</th>
                    <th scope="col" style="width: 100%">LINKED</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($payouts as $payout): ?>
                    <tr scope="row">
                        <td>
                            <input type="checkbox" aria-label="" name="payout_<?=$payout['id']?>_<?=$payout['amount']?>"
                                   id="payout_<?=$payout['id']?>">
                        </td>
                        <th scope="row">
                            <label for="payout_<?=$payout['id']?>">
                                <?=$payout['id']?>
                            </label>
                        </th>
                        <td>
                            <label for="payout_<?=$payout['id']?>">
                                <?=$payout['date']?>
                            </label>
                        </td>
                        <td style="text-align: right;">
                            <label style="text-align: right" for="payout_<?=$payout['id']?>">
                                <?=$payout['amount']?>
                            </label>
                        </td>
                        <td style="text-align: right;">
                            <label style="text-align: right" for="payout_<?=$payout['id']?>">
                                <?=$payout['link_id']?>
                            </label>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
    </div>
    <div class="col">
        <h4>INVOICES</h4>
        <table class="table table-sm table-responsive table-striped table-bordered table-hover">
            <thead class="thead-dark">
            <tr>
                <th scope="col" style="min-width: 10px"></th>
                <th scope="col" style="min-width: 20px">ID</th>
                <th scope="col" style="min-width: 200px">DATE</th>
                <th scope="col" style="width: 100%">SUBTOTAL</th>
                <th scope="col" style="width: 100%">LINKED</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($invoices as $invoice): ?>
                <tr scope="row">
                    <td>
                        <input type="checkbox" aria-label=""
                               name="invoice_<?=$invoice['id']?>_<?=$invoice['subtotal']?>"
                               id="invoice_<?=$invoice['id']?>">
                    </td>
                    <th scope="row">
                        <label for="invoice_<?=$invoice['id']?>">
                            <?=$invoice['id']?>
                        </label>
                    </th>
                    <td>
                        <label for="invoice_<?=$invoice['id']?>">
                            <?=$invoice['date']?>
                        </label>
                    </td>
                    <td style="text-align: right;">
                        <label style="text-align: right" for="invoice_<?=$invoice['id']?>">
                            <?=$invoice['subtotal']?>
                        </label>
                    </td>
                    <td style="text-align: right;">
                        <label style="text-align: right" for="invoice_<?=$invoice['id']?>">
                            <?=$invoice['link_id']?>
                        </label>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="col">
        <h4>EXPENSES</h4>
        <table class="table table-sm table-responsive table-striped table-bordered table-hover">
            <thead class="thead-dark">
            <tr>
                <th scope="col" style="min-width: 10px"></th>
                <th scope="col" style="min-width: 20px">ID</th>
                <th scope="col" style="min-width: 200px">DATE</th>
                <th scope="col" style="width: 100%">TOTAL</th>
                <th scope="col" style="width: 100%">LINKED</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($expenses as $expense): ?>
                <tr scope="row">
                    <td>
                        <input type="checkbox" aria-label="" name="expense_<?=$expense['id']?>_<?=$expense['total']?>"
                               id="expense_<?=$expense['id']?>">
                    </td>
                    <th scope="row">
                        <label for="expense_<?=$expense['id']?>">
                            <?=$expense['id']?>
                        </label>
                    </th>
                    <td>
                        <label for="expense_<?=$expense['id']?>">
                            <?=$expense['date']?>
                        </label>
                    </td>
                    <td style="text-align: right;">
                        <label style="text-align: right" for="expense_<?=$expense['id']?>">
                            <?=$expense['total']?>
                        </label>
                    </td>
                    <td style="text-align: right;">
                        <label style="text-align: right" for="expense_<?=$expense['id']?>">
                            <?=$expense['link_id']?>
                        </label>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        </form>

    </div>
</div>