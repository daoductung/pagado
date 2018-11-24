from django.shortcuts import render
from django.views.generic import View

from product.models import Product


class IndexView(View):
    template_name = "cart.html"

    def get(self, request, *args, **kwargs):
        return render(request, self.template_name)

