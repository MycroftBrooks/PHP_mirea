from django import forms
from django.forms import ImageField, ModelForm, SelectMultiple, TextInput

from .models import pdfloader

class pdfloaderForm(forms.ModelForm):
    class Meta:
        model = pdfloader
        fields = ['title', "pdf"]
        labels = {
            'title': 'Название книги',
            "pdf": "pdf",
        }
        widgets = {
            'title': TextInput(attrs={'class': 'form-control'}),
        }
