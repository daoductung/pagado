from django.conf import settings
from django.core.files.storage import FileSystemStorage
from django.db import models


class Product(models.Model):
    name = models.CharField(max_length=50)
    price = models.IntegerField(default=0)
    image = models.FileField(
        storage=FileSystemStorage(location=settings.MEDIA_ROOT),
        upload_to='product',
        default='settings.MEDIA_ROOT/default.jpg'
    )

    class Meta:
        db_table = 'product'
