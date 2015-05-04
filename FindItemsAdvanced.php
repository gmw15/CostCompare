<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta name ="viewport" content="width=device-width, initial-scale=1.0">
		<link href = "css/bootstrap.min.css" rel = "stylesheet">
		<script type="text/javascript" src="js/custom.js"></script>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
  	   <script type="text/javascript" src="js/ama_functions.js"></script>
</head>

<body>
<div class = "navbar navbar-inverse navbar-static-top">
			<div class = "container">
			
			<div class="navbar-header">
			<a href="http://pricedrops.comule.com/" class="navbar-brand">Cost Compare</a>				
				<button class = "navbar-toggle" data-toggle = "collapse" data-target = ".navHeaderCollapse">
					<span class = "icon-bar"></span>
					<span class = "icon-bar"></span>
					<span class = "icon-bar"></span>
				</button>
			</div>	
				<div class = "collapse navbar-collapse navHeaderCollapse">
				
					<ol class = "nav navbar-nav navbar-right">
					
					<li><a href = "index.html">Home</a></li>
					<li><a href = "FindItemsAdvanced.php">Ebay</a></li>
					<li><a href = "#about" data-toggle="modal">About</a></li>
					
					<li><a href = "#contact" data-toggle="modal">Contact Us</a></li>
					
					
				    </ol>

				</div>
			</div>
		</div>

		

	<div class = "container">
<br/>
			<center><a href="index.html"><img src="header.png" alt ="logo"/></a></center>
	</div>
<br/>
	

					
<div>
						
<div class = "container">
<div class ="row">	
			<div class="col-md-12">
			
			<center>
<form action="FindItemsAdvanced.php" method="post">
							

 <br />

  <tr>
	<span class="caption">Search:</span>
    <td><input type="text" name="Query" value=" "></td>

    <td>

    <span class="caption">Country:</span>
    <select name="GlobalID">
      <option value="EBAY-US">USA</option>

      <option value="EBAY-AU">AU</option>

      <option value="EBAY-ENCA">CAD</option>

      <option value="EBAY-DE">DE</option>

      <option value="EBAY-GB">ENG</option>


      </select>

    </td>

    <td>
<span class="caption">Max Price:</span>

<input type="text" name="MaxPrice" value="500"></td>

    <td>



		</td>


	</tr>


<button class="btn btn-default" type="submit" name="submit" value="Search"><i class="glyphicon glyphicon-search"></i></button>		


		</td>

		</tr>

	</table>
	</form>
</center>
</div>
</div>
</div>
</div>

		

	
		<div>
			<div class ="navbar navbar-default navbar-fixed-bottom">
			<div class = "container">
				<p class = "navbar-text pull-right">Site built by Chicago Team</p>
		</div>				

			</div>

		</div>


		<div class = "modal fade" id ="about" role="dialog">
			<div class = "modal-dialog">
				<div class = "modal-content">
					<div class = "modal-header">
						<h4>About Us</h4>
					</div>
					<div class = "modal-body">
					<p>
						Cost Compare is a cost comparison site, designed as a part of our Team Project module. We came up with this idea as we are students, and we, ourselves are looking for ways to save money on our favourite websites.<br /><br />						
					
						Glen Ward x12436692<br />
						Stephen Chapman x12343316<br />
						Ricardo O'Hara Camones x12425828<br />
						Ciaran Corcoran x10377639
					</p>
					</div>
					<div class = "modal-footer">
						<a class = "btn btn-primary" data-dismiss = "modal" >Close</a>
					</div>
				</div>
			</div>
		</div>

	<div class = "modal fade" id ="contact" role="dialog">
			<div class = "modal-dialog">
				<div class = "modal-content">
					<div class = "modal-header">
						<h4>Contact Us</h4>
					</div>
					<div class = "modal-body">
						<div class = "form-group">
							<label for = "contact-name" class = "col-lg-2 control-label"> Name:</label>
							<div class = "col-lg-10">
								<input type = "text" class = "form-control" id = "contact-name" placeholder = "Full Name">
							</div>

						</div>
						<br/>
						<br/>
						<div class = "form-group">
							<label for = "contact-email" class = "col-lg-2 control-label"> Email:</label>
							<div class = "col-lg-10">
								<input type = "email" class = "form-control" id = "contact-email" placeholder = "you@email.com">
							</div>

						</div>
						<br/>
						<br/>
						<div class = "form-group">
							<label for = "contact-message" class = "col-lg-2 control-label"> Message:</label>
							<div class = "col-lg-10">
							<textarea class = "form-control" row = "15"></textarea>
							</div>

						</div>
						<br/>
						<br/>
					</div>
					<div class = "modal-footer">
						<a class = "btn btn-default" data-dismiss = "modal" >Close</a>
						<a class = "btn btn-primary" data-dismiss = "modal" >Send</a>
					</div>
				</div>
			</div>
		</div>
		<script src = "http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src = "js/bootstrap.js"></script>




