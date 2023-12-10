<?php
session_start();
include_once("config.php"); 

// Check if the user is logged in
if (!isset($_SESSION['UserID'])) {
    // If not logged in, redirect to the login page
    header("Location: page1.php");
    exit();
}

// Display a welcome message
// echo "Welcome, " . $_SESSION['username'] . "! You have successfully logged in to page 2.";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name=" viewport" content="width=devoce-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="homepageStyle.css"/>
</head>
<body>
    <div class="hero">
        <nav>
            <h2 class="logo">Sportify</h2>
        <nav class="navigation">
            <a href="tracking.php">Tracking</a>
            <a href="program.php">Programs</a>
            <a href="equipment.php">Equipment</a>
            <a href="profile.php">Profile</a>
        </nav>
            <img src="profile.png" class="user-pic" onclick="toggleMenu()">

            <div class="sub-menu-wrap" id="subMenu">
                <div class="sub-menu">
                    <div class="user-info">
                        <img src="profile.png">
                        <h3>User</h3>
                    </div>
                    <hr>

                    <a href="#" class="sub-menu-link">
                        <img src="edit profile.png" alt="">
                            <p>Edit Profile</p>
                            <span>></span>
                    </a>
                    <a href="#" class="sub-menu-link">
                        <img src="logout.png" alt="">
                            <p>Logout</p>
                            <span>></span>
                    </a>
                </div>
            </div>
        </nav>
    </div>

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="Group 8.png" class="d-block w-100" alt="...">
            <div class="carousel-caption">
              <h5>Welcome to the World of Health and Fitness!</h5>
              <p>Embark on your path to a healthy and energetic lifestyle today. Join our community dedicated to health and fitness, where like-minded individuals come together.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="Group 9.png" class="d-block w-100" alt="...">
            <div class="carousel-caption">
              <h5>Unleash Your Fitness Potential</h5>
              <p>Commit to a life of wellness and energy with our supportive community by your side. Together, let's shape a healthier, more vibrant future for yourself.</p>
            </div>
          </div>

          <div class="carousel-item">
            <img src="Group 10.png" class="d-block w-100" alt="...">
            <div class="carousel-caption">
              <h5>Make a Progress</h5>
              <p>Unlock your athletic potential and make significant progress in sports by harnessing the power of our cutting-edge features designed to enhance your training, track your performance, and elevate your overall fitness journey.</p>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>

      <!-- about section -->

      <section id="about" class="about section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center">
                    <img src="bodybuild.png" alt="" class="img-fluid">
                </div>
                <div class="col-md-6 text-justify">
                        <h3>Why<br>Sportify?</h3>
                        <p>We provide features like, blablablablablablabla</p>
                        <a href="" class="btn btn-warning">Learn More</a>
                </div>
                <div class="col-md-6 text-justify">
                    <h3>Beginner's Guide to the Gym | DO's and DON'</h3>
                    <p>Get started going to the gym the RIGHT way!  Everything from how to prepare to supplements and pre/post workout etc. in this video I cover everything I wish I would have known before I went to the gym for the first time.</p>
                    </div>
                    <div class="col-md-6">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe width="640" height="360" src="https://www.youtube.com/embed/EKUNGQ4LmH8?si=89c8l1Uu16BV_PO5" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        </div>
                    </div>
            </div>
                
        </div>
      </section>

      <!-- services section -->

      <section id="services" class="services section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header text-center pb-5">
                        <h2>Our Services</h2>
                        <p>Lorem ipsum dolor sit amet consectetur <br>adipisicing elit. Voluptas, ratione.</p>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-12 col-lg-4">
                    <div class="card text-white text-center bg-dark pb-2">
                        <div class="card-body">
                            <i class="bi bi-bookmark-check"></i>
                            <h3 class="card-title">Book all at once!</h3>
                            <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex cum accusamus hic exercitationem molestias eum.</p>
                            <button class="btn btn-warning text-darl">Read More</button>
                        </div>
                    </div>
                </div>
                    <div class="col-12 col-md-12 col-lg-4">
                        <div class="card text-white text-center bg-dark pb-2">
                            <div class="card-body">
                                <i class="bi bi-graph-up"></i>
                                <h3 class="card-title">Track your progress!</h3>
                                <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem quam nostrum illo dolorum quaerat cumque.</p>
                                <button class="btn btn-warning text-darl">Read More</button>
                            </div>
                        </div>
                    </div>
                        <div class="col-12 col-md-12 col-lg-4">
                            <div class="card text-white text-center bg-dark pb-2">
                                <div class="card-body">
                                    <i class="bi bi-book"></i>
                                    <h3 class="card-title">Plenty of educations!</h3>
                                    <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta voluptas molestias tenetur.</p>
                                    <button class="btn btn-warning text-darl">Read More</button>
                                </div>
                            </div>
                        </div>
            </div>
        </div>
      </section>

      <!-- portofolio section-->

      <section id="portofolio" class="portofolio section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header text-center pb-5">
                        <h2>Our Projects</h2>
                        <p>Lorem ipsum dolor sit amet consectetur <br>adipisicing elit. Voluptas, ratione.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-12 col-lg-4">
                    <div class="card text-center bg white pb-2">
                        <div class="card-body text-dark">
                            <div class="img-area mb-4">
                                <img src="img/section-1.jpg" alt="" class="img-fluid">
                            </div>
                            <h3 class="card-title">Section 1</h3>
                            <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut nam quod excepturi officiis quaerat alias!</p>
                            <button class="btn bg-warning text-dark">Learn More</button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-4">
                    <div class="card text-center bg white pb-2">
                        <div class="card-body text-dark">
                            <div class="img-area mb-4">
                                <img src="img/section2.jpg" alt="" class="img-fluid">
                            </div>
                            <h3 class="card-title">Section 2</h3>
                            <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut nam quod excepturi officiis quaerat alias!</p>
                            <button class="btn bg-warning text-dark">Learn More</button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-4">
                    <div class="card text-center bg white pb-2">
                        <div class="card-body text-dark">
                            <div class="img-area mb-4">
                                <img src="img/section3.jpg" alt="" class="img-fluid">
                            </div>
                            <h3 class="card-title">Section 3</h3>
                            <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut nam quod excepturi officiis quaerat alias!</p>
                            <button class="btn bg-warning text-dark">Learn More</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </section>

      <!-- team section -->
      <section id="team" class="team section-padding">
        <div class="container">
            <div class="col-md-12">
                <div class="section-header text-center pb-5">
                    <h2>Our Projects</h2>
                    <p>Lorem ipsum dolor sit amet consectetur <br>adipisicing elit. Voluptas, ratione.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card text-center">
                    <div class="card-body">
                        <img src="" alt="" class="img-fluid rounded-circle">
                        <h3 class="card-title py-2">Fatin Maetam</h3>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis, alias.</p>

                        <p class="socials">
                            <i class="bi bi-twitter text-dark mx-1"></i>
                            <i class="bi bi-facebook text-dark mx-1"></i>
                            <i class="bi bi-linkedin text-dark mx-1"></i>
                            <i class="bi bi-instagram text-dark mx-1"></i>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card text-center">
                    <div class="card-body">
                        <img src="" alt="" class="img-fluid rounded-circle">
                        <h3 class="card-title py-2">Najwa Subhan</h3>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis, alias.</p>

                        <p class="socials">
                            <i class="bi bi-twitter text-dark mx-1"></i>
                            <i class="bi bi-facebook text-dark mx-1"></i>
                            <i class="bi bi-linkedin text-dark mx-1"></i>
                            <i class="bi bi-instagram text-dark mx-1"></i>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card text-center">
                    <div class="card-body">
                        <img src="" alt="" class="img-fluid rounded-circle">
                        <h3 class="card-title py-2">Aura Fadhila Kusumaningtyas</h3>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis, alias.</p>

                        <p class="socials">
                            <i class="bi bi-twitter text-dark mx-1"></i>
                            <i class="bi bi-facebook text-dark mx-1"></i>
                            <i class="bi bi-linkedin text-dark mx-1"></i>
                            <i class="bi bi-instagram text-dark mx-1"></i>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card text-center">
                    <div class="card-body">
                        <img src="" alt="" class="img-fluid rounded-circle">
                        <h3 class="card-title py-2">M. Fazli Sukma Rahmadani</h3>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis, alias.</p>

                        <p class="socials">
                            <i class="bi bi-twitter text-dark mx-1"></i>
                            <i class="bi bi-facebook text-dark mx-1"></i>
                            <i class="bi bi-linkedin text-dark mx-1"></i>
                            <i class="bi bi-instagram text-dark mx-1"></i>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        </div>
      </section>
      <!-- contact section-->

      <section id="contact" class="contact section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header text-center pb-5">
                        <h2>Contact Us</h2>
                        <p>Lorem ipsum dolor sit amet consectetur <br>adipisicing elit. Voluptas, ratione.</p>
                    </div>
                </div>
            </div>

            <div class="row m-0">
                <div class="col-md-12 p-0 pt-4 pb-4">
                    <form action="#" class="bg-light p-4.m-auto">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="md-3">
                                    <input type="text" class="form-control" required placeholder="Your Full name">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 p-0 pt-4 p-4 m-auto">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="md-3">
                                    <input type="email" class="form-control" required placeholder="Your Email Here">
                                </div>
                            </div>
                    <div class="col-md-12 p-0 pt-4 p-4 m-auto">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="md-3">
                                    <textarea rows="3" required class="form-control" placeholder="Your Query Here"></textarea>
                                </div>
                            </div>
    
                            <button class="btn btn-warning btn-lg btn-block mt-3">Send Now</button>
                </div>
                    </form>
        </div>
      </section>

      <!-- footer -->
      <footer class="bg-dark p-2 text-center">
        <div class="container">
            <p class="text-white">All Right Reserved @Rosalia Indah</p>
        </div>
      </footer>


    <script>
        let subMenu = document.getElementById("subMenu");

        function toggleMenu(){
            subMenu.classList.toggle("open-menu");
        }
    </script>
    <script src="script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>