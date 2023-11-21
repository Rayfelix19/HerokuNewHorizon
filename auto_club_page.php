
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
		<link rel="stylesheet" href="club_home_css.css">
        <link rel="stylesheet" href="SlideShow.css">
		<link rel="stylesheet" href="footer.css">
        <style>
		#ma{
        display: flex;
        justify-content: center;
        width: 300px;
        background-color: #FAF0E6;
        padding: 10px;
        margin: 20px;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    </style>
    </head>

    <body>

<?php        

$ck="<i class='fa fa-duotone fa-check' style='font-size:25px;color:green;'></i>";
$cr="<i class='fa fa-duotone fa-xmark' style='font-size:25px;color:red;'></i>";


if (isset($_POST['club_id']))					$club_id = $_POST['club_id'];		
if (isset($_GET['r']))					{$club_id = $_GET['r'];}

if (isset($_POST['task']))			$task = $_POST['task'];						else $task = "First";

if (isset($_POST['comments']))			$comments = trim($_POST['comments']);	    else $comments = NULL;
if (isset($_POST['rating']))			$rating = trim($_POST['rating']);       else $rating = NULL;

echo"<section class='section_01'>";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['Submit_Review'])) {
        echo" ";
        echo"<div id='ma'>";
    echo"<input type='hidden' name='club_id' value='$club_id'> ";
    $query5 ='INSERT INTO "club_comment" ("rating", "Likes", "Dislikes", "comments", "club_id", "com_name", "pro_pic")
    VALUES (\''.$rating.'\', 0,0, \''.$comments.'\', \''.$club_id.'\', \''.$user_name.'\',\''. $pro_pic.'\')
    RETURNING "com_id";';
    $result5 = pg_query($conn, $query5);
    if ($result5) {
        $com_id = pg_fetch_result($result5, 0, 0);
        echo "$ck $com_id Your Review Added.\n";}
        else { echo"$cr Unable to add Review\n" [$query5] . pg_last_error($conn);}
        echo"</div>";
    }

    if (isset($_POST['Update_Likes'])) {
        echo" ";
        echo"<div id='ma'>";

        if (isset($_GET['c']))					{$com = $_GET['c'];}

        include('Supabase_connect.php');
        echo"  <input type='hidden' name='club_id' value='$club_id'>
        <input type='hidden' name='com_id' value='$com_id'> ";
    $query6 = 'UPDATE "club_comment" SET "Likes" = "Likes" + 1  WHERE "com_id" = \'' . $com . '\';';
    $result6 = pg_query($conn, $query6);
    if ($result6) {
        echo "$ck $com Like Added.\n";}
        else { echo"$cr Unable to add Like\n" [$query6] . pg_last_error($conn);}
        echo"</div>";
    }

    if (isset($_POST['Update_Dislikes'])) {
        echo" ";
        echo"<div id='ma'>";
        if (isset($_GET['c']))					{$com = $_GET['c'];}

        include('Supabase_connect.php');
        echo"  <input type='hidden' name='club_id' value='$club_id'>";
    $query6 = 'UPDATE "club_comment" SET "Dislikes" = "Dislikes" + 1  WHERE "com_id" = \'' . $com . '\';';
    $result6 = pg_query($conn, $query6);
    if ($result6) {
        echo "$ck $com Dislike Added.\n";}
        else { echo"$cr Unable to add Dislike\n" [$query6] . pg_last_error($conn);}      
        echo"</div>";
    }

    
    if (isset($_POST['join'])) {
        echo" ";
        echo"<div id='ma'>";

        include('Supabase_connect.php');
        // Update database with new user ID
        $query9 = 'UPDATE "club_page" SET "joined_users" = array_append(joined_users, \''.$user_name.'\'), "c_members" = "c_members"+ 1 WHERE "club_id" = \'' . $club_id . '\'';
        $result9 = pg_query($conn, $query9);
      //  $query9 = 'UPDATE "club_page" SET "joined_users" = \'' . implode(',', $joined_users) . '\' WHERE id = \'' . $club_id . '\'';

        // Check if query was successful
        if ($result9) {
          echo "$ck Joined successfully!";
        } else {
          echo "$cr Error joining club: " . pg_last_error($conn);
        }
        echo"</div>";
      }

      if (isset($_POST['joined'])) {
        echo" ";
        echo"<div id='ma'>";

        include('Supabase_connect.php');
        // Update database with new user ID
        $query9 = 'UPDATE "club_page" SET "joined_users" = array_remove(joined_users, \''.$user_name.'\'), "c_members" = "c_members"- 1 WHERE "club_id" = \'' . $club_id . '\'';
        $result9 = pg_query($conn, $query9);
      //  $query9 = 'UPDATE "club_page" SET "joined_users" = \'' . implode(',', $joined_users) . '\' WHERE id = \'' . $club_id . '\'';

        // Check if query was successful
        if ($result9) {
          echo "$ck UnJoined successfully!";
        } else {
          echo "$cr Error UnJoined club: " . pg_last_error($conn);
        }
        echo"</div>";
      }

}
echo"</section>";





