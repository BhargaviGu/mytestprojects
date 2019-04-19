

from django.urls import path

from jobapplication_Start.views import IndexView

urlpatterns = [
    path('index/', IndexView.as_view()),
]