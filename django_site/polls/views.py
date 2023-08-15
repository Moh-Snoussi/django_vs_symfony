from django.views import generic

from .models import Question

class IndexView(generic.ListView):
    model = Question
    template_name = "polls/index.html"
    context_object_name = "latest_question_list"

    def get_queryset(self) -> list:
        return Question.objects.all()

