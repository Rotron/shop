(function($) {
    "use strict";

    /*===================================================================================*/
    /*  WOW 
    /*===================================================================================*/

    $(document).ready(function () {
        new WOW().init();
    });
    
    /*===================================================================================*/
    /*  OWL CAROUSEL
    /*===================================================================================*/

    $(document).ready(function () {
        
        var dragging = true;
        var owlElementID = "#owl-main";
        
        function fadeInReset() {
            if (!dragging) {
                $(owlElementID + " .caption .fadeIn-1, " + owlElementID + " .caption .fadeIn-2, " + owlElementID + " .caption .fadeIn-3").stop().delay(800).animate({ opacity: 0 }, { duration: 400, easing: "easeInCubic" });
            }
            else {
                $(owlElementID + " .caption .fadeIn-1, " + owlElementID + " .caption .fadeIn-2, " + owlElementID + " .caption .fadeIn-3").css({ opacity: 0 });
            }
        }
        
        function fadeInDownReset() {
            if (!dragging) {
                $(owlElementID + " .caption .fadeInDown-1, " + owlElementID + " .caption .fadeInDown-2, " + owlElementID + " .caption .fadeInDown-3").stop().delay(800).animate({ opacity: 0, top: "-15px" }, { duration: 400, easing: "easeInCubic" });
            }
            else {
                $(owlElementID + " .caption .fadeInDown-1, " + owlElementID + " .caption .fadeInDown-2, " + owlElementID + " .caption .fadeInDown-3").css({ opacity: 0, top: "-15px" });
            }
        }
        
        function fadeInUpReset() {
            if (!dragging) {
                $(owlElementID + " .caption .fadeInUp-1, " + owlElementID + " .caption .fadeInUp-2, " + owlElementID + " .caption .fadeInUp-3").stop().delay(800).animate({ opacity: 0, top: "15px" }, { duration: 400, easing: "easeInCubic" });
            }
            else {
                $(owlElementID + " .caption .fadeInUp-1, " + owlElementID + " .caption .fadeInUp-2, " + owlElementID + " .caption .fadeInUp-3").css({ opacity: 0, top: "15px" });
            }
        }
        
        function fadeInLeftReset() {
            if (!dragging) {
                $(owlElementID + " .caption .fadeInLeft-1, " + owlElementID + " .caption .fadeInLeft-2, " + owlElementID + " .caption .fadeInLeft-3").stop().delay(800).animate({ opacity: 0, left: "15px" }, { duration: 400, easing: "easeInCubic" });
            }
            else {
                $(owlElementID + " .caption .fadeInLeft-1, " + owlElementID + " .caption .fadeInLeft-2, " + owlElementID + " .caption .fadeInLeft-3").css({ opacity: 0, left: "15px" });
            }
        }
        
        function fadeInRightReset() {
            if (!dragging) {
                $(owlElementID + " .caption .fadeInRight-1, " + owlElementID + " .caption .fadeInRight-2, " + owlElementID + " .caption .fadeInRight-3").stop().delay(800).animate({ opacity: 0, left: "-15px" }, { duration: 400, easing: "easeInCubic" });
            }
            else {
                $(owlElementID + " .caption .fadeInRight-1, " + owlElementID + " .caption .fadeInRight-2, " + owlElementID + " .caption .fadeInRight-3").css({ opacity: 0, left: "-15px" });
            }
        }
        
        function fadeIn() {
            $(owlElementID + " .active .caption .fadeIn-1").stop().delay(500).animate({ opacity: 1 }, { duration: 800, easing: "easeOutCubic" });
            $(owlElementID + " .active .caption .fadeIn-2").stop().delay(700).animate({ opacity: 1 }, { duration: 800, easing: "easeOutCubic" });
            $(owlElementID + " .active .caption .fadeIn-3").stop().delay(1000).animate({ opacity: 1 }, { duration: 800, easing: "easeOutCubic" });
        }
        
        function fadeInDown() {
            $(owlElementID + " .active .caption .fadeInDown-1").stop().delay(500).animate({ opacity: 1, top: "0" }, { duration: 800, easing: "easeOutCubic" });
            $(owlElementID + " .active .caption .fadeInDown-2").stop().delay(700).animate({ opacity: 1, top: "0" }, { duration: 800, easing: "easeOutCubic" });
            $(owlElementID + " .active .caption .fadeInDown-3").stop().delay(1000).animate({ opacity: 1, top: "0" }, { duration: 800, easing: "easeOutCubic" });
        }
        
        function fadeInUp() {
            $(owlElementID + " .active .caption .fadeInUp-1").stop().delay(500).animate({ opacity: 1, top: "0" }, { duration: 800, easing: "easeOutCubic" });
            $(owlElementID + " .active .caption .fadeInUp-2").stop().delay(700).animate({ opacity: 1, top: "0" }, { duration: 800, easing: "easeOutCubic" });
            $(owlElementID + " .active .caption .fadeInUp-3").stop().delay(1000).animate({ opacity: 1, top: "0" }, { duration: 800, easing: "easeOutCubic" });
        }
        
        function fadeInLeft() {
            $(owlElementID + " .active .caption .fadeInLeft-1").stop().delay(500).animate({ opacity: 1, left: "0" }, { duration: 800, easing: "easeOutCubic" });
            $(owlElementID + " .active .caption .fadeInLeft-2").stop().delay(700).animate({ opacity: 1, left: "0" }, { duration: 800, easing: "easeOutCubic" });
            $(owlElementID + " .active .caption .fadeInLeft-3").stop().delay(1000).animate({ opacity: 1, left: "0" }, { duration: 800, easing: "easeOutCubic" });
        }
        
        function fadeInRight() {
            $(owlElementID + " .active .caption .fadeInRight-1").stop().delay(500).animate({ opacity: 1, left: "0" }, { duration: 800, easing: "easeOutCubic" });
            $(owlElementID + " .active .caption .fadeInRight-2").stop().delay(700).animate({ opacity: 1, left: "0" }, { duration: 800, easing: "easeOutCubic" });
            $(owlElementID + " .active .caption .fadeInRight-3").stop().delay(1000).animate({ opacity: 1, left: "0" }, { duration: 800, easing: "easeOutCubic" });
        }
        
        $(owlElementID).owlCarousel({
            
            autoPlay: 5000,
            stopOnHover: true,
            navigation: true,
            pagination: true,
            singleItem: true,
            addClassActive: true,
            transitionStyle: "fade",
            navigationText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
                
            afterInit: function() {
                fadeIn();
                fadeInDown();
                fadeInUp();
                fadeInLeft();
                fadeInRight();
            },
            
            afterMove: function() {
                fadeIn();
                fadeInDown();
                fadeInUp();
                fadeInLeft();
                fadeInRight();
            },
            
            afterUpdate: function() {
                fadeIn();
                fadeInDown();
                fadeInUp();
                fadeInLeft();
                fadeInRight();
            },
            
            startDragging: function() {
                dragging = true;
            },
            
            afterAction: function() {
                fadeInReset();
                fadeInDownReset();
                fadeInUpReset();
                fadeInLeftReset();
                fadeInRightReset();
                dragging = false;
            }
            
        });
        
        if ($(owlElementID).hasClass("owl-one-item")) {
            $(owlElementID + ".owl-one-item").data('owlCarousel').destroy();
        }
        
        $(owlElementID + ".owl-one-item").owlCarousel({
            singleItem: true,
            navigation: false,
            pagination: false
        });
        
        $('#transitionType li a').click(function () {
            
            $('#transitionType li a').removeClass('active');
            $(this).addClass('active');
            
            var newValue = $(this).attr('data-transition-type');
            
            $(owlElementID).data("owlCarousel").transitionTypes(newValue);
            $(owlElementID).trigger("owl.next");
            
            return false;
            
        });

        $("#owl-recently-viewed").owlCarousel({
            stopOnHover: true,
            rewindNav: true,
            items: 6,
            pagination: false,
            itemsTablet: [768,3]
        });

        $("#owl-recently-viewed-2").owlCarousel({
            stopOnHover: true,
            rewindNav: true,
            items: 4,
            pagination: false,
            itemsTablet: [768,3],
            itemsDesktopSmall: [1199,3],
        });

        $("#owl-brands").owlCarousel({
            stopOnHover: true,
            rewindNav: true,
            items: 6,
            pagination: false,
            itemsTablet : [768, 4]
        });

        $('#owl-single-product').owlCarousel({
            singleItem: true,
            pagination: false
        });

        $('#owl-single-product-thumbnails').owlCarousel({
            items: 6,
            pagination: false,
            rewindNav: true,
            itemsTablet : [768, 4]
        });

        $('#owl-recommended-products').owlCarousel({
            rewindNav: true,
            items: 4,
            pagination: false,
            itemsTablet: [768, 3],
            itemsDesktopSmall: [1199,3],
        });

        $('.single-product-slider').owlCarousel({
            stopOnHover: true,
            rewindNav: true,
            singleItem: true,
            pagination: false
        });
        
        $(".slider-next").click(function () {
            var owl = $($(this).data('target'));
            owl.trigger('owl.next');
            return false;
        });
        
        $(".slider-prev").click(function () {
            var owl = $($(this).data('target'));
            owl.trigger('owl.prev');
            return false;
        });

        $('.single-product-gallery .horizontal-thumb').click(function(){
            var $this = $(this), owl = $($this.data('target')), slideTo = $this.data('slide');
            owl.trigger('owl.goTo', slideTo);
            $this.addClass('active').parent().siblings().find('.active').removeClass('active');
            return false;
        });
        
    });

    /*===================================================================================*/
    /*  STAR RATING
    /*===================================================================================*/

    $(document).ready(function () {

        if ($('.star').length > 0) {
            $('.star').each(function(){
                    var $star = $(this);
                    
                    if($star.hasClass('big')){
                        $star.raty({
                            starOff: 'assets/images/star-big-off.png',
                            starOn: 'assets/images/star-big-on.png',
                            space: false,
                            score: function() {
                                return $(this).attr('data-score');
                            }
                        });
                    }else{
                     $star.raty({
                        starOff: 'assets/images/star-off.png',
                        starOn: 'assets/images/star-on.png',
                        space: false,
                        score: function() {
                            return $(this).attr('data-score');
                        }
                    });
                }
            });
        }
    });

    /*===================================================================================*/
    /*  SHARE THIS BUTTONS
    /*===================================================================================*/

    /*$(document).ready(function () {
        if($('.social-row').length > 0){
            stLight.options({publisher: "2512508a-5f0b-47c2-b42d-bde4413cb7d8", doNotHash: false, doNotCopy: false, hashAddressBar: false});
        }
    });*/

    /*===================================================================================*/
    /*  CUSTOM CONTROLS
    /*===================================================================================*/

    $(document).ready(function () {
        $('.close-btn').click(function(){
            var id = $(this).data('product');
            $('.cart-delete').click(function(){
                console.log(id);
                $.post( "/cart/update", {
                    productId: id,
                    quantity: 0})
                .done(function( data ) {
                    window.location.replace("/cart");
                    //$('.cart-cancel-delete').click();
                });
            });

            $('.cart-wishlist').click(function(){
                alert(productId);
            });
        });


        
        // Select Dropdown
        if($('.le-select').length > 0){
            $('.le-select select').customSelect({customClass:'le-select-in'});
        }

        // Checkbox
        if($('.le-checkbox').length>0){
            $('.le-checkbox').after('<i class="fake-box"></i>');
        }

        //Radio Button
        if($('.le-radio').length>0){
            $('.le-radio').after('<i class="fake-box"></i>');
        }

        // Buttons
        $('.le-button.disabled').click(function(e){
            e.preventDefault();
        });

        // Quantity Spinner
        $('.le-quantity a').click(function(e){
            e.preventDefault();
            var currentQty = $(this).parent().parent().find('input[name=quantity]').val();
            var price = $(this).parent().parent().parent().parent().parent().find('.price span').text();

            if( $(this).hasClass('minus') && currentQty>1){
                $(this).parent().parent().find('input[name=quantity]').val(parseInt(currentQty, 10) - 1);

            }else{
                if( $(this).hasClass('plus')){
                    $(this).parent().parent().find('input[name=quantity]').val(parseInt(currentQty, 10) + 1);
                }
            }

            currentQty = $(this).parent().parent().find('input[name=quantity]').val();

            $(this).parent().parent().parent().parent().parent().find('.total-price span').text(currentQty * price);

            $.post( "/cart/update", {
                productId: $(this).parent().children('input[name=product_id]').val(),
                quantity: $(this).parent().children('input[name=quantity]').val()})
            .done(function( data ) {
                $('#total-price .value span').text(data.total);
                //$(this).parent().parent().parent().parent().parent().css('background', 'yellow');
                $('.total-price .value').text(data.total);
            });

        });

        //Add to cart
        $('.add-cart-button a').click(function(){
            var id = $(this).parent().find('input[name=product_id]').val();
            $.post( "/cart/add", {
                productId: id,
                name: $(this).parent().parent().parent().find('.title a').text(),
                price: $(this).parent().parent().parent().find('.price-current span').text()})
            .done(function( data ) {
                window.location.replace('/product/' + data.link);
            });
        });

        // Price Slider
        if ($('.price-slider').length > 0) {
            $('.price-slider').slider({
                min: 100,
                max: 700,
                step: 10,
                value: [100, 400],
                handle: "square"

            });
        }

        // Data Placeholder for custom controls

        $('[data-placeholder]').focus(function() {
            var input = $(this);
            if (input.val() == input.attr('data-placeholder')) {
                input.val('');

            }
        }).blur(function() {
            var input = $(this);
            if (input.val() === '' || input.val() == input.attr('data-placeholder')) {
                input.addClass('placeholder');
                input.val(input.attr('data-placeholder'));
            }
        }).blur();

        $('[data-placeholder]').parents('form').submit(function() {
            $(this).find('[data-placeholder]').each(function() {
                var input = $(this);
                if (input.val() == input.attr('data-placeholder')) {
                    input.val('');
                }
            });
        });

    });

    /*===================================================================================*/
    /*  LIGHTBOX ACTIVATOR
    /*===================================================================================*/
    $(document).ready(function(){
        if ($('a[data-rel="prettyphoto"]').length > 0) {
            //$('a[data-rel="prettyphoto"]').prettyPhoto();
        }
    });


    /*===================================================================================*/
    /*  SELECT TOP DROP MENU
    /*===================================================================================*/
    $(document).ready(function() {
        $('.top-drop-menu').change(function() {
            var loc = ($(this).find('option:selected').val());
            window.location = loc;
        });
    });

    /*===================================================================================*/
    /*  LAZY LOAD IMAGES USING ECHO
    /*===================================================================================*/
    $(document).ready(function(){
        echo.init({
            offset: 100,
            throttle: 250,
            unload: false
        });
    });

    /*===================================================================================*/
    /*  GMAP ACTIVATOR
    /*===================================================================================*/

    $(document).ready(function(){
        var zoom = parseInt($('input[name="zoom"]').val());
        var latitude = parseFloat($('input[name="latitude"]').val());
        var longitude = parseFloat($('input[name="longitude"]').val());
        var mapIsNotActive = true;
        setupCustomMap();

        function setupCustomMap() {
            if ($('.map-holder').length > 0 && mapIsNotActive) {

                var styles = [
                    {
                        "featureType": "landscape",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "visibility": "simplified"
                            },
                            {
                                "color": "#E6E6E6"
                            }
                        ]
                    }, {}
                ];
                
                var lt, ld;
                if ($('.map').hasClass('center')) {
                    lt = (latitude);
                    ld = (longitude);
                } else {
                    lt = (latitude + 0.0027);
                    ld = (longitude - 0.010);
                }

                var options = {
                    mapTypeControlOptions: {
                        mapTypeIds: ['Styled']
                    },
                    center: new google.maps.LatLng(lt, ld),
                    zoom: zoom,
                    disableDefaultUI: true,
                    scrollwheel: false,
                    mapTypeId: 'Styled'
                };
                var div = document.getElementById('map');

                var map = new google.maps.Map(div, options);

                var styledMapType = new google.maps.StyledMapType(styles, {
                    name: 'Styled'
                });

                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(latitude, longitude),
                    map: map
                });
                
                map.mapTypes.set('Styled', styledMapType);

                mapIsNotActive = false;
            }

        }
    });

    /*===================================================================================*/
    /*  SHOP
    /*===================================================================================*/

    var validateEmail = function (email) {
        var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
        return re.test(email);
    }

    $(document).ready(function () {
        var email = $(".billing-address input[name=email]");
        var comment = $(".billing-address textarea[name=comment]");

        var validator = $('#order-form').validate({
            rules: {
                firstname: {
                    required: true,
                    minlength: 2,
                },

                lastname: {
                    required: true,
                    minlength: 2,
                },

                address: {
                    required: true,
                    minlength: 5,
                },

                email: {
                    required: true,
                    email: true,
                    remote: {
                        url: "/user/exist",
                        type: "post",
                        data: {
                            email: function(){
                                return $( "#email" ).val();
                            } 
                        },
                        dataFilter: function (data) {
                            var json = JSON.parse(data);

                            if (json.userExist) {
                                email.popover('show');
                                email.popover().off('click');
                                $('#authorization').click(function(){
                                    $(".sign-in input[name=email]").val(email.val());
                                    $('#old-client').click();
                                })
                                email.focusout(function(){
                                    email.popover('show');
                                    $('#authorization').click(function(){
                                        $(".sign-in input[name=email]").val(email.val());
                                        $('#old-client').click();
                                    })
                                })

                                email.change(function(){
                                    email.popover('show');
                                    $('#authorization').click(function(){
                                        $(".sign-in input[name=email]").val(email.val());
                                        $('#old-client').click();
                                    })
                                })

                                $("#email-error").hide();
                            } else {
                                email.off('change');
                                email.off('focusout');
                                email.popover('hide');
                                return true;
                            }
                        }
                    }
                },

                phone: {
                    required: true,
                    minlength: 5,
                },

            },
            highlight: function (element, errorClass, validClass) {
                
                if (element.name == 'email') {
                    var error = validator.errorList[0];
                    if (error.method === 'email' || error.method === 'required' ) {
                        email.popover('hide');
                    }
                };
            },
            success: function (element) {
            },
        });

        function getURLParameter(name) {
          return decodeURIComponent((new RegExp('[?|&]' + name + '=' + '([^&;]+?)(&|#|;|$)').exec(location.search)||[,""])[1].replace(/\+/g, '%20'))||null;
        }

        $('#search-category-list li a').click(function(){
            var category = $(this).text();
            var id = $(this).data('id');

            if (category.length > 15) {
                category = category.substring(0, 15) + '...';
            }

            $('#search-category-title').text(category);
            $('#search-category-id').val(id);
        });

        var category = getURLParameter('category');
        if (category) {
            $('#category-' + category).click();
        }

        $('#authorization').click(function(){
            $(".sign-in input[name=email]").val(email.val());
            $('#old-client').click();
            return false;
        })

        var validator = $('#password-remind').validate({
            rules: {
                email: {
                    required: true,
                    email: true,
                    remote: {
                        url: "/user/exist",
                        type: "post",
                        data: {
                            email: function(){
                                return $( "input[name=email]" ).val();
                            } 
                        },
                        dataFilter: function (data) {
                            var json = JSON.parse(data);

                            if (!json.userExist) {
                                return false; 
                            } else {
                                return true;
                            }
                        }
                    }
                },
            },
          messages: {
            email: {
              remote: "Пользователь с таким Email адресом не зарегистрирован."
            }
          }
        });

        var validator = $('#password-reset').validate({
            rules: {
                email: {
                    required: true,
                    email: true,
                    remote: {
                        url: "/user/exist",
                        type: "post",
                        data: {
                            email: function(){
                                return $( "input[name=email]" ).val();
                            } 
                        },
                        dataFilter: function (data) {
                            var json = JSON.parse(data);

                            if (!json.userExist) {
                                return false; 
                            } else {
                                return true;
                            }
                        }
                    }
                },

                password: {
                    minlength: 6,
                    maxlength: 32,
                },

                password_confirmation: {
                    minlength: 6,
                    maxlength: 32,
                    equalTo : "#password"
                },
            },
            messages: {
                email: {
                  remote: "Пользователь с таким Email адресом не зарегистрирован."
                }
            }
        });

        var validator = $('#login').validate({
            rules: {
                email: {
                    required: true,
                    email: true,
                    remote: {
                        url: "/user/exist",
                        type: "post",
                        data: {
                            email: function(){
                                return $( "input[name=email]" ).val();
                            } 
                        },
                        dataFilter: function (data) {
                            var json = JSON.parse(data);

                            if (!json.userExist) {
                                return false; 
                            } else {
                                return true;
                            }
                        }
                    }
                },
                password: {
                    required: true,
                    minlength: 6,
                    maxlength: 32,
                },
            },
          messages: {
            email: {
              remote: "Пользователь с таким Email адресом не зарегистрирован."
            }
          }
        });

        var validator = $('#registration').validate({
            rules: {
                firstname: {
                    required: true,
                    minlength: 2,
                },
                email: {
                    required: true,
                    email: true,
                    remote: {
                        url: "/user/exist",
                        type: "post",
                        data: {
                            email: function(){
                                return $( "input[name=email]" ).val();
                            } 
                        },
                        dataFilter: function (data) {
                            var json = JSON.parse(data);

                            if (json.userExist) {
                                return false; 
                            } else {
                                return true;
                            }
                        }
                    }
                },
                password: {
                    required: true,
                    minlength: 6,
                    maxlength: 32,
                },
            },
            messages: {
                email: {
                  remote: "Пользователь с таким Email уже зарегистрирован."
                }
            }
        });

    });

})(jQuery);

