<?php
  $now = date("d-m-Y");
  $dbsql = "stats";
  $db = mysqli_connect( "localhost", "root", "root");
  @mysql_select_db( "webstat", $db);

  echo "<center><h1>Web Statistics</h1></center>";

  echo "<center><table border=1 width=80%><tr><td colspan=3><b>Web statistics from:</b> ";

$sql = "SELECT ondate FROM $dbsql ORDER BY id LIMIT 1";
$results = @mysqli_query($sql);
while ($myrow = @mysql_fetch_array($results))
{
  $temp_date = $myrow["onedate"];
  $date = substr($temp_date, 8, 4). "-".substr($temp_date, 5, 2)."-".substr($temp_date, 0, 4);
  echo $date;
}
echo " <b>To:</b> $now</td></tr>";

$sql = "SELECT COUNT(*) AS Count FROM $dbsql" ;
$results = @mysqli_query ($sql);
while ($myrow = @mysql_fetch_array($results))
{
  $overall_total = $myrow ["Count"];
}
echo "<tr><td colspan=3><b>Total number of hits:</b>$overall_total</td></tr>";

echo "<tr><td><b>Date</b></td><td><b>IP Address</b></td><td><b>Browser and Operating system</b></td></tr>";

$sql = "SELECT * FROM $dbsql";
$results = @mysqli_query($sql);
while ($myrow = @mysql_fetch_array($results))
{
  $ip = $myrow["ip"];
  $browser = $myrow["browser"];
  $ondate = $myrow["ondate"];
  echo "<tr><td>$ondate</td><td>$ip</td><td>$browser</td></tr>";
}

$sql = "SELECT COUNT(*) AS Count FROM $dbsql" ;
$results = @mysqli_query ($sql);
while ($myrow = @mysql_fetch_array($results))
{
  $overall_total = $myrow ["Count"];
}
echo "</table></center>";
 ?>
