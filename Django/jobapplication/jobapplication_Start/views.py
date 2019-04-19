from django.shortcuts import render
from django.http import HttpResponse
from django.views import generic
# Create your views here.
from django.views.generic import TemplateView
from django.views.generic.base import TemplateView







class IndexView(TemplateView):
    template_name = "index.html"

def index(request):
    return HttpResponse("Hello, world. You're at the polls index.")
  