<!--разметка для списка purchase invoices-->
<br>
<form id="datePicker" action="/invoices/select" method="GET">
	<input type="text" name="daterange" value="2018-01-01 - 2018-01-10" />
</form>
<script>
	$(function() {
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
		$('input[name="daterange"]').on('apply.daterangepicker', function(ev, picker) {
			// let from = picker.startDate.format('YYYY-MM-DD');
			// let till = picker.endDate.format('YYYY-MM-DD');
			// console.log($('#datePicker'));
			$('#datePicker').submit();
			// $.ajax({
			// 	url: '/invoices/select',
			// 	type: 'POST',
			// 	data: {
			// 		from: from,
			// 		till: till
			// 	},
			// 	success: function(response) {
			// 		console.log(response);
			// 	}
			// })
		});

		$('input[name="daterange"]').on('cancel.daterangepicker', function(ev, picker) {
			$(this).val('');
		});
	});
</script>
<div class="row">

	<div class="col">

		<h4>PAYOUTS</h4>
		<table class="table table-sm table-responsive table-striped table-bordered table-hover">
			<thead class="thead-dark">
				<tr>
					<th scope="col" style="min-width: 10px"></th>
					<th scope="col" style="min-width: 20px">ID</th>
					<th scope="col" style="min-width: 200px">DATE</th>
					<th scope="col" style="width: 100%">AMOUNT</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($payouts as $payout): ?>
				<tr scope="row">
					<td>
						<input type="checkbox" aria-label="" name="payout<?=$payout['id']?>" id="payout<?=$payout['id']?>">
					</td>
					<th scope="row">
						<label for="payout<?=$payout['id']?>">
							<?=$payout['id']?>
						</label>
					</th>
					<td>
						<label for="payout<?=$payout['id']?>">
							<?=$payout['date']?>
						</label>
					</td>
					<td style="text-align: right;">
						<label style="text-align: right" for="payout<?=$payout['id']?>">
							<?=$payout['amount']?>
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
				</tr>
			</thead>
			<tbody>
				<?php foreach ($invoices as $invoice): ?>
				<tr scope="row">
					<td>
						<input type="checkbox" aria-label="" name="invoice<?=$invoice['id']?>" id="invoice<?=$invoice['id']?>">
					</td>
					<th scope="row">
						<label for="invoice<?=$invoice['id']?>">
							<?=$invoice['id']?>
						</label>
					</th>
					<td>
						<label for="invoice<?=$invoice['id']?>">
							<?=$invoice['date']?>
						</label>
					</td>
					<td style="text-align: right;">
						<label style="text-align: right" for="invoice<?=$invoice['id']?>">
							<?=$invoice['subtotal']?>
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
				</tr>
			</thead>
			<tbody>
				<?php foreach ($expenses as $expense): ?>
				<tr scope="row">
					<td>
						<input type="checkbox" aria-label="" name="invoice<?=$expense['id']?>" id="expense<?=$expense['id']?>">
					</td>
					<th scope="row">
						<label for="expense<?=$expense['id']?>">
							<?=$expense['id']?>
						</label>
					</th>
					<td>
						<label for="expense<?=$expense['id']?>">
							<?=$expense['date']?>
						</label>
					</td>
					<td style="text-align: right;">
						<label style="text-align: right" for="expense<?=$expense['id']?>">
							<?=$expense['total']?>
						</label>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>