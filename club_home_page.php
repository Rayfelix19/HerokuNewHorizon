
<?php

	echo"<p style=' width:100%; padding: 30px;'></p>";

    include('session.php');
	include('menubar.php');

?>


<!DOCTYPE html>
	<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<link rel="stylesheet" href="club_home_css.css">
		<link rel="stylesheet" href="footer.css">
    </head>

    <body>
<section>
    <div class="top">
            <div class="imageHeader">
                <img style="width:100%; height: 100px; object-fit: cover;" src="./ClubHomePage/ClubHomePagePictures/artclubLogo.png" alt="">
            </div>
            <div class="nametag">
            <h1>Art & Design Club</h1>
            <p> Imagine &#x2022; Draw &#x2022; Paint &#x2022; Create!</p>
            </div>
            <div class="buttonSection">
                <div >
                <button class="contactButton"><i style="color:white;" class="fa fa-envelope"></i> Contact Us</button>   
                <button class="joinButton">Join Now</button></div>
            </div>      
        </div>


        <div class="clubInfo">
            <p>There are many ways to get involved as a <strong>Visual Communications Student</strong> here at Farmingdale State College.
                 The Design Club welcomes any Farmingdale Student interested in making, looking or talking about art and graphic design. 
                 Club activities include AIGA events, critiques, studio and museum visits, software tutorials, and artistic collaborations with other areas of the campus. 
                 Members have engaged in design for other campus clubs and associations, design of the Farmingdale yearbook,
                  holiday card designs and printing and other special Design Club projects. 
                 The Design Club meets during club hour every Tuesday.</p>
        </div>




        <div class="listOfBenefitsGrid">
            <div class="listOfBenefits">
                <div class="benefitsIcon">
                    <img src="./ClubHomePage/ClubHomePagePictures/network-icon.jpg" alt="">
                </div>
                <div class="listOfBenefitsDesciption">
                    <h3>Networking With Others</h3>
                    <p>Connect with students, and professionals Industry.
                </div>
            </div>

            <div class="listOfBenefits">
                <div class="benefitsIcon">
                    <img style="background-color: white;"src="./ClubHomePage/ClubHomePagePictures/food-icon.png" alt="">
                </div>
                <div class="listOfBenefitsDesciption">
                    <h3>Free Food</h3>
                    <p>Enjoy free food that's offered at the weekly club meetings</p>
                </div>
            </div>

            <div class="listOfBenefits">
                <div class="benefitsIcon">
                    <img style="background-color: white;"src="./ClubHomePage/ClubHomePagePictures/skills.png" alt="">
                </div>
                <div class="listOfBenefitsDesciption">
                    <h3>Gain Valuable Skills</h3>
                    <p>Attend workshops to gain get more hands on experience</p>
                </div>
            </div>

            <div class="listOfBenefits">
                <div class="benefitsIcon">
                    <img src="./ClubHomePage/ClubHomePagePictures/mentorship.jpg" alt="">
                </div>
                <div class="listOfBenefitsDesciption">
                    <h3>Mentorship</h3>
                    <p>Learn from professors and workers in the industry.</p>
                </div>
            </div>

            <div class="listOfBenefits">
                <div class="benefitsIcon">
                    <img style="background-color: white"src="./ClubHomePage/ClubHomePagePictures/lightbulb-icon.png" alt="">
                </div>
                <div class="listOfBenefitsDesciption">
                    <h3>Learn About Yourself</h3>
                    <p>Discover interests that you may not have recoginzed.</p>
                </div>
            </div>

            <div class="listOfBenefits">
                <div class="benefitsIcon">
                    <img style="background-color: white"src="./ClubHomePage/ClubHomePagePictures/lightbulb-icon.png" alt="">
                </div>
                <div class="listOfBenefitsDesciption">
                    <h3>Learn About Yourself</h3>
                    <p>Discover interests that you may not have recoginzed.</p>
                </div>
            </div>
            
        </div>

                     

        
        <div class="staffMembers">

            <div class="member">
                <div class="colorBar"></div>
                    <img class="memberIcons" src="./ClubHomePage/ClubHomePagePictures/jeff-bezos.jpg" alt="">
                <h3>Josh Smith</h3>
                <p>President</p>
            </div>
            <div class="member">
                <div class="colorBar"></div>
                <img class="memberIcons" src="./ClubHomePage/ClubHomePagePictures/Bill_Gates.jpg" alt="">
                <h3>James Jones</h3>
                <p>Vice President</p>
            </div>
            <div class="member">
                <div class="colorBar"></div>
                <img class="memberIcons" src="./ClubHomePage/ClubHomePagePictures/kim-jong-un.jpeg" alt="">
                <h3>Brian Collins</h3>
                <p>Secretary</p>
            </div>
            <div class="member">
                <div class="colorBar"></div>
                <img class="memberIcons" src="./ClubHomePage/ClubHomePagePictures/trump.jpg" alt="">
                <h3>Alexa Walker</h3>
                <p>Treasurer</p>
            </div>
            <div class="member">
                <div class="colorBar"></div>
                <img class="memberIcons" src="./ClubHomePage/ClubHomePagePictures/pope.jpg" alt="">
                <h3>Alice Johnson</h3>
                <p>Faculty/Staff Advisor</p>
            </div>
        </div> 

         
        <div class="studentMembers">

            <div class="student">
                <div class="stColorBar"></div>
                    <img src="./ClubHomePage/ClubHomePagePictures/jeff-bezos.jpg" alt="">
                <div class="stName">
                    <p>Josh Smith</p>
                </div>
                    
            </div>
            <div class="student">
                <div class="stColorBar"></div>
                <img src="./ClubHomePage/ClubHomePagePictures/Bill_Gates.jpg" alt="">
                <div class="stName">
                    <p>James Jones</p>
                </div>
            </div>
            <div class="student">
                <div class="stColorBar"></div>
                <img src="./ClubHomePage/ClubHomePagePictures/kim-jong-un.jpeg" alt="">
                <div class="stName">
                    <p>Brian Collins</p>
                </div>
            </div>
            <div class="student">
                <div class="stColorBar"></div>
                <img src="./ClubHomePage/ClubHomePagePictures/trump.jpg" alt="">
                <div class="stName">
                    <p>Alexa Walker</p>
                </div>
            </div>
            <div class="student">
                <div class="stColorBar"></div>
                <img src="./ClubHomePage/ClubHomePagePictures/pope.jpg" alt="">
                <div class="stName">
                    <p>Alice Johnson dsdfsfs</p>
                </div>
            </div>
        </div> 

        


        <div class="clubImages">  
            
                <img src="./ClubHomePage/ClubHomePagePictures/artClub.jpg" alt="">
        </div>


        <div class="overallReview">
            <h1>Reviews & Ratings</h1>
            <div class="overallNumber">
                <p class="number">4.1</p>
                <p class="outOf5">Out of 5</p>
            </div>
            <div class="ratingList">
                <p class="starList">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    ________________________
                </p>
                <p class="starList">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    ________________________
                </p>
                <p class="starList">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    ________________________
                </p>
                <p class="starList">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    ________________________
                </p>
                <p class="starList">
                    <i class="fa fa-star"></i>
                    ________________________
                </p>
                <p class="averageRating">
                    4.13 Rating
                </p>
            </div>
        </div>

        <div class="sortComments">
            <label for="order">Sort By: </label>
            <select name="options" id="options">
                <option value="none" selected disabled hidden>Select an Option</option>
                <option value="$">Most Liked</option>
                <option value="$">Most Disliked</option>
                <option value="$">Oldest</option>
                <option value="$">Latest</option>
            </select>
        </div>

        <div class="reviewGrid">
        <div class="reviews">
                <div class="reviewAvatar">
                    <img class="reviewIcon" src="./ClubHomePage/ClubHomePagePictures/person-icon.png" alt="">
                    <h3>Alex Jones </h3>
                    <div>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span> 
                    </div>
                    <p>Feb 27, 2023</p>
                      
                </div>
                <div class="reviewDescription">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium, ipsa.</p>
                </div>
                <div class="reviewfunction">        
                        <span class="likeIcon"> <i class="fa-regular fa-thumbs-up"></i></span>
                        <span class="likeIcon"> <i class="fa-regular fa-thumbs-down"></i></span>
                        <button class="replyButton">Reply</button>
                </div>                
            </div> 

            <div class="reviews">
                <div class="reviewAvatar">
                    <img class="reviewIcon" src="./ClubHomePage/ClubHomePagePictures/person-icon.png" alt="">
                    <h3>Alex Jones </h3>
                    <div>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span> 
                    </div>
                    <p>Feb 27, 2023</p>
                      
                </div>
                <div class="reviewDescription">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium, ipsa.</p>
                </div>
                <div class="reviewfunction">        
                        <span class="likeIcon"> <i class="fa-regular fa-thumbs-up"></i></span>
                        <span class="likeIcon"> <i class="fa-regular fa-thumbs-down"></i></span>
                        <button class="replyButton">Reply</button>
                </div>                
            </div>     

            <div class="reviews">
                <div class="reviewAvatar">
                    <img class="reviewIcon" src="./ClubHomePage/ClubHomePagePictures/person-icon.png" alt="">
                    <h3>Alex Jones </h3>
                    <div>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span> 
                    </div>
                    <p>Feb 27, 2023</p>
                      
                </div>
                <div class="reviewDescription">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium, ipsa.</p>
                </div>
                <div class="reviewfunction">        
                        <span class="likeIcon"> <i class="fa-regular fa-thumbs-up"></i></span>
                        <span class="likeIcon"> <i class="fa-regular fa-thumbs-down"></i></span>
                        <button class="replyButton">Reply</button>
                </div>                
            </div> 

            <div class="reviews">
                <div class="reviewAvatar">
                    <img class="reviewIcon" src="./ClubHomePage/ClubHomePagePictures/person-icon.png" alt="">
                    <h3>Alex Jones </h3>
                    <div>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span> 
                    </div>
                    <p>Feb 27, 2023</p>
                      
                </div>
                <div class="reviewDescription">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium, ipsa.</p>
                </div>
                <div class="reviewfunction">        
                        <span class="likeIcon"> <i class="fa-regular fa-thumbs-up"></i></span>
                        <span class="likeIcon"> <i class="fa-regular fa-thumbs-down"></i></span>
                        <button class="replyButton">Reply</button>
                </div>                
            </div> 

            <div class="reviews">
                <div class="reviewAvatar">
                    <img class="reviewIcon" src="./ClubHomePage/ClubHomePagePictures/person-icon.png" alt="">
                    <h3>Alex Jones </h3>
                    <div>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span> 
                    </div>
                    <p>Feb 27, 2023</p>
                      
                </div>
                <div class="reviewDescription">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium, ipsa.</p>
                </div>
                <div class="reviewfunction">        
                        <span class="likeIcon"> <i class="fa-regular fa-thumbs-up"></i></span>
                        <span class="likeIcon"> <i class="fa-regular fa-thumbs-down"></i></span>
                        <button class="replyButton">Reply</button>
                </div>                
            </div> 
            
            <div class="reviews">
                <div class="reviewAvatar">
                    <img class="reviewIcon" src="./ClubHomePage/ClubHomePagePictures/person-icon.png" alt="">
                </div>
                <div class="reviewDescription">
                    <h3 style="background-color: #f5f5f5">Alex Jones 
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span> <span class="reviewDate">Feb 27, 2023</span></h3>
                        <p class="userComment">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium, ipsa.</p>
                        <span class="likeIcon"> <i class="fa fa-thumbs-up"></i></span>
                        <span class="likeIcon"> <i class="fa fa-thumbs-down"></i></span>
                        <button class="replyButton">Reply</button>
                </div>  
        </div>

        <div class="showMoreSection">
            <button class="showMoreButton">Show More</button>
        </div>


</section>

    </body>



<?php


include('footer.php');

?>
