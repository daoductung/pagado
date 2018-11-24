from django.urls import path

from saleorder import views

urlpatterns = [
    path(' ', views.CheckoutView.as_view()),
    path('admin/saleorder', views.SaleOrderAdminView.as_view()),
    path('admin/saleorder/add', views.SaleOrderAddView.as_view()),
    path('admin/saleorder/edit/<int:dh_id>', views.SaleOrderEditView.as_view()),
]