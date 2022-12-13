from django.contrib import admin
from .models import product, vacancy, pdfloader

admin.site.register(product)
admin.site.register(vacancy)
admin.site.register(pdfloader)  