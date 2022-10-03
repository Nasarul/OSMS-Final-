<?php include 'filesLogic.php';?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="style.css">
  <title>Download files</title>
</head>
<body>

<table>
<thead>
    <th>ID</th>
    <th>Course Name</th>
    <th>Name</th>
    <th>Course Code</th>
    <th>Action</th>
</thead>
<tbody>
  <?php foreach ($files as $file): ?>
    <tr>
      <td><?php echo $file['sub_id']; ?></td>
      <td><?php echo $file['course_name']; ?></td>
      <td><?php echo $file['name']; ?></td>
      <td><?php echo $file['code']; ?></td>
      <td><a href="downloads.php?sub_id=<?php echo $file['sub_id'] ?>">Download</a></td>
    </tr>
  <?php endforeach;?>

</tbody>
</table>

</body>
</html>