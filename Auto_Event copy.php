

<?php

	echo"<p style=' width:100%; padding: 30px;'></p>";

    include('session.php');
	include('menubar.php');
    include('Supabase_connect.php');

?>

    <!DOCTYPE html>
	<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="NewEventHomePage.css">
		<link rel="stylesheet" href="footer.css">
    </head>

    <body>


    <?php


if (isset($_POST['event_id']))					$event_id = $_POST['event_id'];		
if (isset($_GET['r']))					{$event_id = $_GET['r'];}


$query = 'SELECT * FROM "event_page" WHERE "event_id" =\'' . $event_id . '\';';
    $result = pg_query($conn, $query);
    if (!$result) {echo "Query Error [$query] " . pg_last_error($conn);}


$query2 = 'SELECT * FROM "event_perk" WHERE "event_id" =\'' . $event_id . '\';';
    $result2 = pg_query($conn, $query2);
    if (!$result2) {echo "Query Error [$query2] " . pg_last_error($conn);}


$query3 = 'SELECT * FROM "event_slide" WHERE "event_id" =\'' . $event_id . '\';';
    $result3 = pg_query($conn, $query3);
    if (!$result3) {echo "Query Error [$query3] " . pg_last_error($conn);}

$query4 = 'SELECT * FROM "event_guest" WHERE "event_id" =\'' . $event_id . '\';';
    $result4 = pg_query($conn, $query4);
    if (!$result4) {echo "Query Error [$query4] " . pg_last_error($conn);}

