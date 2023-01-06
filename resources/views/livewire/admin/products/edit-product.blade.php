@section('title','ویرایش محصول')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>ویرایش محصول</h2>
                    </br>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href={{route('admin.home')}}><i class="zmdi zmdi-home"></i>
                                خانه</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.products.index')}}">محصولات</a></li>
                        <li class="breadcrumb-item active">ویرایش محصول</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i
                            class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i
                            class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <form wire:submit.prevent="edit">
                                <div class="header p-0">
                                    <h2><strong>اطلاعات اصلی محصول</strong></h2>
                                </div>
                                <hr>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <label> نام محصول <abbr class="text-danger" title="ضروری">*</abbr> </label>
                                        <div class="form-group">
                                            <input type="text" wire:model.defer="name" required
                                                   class="form-control @error('name') is-invalid @enderror"/>
                                            @error('name')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 col-sm-6 @error('position') is-invalid @enderror">
                                        <label for="positionSelect">محل قرار گیری</label>
                                        <div wire:ignore>
                                            <select id="positionSelect" data-placeholder="انتخاب محل"
                                                    class="form-control ms select2">
                                                <option {{$position == 'پیش فرض' ? 'selected' : ''}}>پیش فرض</option>
                                                <option {{$position == 'فروش ویژه' ? 'selected' : ''}}>فروش
                                                    ویژه
                                                </option>
                                                <option {{$position == 'پیشنهاد ما' ? 'selected' : ''}}>پیشنهاد
                                                    ما
                                                </option>
                                                <option {{$position == 'تک محصول' ? 'selected' : ''}}>تک محصول
                                                </option>
                                            </select>
                                        </div>
                                        @error('position')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3 col-auto">
                                        <label for="is_active">وضعیت</label>
                                        <div class="switchToggle">
                                            <input type="checkbox" id="switch" wire:model="status">
                                            <label for="switch">Toggle</label>
                                        </div>
                                        @error('is_active')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3 col-sm-6 @error('brand_id') is-invalid @enderror">
                                        <label for="brandSelect">برند</label>
                                        <div wire:ignore>
                                            <select id="brandSelect" name="brand_id" data-placeholder="انتخاب برند"
                                                    class="form-control ms search-select">
                                                <option></option>
                                                @if ($brands->count()>0)
                                                    @foreach ($brands as $brand)
                                                        <option
                                                            value="{{ $brand->id }}" {{$brand_id && $brand->id == $brand_id ? 'selected' : ''}}>
                                                            {{ $brand->name }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        @error('brand_id')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-9 @error('tag_ids.*') is-invalid @enderror">
                                        <label for="tagSelect">تگ ها</label>
                                        <div wire:ignore>
                                            <select id="tagSelect" data-placeholder="انتخاب تگ"
                                                    data-close-on-select="false" class="form-control ms select2"
                                                    multiple>
                                                @foreach ($tags as $tag)
                                                    <option
                                                        value="{{ $tag->id }}" {{ in_array($tag->id, $tags_id) ? 'selected' : '' }}>
                                                        {{ $tag->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('tag_ids.*')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="form-group col-md-12 @error('description') is-invalid @enderror">
                                        <label for="summernote"> توضیحات <abbr class="text-danger"
                                                                               title="ضروری">*</abbr>
                                        </label>
                                        <div wire:ignore>
                                            <textarea class="form-control summernote-editor" id="summernote" rows="6"
                                                      required>{!! $description !!}</textarea>
                                        </div>
                                        @error('description')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="header p-0 mt-3">
                                    <h2><strong>ویژگی ها </strong></h2>
                                </div>
                                <hr>
                                <!-- ویژگی های ثابت -->
                                <div class="row clearfix">
                                    @foreach ($attribute_values as $key => $value)
                                        <div class="form-group col-sm-3">
                                            <label for="attribute-{{$key}}"> {{ $value['attribute_name'] }} <abbr
                                                    class="text-danger"
                                                    title="ضروری">*</abbr> </label>
                                            <input
                                                @class(["form-control","is-invalid"=>$errors->has("attribute_values.$key.value")]) type="text"
                                                required
                                                id="attribute-{{$key}}"
                                                wire:model.defer="attribute_values.{{$key}}.value"
                                            >
                                            @error("attribute_values.$key.value")
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    @endforeach
                                </div>
                                <!-- ویژگی های ثابت -->
                                <!-- ویژگی های متغییر -->
                                @foreach ($variations as $id => $variation)
                                    <div class="col-md-12">
                                        <div class="d-flex">
                                            <p class="mb-0 mr-3">
                                                <button class="btn btn-sm btn-primary" type="button"
                                                        aria-expanded="false"
                                                        data-toggle="collapse"
                                                        data-target="#collapse-{{ $id }}">
                                                    قیمت و موجودی برای متغیر ( {{ $variation['variation_name'] }} )
                                                </button>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div @class(["mt-2 rounded bg-light","collapse"]) id="collapse-{{ $id }}"
                                             wire:ignore.self>
                                            <div class="card card-body">
                                                <div class="row">
                                                    <div class="form-group col-md-3 col-sm-4">
                                                        <label for="variation_values-{{ $id }}"> عنوان <abbr
                                                                class="text-danger"
                                                                title="ضروری">*</abbr></label>
                                                        <input type="text"
                                                               @class(["form-control","is-invalid"=>$errors->has("variations.$id.name")])
                                                               id="variation_values-{{ $id }}"
                                                               wire:model.defer="variations.{{$id}}.name">
                                                        @error("variations.$id.name")
                                                        <div class="invalid-feedback">{{$message}}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-md-3 col-sm-4">
                                                        <label> قیمت <abbr class="text-danger"
                                                                           title="ضروری">*</abbr></label>
                                                        <input dir="ltr" type="number"
                                                               @class(["form-control without-spin","is-invalid"=>$errors->has("variations.$id.price")])
                                                               wire:model="variations.{{$id}}.price" required>
                                                        @if(key_exists('price',$variation) && $variation['price'])
                                                            <span
                                                                class="pt-1">{{number_format($variation['price'])}} تومان </span>
                                                        @endif
                                                        @error("variations.$id.price")
                                                        <div class="invalid-feedback">{{$message}}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-md-3 col-sm-4">
                                                        <label> تعداد <abbr class="text-danger" title="ضروری">*</abbr>
                                                        </label>
                                                        <input dir="ltr"
                                                               @class(["form-control without-spin","is-invalid"=>$errors->has("variations.$id.quantity")])
                                                               wire:model.defer="variations.{{$id}}.quantity"
                                                               type="number" required>
                                                    </div>
                                                    <div class="form-group col-md-3 col-sm-4">
                                                        <label>شناسه انبار</label>
                                                        <input dir="ltr" type="text"
                                                               @class(["form-control","is-invalid"=>$errors->has("variations.$id.sku")])
                                                               wire:model="variations.{{$id}}.sku">
                                                        @error("variations.$id.sku")
                                                        <div class="invalid-feedback">{{$message}}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-md-6 col-sm-4">
                                                        <label> گارانتی </label>
                                                        <input type="text"
                                                               @class(["form-control","is-invalid"=>$errors->has("variations.$id.guarantee")])
                                                               wire:model.defer="variations.{{$id}}.guarantee">
                                                        @error("variations.$id.guarantee")
                                                        <div class="invalid-feedback">{{$message}}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-md-6 col-sm-4">
                                                        <label> مدت گارانتی </label>
                                                        <input type="text"
                                                               @class(["form-control","is-invalid"=>$errors->has("variations.$id.time_guarantee")])
                                                               wire:model.defer="variations.{{$id}}.time_guarantee">
                                                        @error("variations.$id.time_guarantee")
                                                        <div class="invalid-feedback">{{$message}}</div>
                                                        @enderror
                                                    </div>
                                                    {{-- Sale Section --}}
                                                    <div class="col-md-12">
                                                        <p> حراج : </p>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label> قیمت حراجی </label>
                                                        <input type="number" dir="ltr"
                                                               @class(["form-control without-spin","is-invalid"=>$errors->has("variations.$id.sale_price")])
                                                               wire:model="variations.{{$id}}.sale_price">
                                                        @if($variation['sale_price'])
                                                            <span
                                                                class="pt-1">{{number_format($variation['sale_price'])}} تومان </span>
                                                        @endif
                                                        @error("variations.$id.sale_price")
                                                        <div class="invalid-feedback">{{$message}}</div>
                                                        @enderror
                                                    </div>
                                                    <div @class(["form-group col-md-4 ","is-invalid"=>$errors->has("variations.$id.date_on_sale_from")])>
                                                        <label> تاریخ شروع حراجی </label>
                                                        <div class="input-group" wire:ignore>
                                                            <div class="input-group-prepend"
                                                                 onclick="$('{{ '#variationInputDateOnSaleFrom-'.$id }}').focus();">
                                                            <span class="input-group-text" id="basic-addon1"><i
                                                                    class="zmdi zmdi-calendar-alt"></i></span>
                                                            </div>
                                                            <input type="hidden"
                                                                   id="variationInputDateOnSaleFrom-alt-{{ $id }}"
                                                                   name="variation_values[{{ $id }}][date_on_sale_from]">
                                                            <input type="text" class="form-control"
                                                                   id="variationInputDateOnSaleFrom-{{ $id }}"
                                                                   value="{{ $variation['date_on_sale_from'] ?? null }}"
                                                                   autocomplete="off">
                                                            <div class="input-group-append">
                                                            <span class="input-group-text" id="basic-addon1"
                                                                  style="cursor: pointer;"
                                                                  onclick="destroyDatePicker({{$id}},'from')"><i
                                                                    class="zmdi zmdi-close"></i></span>
                                                            </div>
                                                        </div>
                                                        @error("variations.$id.date_on_sale_from")
                                                        <small class="text-danger">{{$message}}</small>
                                                        @enderror
                                                    </div>
                                                    <div @class(["form-group col-md-4 ","is-invalid"=>$errors->has("variations.$id.date_on_sale_to")])>
                                                        <label> تاریخ پایان حراجی </label>
                                                        <div class="input-group" wire:ignore>
                                                            <div class="input-group-prepend"
                                                                 onclick="$('{{ '#variationInputDateOnSaleTo-'.$id }}').focus();">
                                                            <span class="input-group-text" id="basic-addon1"><i
                                                                    class="zmdi zmdi-calendar"></i></span>
                                                            </div>
                                                            <input type="hidden"
                                                                   id="variationInputDateOnSaleTo-alt-{{ $id }}"
                                                                   name="variation_values[{{ $id }}][date_on_sale_to]">
                                                            <input type="text" class="form-control"
                                                                   id="variationInputDateOnSaleTo-{{ $id }}"
                                                                   value="{{ $variation['date_on_sale_to'] ?? null }}"
                                                                   autocomplete="off">
                                                            <div class="input-group-append">
                                                            <span class="input-group-text" id="basic-addon1"
                                                                  style="cursor: pointer;"
                                                                  onclick="destroyDatePicker({{$id}},'to')"><i
                                                                    class="zmdi zmdi-close"></i></span>
                                                            </div>
                                                        </div>
                                                        @error("variations.$id.date_on_sale_to")
                                                        <small class="text-danger">{{$message}}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <!-- هزینه ارسال -->
                                <div class="header p-0 mt-3">
                                    <h2><strong>هزینه ارسال</strong></h2>
                                </div>
                                <hr>
                                <div class="row clearfix">
                                    <div class="col-sm-6 form-group">
                                        <label for="delivery_amount"> هزینه ارسال <abbr class="text-danger"
                                                                                        title="ضروری">*</abbr></label>
                                        <input
                                            class="form-control without-spin @error('delivery_amount') is-invalid @enderror"
                                            id="delivery_amount" wire:model="delivery_amount" type="number" dir="ltr">
                                        @if($delivery_amount)
                                            <span class="pt-1">{{number_format($delivery_amount)}} تومان </span>
                                        @endif
                                        @error('delivery_amount')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label for="delivery_amount_per_product"> هزینه ارسال به ازای محصول اضافی <abbr
                                                class="text-danger"
                                                title="ضروری">*</abbr></label>
                                        <input class="form-control without-spin" dir="ltr"
                                               id="delivery_amount_per_product" required type="number"
                                               wire:model="delivery_amount_per_product">
                                        @if($delivery_amount_per_product)
                                            <span
                                                class="pt-1">{{number_format($delivery_amount_per_product)}} تومان </span>
                                        @endif
                                        @error('delivery_amount_per_product')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-raised btn-success waves-effect" type="submit"
                                            wire:loading.attr="disabled"><i wire:loading
                                                                            class='zmdi zmdi-hc-fw zmdi-hc-spin'></i>
                                        ویرایش
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (session()->has('message'))
        @if(session('message')['toast']===true)
            <script>
                Swal.fire({
                    icon: "{{session('message')['type']}}",
                    title: "{{session('message')['title']}}",
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 4000,
                    timerProgressBar: true,
                })
            </script>
        @else
            <script>
                Swal.fire({
                    title: "{{session('message')['title']}}",
                    text: "{{session('message')['text']}}",
                    icon: "{{session('message')['type']}}",
                    confirmButtonText: 'تایید'
                })
            </script>
        @endif
    @endif
</section>
@push('styles')
    <!-- تاریخ -->
    <link rel="stylesheet" type="text/css"
          href="https://unpkg.com/persian-datepicker@1.2.0/dist/css/persian-datepicker.min.css"/>
    <!-- تاریخ پایان-->
@endpush

@push('scripts')
    <script src="https://unpkg.com/persian-date@1.1.0/dist/persian-date.min.js"></script>
    <script src="https://unpkg.com/persian-datepicker@1.2.0/dist/js/persian-datepicker.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#positionSelect').on('change', function (e) {
                let data = $('#positionSelect').select2("val");
                @this.
                set('position', data);
            });
            $('#brandSelect').on('change', function (e) {
                let data = $('#brandSelect').select2("val");
                console.log(data);
                if (data === '') {
                    @this.
                    set('brand_id', null);
                } else {
                    @this.
                    set('brand_id', data);
                }
            });
            $('#tagSelect').on('change', function (e) {
                let data = $('#tagSelect').select2("val");
                @this.
                set('tags_id', data);
            });
            $('#summernote').on('summernote.change', function (we, contents, $editable) {
                @this.
                set('description', contents);
            });
        });
        let variations = @json($variations);
        let dateTimePicker = {};
        Object.keys(variations).forEach(index => {
            dateTimePicker[index] = {from: null, to: null}
            dateTimePicker[index].from = $(`#variationInputDateOnSaleFrom-${index}`).pDatepicker({
                initialValue: variations[index]['date_on_sale_from'] ? true : false,
                initialValueType: 'gregorian',
                format: 'LLLL',
                altField: `#variationInputDateOnSaleFrom-alt-${index}`,
                altFormat: 'g',
                minDate: "new persianDate().unix()",
                timePicker: {
                    enabled: true,
                    second: {
                        enabled: false
                    },
                },
                altFieldFormatter: function (unixDate) {
                    var self = this;
                    var thisAltFormat = self.altFormat.toLowerCase();
                    if (thisAltFormat === 'gregorian' || thisAltFormat === 'g') {
                        persianDate.toLocale('en');
                        var p = new persianDate(unixDate).toCalendar('gregorian').format(
                            'YYYY-MM-DD HH:mm:ss');
                        return p;
                    }
                    if (thisAltFormat === 'unix' || thisAltFormat === 'u') {
                        return unixDate;
                    } else {
                        var pd = new persianDate(unixDate);
                        pd.formatPersian = this.persianDigit;
                        return pd.format(self.altFormat);
                    }
                },
                onSelect: function (unix) {
                    dateTimePicker[index].from.touched = true;
                    if (dateTimePicker[index].to && dateTimePicker[index].to.options && dateTimePicker[index].to.options.minDate != unix) {
                        var cachedValue = dateTimePicker[index].to.getState().selected.unixDate;
                        dateTimePicker[index].to.options = {minDate: unix};
                        if (dateTimePicker[index].to.touched) {
                            dateTimePicker[index].to.setDate(cachedValue);
                        }
                    }
                    @this.
                    set(`variations.${index}.date_on_sale_from`, $(`#variationInputDateOnSaleFrom-alt-${index}`).val(), true);
                },
            });

            dateTimePicker[index].to = $(`#variationInputDateOnSaleTo-${index}`).pDatepicker({
                initialValue: variations[index]['date_on_sale_from'] ? true : false,
                initialValueType: 'gregorian',
                format: 'LLLL',
                altField: `#variationInputDateOnSaleTo-alt-${index}`,
                altFormat: 'g',
                minDate: "new persianDate().unix()",
                timePicker: {
                    enabled: true,
                    second: {
                        enabled: false
                    },
                },
                altFieldFormatter: function (unixDate) {
                    var self = this;
                    var thisAltFormat = self.altFormat.toLowerCase();
                    if (thisAltFormat === 'gregorian' || thisAltFormat === 'g') {
                        persianDate.toLocale('en');
                        var p = new persianDate(unixDate).toCalendar('gregorian').format(
                            'YYYY-MM-DD HH:mm:ss');
                        return p;
                    }
                    if (thisAltFormat === 'unix' || thisAltFormat === 'u') {
                        return unixDate;
                    } else {
                        var pd = new persianDate(unixDate);
                        pd.formatPersian = this.persianDigit;
                        return pd.format(self.altFormat);
                    }
                },
                onSelect: function (unix) {
                    dateTimePicker[index].to.touched = true;
                    if (dateTimePicker[index].from && dateTimePicker[index].from.options && dateTimePicker[index].from.options.maxDate != unix) {
                        var cachedValue = dateTimePicker[index].from.getState().selected.unixDate;
                        dateTimePicker[index].from.options = {maxDate: unix};
                        if (dateTimePicker[index].from.touched) {
                            dateTimePicker[index].from.setDate(cachedValue);
                        }
                    }
                    @this.
                    set(`variations.${index}.date_on_sale_to`, $(`#variationInputDateOnSaleTo-alt-${index}`).val(), true);
                }
            });
        });

        function destroyDatePicker(index, type) {
            if (type === 'from') {
                $(`#variationInputDateOnSaleFrom-${index}`).val(null);
                $(`#variationInputDateOnSaleFrom-alt-${index}`).val(null);
                dateTimePicker[index].from.touched = false;
                dateTimePicker[index].to.options = {minDate: "new persianDate().unix()", initialValue: false}
                @this.set(`variations.${index}.date_on_sale_from`, null, true);
            } else {
                $(`#variationInputDateOnSaleTo-${index}`).val(null);
                $(`#variationInputDateOnSaleTo-alt-${index}`).val(null);
                dateTimePicker[index].to.touched = false;
                dateTimePicker[index].from.options = {maxDate: null, initialValue: false}
                @this.set(`variations.${index}.date_on_sale_to`, null, true);
            }
            console.log(dateTimePicker);
        }

        // format prices
        /*function show_price(price, res) {
            NUmber1 = price
            NUmber1 += '';
            NUmber1 = NUmber1.replace(',', '');
            NUmber1 = NUmber1.replace(',', '');
            NUmber1 = NUmber1.replace(',', '');
            NUmber1 = NUmber1.replace(',', '');
            NUmber1 = NUmber1.replace(',', '');
            NUmber1 = NUmber1.replace(',', '');
            x = NUmber1.split('.');
            y = x[0];
            z = x.length > 1 ? '.' + x[1] : '';
            var rgx = /(\d+)(\d{3})/;
            while (rgx.test(y))
                y = y.replace(rgx, '$1' + ',' + '$2');
            output = y + z;
            if (output != "") {
                document.getElementById(res).innerHTML = output + 'تومان';
            } else {

                document.getElementById(res).innerHTML = '';
            }
        }

        $('#delivery_amount').on('keyup keypress focus change', function (e) {
            show_price($(this).val(), "delivery_1");
        });

        $('#delivery_amount_per_product').on('keyup keypress focus change', function (e) {
            show_price($(this).val(), "delivery_2");
        });*/
    </script>
@endpush
