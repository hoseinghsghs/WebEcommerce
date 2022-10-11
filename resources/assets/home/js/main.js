$(document).ready(function (e) {
    //    hover-menu-overlay--------------------------

    //    resposive-megamenu-mobile------------------
    $(".dropdown-toggle").on("click", function (e) {
        e.stopPropagation();
        e.preventDefault();

        var self = $(this);
        if (self.is(".disabled, :disabled")) {
            return false;
        }
        self.parent().toggleClass("open");
    });

    $(document).on("click", function (e) {
        if ($(".dropdown").hasClass("open")) {
            $(".dropdown").removeClass("open");
        }
    });

    $(".nav-btn.nav-slider").on("click", function () {
        $(".overlay").show();
        $("nav").toggleClass("open");
    });

    $(".overlay").on("click", function () {
        if ($("nav").hasClass("open")) {
            $("nav").removeClass("open");
        }
        $(this).hide();
    });

    $("li.active").addClass("open").children("ul").show();
    $("li.has-sub > a").on("click", function () {
        $(this).removeAttr("href");
        var e = $(this).parent("li");
        if (e.hasClass("open")) {
            e.removeClass("open");
            e.find("li").removeClass("opne");
            e.find("ul").slideUp(200);
        } else {
            e.addClass("open");
            e.children("ul").slideDown(200);
            e.siblings("li").children("ul").slideUp(200);
            e.siblings("li").removeClass("open");
            e.siblings("li").find("li").removeClass("open");
            e.siblings("li").find("ul").slideUp(200);
        }
    });
    //    resposive-megamenu-mobile------------------

    // searchResult--------------------------------------
    $(".header-search .header-search-box .form-search .header-search-input").on(
        "click",
        function () {
            $(this)
                .parents(".header-search")
                .addClass("show-result")
                .find(".search-result")
                .fadeIn();
            $(".overlay-search-box").css({
                opacity: "1",
                visibility: "visible",
            });
        }
    );
    $(document).click(function (e) {
        if ($(e.target).is(".header-search *")) return;
        $(".search-result").hide();
        $(".overlay-search-box").css({ opacity: "0", visibility: "hidden" });
    });
    // searchResult--------------------------------------

    // slider-product------------------------
    $(".product-carousel").owlCarousel({
        rtl: true,
        margin: 10,
        nav: true,
        navText: ["&#10094", "&#10095"],
        dots: false,
        responsiveClass: true,
        responsive: {
            0: {
                items: 2,
                slideBy: 2,
            },
            576: {
                items: 1,
                slideBy: 1,
            },
            768: {
                items: 3,
                slideBy: 2,
            },
            992: {
                items: 5,
                slideBy: 2,
            },
            1400: {
                items: 5,
                slideBy: 3,
            },
        },
    });
    // slider-product------------------------پیشنهاد ویژه

    // brand---------------------------------------
    $(".product-carousel-brand").owlCarousel({
        items: 4,
        rtl: true,
        margin: 10,
        nav: true,
        navText: ["&#10094", "&#10095"],
        dots: false,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                slideBy: 1,
            },
            576: {
                items: 1,
                slideBy: 1,
            },
            768: {
                items: 3,
                slideBy: 2,
            },
            992: {
                items: 5,
                slideBy: 2,
            },
            1400: {
                items: 5,
                slideBy: 3,
            },
        },
    });
    // brand---------------------------------------

    // Symbol--------------------------------------
    $(".product-carousel-symbol").owlCarousel({
        rtl: true,
        items: 2,
        loop: true,
        margin: 10,
        dots: false,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                slideBy: 1,
                autoplay: true,
            },
            576: {
                items: 1,
                slideBy: 1,
                autoplay: true,
            },
            768: {
                items: 1,
                slideBy: 1,
                autoplay: true,
            },
            992: {
                items: 1,
                slideBy: 1,
                autoplay: true,
            },
            1400: {
                items: 1,
                slideBy: 1,
                autoplay: true,
            },
        },
    });
    // Symbol--------------------------------------

    $("#suggestion-slider").owlCarousel({
        rtl: true,
        items: 1,
        autoplay: true,
        autoplayTimeout: 5000,
        loop: true,
        dots: false,
        onInitialized: startProgressBar,
        onTranslate: resetProgressBar,
        onTranslated: startProgressBar,
    });

    function startProgressBar() {
        $(".slide-progress").css({
            width: "100%",
            transition: "width 5000ms",
        });
    }

    function resetProgressBar() {
        $(".slide-progress").css({
            width: 0,
            transition: "width 0s",
        });
    }

    // product-more
    $(".product-carousel-more").owlCarousel({
        rtl: true,
        autoplay: true,
        autoplayTimeout: 5000,
        margin: 10,
        nav: true,
        navText: [
            '<i class="fa fa-angle-right"></i>',
            '<i class="fa fa-angle-left"></i>',
        ],
        dots: true,
        loop: true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                slideBy: 1,
            },
            576: {
                items: 1,
                slideBy: 1,
            },
            768: {
                items: 1,
                slideBy: 2,
            },
            992: {
                items: 1,
                slideBy: 2,
            },
            1400: {
                items: 1,
                slideBy: 3,
            },
        },
    });

    // advantages-----------------------------
    var inputs = $("#advantage-input, #disadvantage-input");
    var inputChangeCallback = function () {
        var self = $(this);
        if (self.val().trim().length > 0) {
            self.siblings(".js-icon-form-add").show();
        } else {
            self.siblings(".js-icon-form-add").hide();
        }
    };
    inputs.each(function () {
        inputChangeCallback.bind(this)();
        $(this).on("change keyup", inputChangeCallback.bind(this));
    });
    $("#advantages")
        .delegate(".js-icon-form-add", "click", function (e) {
            var parent = $(".js-advantages-list");
            if (parent.find(".js-advantage-item").length >= 5) {
                return;
            }

            var advantageInput = $("#advantage-input");

            if (advantageInput.val().trim().length > 0) {
                parent.append(
                    '<div class="ui-dynamic-label ui-dynamic-label--positive js-advantage-item">\n' +
                        advantageInput.val() +
                        '<button type="button" class="ui-dynamic-label-remove js-icon-form-remove"></button>\n' +
                        '<input type="hidden" name="comment[advantages][]" value="' +
                        advantageInput.val() +
                        '">\n' +
                        "</div>"
                );

                advantageInput.val("").change();
                advantageInput.focus();
            }
        })
        .delegate(".js-icon-form-remove", "click", function (e) {
            $(this).parent(".js-advantage-item").remove();
        });

    $("#disadvantages")
        .delegate(".js-icon-form-add", "click", function (e) {
            var parent = $(".js-disadvantages-list");
            if (parent.find(".js-disadvantage-item").length >= 5) {
                return;
            }

            var disadvantageInput = $("#disadvantage-input");

            if (disadvantageInput.val().trim().length > 0) {
                parent.append(
                    '<div class="ui-dynamic-label ui-dynamic-label--negative js-disadvantage-item">\n' +
                        disadvantageInput.val() +
                        '<button type="button" class="ui-dynamic-label-remove js-icon-form-remove"></button>\n' +
                        '<input type="hidden" name="comment[disadvantages][]" value="' +
                        disadvantageInput.val() +
                        '">\n' +
                        "</div>"
                );

                disadvantageInput.val("").change();
                disadvantageInput.focus();
            }
        })
        .delegate(".js-icon-form-remove", "click", function (e) {
            $(this).parent(".js-disadvantage-item").remove();
        });
    // advantages-----------------------------

    // sidebar-sticky-------------------------
    if ($(".sticky-sidebar").length) {
        $(".sticky-sidebar").theiaStickySidebar();
    }

    //   countdown----------------------------
    // ! function (l) {
    //     var t = {
    //         init: function () {
    //             t.countDown()
    //         },
    //         countDown: function (t, i) {
    //             l(".countdown").each(function () {
    //                 var t = l(this),
    //                     a = l(this).data("date-time"),
    //                     e = l(this).data("labels");
    //                 (i || t).countdown(a, function (t) {
    //                     l(this).html(t.strftime('<div class="countdown-item"><div class="countdown-value">%D</div><div class="countdown-label">' + e["label-day"] + '</div></div><div class="countdown-item"><div class="countdown-value">%H</div><div class="countdown-label">' + e["label-hour"] + '</div></div><div class="countdown-item"><div class="countdown-value">%M</div><div class="countdown-label">' + e["label-minute"] + '</div></div><div class="countdown-item"><div class="countdown-value">%S</div><div class="countdown-label">' + e["label-second"] + "</div></div>"))
    //                 })
    //             })
    //         },
    //     };
    //     l(function () {
    //         t.init()
    //     })
    // }(jQuery);
    // const cd = new Date().getFullYear() + 1
    // $('#countdown').countdown({
    //     year: cd
    // });

    // checkout-coupon-------------------------------
    $(".showcoupon").on("click", function () {
        $(".checkout-coupon").slideToggle(200);
    });

    $(".form-coupon").on("submit", function (e) {
        e.preventDefault();
        var form=$(this);
            form.find('button').attr('disabled', true).append(
            '<span class="mr-1"><i class="fa fa-spinner fa-spin"></i></span>');
        var code1 = form.find('input').val();
        let url = window.location.origin + "/checkcoupon";
        $.post(
            url,
            {
                _token: $('meta[name="csrf-token"]').attr("content"),
                code: code1,
            },
            function (response, status, xhr) {
                if (xhr.status == 200) {
                    let message = response.message;
                    $(".inc-coupon").html(number_format(message) + "تومان");
                    $("#final-amounts").html(number_format(response.total_amounts) + "تومان");
                    $("#coupon-box").remove();
                    $("").html(number_format(message) + "تومان");
                    Swal.fire({
                        text: "کد تخفیف اعمال گردید",
                        icon: "success",
                        timer: 1500,
                        confirmButtonText: "تایید",
                    });
                }
                if (xhr.status == 201) {
                    let message = response.message;
                    Swal.fire({
                        text: message,
                        icon: "warning",
                        timer: 1500,
                        confirmButtonText: "تایید",
                    });
                }
            }
        )
            .fail(function (response) {
                let message = response.errormessage;
                // console.log(message);
                Swal.fire({
                    text: message,
                    icon: "warning",
                    timer: 1500,
                    confirmButtonText: "تایید",
                });
            })
            .always(function () {
                form.find('button').attr('disabled', false).find('span')
                .remove();
            });
    });

    // checkout-coupon-------------------------------
    $("#sub-coupon").on("click", function () {});
    // SweetAlert -----------------------------------

    // cart-item-close
    $(".mini-cart-item-close").on("click", function () {});

    // add-to-cart
    $(".btn-add-to-cart").on("click", function (e) {
        //تازه
        e.preventDefault();
        var a = $(this);
        var ishome = a.attr("data-ishome");
        if (ishome == 1) {
            producth = a.attr("data-product");
            variationh = a.attr("data-varition");
            qtybuttonh = $("#qtybutton").val();
        } else {
            producth = $("#product_id").val();
            variationh = $("#var-select").val();
            qtybuttonh = $("#qtybutton").val();
        }

        a.find("i").removeClass("fa fa-shopping-cart");
        a.find("i").addClass("fa fa-circle-o-notch fa-spin");
        let url = window.location.origin + "/add-to-cart";

        $.post(
            url,
            {
                _token: $('meta[name="csrf-token"]').attr("content"),
                product: producth,
                variation: variationh,
                qtybutton: qtybuttonh,
            },
            function (response, status, xhr) {
                if (xhr.status == 200) {
                    $("#widget-shopping-cart").css("display", "block");
                    let pro = response.product;
                    let rowid = response.rowId;
                    let app_name = response.app_name;
                    let image_url =
                        window.location.origin +
                        "/storage/primary_image/" +
                        pro.primary_image;
                    let href_product =
                        window.location.origin + "/product/" + pro.slug;

                    if ($("#shopping-bag-item").html == 0) {
                        $("#shopping-bag-item").value(1);
                    } else {
                        $("#shopping-bag-item").html(
                            parseInt($("#shopping-bag-item").html(), 10) + 1
                        );
                    }
                    if ($("#count-cart").html == 0) {
                        $("#count-cart").value(1);
                    } else {
                        $("#count-cart").html(
                            parseInt($("#count-cart").html(), 10) + 1
                        );
                    }

                    $("#product-list-widget").append(
                        `<li class="mini-cart-item" id="` +
                            rowid +
                            `">
                          <div class="mini-cart-item-content">
                              <a onclick="return delete_product_cart('` +
                            rowid +
                            `')"
                                  class="mr-3" style="position: absolute;left: 3px;">
                                  <i class="mdi mdi-close" id="del-pro-cart-` +
                            rowid +
                            `"></i>
                              </a>
                              <a href="  ` +
                            href_product +
                            ` "
                                  class="mini-cart-item-image d-block">
                                  <img
                                      src="` +
                            image_url +
                            `">
                              </a>
                              <span class="product-name-card">` +
                            pro.name +
                            `-
                                  ` +
                            response.cart[rowid].attributes.value +
                            `</span>
                            <div class="variation">
                            <span class="variation-n">فروشنده :
                            </span>
                            <p class="mb-0">` +
                            app_name +
                            `</p>
                            </div>
                              <div class="quantity">
                                  <span class="quantity-Price-amount">
                                      ` +
                            response.cart[rowid].quantity +
                            ` *
                                      ` +
                            number_format(response.cart[rowid].price) +
                            `
                            ` +
                            number_format(
                                response.cart[rowid].quantity *
                                    response.cart[rowid].price
                            ) +
                            `
                                      <span>تومان</span>
                                  </span>
                              </div>
                          </div>
                      </li>`
                    );
                    $(".price-total").html(
                        number_format(response.all_cart) + "تومان"
                    );

                    Swal.fire({
                        text: "محصول به سبد خرید اضافه شد",
                        icon: "success",
                        timer: 1500,
                        confirmButtonText: "تایید",
                    });
                }
                else if (xhr.status == 201) {
                    Swal.fire({
                        text: "محصول قبلا به سبد خرید اضافه شده",
                        icon: "warning",
                        timer: 1500,
                        confirmButtonText: "تایید",
                    });
                } else {
                    alert("اتصال شما به اینترنت قطع");
                    location.reload();
                }
            }
        )
            .fail(function (response) {
                alert("اتصال شما به اینترنت قطع");
                location.reload();
            })
            .always(function () {
                a.find("i").removeClass("fa fa-circle-o-notch fa-spin");
                a.find("i").addClass("fa fa-shopping-cart");
            });
    });
    //مقایسه صفحه اصلی

    $(".btn-compare").on("click", function (n) {
        n.preventDefault();
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 2000,
            didOpen: (toast) => {
                toast.addEventListener("mouseenter", Swal.stopTimer);
                toast.addEventListener("mouseleave", Swal.resumeTimer);
            },
        });

        var s = $(this);
        let id = this.dataset.product;
        let url = window.location.origin + "/add-to-compare" + "/" + [id];
        console.log(url);
        n.preventDefault();
        s.find("i").removeClass("fa fa-random");
        s.find("i").addClass("fa fa-circle-o-notch fa-spin");
        $.get(url, function (response, status) {
            if (response.errors == "deleted") {
                s.css("color", "rgb(31, 30, 30)");
                if ($(".compare-text").html == 0) {
                    $(".compare-text").value(1);
                } else {
                    $(".compare-text").html(
                        parseInt($(".compare-text").html(), 10) - 1
                    );
                }
                Toast.fire({
                    icon: "success",
                    title: "محصول از لیست مقایسه حذف شد",
                });
            } else if (response.errors == "saved") {
                if ($(".compare-text").html == 0) {
                    $(".compare-text").value(1);
                } else {
                    $(".compare-text").html(
                        parseInt($(".compare-text").html(), 10) + 1
                    );
                }
                s.css("color", "#651fff"),
                    Toast.fire({
                        icon: "success",
                        title: "محصول برای مقایسه اضافه شد",
                    });
            }
        })
            .fail(function (jqXHR, exception) {
                Toast.fire({
                    icon: "error",
                    title: "اتصال شما قطع است",
                });
            })
            .always(function () {
                s.find("i").removeClass("fa fa-circle-o-notch fa-spin");

                s.find("i").addClass("fa fa-random");
            });
    });

    // علاقه مندی ها
    $(".add-product-wishes").on("click", function (e) {
        e.preventDefault();
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 2000,
            didOpen: (toast) => {
                toast.addEventListener("mouseenter", Swal.stopTimer);
                toast.addEventListener("mouseleave", Swal.resumeTimer);
            },
        });
        var a = $(this);
        let id = this.dataset.product;
        let product = JSON.parse(id);
        let url =
            window.location.origin +
            "/profile/add-to-wishlist" +
            "/" +
            [product];
        a.find("i").removeClass("fa fa-heart-o");
        a.find("i").addClass("fa fa-circle-o-notch fa-spin");
        $.get(url, function (response, status) {
            console.log(response);
            if (response.errors == "deleted") {
                e.preventDefault(), a.removeClass("active");
                Toast.fire({
                    icon: "success",
                    title: "از لیست علاقه مندی ها حذف شد",
                });
            } else if (response.errors == "saved") {
                e.preventDefault(),
                    a.addClass("active"),
                    Toast.fire({
                        icon: "success",
                        title: "به لیست علاقه مندی خود اضافه شد",
                    });
            } else if (response.errors == "sign") {
                Toast.fire({
                    icon: "warning",
                    title: "ابتدا وارد شوید",
                });
            }
        })
            .fail(function (jqXHR, exception) {
                Toast.fire({
                    icon: "warning",
                    title: "ابتدا وارد شوید",
                });
            })
            .always(function () {
                a.find("i").removeClass("fa fa-circle-o-notch fa-spin");
                a.find("i").addClass("fa fa-heart-o");
            });
    });
    // SweetAlert -----------------------------------
    // nice-select-----------------------------------
    if ($(".custom-select-ui").length) {
        $(".custom-select-ui select").niceSelect();
    }
    // nice-select-----------------------------------
    //    price-range--------------------------------
    // var nonLinearStepSlider = document.getElementById("slider-non-linear-step");

    // if ($("#slider-non-linear-step").length) {
    //     noUiSlider.create(nonLinearStepSlider, {
    //         start: [0, 5000000],
    //         connect: true,
    //         direction: "rtl",
    //         format: wNumb({
    //             decimals: 0,
    //             thousand: ",",
    //         }),
    //         range: {
    //             min: [0],
    //             "10%": [500, 500],
    //             "50%": [40000, 1000],
    //             max: [10000000],
    //         },
    //     });
    //     var nonLinearStepSliderValueElement = document.getElementById(
    //         "slider-non-linear-step-value"
    //     );

    //     nonLinearStepSlider.noUiSlider.on("update", function (values) {
    //         nonLinearStepSliderValueElement.innerHTML = values.join(" - ");
    //     });
    // }
    //    price-range--------------------------

    //    quantity-selector--------------------
    jQuery("").insertAfter(".quantity input");
    jQuery(".quantity").each(function () {
        var spinner = jQuery(this),
            input = spinner.find('input[type="number"]'),
            btnUp = spinner.find(".quantity-up"),
            btnDown = spinner.find(".quantity-down"),
            min = input.attr("min"),
            max = input.attr("max");

        btnUp.click(function () {
            var oldValue = parseFloat(input.val());
            if (oldValue >= max) {
                var newVal = oldValue;
            } else {
                var newVal = oldValue + 1;
            }
            spinner.find("input").val(newVal);
            spinner.find("input").trigger("change");
        });

        btnDown.click(function () {
            var oldValue = parseFloat(input.val());
            if (oldValue <= min) {
                var newVal = oldValue;
            } else {
                var newVal = oldValue - 1;
            }
            spinner.find("input").val(newVal);
            spinner.find("input").trigger("change");
        });
    });
    //    quantity-selector-------------------

    // Page Loader----------------------------
    // var preloader = $('.P-loader');
    // $(window).on("load", function () {
    //     var preloaderFadeOutTime = 500;
    //     function hidePreloader() {
    //         preloader.fadeOut(preloaderFadeOutTime);
    //     }
    //     hidePreloader();
    // });
    $(".P-loader").fadeOut(2000, "swing");
    // Page Loader----------------------------

    // scroll_progress-------------------------
    var progressPath = document.querySelector(".progress-wrap path");
    var pathLength = progressPath.getTotalLength();
    progressPath.style.transition = progressPath.style.WebkitTransition =
        "none";
    progressPath.style.strokeDasharray = pathLength + " " + pathLength;
    progressPath.style.strokeDashoffset = pathLength;
    progressPath.getBoundingClientRect();
    progressPath.style.transition = progressPath.style.WebkitTransition =
        "stroke-dashoffset 10ms linear";
    var updateProgress = function () {
        var scroll = $(window).scrollTop();
        var height = $(document).height() - $(window).height();
        var progress = pathLength - (scroll * pathLength) / height;
        progressPath.style.strokeDashoffset = progress;
    };
    updateProgress();
    $(window).scroll(updateProgress);
    var offset = 50;
    var duration = 1500;
    jQuery(window).on("scroll", function () {
        if (jQuery(this).scrollTop() > offset) {
            jQuery(".progress-wrap").addClass("active-progress");
        } else {
            jQuery(".progress-wrap").removeClass("active-progress");
        }
    });
    jQuery(".progress-wrap").on("click", function (event) {
        event.preventDefault();
        jQuery("html, body").animate({ scrollTop: 0 }, duration);
        return false;
    });

    //    verify-phone-number------------------------
    /* if ($("#countdown-verify-end").length) {
        var $countdownOptionEnd = $("#countdown-verify-end");

        $countdownOptionEnd.countdown({
            date: new Date().getTime() + 180 * 1000, // 1 minute later
            text: '<span class="day">%s</span><span class="hour">%s</span><span>: %s</span><span>%s</span>',
            end: function () {
                $countdownOptionEnd.html(
                    "<a href='' class='link-border-verify form-account-link'>ارسال مجدد</a>"
                );
            },
        });
    } */
    $(".line-number-account").on("keyup", function (event) {
        if (event.key === "Backspace" || event.key === "Delete") {
            $(this).prev().focus();
        } else {
            $(this).next().focus();
        }
    });
    //    verify-phone-number-----------------------

    // tab-------------------------------------
    $(".mask-handler").click(function (e) {
        e.preventDefault();
        var sumaryBox = $(this).parents(".content-expert-summary");
        sumaryBox.find(".mask-text").toggleClass("active");
        sumaryBox.find(".shadow-box").fadeToggle(0);
        $(this).find(".show-more").fadeToggle(0);
        $(this).find(".show-less").fadeToggle(0);
    });

    $(".content-expert-button").click(function (e) {
        e.preventDefault();
        var sumaryBox = $(this).parents(".content-expert-article");
        sumaryBox.find(".content-expert-article").toggleClass("active");
        sumaryBox.find(".content-expert-text").slideToggle();
        $(this).find(".show-more").fadeToggle(0);
        $(this).find(".show-less").fadeToggle(0);
    });
    // tab-------------------------------------

    // product-img-----------------------------
    $("#gallery-slider").owlCarousel({
        rtl: true,
        margin: 10,
        nav: true,
        navText: [
            '<i class="fa fa-angle-right"></i>',
            '<i class="fa fa-angle-left"></i>',
        ],
        dots: false,
        responsiveClass: true,
        responsive: {
            0: {
                items: 4,
                slideBy: 1,
            },
        },
    });

    $(".back-to-top").click(function (e) {
        e.preventDefault();
        $("html, body").animate({ scrollTop: 0 }, 800, "easeInExpo");
    });

    if ($("#img-product-zoom").length) {
        $("#img-product-zoom").ezPlus({
            zoomType: "inner",
            containLensZoom: true,
            gallery: "gallery_01f",
            cursor: "crosshair",
            galleryActiveClass: "active",
            responsive: true,
            imageCrossfade: true,
            zoomWindowFadeIn: 500,
            zoomWindowFadeOut: 500,
        });
    }

    //zoomgallerymodal---------------------------
    $(function () {
        $(".zoom-box img").jqZoom({
            selectorWidth: 30,
            selectorHeight: 30,
            viewerWidth: 400,
            viewerHeight: 300,
        });
    });

    var $customEvents = $("#custom-events");
    $customEvents.lightGallery();

    var colours = ["#21171A", "#81575E", "#9C5043", "#8F655D"];
    $customEvents.on("onBeforeSlide.lg", function (event, prevIndex, index) {
        $(".lg-outer").css("background-color", colours[index]);
    });
    // product-img-----------------------------

    // custom

    window.delete_product_cart = function (id) {
        a = $(this);
        let url = window.location.origin + "/remove-from-cart" + "/" + id;
        $("#" + "del-pro-cart-" + id).addClass("fa fa-circle-o-notch fa-spin");
        $("#" + "del-pro-cart-" + id).removeClass("mdi mdi-close");
        $.get(url, function (response, status, xyz) {
            if (status == "success") {
                let price = number_format(response);
                $(".price-total").html(price + " " + "تومان");
                $("#" + id).remove();
                $("#shopping-bag-item").html(
                    parseInt($("#shopping-bag-item").html(), 10) - 1
                );
                $("#count-cart").html(
                    parseInt($("#count-cart").html(), 10) - 1
                );

                Livewire.emit("delete", id);
            }
        })
            .fail(function () {
                Swal.fire({
                    title: "مشکل",
                    text: " اینترنت شما قطع است",
                    icon: "error",
                    timer: 1500,
                    confirmButtonText: "تایید",
                });
            })
            .always(function () {
                $("#" + "del-pro-cart-" + id).removeClass(
                    "fa fa-circle-o-notch fa-spin"
                );
                $("#" + "del-pro-cart-" + id).addClass("mdi mdi-close");
            });
    };

    window.number_format = function (
        number,
        decimals,
        dec_point,
        thousands_sep
    ) {
        // Strip all characters but numerical ones.
        number = (number + "").replace(/[^0-9+\-Ee.]/g, "");
        var n = !isFinite(+number) ? 0 : +number,
            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
            sep = typeof thousands_sep === "undefined" ? "," : thousands_sep,
            dec = typeof dec_point === "undefined" ? "." : dec_point,
            s = "",
            toFixedFix = function (n, prec) {
                var k = Math.pow(10, prec);
                return "" + Math.round(n * k) / k;
            };
        // Fix for IE parseFloat(0.55).toFixed(0) = 0;
        s = (prec ? toFixedFix(n, prec) : "" + Math.round(n)).split(".");
        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }
        if ((s[1] || "").length < prec) {
            s[1] = s[1] || "";
            s[1] += new Array(prec - s[1].length + 1).join("0");
        }
        return s.join(dec);
    };

    window.addEventListener("say-goodbye", (event) => {
        $("#shopping-bag-item").html(
            parseInt($("#shopping-bag-item").html(), 10) - 1
        );
        $("#count-cart").html(parseInt($("#count-cart").html(), 10) - 1);

        $("#" + event.detail.rowId).remove();

        $(".mini-card-total").remove();
    });

    $(".carousel").carousel({
        interval: false,
        pause: true,
        touch: true,
    });

    $(".carousel .carousel-inner").swipe({
        swipeLeft: function (
            event,
            direction,
            distance,
            duration,
            fingerCount
        ) {
            this.parent().carousel("next");
        },
        swipeRight: function () {
            this.parent().carousel("prev");
        },
        threshold: 0,
        tap: function (event, target) {
            window.location = $(this)
                .find(".carousel-item.active a")
                .attr("href");
        },
        excludedElements: "label, button, input, select, textarea, .noSwipe",
    });

    $(".carousel .carousel-control-prev").on("click", function () {
        $(".carousel").carousel("prev");
    });

    $(".carousel .carousel-control-next").on("click", function () {
        $(".carousel").carousel("next");
    });
});