$query = 'SELECT * FROM "club_page" WHERE "club_id" =\'' . $club_id . '\';';
    $result = pg_query($conn, $query);
    if (!$result) {echo "Query Error [$query] " . pg_last_error($conn);}


$query2 = 'SELECT * FROM "club_perk" WHERE "club_id" =\'' . $club_id . '\';';
    $result2 = pg_query($conn, $query2);
    if (!$result2) {echo "Query Error [$query2] " . pg_last_error($conn);}


$query3 = 'SELECT * FROM "club_slide" WHERE "club_id" =\'' . $club_id . '\';';
    $result3 = pg_query($conn, $query3);
    if (!$result3) {echo "Query Error [$query3] " . pg_last_error($conn);}



    $order = isset($_POST['options']) ? $_POST['options'] : 'none';

    //$query4 = "SELECT * FROM club_comment WHERE club_id = '$club_id' ORDER BY ";
    $query4 = 'SELECT * FROM "club_comment" WHERE "club_id" =\'' . $club_id . '\' ORDER BY ';
    
    switch ($order) {
        case 'most_liked':
            $query4 .= '"Likes" DESC';
            break;
        case 'most_disliked':
            $query4 .= '"Dislikes" DESC';
            break;
        case 'oldest':
            $query4 .= '"date" ASC';
            break;
        case 'latest':
            $query4 .= '"date" DESC';
            break;
        default:
            $query4 .= '"com_id" ASC';
            break;
    }

    $result4 = pg_query($conn, $query4);
    if (!$result4) {echo "Query Error [$query4] " . pg_last_error($conn);}




