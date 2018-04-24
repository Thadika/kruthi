<div style="height: 20px"></div>
					<div style="height: 550px; overflow:auto;">
						<table class="table table-striped b-t text-sm panel">
							<thead>
								<tr>
									<th>Book Name</th>
									<th>User Name</th>
									<th>Device ID</th>
									<th>Number(msisdn)</th>
									<th>Amount</th>
									<th>Fee</th>
									<th>Net Amount</th>
									<th>Date</th>

								</tr>
							</thead>
							<tbody>
								<?php foreach($purchases as $purch){ ?>
								<tr>
									<td>
										<?php echo $purch['bookname_en']; ?>
									</td>
									<td>
										<?php echo $purch['user_name']; ?>
									</td>
									<td>
										<?php echo $purch['device_id']; ?>
									</td>
									<td>
										<?php echo $purch['msisdn']; ?>
									</td>
									<td>
										<?php echo $purch['amount']; ?>
									</td>
									<td>
										<?php echo $purch['net_amount']; ?>
									</td>
									<td>
										<?php echo $purch['fee']; ?>
									</td>
									<td>
										<?php echo $purch['date']; ?>
									</td>
								</tr>

								<?php }?>

							</tbody>
						</table>
</div>

					




