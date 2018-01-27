<html >
<body>
<?php
$city=$_GET["id"];

if(strcasecmp($city,"New York") == 0)
{
  echo "New York City - Home to the Empire State Building, Times Square, Statue of Liberty and other iconic sites,<br> New York City is a fast-paced, globally influential center of art, culture, fashion and finance. <br>The cityâ€™s 5 boroughs sit where the Hudson River meets the Atlantic Ocean, with the island borough of Manhattan at the 'Big Apple's' core.";
}
if(strcasecmp($city,"California") == 0)
{
  echo "California, a western U.S. state, stretches from the Mexican border along the Pacific for nearly 900 miles. Its terrain includes cliff-lined beaches, redwood forest, the Sierra Nevada Mountains, Central Valley farmland and the Mojave Desert. The city of Los Angeles is the seat of the Hollywood entertainment industry. Hilly San Francisco is known for the Golden Gate Bridge, Alcatraz Island and cable cars..";
}
if(strcasecmp($city,"Florida") == 0)
{
  echo "Florida is the southeasternmost U.S. state, with the Atlantic on one side and the Gulf of Mexico on the other. It has hundreds of miles of beaches. The city of Miami is known for its Latin-American cultural influences and notable arts scene, as well as its nightlife, especially in upscale South Beach. Orlando is famed for theme parks, including Walt Disney World..";
  }
?>

</body>
</html>