echo"<section>";
//foreach($_POST as $keyx => $value) echo "$keyx = $value<br>";

    while ($row = pg_fetch_assoc($result)) {
        $club_id = $row['club_id'];
        $c_name = $row['c_name'];
        $c_tag = $row['c_tag'];
        $c_desc = $row['c_desc'];
        $c_pic = $row['c_pic'];
        $c_members = $row['c_members'];
        $Date = $row['made_date'];
        $made_by = $row['made_by'];
        $t_color1 = $row['t_color1'];
        $t_color2 = $row['t_color2'];
        $t_text = $row['t_text'];
        $joined_users = $row['joined_users'];
        $des_color = $row['des_color'];
        $des_text = $row['$des_text'];
        $imageUrl = 'https://drive.google.com/uc?export=view&id=';

$membersStrin = $joined_users;
$membersStrin = trim($membersStrin, "{}");// Remove the curly braces {}
$membersArra = explode(",", $membersStrin);
     // Explode the string into an array using comma as the separator
        $userJoined = in_array($user_name, $membersArra);
        if ($userJoined) {
            $xx="name='joined' value='Joined' >Joined";
        } else {
            $xx="name='join' value='Join Now ' >Join Now";
            
            }
        echo"

    <div class='top'  style='background-image:radial-gradient($t_color1 40%, $t_color2);'>
                <div class='imageHeader'>
                    <img style='width:100%; height: 100px; object-fit: cover;' src='$imageUrl$c_pic'  alt=\"Avatar\" alt=''>
                </div>
            <div class='nametag'>
            <h1 style='color:$t_text;' >$c_name</h1>
            <p style='color:$t_text;' > $c_tag</p>
            </div>
            <div class='buttonSection'>
                <div >
                <form method='post' action='auto_club_page.php'>
                <input type='hidden' name='club_id' value='$club_id'>
                <button class='contactButton'><i style='color:white;' class='fa fa-envelope'></i> Contact Us</button>   
                <button class='joinButton' type='submit' $xx</button></form> </div>
            </div>      
        </div>


        <div class='clubInfo' style='background-color:$des_color;' >
            <p style='color: $des_text;' >$c_desc</p>
        </div> <div class='listOfBenefitsGrid'>";

  //while(list($perk_id, $p_name, $p_desc,$p_pic, $club_id, $color) = mysqli_fetch_row($result2)) {

    while ($row = pg_fetch_assoc($result2)) {
        $perk_id = $row['perk_id'];
        $p_name = $row['p_name'];
        $p_desc = $row['p_desc'];
        $p_pic = $row['p_pic'];
        $club_id = $row['club_id'];
        $color = $row['color'];
        $imageUrl = 'https://drive.google.com/uc?export=view&id=';
    echo"
        
            <div class='listOfBenefits'>
                <div class='benefitsIcon'>
                    <img src='$imageUrl$p_pic' alt='$p_pic'>
                </div>
                <div class='listOfBenefitsDesciption'>
                    <h3>$p_name</h3>
                    <p>$p_desc</p>
                </div>
            </div>  ";}

            echo"</div> </section>   <section>

            <div class='staffMembers'>";

            foreach ($membersArra as $member) {
                //echo "$$member";
                $member = trim($member); // Remove any extra spaces

                $query20 = 'SELECT * FROM "User" WHERE "User_Name" =\'' . $member . '\';';
                $result20 = pg_query($conn, $query20);
                if (!$result20) {echo "Query Error [$query20] " . pg_last_error($conn);}

                if (pg_num_rows($result20) > 0) {
                   $row = pg_fetch_assoc($result20);
                    $User_id = $row['User_id'];
                    $F_Name = $row['F_Name'];
                    $L_Name = $row['L_Name'];
                    $Role = $row['Role'];
                    $Year = $row['Year'];
                    $Major = $row['Major'];
                    $pro_pic = $row['pro_pic'];
                    $imageUrl = 'https://drive.google.com/uc?export=view&id=';
                echo "
                <div class='member'>
                    <div class='colorBar'></div>
                        <img class='memberIcons' src='$imageUrl$pro_pic' alt='ghfhgf'>
                            <h3>$F_Name $L_Name</h3>
                            <p>$Year</p>
                        </div>";
                }
            }

            
          

            echo"</div> </section> <section> ";

/*        echo " <div class='studentMembers'>";

            foreach ($membersArra as $member) {
                //echo "$$member";
                $member = trim($member); // Remove any extra spaces

                $query22 = 'SELECT * FROM "User" WHERE "User_Name" =\'' . $member . '\';';
                $result22 = pg_query($conn, $query22);
                if (!$result20) {echo "Query Error [$query22] " . pg_last_error($conn);}


                if (pg_num_rows($result22) > 0) {
                   $row = pg_fetch_assoc($result22);
                $User_id = $row['User_id'];
                $F_Name = $row['F_Name'];
                $L_Name = $row['L_Name'];
                $Role = $row['Role'];
                $Year = $row['Year'];
                $Major = $row['Major'];
                $pro_pic = $row['pro_pic'];
                $imageUrl = 'https://drive.google.com/uc?export=view&id=';
            echo "
            <div class='student'>
                <div class='stColorBar'></div>
                    <img src='$imageUrl$pro_pic' alt='gfgf'>
                <div class='stName'>
                    <p>$F_Name $L_Name</p>
                </div>";

            }}

                 echo"</div> </section> <section> */  


                 echo" <div class='slideshow-container'>";

    //     while(list($slide_id, $S_title, $S_des, $S_pic, $club_id) = mysqli_fetch_row($result3)) {
            while ($row = pg_fetch_assoc($result3)) {
                $slide_id = $row['slide_id'];
                $S_title = $row['S_title'];
                $S_des = $row['S_des'];
                $S_pic = $row['S_pic'];
                $club_id = $row['club_id'];
                $imageUrl = 'https://drive.google.com/uc?export=view&id=';
                echo"
                
                <div class='mySlides fade'>
			<div class='numbertext'>$slide_id</div>
			<img src='$imageUrl$S_pic' style='width:100%'>
			<div class='text'>$S_title<br>$S_des</div>
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

</section> ";
        
        
        }
        $imageUrl = 'https://drive.google.com/uc?export=view&id=';
echo " <section> 

        <div class='overallReview'>
            <h1>Reviews & Ratings</h1>
            <div class='overallNumber'>
                <p class='number'>4.1</p>
                <p class='outOf5'>Out of 5</p>
            </div>
            <div class='ratingList'>
                <p class='starList'>
                    <i class='fa-solid fa-star'></i>
                    <i class='fa fa-star'></i>
                    <i class='fa fa-star'></i>
                    <i class='fa fa-star'></i>
                    <i class='fa fa-star'></i>
                    ________________________
                </p>
                <p class='starList'>
                    <i class='fa fa-star'></i>
                    <i class='fa fa-star'></i>
                    <i class='fa fa-star'></i>
                    <i class='fa fa-star'></i>
                    ________________________
                </p>
                <p class='starList'>
                    <i class='fa fa-star'></i>
                    <i class='fa fa-star'></i>
                    <i class='fa fa-star'></i>
                    ________________________
                </p>
                <p class='starList'>
                    <i class='fa fa-star'></i>
                    <i class='fa fa-star'></i>
                    ________________________
                </p>
                <p class='starList'>
                    <i class='fa fa-star'></i>
                    ________________________
                </p>
                <p class='averageRating'>
                    4.13 Rating
                </p>
            </div>
        </div>

        <div class='sortComments'>
        <form method='POST' action='auto_club_page.php'>
        <input type='hidden' name='club_id' value='$club_id'>
            <label for='options'>Sort By:</label>
            <select name='options' id='options' onchange='this.form.submit()'>
                <option value='' disabled selected hidden>Select an Option</option>
                <option value='most_liked'>Most Liked</option>
                <option value='most_disliked'>Most Disliked</option>
                <option value='oldest'>Oldest</option>
                <option value='latest'>Latest</option>
            </select>
        </form>
        </div>

        <div class='reviewGrid'>
             <form method='post' action='auto_club_page.php'>
            <input type='hidden' name='club_id' value='$club_id'>
            <div class='reviews'>
            <div class='reviewAvatar'>
                <img class='reviewIcon' src='$imageUrl$pro_pic' alt='./ClubHomePage/ClubHomePagePictures/person-icon.png'>
                <h3>$user_name </h3>
                <div class='Rating'>
                <label>Rating:</label>
                <select name='rating'>
                    <option value='1'>1 star</option>
                    <option value='2'>2 stars</option>
                    <option value='3'>3 stars</option>
                    <option value='4'>4 stars</option>
                    <option value='5'>5 stars</option>
                </select><br><br>
                </div>
            </div>
                <div class='reviewDescription'>
                        <textarea name='comments' value='$comments' size='500' cols='55' rows='5' placeholder='Review Content' ></textarea><br><p></p><br>
                        <input class='reviewButton' type='submit' name='Submit_Review' value='Submit_Review'>
                        </form>
                </div>
            </div> 
            </div>  ";

            while ($row = pg_fetch_assoc($result4)) {
                $com_id = $row['com_id'];
                $parent_id = $row['parent_id'];
                $Likes = $row['Likes'];
                $Dislikes = $row['Dislikes'];
               // $club_id = $row['club_id'];
                $event_id = $row['event_id'];
                $comments = $row['comments'];
                $rating = $row['rating'];
                $date = $row['date'];
                $com_name = $row['com_name'];
                $pro_pic = $row['pro_pic'];
                $DaTi = date("Y-m-d H:i:s", strtotime($date));
                $imageUrl = 'https://drive.google.com/uc?export=view&id=';
                echo"
                <div class='reviews'> 
                <form method='post' action='auto_club_page.php?c=$com_id'>
                        <input type='hidden' name='club_id' value='$club_id'>
                        <input type='hidden' name='com_id' value='$com_id'>
                        <div class='reviewAvatar'>
                       
                            <img class='reviewIcon' src='$imageUrl$pro_pic' alt='./ClubHomePage/ClubHomePagePictures/person-icon.png'>
                            <h3>$com_name </h3>
                            <div> ";
                            for ($i = 1; $i <= 5; $i++) {
                                if ($i <= $rating) {
                                    echo '<i class="fas fa-star"></i>'; // full star
                                } else {
                                  echo '<i class="far fa-star"></i>'; // empty star
                                }
                            }

 echo"
                            </div>
                            <p>$DaTi</p>
                              
                        </div>
                        <div class='reviewDescription'>
                                <p>$comments</p>
                        </div>
                        <div class='reviewfunction'>        
                        <input class='fa fa-solid fa-thumbs-up' type='submit' name='Update_Likes' value='&#xf164;' style='color: green;'> <p>$Likes</p>
                        <input class='fa fa-solid fa-thumbs-down' type='submit' name='Update_Dislikes' value='&#xf165;' style='color: red;'> <p>$Dislikes</p>
                        <input class='' type='submit' name='showReply' value='Reply' style=''>
                        </div></form></div> ";
                    //<button class='likeIcon' class='fa-regular fa-thumbs-up' id='likeButton'  onclick='likeComment($com_id)'>Like ($Likes)</button>
                    // <button class='likeIcon' class='fa-regular fa-thumbs-down' id='dislikeButton' onclick='dislikeComment($com_id)'>Dislike ($Dislikes)</button>
                    //<button class='reply-btn'  onclick='showReplyForm($com_id)'>Reply</button>
            }

           echo"
           <script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>
        <script src='commment.js'></script>
           </section>";

/*
    if ($result15 && pg_num_rows($result15) > 0) {
        $row5 = pg_fetch_assoc($result15);
        $membersArray2 = $row5['joined_users'];
        $membersArray = explode(',', $membersArray2);

        echo "<h3>Members:$membersArray2 dd $membersArray</h3>";
        echo "<ul>";
        foreach ($membersArray as $member) {
            echo "<li>$member</li>";
        }
        echo "</ul>";
    } else {
        echo "No members found.";
    }
*/


        include('footer.php');
?>

<script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>
<script src='commment.js'></script>
<script>


function showReplyForm(com_id) {
    // Get the reply form element based on the comment ID
    //var replyForm = $('#reply-form-' + com_id);
    var replyForm = $('#reply-section-' + com_id);
    replyForm.toggle();

}
	</script>

<script>
function likePost(com_id) {
  // update button state
  document.getElementById("likeButton").innerHTML = "Liked";
  document.getElementById("dislikeButton").disabled = true;
  // submit data to server via AJAX
  var xhr = new XMLHttpRequest();
  xhr.open('POST', 'like_post.php', true);
  xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  xhr.onload = function () {
      // handle response from server
      console.log(this.responseText);
  };
  xhr.send('com_id=' + com_id + '&action=like');
}

function dislikePost(com_id) {
  // update button state
  document.getElementById("dislikeButton").innerHTML = "Disliked";
  document.getElementById("likeButton").disabled = true;
  // submit data to server via AJAX
  var xhr = new XMLHttpRequest();
  xhr.open('POST', 'like_post.php', true);
  xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  xhr.onload = function () {
      // handle response from server
      console.log(this.responseText);
  };
  xhr.send('com_id=' + com_id + '&action=dislike');
}
</script>