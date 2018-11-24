import json

from django.shortcuts import render
from django.views.generic import TemplateView, View

from product.models import Product
from saleorder.models import SaleOrder, SaleOrderDetail


class CheckoutView(TemplateView):
    template_name = "cart.html"


class SaleOrderAdminView(View):
    template_name = "admin/saleorder/index.html"

    def get(self, request, *args, **kwargs):
        ds_don_hang = SaleOrder.objects.all()

        context = {
            'ds_don_hang': ds_don_hang
        }
        return render(request, self.template_name, context)


class SaleOrderAddView(View):
    template_name = "admin/saleorder/add.html"

    def get(self, request, *args, **kwargs):
        ds_san_pham = Product.objects.all()

        context = {
            'ds_san_pham': ds_san_pham
        }

        return render(request, self.template_name, context)

    def post(self, request, *args, **kwargs):
        data = request.POST

        sale_order = SaleOrder()
        sale_order.name = data['name']
        sale_order.save()

        data_details = json.loads(data['sale_order_detail'])
        for detail in data_details:
            product_id = detail.get('product_id', None)
            if product_id:
                product = Product.objects.get(id=product_id)

                sale_order_detail = SaleOrderDetail()
                sale_order_detail.sale_order_id = sale_order
                sale_order_detail.product_id = product
                sale_order_detail.quantity = int(detail.get('product_qty', '0'))
                sale_order_detail.price = detail.get('product_price', '0')
                sale_order_detail.save()

        return "OK"


class SaleOrderEditView(View):
    template_name = "admin/saleorder/edit.html"

    def get(self, request, *args, **kwargs):
        return render(request, self.template_name)

    def post(self, request, *args, **kwargs):
        return render(request, self.template_name)