jQuery.extend(jQuery.validator.messages, {
    required: "Это поле обязательно к заполнению.",
    remote: "Пожалуйста, исправьте это поле.",
    email: "Пожалуйста, введите действительный адрес электронной почты.",
    url: "Пожалуйста, введите URL-адрес.",
    date: "Пожалуйста, введите дату.",
    dateISO: "Пожалуйста, введите дату (ISO).",
    number: "Пожалуйста, введите правильный номер.",
    digits: "Пожалуйста, введите только цифры.",
    creditcard: "Пожалуйста, введите действительный номер кредитной карты.",
    equalTo: "Пожалуйста, введите то же значение снова.",
    accept: "Пожалуйста, введите значение с допустимым расширением.",
    maxlength: jQuery.validator.format("Пожалуйста, введите не более {0} символов."),
    minlength: jQuery.validator.format("Пожалуйста, введите по крайней мере {0} символов."),
    rangelength: jQuery.validator.format("Пожалуйста, введите значение между {0} и {1} символов."),
    range: jQuery.validator.format("Пожалуйста, введите значение между {0} и {1}."),
    max: jQuery.validator.format("Пожалуйста, введите значение меньше или равное {0}."),
    min: jQuery.validator.format("Пожалуйста, введите значение, большее или равное {0}.")
});
