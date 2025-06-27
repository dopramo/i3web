<head>
<script src="js/script.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-1.10.2.min.js"></script>
<link href="css/style.css" rel="stylesheet">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>
   .auth form input[type="text"], .auth form input[type="password"], .auth form input[type="email"], .auth form input[type="search"], .auth form input[type="number"] {
  font-size: 12px;
  font-family: cursive;
  border-bottom: 1px dotted #fff;
  border-radius: 0;
  box-shadow: none!important;
  height: auto; 
  border-bottom-style: dashed;
   }
  .auth form select {
  background-color: rgba(255, 255, 255, 0)!important;
  background: rgba(255, 255, 255, 0);
  color: #fff!important;
  border-bottom: 1px solid #fff!important;
  border-radius: 0;
  box-shadow: none;
  border:none;
  font-family: cursive;
      
}  
    </style>
</head><div class="container auth">
    <h1 class="text-center">Next Generation Services <span>Unified Payment Gateway</span> </h1>
    <div id="big-form" class="well auth-box">
      <form method="post" id="gatewayform" action="payment/">
        <fieldset>

          <!-- Form Name -->
<!--          <legend>Nice form example</legend>        -->
          <!-- Select Payment Methode -->
          <div class="form-group">
            <label class=" control-label" for="selectbasic">Payment Method</label>
            <div class="">
              <select id="selectbasic" name="selectmethode" class="form-control" onChange="changeAction()">
                <option value="0">Select a patment Method</option>
                <option value="1">Credit/Debit card</option>
                <option value="2">Sampath Vishwa</option>
                <option value="3">M Cash</option> 
                <option value="4">Easy Cash</option>
              </select>
            </div>
          </div>
          <!-- Text input Source-->
          <div class="form-group">
            <label class=" control-label" for="textinput">Source</label>  
            <div class="">
              <input id="textinput" name="tr_id" placeholder="Source" class="form-control input-md" type="text" autocomplete="off">
              <span class="help-block">help</span>  
            </div>
          </div>
          <!-- Text input Destination URL-->
          <div class="form-group">
            <label class=" control-label" for="textinput">Destination Url</label>  
            <div class="">
              <input id="textinput" name="destination_url" placeholder="Destination" class="form-control input-md" type="text" autocomplete="off">
              <span class="help-block">help</span>  
            </div>
          </div>
          <!-- Text input Transaction Reference Number-->
          <div class="form-group">
            <label class=" control-label" for="textinput">Transaction Reference Number</label>  
            <div class="">
              <input id="textinput" name="tr_id" placeholder="Transaction Reference Number" class="form-control input-md" type="text" autocomplete="off">
              <span class="help-block">help</span>  
            </div>
          </div>
          <!-- Text input Product ID-->
          <div class="form-group">
            <label class=" control-label" for="textinput">Product ID</label>  
            <div class="">
              <input id="textinput" name="product_id" placeholder="Product ID" class="form-control input-md" type="text" autocomplete="off">
              <span class="help-block">help</span>  
            </div>
          </div>
          <!-- Text input Product Name-->
          <div class="form-group">
            <label class=" control-label" for="textinput">Product Name</label>  
            <div class="">
              <input id="textinput" name="product_Name" placeholder="Product Name" class="form-control input-md" type="text" autocomplete="off">
              <span class="help-block">help</span>  
            </div>
          </div>
          <!-- Text input unit price-->
          <div class="form-group">
            <label class=" control-label" for="textinput">Unit Price</label>  
            <div class="">
              <input id="textinput" name="unit_price" placeholder="Unit Price" class="form-control input-md" type="text" autocomplete="off">
              <span class="help-block">help</span>  
            </div>
          </div>
          <!-- Text input qty-->
          <div class="form-group">
            <label class=" control-label" for="textinput">Quantity</label>  
            <div class="">
              <input id="textinput" name="quantity" placeholder="Quantity" class="form-control input-md" type="text" autocomplete="off">
              <span class="help-block">help</span>  
            </div>
          </div>
          <!-- Text input Service Charges-->
          <div class="form-group">
            <label class=" control-label" for="textinput">Service Charges</label>  
            <div class="">
              <input id="textinput" name="service_charges" placeholder="Service Charges" class="form-control input-md" type="text" autocomplete="off">
              <span class="help-block">help</span>  
            </div>
          </div>
          <!-- Text input Service Tax-->
          <div class="form-group">
            <label class=" control-label" for="textinput">Service Taxes</label>  
            <div class="">
              <input id="textinput" name="Service_Taxes" placeholder="Service Taxes" class="form-control input-md" type="text" autocomplete="off">
              <span class="help-block">help</span>  
            </div>
          </div>
          <!-- Text input GOv Tax-->
          <div class="form-group">
            <label class=" control-label" for="textinput">Government Taxes</label>  
            <div class="">
              <input id="textinput" name="Government_Taxes" placeholder="Government Taxes" class="form-control input-md" type="text" autocomplete="off">
              <span class="help-block">help</span>  
            </div>
          </div>
          <!-- Text input Shipping charges-->
          <div class="form-group">
            <label class=" control-label" for="textinput">Shipping Charges</label>  
            <div class="">
              <input id="textinput" name="Shipping_Charges" placeholder="Shipping Charges" class="form-control input-md" type="text" autocomplete="off">
              <span class="help-block">help</span>  
            </div>
          </div>
          <!-- Text Promocode-->
          <div class="form-group">
            <label class=" control-label" for="textinput">Promo Code </label>  
            <div class="">
              <input id="textinput" name="Subtotal" placeholder="Promo Code " class="form-control input-md" type="text" autocomplete="off">
              <span class="help-block">help</span>  
            </div>
          </div>
          <!-- Text Discount 1-->
          <div class="form-group">
            <label class=" control-label" for="textinput">Discount 1</label>  
            <div class="">
              <input id="textinput" name="Subtotal" placeholder="Discount 1" class="form-control input-md" type="text" autocomplete="off">
              <span class="help-block">help</span>  
            </div>
          </div>
          <!-- Text Discount 2-->
          <div class="form-group">
            <label class=" control-label" for="textinput">Discount 2</label>  
            <div class="">
              <input id="textinput" name="Subtotal" placeholder="Discount 2" class="form-control input-md" type="text" autocomplete="off">
              <span class="help-block">help</span>  
            </div>
          </div>
          <!-- Text input Subtotal-->
          <div class="form-group">
            <label class=" control-label" for="textinput">Subtotal</label>  
            <div class="">
              <input id="textinput" name="Subtotal" placeholder="Subtotal" class="form-control input-md" type="text" autocomplete="off">
              <span class="help-block">help</span>  
            </div>
          </div>
          <!-- Text input Total-->
          <div class="form-group">
            <label class=" control-label" for="textinput">Total</label>  
            <div class="">
              <input id="textinput" name="Total" placeholder="Total" class="form-control input-md" type="text" autocomplete="off">
              <span class="help-block">help</span>  
            </div>
          </div>
          <!-- Button -->
          <div class="form-group">
            <div class="">
              <button id="button2id" name="button2id" class="btn btn-danger"  style="float:right;">Checkout</button>
            </div>
          </div>


