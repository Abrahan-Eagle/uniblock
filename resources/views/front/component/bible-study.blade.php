@php
  $activity = Activity() -> activity;
@endphp

@foreach($activity as $activitys)
<section class="ftco-bible-study">
  <div class="container-wrap">
    <div class="col-md-12 wrap">
      <div class="container">
        <div class="row">
          <div class="col-md-12 d-md-flex">
            <div class="one-forth ftco-animate">
              <h3>{!! substr($activitys['title'], 0, 25) !!}</h3>
            <p align="center">{!! substr($activitys['excerpt'], 0, 95) !!}</p>
            </div>
            <div class="one-half d-md-flex align-items-md-center ftco-animate">
              <div class="countdown-wrap">
                  <h1 align='center' id="xxx"></h1>
                <p class="countdown d-flex">
                  <span id="days"></span>
                  <span id="hours"></span>
                  <span id="minutes"></span>
                  <span id="seconds"></span>
                </p>
              </div>
              <div class="button">
                <p><a href="{{ route('event.post', ['slug' => $activitys -> slug]) }}" class="btn btn-primary p-3">Detalles de Eventos</a></p>
                            
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script type="text/javascript">
  //console.log($date_activixx);
    var activity = @json($activitys->date_activi);
  </script>

@endforeach