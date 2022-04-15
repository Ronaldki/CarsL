<?php
		check_message(); 
		?> 
		 
		<div class="row">
       	 <div class="col-lg-12">
            <h1 class="page-header">List of Cars   </h1>
       		</div>
        	<!-- /.col-lg-12 -->
   		 </div>
			    <form action="controller.php?action=delete" Method="POST">  	
			    <div class="table-responsive">				
				<table id="dash-table"  class="table table-striped table-bordered table-hover "  style="font-size:12px" cellspacing="0" >
					
				  <thead>
				  	<tr>  
				  		
				  		<th>Product</th> 
				  		<th>Category</th>
				  		<th>Price</th>
				  		<th width="130">Action</th> 
				  		 
				  	</tr>	
				  </thead> 	

			  <tbody>
				  	<?php 
				  		$query = "SELECT * FROM `tblpromopro` pr , `tblproduct` p , `tblcategory` c
           					 WHERE pr.`PROID`=p.`PROID` AND  p.`CATEGID` = c.`CATEGID` ";
				  		$mydb->setQuery($query);
				  		$cur = $mydb->loadResultList();

						foreach ($cur as $result) { 
				  		echo '<tr>'; 
				    		
				  		echo '<td>'.$result->PRODESC.'</td>';
				  		
				  		echo '<td>'. $result->CATEGORIES.'</td>'; 
				  		echo '<td> Price '.  number_format($result->PRODISPRICE,2).'</td>';
				  		
				  		if ($result->PROSTATS=='Available'){
				  			$stats = 'Available';
				  		}else{
				  			$stats = 'NotAvailable';
				  		}
				  		echo
				  		 '<td align="left">
							<a href="'.web_root.'admin/settings/controller.php?action=editStatus&id='.$result->PROID.'&stats='.$stats.'" class="btn btn-primary btn-xs">'.$stats.'</a>
							<a href="setDiscount.php?id='.$result->PROID.'" data-toggle="lightbox"  class="btn btn-primary btn-xs">Set Discount</a>
				  		 </td>';
				  	} 
				  	?>
				  </tbody>
					
				 	
				</table>

				
				</div>
				</form>
 
 