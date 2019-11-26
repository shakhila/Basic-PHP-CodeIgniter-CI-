
<!doctype html>
<html lang="en">
<head>
    <title>Sayangku Genius</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Main CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">

    <!-- Font Awesome -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>


<!-- Main navigation -->
<div id="sidebar">

    <div class="navbar-expand-md navbar-dark">

        <header class="d-none d-md-block">
            <h2>Welcome <?php echo $this->session->userdata('username') ?> !</h2>
        </header>


        <!-- Mobile menu toggle and header -->
        <div class="mobile-header-controls">
            <a class="navbar-brand d-md-none d-lg-none d-xl-none" href="#"><span>my</span>website</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#SidebarContent" aria-controls="SidebarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

        <div id="SidebarContent" class="collapse flex-column navbar-collapse">

            <!-- Main navigation items -->
            <nav class="navbar navbar-dark">
                <div id="mainNavbar">
                    <ul class="flex-column mr-auto">

                        <li class="nav-item active">
                            <a class="nav-link" href="<?php echo site_url('Welcome/homeTeacher') ?>">Home <span class="sr-only">(current)</span></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url('Welcome/teacherProfile') ?>">My Profile</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url('Welcome/createStudent') ?>">Create Student</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url('Welcome/viewStudent') ?>">View Student</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url('Welcome/logout') ?>" onclick="return confirm('Confirm Logout?')">Logout</a>
                        </li>

                        </li>

                    </ul>
                </div>
            </nav>

        </div>
    </div>
</div>


<div id="content">
    <div id="content-wrapper">
        <br><br><br><br>
        <!-- Jumbtron / Slider -->
        <div class="jumbotron-wrap">
            <div class="container-fluid">
                <div id="mainCarousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="jumbotron">
                                <img src="<?php echo base_url(); ?>assets/img/children2.png" class="avatar">
                            </div>

                        </div>

                        <div class="carousel-item">
                            <div class="jumbotron">
                                <img src="<?php echo base_url(); ?>assets/img/children.jpg" class="avatar">
                            </div>

                        </div>
                    </div>

                    <a class="carousel-control-prev" href="#mainCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#mainCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>

        <br><br><br><br><br><br><br><br><br><br><br>

    </div>
</div>

<!-- Bootcamp JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>

