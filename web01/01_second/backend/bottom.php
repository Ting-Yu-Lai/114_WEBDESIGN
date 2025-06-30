				<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
					<p class="t cent botli">頁尾版權資料管理</p>
					<form method="post" action="./api/edit_column.php">
						<table width="50%" style="margin:auto">
							<tbody>
								<tr class="yel">
									<td width="40%">頁尾版權資料：</td>
									<td width="60%" >
										<?php
										$row=$Bottom->find(1);
										// ${ucfirst($do)}->find(1)['total'];
										?>
										<input  type="text" name="total"  value="<?=$row['bottom'];?>">
										<input type="hidden" name="id" value="<?= $row['id'];?>">
									</td>	 
								</tr>
								</tbody>
						</table>
						<table style="margin-top:40px; width:100%;">
							<tbody>
								<tr>
									<td class="cent">
										<input type="hidden" name="table" value="<?=$do;?>">
										<input type="submit" value="修改確定">
										<input type="reset" value="重置">
									</td>
								</tr>
							</tbody>
						</table>
					</form>
				</div>