<?php /*            
            
          <div class="btn-group">
            <a href="index.html" class="btn btn-default">All</a>
            <a href="example1.html" class="btn btn-default">example 1</a>
            <a href="example2.html" class="btn btn-default">example 2</a>
          </div>


          <!-- Text input-->
          <div class="form-group">
            <label class=" control-label" for="textinput">Username</label>  
            <div class="">
              <input id="textinput" name="textinput" placeholder="Username" class="form-control input-md" type="text" autocomplete="off">
              <span class="help-block">help</span>  
            </div>
          </div>

          <!-- Password input-->
          <div class="form-group">
            <label class=" control-label" for="passwordinput">Password</label>
            <div class="">
              <input id="passwordinput" name="passwordinput" placeholder="Password" class="form-control input-md" type="password" autocomplete="off">
              <span class="help-block">help</span>
            </div>
          </div>

          <!-- Select Basic -->
          <div class="form-group">
            <label class=" control-label" for="selectbasic">Country</label>
            <div class="">
              <select id="selectbasic" name="selectbasic" class="form-control">
                <option value="1">Option one</option>
                <option value="2">Option two</option>
              </select>
            </div>
          </div>

          <!-- Multiple Radios -->
          <div class="form-group">
            <label class=" control-label" for="radios">Are you awesome</label>
            <div class="">
              <div class="radio">
                <label for="radios-0">
                  <input name="radios" id="radios-0" value="1" checked="checked" type="radio">
                  Yes
                </label>
              </div>
              <div class="radio">
                <label for="radios-1">
                  <input name="radios" id="radios-1" value="2" type="radio">
                  No
                </label>
              </div>
            </div>
          </div>

          <!-- Button -->
          <div class="form-group">
            <label class=" control-label" for="singlebutton">Do you like this button</label>
            <div class="">
              <button id="singlebutton" name="singlebutton" class="btn btn-primary">Button</button>
            </div>
          </div>
          <div class="form-group">
            <label class=" control-label" for="singlebutton">And this?</label>
            <div class="">
              <button id="singlebutton" name="singlebutton" class="btn btn-default">Button</button>
            </div>
          </div>


          <!-- Button (Double) -->
          <div class="form-group">
            <label class=" control-label" for="button1id">Double the action</label>
            <div class="">
              <button id="button1id" name="button1id" class="btn btn-success">Good Button</button>
              <button id="button2id" name="button2id" class="btn btn-danger">Scary Button</button>
            </div>
          </div>

          <!-- File Button --> 
          <div class="form-group">
            <label class=" control-label" for="filebutton">Avatar</label>
            <div class="">
              <input id="filebutton" name="filebutton" class="input-file" type="file">
            </div>
          </div>

          <!-- Select Multiple -->
          <div class="form-group">
            <label class=" control-label" for="selectmultiple">Category</label>
            <div class="">
              <select id="selectmultiple" name="selectmultiple" class="form-control" multiple="multiple">
                <option value="1">Option one</option>
                <option value="2">Option two</option>
              </select>
            </div>
          </div>

          <!-- Multiple Radios (inline) -->
          <div class="form-group">
            <label class=" control-label" for="radios">Do you like pie?</label>
            <div class=""> 
              <label class="radio-inline" for="radios-0">
                <input name="radios" id="radios-0" value="1" checked="checked" type="radio">
                yes
              </label> 
              <label class="radio-inline" for="radios-1">
                <input name="radios" id="radios-1" value="2" type="radio">
                No
              </label> 
              <label class="radio-inline" for="radios-2">
                <input name="radios" id="radios-2" value="3" type="radio">
                what is pie?
              </label> 
              <label class="radio-inline" for="radios-3">
                <input name="radios" id="radios-3" value="4" type="radio">
                I hate it!
              </label>
            </div>
          </div>

          <!-- Multiple Checkboxes -->
          <div class="form-group">
            <label class=" control-label" for="checkboxes">Extra features</label>
            <div class="">
              <div class="checkbox">
                <label for="checkboxes-0">
                  <input name="checkboxes" id="checkboxes-0" value="1" type="checkbox">
                  Paper plains
                </label>
              </div>
              <div class="checkbox">
                <label for="checkboxes-1">
                  <input name="checkboxes" id="checkboxes-1" value="2" type="checkbox">
                  Iron man
                </label>
              </div>
            </div>
          </div>

          <!-- Multiple Checkboxes (inline) -->
          <div class="form-group">
            <label class=" control-label" for="checkboxes">Any more?</label>
            <div class="">
              <label class="checkbox-inline" for="checkboxes-0">
                <input name="checkboxes" id="checkboxes-0" value="1" type="checkbox">
                One
              </label>
              <label class="checkbox-inline" for="checkboxes-1">
                <input name="checkboxes" id="checkboxes-1" value="2" type="checkbox">
                Two
              </label>
              <label class="checkbox-inline" for="checkboxes-2">
                <input name="checkboxes" id="checkboxes-2" value="3" type="checkbox">
                Drum and bass
              </label>
              <label class="checkbox-inline" for="checkboxes-3">
                <input name="checkboxes" id="checkboxes-3" value="4" type="checkbox">
                Dub
              </label>
            </div>
          </div>

          <!-- Search input-->
          <div class="form-group">
            <label class=" control-label" for="searchinput">Search Input</label>
            <div class="">
              <input id="searchinput" name="searchinput" placeholder="searchinput" class="form-control input-md" type="search">
              <p class="help-block">help</p>
            </div>
          </div>

          <!-- Textarea -->
          <div class="form-group">
            <label class=" control-label" for="textarea">Text Area</label>
            <div class="">                     
              <textarea class="form-control" id="textarea" name="textarea">default text</textarea>
            </div>
          </div>

*/
?>
        </fieldset>
      </form>
    </div>
    <div class="clearfix"></div>
  </div>
<script type="text/javascript">
    function changeAction() {
        var methode = document.getElementById('selectbasic').value;
        if(methode == 1){
    document.getElementById("gatewayform").action = 'paycorp/paycorp-client-php/au.com.gateway.IT/pcw_payment-init_UT.php';
        }
        if(methode == 2){
    document.getElementById("gatewayform").action = 'vishwa/init.php';
        }
        if(methode == 4){
    document.getElementById("gatewayform").action = 'ezcash/init.php';
        }
        //alert(methode);
    //document.getElementById("gatewayform").action = 'test.html';
    }
</script>