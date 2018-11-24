from django.urls import path

from user import views

urlpatterns = [
    path('admin/user', views.UserIndexView.as_view()),
    path('admin', views.UserIndexView.as_view()),
    path('admin/user/add', views.UserAddView.as_view()),
    path('admin/user/edit/<int:user_id>', views.UserEditView.as_view()),
    path('admin/user/delete/<int:user_id>', views.UserDeleteView.as_view())
]