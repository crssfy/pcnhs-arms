<!DOCTYPE html>
<?php include('include_files/session_check.php'); ?>
<?php require_once "../../resources/config.php"; ?>
<html>
  <head>
    <title>Student List</title>
    <link rel="shortcut icon" href="../../assets/images/ico/fav.png" type="image/x-icon" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- jQuery -->
    <script src="../../resources/libraries/jquery/dist/jquery.min.js" ></script>

    <!-- Tablesorter themes -->
    <!-- bootstrap -->
    <link href="../../resources/libraries/tablesorter/css/bootstrap-v3.min.css" rel="stylesheet">
    <link href="../../resources/libraries/tablesorter/css/theme.bootstrap.css" rel="stylesheet">

    <!-- Tablesorter: required -->
    <script src="../../resources/libraries/tablesorter/js/jquery.tablesorter.js"></script>
    <script src="../../resources/libraries/tablesorter/js/jquery.tablesorter.widgets.js"></script>

    <!-- NProgress -->
    <link href="../../resources/libraries/nprogress/nprogress.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="../../resources/libraries/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../../resources/libraries/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- Datatables -->
    <link href="../../resources/libraries/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../../assets/css/custom.min.css" rel="stylesheet">
     <!-- Custom Theme Style -->
    <link href="../../assets/css/customstyle.css" rel="stylesheet">
    <link href="../../assets/css/easy-autocomplete-topnav.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="../js/ie8-responsive-file-warning.js"></script>
    <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="nav-md">
    <?php include "../../resources/templates/registrar/sidebar.php"; ?>
    <?php include "../../resources/templates/registrar/top-nav.php"; ?>
    <!-- Content Start -->
    <div class="right_col" role="main">
      <div class="row">
        <div class="col-md-5">
          <ol class="breadcrumb">
            <li><a href="../index.php">Home</a></li>
            <li class="disabled">Student Management</li>
            <li class="active">Student List</li>
          </ol>
        </div>
        <!-- <form class="form-horizontal form-label-left" action="student_list.php" method="GET">
          <div class="">
            <div class="col-sm-5"></div>
            <div class="col-sm-7">
              <div class="input-group">
                  <input id="search_key" type="text" class="form-control" name="search_key" placeholder="Search Student...">
                  <span class="input-group-btn">
                    <button class="btn btn-primary">Search</button>
                  </span>
              </div>
            </div>
          </div>
        </form> -->
      </div>
      <div class="pull-right">
        <div class="col-md-12">
          <!-- <div class="container">
        	<div class="row">
                <div id="filter-panel" class="collapse filter-panel">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form class="form-inline" role="form" action="student_list.php" method="GET">
                                <div class="form-group">
                                    <div class="radio" style="margin-left:10px; margin-right:10px;">
                                        <label><input type="radio" name="student_status" value="graduate"> Graduated</label>
                                    </div>
                                    <div class="radio" style="margin-left:10px; margin-right:10px;">
                                        <label><input type="radio" name="student_status" value="current"> Currently Enrolled</label>
                                    </div>
                                    <button type="submit" class="btn btn-default filter-col">
                                        <span class="glyphicon glyphicon-filter"></span> Filter
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <button type="button" class="btn btn-primary pull-right" data-toggle="collapse" data-target="#filter-panel">
                    <span class="glyphicon glyphicon-filter"></span> Filter List
                </button>
        	</div>
          <div class="pull-right">
            <a><i class="fa fa-info-circle"></i> Search Student by <strong>Last Name / First Name / Curriculum</strong></a>
          </div>
        </div> -->
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Student List</h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <div class="row">
             <!--   <form class="form-horizontal form-label-left" action="student_list.php" method="GET">
                <div class="form-group">
                  <label class="control-label col-md-10">Search Student by School Year:</label>
                  <div class="input-group">
                      <input class="form-control" type="text" name="schl_year" placeholder="YYYY - YYYY" data-inputmask="'mask': '9999 - 9999'">
                      <span class="input-group-btn">
                        <button class="btn btn-primary">Go</button>
                      </span>
                  </div>
                </div>
              </form> -->
                <div class="col-md-3 pull-right">
                  <form class="form-horizontal form-label-left">
                    <div class="form-group col-md-9 pull-right">
                      <label class="control-label">Number Of Entries:</label>
                      <select class="form-control" onchange="changeEntries(this.value)">
                        <option value="20"
                          <?php if(isset($_SESSION['entry'])){if($_SESSION['entry'] == 20) {echo "selected";}} ?>
                        >20</option>
                        <option value="50"
                          <?php if(isset($_SESSION['entry'])){if($_SESSION['entry'] == 50) {echo "selected";}} ?>
                        >50</option>
                        <option value="100"
                          <?php if(isset($_SESSION['entry'])){if($_SESSION['entry'] == 100) {echo "selected";}} ?>
                        >100</option>
                      </select>
                    </div>
                  </form>
                </div>
                <div class="col-md-3">
                  <form class="form-horizontal form-label-left">
                    <div class="form-group col-md-9">
                      <label class="control-label">Sort</label>
                      <select class="form-control" onchange="sort(this.value)">
                          <option value="stud_id"
                          <?php if(isset($_SESSION['sort'])){if($_SESSION['sort'] == "stud_id") {echo "selected";}} ?>
                        >Student ID</option>
                          <option value="last_name"
                          <?php if(isset($_SESSION['sort'])){if($_SESSION['sort'] == "last_name") {echo "selected";}} ?>>Last Name</option>
                          <option value="first_name"
                          <?php if(isset($_SESSION['sort'])){if($_SESSION['sort'] == "first_name") {echo "selected";}} ?>>First Name</option>
                          <option value="curr_name"
                          <?php if(isset($_SESSION['sort'])){if($_SESSION['sort'] == "curr_name") {echo "selected";}} ?>>Curriculum</option>
                          <option value="date_modified"
                          <?php if(isset($_SESSION['sort'])){if($_SESSION['sort'] == "date_modified") {echo "selected";}} ?>>Date Modified</option>
                      </select>
                    </div>
                    <div class="form-group col-md-9">
                      <select class="form-control" onchange="sorttype(this.value)">
                          <option value="asc"
                           <?php if(isset($_SESSION['sorttype'])){if($_SESSION['sorttype'] == "asc") {echo "selected";}} ?>>Ascending</option>
                          <option value="desc"
                           <?php if(isset($_SESSION['sorttype'])){if($_SESSION['sorttype'] == "desc") {echo "selected";}} ?>>Descending</option>
                      </select>
                    </div>
                  </form>
                </div>
                <div class="col-md-3">
                  <form class="form-horizontal form-label-left">
                    <div class="form-group col-md-9">
                      <label class="control-label">Student Status</label>
                      <select class="form-control" onchange="filter(this.value)">
                          <option value="all"
                           <?php if(isset($_SESSION['filter'])){if($_SESSION['filter'] == "all") {echo "selected";}} ?>>All</option>
                          <option value="current"
                           <?php if(isset($_SESSION['filter'])){if($_SESSION['filter'] == "current") {echo "selected";}} ?>>Current</option>
                          <option value="graduate"
                           <?php if(isset($_SESSION['filter'])){if($_SESSION['filter'] == "graduate") {echo "selected";}} ?>>Graduate</option>
                      </select>
                    </div>
                  </form>
                </div>
                <div class="col-md-3">
                  <form class="form-horizontal form-label-left">
                    <label class="control-label">Year Graduated</label>
                    <div class="input-group col-md-9">
                      <input id="sy" type="text" class="form-control" placeholder="YYYY - YYYY" data-inputmask="'mask': '9999 - 9999'" value=<?php if(isset($_SESSION['filtersy'])){ $sy=$_SESSION['filtersy']; echo "'$sy'";} ?>>
                      <span class="input-group-btn">
                        <button type="button" class="btn btn-primary" onclick="filtersy()">Go</button>
                      </span>
                    </div>
                  </form>
                </div>
              </div>
              <?php
                if(isset($_GET['search_key'])) {
                  $search_key = strtoupper($_GET['search_key']);
                  echo "<p class='table-list'>Searching for <strong>$search_key</strong></p>";
                }
              ?>
              <div class="stud-list">
                <table class="tablesorter-bootstrap">
                  <thead>
                    <tr>
                      <th data-sorter="false">Student ID</th>
                      <th data-sorter="false">Last Name</th>
                      <th data-sorter="false">First Name</th>
                      <th data-sorter="false">Middle Name</th>
                      <th data-sorter="false">Curriculum</th>
                      <th data-sorter="false">Year Level</th>
                      <th data-sorter="false">Date Modified</th>
                      <th data-sorter="false">Action</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php
                    $statement = "";
                    $start=0;
                    $limit;
                    $sort;
                    $filter;
                    if(isset($_SESSION['entry'])){
                      $limit = $_SESSION['entry'];
                    }else {
                      $limit = 20;
                    }

                    if(isset($_SESSION['sort'])){
                      $sort = $_SESSION['sort'];
                    }else {
                      $sort = "stud_id";
                    }
                    if(isset($_SESSION['sorttype'])){
                      $sorttype = $_SESSION['sorttype'];
                    }else {
                      $sorttype = "asc";
                    }

                    if(isset($_SESSION['filter'])){
                      $filter = $_SESSION['filter'];
                    }else {
                      $filter = "all";
                    }

                    if(isset($_SESSION['filtersy']) && $_SESSION['filtersy'] != "") {
                      $sy = $_SESSION['filtersy'];
                      $filtersy = 'AND schl_year = '."'$sy'"." AND yr_level = 4";
                    }else {
                      $filtersy = "";
                    }

                    if(isset($_GET['page'])){
                      $page=$_GET['page'];
                      $start=($page-1)*$limit;
                    }else{
                      $page=1;
                    }
                    $search = "";
                    if(isset($_GET['search_key']) && $_GET['search_key'] != "") {
                      $search = htmlspecialchars(filter_var($_GET['search_key'], FILTER_SANITIZE_STRING), ENT_QUOTES);
                      $statement = "SELECT * from students left join curriculum on students.curr_id = curriculum.curr_id left join grades using (stud_id) where last_name like '$search%' or first_name like '$search%' or stud_id like '$search%' or concat(first_name,' ',last_name) like '$search%' or concat(last_name,' ',first_name,' ',mid_name) like '$search%' or concat(first_name,' ',mid_name,' ',last_name) like '$search%' order by $sort $sorttype limit $start, $limit;";
                    }else {
                      if($filter=="all") {
                        $statement = "select * from students left join curriculum on students.curr_id = curriculum.curr_id join grades using (stud_id) where 1+1 = 2 $filtersy group by stud_id order by $sort $sorttype limit $start, $limit;";
                      }elseif ($filter == "graduate") {
                         $statement = "select * from students left join curriculum on students.curr_id = curriculum.curr_id left join grades using (stud_id) where yr_level >= 4 $filtersy group by stud_id order by $sort $sorttype limit $start, $limit;";
                      }else {
                        $statement = "select * from students left join curriculum on students.curr_id = curriculum.curr_id left join grades using(stud_id) where stud_id not in (select stud_id from grades where yr_level >= 4) $filtersy group by stud_id order by $sort $sorttype limit $start, $limit;";
                      }
                      
                    }
                    $result = DB::query($statement);
                    foreach ($result as $row) {
                      $stud_id = $row['stud_id'];
                      $first_name = $row['first_name'];
                      $mid_name = $row['mid_name'];
                      $last_name = $row['last_name'];
                      $gender = $row['gender'];
                      $birth_date = $row['birth_date'];


                      //$yr_grad = $row['yr_grad'];
                      $program = $row['prog_id'];
                      $curriculum = $row['curr_id'];
                      $curr_code = $row['curr_code'];
                      $date_modified = $row['date_modified'];

                      if(empty($date_modified)) {
                        $date_modified = "No grades edited.";
                      }
                      $display_yr = "select yr_level from grades where stud_id = '$stud_id' order by yr_level desc limit 1;";
                      $result_display_yr = DB::query($display_yr);
                      if(count($result_display_yr) > 0) {
                        foreach($result_display_yr as $row_yr) {
                          $yr_level = $row_yr['yr_level'];
                        }
                        
                      }else {
                        $yr_level =  "";
                      }

                      echo <<<STUDLIST
                      <tr>
                        <td>$stud_id</td>
                        <td>$last_name</td>
                        <td>$first_name</td>
                        <td>$mid_name</td>
                        <td>$curr_code</td>
                        <td>$yr_level</td>
                        <td>$date_modified</td>
                        <td>
                          <center>
                            <a href="../../registrar/studentmanagement/student_info.php?stud_id=$stud_id" class="btn btn-default"> View Record </a>
                          </center>
                        </td>
                      </tr
STUDLIST;
                    }
                  ?>
                  </tbody>
                </table>
                <?php

                  if(isset($_GET['search_key']) && $_GET['search_key'] != "") {
                      $search = htmlspecialchars(filter_var($_GET['search_key'], FILTER_SANITIZE_STRING), ENT_QUOTES);
                      $statement = "SELECT * from students left join curriculum on students.curr_id = curriculum.curr_id left join grades using (stud_id) where last_name like '$search%' or first_name like '$search%' or stud_id like '$search%' or concat(first_name,' ',last_name) like '$search%' or concat(last_name,' ',first_name,' ',mid_name) like '$search%' or concat(first_name,' ',mid_name,' ',last_name) like '$search%' order by $sort $sorttype;";
                    }else {
                      if($filter=="all") {
                        $statement = "select * from students left join curriculum on students.curr_id = curriculum.curr_id join grades using (stud_id) where 1+1 = 2 $filtersy group by stud_id order by $sort $sorttype;";
                      }elseif ($filter == "graduate") {
                         $statement = "select * from students left join curriculum on students.curr_id = curriculum.curr_id left join grades using (stud_id) where yr_level >= 4 $filtersy group by stud_id order by $sort $sorttype;";
                      }else {
                        $statement = "select * from students left join curriculum on students.curr_id = curriculum.curr_id left join grades using(stud_id) where stud_id not in (select stud_id from grades where yr_level >= 4) $filtersy group by stud_id order by $sort $sorttype;";
                      }
                      
                    }

                    $result = DB::query($statement);
                    $rows = count($result);
                    $total = ceil($rows/$limit);
                    echo "<p>Showing $limit Entries</p>";

                    echo '<div class="pull-right">
                      <div class="col s12">
                      <ul class="pagination center-align">';
                      echo "<li class=''><a href='student_list.php?search_key=$search&page=".(1)."'>First Page</a></li>";
                      if($page > 1) {
                        echo "<li class=''><a href='student_list.php?search_key=$search&page=".($page-1)."'>Previous</a></li>";
                      }else if($total <= 0) {
                        echo '<li class="disabled"><a>Previous</i></a></li>';
                      }else {
                        echo '<li class="disabled"><a>Previous</a></li>';
                      }
                      // Google Like Pagination
                      $x = 0;
                      $y = 0;
                      if(($page+5) <= $total) {
                        if($page >= 3) {
                          $x = $page + 2;

                        }else {
                          $x = 5;
                        }

                        $y = $page;
                        if($y <= $total) {
                          $y -= 2;
                          if($y < 1) {
                            $y = 1;
                          }
                        }
                      }else {
                        $x = $total;
                        $y = $total - 5;
                        if($y < 1) {
                          $y = 1;
                        }
                      }
                      // Google Like Pagination
                      for($i = $y;$i <= $x; $i++) {
                        if($i==$page) {
                          echo "<li class='active'><a href='student_list.php?search_key=$search&page=$i'>$i</a></li>";
                        } else {
                            echo "<li class=''><a href='student_list.php?search_key=$search&page=$i'>$i</a></li>";
                          }
                      }


                      if($total == 0) {
                        echo "<li class='disabled'><a>Next</a></li>";
                      }else if($page!=$total) {
                        echo "<li class=''><a href='student_list.php?search_key=$search&page=".($page+1)."'>Next</a></li>";
                      }else {
                        echo "<li class='disabled'><a>Next</a></li>";
                      }
                        echo "<li class=''><a href='student_list.php?search_key=$search&page=".($total)."'>Last Page</a></li>";
                        echo "</ul></div></div>";


                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Content End -->
    <?php include "../../resources/templates/registrar/footer.php"; ?>

    <!-- Scripts -->

    <!-- Bootstrap -->
    <script src="../../resources/libraries/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src= "../../resources/libraries/fastclick/lib/fastclick.js"></script>
    <!-- input mask -->
    <script src= "../../resources/libraries/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
    <script src= "../../resources/libraries/parsleyjs/dist/parsley.min.js"></script>
    <!-- NProgress -->
    <script src="../../resources/libraries/nprogress/nprogress.js"></script>
    <!-- Custom Theme Scripts -->
    <script src= "../../assets/js/jquery.easy-autocomplete.js"></script>
        <script type="text/javascript">
            $(function() {
            $('.recent-request').tablesorter();
            $('.tablesorter-bootstrap').tablesorter({
            theme : 'bootstrap',
            headerTemplate: '{content} {icon}',
            widgets    : ['zebra','columns', 'uitheme']
            });
            });
          </script>
        <!-- Scripts -->
        <script type="text/javascript">
        var options = {
        url: function(phrase) {
        return "phpscript/student_search.php?query="+phrase;
        },
        getValue: function(element) {
        return element.name;
        },
        ajaxSettings: {
        dataType: "json",
        method: "POST",
        data: {
        dataType: "json"
        }
        },
        preparePostData: function(data) {
        data.phrase = $("#search_key").val();
        return data;
        },
        requestDelay: 200
        };
        $("#search_key").easyAutocomplete(options);
        </script>
    <script src= "../../assets/js/custom.min.js"></script>

    <!-- <script type="text/javascript" src="../../resources/libraries/tablesorter/jquery.tablesorter.js"></script> -->
    <script src= "../../assets/js/jquery.easy-autocomplete.js"></script>
    <!-- Scripts -->


    <!-- Change Entry -->
    <script type="text/javascript">
    function changeEntries(val) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    location.assign("student_list.php");
    }
    };
    xhttp.open("GET", "phpscript/showentry.php?entry="+val, true);
    xhttp.send();
    }
    //Sort
    function sort(val) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    location.assign("student_list.php");
    }
    };
    xhttp.open("GET", "phpscript/sort.php?sort="+val, true);
    xhttp.send();
    }
    //Filter
    function filter(val) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    location.assign("student_list.php");
    }
    };
    xhttp.open("GET", "phpscript/filter.php?filter="+val, true);
    xhttp.send();
    }
    //type
    function sorttype(val) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    location.assign("student_list.php");
    }
    };
    xhttp.open("GET", "phpscript/sorttype.php?sorttype="+val, true);
    xhttp.send();
    }
    //Filter
    function filter(val) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    location.assign("student_list.php");
    }
    };
    xhttp.open("GET", "phpscript/filter.php?filter="+val, true);
    xhttp.send();
    }
    //Filter
    function filtersy() {
    var val = document.getElementById('sy').value;
    console.log(val);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    location.assign("student_list.php");
    }
    };
    xhttp.open("GET", "phpscript/filtersy.php?filtersy="+val, true);
    xhttp.send();
    }
    </script>
    <!--  -->
    <!-- jquery.inputmask -->
    <script>
      $(document).ready(function() {
        $(":input").inputmask();
      });
    </script>
    <!-- /jquery.inputmask -->

    <script type="text/javascript">
      $(function() {
      $('.stud-list').tablesorter();
      $('.tablesorter-bootstrap').tablesorter({
      theme : 'bootstrap',
      headerTemplate: '{content} {icon}',
      widgets    : ['zebra','columns', 'uitheme']
      });
      });
    </script>
    <script type="text/javascript">
      var options = {
        url: function(phrase) {
          return "phpscript/student_search.php?query="+phrase;
        },

        getValue: function(element) {
          return element.name;
        },

        ajaxSettings: {
          dataType: "json",
          method: "POST",
          data: {
            dataType: "json"
          }
        },

        preparePostData: function(data) {
          data.phrase = $("#search_key").val();
          return data;
        },

        requestDelay: 200
      };

      $("#search_key").easyAutocomplete(options);
    </script>
  </body>
</html>
