<?php
   if (!isset($_SESSION['TYPE'])=='Administrator'){
      redirect(web_root."index.php");
     }

?>
  <form action="" method="post">
<div class="container"> 
      <div class="">
        <div class="panel panel-default">
          <div class="panel-body">  
            <fieldset>  
           
  <span id="printout">
  <h3 align="center">Car sell Lira</h3>
      <h4 align="center">Enjoy Your Journey<br/>
      All the best<br/>
      </h4>

              <legend><h2 class="text-left">Billing Details</h2></legend>

   <table>
          <thead>
            <tr>
              <th width="200px"></th>
              <th width="300px"></th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Name</td>
              <td>:<?php echo  $_SESSION['FIRSTNAME'].' '.$_SESSION['LASTNAME'] ; ?></td>
              <td></td>
              <!-- <td>Date: <?php echo $_POST['form_datetime'];?> </td> -->
            </tr>
            <tr>
              <td>Address</td>
              <td>: <?php echo $_SESSION['ADDRESS']; ?></td>
              <td> </td>
              <td>Order Number :<?php echo $_SESSION['ORDERNUMBER']; ?></td>
              
            </tr>
         
            <tr>
              <td>Contact Number</td>
              <td>:<?php echo $_SESSION['CONTACTNUMBER'] ; ?></td>
              <td></td>
              <td></td>
            </tr>
          </tbody>
          </table>
            
              <table class="fixnmix-table" id="list">
                <thead >
                <tr>
                  <th width="10">#</th>
                  <!-- <th>Product</th> -->
                  <th>Product Name</th>
                  <th>Quantity</th>
                  <th style="width:100px">Price</th>
                  <th style="width:120px">Total</th>
                  </tr>
                </thead>
                <tbody>    
                       
              <?php
                if (!empty($_SESSION['fixnmix_cart'])){ 
                      $count_cart = count($_SESSION['fixnmix_cart']);
                      for ($i=0; $i < $count_cart  ; $i++) { 
                      $query = "SELECT * FROM `tblproducts` p , `tblcategory` c 
                        WHERE  p.`CATEGORYID`=c.`CATEGORYID` and PRODUCTID='".$_SESSION['fixnmix_cart'][$i]['productid']."'";
                        $mydb->setQuery($query);
                        $cur = $mydb->loadResultList();
                        foreach ($cur as $result){ 
              ?>

                         <tr>
                         <td></td>
                          <!-- <td><img src="<?php echo web_root.'admin/modules/product/'.$result->IMAGES; ?>" onload="totalprice()" width="50px" height="50px"></td> -->
                          <td><?php echo $result->PRODUCTNAME ?></td>
                          <td><?php echo $_SESSION['fixnmix_cart'][$i]['qty'] ?></td>
                          <td>Price<?php echo  $result->PRICE ?></td>
                          <td>Price<output><?php echo $_SESSION['fixnmix_cart'][$i]['price']?></output></td>
                        </tr>
              <?php
                        }

                      }
                }
              ?>
              </div>
                </tbody>
              <?php 
                  $query = "SELECT * FROM `tblpayment` p ,`tblcustomer` c 
                  WHERE   p.`CUSTOMERID`=c.`CUSTOMERID` and ORDERNUMBER='".$_SESSION['ORDERNUMBER']."'";
                  $mydb->setQuery($query);
                  $cur = $mydb->loadSingleResult();

              
                  ?>
              </table> 
              <p> <hr/> </p> 
              <div class="row">
           
               <?php echo date_format(date_create($cur->CLAIMDATE),"M/d/Y h:i:s"); ?>
                <?php echo $cur->PAYMENTMETHOD; ?>

                </div> -->
                <div class="col-md-4 pull-right">
                  <?php echo number_format($tot,2);?>
                 <?php echo number_format($price,2); ?>
                  <div>Total Price :<?php echo number_format($cur->TOTALPRICE,2); ?></div>
                </div>
              </div>
              <div class="row" style="margin-left:2%"> 
                <p>Thanks For trusting Us</p>
              
                <h4>Yo can Even Repair Your car with US</h4>
            </div>


            <div id="divButtons" name="divButtons">
            <button  onclick="tablePrint();" class="btn btn_fixnmix pull-right "><span class="glyphicon glyphicon-print" ></span> Print</button>     
            </div>
</span>
            </fieldset>
            

          </div>    
        </div>
      </div>
   </div>  
</form>
<?php 



?>
  <script>
function tablePrint(){ 
 document.all.divButtons.style.visibility = 'hidden';  
    var display_setting="toolbar=no,location=no,directories=no,menubar=no,";  
    display_setting+="scrollbars=no,width=500, height=500, left=100, top=25";  
    var content_innerhtml = document.getElementById("printout").innerHTML;  
    var document_print=window.open("","",display_setting);  
    document_print.document.open();  
    document_print.document.write('<body style="font-family:verdana; font-size:12px;" onLoad="self.print();self.close();" >');  
    document_print.document.write(content_innerhtml);  
    document_print.document.write('</body></html>');  
    document_print.print();  
    document_print.document.close(); 
   
    return false; 

    } 
  
</script>