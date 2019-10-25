<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
		
            <div class="box round first grid">
               
                <?php 
                if (isset($_GET['delhis'])) {
                  $sql = "TRUNCATE TABLE track_visitor";
                  $query=$db->delete($sql);
                }
                 ?>
                <div class="block">               
                 <div class="row">
              <div class="col-md-12">
              <div class="panel panel-default">
               <div class="panel-heading">
                <i class="glyphicon glyphicon-check"></i>   Track User Visit Page
            </div>
            <!-- /panel-heading -->
            <div class="panel-body">
                
                <table class="table table-striped">
    <thead>
      <tr>
        <th>Name</th>
        <th>Page</th>
        <th>Date</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php 
    $sql = "SELECT * FROM track_visitor";
     $query = $db->select($sql);
     if ($query ) {
      while ($result=$query->fetch_assoc() ) {?>
       <tr>
        <td><?php echo($result['user_name']); ?></td>
        <td><a href="<?php echo($result['page']); ?>"><?php echo($result['page']); ?></a></td>
        <td><?php echo($result['date']); ?></td>
        <td>
        <div class="dropdown">
          <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action
          <span class="caret"></span></button>
          <ul class="dropdown-menu">
                    <li><a href="?delhis= <?php echo($result['userId']); ?>">Clear All</a></li>
          </ul>
          </div>
       
          
        </td>
      </tr>
      <?php }} ?>
    </tbody>
  </table>
            </div>
            <!-- /panel-body -->
        </div>
    </div>
    <!-- /col-dm-12 -->
</div>
                </div>
            </div>
        </div>

<?php include 'inc/footer.php';?>