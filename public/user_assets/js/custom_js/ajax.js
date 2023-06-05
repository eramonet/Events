function show_success_popup(message) {
    $.notify(
        {
            icon: "fa fa-check",
            title: $("#our_locale_site").val() == "ar" ? "تهانينا" : "Success!",
            message: message,
        },
        {
            element: "body",
            position: null,
            type: "info",
            allow_dismiss: true,
            newest_on_top: false,
            showProgressbar: true,
            placement: {
                from: "top",
                align: "right",
            },
            offset: 20,
            spacing: 10,
            z_index: 1031,
            delay: 5000,
            animate: {
                enter: "animated fadeInDown",
                exit: "animated fadeOutUp",
            },
            icon_type: "class",
            template:
                '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                '<button type="button" aria-hidden="true" class="btn-close" data-notify="dismiss"></button>' +
                '<span data-notify="icon"></span> ' +
                '<span data-notify="title">{1}</span> ' +
                '<span data-notify="message">{2}</span>' +
                '<div class="progress" data-notify="progressbar">' +
                '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                "</div>" +
                '<a href="{3}" target="{4}" data-notify="url"></a>' +
                "</div>",
        }
    );
}

function show_fail_popup(message) {
    $.notify(
        {
            icon: "fa fa-check",
            title: $("#our_locale_site").val() == "ar" ? "عزرا" : "Warning !",
            message: message,
        },
        {
            element: "body",
            position: null,
            type: "warning",
            allow_dismiss: true,
            newest_on_top: false,
            showProgressbar: true,
            placement: {
                from: "top",
                align: "right",
            },
            offset: 20,
            spacing: 10,
            z_index: 1031,
            delay: 5000,
            animate: {
                enter: "animated fadeInDown",
                exit: "animated fadeOutUp",
            },
            icon_type: "class",
            template:
                '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                '<button type="button" aria-hidden="true" class="btn-close" data-notify="dismiss"></button>' +
                '<span data-notify="icon"></span> ' +
                '<span data-notify="title">{1}</span> ' +
                '<span data-notify="message">{2}</span>' +
                '<div class="progress" data-notify="progressbar">' +
                '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                "</div>" +
                '<a href="{3}" target="{4}" data-notify="url"></a>' +
                "</div>",
        }
    );
}

// getting city based on country
// getting regions based on city
$("#cities").change(function () {
    $cities_id = $(this).children("option:selected").val();

    $complete_url = "/get-region/" + $cities_id;
    $.ajax({
        type: "GET",
        url: $complete_url,
        success: function (data) {
            $("#regions").find("option").remove().end();

            for (var i = 0; i < Object.keys(data).length; i++) {
                $("#regions").append(`
                <option value="${data[i].id}">
                    ${data[i].title_en}
                </option>`);
            }
        },
        error: function (data) {
            console.log("error");
        },
    });
});

// add to cart
function add_to_cart(product_id, quantity) {
    $complete_url = "/add-to-cart/" + product_id + "/" + quantity;
    $.ajax({
        type: "GET",
        url: $complete_url,
        success: function (data) {
            show_success_popup("product added to cart successfully !");
        },
        error: function (data) {
            console.log("error");
        },
    });
}

shoppingCurtIcon.onclick = function (e) {
    /* start stop propagation to shoppingCurtIcon */
    userAuth.classList.remove("active");
    favoritCart.classList.remove("active");
    // languageContent.classList.remove("active");

    e.stopPropagation();
    /* end stop propagation to shoppingCurtIcon */

    if (!shoppingCurt.classList.contains("active")) {
        var total_price = 0;
        $complete_url = "/get-my-cart";
        $.ajax({
            type: "GET",
            url: $complete_url,
            success: function (data) {
                let totalOrderPrice = 0;
                let myCart = data;
                $("#list-unstyled").empty();
                if (myCart.length == 0) {
                    $("#checkout-btn").css("visibility", "hidden");
                    shoppingCurtUl.innerHTML = ` <li class="noProduct">Empty Cart</li> `;
                } else {
                    for (x = 0; x < myCart.length; x++) {
                        total_price +=
                            myCart[x].quantity * myCart[x].product.real_price;
                        $("#list-unstyled").append(`
                        <li class="d-flex">
                        <div class="details d-flex">
                            <div class="image">
                                <img src="${myCart[x].product.primary_image_url}" style="width:40px" />
                            </div>
                            <div class="data">
                                <h5 style="font-size:20px;">${myCart[x].product.title_en}</h5>
                                <span style="font-size:15px;" class="price">${myCart[x].quantity} items</span>
                            </div>
                        </div>
                        <div class="controlle">
                          <i class="fas fa-trash" onclick="delete_item_from_cart( ${myCart[x].id} )"></i>
                          <span class="price">${myCart[x].quantity} * ${myCart[x].product.real_price} AED</span>
                        </div>
                      </li>`);
                    }
                    $("#checkout-btn").css("visibility", "visible");
                }

                totalPrice.innerHTML = total_price + " AED";
                orderProductCount();
            },
            error: function (data) {
                console.log("error");
            },
        });
    }
    shoppingCurt.classList.toggle("active");
};

