
	  
<div style="height: 3px"></div>
						
						<center><h3>All Books</h3></center>
						<table class="table table-striped b-t text-sm panel">
							<thead>
								<tr>
									
									<th>Name</th>
									<th>Price</th>
									<th>category</th>
									<th>Author</th>
									<th>Edit</th>
									
								</tr>
							</thead>
							<tbody>
								<?php
								foreach ( $allbook as $book ) {
									?>
								<input type="hidden" name="id" class="form-control" id="<?php echo $book['id']; ?>" value="" >
								<input type="hidden" name="id" class="form-control" id="<?php echo $book['publishers_id']; ?>" value="" >
								<input type="hidden" name="id" class="form-control" id="<?php echo $book['cat_id']; ?>" value="" >
						<tr style="cursor:pointer" data-toggle="modal" data-target="#myModal" onClick="edit_book_details('<?php echo $book['id']; ?>','<?php echo $book['name_en']; ?>','<?php echo $book['name_si']; ?>','<?php echo $book['name_ta']; ?>','<?php echo $book['price']; ?>','<?php echo ASSETS.'uploads/cover/'.$book['cover_photo']; ?>','<?php echo $book['cat_id']; ?>','<?php echo $book['publishers_id']; ?>','<?php echo ASSETS.			'uploads/pdf/'.$book['pdfbook']; ?>','<?php echo $book['encryptedfile']; ?>')">
									
									<td>
										<?php echo $book['name_en']; ?>
									</td>
									<td>
										<?php echo $book['price']; ?>
									</td>
									<td>
										<?php echo $book['cat_name_en']; ?>
									</td>
									<td>
										<?php echo $book['publishers_name']; ?>
									</td>
									<td>
										<a class="active"><i class="fa fa-edit text-success text-active"></i></a>
									</td>
									
								</tr>
								<?php } ?>
							</tbody>
						</table>
						



