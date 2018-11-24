from django.shortcuts import render, redirect
from django.views import View

from user.models import User


class AdminIndexView(View):
    template_name = "admin/index.html"

    def get(self, request, *args, **kwargs):
        return render(request, self.template_name)


class UserIndexView(View):
    template_name = "admin/user/index.html"

    def get(self, request, *args, **kwargs):
        ds_user = User.objects.all().order_by('id')

        context = {
            'ds_user': ds_user
        }
        return render(request, self.template_name, context)


class UserAddView(View):
    template_name = "admin/user/add.html"

    def get(self, request, *args, **kwargs):
        return render(request, self.template_name)

    def post(self, request, *args, **kwargs):
        data = request.POST

        user = User()
        user.full_name = data['full_name']
        user.user_name = data['user_name']
        user.password = data['password']
        user.save()

        return redirect('/admin/user')


class UserEditView(View):
    template_name = "admin/user/edit.html"

    def get(self, request, *args, **kwargs):
        user_id = kwargs['user_id']
        user = User.objects.get(id=user_id)
        context = {
            'user': user
        }

        return render(request, self.template_name, context)

    def post(self, request, *args, **kwargs):
        user_id = kwargs['user_id']
        user = User.objects.get(id=user_id)
        if user:
            data = request.POST

            user.full_name = data['full_name']
            user.user_name = data['user_name']
            user.password = data['password']
            user.save()

        return redirect('/admin/user')


class UserDeleteView(View):

    def get(self, request, *args, **kwargs):
        user_id = kwargs['user_id']
        user = User.objects.get(id=user_id)
        if user:
            user.delete()

        return redirect('/admin/user')