<center>
<div class = " container">

			<div class = "row">

			<div class = "col-md-12">

				<center><a href="www.ebay.com"><img src="ebay.png" alt="ebay"/></a></center>
<?php



require_once('DisplayUtils.php');  // functions to aid with display of information



error_reporting(E_ALL);  // turn on all errors, warnings and notices for easier debugging



$results = '';



if(isset($_POST['Query']))

{

  $endpoint = 'http://svcs.ebay.com/services/search/FindingService/v1';  // URL to call

  $responseEncoding = 'XML';   // Format of the response



  $safeQuery = urlencode (utf8_encode($_POST['Query']));

  $site  = $_POST['GlobalID'];



  $priceRangeMin = 0.0;

  $priceRangeMax = $_POST['MaxPrice'];




  $rangeArr = array('Low-Range', 'Mid-Range', 'High-Range');



  $priceRange = ($priceRangeMax - $priceRangeMin) / 3;  // find price ranges for three tables

  $priceRangeMin =  sprintf("%01.2f", 0.00);

  $priceRangeMax = $priceRangeMin;  // needed for initial setup



  foreach ($rangeArr as $range)

  {

    $priceRangeMax = sprintf("%01.2f", ($priceRangeMin + $priceRange));

    $results .=  "<h2>$range : $priceRangeMin ~ $priceRangeMax</h2>\n";

    // Construct the FindItems call

    $apicall = "$endpoint?OPERATION-NAME=findItemsAdvanced"

         . "&SERVICE-VERSION=1.0.0"

         . "&GLOBAL-ID=$site"

         . "&SECURITY-APPNAME=comparep-8cd7-41af-b5c4-1bbf772e4392" //replace with your app id

         . "&keywords=$safeQuery"


         . "&sortOrder=BestMatch"

         . "&itemFilter(0).name=ListingType"

         . "&itemFilter(0).value=FixedPrice"

         . "&itemFilter(1).name=MinPrice"

         . "&itemFilter(1).value=$priceRangeMin"

         . "&itemFilter(2).name=MaxPrice"

         . "&itemFilter(2).value=$priceRangeMax"

         . "&RESPONSE-DATA-FORMAT=$responseEncoding";



 

    // Load the call and capture the document returned by the Finding API

    $resp = simplexml_load_file($apicall);



    // Check to see if the response was loaded, else print an error

    // Probably best to split into two different tests, but have as one for brevity

    if ($resp && $resp->paginationOutput->totalEntries > 0) {

      $results .= 'Total items : ' . $resp->paginationOutput->totalEntries . "<br />\n";

      $results .= '<table id="example" class="tablesorter" border="0" cellpadding="0" cellspacing="1">' . "\n";

      $results .= " ";



      // If the response was loaded, parse it and build links

      foreach($resp->searchResult->item as $item) {

        if ($item->galleryURL) {

          $picURL = $item->galleryURL;

        } else {

          $picURL = "http://pics.ebaystatic.com/aw/pics/express/icons/iconPlaceholder_96x96.gif";

        }

        $link  = $item->viewItemURL;

        $title = $item->title;



        $price = sprintf("%01.2f", $item->sellingStatus->convertedCurrentPrice);

        $ship  = sprintf("%01.2f", $item->shippingInfo->shippingServiceCost);

        $total = sprintf("%01.2f", ((float)$item->sellingStatus->convertedCurrentPrice

                      + (float)$item->shippingInfo->shippingServiceCost));



        // Determine currency to display - so far only seen cases where priceCurr = shipCurr, but may be others

        $priceCurr = (string) $item->sellingStatus->convertedCurrentPrice['currencyId'];

        $shipCurr  = (string) $item->shippingInfo->shippingServiceCost['currencyId'];

        if ($priceCurr == $shipCurr) {

          $curr = $priceCurr;

        } else {

          $curr = "$priceCurr / $shipCurr";  // potential case where price/ship currencies differ

        }



        $timeLeft = getPrettyTimeFromEbayTime($item->sellingStatus->timeLeft);

        $endTime = strtotime($item->listingInfo->endTime);   // returns Epoch seconds

        $endTime = $item->listingInfo->endTime;






        $results .= "<td>
<h2><a href=\"$link\">$title</a></h2>
<a href=\"$link\"><img src=\"$picURL\"></a>"

             .  "<h2><p>Price: $curr $price</p></h2></td>";
       

      }

      $results .= "</table>";

    }

    // If there was no response, print an error

    else {

      $results = "<p><i><b>No items found<b></i></p>";

    }

    $priceRangeMin = $priceRangeMax; // set up for next iteration

  } // foreach



} // if



?>





<?php echo $results;?>
</center>
</div>
</div>
</div>
</body>

</html>

