$(function () {
    //객체 변수
    var container = $(".slideshow");
    var slideGroup = container.find(".slideshow_img");
    var slide = slideGroup.find("a");
    var nav = container.find(".slideshow_nav");
    var prev = nav.find(".prev");
    var next = nav.find(".next");
    var currentIndex = -1;
    var indicator = container.find(".slideshow_indicator");
    var aindicator = indicator.find("a");
    var intervaleObject;
    //이미지에 슬라이드로 움직이는 순서를주는 기능 구현
    //eq 인덱스에 이미지순서를 부여해서 슬라이드를 순서대로 움직이게 세팅해준다.
    for (var index = 0; index < slide.length; index++) {
        var indexleft = index * 100 + "%";
        slide.eq(index).css("left", indexleft);
    }

    //이미지애니메이션을 자동으로 보여주는 함수
    function gotoslide(index) {

        slideGroup.animate({left: -100 * index + "%"}, 500, "swing");
        aindicator.removeClass('active');
        aindicator.eq(index).addClass("active");
        switch (index) {
            case 0:
                prev.hide();
                next.show();
                break;
            case 3:
                next.hide();
                prev.show();
                break;
            default:
                prev.show();
                next.show();
                break;
        }
    }

    function startTimer() {
        intervaleObject = setInterval(function () {
            var nextIndex = (currentIndex + 1) % 4;
            currentIndex = nextIndex;
            gotoslide(nextIndex);
        }, 2000);
    }

    function stopTimer() {
        clearInterval(intervaleObject);
    }

    container.mouseenter(function () {
        stopTimer();
    });
    //+++++++++++++++++++++++++++++++

    container.mouseleave(function () {
        startTimer();
    });
    //++++++++++++++++++++++++++++++++

    prev.on("click", function () {
        if (currentIndex !== 0) {
            currentIndex -= 1;
        }
        gotoslide(currentIndex);
    });

    next.on("click", function () {
        if (currentIndex !== slide.length - 1) {
            currentIndex += 1;
        }
        gotoslide(currentIndex);
    });

    aindicator.on("click", function () {
        cb = $(this).index();
        gotoslide(cb);
    });

    startTimer();
});