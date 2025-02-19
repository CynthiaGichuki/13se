<?php

session_start();

require_once("db.php");

$limit = 4;

if (isset($_GET["page"])) {
  $page = $_GET['page'];
} else {
  $page = 1;
}

$start_from = ($page - 1) * $limit;


if (isset($_GET['filter']) && $_GET['filter'] == 'city') {

  $sql = "SELECT * FROM employers WHERE location='$_GET[search]'";

  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while ($row1 = $result->fetch_assoc()) {
      $sql1 = "SELECT * FROM job_post WHERE id_emp>='$row1[id_emp]' LIMIT $start_from, $limit";
      $result1 = $conn->query($sql1);
      if ($result1->num_rows > 0) {
        while ($row = $result1->fetch_assoc()) {
?>

<div class="attachment-block clearfix">

    <div class="attachment-pushed">
        <h4 class="attachment-heading"><a
                href="view-job-post.php?id=<?php echo $row['id_jobpost']; ?>"><?php echo $row['jobtitle']; ?></a> <span
                class="attachment-heading pull-right">$<?php echo $row['maximumsalary']; ?>/Month</span></h4>
        <div class="attachment-text">
            <div><strong><?php echo $row1['username']; ?> | <?php echo $row1['location']; ?></strong></div>
        </div>
    </div>
</div>

<?php
        }
      }
    }
  }
} else {

  if (isset($_GET['filter']) && $_GET['filter'] == 'searchBar') {

    $search = $_GET['search'];
    $sql = "SELECT * FROM job_post WHERE jobtitle LIKE '%$search%' LIMIT $start_from, $limit";
  } else if (isset($_GET['filter']) && $_GET['filter'] == 'experience') {

    $sql = "SELECT * FROM job_post WHERE jobtitle='$_GET[search]' LIMIT $start_from, $limit";
  }

  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $sql1 = "SELECT * FROM employers WHERE id_emp='$row[id_emp]'";
      $result1 = $conn->query($sql1);
      if ($result1->num_rows > 0) {
        while ($row1 = $result1->fetch_assoc()) {
        ?>

<div class="attachment-block clearfix">

    <div class="attachment-pushed">
        <h4 class="attachment-heading"><a
                href="view-job-post.php?id=<?php echo $row['id_jobpost']; ?>"><?php echo $row['jobtitle']; ?></a> <span
                class="attachment-heading pull-right">$<?php echo $row['maximumsalary']; ?>/Month</span></h4>
        <div class="attachment-text">
            <div><strong><?php echo $row1['username']; ?> | <?php echo $row1['location']; ?>
            </div>
        </div>
    </div>

    <?php
        }
      }
    }
  }
}




$conn->close();