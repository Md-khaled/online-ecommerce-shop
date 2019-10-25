<?php
include_once '../lib/Session.php'; 
Session::checkSession(); 
 ?>
<style type="text/css">
    ul.section li a.current:hover {
  
  color: #1b548d;
  text-decoration: none;
}
}
</style>
<div class="grid_2">
    <div class="box sidemenu">
        <div class="block" id="section-menu">
            <ul class="section menu">
            <?php if (Session::get("adminRole")=='0' || Session::get("adminRole")=='2') { ?>
                <div class="dropdown">
                <button class="btn btn-primary btn-block" id="menu1" type="button" data-toggle="dropdown">Site Option
                <span class="caret"></span></button>
                <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="titleslogan.php">Title & Slogan</a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="social.php">Social Media</a></li>
                    
                </ul>
              </div>

          <!-- <li><a class="menuitem">Site Option</a>
                    <ul class="submenu">
                        <li><a href="titleslogan.php">Title & Slogan</a></li>
                        <li><a href="social.php">Social Media</a></li>
                        
                        
                    </ul>
                </li> -->
                 <div class="dropdown">
                <button class="btn btn-primary btn-block" id="menu1" type="button" data-toggle="dropdown">Pages
                <span class="caret"></span></button>
                <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="addpage.php">add new page</a></li>
                  <?php 
                     $query="select * from page";
                     $pages=$db->select($query);
                     if ($pages) {
                         while ($result=$pages->fetch_assoc()) {
                ?>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="updatepage.php?pagesid=<?php echo($result['pid']); ?>"><?php echo($result['name']); ?></a></li>
                    <?php }} ?>
                </ul>
              </div>
               <div class="dropdown">
                <button class="btn btn-primary btn-block" id="menu1" type="button" data-toggle="dropdown">Brand Option
                <span class="caret"></span></button>
                <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="brandadd.php">Add Brand</a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="brandlist.php">Brand List</a></li>
                    
                </ul>
              </div>
				<div class="dropdown">
                <button class="btn btn-primary btn-block" id="menu1" type="button" data-toggle="dropdown">Category Option
                <span class="caret"></span></button>
                <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="catadd.php">Add Category</a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="catlist.php">Category List</a></li>
                    
                </ul>
              </div>
                 
				
               <!--  <li><a class="menuitem">Category Option</a>
                    <ul class="submenu">
                        <li><a href="catadd.php">Add Category</a> </li>
                        <li><a href="catlist.php">Category List</a> </li>
                    </ul>
                </li> -->

                <!-- <li><a class="menuitem">Brand Option</a>
                    <ul class="submenu">
                        <li><a href="brandadd.php">Add Brand</a> </li>
                        <li><a href="brandlist.php">Brand List</a> </li>
                    </ul>
                </li> -->
                 <div class="dropdown">
                <button class="btn btn-primary btn-block" id="menu1" type="button" data-toggle="dropdown">Product Option
                <span class="caret"></span></button>
                <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="productadd.php">Add Product</a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="productlist.php">Product List</a></li>
                    
                </ul>
              </div>
               <!--  <li><a class="menuitem">Product Option</a>
                    <ul class="submenu">
                        <li><a href="productadd.php">Add Product</a> </li>
                        <li><a href="productlist.php">Product List</a> </li>
                    </ul>
                </li> -->
                
                 <div class="dropdown">
                <button class="btn btn-primary btn-block" id="menu1" type="button" data-toggle="dropdown">Stock/Statistics
                <span class="caret"></span></button>
                <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="productlist.php">See Stock</a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="statistics.php">Statistics </a></li>
                    
                </ul>
              </div>
              
                 <?php } ?>
                  <div class="dropdown">
                <button class="btn btn-primary btn-block" id="menu1" type="button" data-toggle="dropdown">User Option
                <span class="caret"></span></button>
                <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                <?php 
                    if (Session::get("adminRole")=='0') {
                 ?>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="addemployee.php">Add employee</a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="attendance.php">Employee Attendance </a></li>
                  <?php } ?>
                   <li role="presentation"><a role="menuitem" tabindex="-1" href="employeelist.php">employee List</a></li>
                   <?php if (Session::get("adminRole")=='0' || Session::get("adminRole")=='2') { ?>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="userlist.php">User List </a></li> 
                   <?php } ?>
                </ul>
              </div>
              
                 <div class="dropdown">
                <button class="btn btn-primary btn-block" id="menu1" type="button" data-toggle="dropdown">Order Option
                <span class="caret"></span></button>
                <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="../index.php">Add Order</a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="orderlist.php">Order List</a></li>
                  
                </ul>
              </div>

                <!-- <li ><a class="menuitem">Order Option</a>
                    <ul class="submenu">
                        <li><a href="../index.php">Add Order</a> </li>
                        <li><a href="orderlist.php">Order List</a> </li>
                    </ul>
                </li> -->
                 <div class="dropdown">
                <button class="btn btn-primary btn-block" id="menu1" type="button" data-toggle="dropdown">Service
                <span class="caret"></span></button>
                <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                 <!--  <li role="presentation"><a role="menuitem" tabindex="-1" href="assignservice.php">Assign Service</a></li> -->
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="rub.php">Service List</a></li>
                  
                </ul>
              </div>
              <?php 
                    if (Session::get("adminRole")=='0') {
                 ?>
              <div class="dropdown">
                <button class="btn btn-primary btn-block" id="menu1" type="button" data-toggle="dropdown">Location
                <span class="caret"></span></button>
                <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="tracklocation.php">See Track Location</a></li>
                </ul>
              </div> 
              <?php } ?>
              <?php 
                    if (Session::get("adminRole")=='0'|| Session::get("adminRole")=='2') {
                 ?>
              <div class="dropdown">
                <button class="btn btn-primary btn-block" id="menu1" type="button" data-toggle="dropdown">Backup Database
                <span class="caret"></span></button>
                <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="backupdatabase/backup.php">Backup DB</a></li>  
                </ul>
              </div> 
              <?php } ?>
                <!-- <li><a class="menuitem">Service</a>
                    <ul class="submenu">
                        <li><a href="assignservice.php">Assign Service</a> </li>
                        <li><a href="rub.php">Service List</a> </li>
                    </ul>
                </li> -->
                <!-- <li><a class="menuitem">Employee Option</a>
                    <ul class="submenu">
                        <li><a href="addemployee.php">Add employee</a> </li>
                        <li><a href="employeelist.php">employee List</a> </li>
                        <li><a href="userlist.php">User List</a> </li>
                    </ul>
                </li> -->
                <!-- <div class="dropdown">
                <button class="btn btn-primary btn-block" id="menu1" type="button" data-toggle="dropdown">Dropdown Example
                <span class="caret"></span></button>
                <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">HTML</a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">CSS</a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">JavaScript</a></li>
                  <li role="presentation" class="divider"></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">About Us</a></li>    
                </ul>
              </div> -->

            </ul>
            
        </div>
    </div>
</div>