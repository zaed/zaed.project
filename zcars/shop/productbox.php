<div class="productbox">

<div>
<img src="../<?php echo $row['pimage']; ?>" alt="<?php echo $row['pname']; ?>" class="productimage" />
</div><!-- close productimage -->

<div class="productname">
<?php echo $row['pname']; ?> 
</div><!-- close productname -->

<div class="description">
- <?php echo $row['description']; ?>
</div><!-- close description -->

<div class="productname">
<div class="price">
&pound;<?php echo $row['unitprice']; ?>
</div><!-- close price -->

<div class="addtocart">
<form action="cartpage.php" method="post">
<input type="hidden" name="unitprice" size="2" value="<?php echo $row['unitprice']; ?>" maxlength="2" />
<input type="text" name="quantity" size="2" value="1" maxlength="2" />
<input type="hidden" name="productid" value="<?php echo $row['productid']; ?>" />

<input type="submit" class="button" name="addtocart" value="ADD TO CART" />

</form>
 </div><!-- close addtocart -->
 </div><!-- close productname -->
 
</div><!-- close product box -->

