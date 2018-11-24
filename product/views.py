from django.core.files.storage import FileSystemStorage
from django.shortcuts import render, redirect
from django.views.generic import TemplateView, View

from product.models import Product


class ProductAdminView(View):
    template_name = "admin/product/index.html"

    def get(self, request, *args, **kwargs):
        ds_san_pham = Product.objects.all().order_by('id')

        context = {
            'ds_san_pham': ds_san_pham
        }
        return render(request, self.template_name, context)


class ProductAddView(View):
    template_name = "admin/product/add.html"

    def get(self, request, *args, **kwargs):
        return render(request, self.template_name)

    def post(self, request, *args, **kwargs):
        data = request.POST
        file = request.FILES['image']

        product = Product()
        product.name = data['name']
        product.image = file
        product.save()

        return redirect('/admin/product')


class ProductEditView(View):
    template_name = "admin/product/edit.html"

    def get(self, request, *args, **kwargs):
        product_id = kwargs['product_id']
        product = Product.objects.get(id=product_id)
        context = {
            'product': product
        }

        return render(request, self.template_name, context)

    def post(self, request, *args, **kwargs):
        product_id = kwargs['product_id']
        product = Product.objects.get(id=product_id)
        if product:
            data = request.POST
            file = request.FILES['image']
            product.name = data['name']
            product.image = file
            product.save()

        return redirect('/admin/product')


class ProductDeleteView(View):

    def get(self, request, *args, **kwargs):
        product_id = kwargs['product_id']
        product = Product.objects.get(id=product_id)
        if product:
            product.delete()

        return redirect('/admin/product')
