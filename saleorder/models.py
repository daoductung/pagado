import datetime

from django.db import models

from product.models import Product


class SaleOrder(models.Model):
    name = models.CharField(max_length=20)
    date = models.DateField(default=datetime.date.today)
    name_user = models.CharField(max_length=20)
    address_user = models.CharField(max_length=50)
    numer_phone = models.CharField(max_length=10)

    class Meta:
        db_table = 'sale_order'


class SaleOrderDetail(models.Model):
    sale_order_id = models.ForeignKey(SaleOrder, on_delete=models.CASCADE)
    product_id = models.ForeignKey(Product, on_delete=models.CASCADE)
    quantity = models.IntegerField(default=1)
    price = models.IntegerField()

    class Meta:
        db_table = 'sale_order_detail'

