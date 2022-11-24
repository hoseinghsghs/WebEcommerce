<!-- footer------------------------------------------->
<footer class="footer-main-site">
    @if($services->count()>0)
    <section class="d-block d-xl-block d-lg-block d-md-block d-sm-block order-1">
        <div class="footer-shopping-features">
            <div class="container-fluid">
                <div class="col-12">
                    @foreach ($services as $service)
                    <div class="item">
                        <span class="icon-shopping">
                            <i class="{{$service->icon}}"></i>
                        </span>
                        <span class="title-shopping">{{$service->title}}</span>
                        <span class="desc-shopping">{{$service->description}}</span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @endif
    <section class="d-block d-xl-block d-lg-block d-md-block d-sm-block order-1">
        <div class="container-fluid">
            <div class="col-12">
                <div class="footer-middlebar">
                    @if($setting->site_name || $setting->description)
                    <div class="col-lg-8 pr">
                        <div class="footer-content d-block">
                            <div class="text pr-1">
                                @isset($setting->site_name)
                                <h2 class="title">فروشگاه اینترنتی {{$setting->site_name}}</h2>
                                @endisset
                                @isset($setting->description)
                                <p class="desc">{{$setting->description}}</p>
                                @endisset
                            </div>
                        </div>
                    </div>
                    @endif
                    @if($setting->instagram || $setting->whatsapp || $setting->telegram)
                    <div class="col-lg-4 d-block pl mt-lg-0 mt-3">
                        <div class="shortcode-widget-area">
                            <form action="#" class="form-newsletter">
                                <fieldset>
                                    <span class="form-newsletter-title"> با عضویت در کانال‌های ما، از آخرین اخبار و
                                        محصولات سایت مطلع شوید...</span>
                                    <div class="social-container">
                                        <ul class="social-icons">
                                            @isset($setting->instagram)
                                            <li><a href="{{$setting->instagram}}"><i class="fa fa-instagram"></i></a>
                                            </li>
                                            @endisset
                                            @isset($setting->whatsapp)
                                            <li><a href="{{$setting->whatsapp}}"><i class="fa fa-whatsapp"></i></a>
                                            </li>
                                            @endisset
                                            @isset($setting->telegram)
                                            <li><a href="{{$setting->telegram}}"><i class="fa fa-telegram"></i></a>
                                            </li>
                                            @endisset
                                        </ul>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                    @endif
                    <div class="footer-more-info">
                        @if (!empty(json_decode($setting->links,true)))
                        <div class="col-lg-10 col-md-9 d-block pr">
                            <div class="footer-links">
                                @foreach (json_decode($setting->links,true) as $pLink )
                                <div class="col-lg-3 col-md-3 col-xs-12 pr">
                                    <div class="row">
                                        <section class="footer-links-col">
                                            <div class="headline-links">
                                                <a href="#">
                                                    {{$pLink['name']}}
                                                </a>
                                            </div>
                                            @isset ($pLink['children'])
                                            <ul class="footer-menu-ul">
                                                @foreach ($pLink['children'] as $link)
                                                <li class="menu-item-type-custom">
                                                    <a href="{{$link['url']}}">
                                                        {{$link['title']}}
                                                    </a>
                                                </li>
                                                @endforeach
                                            </ul>
                                            @endisset
                                        </section>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                        <div class="col-lg-2 col-md-3 pl">
                            <div class="footer-safety-partner">
                                <div class="widget widget-product card mb-0">
                                    <div class="product-carousel-symbol owl-carousel owl-theme owl-rtl owl-loaded owl-drag">
                                        <div class="owl-stage-outer">
                                            <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 2234px;">
                                                <div class="owl-item active" style="width: 200.75px; margin-left: 10px;">
                                                    <div class="item">
                                                        <a href="#" class="d-block hover-img-link">
                                                            <img referrerpolicy='origin' id='rgvjnbqeesgtesgtjxlzwlao' style='cursor:pointer' onclick='window.open("https://logo.samandehi.ir/Verify.aspx?id=320014&p=xlaouiwkobpdobpdrfthaods", "Popup","toolbar=no, scrollbars=no, location=no, statusbar=no, menubar=no, resizable=0, width=450, height=630, top=30")' alt='logo-samandehi' src='https://logo.samandehi.ir/logo.aspx?id=320014&p=qftiodrflymalymanbpdshwl' />
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="owl-item active" style="width: 200.75px; margin-left: 10px;">
                                                    <div class="item">
                                                        <a referrerpolicy="origin" target="_blank" href="https://trustseal.enamad.ir/?id=306946&amp;Code=zXLWtyHj1hfgbjnHBLOv"><img referrerpolicy="origin" src="https://Trustseal.eNamad.ir/logo.aspx?id=306946&amp;Code=zXLWtyHj1hfgbjnHBLOv" alt="" style="cursor:pointer" id="zXLWtyHj1hfgbjnHBLOv"></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="footer-copyright">
                            <div class="footer-copyright-text">
                                <p>تمامی حقوق متعلق به سایت فروشگاهی {{$setting->site_name}} می باشد.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</footer>
<!-- footer---------------------------------->
