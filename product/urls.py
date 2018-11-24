from django.urls import path

from product import views

urlpatterns = [
    path('admin/product', views.ProductAdminView.as_view()),
    path('admin/product/add', views.ProductAddView.as_view()),
    path('admin/product/edit/<int:product_id>', views.ProductEditView.as_view()),
    path('admin/product/delete/<int:product_id>', views.ProductDeleteView.as_view())
]