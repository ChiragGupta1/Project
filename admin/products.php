<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
<?php include('config.php');

if (isset($_POST['addProduct'])) {
    $category = isset($_POST['category'])?$_POST['category']:'';
    $pname = isset($_POST['name'])?$_POST['name']:'';
    $price = isset($_POST['price'])?$_POST['price']:'';
    $var = rand(1111, 9999);
    $var1 = rand(1111, 9999);
    $var2 = $var.$var1;
    $var2 = md5($var2);
    $img = $_FILES['image'] ['name'];
    $img1 = "./Uploaded/".$var2.$img;
    $image = "Uploaded/".$var2.$img;
    move_uploaded_file($_FILES["image"] ["tmp_name"], $img1);
    $stock = isset($_POST['stock'])?$_POST['stock']:'';
    $tags = isset($_POST['checkbox'])?$_POST['checkbox']:'';
    $shortdescription = isset($_POST['shortdescription'])?$_POST['shortdescription']:'';
    $longdescription = isset($_POST['longdescription'])?$_POST['longdescription']:'';
    $var = implode(', ', $tags);

    $sql = "INSERT INTO products (`category_id`, `tag_id`, `name`, `price`, `image`, `stock_status`, `short_desc`, `long_desc`) VALUES ('".$category."', '".$var."', '".$pname."', '".$price."', '".$image."', '".$stock."', '".$shortdescription."', '".$longdescription."')";

    if ($conn->query($sql) === true) {
        //echo "New record created successfully.";
        //echo "New record created successfully";
    } else {
        //$errors[] = array('input'=>'form','msg'=>$conn->error);
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

        

    $conn->close();
}
?>


		<div id="main-content"> <!-- Main Content Section with everything -->
			
			<noscript> <!-- Show a notification if the user has disabled javascript -->
				<div class="notification error png_bg">
					<div>
						Javascript is disabled or is not supported by your browser. Please <a href="http://browsehappy.com/" title="Upgrade to a better browser">upgrade</a> your browser or <a href="http://www.google.com/support/bin/answer.py?answer=23852" title="Enable Javascript in your browser">enable</a> Javascript to navigate the interface properly.
					</div>
				</div>
			</noscript>
			
			<!-- Page Head -->
			<h2>Welcome John</h2>
			<p id="page-intro">What would you like to do?</p>
			

			
			<div class="clear"></div> <!-- End .clear -->
			
			<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3>Products</h3>
					
					<ul class="content-box-tabs">
						<li><a href="#tab1" class="default-tab">Manage</a></li> <!-- href must be unique and match the id of target div -->
						<li><a href="#tab2">Add</a></li>
					</ul>
					
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
                

					<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
						
					<!--<div class="notification attention png_bg">
							<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
							<div>
								This is a Content Box. You can put whatever you want in it. By the way, you can close this notification with the top-right cross.
							</div>
						</div>-->
						
						<table>
							
							<thead>
								<tr>
								   <th><input class="check-all" type="checkbox" /></th>
								   <th>Name</th>
								   <th>Price</th>
								   <th>Category</th>
								   <th>Tags</th>
								   <th>Action</th>
								</tr>
								
							</thead>
						 
							<tfoot>
								<tr>
									<td colspan="6">
										<div class="bulk-actions align-left">
											<select name="dropdown">
												<option value="option1">Choose an action...</option>
												<option value="option2">Edit</option>
												<option value="option3">Delete</option>
											</select>
											<a class="button" href="#">Apply to selected</a>
										</div>
										
										<div class="pagination">
											<a href="#" title="First Page">&laquo; First</a><a href="#" title="Previous Page">&laquo; Previous</a>
											<a href="#" class="number" title="1">1</a>
											<a href="#" class="number" title="2">2</a>
											<a href="#" class="number current" title="3">3</a>
											<a href="#" class="number" title="4">4</a>
											<a href="#" title="Next Page">Next &raquo;</a><a href="#" title="Last Page">Last &raquo;</a>
										</div> <!-- End .pagination -->
										<div class="clear"></div>
									</td>
								</tr>
							</tfoot>
						 
							<tbody>
								<tr>
									<td><input type="checkbox" /></td>
									<td>Lorem ipsum dolor</td>
									<td>Consectetur adipiscing</td>
									<td><a href="#" title="title">Sit amet</a></td>
									<td>Donec tortor diam</td>
									<td>
										<!-- Icons -->
										 <a href="#" title="Edit"><img src="resources/images/icons/pencil.png" alt="Edit" /></a>
										 <a href="#" title="Delete"><img src="resources/images/icons/cross.png" alt="Delete" /></a> 
										 <a href="#" title="Edit Meta"><img src="resources/images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a>
									</td>
								</tr>
								
								<tr>
									<td><input type="checkbox" /></td>
									<td>Lorem ipsum dolor</td>
									<td>Consectetur adipiscing</td>
									<td><a href="#" title="title">Sit amet</a></td>
									<td>Donec tortor diam</td>
									<td>
										<!-- Icons -->
										 <a href="#" title="Edit"><img src="resources/images/icons/pencil.png" alt="Edit" /></a>
										 <a href="#" title="Delete"><img src="resources/images/icons/cross.png" alt="Delete" /></a> 
										 <a href="#" title="Edit Meta"><img src="resources/images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a>
									</td>
								</tr>
								
								<tr>
									<td><input type="checkbox" /></td>
									<td>Lorem ipsum dolor</td>
									<td>Consectetur adipiscing</td>
									<td><a href="#" title="title">Sit amet</a></td>
									<td>Donec tortor diam</td>
									<td>
										<!-- Icons -->
										 <a href="#" title="Edit"><img src="resources/images/icons/pencil.png" alt="Edit" /></a>
										 <a href="#" title="Delete"><img src="resources/images/icons/cross.png" alt="Delete" /></a> 
										 <a href="#" title="Edit Meta"><img src="resources/images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a>
									</td>
								</tr>
								
								<tr>
									<td><input type="checkbox" /></td>
									<td>Lorem ipsum dolor</td>
									<td>Consectetur adipiscing</td>
									<td><a href="#" title="title">Sit amet</a></td>
									<td>Donec tortor diam</td>
									<td>
										<!-- Icons -->
										 <a href="#" title="Edit"><img src="resources/images/icons/pencil.png" alt="Edit" /></a>
										 <a href="#" title="Delete"><img src="resources/images/icons/cross.png" alt="Delete" /></a> 
										 <a href="#" title="Edit Meta"><img src="resources/images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a>
									</td>
								</tr>
								
								<tr>
									<td><input type="checkbox" /></td>
									<td>Lorem ipsum dolor</td>
									<td>Consectetur adipiscing</td>
									<td><a href="#" title="title">Sit amet</a></td>
									<td>Donec tortor diam</td>
									<td>
										<!-- Icons -->
										 <a href="#" title="Edit"><img src="resources/images/icons/pencil.png" alt="Edit" /></a>
										 <a href="#" title="Delete"><img src="resources/images/icons/cross.png" alt="Delete" /></a> 
										 <a href="#" title="Edit Meta"><img src="resources/images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a>
									</td>
								</tr>
								
								<tr>
									<td><input type="checkbox" /></td>
									<td>Lorem ipsum dolor</td>
									<td>Consectetur adipiscing</td>
									<td><a href="#" title="title">Sit amet</a></td>
									<td>Donec tortor diam</td>
									<td>
										<!-- Icons -->
										 <a href="#" title="Edit"><img src="resources/images/icons/pencil.png" alt="Edit" /></a>
										 <a href="#" title="Delete"><img src="resources/images/icons/cross.png" alt="Delete" /></a> 
										 <a href="#" title="Edit Meta"><img src="resources/images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a>
									</td>
								</tr>
								
								<tr>
									<td><input type="checkbox" /></td>
									<td>Lorem ipsum dolor</td>
									<td>Consectetur adipiscing</td>
									<td><a href="#" title="title">Sit amet</a></td>
									<td>Donec tortor diam</td>
									<td>
										<!-- Icons -->
										 <a href="#" title="Edit"><img src="resources/images/icons/pencil.png" alt="Edit" /></a>
										 <a href="#" title="Delete"><img src="resources/images/icons/cross.png" alt="Delete" /></a> 
										 <a href="#" title="Edit Meta"><img src="resources/images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a>
									</td>
								</tr>
								
								<tr>
									<td><input type="checkbox" /></td>
									<td>Lorem ipsum dolor</td>
									<td>Consectetur adipiscing</td>
									<td><a href="#" title="title">Sit amet</a></td>
									<td>Donec tortor diam</td>
									<td>
										<!-- Icons -->
										 <a href="#" title="Edit"><img src="resources/images/icons/pencil.png" alt="Edit" /></a>
										 <a href="#" title="Delete"><img src="resources/images/icons/cross.png" alt="Delete" /></a> 
										 <a href="#" title="Edit Meta"><img src="resources/images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a>
									</td>
								</tr>
							</tbody>
							
						</table>
						
					</div> <!-- End #tab1 -->
					
					<div class="tab-content" id="tab2">
					
						<form action="products.php" method="post" enctype="multipart/form-data">
							
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								
								<p>
									<label>Name</label>
										<input class="text-input small-input" type="text" id="small-input" name="name" /> <!-- Classes for input-notification: success, error, information, attention -->
										<!-- <br /><small>A small description of the field</small> -->
								</p>
                                <p>
									<label>Price</label>
                                    <input class="text-input small-input" type="number" id="small-input" name="price" /> <!-- Classes for input-notification: success, error, information, attention -->
                                    <label>Image</label>
                                    <input class="text-input small-input" type="file" id="small-input" name="image" /> <!-- Classes for input-notification: success, error, information, attention -->
                                </p>
								<p>
									<label>Stock Status</label>
									<input type="radio" name="stock" value="In stock" /> In Stock<br />
									<input type="radio" name="stock" value="Out of Stock" /> Out of Stock
								</p>

                                
								<p>
									<label>Category</label>              
									<select name="category" class="small-input">
									<?php
								    $sql = "SELECT category_id, catname FROM categories";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        while($row = $result->fetch_assoc()) { 
									    ?>
										<option value=<?php echo $row['category_id'] ?>><?php echo $row['catname'] ?></option>
								        <?php
									    }
                                    } else {
                                        // echo "0 results";
                                    }
                                    ?>
									</select> 
								</p>
                                <p>
									<label>Tags</label>
									<?php
								    $sqla = "SELECT tag_id, tname FROM tags";
                                    $result = $conn->query($sqla);

                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        while($row = $result->fetch_assoc()) { 
									    ?>
										<input type="checkbox" name="checkbox[]" value="<?php echo $row['tag_id'] ?>" /> <?php echo $row['tname'] ?>
								        <?php
									    }
                                    } else {
                                        // echo "0 results";
                                    }
                                    ?>
									
								</p>
								<p>
									<label>Short Description</label>
									<input class="text-input large-input" type="text" id="large-input" name="shortdescription" />
								</p>
								<p>
									<label>Long Description</label>
									<textarea class="text-input large-input" id="large-input" name="longdescription" cols="79" rows="15"></textarea>
                                </p>
								
								
								
								
								
								
								<!--
								<p>
									<label>Shipping Address</label>
									<textarea class="text-input textarea wysiwyg" id="textarea" name="textfield" cols="79" rows="15"></textarea>
								</p>
-->
								<p>
									<input class="button" type="submit" name="addProduct" value="Submit" />
								</p>
								
							</fieldset>
							
							<div class="clear"></div><!-- End .clear -->
							
						</form>
						
					</div> <!-- End #tab2 -->        
					
				</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->
			

			<div class="clear"></div>
			
			
			<!-- Start Notifications -->
			<!--
			<div class="notification attention png_bg">
				<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
				<div>
					Attention notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero. 
				</div>
			</div>
			
			<div class="notification information png_bg">
				<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
				<div>
					Information notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero.
				</div>
			</div>
			
			<div class="notification success png_bg">
				<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
				<div>
					Success notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero.
				</div>
			</div>
			
			<div class="notification error png_bg">
				<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
				<div>
					Error notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero.
				</div>
			</div> -->
			
			<!-- End Notifications -->
			
			<?php include('footer.php'); ?>