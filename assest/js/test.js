// $('.testbtn').click((e) => {
//     console.log(e);
//     var value = e.currentTarget.value;
//     e.currentTarget.classList.add('testactive')
//     console.log(value);
// });

var allitem = $("#btns").children();

allitem.each((i, item) => {
  $(item).click((el) => {
    var ele = $(el.currentTarget);

    if (ele.hasClass("testactive")) {
      ele.removeClass("testactive");
    } else {
      ele.addClass("testactive");
    }
  });
});
