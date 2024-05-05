<?php
session_start();

if(!$_SESSION['user_email'])
{

    header("Location: ../index.php");
}

?>

<?php
 include("config.php");
 extract($_SESSION); 
		  $stmt_edit = $DB_con->prepare('SELECT * FROM users WHERE user_email =:user_email');
		$stmt_edit->execute(array(':user_email'=>$user_email));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
		
		?>
		<?php
 include("config.php");
		  $stmt_edit = $DB_con->prepare("select sum(order_total) as total from orderdetails where user_id=:user_id and order_status='Ordered'");
		$stmt_edit->execute(array(':user_id'=>$user_id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
		
		?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DFFRNT Cloth SHOP</title>
	 <link rel="shortcut icon" href="../assets/img/logotech.png" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="css/local.css" />

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	
	
	<script type="text/javascript" src="jquery.fancybox.js?v=2.1.5"></script>
	<link rel="stylesheet" type="text/css" href="jquery.fancybox.css?v=2.1.5" media="screen" />
	
	<link rel="stylesheet" type="text/css" href="jquery.fancybox-buttons.css?v=1.0.5" />
	<script type="text/javascript" src="jquery.fancybox-buttons.js?v=1.0.5"></script>


	<link rel="stylesheet" type="text/css" href="jquery.fancybox-thumbs.css?v=1.0.7" />
	<script type="text/javascript" src="jquery.fancybox-thumbs.js?v=1.0.7"></script>


	<script type="text/javascript" src="jquery.fancybox-media.js?v=1.0.6"></script>
	
	<script type="text/javascript">
		$(document).ready(function() {
			/*
			 *  Simple image gallery. Uses default settings
			 */

			$('.fancybox').fancybox();

			/*
			 *  Different effects
			 */

			// Change title type, overlay closing speed
			$(".fancybox-effects-a").fancybox({
				helpers: {
					title : {
						type : 'outside'
					},
					overlay : {
						speedOut : 0
					}
				}
			});

			// Disable opening and closing animations, change title type
			$(".fancybox-effects-b").fancybox({
				openEffect  : 'none',
				closeEffect	: 'none',

				helpers : {
					title : {
						type : 'over'
					}
				}
			});

			// Set custom style, close if clicked, change title type and overlay color
			$(".fancybox-effects-c").fancybox({
				wrapCSS    : 'fancybox-custom',
				closeClick : true,

				openEffect : 'none',

				helpers : {
					title : {
						type : 'inside'
					},
					overlay : {
						css : {
							'background' : 'rgba(238,238,238,0.85)'
						}
					}
				}
			});

			// Remove padding, set opening and closing animations, close if clicked and disable overlay
			$(".fancybox-effects-d").fancybox({
				padding: 0,

				openEffect : 'elastic',
				openSpeed  : 150,

				closeEffect : 'elastic',
				closeSpeed  : 150,

				closeClick : true,

				
			});

			/*
			 *  Button helper. Disable animations, hide close button, change title type and content
			 */

			$('.fancybox-buttons').fancybox({
				openEffect  : 'none',
				closeEffect : 'none',

				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,

				helpers : {
					title : {
						type : 'inside'
					},
					buttons	: {}
				},

				afterLoad : function() {
					this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
				}
			});


			/*
			 *  Thumbnail helper. Disable animations, hide close button, arrows and slide to next gallery item if clicked
			 */

			$('.fancybox-thumbs').fancybox({
				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,
				arrows    : false,
				nextClick : true,

				helpers : {
					thumbs : {
						width  : 50,
						height : 50
					}
				}
			});

			/*
			 *  Media helper. Group items, disable animations, hide arrows, enable media and button helpers.
			*/
			$('.fancybox-media')
				.attr('rel', 'media-gallery')
				.fancybox({
					openEffect : 'none',
					closeEffect : 'none',
					prevEffect : 'none',
					nextEffect : 'none',

					arrows : false,
					helpers : {
						media : {},
						buttons : {}
					}
				});

			/*
			 *  Open manually
			 */

			$("#fancybox-manual-a").click(function() {
				$.fancybox.open('1_b.jpg');
			});

			$("#fancybox-manual-b").click(function() {
				$.fancybox.open({
					href : 'iframe.html',
					type : 'iframe',
					padding : 5
				});
			});

			$("#fancybox-manual-c").click(function() {
				$.fancybox.open([
					{
						href : '1_b.jpg',
						title : 'My title'
					}, {
						href : '2_b.jpg',
						title : '2nd title'
					}, {
						href : '3_b.jpg'
					}
				], {
					helpers : {
						thumbs : {
							width: 75,
							height: 50
						}
					}
				});
			});


		});
	</script>
	

   
    
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">DFFRNT </a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li><a href="index.php"> &nbsp; <span class='glyphicon glyphicon-home'></span> Home</a></li>
					<li class="active"><a href="shop.php?id=1"> &nbsp; <span class='glyphicon glyphicon-shopping-cart'></span> Shop Now</a></li>
					<li><a href="cart_items.php"> &nbsp; <span class='fa fa-cart-plus'></span> Shopping Cart Lists</a></li>
					<li><a href="orders.php"> &nbsp; <span class='glyphicon glyphicon-list-alt'></span> My Ordered Items</a></li>
					<li><a href="view_purchased.php"> &nbsp; <span class='glyphicon glyphicon-eye-open'></span> Previous Items Ordered</a></li>
					<li><a data-toggle="modal" data-target="#setAccount"> &nbsp; <span class='fa fa-gear'></span> Account Settings</a></li>
					<li>
  <a href="#" onclick="confirmLogout();"> &nbsp; <span class='glyphicon glyphicon-off'></span> Logout</a>
</li>

<script>
function confirmLogout() {
  const logoutConfirmed = window.confirm("Are you sure you want to log out?");

  if (logoutConfirmed) {
    // If the user confirms the logout, redirect to the logout page.
    window.location.href = "logout.php";
  }
}
</script>
					
                    
                </ul>
                <ul class="nav navbar-nav navbar-right navbar-user">
                    <li class="dropdown messages-dropdown">
                        <a href="#"><i class="fa fa-calendar"></i>  <?php
                            $Today=date('y:m:d');
                            $new=date('l, F d, Y',strtotime($Today));
                            echo $new; ?></a>
                        
                    </li>
					<li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class='glyphicon glyphicon-shopping-cart'></span> Total Price Ordered: &#8369; <?php echo $total; ?> </b></a>
                       
                    </li>
					
					
                     <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $user_firstname;?> <?php echo $user_lastname;?><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a data-toggle="modal" data-target="#setAccount"><i class="fa fa-gear"></i> Settings</a></li>
                            <li class="divider"></li>
							<li>
  <a href="#" onclick="confirmLogout();"><span class='glyphicon glyphicon-off'></span> Logout</a>
</li>

<script>
function confirmLogout() {
  const logoutConfirmed = window.confirm("Are you sure you want to log out?");

  if (logoutConfirmed) {
    // If the user confirms the logout, redirect to the logout page.
    window.location.href = "logout.php";
  }
}
</script>

                        </ul>
                    </li>
                </ul>
            </div>
        </nav>

				<div id="page-wrapper">
			<div class="alert alert-default" style="color:white;background-color:#fff">
         <center><h3 style="color:black;">  <span class="glyphicon glyphicon-shopping-cart" style="color:black;"></span>  Be DFFRNT like no other</h3></center>
        </div>
			
					<br />
					

<?php







$conn=mysqli_connect("localhost","root","");
mysqli_select_db($conn,"edgedata");

$start=0;
$limit=8;

if(isset($_GET['id']))
{
	$id=$_GET['id'];
	$start=($id-1)*$limit;
}

$query=mysqli_query($conn,"select * from items LIMIT $start, $limit");


while($query2=mysqli_fetch_array($query))
{
	
	echo 	"

	

	
	
	<div class='col-sm-3'><div class='panel panel-default' style='border-color:#000;'>
            <div class='panel-heading' style='color:white;background-color : #666666;'>
            <center> 
<textfield style='text-align:center;background-color: white;' class='form-control' rows='1' disabled>".$query2['item_name']."</textfield>
			</center>
            </div>
            <div class='panel-body'>
           <a id='item_".$query2['item_id']."'data-toggle='modal' data-target='#myModal' href='../Admin/item_images/".$query2['item_image']."' data-fancybox-group='button' title='Page ".$id."- ".$query2['item_name']."'>
					
					<img src='../Admin/item_images/".$query2['item_image']."' class='img img-thumbnail'  style='auto' />
					</a>
				
					
					<center><h4> Price: &#8369; ".$query2['item_price']." </h4></center>
		
					
									<center>	<a class='btn btn-block btn-danger' href='add_to_cart.php?cart=".$query2['item_id']."'><span class='glyphicon glyphicon-shopping-cart'></span></a></center>
            </div>
          </div>
        </div>
		
		
		
		
		
		";
		
		
		echo "<div class='modal fade' id='myModal' role='dialog'>
		<div class='modal-dialog'>
		
		  <!-- Modal content-->
		  <div class='modal-content'>
			<div class='modal-header'>
			  <button type='button' class='close' data-dismiss='modal'>&times;</button>
			  <h4 class='modal-title'></h4>
			</div>
			<div class='modal-body'>
			<div class='flex-contain'>
			<img src='' class='img img-thumbnail modal-img'  style='height: 400px;' />
			<div class='flex-contain column-direction modal-text'> 
			<div class='item-title no-wrap'></div>
			<div class='item-price py-2'></div>

			<a class='item-checkout btn btn-block btn-danger  py-2' href=''><span class='glyphicon glyphicon-shopping-cart'></span> Add to cart</a>



			  <div class='item-desc py-2'>Our DFFRNT t-shirt is designed to make you stand out with its bold and unique statement. This soft, comfortable tee features the phrase DFFRNT Be Like No Other
			  for an unapologetically distinctive look. Ideal for those who embrace their individuality and express themselves with confidence.</div>

			  </div>
			</div>
			</div>
			<div class='modal-footer'>
			  <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
			</div>
		  </div>
		  
		</div>
		</div>";		
	
}

echo "<div class='container'>";
echo "</div>";






$rows=mysqli_num_rows(mysqli_query($conn,"select * from items"));
$total=ceil($rows/$limit);
echo "<br /><ul class='pager'>";
if($id>1)
{
	echo "<li><a style='color:white;background-color : #1b2529;' href='?id=".($id-1)."'>Previous Page</a><li>";
}
if($id!=$total)
{
	echo "<li><a style='color:white;background-color : #1b2529;' href='?id=".($id+1)."' class='pager'>Next Page</a></li>";
}
echo "</ul>";


echo "<center><ul class='pagination pagination-lg'>";
		for($i=1;$i<=$total;$i++)
		{
			if($i==$id) { echo "<li class='pagination active'><a style='color:white;background-color : #1b2529;'>".$i."</a></li>"; }
			
	
			
			else { echo "<li><a href='?id=".$i."'>".$i."</a></li>"; }
		}
echo "</ul></center>";
?>
					
					
					
					
					
					
					
					<br />
			
			<div class="alert alert-default" style="background-color:#fff;">
                       <p style="color:black;text-align:center;">
                       &copy 2023 DFFRNT Clothing shop| All Rights Reserved |  Project by : TechNexus Co.

						</p>
                        
                    </div>
            
                </div>
            </div>

           

           
        </div>
		
		
		
    </div>
    <!-- /#wrapper -->

	
	<!-- Modal Start -->
	<div class="modal fade" id="setAccount" tabindex="-1" role="dialog" aria-labelledby="myMediulModalLabel">
          <div class="modal-dialog modal-sm">
            <div style="color:white;background-color:#1b2529" class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h2 style="color:white" class="modal-title" id="myModalLabel">Account Settings</h2>
              </div>
              <div class="modal-body">
         
				
			
				
              <form enctype="multipart/form-data" method="post" action="settings.php">
                   <fieldset>
					
						
                            <p>Firstname:</p>
                            <div class="form-group">
							
                                <input class="form-control" placeholder="Firstname" name="user_firstname" type="text" value="<?php  echo $user_firstname; ?>" required>
                           
							 
							</div>
							
							
							<p>Lastname:</p>
                            <div class="form-group">
							
                                <input class="form-control" placeholder="Lastname" name="user_lastname" type="text" value="<?php  echo $user_lastname; ?>" required>
                           
							 
							</div>
							<div class="form-group">
							<p>Region:</p>
                            <input class="form-control" placeholder="region" name="ruser_region" value="<?php echo $user_region; ?>"required>                  
                            
                            <br>
                            <p>City:</p>
                            <input class="form-control" placeholder="City" name="ruser_city" value="<?php echo $user_city; ?>"required>
                            <br>
							
							<p>Address:</p>

                                <input class="form-control" placeholder="Address" name="user_address" type="text" value="<?php  echo $user_address; ?>" required>
                           
                               <br> <p>Contact Number:</p>
								<div class="form-group">
            <input class="form-control" placeholder="Contact Number" name="user_contactnumber" type="text" value="<?php echo $user_contactnumber; ?>" required
            oninput="this.value =this.value.replace(/\D/g, '').substring(0, 11);">
		</div>

							</div>
							
							<p>Password:</p>
                            <div class="form-group">
							
                                <input class="form-control" placeholder="Password" name="user_password" type="password" value="<?php  echo $user_password; ?>" required>
                           
							 
							</div>
							
							<div class="form-group">
							
                                <input class="form-control hide" name="user_id" type="text" value="<?php  echo $user_id; ?>" required>
                           
							 
							</div>
							
							
							
							
				
							
				   
				   
					 </fieldset>
                  
            
              </div>
              <div class="modal-footer">
               
                <button class="btn btn-block btn-success btn-md" name="user_save">Save</button>
				
				<!-- <button type="button" class="btn btn-block btn-danger btn-md" data-dismiss="modal">Cancel</button>-->
				
				
				   </form>
              </div>
            </div>
          </div>
        </div>
        </div>
	  	  <script>
   
    $(document).ready(function() {
        $('#priceinput').keypress(function (event) {
            return isNumber(event, this)
        });


function handleClick(elementId, newText, newPrice, newImage, newLink, newDescription) {
    // Add an event listener to the specified element
    document.querySelector(`#${elementId}`).addEventListener('click', function() {
        // Select the <h4 class='modal-title'></h4> element
        var modalTitle = document.querySelector('h4.modal-title');
		var itemTitle = document.querySelector('div.item-title');
		var itemImage = document.querySelector('img.modal-img');
		var itemCheckout = document.querySelector('a.item-checkout');
		var itemDesc = document.querySelector('div.item-desc');
		var itemPrice = document.querySelector('div.item-price');
        
        // Check if the <h4> element already contains the specified text
        if (!modalTitle.textContent.includes(newText)) {
            // Set the new text to the modal title
            modalTitle.textContent = newText;
			itemTitle.textContent = newText;
			itemImage.src = newImage;
			itemCheckout.href = newLink;
			itemDesc.textContent = newDescription;
			itemPrice.textContent = newPrice;
        }
    });
}

// Use the function to add event listeners for each element with its corresponding text
handleClick('item_5', 'DFFRNT Be Like No Other','Price: ₱ 550','../Admin/item_images/DFFRNT APPAREL.jpg','add_to_cart.php?cart=5','Our DFFRNT t-shirt is designed to make you stand out with its bold and unique statement. This soft, comfortable tee features the phrase DFFRNT Be Like No Other for an unapologetically distinctive look. Ideal for those who embrace their individuality and express themselves with confidence.');
handleClick('item_6', 'DFFRNT BLAST OFF','Price: ₱ 450','../Admin/item_images/DFFRNT BLAST OFF.jpg','add_to_cart.php?cart=6','Our royal blue shirt with the DFFRNT BLAST OFF design is a bold statement piece for any wardrobe. Show off your unique style with this striking graphic, perfect for adding a pop of color and attitude to your outfit. Pair it with your favorite jeans or shorts for a cool, casual look. Made with high-quality fabric for lasting comfort and durability. Stand out and express yourself with this exclusive design!');
handleClick('item_7', 'DFFRNT GEAR 5th','Price: ₱ 560','../Admin/item_images/DFFRNT GEARTH 5th.webp','add_to_cart.php?cart=7','Unleash your style with the DFFRNT GEAR 5th Bistre Brown T-Shirt. This unique piece features bold lettering across the chest, celebrating the next level of fashion-forward design. Made from premium cotton for all-day comfort and durability.');
handleClick('item_8', 'DFFRNT MUGIWARA','Price: ₱ 355','../Admin/item_images/DFFRNT MUGIWARA.webp','add_to_cart.php?cart=8','Our ivory white t-shirt showcases the bold DFFRNT MUGIWARA design across the chest, inspired by the legendary pirate style. Crafted for comfort and style, this tee is perfect for making a statement. DETAILS: Soft, breathable fabric Classic fit Ribbed crew neckline');
handleClick('item_9', 'DFFRNT THERAPY','Price: ₱ 590','../Admin/item_images/DFFRNT THERAPY.webp','add_to_cart.php?cart=9','Our midnight black t-shirt features the bold statement "DFFRNT THERAPY" emblazoned across the chest, reflecting your unique and unconventional style. This striking piece is perfect for making a statement and expressing your individuality.');



    });
  
    function isNumber(evt, element) {

        var charCode = (evt.which) ? evt.which : event.keyCode

        if (
            (charCode != 45 || $(element).val().indexOf('-') != -1) &&      
            (charCode != 46 || $(element).val().indexOf('.') != -1) &&      
            (charCode < 48 || charCode > 57))
            return false;

        return true;
    }    
	
</script>
</body>
</html>
