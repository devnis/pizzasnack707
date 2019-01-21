// Menu carte

// selection des pizzas bases tomates
$(function () {
    $("#tomate").click(function () {
        $(".creme").hide();
        $(".bigBunn").hide();
        $(".snack").hide();
        $(".panini").hide();

        $(".tomate").show();
    });
});

// selection des pizzas base creme
$(function () {
    $("#creme").click(function () {
        $(".tomate").hide();
        $(".bigBunn").hide();
        $(".snack").hide();
        $(".panini").hide();

        $(".creme").show();
    });
});

// selection des big bunn's
$(function () {
    $("#bigBunn").click(function () {
        $(".tomate").hide();
        $(".creme").hide();
        $(".snack").hide();
        $(".panini").hide();

        $(".bigBunn").show();
    });
});

// selection des snacks
$(function () {
    $("#snack1").click(function () {
        $(".tomate").hide();
        $(".bigBunn").hide();
        $(".creme").hide();
        $(".panini").hide();

        $(".snack").show();
    });
});

// selection des panini
$(function () {
    $("#panini").click(function () {
        $(".tomate").hide();
        $(".bigBunn").hide();
        $(".snack").hide();
        $(".creme").hide();

        $(".panini").show();
    });
});

$(function () {
    $("#snack").click(function () {
        $(".tomate").hide();
        $(".creme").hide();

        $(".bigBunn").show();
        $(".snack").show();
        $(".panini").show();
    });
});

$(function () {
    $("#pizza").click(function () {
        $(".bigBunn").hide();
        $(".snack").hide();
        $(".panini").hide();

        $(".creme").show();
        $(".tomate").show();
    });
});