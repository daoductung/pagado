from django.core.files.storage import FileSystemStorage
from django.shortcuts import render, redirect
from django.views.generic import TemplateView, View

from category.models import Category


class CategoryView(TemplateView):
    template_name = "category.html"


class CategoryAdminView(View):
    template_name = "admin/category/index.html"

    def get(self, request, *args, **kwargs):
        ds_loai_san_pham = Category.objects.all().order_by('id')

        context = {
            'ds_loai_san_pham': ds_loai_san_pham
        }
        return render(request, self.template_name, context)


class CategoryAddView(View):
    template_name = "admin/category/add.html"

    def get(self, request, *args, **kwargs):
        return render(request, self.template_name)

    def post(self, request, *args, **kwargs):
        data = request.POST
        file = request.FILES['image']
        if request.FILES.get('image', None):
            category = Category()
            category.name = data['name']
            category.image = file
            category.save()

        return redirect('/admin/category')


class CategoryEditView(View):
    template_name = "admin/category/edit.html"

    def get(self, request, *args, **kwargs):
        category_id = kwargs['cate_id']
        category = Category.objects.get(id=category_id)
        context = {
            'category': category
        }

        return render(request, self.template_name, context)

    def post(self, request, *args, **kwargs):
        category_id = kwargs['cate_id']
        category = Category.objects.get(id=category_id)
        if category:
            data = request.POST
            category.name = data['name']
            if request.FILES.get('image', None):
                file = request.FILES['image']
                category.image = file
            category.save()


        return redirect('/admin/category')


class CategoryDeleteView(View):

    def get(self, request, *args, **kwargs):
        category_id = kwargs['cate_id']
        category = Category.objects.get(id=category_id)
        if category:
            category.delete()

        return redirect('/admin/category')
