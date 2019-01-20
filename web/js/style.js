// Menu carte
$(function () {
    $("#tomate").click(function () {
        $(".creme").hide();
        $(".bigBunn").hide();
        $(".snack").hide();
        $(".panini").hide();

        $(".tomate").show();
    });
});

$(function () {
    $("#creme").click(function () {
        $(".tomate").hide();
        $(".bigBunn").hide();
        $(".snack").hide();
        $(".panini").hide();

        $(".creme").show();
    });
});

$(function () {
    $("#bigBunn").click(function () {
        $(".tomate").hide();
        $(".creme").hide();
        $(".snack").hide();
        $(".panini").hide();

        $(".bigBunn").show();
    });
});

$(function () {
    $("#snack1").click(function () {
        $(".tomate").hide();
        $(".bigBunn").hide();
        $(".creme").hide();
        $(".panini").hide();

        $(".snack").show();
    });
});

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