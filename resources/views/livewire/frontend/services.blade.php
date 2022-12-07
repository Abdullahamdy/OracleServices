
   <div class="row gy-4">

@foreach($collection as $service)

<div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
  <div class="card">
    <div class="card-img">
    @if($image = $service->attachments()->orderBy('id',"DESC")->first())
         <img src="{{ url('storage/'.$image->path) }}"alt="" class="img-fluid">
    @endif
    
    </div>
    <h3><a href="{{route('serv-detail',$service->id,$service->id)}}" class="stretched-link">
        
           {{$service->name}}</a>
    </h3>       
    <p>{!! $service->full_description !!}</p>
  </div>


</div><!-- End Card Item -->
@endforeach
</div>