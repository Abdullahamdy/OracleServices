<div>
@if(count($questionandanswer))
@foreach($questionandanswer as $key=> $questionitem)
              <div><!-- # Faq item-->
              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-{{$key}}">
                    <i class="bi bi-question-circle question-icon"></i>
                  {{$questionitem->question}}
                  </button>
                </h3>
                <div id="faq-content-{{$key}}" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body">
                  {{$questionitem->answer}}
                  </div>
                </div>
              </div><!-- # Faq item-->
@endforeach
@endif
</div>

