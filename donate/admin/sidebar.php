       <?php
       
    require_once ('../db/db.php');

       // check if cookie is set
       if(!isset($_COOKIE['u_n'])){
        header('Location: index.php');
       }else{
           $selected_users_id = $_COOKIE['u_n'];
            // Validate user id
            $check_status = mysqli_query($mainDbString,"SELECT * FROM users_tbl WHERE `users_tbl`.`user_id` ='{$selected_users_id}'")or die(mysqli_error($mainDbString));

            if(mysqli_num_rows($check_status) <= 0){
                header('Location:index.php');
            }

       }


       
       
       ?>
       
       
       <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
                <div class="sidebar-brand-icon rotate-n-15">
                </div>
                <div class="sidebar-brand-text mx-3"><img src="./img/logo.png" height="50px"/></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="add-card.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Add Card</span></a>
            </li>


            <li class="nav-item">
                <a class="nav-link" href="remaining-cards.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Remaining Cards</span></a>
            </li>



            <li class="nav-item">
                <a class="nav-link" href="sold-cards.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Sold Cards</span></a>
            </li>


            <li class="nav-item">
                <a class="nav-link" href="logout.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Logout</span></a>
            </li>



        </ul>
        <!-- End of Sidebar -->