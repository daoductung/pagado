from django.urls import path

from category import views

urlpatterns = [
    path('', views.CategoryView.as_view()),
    path('admin/category', views.CategoryAdminView.as_view()),
    path('admin/category/add', views.CategoryAddView.as_view()),
    path('admin/category/edit/<int:cate_id>', views.CategoryEditView.as_view()),
    path('admin/category/delete/<int:cate_id>', views.CategoryDeleteView.as_view())
]