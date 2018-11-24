# Generated by Django 2.1.3 on 2018-11-24 20:19

import datetime
from django.db import migrations, models
import django.db.models.deletion


class Migration(migrations.Migration):

    initial = True

    dependencies = [
        ('product', '0003_auto_20181124_2359'),
    ]

    operations = [
        migrations.CreateModel(
            name='SaleOrder',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('name', models.CharField(max_length=20)),
                ('date', models.DateField(default=datetime.date.today)),
                ('name_user', models.CharField(max_length=20)),
                ('address_user', models.CharField(max_length=50)),
                ('numer_phone', models.CharField(max_length=10)),
            ],
            options={
                'db_table': 'sale_order',
            },
        ),
        migrations.CreateModel(
            name='SaleOrderDetail',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('quantity', models.IntegerField(default=1)),
                ('price', models.IntegerField()),
                ('product_id', models.ForeignKey(on_delete=django.db.models.deletion.CASCADE, to='product.Product')),
                ('sale_order_id', models.ForeignKey(on_delete=django.db.models.deletion.CASCADE, to='saleorder.SaleOrder')),
            ],
            options={
                'db_table': 'sale_order_detail',
            },
        ),
    ]
