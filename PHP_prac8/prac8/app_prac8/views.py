from django.shortcuts import render
from django.http import HttpResponse
from .models import product, vacancy


def index(request):
    return render(request, 'app_prac8/index.html')

def about(request):
    return render(request, 'app_prac8/about.html')

def menu(request):
    context = {"products": product.objects.all()}
    return render(request, 'app_prac8/menu.html', context)

def vacancy_site(request):
    context = {"vacancys": vacancy.objects.all()}
    return render(request, 'app_prac8/vacancy.html', context)

def product_id(request, product_id):
    product_site = product.objects.get(id=product_id)
    product_site = product_site.__str__()
    return HttpResponse(product_site)

def product_all(request):
    product_site = product.objects.all()
    product_str = " ".join(product.__str__() for product in product_site)
    return HttpResponse(product_str)

def vacancy_id(request, vacancy_id):
    vacancy_site = vacancy.objects.get(id=vacancy_id)
    vacancy_site = vacancy_site.__str__()
    return HttpResponse(vacancy_site)

def vacancy_all(request):
    vacancy_site = vacancy.objects.all()
    vacancy_str = " ".join(vacancy.__str__() for vacancy in vacancy_site)
    return HttpResponse(vacancy_str)

