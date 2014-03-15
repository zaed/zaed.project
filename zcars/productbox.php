<div class="productbox">

<div>
<img src="<? echo $row['image']; ?>" alt="<? echo $row['name']; ?>" class="productimage" />
</div><!-- close productimage -->

<div class="productname">
<? echo $row['name']; ?> 
</div><!-- close productname -->

<div class="description">
- <? echo $row['description']; ?>
</div><!-- close description -->

<div class="productname">
<div class="price">
&pound;<? echo $row['unitprice']; ?>
</div><!-- close price -->

<div class="addtocart">
<form action="cartpage.php" method="post">
<input type="hidden" name="unitprice" size="2" value="<? echo $row['unitprice']; ?>" maxlength="2" />
<input type="hidden" name="cartid" size="2" value="<? echo $cartid; ?>" maxlength="2" />
<input type="number" name="quantity" size="2" value="1" maxlength="2" />
<input type="hidden" name="productid" value="<? echo $row['productid']; ?>" />

<input type="submit" class="button" name="addtocart" value="ADD TO CART" />



 </form>
 </div><!-- close addtocart -->
 </div><!-- close productname -->
 
</div><!-- close product box -->