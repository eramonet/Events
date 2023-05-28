

function show_options(cart_item_id){
    // alert(cart_item_id)
    var elms = document.getElementById("my_div_hovered" + cart_item_id);
    elms.style.display = "block";
}

function hide_options(cart_item_id){
    var elms = document.getElementById("my_div_hovered" + cart_item_id);
    elms.style.display = "none";
}


$(function () {
    $("#btn1").click(function () {
        $("#showImage").slideToggle("slow");
        $("#showImage").empty();

        $("#showImage").prepend(
            '<img id="theImg1" height="415" style="border-radius: 20px 0px 0px 20px;" src="https://the-events-app.com/website/images/bestSales/Rectangle%20292.png" />'
        );

        $("#showImage").slideToggle("slow");
        $("#btn2").css("background-color", "#f3a095");
        $("#btn3").css("background-color", "#f3a095");
        $(this).css("background-color", "#ff6e5a");
    });

    $("#btn2").click(function () {
        $("#showImage").slideToggle("slow");
        $("#showImage").empty();
        $("#showImage").prepend(
            '<img id="theImg2" height="415" style="border-radius: 20px 0px 0px 20px; transition: opacity 5s ease-in-out;" src="https://the-events-app.com/website/images/productDetails/productImages/img%20(1).png" />'
        );
        $("#showImage").slideToggle("slow");
        $("#btn1").css("background-color", "#f3a095");
        $("#btn3").css("background-color", "#f3a095");
        $(this).css("background-color", "#ff6e5a");
    });

    $("#btn3").click(function () {
        $("#showImage").slideToggle("slow");
        $("#showImage").empty();
        $("#showImage").prepend(
            '<img id="theImg3" height="415" style="border-radius: 20px 0px 0px 20px" src="https://the-events-app.com/website/images/productDetails/productImages/flower1.jpg" />'
        );

        $("#showImage").slideToggle("slow");
        $("#btn1").css("background-color", "#f3a095");
        $("#btn2").css("background-color", "#f3a095");
        $(this).css("background-color", "#ff6e5a");
    });

    // $(".ContainerCart").mouseenter(function () {
    //     alert(this_cart_id)
    //     var elms = document.getElementById("my_div_hovered1");
    //     console.log(elms.style.display);

    //     elms.style.display = "block";
    // });

    // $(".ContainerCart").mouseleave(function () {
    //     var elms = document.getElementById("my_div_hovered1");
    //     console.log(elms.style.display);

    //     elms.style.display = "none";
    // });

    $("#ContainerCart2").mouseenter(function () {
        var elms = document.getElementById("my_div_hovered2");
        console.log(elms.style.display);

        elms.style.display = "block";
    });

    $("#ContainerCart2").mouseleave(function () {
        var elms = document.getElementById("my_div_hovered2");
        console.log(elms.style.display);

        elms.style.display = "none";
    });

    $("#ContainerCart3").mouseenter(function () {
        var elms = document.getElementById("my_div_hovered3");
        console.log(elms.style.display);

        elms.style.display = "block";
    });

    $("#ContainerCart3").mouseleave(function () {
        var elms = document.getElementById("my_div_hovered3");
        console.log(elms.style.display);

        elms.style.display = "none";
    });

    $("#ContainerCart4").mouseenter(function () {
        var elms = document.getElementById("my_div_hovered4");
        console.log(elms.style.display);

        elms.style.display = "block";
    });

    $("#ContainerCart4").mouseleave(function () {
        var elms = document.getElementById("my_div_hovered4");
        console.log(elms.style.display);

        elms.style.display = "none";
    });

    $("#ContainerCart5").mouseenter(function () {
        var elms = document.getElementById("my_div_hovered5");
        console.log(elms.style.display);

        elms.style.display = "block";
    });

    $("#ContainerCart5").mouseleave(function () {
        var elms = document.getElementById("my_div_hovered5");
        console.log(elms.style.display);

        elms.style.display = "none";
    });

    $("#ContainerCart6").mouseenter(function () {
        var elms = document.getElementById("my_div_hovered6");
        console.log(elms.style.display);

        elms.style.display = "block";
    });

    $("#ContainerCart6").mouseleave(function () {
        var elms = document.getElementById("my_div_hovered6");
        console.log(elms.style.display);

        elms.style.display = "none";
    });

    var i = 0;
    var images = [
        "https://the-events-app.com/website/images/bestSales/Rectangle%20292.png",
        "https://the-events-app.com/website/images/productDetails/productImages/img%20(1).png",
        "https://the-events-app.com/website/images/productDetails/productImages/flower1.jpg",
    ];

    $("#prev_btn").click(function () {
        if (i <= 0) i = images.length;
        i--;

        setImage(images[i]);
    });

    $("#next_btn").click(function () {
        if (i >= images.length - 1) i = -1;
        i++;

        setImage(images[i]);
    });

    function setImage(image) {
        $("#showImage").empty();
        $("#theImg3").fadeIn(3000);
        $("#showImage").prepend(
            '<img id="theImg3" height="415" style="border-radius: 20px 0px 0px 20px" src="' +
                image +
                '" />'
        );
        $("#showImage").slideToggle("slow");
        $("#showImage").slideToggle("slow");
    }

    $("#search_icon").click(function () {
        $("#search_input").slideToggle("slow");
        $("#search_input").css("display", "block");
    });

    $("#change_lang , #change_lang_image").click(function () {
        $("#langs_source").slideToggle("slow");
        $("#langs_source").css("display", "block");
    });

    $(".my_foused_class0").click(function () {
        $(this).css({ color: " #ff6e5a" });
        $(".my_foused_class1").css({ color: " #555" });
        $(".my_foused_class2").css({ color: " #555" });
        $(".my_foused_class3").css({ color: " #555" });
        $(".my_foused_class4").css({ color: " #555" });
        $(".my_foused_class5").css({ color: " #555" });
        $(".my_foused_class6").css({ color: " #555" });
    });

    $(".my_foused_class1").click(function () {
        $(this).css({ color: " #ff6e5a" });
        $(".my_foused_class0").css({ color: " #555" });
        $(".my_foused_class2").css({ color: " #555" });
        $(".my_foused_class3").css({ color: " #555" });
        $(".my_foused_class4").css({ color: " #555" });
        $(".my_foused_class5").css({ color: " #555" });
        $(".my_foused_class6").css({ color: " #555" });
    });

    $(".my_foused_class2").click(function () {
        $(this).css({ color: " #ff6e5a" });
        $(".my_foused_class0").css({ color: " #555" });
        $(".my_foused_class1").css({ color: " #555" });
        $(".my_foused_class3").css({ color: " #555" });
        $(".my_foused_class4").css({ color: " #555" });
        $(".my_foused_class5").css({ color: " #555" });
        $(".my_foused_class6").css({ color: " #555" });
    });

    $(".my_foused_class3").click(function () {
        $(this).css({ color: " #ff6e5a" });
        $(".my_foused_class0").css({ color: " #555" });
        $(".my_foused_class1").css({ color: " #555" });
        $(".my_foused_class2").css({ color: " #555" });
        $(".my_foused_class4").css({ color: " #555" });
        $(".my_foused_class5").css({ color: " #555" });
        $(".my_foused_class6").css({ color: " #555" });
    });

    $(".my_foused_class4").click(function () {
        $(this).css({ color: " #ff6e5a" });
        $(".my_foused_class0").css({ color: " #555" });
        $(".my_foused_class1").css({ color: " #555" });
        $(".my_foused_class2").css({ color: " #555" });
        $(".my_foused_class3").css({ color: " #555" });
        $(".my_foused_class5").css({ color: " #555" });
        $(".my_foused_class6").css({ color: " #555" });
    });

    $(".my_foused_class5").click(function () {
        $(this).css({ color: " #ff6e5a" });
        $(".my_foused_class0").css({ color: " #555" });
        $(".my_foused_class1").css({ color: " #555" });
        $(".my_foused_class2").css({ color: " #555" });
        $(".my_foused_class4").css({ color: " #555" });
        $(".my_foused_class3").css({ color: " #555" });
        $(".my_foused_class6").css({ color: " #555" });
    });

    $(".my_foused_class6").click(function () {
        $(this).css({ color: " #ff6e5a" });
        $(".my_foused_class0").css({ color: " #555" });
        $(".my_foused_class1").css({ color: " #555" });
        $(".my_foused_class2").css({ color: " #555" });
        $(".my_foused_class4").css({ color: " #555" });
        $(".my_foused_class5").css({ color: " #555" });
        $(".my_foused_class3").css({ color: " #555" });
    });

    $("#choose_payment_method_1").click(function () {
        $("#payment_method_section").addClass("active");
        $(".pageOne").removeClass("active");
        $(".pageTow").addClass("active");
    });

    $("#choose_payment_method_2").click(function () {
        $("#payment_method_section2").addClass("active");
        $(".pageTow").removeClass("active");
        $(".pageThree").addClass("active");
    });

    $(".myTest").mouseenter(function () {
        $("#testing_hide").css("display", "block");
    });

    $(".myTest").mouseleave(function () {
        $("#testing_hide").css("display", "none");
    });

    $(".myTest1").mouseenter(function () {
        $("#testing_hide1").css("display", "block");
    });

    $(".myTest1").mouseleave(function () {
        $("#testing_hide1").css("display", "none");
    });

    $(".myTest2").mouseenter(function () {
        try {
            $("#testing_hide2").css("display", "block");
        } catch (err) {
            console.log(err.message);
        }
    });

    $(".myTest2").mouseleave(function () {
        try {
            $("#testing_hide2").css("display", "none");
        } catch (err) {
            console.log(err.message);
        }
    });

    $(".myTest3").mouseenter(function () {
        try {
            $("#testing_hide3").css("display", "block");
        } catch (err) {
            console.log(err.message);
        }
    });

    $(".myTest3").mouseleave(function () {
        try {
            $("#testing_hide3").css("display", "none");
        } catch (err) {
            console.log(err.message);
        }
    });

    $(".myTest4").mouseenter(function () {
        try {
            $("#testing_hide4").css("display", "block");
        } catch (err) {
            console.log(err.message);
        }
    });

    $(".myTest4").mouseleave(function () {
        try {
            $("#testing_hide4").css("display", "none");
        } catch (err) {
            console.log(err.message);
        }
    });

    $("#product_details_cursor0").mouseenter(function () {
        $("#data_option_num0").css("display", "block");
    });
    $("#product_details_cursor0").mouseleave(function () {
        $("#data_option_num0").css("display", "none");
    });

    $("#product_details_cursor1").mouseenter(function () {
        $("#data_option_num1").css("display", "block");
    });
    $("#product_details_cursor1").mouseleave(function () {
        $("#data_option_num1").css("display", "none");
    });

    $("#product_details_cursor2").mouseenter(function () {
        $("#data_option_num2").css("display", "block");
    });
    $("#product_details_cursor2").mouseleave(function () {
        $("#data_option_num2").css("display", "none");
    });
});
