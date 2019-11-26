<html>
<body>
<a href="<?php echo site_url('Welcome/pageCreate') ?>">Create New</a>
<table border="1" align="center">
<thead>
    <tr>
        <th>Name</th>
        <th>IC</th>
        <th>Address</th>
        <th></th>
    </tr>
</thead>

<?php foreach ($hasil as $r) { ?>
    <tr>
        <td><?php echo $r['name']?></td>
        <td><?php echo $r['ic'] ?></td>
        <td><?php echo $r['address'] ?></td>
        <td><a href="<?php echo site_url('Welcome/pageUpdate/'.$r['ic']) ?>">Update</a></td>
        <td><a href="<?php echo site_url('Welcome/deletes/'.$r['ic']) ?>">Delete</a></td>
        <td><button type="submit" name="submit" value="submit"><a href="<?php echo site_url('Welcome/views/'.$r['ic']) ?>">View</a></button></td>

 
    </tr>
<?php } ?>
</table>

</body>
</html>