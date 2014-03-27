

<?php 

session_start();

if  (isset($_SESSION['user_id'])){
	
	$userId = $_SESSION['user_id'];

//echo '<li><a href="EducationReport.php?">Add School Information</a></li>';
//echo '<li>View Sashi\'s Calendar</li>';

	
}

// Needs to be syncronized with configuration value of $rootDirectory
$config =  $_SERVER['DOCUMENT_ROOT'].'/IvyAmbitions/config.php';
include $config;

$userName= null;

if (isset($_SESSION['user_id']))
{
	require('dbUtilities.php');
	$mysqli = getDbConnection();
	if ($mysqli->connect_error){
		echo "Failed to connect to MySQL: " . $mysqli->connect_errno;
	}
	$stmt = $mysqli->stmt_init();
	$query= "select user_name from security_user where user_id=? ";

	if ($stmt->prepare($query))
	{
		$stmt->bind_param("s", $userId);
		$userId=$_SESSION['user_id' ];
		$stmt->execute();
		$stmt->bind_result($userName);
		while ($row = $stmt->fetch())
		{
			echo ' WELCOME '. $userName;
		}
	}
}

?>


<script src="js/jquery-1.3.2.min.js" type="text/javascript"></script>






		<div class="nav-wrapper">
				<nav class="navbar top-navigation">
					<div class="logo">
						<a href="<?php echo $rootDirectory?>/index.php" title="Visit Ivy Ambitions Homepage">
							<img src="/IvyAmbitions/images/ivy-ambitions-logo-v2.png" alt="Ivy Ambitions" width="105" />
						</a>
					</div>
					<ul class="nav-tabs-left">
						<li class="first" onMouseOver="show('submenu1');hide('submenu2');hide('submenu3');"><a title="See What Services Ivy Ambitions Offers" href="<?php echo $rootDirectory?>/what-we-offer.php">What We Offer</a></li>
						<li onMouseOver="show('submenu2');hide('submenu1');hide('submenu3')"><a title="Read the Story Behind Ivy Ambitions" href="<?php echo $rootDirectory?>/our-story.php">Our Story</a></li>
						<li class="last" onMouseOver="show('submenu3');hide('submenu1');hide('submenu2');"><a title="View Useful Pages &amp; Sites" href="<?php echo $rootDirectory?>/resources.php">Resources</a></li>
					</ul>
					<span class="nav-tabs-right-container">
						<ul class="nav-tabs-right">	
						<?php  if (!isset($userName)) {?>
							<li>
							<a href="<?php echo $rootDirectory?>/login_content/login.php" >Login</a>
							</li>
							<li><a title="Schedule a FREE Consultation" href="<?php echo $rootDirectory?>/contact.php">Contact Us Today!</a></li>
						<?php  } else { echo 'Welcome '. $userName; }?>
						
						</ul>
					</span>
				</nav>
				<nav class="navbar sub-top-navigation">
					<div id="submenu1">
						<ul>
							<li class="first"><a title="ACT &amp; SAT Test Preparation" href="<?php echo $rootDirectory?>/what-we-offer/act-sat-preparation.php">ACT/SAT</a></li>
							<li><a title="High School Tutoring" href="<?php echo $rootDirectory?>/what-we-offer/high-school.php">High School</a></li>
							<li><a title="College Admission Guidance" href="<?php echo $rootDirectory?>/what-we-offer/college-admission.php">College Admission</a></li>
							<li><a title="Summer Educational Programs" href="<?php echo $rootDirectory?>/what-we-offer/summer-programs.php">Summer Programs</a></li>
							<li class="last"><a title="Other Services Offered" href="<?php echo $rootDirectory?>/what-we-offer/other-services.php">Other Services</a></li>
						</ul>
					</div>
					<div id="submenu2">
						<ul>
							<li class="first"><a title="View Testimonials From Past &amp; Present Students" href="<?php echo $rootDirectory?>/our-story/testimonials.php">Testimonials</a></li>
							<li class="last"><a title="Meet the Staff" href="<?php echo $rootDirectory?>/our-story/bios.php">Bios</a></li>
						</ul>
					</div>
					<div id="submenu3">
						<li class="first"><a title="Check Out the Ivy Ambitions Blog" href="<?php echo $rootDirectory?>/resources/news-blog.php">News/Blog</a></li>
						<li><a title="Helpful Links to Other Sites" href="<?php echo $rootDirectory?>/resources/useful-links.php">Useful Links</a></li>
						<li class="last"><a title="Frequently Asked Questions" href="<?php echo $rootDirectory?>/resources/faqs.php">FAQs</a></li>
					</div>
				</nav>
				<div id="hide-submenu-trigger" onMouseOver="hide('submenu1');hide('submenu2');hide('submenu3');">
				</div>
			</div>
			
		


