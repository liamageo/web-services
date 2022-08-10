<html>
<head>
<title>Pacific Islands</title>
<style>
	body {font-family:georgia;}
  
  .film{
    border:1px solid #E77DC2;
    border-radius: 5px;
    padding: 5px;
    margin-bottom:5px;
    position:relative;   
  }
 
  .pic{
    position:absolute;
    right:10px;
    top:10px;
  }
  
</style>
  
<script src="https://code.jquery.com/jquery-latest.js"></script>

<script type="text/javascript">

function islandTemplate(islands){

  return ` 
      <div class="islands">
        <b>Island</b>: ${islands.Island}<br />
        <b>Name</b>: ${islands.Name}<br />
        <b>Hello</b>: ${islands.Hello}<br />
        <b>Pacific  Group</b>: ${islands.PacificGroup}<br />
        <b>Language</b>: ${islands.Language}<br />
        <b>Currency</b>: ${islands.Currency}<br />
        <b>Capital</b>: ${islands.Capital}<br />
        <b>Population</b>: ${islands.Population}r<br />
        <div class="pic"><img src="thumbnails/${islands.Image}" />
      </div>
        `; 

}

  
$(document).ready(function() { 
 
 $('.category').click(function(e){
   e.preventDefault(); //stop default action of the link
   cat = $(this).attr("href");  //get category from URL
  
   var request = $.ajax({
     url: "api.php?cat=" + cat,
     method: "GET",
     dataType: "json"
   });
   request.done(function( data ) {
     console.log(data);

     /*
     // using JSON.stringify we can view the data on the page
     let myData = JSON.stringify(data,null,4);
     myData = "<pre>" + myData + "</pre>";
     $("#output").html(myData);
     */

    // use data.title to show the order of films
     $("#islandtitle").html(data.title); // JS objection notation

    //clear the previous films
     $("#islands").html("");

    //loop through data.films and add to #films div (for loop with jQuery)
     $.each(data.islands, function(i,item){
        let myIslands = islandTemplate(item);
        $("<div></div>").html(myIslands).appendTo("#islands");      
     }); 
     
   });
   request.fail(function(xhr, status, error ) {
alert('Error - ' + xhr.status + ': ' + xhr.statusText);
   });
 
  });
}); 



</script>
</head>
	<body>
	<h1>Pacific Islands</h1>
		<a href="alphabetical" class="category">Pacific Islands by Alphabetical Order</a><br />
		<a href="population" class="category">Pacific Islands by Population</a>
		<h3 id="islandstitle">A List of Different Pacific Ocean Islands</h3>
		<div id="islands">
      <!--
      <div class="film"></div>
        <b>Film</b>: 1<br />
        <b>Title</b>: Dr. No<br />
        <b>Year</b>: 1962<br />
        <b>Director</b>: Terence Young<br />
        <b>Producers</b>: Harry Saltzman and Albert R. Broccoli<br />
        <b>Writers</b>: Richard Maibaum, Johanna Harwood and Berkely Mather<br />
        <b>Composer</b>: Monty Norman<br />
        <b>Bond</b>: Sean Connery<br />
        <b>Budget</b>: $1,000,000.00<br />
        <b>BoxOffice</b>: $59,567,035.00<br />
        <div class="pic"><img src="thumbnails/dr-no.jpg" />          </div>
      -->
		</div>
		<div id="output">IT121 - Lia Mageo 2022</div>
	</body>
</html>