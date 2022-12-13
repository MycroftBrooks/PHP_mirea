from django.shortcuts import render
from django.http import HttpResponse, HttpResponseRedirect
from .models import product, vacancy, pdfloader
from .forms import pdfloaderForm
from .graphs import get_graph

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

def pdfloader_site(request):
    submitted = False
    if request.method == "POST":
        form = pdfloaderForm(request.POST, request.FILES)
        if form.is_valid():
            form.save()
            return HttpResponseRedirect("/pdfloader?submitted=True")
    else:
        form = pdfloaderForm
        if "submitted" in request.GET:
            submitted = True
    return render(request, "app_prac8/pdfloader.html", {"form": form, "submitted": submitted})


def pdfloaded(request):
    context={"pdfs": pdfloader.objects.all()}
    return render(request, 'app_prac8/pdfloaded.html', context)

def graphs(request):
    graphs_dict = get_graph(50)
    context = {"graphs": graphs_dict}
    return render(request, "app_prac8/graph.html", context)