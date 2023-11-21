
<?php
	echo"<p style=' width:100%; padding: 30px;'></p>";
    include('session.php');
	include('menubar.php');
?>
<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="About.css">
    <link rel="stylesheet" href="footer.css">
</head>
<body>
    <div class="top-section">
        <div class="top-section-description">
            <h1>Welcome To Farmingdale State College Where Success Begins.</h1>
            <p style="text-align: center; width: 400px;"><a href="Club.php"><button class="clubClick">Join Club</button></a>
            <a href="Event.php"><button class="eventClick">Event Club</button></a></p>
        </div>
        <div class="top-section-image">
            <div class="img-containter">
                <img src="./AboutPageRedesignImages/fsc_image.jpg" alt="">
            </div>
        </div>
    </div>

    <div class="keyInfo">
        <div class="detailedInfo">
            <h1 style="margin-top: 10px;">70 +</h1>
            <p>Clubs to join on campus</p>
        </div>
        <div class="detailedInfo">
            <h1 style="margin-top: 10px;">200 +</h1>
            <p>Events on campus per semester</p>
        </div>
        <div class="detailedInfo">
            <h1 style="margin-top: 10px;">9000 +</h1>
            <p>Students to join a community </p>
        </div>
        <div class="detailedInfo">
            <h1 style="margin-top: 10px;">50 +</h1>
            <p>Free giveaways per semester </p>
        </div>
    </div>

    <div class="bottom-section-description">
        <h1 style="text-align: center;">History of Clubs For Growth and Development</h1>
    </div>

    <div class="events-Gridrr">
        <div class="EventContainerrr">
            <div class="coverrr">
                <img src="../ClubHomePage/ClubHomePagePictures/artClub.jpg" alt="">
            </div>
            <div class="eventDescriptionrr">
                <div class="textrr">
                    <h1 class="Titlerr"><a style="text-decoration:none; color: black;" href="auto_club_page.php?r=55">Volleyball Club</a></h1>
                    <p class="descriptrrr">
                         The Volleyball Club was founded in 1987 and it was when John Smith had went to the
                         Dean of Farmingdale to propose a club for sports. After a long debate, 
                         the club has been established. The club has originally started with 7 people but
                         now has has about 60 members.</p>
                </div>               
            </div>
        </div>

        <div class="EventContainerrr">
            <div class="coverrr">
                <img src="./AboutPageRedesignImages/Esports_Logo.jpeg" alt="">
            </div>
            <div class="eventDescriptionrr">
                <div class="textrr" ">
                    <h1 class="Titlerr"><a style="text-decoration:none; color: black;" href="auto_club_page.php?r=48">Esports Club</a></h1>
                    <p class="descriptrrr">
                         Farmingdale Esports 2004 and it was when a group of gaming enthusiasts called the "Gamers" proposed a gaming club. 
                         Their intention was to reduce stress from students who had a lot of studies to do by issuing gaming tournaments.
                         </p>
                </div>               
            </div>
        </div>

        <div class="EventContainerrr">
            <div class="coverrr">
                <img src="./AboutPageRedesignImages/Art_Logo.jpeg" alt="">
            </div>
            <div class="eventDescriptionrr">
                <div class="textrr" ">
                    <h1 class="Titlerr"><a style="text-decoration:none; color: black;" href="auto_club_page.php?r=56">Art Club</a></h1>
                    <p class="descriptrrr">
                         The Art Club was founded in 1980 and it was when Jane Doe and a few of her friends
                         wanted to propose a club to show creativity and their skills to the entire school. After consideration by the Art Department, 
                         the club was ratified and became a popular club up to this day.</p>
                </div>               
            </div>
        </div>

        <div class="EventContainerrr">
            <div class="coverrr">
                <img src="./AboutPageRedesignImages/IEEE_Club_Logo.png" alt="">
            </div>
            <div class="eventDescriptionrr">
                <div class="textrr" ">
                    <h1 class="Titlerr"><a style="text-decoration:none; color: black;" href="auto_club_page.php?r=49">IEEE Club</a></h1>
                    <p class="descriptrrr">
                         This club was founded in 2008 and it was when James Johnson thought it would've been a great idea to 
                         have engineering students come together and work on valuable projects. After a proposal to the Sciences department,
                         the club was approved.</p>
                </div>               
            </div>
            
        </div>

        <div class="EventContainerrr">
            <div class="coverrr">
                <img src="./AboutPageRedesignImages/ACMClug_Logo.png" alt="">
            </div>
            <div class="eventDescriptionrr">
                <div class="textrr" ">
                    <h1 class="Titlerr"><a style="text-decoration:none; color: black;" href="auto_club_page.php?r=51">ACM Club</a></h1>
                    <p class="descriptrrr">
                         ACM Club was founded in 2010 and it was when Mike Adams found an issue of Computer Science students
                         not being involved as much in activities relating to their studies. This was an ongoing issue that even the school knew had to be resolved.</p>
                </div>               
            </div>
            
        </div>

        <div class="EventContainerrr">
            <div class="coverrr">
                <img src="./AboutPageRedesignImages/EnvironmentalClub_Logo.jpeg" alt="">
            </div>
            <div class="eventDescriptionrr">
                <div class="textrr" ">
                    <h1 class="Titlerr"><a style="text-decoration:none; color: black;" href="auto_club_page.php?r=46">Environmental Club</a></h1>
                    <p class="descriptrrr">
                         A group of students in 2003 proposed an idea to help the environment surronding them as the realization of Global Warming and Climate Change
                        has started to become recognized. This issue had to be mitigated since Farmingdale struggling keeping the campus clean.</p>
                </div>               
            </div>
            
        </div>

    </div>

</body>
</html>


<?php


include('footer.php');

?>