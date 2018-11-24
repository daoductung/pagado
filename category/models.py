from django.conf import settings
from django.core.files.storage import FileSystemStorage
from django.db import models


class Category(models.Model):
    name = models.CharField(max_length=50)
    image = models.FileField(
        storage=FileSystemStorage(location=settings.MEDIA_ROOT),
        upload_to='category',
        default='settings.MEDIA_ROOT/default.jpg'
    )

    class Meta:
        db_table = 'category'
