$("#add-to-wish-list").on("click", function (e) {
    console.log("submited");
    e.preventDefault();
    var a = t(this);
    let id = this.dataset.product;
    let product = JSON.parse(id);
    let url =
        window.location.origin + "/profile/add-to-wishlist" + "/" + [product];
    var a = t(this);
    $.get(url, function (response, status) {
        console.log(response);
        if (response.errors == "deleted") {
            e.preventDefault(),
                a.removeClass("active").addClass("load-more-overlay loading"),
                setTimeout(function () {
                    a.removeClass("load-more-overlay loading"),
                        a
                            .addClass("w-icon-heart")
                            .removeClass("w-icon-heart-full");
                }, 500);
        } else if (response.errors == "saved") {
            e.preventDefault(),
                a.addClass("active").addClass("load-more-overlay loading"),
                setTimeout(function () {
                    a.removeClass("load-more-overlay loading"),
                        a
                            .removeClass("w-icon-heart")
                            .addClass("w-icon-heart-full");
                }, 500);
        } else if (response.errors == "sign") {
            $.notify("کاربر گرامی ابتدا باید وارد شوید.", "warn", {
                position: "tap",
            });
        }
    }).fail(function (jqXHR, exception) {
        console.log(jqXHR.status);
    });
});
