from django.db import models


class Product(models.Model):
    name = models.CharField(max_length=50)
    price = models.IntegerField(default=0)

    class Meta:
        db_table = 'product'
