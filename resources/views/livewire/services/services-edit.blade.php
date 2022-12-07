<div class="d-inline">
    @if(auth()->check() and auth()->user()->can('services edit services'))
        <a class="btn btn-primary btn-sm rounded-circle" data-bs-toggle="modal" data-bs-target="#EditModalService{{$service['id']}}" title="{{ __('Edit') }}" wire:click="ServiceEditOpenModal">
            <i class="fa fa-edit"></i>
        </a>

        <div wire:ignore.self class="modal fade " id="EditModalService{{$service['id']}}"  role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content text-center bg-sub">
                    <div class="modal-header text-center bg-sub border-secondary">
                        <h5 class="modal-title text-center" id="exampleModalLongTitle">{{ __('Services') }}</h5>
                        <button type="button" class="close btn" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="text-ddd">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="mt-2 text-end" method="post" wire:submit.prevent="update">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="form-group col-md-6 my-2">
                                    <label class="control-label my-2">{{ __('Name Ar') }}</label>
                                    <input wire:model.defer="service.name" name="name" class="form-control-2 pe-4e rounded-3 @error('service.name') is-invalid @enderror" type="text">
                                    @error('service.name')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <!-- <div class="form-group col-md-6 my-2">
                                    <label class="control-label my-2">{{ __('Name En') }}</label>
                                    <input wire:model.defer="service.name_en" name="name_en" class="form-control-2 pe-4e rounded-3 @error('service.name_en') is-invalid @enderror" type="text">
                                    @error('service.name_en')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div> -->
                                <div class="form-group col-md-6 my-2">
                                    <label class="control-label my-2">{{ __('Short description Ar') }}</label>
                                    <textarea wire:model.defer="service.short_description" name="short_description" class="form-control-2 pe-4e rounded-3 @error('service.short_description') is-invalid @enderror" type="text"></textarea>
                                    @error('service.short_description')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <!-- <div class="form-group col-md-6 my-2">
                                    <label class="control-label my-2">{{ __('Short description En') }}</label>
                                    <textarea wire:model.defer="service.short_description_en" name="short_description_en" class="form-control-2 pe-4e rounded-3 @error('service.short_description_en') is-invalid @enderror" type="text"></textarea>
                                    @error('service.short_description_en')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div> -->
                                <div class="form-group col-md-6 my-2" wire:ignore>
                                    <label class="control-label my-2" for="">{{ __('Full description Ar') }}</label>
                                    <textarea wire:model.defer="service.full_description" id="full_description-{{$service['id']}}" data-full_description-{{$service['id']}}="@this" class="form-control-2 pe-4e rounded-3 @error('service.full_description') is-invalid @enderror"></textarea>
                                </div>
                                @error('service.full_description')
                                <span class="text-danger"><strong>{{ $message }}</strong></span>
                                @enderror
                                <script>
                                    $(document).ready(function () {
                                        if (CKEDITOR.instances['full_description-{{$service['id']}}']) {
                                            CKEDITOR.remove(CKEDITOR.instances['full_description-{{$service['id']}}']);
                                        }

                                        CKEDITOR.replace(document.querySelector('#full_description-{{$service['id']}}'), {
                                            // language: 'ar',
                                        });

                                        CKEDITOR.instances['full_description-{{$service['id']}}'].on('change', function (event) {
                                        @this.set('service.full_description', event.editor.getData());
                                            CKEDITOR.remove(CKEDITOR.instances['full_description-{{$service['id']}}']);
                                        });
                                        CKEDITOR.addCss( '.cke_editable { background-color: #151a30;color:#DDD } @media screen and (max-device-width: 767px) and (-webkit-min-device-pixel-ratio:0) { .cke_editable { font-size: 16px !important; } }' );
                                    });
                                </script>



                                <!-- <div class="form-group col-md-6 my-2" wire:ignore>
                                    <label class="control-label my-2" for="">{{ __('Full description En') }}</label>
                                    <textarea wire:model.defer="service.full_description_en" id="full_description_en-{{$service['id']}}" data-full_description_en-{{$service['id']}}="@this" class="form-control-2 pe-4e rounded-3 @error('service.full_description_en') is-invalid @enderror"></textarea>
                                </div>
                                @error('service.full_description_en')
                                <span class="text-danger"><strong>{{ $message }}</strong></span>
                                @enderror
                                <script>
                                    $(document).ready(function () {
                                        if (CKEDITOR.instances['full_description_en-{{$service['id']}}']) {
                                            CKEDITOR.remove(CKEDITOR.instances['full_description_en-{{$service['id']}}']);
                                        }

                                        CKEDITOR.replace(document.querySelector('#full_description_en-{{$service['id']}}'), {
                                            // language: 'ar',
                                        });

                                        CKEDITOR.instances['full_description_en-{{$service['id']}}'].on('change', function (event) {
                                        @this.set('service.full_description_en', event.editor.getData());
                                            CKEDITOR.remove(CKEDITOR.instances['full_description_en-{{$service['id']}}']);
                                        });
                                        CKEDITOR.addCss( '.cke_editable { background-color: #151a30;color:#DDD } @media screen and (max-device-width: 767px) and (-webkit-min-device-pixel-ratio:0) { .cke_editable { font-size: 16px !important; } }' );
                                    });
                                </script> -->
                                <div class="form-group col-md-6 my-2">
                                    <label class="control-label my-2">{{ __('Begin') }}</label>
                                    <input wire:model.defer="service.begin" class="form-control-2 pe-4e rounded-3 @error('service.begin') is-invalid @enderror" type="date">
                                    @error('service.begin')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 my-2">
                                    <label class="control-label my-2">{{ __('End') }}</label>
                                    <input wire:model.defer="service.end" class="form-control-2 pe-4e rounded-3 @error('service.end') is-invalid @enderror" type="date">
                                    @error('service.end')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 my-2">
                                    <label class="control-label my-2">{{ __('Status') }}</label>
                                    <select wire:model.defer="service.status" class="form-control-2 pe-4e rounded-3 @error('service.status') is-invalid @enderror">
                                        <option value="">{{ __('Select Status') }} ...</option>
                                        @foreach(\App\Models\Service::statusList(false) as $key => $value)
                                            <option value="{{$key}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                    @error('service.status')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 my-2">
                                    <label for="">{{ __('Role') }}</label>
                                    <select class="js-states form-control-2 pe-4e rounded-3 SelectEditService{{$service['id']}} @error('service.role_id') is-invalid @enderror" multiple wire:model.defer="service.role_id" name="role_id">
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                    <script>
                                        $(".SelectEditService{{ $service['id'] }}").on('change', function (e) {
                                            let data = $(this).val();
                                        @this.set('service.role_id', data);
                                        });
                                        window.addEventListener('SelectEditService-{{ $service['id'] }}', event => {
                                            $(".SelectEditService{{ $service['id'] }}").select2();
                                        })
                                    </script>
                                </div>      
                                @error('service.role_id')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror

                                <div class="form-group col-md-6 my-2">
                                    <label for="" class="mb-2">تابع الي</label>
                                    <select class="js-states form-select pe-4e rounded-3 @error('service.category_id') is-invalid @enderror multipleProjectCreateCate"  wire:model.defer="service.category_id" name="category_id">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    <script>
                                        window.addEventListener('updateSelect2', event => {
                                            $(".multipleProjectCreateCate").select2({
                                                backgroundColor:"#222b45"
                                            });
                                        })
                                        $('.multipleProjectCreateCate').on('change', function (e) {
                                            let data = $(this).val();
                                        @this.set('service.category_id', data);
                                        });
                                    </script>
                                    @error('service.category_id')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="col-md-12 mt-4" >
                                    <div class="form-group col-md-6 mx-auto">
                                        <div class="d-table p-1 m-auto uniform-uploader">
                                            <input type="file" wire:model.defer="service.path" class="form-input-styled form-control-2 pe-4e rounded-3 submit @error('service.path') is-invalid @enderror" data-bs-fouc="">
                                            @error('service.path')
                                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div wire:loading>
                                        <i class="fas fa-sync fa-spin"></i>
                                        {{ __('Loading please wait') }} ...
                                    </div>
                                </div>
                                <div class="mt-2 text-center">
                                    <button wire:loading.attr="disabled" class="btn btn-primary" type="submit">{{ __('Edit') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
