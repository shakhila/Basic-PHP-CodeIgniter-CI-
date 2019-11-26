<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
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
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url('Welcome/homeTeacher') ?>">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url('Welcome/teacherProfile') ?>">My Profile</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url('Welcome/createStudent') ?>">Create Student</a>
                        </li>

                        <li class="nav-item active">
                            <a class="nav-link" href="<?php echo site_url('Welcome/viewStudent') ?>">View Student <span class="sr-only">(current)</span></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url('Welcome/logout') ?>" onclick="return confirm('Confirm Logout?')">Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>



        </div>
    </div>
</div>


<div id="content">
    <div id="content-wrapper">

        <!-- Jumbtron / Slider -->
        <div class="jumbotron-wrap">
            <div class="container-fluid">
                <div class="jumbotron jumbotron-narrow static-slider">
                    <h1 class="text-center">View Student</h1>
                </div>
            </div>
        </div>

        <!-- Main content area -->
        <main class="container-fluid">
            <div class="row">

                <!-- Main content -->
                <div class="col-sm-8">
                    <article>

                    <form method="POST" action="<?php echo site_url('Welcome/cari') ?>">
                    
                               <select name="cariberdasarkan" style="height:30px;width:300px">
                                    <option value=""><b>Search Based on:</b></option>
                                    <option value=""></option>
                                    <option value="name">Name</option>
                                    <option value="ic">IC</option>
                                    <option value="address">address</option>
                                    <option value="fatherName">Father Name</option>
                                    <option value="motherName">Mother Name</option>
                                    <option value="phone">Phone Number</option>
                                </select>

                                <input type="text" name="yangdicari" id="" style="height:30px;width:300px">
                                <button type="submit" name="submit" value= "submit" class="btn btn-success">Search</button>
                    </form>

                    <?php
                        if(isset($jumlah))
                        {
                            
                                echo "Total Number of Student: ". $jumlah ;
                         
                        }
                    ?>

                        <table class="table">
                            <thead>
                            <tr><br><br>
                                <th>No.</th>
                                <th>Name</th>
                                <th>IC</th>
                                <th>Address</th>
                                <th>Father</th>
                                <th>Mother</th>
								<th>Phone Number</th>
                                <th>Action</th>
                                <th></th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php $no=1; forEach($hasil as $r){ ?>
                                <tr>
                                    <td><?php echo $no ?></td>
                                    <td><?php echo $r['name'] ?></td>
                                    <td><?php echo $r['ic'] ?></td>
                                    <td><?php echo $r['address'] ?></td>
                                    <td><?php echo $r['fatherName'] ?></td>
                                    <td><?php echo $r['motherName'] ?></td>
                                    <td><?php echo $r['phone'] ?></td>

                                    <td><button type="submit" name="submit" value= "submit" class="btn btn-success"><a href="<?php echo site_url('Welcome/form_edit/'.$r['ic']) ?>">Update</a></button></td>
                                    <td><button type="submit" name="submit" value= "submit" class="btn btn-danger" onclick="return confirm('Confirm Delete this Data?')"><a href="<?php echo site_url('Welcome/delete/'.$r['ic']) ?>">Delete</a></button></td>
                                </tr>
                            <?php $no++;} ?>
                            </tbody>
                        </table>

                        <p>&nbsp;</p>

                    </article>
                </div>

            </div>
        </main>


        <!-- Footer -->
        <div class="container-fluid footer-container">
            <footer class="footer">

                <div class="footer-bottom">
                    <p class="text-center"><a href="#">Back to top</a></p>
                </div>

            </footer>
        </div>
    </div>
</div>

<!-- Bootcamp JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>