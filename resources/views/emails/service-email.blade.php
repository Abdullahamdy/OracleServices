<div style="direction: rtl;width: 100%; padding-top: 20px;color: black ; text-align: right;
        direction: rtl;">
    <div style="width: 90%; padding: 15px; margin: 0 auto">
        <div style="text-align: center; margin-bottom: 10px;">
            <h2 style="margin: 0 !important ; display:inline-block ;padding-bottom: 3px ; border-bottom: 1px solid; color: red;">{{$data}}</h2>
        </div>
        <div style="text-align: center; margin-bottom: 10px;">
            <h2 style="margin: 0 !important ; display:inline-block ;padding-bottom: 3px ; border-bottom: 1px solid">{{$service->name}}</h2>
        </div>
        <div style="text-align: right; margin-bottom: 10px; margin-right: 0">
            <h4 style="margin-top: 20px ; margin-bottom: 10px ; text-align: center">{{ $service->short_description }}</h4>
            <div style="text-align: center">
                <h5 class="red"
                    style="display:inline-block ;text-align: center;margin-bottom: 0 ;margin-top: 0 ; background-color: #198754; padding: 5px ; border-radius: 8px ; color: #FFFFFF">
                    تاريخ البدء : <span>{{$service->begin}}</span></h5>
                <h5 class="red"
                    style="display:inline-block ;text-align: center;margin-bottom: 0 ;margin-top: 0 ; background-color: #dc3545; padding: 5px ; border-radius: 8px ; color: #FFFFFF">
                    تاريخ الإنتهاء : <span>{{$service->end}}</span></h5>
            </div>
            <h5 style="text-align: center ; margin-right: 10px ;margin-bottom: 0 ;margin-top: 20px"><a
                    href="{{route('services.show',$service->token)}}" class="green"
                    style="text-decoration: none ; background-color: #28a745; color: #FFFFFF ; padding: 5px ; border-radius: 8px">الذهاب
                    للخدمة</a></h5>
        </div>
    </div>
</div>