function delete_item_from_cart(item_id) {
    $complete_url = "/remove-item-from-cart/" + item_id;
    $.ajax({
        type: "GET",
        url: $complete_url,
        success: function (data) {
            var total_price = 0;
            $complete_url = "/get-my-cart";
            $.ajax({
                type: "GET",
                url: $complete_url,
                success: function (data) {
                    let totalOrderPrice = 0;
                    let myCart = data;
                    $("#list-unstyled").empty();
                    if (myCart.length == 0) {
                        shoppingCurtUl.innerHTML = ` <li class="noProduct">Empty Cart</li> `;
                        $("#checkout-btn").css("visibility", "hidden");
                    } else {
                        for (x = 0; x < myCart.length; x++) {
                            total_price +=
                                myCart[x].quantity *
                                myCart[x].product.real_price;
                            $("#list-unstyled").append(`
                        <li class="d-flex">
                        <div class="details d-flex">
                            <div class="image">
                                <img src="${myCart[x].product.primary_image_url}" style="width:40px" />
                            </div>
                            <div class="data">
                                <h5 style="font-size:20px;">${myCart[x].product.title_en}</h5>
                                <span style="font-size:15px;" class="price">${myCart[x].quantity} items</span>
                            </div>
                        </div>
                        <div class="controlle">
                          <i class="fas fa-trash" onclick="delete_item_from_cart( ${myCart[x].id} )"></i>
                          <span class="price">${myCart[x].quantity} * ${myCart[x].product.real_price} AED</span>
                        </div>
                      </li>`);
                        }
                        $("#checkout-btn").css("visibility", "visible");
                    }

                    totalPrice.innerHTML = total_price + " AED";
                    orderProductCount();
                },
                error: function (data) {
                    console.log("error");
                },
            });
        },
        error: function (data) {
            console.log("error");
        },
    });
}

function addCommas(nStr) {
    nStr += "";
    x = nStr.split(".");
    x1 = x[0];
    x2 = x.length > 1 ? "." + x[1] : "";
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, "$1" + "," + "$2");
    }
    return x1 + x2;
}

function increase_quantity(cart_item_id) {
    quantity = $("#cart_item_" + cart_item_id).val(
        parseInt($("#cart_item_" + cart_item_id).val()) + 1
    );

    $complete_url = "/increase-cart-quantity/" + cart_item_id;
    $.ajax({
        type: "GET",
        url: $complete_url,
        success: function (data) {
            $("#sub_total_" + cart_item_id).text(
                addCommas(data.quantity * data.product.real_price) + " AED"
            );

            calculate_total_order_price();
        },
        error: function (data) {
            console.log("error");
        },
    });
}

function decrease_quantity(cart_item_id) {
    // check if quantity equal zero
    if ($("#cart_item_" + cart_item_id).val() != 1) {
        quantity = $("#cart_item_" + cart_item_id).val(
            parseInt($("#cart_item_" + cart_item_id).val()) - 1
        );

        calculate_total_order_price();
    }

    $complete_url = "/decrease-cart-quantity/" + cart_item_id;
    $.ajax({
        type: "GET",
        url: $complete_url,
        success: function (data) {
            $("#sub_total_" + cart_item_id).text(
                addCommas(data.quantity * data.product.real_price) + " AED"
            );
        },
        error: function (data) {
            console.log("error");
        },
    });
}

function calculate_total_order_price (){
    $complete_url = "/get-my-cart/";
    $.ajax({
        type: "GET",
        url: $complete_url,
        success: function (data) {
            var total_order_price = 0 ;
            for( x=0 ; x < data.length ; x++ ){
                total_order_price += data[x].quantity * data[x].product.real_price ;
            }
            $("#total_order_price").text(total_order_price + " AED");
        },
        error: function (data) {
            console.log("error");
        },
    });
}


