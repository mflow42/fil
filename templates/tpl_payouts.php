<!--разметка для списка-->
<br>


<div class="container">
    <div class="row justify-content-md-center">

        <div class="col-md-3">
            <form id="datePicker" action="/payouts/select" method="GET">
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
                    <th scope="col">AMOUNT</th>
                    <th scope="col">INVOICE AMOUNT</th>
                    <th scope="col">EXPENSE AMOUNT</th>
                    <th scope="col">DIFFERENCE</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($payouts as $payout): ?>
                    <tr scope="row">
                        <td>
                            <input type="checkbox" aria-label="" name="payout_<?=$payout['id']?>_<?=$payout['amount']?>"
                                   id="payout_<?=$payout['id']?>" disabled>
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
                                <?=$payout['invoice_amount']?>
                            </label>
                        </td>
                        <td style="text-align: right;">
                            <label style="text-align: right" for="payout_<?=$payout['id']?>">
                                <?=$payout['expense_amount']?>
                            </label>
                        </td>
                        </td><td style="text-align: right;">
                            <label style="text-align: right" for="payout_<?=$payout['id']?>">
                                <?=$payout['difference']?>
                            </label>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
    </div>
    
</div>