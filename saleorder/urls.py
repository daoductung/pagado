from django.urls import path

from saleorder import views

urlpatterns = [
    path('saleorder', views.CheckoutView.as_view()),
    path('admin/saleorder', views.SaleOrderAdminView.as_view()),
    path('admin/saleorder/add', views.SaleOrderAddView.as_view()),
    path('admin/saleorder/edit/<int:don_hang_id>', views.SaleOrderEditView.as_view()),
    path('admin/saleorder/delete/<int:don_hang_id>', views.SaleOrderDeleteView.as_view()),
]