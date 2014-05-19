<?php
include "../php/mysql_connect.php";

$sda1_size = exec("df  | awk 'NR<3&&NR>1 {print $4}'");
$sda1_use  = exec("df  | awk 'NR<3&&NR>1 {print $3}'");
$sda2_size = exec("df  | awk 'NR>6 {print $4}'");
$sda2_use  = exec("df  | awk 'NR>6 {print $3}'");

$sda1_percent=substr(100*$sda1_use/$sda1_size, 0, 2);


$sda2_percent=substr(100*$sda2_use/$sda2_size, 0, 2);



$query="SELECT count(*) AS Anzahl FROM images";
$rawdb1=@mysql_query($query);
$array=@mysql_fetch_array($rawdb1);

$result=mysql_query("SELECT log_image AS IMAGE_NAME, log_count AS COUNT, log_room AS ROOM, log_user AS USER, log_type AS TYPE, log_date AS DATE
FROM log_server
WHERE
UNIX_TIMESTAMP(log_date)>= (UNIX_TIMESTAMP()-7*24*60*60)
ORDER BY log_date asc");


ob_start();
while($row = mysql_fetch_array($result))
{
echo '<tr>';
echo '<td>' . $row['IMAGE_NAME'] . '</td>';
echo '<td>' . $row['COUNT'] . '</td>';
echo '<td>' . $row['ROOM'] . '</td>';
echo '<td>' . $row['USER'] . '</td>';
if ($row['TYPE']=="restore")
{
echo '<td style = "background: #e4efc0;
background: -moz-linear-gradient(top, #e4efc0 0%, #abbd73 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#e4efc0), color-stop(100%,#abbd73));
background: -webkit-linear-gradient(top, #e4efc0 0%,#abbd73 100%);
background: -o-linear-gradient(top, #e4efc0 0%,#abbd73 100%);
background: -ms-linear-gradient(top, #e4efc0 0%,#abbd73 100%);
background: linear-gradient(to bottom, #e4efc0 0%,#abbd73 100%);
border-bottom: 1px solid #abbd73;
border-left: 1px solid #abbd73;
border-top: 1px solid #abbd73;">
' . $row['TYPE'] . '
</td>';
}
else
{
echo '<td style = "background: #a7c7dc;
background: -moz-linear-gradient(top, #a7c7dc 0%, #85b2d3 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#a7c7dc), color-stop(100%,#85b2d3));
background: -webkit-linear-gradient(top, #a7c7dc 0%,#85b2d3 100%);
background: -o-linear-gradient(top, #a7c7dc 0%,#85b2d3 100%);
background: -ms-linear-gradient(top, #a7c7dc 0%,#85b2d3 100%);
background: linear-gradient(to bottom, #a7c7dc 0%,#85b2d3 100%);
border-bottom: 1px solid #85b2d3;
border-left: 1px solid #85b2d3;
border-top: 1px solid #85b2d3;">
' . $row['TYPE'] . '
</td>';
}
echo '<td>' . $row['DATE'] . '</td>';
}
$table = ob_get_clean();





$bernd = "Bernd Barthelmann";

$mailtext = '<html>
<head>
<!-- If you delete this meta tag, Half Life 3 will never be released. -->
<meta name="viewport" content="width=device-width" />

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>TAC-RECOVERY</title>

<style>
* {
    margin: 0;
    padding: 0;
}
* {
    font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
}
img {
    max-width: 100%}
.collapse {
    margin: 0;
    padding: 0;
}
body {
    -webkit-font-smoothing: antialiased;
    -webkit-text-size-adjust: none;
    width: 100% !important;
    height: 100%}
a {
    color: #2ba6cb;
}
 .btn {
    display:  inline-block;
    padding:  6px 12px;
    margin-bottom:  0;
    font-size:  14px;
    font-weight:  normal;
    line-height:  1.428571429;
    text-align:  center;
    white-space:  nowrap;
    vertical-align:  middle;
    cursor:  pointer;
    border:  1px solid transparent;
    border-radius:  4px;
    -webkit-user-select:  none;
    -moz-user-select:  none;
    -ms-user-select:  none;
    -o-user-select:  none;
    user-select:  none;
    color:  #333;
    background-color:  white;
    border-color:  #CCC;
}
 p.callout {
    padding: 15px;
    background-color: #ecf8ff;
    margin-bottom: 15px;
}
.callout a {
    font-weight: bold;
    color: #2ba6cb;
}
table.social {
    background-color: #ebebeb;
}
.social .soc-btn {
    padding: 3px 7px;
    border-radius: 2px;
     -webkit-border-radius: 2px;
     -moz-border-radius: 2px;
     font-size: 12px;
    margin-bottom: 10px;
    text-decoration: none;
    color: #FFF;
    font-weight: bold;
    display: block;
    text-align: center;
}
a.fb {
    background-color: #3b5998 !important;
}
a.tw {
    background-color: #1daced !important;
}
a.gp {
    background-color: #db4a39 !important;
}
a.ms {
    background-color: #000 !important;
}
.sidebar .soc-btn {
    display: block;
    width: 100%}
table.head-wrap {
    width: 100%}
.header.container table td.logo {
    padding: 15px;
}
.header.container table td.label {
    padding: 15px;
    padding-left: 0;
}
table.body-wrap {
    width: 100%}
table.footer-wrap {
    width: 100%;
    clear: both !important;
}
.footer-wrap .container td.content p {
    border-top: 1px solid #d7d7d7;
    padding-top: 15px;
}
.footer-wrap .container td.content p {
    font-size: 10px;
    font-weight: bold;
}
h1, h2, h3, h4, h5, h6 {
    font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
    line-height: 1.1;
    margin-bottom: 15px;
    color: #000;
}
h1 small, h2 small, h3 small, h4 small, h5 small, h6 small {
    font-size: 60%;
    color: #6f6f6f;
    line-height: 0;
    text-transform: none;
}
h1 {
    font-weight: 200;
    font-size: 44px;
}
h2 {
    font-weight: 200;
    font-size: 37px;
}
h3 {
    font-weight: 500;
    font-size: 27px;
}
h4 {
    font-weight: 500;
    font-size: 23px;
}
h5 {
    font-weight: 900;
    font-size: 17px;
}
h6 {
    font-weight: 900;
    font-size: 14px;
    text-transform: uppercase;
    color: #444;
}
.collapse {
    margin: 0 !important;
}
p, ul {
    margin-bottom: 10px;
    font-weight: normal;
    font-size: 14px;
    line-height: 1.6;
}
p.lead {
    font-size: 17px;
}
p.last {
    margin-bottom: 0;
}
ul li {
    margin-left: 5px;
    list-style-position: inside;
}
ul.sidebar {
    background: #ebebeb;
    display: block;
    list-style-type: none;
}
ul.sidebar li {
    display: block;
    margin: 0;
}
ul.sidebar li a {
    text-decoration: none;
    color: #666;
    padding: 10px 16px;
    margin-right: 10px;
    cursor: pointer;
    border-bottom: 1px solid #777;
    border-top: 1px solid #fff;
    display: block;
    margin: 0;
}
ul.sidebar li a.last {
    border-bottom-width: 0;
}
ul.sidebar li a h1, ul.sidebar li a h2, ul.sidebar li a h3, ul.sidebar li a h4, ul.sidebar li a h5, ul.sidebar li a h6, ul.sidebar li a p {
    margin-bottom: 0 !important;
}
.container {
    display: block !important;
    max-width: 600px !important;
    margin: 0 auto !important;
    clear: both !important;
}
.content {
    padding: 15px;
    max-width: 600px;
    margin: 0 auto;
    display: block;
}
.content table {
    width: 100%}
.column {
    width: 300px;
    float: left;
}
.column tr td {
    padding: 15px;
}
.column-wrap {
    padding: 0 !important;
    margin: 0 auto;
    max-width: 600px !important;
}
.column table {
    width: 100%}
.social .column {
    width: 280px;
    min-width: 279px;
    float: left;
}
.clear {
    display: block;
    clear: both;
}
@media only screen and (max-width:600px) {
    a[class="btn"] {
    display: block !important;
    margin-bottom: 10px !important;
    background-image: none !important;
    margin-right: 0 !important;
}
div[class="column"] {
    width: auto !important;
    float: none !important;
}
table.social div[class="column"] {
    width: auto !important;
}
}
table.images a:link {
	color: #666;
	font-weight: bold;
	text-decoration:none;
}
table.images.images a:visited {
	color: #999999;
	font-weight:bold;
	text-decoration:none;
}
table.images.images a:active,
table.images a:hover {
	color: #bd5a35;
	text-decoration:underline;
}
table.images {
	font-family:Arial, Helvetica, sans-serif;
	color:#666;
	font-size:12px;
	text-shadow: 1px 1px 0px #fff;
	background:#eaebec;
	margin:0px;
	border:#ccc 1px solid;

	-moz-border-radius:3px;
	-webkit-border-radius:3px;
	border-radius:3px;

	-moz-box-shadow: 0 1px 2px #d1d1d1;
	-webkit-box-shadow: 0 1px 2px #d1d1d1;
	box-shadow: 0 1px 2px #d1d1d1;
}
table.images th {
	padding:10px 10px 10px 10px;
	border-top:1px solid #fafafa;
	border-bottom:1px solid #e0e0e0;

	background: #ededed;
	background: -webkit-gradient(linear, left top, left bottom, from(#ededed), to(#ebebeb));
	background: -moz-linear-gradient(top,  #ededed,  #ebebeb);
}
table.images th:first-child {
	text-align: left;
	padding-left:20px;
}
table.images tr:first-child th:first-child {
	-moz-border-radius-topleft:3px;
	-webkit-border-top-left-radius:3px;
	border-top-left-radius:3px;
}
table.images tr:first-child th:last-child {
	-moz-border-radius-topright:3px;
	-webkit-border-top-right-radius:3px;
	border-top-right-radius:3px;
}
table.images tr {
	text-align: center;
	padding-left:20px;
}
table.images td:first-child {
	text-align: left;
	padding-left:20px;
	border-left: 0;
}
table.images td {
	padding:7px;
	border-top: 1px solid #ffffff;
	border-bottom:1px solid #e0e0e0;
	border-left: 1px solid #e0e0e0;

	background: #fafafa;
	background: -webkit-gradient(linear, left top, left bottom, from(#fbfbfb), to(#fafafa));
	background: -moz-linear-gradient(top,  #fbfbfb,  #fafafa);
}
table.images tr.even td {
	background: #f6f6f6;
	background: -webkit-gradient(linear, left top, left bottom, from(#f8f8f8), to(#f6f6f6));
	background: -moz-linear-gradient(top,  #f8f8f8,  #f6f6f6);
}
table.images tr:last-child td {
	border-bottom:0;
}
table.images tr:last-child td:first-child {
	-moz-border-radius-bottomleft:3px;
	-webkit-border-bottom-left-radius:3px;
	border-bottom-left-radius:3px;
}
table.images tr:last-child td:last-child {
	-moz-border-radius-bottomright:3px;
	-webkit-border-bottom-right-radius:3px;
	border-bottom-right-radius:3px;
}
table.images tr:hover td {
	background: #f2f2f2;
	background: -webkit-gradient(linear, left top, left bottom, from(#f2f2f2), to(#f0f0f0));
	background: -moz-linear-gradient(top,  #f2f2f2,  #f0f0f0);
}


.progress {
  overflow: hidden;
  margin: 20px auto;
  padding: 0 15px;
  width: 220px;
  height: 34px;
  background: #d3d5d9;
  border-radius: 2px;
  background-image: -webkit-linear-gradient(top, #ebecef, #bfc3c7);
  background-image: -moz-linear-gradient(top, #ebecef, #bfc3c7);
  background-image: -o-linear-gradient(top, #ebecef, #bfc3c7);
  background-image: linear-gradient(to bottom, #ebecef, #bfc3c7);
  -webkit-box-shadow: inset 0 1px rgba(255, 255, 255, 0.8), 0 2px 4px rgba(0, 0, 0, 0.35), 0 0 0 1px rgba(0, 0, 0, 0.1), 0 0 0 6px #b6babe, 0 7px rgba(255, 255, 255, 0.1);
  box-shadow: inset 0 1px rgba(255, 255, 255, 0.8), 0 2px 4px rgba(0, 0, 0, 0.35), 0 0 0 1px rgba(0, 0, 0, 0.1), 0 0 0 6px #b6babe, 0 7px rgba(255, 255, 255, 0.1);
}

.progress-val {
  float: right;
  margin-left: 15px;
  font: bold 15px/34px Helvetica, Arial, sans-serif;
  color: #333;
  text-shadow: 0 1px rgba(255, 255, 255, 0.6);
}

.progress-bar {
  display: block;
  overflow: hidden;
  height: 8px;
  margin: 13px 0;
  background: #b8b8b8;
  border-radius: 4px;
  background-image: -webkit-linear-gradient(top, rgba(0, 0, 0, 0.2), transparent 60%);
  background-image: -moz-linear-gradient(top, rgba(0, 0, 0, 0.2), transparent 60%);
  background-image: -o-linear-gradient(top, rgba(0, 0, 0, 0.2), transparent 60%);
  background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.2), transparent 60%);
  -webkit-box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.2), 0 1px rgba(255, 255, 255, 0.6);
  box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.2), 0 1px rgba(255, 255, 255, 0.6);
}

.progress-in {
  display: block;
  min-width: 8px;
  height: 8px;
  background: #1997e6;
  background-image: -webkit-linear-gradient(top, rgba(255, 255, 255, 0.3), rgba(255, 255, 255, 0) 60%, rgba(0, 0, 0, 0) 61%, rgba(0, 0, 0, 0.2)), -webkit-linear-gradient(left, #147cd6, #24c1fc);
  background-image: -moz-linear-gradient(top, rgba(255, 255, 255, 0.3), rgba(255, 255, 255, 0) 60%, rgba(0, 0, 0, 0) 61%, rgba(0, 0, 0, 0.2)), -moz-linear-gradient(left, #147cd6, #24c1fc);
  background-image: -o-linear-gradient(top, rgba(255, 255, 255, 0.3), rgba(255, 255, 255, 0) 60%, rgba(0, 0, 0, 0) 61%, rgba(0, 0, 0, 0.2)), -o-linear-gradient(left, #147cd6, #24c1fc);
  background-image: linear-gradient(to bottom, rgba(255, 255, 255, 0.3), rgba(255, 255, 255, 0) 60%, rgba(0, 0, 0, 0) 61%, rgba(0, 0, 0, 0.2)), linear-gradient(to right, #147cd6, #24c1fc);
  border-radius: 4px;
  -webkit-box-shadow: inset 0 1px rgba(0, 0, 0, 0.2), inset 0 0 0 1px rgba(0, 0, 0, 0.2);
  box-shadow: inset 0 1px rgba(0, 0, 0, 0.2), inset 0 0 0 1px rgba(0, 0, 0, 0.2);
}




</style>
</head>

<body bgcolor="#FFFFFF">

<!-- HEADER -->
<table class="head-wrap" background="border.png">
	<tr>
		<td></td>
		<td class="header container" >

				<div class="content">
					<table>
						<tr>
							<td align="left"><h1 class="collapse">Wochen&uuml;bersicht</h1></td>
							<td align="right"><h6 class="collapse">TAC-RECOVERY</h6></td>
						</tr>
					</table>
				</div>

		</td>
		<td></td>
	</tr>
</table><!-- /HEADER -->


<!-- BODY -->
<table class="body-wrap">
	<tr>
		<td></td>
		<td class="container" bgcolor="#FFFFFF">

			<div class="content">
			<table>
				<tr>
					<td>
						<h3>Hi, '.$bernd.' </h3>
						<p class="lead">Im Moment befinden sich '.$array["Anzahl"].' Images auf dem Sytem.</p>
						<p>In der letzten Woche wurde folgende Aktivit&auml;ten registriert:</p>
						<table class="images" >
						<tr>
						<th>Image Name</th>
						<th>Anzahl</th>
						<th>Raum</th>
						<th>Benutzer</th>
						<th>Typ</th>
						<th>DATUM</th>
						</tr>
						'.$table.'
						</table>




						<!-- Callout Panel -->
						<p class="">

						</p><!-- /Callout Panel -->


						<!-- social & contact -->
						<table class="social" width="100%">
							<tr>
								<td>

									<!-- column 1 -->
									<table align="left" class="column">
										<tr>
											<td>

												<h5 class="">System-Disk in use:</h5>
												<div class="progress">
						                          <span class="progress-val">'.$sda1_percent.'%</span>
						                          <span class="progress-bar"><span class="progress-in" style="width: '.$sda1_percent.'%"></span></span>
						                        </div>


											</td>
										</tr>
									</table><!-- /column 1 -->

									<!-- column 2 -->
									<table align="left" class="column">
										<tr>
											<td>

												<h5 class="">Storage-Disk in use:</h5>
							                      <div class="progress">
							                        <span class="progress-val">'.$sda2_percent.'%</span>
							                        <span class="progress-bar"><span class="progress-in" style="width: '.$sda2_percent.'%"></span></span>
							                      </div>
											</td>
										</tr>
									</table><!-- /column 2 -->

									<span class="clear"></span>

								</td>
							</tr>
						</table><!-- /social & contact -->

					</td>
				</tr>
			</table>
			</div><!-- /content -->

		</td>
		<td></td>
	</tr>
</table><!-- /BODY -->

<!-- FOOTER -->
<table class="footer-wrap">
	<tr>
		<td></td>
		<td class="container">

				<!-- content -->
				<div class="content">
				<table>
				<tr>
					<td align="center">
						<p>
							<a href="#">Terms</a> |
							<a href="#">Privacy</a> |
							<a href="#"><unsubscribe>Unsubscribe</unsubscribe></a>
						</p>
					</td>
				</tr>
			</table>
				</div><!-- /content -->

		</td>
		<td></td>
	</tr>
</table><!-- /FOOTER -->

</body>
</html>
';

$empfaenger = "robert.schuetze@gmail.com bernd.barthelmann@siemens.com"; //Mailadresse
$absender   = "tac.recovery@erlangen.de";
$betreff    = "Wochenübersicht TAC-RECOVERY";
$antwortan  = "ICH@testkarnickel.de";

$header  = "MIME-Version: 1.0\r\n";
$header .= "Content-type: text/html; charset=iso-8859-1\r\n";

$header .= "From: $absender\r\n";
$header .= "Reply-To: $antwortan\r\n";
// $header .= "Cc: $cc\r\n";  // falls an CC gesendet werden soll
$header .= "X-Mailer: PHP ". phpversion();

mail( $empfaenger,
      $betreff,
      $mailtext,
      $header);

echo "Mail wurde gesendet!";
?>