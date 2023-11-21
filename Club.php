


<?php

	echo"<p style=' width:100%; padding: 30px;'></p>";

    include('session.php');
	include('menubar.php');
    include('Supabase_connect.php');

    $ck="<i class='fa fa-duotone fa-check' style='font-size:25px;color:green;'></i>";
    $cr="<i class='fa fa-duotone fa-xmark' style='font-size:25px;color:red;'></i>";

?>


<!DOCTYPE html>
	<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<link rel="stylesheet" href="cclub_Page.css">
		<link rel="stylesheet" href="footer.css">
    </head>
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

    <body>
    <div class="add_club">
    <a href='create_club.php?r=add_club'><button>Add Club</button></a>
    </div>
        <div class="sele">
             <h3>List of Clubs</h3>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo"<div id='ma'>";
    if (isset($_GET['r']))					{$club_id = $_GET['r'];}
    if (isset($_POST['delete'])) {
        include('Supabase_connect.php');
        echo"<input type='hidden' name='club_id' value='$club_id'> ";

        $query2 = 'UPDATE "club_page" SET "status" = 3
        WHERE "club_page"."club_id"= \'' . $club_id . '\'';
           $result2 = pg_query($conn, $query2);

           if ($result2) {
             echo "$ck Deleted successfully!";
           } else {
             echo "$cr Error Deleted club: " . pg_last_error($conn);
           }
    } echo"</div>";
}


/*
$cat	= array('club_id', 'made_date', 'c_members');
$sort	= array('Ascending', 'Descending');
if (isset($_POST['orderby'])) 	$orderby = $_POST['orderby'];	else $orderby = 'club_id';
if (isset($_POST['ad'])) 		$ad 	 = $_POST['ad'];		else $ad 	  = NULL;
if ($ad == 'Descending')		$desc	 = 'DESC';				else $desc	  = NULL;
foreach($_POST as $keyx => $value) echo "$keyx = $value<br>"; 



echo "<form action='Club.php' method='POST' align='center' > 
<p width='500px' > Sort By: <select name='orderby' onchange='this.form.submit();'>";
foreach($cat as $category) {
if ($orderby == $category) $se = 'SELECTED'; else $se = NULL;
echo "<option $se>$category</option>\n";
}
echo "</select> <select name='ad' onchange='this.form.submit();'>";
foreach($sort as $value) {
if ($ad == $value) $se = 'SELECTED'; else $se = NULL;
echo "<option $se>$value</option>\n";
}
echo "</select></p></form>"; 
$query0 = 'SELECT * FROM "club_page" where "status"= 1 ORDER BY '.$orderby.' '.$desc.'';
*/

//$query = 'SELECT * FROM "club_page" where "status"= 1 ORDER BY '.$orderby.' '.$desc.'';
//$result = pg_query($conn, $query);
//if (!$result) { echo "Query Error [$query] " . pg_last_error($conn);}

$order = isset($_POST['options']) ? $_POST['options'] : 'none';

$query0 = 'SELECT * FROM "club_page" where "status"= \'' . 1 . '\' ORDER BY ';

switch ($order) {
    case 'Highest_Member':
        $query0 .= '"c_members" DESC';
        break;
    case 'Lowest_Member':
        $query0 .= '"c_members" ASC';
        break;
    case 'oldest':
        $query0 .= '"made_date" ASC';
        break;
    case 'latest':
        $query0 .= '"made_date" DESC';
        break;
    default:
        $query0 .= '"club_id" ASC';
        break;
}

$result0 = pg_query($conn, $query0);
if (!$result0) { echo "Query Error [$query0] " . pg_last_error($conn);}
// club_id | c_name  | c_tag  | c_desc  | c_pic | c_members | made_by | made_date | t_color1 | t_color2 | t_text  |des_color | des_text status
/*
echo "<div class='club_Grid'>";
while ($row = pg_fetch_assoc($result)) {
    $club_id = $row['club_id'];
    $c_name = $row['c_name'];
    $c_tag = $row['c_tag'];
    $c_desc = $row['c_desc'];
    $c_pic = $row['c_pic'];
    $c_members = $row['c_members'];
    $Date = $row['made_date'];
    $imageUrl = 'https://drive.google.com/uc?export=view&id=';

echo"<form method='post' action='Club.php?r=$club_id'>
        <div class='club_Container'>   
           
        <div class='icon'>
            <a href='#' ><img class='more_icon' onclick='showMore($club_id)' src='./icon/more_menu_icon.png' alt='avatar'>  </a>
        </div>
        <div class='icon_option' id='icon_option_$club_id'>
            <a href='edit_club.php?r=$club_id&task=test'>Edit</a>
            <input type='submit' name='delete' value='delete' >
        </div>
        <div class='image_Container'>
            <img class='club_Icon' src='$imageUrl$c_pic' alt='avatar'>
        </div>
            <div class='information'>
                <h1 ><a style='text-decoration:none; color:white;' href='./auto_club_page.php?r=$club_id'>$c_name</a></h1>
                <p >$c_tag</p>
            </div>
        <div class='member_Counter'>
            <h1 class='counter_Text'><i class='fas fa-user-friends'></i> Members: $c_members</h1>
        </div>
    </div></form>";

}

echo "</div><br>";
*/
echo "
<form method='POST' action='Club.php' align='center'>
    <p width='500px' ><label for='options'>Sort By:</label>
    <select name='options' id='options' onchange='this.form.submit()'>
        <option value='' disabled selected hidden>Select an Option</option>
        <option value='Highest_Member'>Highest Member</option>
        <option value='Lowest_Member'>Lowest Member</option>
        <option value='oldest'>Oldest</option>
        <option value='latest'>Latest</option>
    </select></p>
</form>";



echo "<div class='events-Gridrr'>";
while ($row = pg_fetch_assoc($result0)) {
    $club_id = $row['club_id'];
    $c_name = $row['c_name'];
    $c_tag = $row['c_tag'];
    $c_desc = $row['c_desc'];
    $c_pic = $row['c_pic'];
    $c_members = $row['c_members'];
    $Date = $row['made_date'];
    $imageUrl = 'https://drive.google.com/uc?export=view&id=';

echo"<form method='post' action='Club.php?r=$club_id'>
            
        <div class='EventContainerrr'> 
        <div class='icon'>
            <a href='#' >
                <img class='more_icon' onclick='showMore($club_id)' 
                src='./icon/more_menu_icon.png' alt='avatar'>  </a>
        </div>
        <div class='icon_option' id='icon_option_$club_id'>
            <a href='edit_club.php?r=$club_id&task=test'>Edit</a>
            <input type='submit' name='delete' value='delete' >
        </div>
        <div class='coverrr'> <img src='$imageUrl$c_pic' alt='pic'>
        </div>
        <div class='eventDescriptionrr'>
            <div> <h1 class='Titlerr'><a  href='./auto_club_page.php?r=$club_id'>$c_name</a></h1></div>
            <div> <p class='descriptrrr'>$c_desc</p></div>  
            <div class='member_Counter'>  <h2 class='counter_Text'> Members: $c_members </h2>  </div>             
        </div>

        </div></form>";

}

echo "</div><br>";

?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="touggle.js"></script>

    </body>

<?php


include('footer.php');

?>

