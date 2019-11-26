<html>
<body>

<?php if($hasil)
{
    $name = $hasil->name;
    $ic = $hasil->ic;
    $address = $hasil->address;
    
}
?>

<br>ID<br>
<input type="text" name="name" value="<?php echo $name ?>" readonly>

<br><br>TITLE<br>
<input type="text" name="ic" value="<?php echo $ic ?>" readonly>

<br><br>DESCRIPTION<br>
<input type="text" name="address" value="<?php echo $address ?>" readonly>


</body>
</html>
    
    