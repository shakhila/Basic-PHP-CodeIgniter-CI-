<html>
<body>

<?php if($hasil)
{
    $name = $hasil->name;
    $ic = $hasil->ic;
    $address = $hasil->address;
}
?>

<form method="post" action="<?php echo site_url('Welcome/update') ?>" >

<br>Name:<br>
<input type="text" name="name" value="<?php echo $name ?>">

<br>IC:<br>
<input type="text" name="ic" value="<?php echo $ic ?>">

<br>Address:<br>
<input type="text" name="address" value="<?php echo $address ?>">

<button type="submit" name="submit" value="submit">Submit</button>

</body>
</html>