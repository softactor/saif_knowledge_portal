<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
          <?php
            if(is_super_admin($_SESSION['logged']['user_type'])){
          ?>
            <li><a href="users_list.php"><i class="fa fa-circle-o text-blue"></i> <span>Users</span></a></li>
        <?php } ?>
          <li><a href="question_answer_list.php"><i class="fa fa-circle-o text-red"></i> <span>FAQ</span></a></li>
          <li><a href="showroom_list.php"><i class="fa fa-circle-o text-yellow"></i> <span>Showroom/Service Center</span></a></li>
          <li><a href="product_list.php"><i class="fa fa-circle-o text-aqua"></i> <span>Product</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>