from django.urls import path
from . import views

urlpatterns = [
    path('', views.index, name='index'),
    path('about', views.about, name='about'),
    path('menu', views.menu, name='menu'),
    path('vacancy', views.vacancy_site, name='vacancy'),
    path("product/<int:product_id>", views.product_id, name="product_id"),
    path("product/all", views.product_all, name="product_all"),
    path("vacancy/<int:vacancy_id>", views.vacancy_id, name="vacancy_id"),
    path("vacancy/all", views.vacancy_all, name="vacancy_all"),
]
