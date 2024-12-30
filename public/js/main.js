(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($("#spinner").length > 0) {
                $("#spinner").removeClass("show");
            }
        }, 1);
    };
    spinner();

    // Initiate the wowjs
    new WOW().init();

    // Sticky Navbar
    $(window).scroll(function () {
        if ($(this).scrollTop() > 45) {
            $(".navbar").addClass("sticky-top shadow-sm");
        } else {
            $(".navbar").removeClass("sticky-top shadow-sm");
        }
    });

    // Dropdown on mouse hover
    const $dropdown = $(".dropdown");
    const $dropdownToggle = $(".dropdown-toggle");
    const $dropdownMenu = $(".dropdown-menu");
    const showClass = "show";

    $(window).on("load resize", function () {
        if (this.matchMedia("(min-width: 992px)").matches) {
            $dropdown.hover(
                function () {
                    const $this = $(this);
                    $this.addClass(showClass);
                    $this.find($dropdownToggle).attr("aria-expanded", "true");
                    $this.find($dropdownMenu).addClass(showClass);
                },
                function () {
                    const $this = $(this);
                    $this.removeClass(showClass);
                    $this.find($dropdownToggle).attr("aria-expanded", "false");
                    $this.find($dropdownMenu).removeClass(showClass);
                }
            );
        } else {
            $dropdown.off("mouseenter mouseleave");
        }
    });

    // Facts counter
    $('[data-toggle="counter-up"]').counterUp({
        delay: 10,
        time: 2000,
    });

    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $(".back-to-top").fadeIn("slow");
        } else {
            $(".back-to-top").fadeOut("slow");
        }
    });
    $(".back-to-top").click(function () {
        $("html, body").animate({ scrollTop: 0 }, 150, "easeInOutExpo");
        return false;
    });

    // Testimonials carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1500,
        dots: true,
        loop: true,
        center: true,
        responsive: {
            0: {
                items: 1,
            },
            576: {
                items: 1,
            },
            768: {
                items: 2,
            },
            992: {
                items: 3,
            },
        },
    });

    // Vendor carousel
    $(".vendor-carousel").owlCarousel({
        loop: true,
        margin: 45,
        dots: false,
        loop: true,
        autoplay: true,
        smartSpeed: 1000,
        responsive: {
            0: {
                items: 1,
            },
            576: {
                items: 2,
            },
            768: {
                items: 4,
            },
            992: {
                items: 6,
            },
        },
    });
})(jQuery);

(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($("#spinner").length > 0) {
                $("#spinner").removeClass("show");
            }
        }, 1);
    };
    spinner();

    // Back to top button
    $(".back-to-top").click(function () {
        $("html, body"). scrollTop(0) ;
        return false;
    });

    // Progress Bar
    $(".pg-bar").waypoint(
        function () {
            $(".progress .progress-bar").each(function () {
                $(this).css("width", $(this).attr("aria-valuenow") + "%");
            });
        },
        { offset: "80%" }
    );

    // Testimonials carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        items: 1,
        dots: true,
        loop: true,
        nav: false,
    });

    // $(document).ready(function () {
    //     let defaultChartMargin = $(".chart").css("margin-top"); // Simpan posisi default chart

    //     function updateFactsMargin() {
    //         // Hanya untuk tampilan mobile
    //         if ($(window).width() < 992) {
    //             let marginTop = 0;

    //             if ($(".navbar-collapse").is(":visible")) {
    //                 marginTop = $(".navbar").outerHeight(); // Tinggi navbar

    //                 // Tambahkan tinggi dropdown yang terbuka
    //                 $(".dropdown.show").each(function () {
    //                     marginTop += $(this)
    //                         .find(".dropdown-menu")
    //                         .outerHeight();
    //                 });
    //             }

    //             // Update margin pada elemen facts
    //             $(".facts").css("margin-top", marginTop + "px");
    //             $(".facts").css("transition", "margin-top 0.3s"); // Tambahkan transisi agar lebih halus

    //             // Update margin pada elemen chart
    //             $(".chart").css(
    //                 "margin-top",
    //                 marginTop === 0 ? defaultChartMargin : marginTop + "px"
    //             );
    //         } else {
    //             // Jika bukan tampilan mobile, kembalikan posisi default untuk facts dan chart
    //             $(".facts").css("margin-top", "0");
    //             $(".chart").css("margin-top", defaultChartMargin); // Kembalikan ke posisi default
    //         }
    //     }

    //     // Event ketika navbar di-toggle
    //     $(".navbar-toggler").click(updateFactsMargin);

    //     // Event ketika navbar ditampilkan atau disembunyikan
    //     $(".navbar-collapse").on(
    //         "shown.bs.collapse hidden.bs.collapse",
    //         updateFactsMargin
    //     );

    //     // Event ketika dropdown dibuka
    //     $(".dropdown").on("shown.bs.dropdown", updateFactsMargin);

    //     // Event ketika dropdown ditutup
    //     $(".dropdown").on("hidden.bs.dropdown", updateFactsMargin);
    // });
})(jQuery);