$query5 = 'SELECT * FROM "club_comment" WHERE "event_id" =\'' . $event_id . '\';';
    $result5 = pg_query($conn, $query5);
    if (!$result5) {echo "Query Error [$query5] " . pg_last_error($conn);}


    while ($row = pg_fetch_assoc($result)) {
        $event_id = $row['event_id'];
        $e_name = $row['e_name'];
        $e_tag = $row['e_tag'];
        $e_desc = $row['e_desc'];
        $e_pic = $row['e_pic'];
        $e_date = $row['e_date'];
        $e_time = $row['e_time'];
        $e_location = $row['e_location'];
        $e_places = $row['e_places'];
        $place_pic = $row['place_pic'];
        $header_pic = $row['header_pic'];
        $icon_pic = $row['icon_pic'];
        $e_price = $row['e_price'];
        $e_categoris = $row['e_categoris'];
        $e_max_mem = $row['e_max_mem'];
        $e_members = $row['e_members'];
        $made_Date = $row['made_date'];
        $joined_users = $row['joined_users'];
        $imageUrl = 'https://drive.google.com/uc?export=view&id=';
    
    
    echo"
     <div class='eventHeaderContainer'>
     <div class='eventImageHeaderContainer'>
         <img src='$imageUrl$header_pic' alt=''>
         <div class='eventImageDescription'>
             <h1></h1>
         </div>
     </div>
    </div>
    
    <div class='eventDetailsContainer'>
     <div class='eventDescriptionBlock1'>
         <div class='eventDescriptionBlock1Header'>
             <div class='eventIcon1'>
                 <img src='$imageUrl$icon_pic' alt=''>
                
             </div>
             <div class='eventTitle'>
                 <h1>$e_name</h1>
                 <h1>$e_tag</h1>
             </div>
             <div class='eventDatePosted'>
                 <h2>$made_Date </h2>
                 <h1>
                 <!-- <i class='far fa-heart'></i> -->
                     
                 </h1>
             </div>
             
         </div>
    
         <div class='eventDecriptionBlock1Images'>
    <div class='slideshow-container'>";
             //<img src='./NewEventHomePagePictures/fsc-job-fair-event.jpg' alt=''>
             while ($row = pg_fetch_assoc($result3)) {
                $E_slide_id = $row['E_slide_id'];
                $Slide_title = $row['E_S_title'];
                $Slide_des = $row['E_S_des'];
                $Slide_pic = $row['E_S_pic'];
                $event_id = $row['event_id'];
                $imageUrl = 'https://drive.google.com/uc?export=view&id=';

                echo"
                <div class='mySlides fade'>
                <div class='numbertext'> " . ($i+1) . "</div>
                <img src='$imageUrl$Slide_pic' style='width:100%'>
                <div class='text'>$Slide_title<br>$Slide_des</div>
                </div>
                ";}
                echo"	
                <div class='prev' onclick='plusSlides(-1)'>❮</div>
                <div class='next'  onclick='plusSlides(1)'>❯</div>
                <br>
                <div class='do' style='text-align:center'>
                    <span class='dot' onclick='currentSlide(1)'></span> 
                    <span class='dot' onclick='currentSlide(2)'></span> 
                    <span class='dot' onclick='currentSlide(3)'></span> 
                </div>
                </div>
                <br>
                
                <script src='autoSlide.js'></script>
                <script src='clickSlide.js'></script>
                </section>
                 "; 
             
         echo"</div>
    
    
         <div class='eventDecriptionBlock1MisDetails'>
             <div class='eventTime'>
                 <p><span class='dateTime'>Date:</span> $e_date</p>
                 <p><span class='dateTime'>Time:</span> $e_time</p>
             </div>
             <div class='eventMembers' style='text-align: center;'>
                 <h1>Members</h1>
                 <div>
                     <button>$e_members/$e_max_mem</button>
                 </div>
             </div>
             <div class='joinSection'> 
                 <p>$e_price</p>
                 <button class='joinButton'>Join</button>
             </div>
         </div>
    
         
     </div>
     <div class='eventDescriptionBlock2'>
         <h1>Location</h1>
         <img style='margin-bottom:20px;'src='$imageUrl$places_Pic' alt=''>
         <!--<img src='$map_url' alt='Map'>
         <p><br> fsdf $map_url </p>-->
         <iframe width='100%' height='400' frameborder='0'
          style='border:0' src='$e_location' allowfullscreen></iframe>
         <h2>$e_places</h2>
    
         <div class='eventPerks'>
         <h1>Perks</h1>";
         while ($row = pg_fetch_assoc($result2)) {
            $e_perk_id = $row['e_perk_id'];
            $Per_desc = $row['e_p_desc'];
            $color = $row['color'];
            $event_id = $row['event_id'];
            $imageUrl = 'https://drive.google.com/uc?export=view&id=';
             
            echo" <button>$Per_desc</button>";
        }
        echo"
         </div>
         <h1 style='margin-top: 40px; margin-bottom: 0px;'>Guest Speakers</h1>
         <div class='specialGuestsContainer'>";

         while ($row = pg_fetch_assoc($result4)) {
            $e_guest_id = $row['e_guest_id'];
            $guest_name = $row['e_guest_title'];
            $guest_desc = $row['e_guest_desc'];
            $guest_pic = $row['e_guest_pic'];
            $color = $row['color'];
            $event_id = $row['event_id'];
            $imageUrl = 'https://drive.google.com/uc?export=view&id=';

            echo"
             <div class='guestIconContainter'>
                 <img src='$imageUrl$guest_pic' alt=''>
                 <div class='guestSpeakerDescription'>
                     <h2>$guest_name</h2>
                     <p>$guest_desc</p>
                 </div>
             </div>";
         } 
         echo"
             <div class='guestIconContainter'>
                 <img src='./NewEventHomePagePictures/jeff-bezos.jpg' alt=''>
                 <div class='guestSpeakerDescription'>
                     <h2>Josh Smith</h2>
                     <p>Josh Smith is the president of Amazon and is visiting Farmigndale State College to talk about future jobs.
                         He is a must listen as you get to learn valuable knowledge and network with him
                     </p>
                 </div>
             </div>
    
         </div>
     </div>
    </div>
    <div class='bottomEventContainer'>
     <div class='eventOverviewDescription'>
         <h1>Event Overview</h1>
         <p>$e_desc</p>
     </div>
    </div>
    
    "; 


    }
    echo" <br><br><br>";

    include('footer.php');
?>

</section>

</body>

</html>
