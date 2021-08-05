$(function() {

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });


  // $("#Avatar").change(function() {
  // 	var file = this.files[0];
  // 	var fileType = file.type;
  // 	var fileSize = file.size;
  // 	var checkType = /(jpg|jpeg|png|gif|JPG|JPEG|PNG|GIF)$/i;
  // 	$("#pathAvatar").val($(this).val());
  // 	if(!checkType.exec(fileType)){
  // 		$("#messageAvatar").addClass('text-danger');
  // 		$("#messageAvatar").html("Chỉ upload file có định dạng: jpg, jpeg, png, gif");
  // 		this.value = '';

  // 		$("#submitProduct").prop("disabled", true);
  // 		return false;
  // 	}
  // 	if(fileSize > 2*1024*1024){
  // 		$("#messageAvatar").addClass('text-danger');
  // 		$("#messageAvatar").html("Vui lòng chọn file dưới 2MB");
  // 		this.value = '';
  // 		$("#submitProduct").prop("disabled", true);
  // 		return false;
  // 	}else {
  // 		$("#submitProduct").prop("disabled", false);
  // 		$("#messageAvatar").addClass('text-success');
  // 		$("#messageAvatar").html("File hợp lệ");
  // 	}		
  // });
  // $("#Library").change(function () {
  // 	var result = true;
  // 	var file = this.files;
  // 	for (var i = 0; i < file["length"]; i++) {
  // 		var fileType = file[i].type;
  // 		var fileSize = file[i].size;
  // 		var checkType = /(jpg|jpeg|png|gif|JPG|JPEG|PNG|GIF)$/i;
  // 		$("#pathLibrary").val($(this).val());
  // 		if(!checkType.exec(fileType)){
  // 			$("#messageLibrary").addClass('text-danger');
  // 			$("#messageLibrary").html("Chỉ upload file có định dạng: jpg, jpeg, png, gif");
  // 			result = false;
  // 			$("#submitProduct").prop("disabled", true);
  // 			break;
  // 		}
  // 		if(fileSize > 2*1024*1024){
  // 			$("#messageLibrary").addClass('text-danger');
  // 			$("#messageLibrary").html("Vui lòng chọn những file dưới 2MB");
  // 			result = false;
  // 			$("#submitProduct").prop("disabled", true);
  // 			break;
  // 		}	
  // 	}
  // 	if (result == true) {
  // 		$("#submitProduct").prop("disabled", false);
  // 		$("#messageLibrary").removeClass('text-danger');
  // 		$("#messageLibrary").addClass('text-success');
  // 		$("#messageLibrary").html("File hợp lệ");
  // 	};
  // })
  // show views img

  var sync1 = $("#sync1");
  var sync2 = $("#sync2");
  sync1.owlCarousel({
      nav: true,
      items: 1,
      dots: false,
      autoplayHoverPause: true,
      autoplay: true,
      autoplayTimeout: 5000,
      rewind: true,
      startPosition: 0,
      responsiveRefreshRate: 200,
    }).on('changed.owl.carousel', syncPosition)
    .on("click", ".owl-nav", function(el) {
      // body...
    });

  // $(".home-banner").mouseenter( function () {  
  //   $("#sync1 .owl-nav").removeClass("disabled");
  // }).mouseleave( function () {
  //   $("#sync1 .owl-nav").addClass("disabled");
  // })

  $(".home-banner").mouseenter(function() {
    $("#sync1 .owl-nav > *").css("display", "block");
  }).mouseleave(function() {
    $("#sync1 .owl-nav > *").css("display", "none");
  })

  $(".banner").mouseenter(function() {
    $(".banner .owl-nav > *").css("display", "block");
  }).mouseleave(function() {
    $(".banner .owl-nav > *").css("display", "none");
  })

  sync2.on('initialized.owl.carousel', function() {
    sync2.find(".owl-item").eq(0).addClass("synced");
  }).owlCarousel({
    nav: false,
    items: 5,
    dots: false,
    slideBy: 5,
    rewind: true,
    responsiveRefreshRate: 100,
  }).on("click", ".owl-item", function(el) {
    el.preventDefault();
    var number = $(this).index();
    sync1.data('owl.carousel').to(number, 300, true);

  });

  function syncPosition(el) {
    var count = el.item.count - 1;
    // var current = Math.round(el.item.index - (el.item.count/2));
    //console.log("current before if: " + el.item.index);
    var current = el.item.index;
    // if(current < 0) {
    //   current = count;
    // }
    // if(current > count) {
    //   current = 0;
    // }
    // console.log("current afrer if: " + current);

    $("#sync2")
      .find(".owl-item")
      .removeClass("synced")
      .eq(current)
      .addClass("synced");

    if ($("#sync2").data("owl.carousel") !== undefined) {
      var lenghtOption = sync2.find('.owl-item').length;
      var listObj = sync2.find('.owl-item.active');
      var listIndex = [];
      for (var i = 0; i < 5; i++) {
        listIndex[i] = listObj.eq(i).index();
      };
      center(current, listIndex, lenghtOption);
    }
  }

  function center(number, array, end) {
    var found = false;
    var num = number;
    var listIndex = array;
    for (var i in listIndex) {
      if (num === listIndex[i]) {
        var found = true;
      }
    }
    if (found === false) {
      if (num > listIndex[listIndex.length - 1]) {
        if (num === 7) {
          sync2.data('owl.carousel').to(end - listIndex.length, 100, true);
        } else {
          sync2.data('owl.carousel').to(num - listIndex.length + 2, 100, true);
        }
        // console.log("current out ListIndex: th1");
      } else {
        if (num - 1 === -1) {
          num = 0;

        }
        sync2.data('owl.carousel').to(num, 100, true);
        // console.log("current out ListIndex: th2");
      }
    } else if (num === listIndex[listIndex.length - 1]) {
      // console.log("current == ListIndex end");
      if (num === end - 1) {
        sync2.data('owl.carousel').to(listIndex[1] - 1, 100, true);
      } else {
        sync2.data('owl.carousel').to(listIndex[1], 100, true);
      };

    } else if (num === listIndex[0]) {
      if (num === 0) {
        sync2.data('owl.carousel').to(0, 100, true);
      } else {
        sync2.data('owl.carousel').to(num - 1, 100, true);
      };
      // console.log("current == ListIndex star");
    } else {
      // console.log("k làm gì cả");
    }
  }

  // slide-right
  $("#slide-right-1, #slide-right-2, #post-slide").owlCarousel({
      nav: false,
      items: 1,
      dots: false,
      autoplayHoverPause: true,
      autoplay: true,
      autoplayTimeout: 5000,
      rewind: true,
      startPosition: 0,
      responsiveRefreshRate: 200,
    })
    // carousel prd
  $("#owl-promo, .acc, .swatch, .fwatch, #owl-promo-old, #owl-laptop,.slide-product").owlCarousel({
    items: 5,
    nav: true,
    dots: false,
    slideBy: 5,
    rewind: true,
    responsiveRefreshRate: 200,
  });
  // // slide owl-home
  $("#owl-home, #owl-detail").owlCarousel({
    items: 1,
    nav: true,
    dots: true,
    rewind: true,
    autoplayHoverPause: true,
    autoplay: true,
    autoplayTimeout: 5000,
    responsiveRefreshRate: 200,
  });

  $(".owl-watch").owlCarousel({
    items: 4,
    nav: true,
    dots: false,
    rewind: true,
    responsiveRefreshRate: 200,
  });
  $(".owl-watch-couple").owlCarousel({
    items: 3,
    nav: true,
    dots: false,
    rewind: true,
    responsiveRefreshRate: 200,
  });

  $("#owl-detail").mouseenter(function() {
    $("#owl-detail .owl-nav").css("display", "block");
  }).mouseleave(function() {
    $("#owl-detail .owl-nav").css("display", "none");
  })

  //  show filter-feature
  $(".js-filter-feature").click(function() {
    $(".js-content-sort").css("display", "none");
    $(this).next().slideToggle(500, "linear");
  });

  //close content-feature
  $(".closefeature").click(function() {
    $(this).parent().slideUp(500, "linear");
  });
  //  show filter-feature- more
  $(".filter-feature-more").click(function() {
    $(this).css("display", "none");
    $(this).next().slideToggle(500, "linear");
  });

  //mobile-sort
  $(".js-trademark").click(function() {
    if ($(this).hasClass('check')) {
      $(this).removeClass("check");
      console.log("xóa");
    } else {
      $(this).addClass("check");
      console.log("thêm");
    };
  });

  $(".js-sort").click(function() {
    $(".js-content-feature").css("display", "none");
    $(this).next().slideToggle(500, "linear");
  });

  $(".js-closefilter").click(function() {
    $(this).parent().slideUp(500, "linear");
  });

  //shơ nội dung khi chọn trong vipservices
  $(".js-show-vipservices").change(function() {
    var show_more = $(this).parent().parent().next();
    $(show_more).slideToggle(500, "linear");
  });
  //  chọn màu sản phẩm (detail)
  $(".js-chosse-color").change(function() {
    var option = $(this).parent().parent().parent();
    if ($(this).prop("checked") == true) {
      $(option).addClass("check");
    } else {
      $(option).removeClass("check");
    }
  });
  // xem thêm bài viết trong detail
  $(".js-read-more").click(function() {
    $(this).prev().css("height", "auto");
    $(this).css("display", "none");
  });
  // chọn màu khi đặt hàng
  $(".js-cart-color").click(function() {
    $(this).next().slideToggle("slow");
  });
  //  thay đỏi kết quae sau khi chọn màu đặt hàng
  // $(".js-color-item").click(function () {

  // });
  // hàm xử lý kiểu tiền tệ 
  const FormatCurrency = function(olded, discount = 0, char = '.') {
    var result = "";
    if (discount != 0) {
      var number = olded * (100 - discount) / 100;
    } else {
      var number = olded;
    }
    number = number.toString(10);
    var index = 0;
    for (var i = number.length - 1; i >= 0; i--) {
      if (index < 3) {
        result += "0";
      } else if (index == 3 || index == 6) {
        result += char + number[i];
      } else if (index == 4 && number[i + 1] > 5) {
        result += number[i] + 1;
      } else {
        result += number[i];
      };
      index++;
    };
    result = result.split("").reverse().join("");
    return result;
  };

  // số lượng(quantity) khi order
  $(".js-change-quantity").click(function() {
    let current = $(this).data("change");
    let id = $(this).data('id');
    let url = $(this).data('url');
    let quantity = Number($('#js-quantity' + id).text());
    if (current == "abate") {
      $(`.augment[data-id="${id}"]`).addClass("active");
      if (quantity == 1) {
        return true;
      } else if (quantity == 2) {
        $('#js-quantity' + id).text(1);
        $(this).removeClass("active");
      } else {
        $('#js-quantity' + id).text(quantity - 1);
        $(this).addClass("active");
      }
    } else {
      $(`.abate[data-id="${id}"]`).addClass("active");
      if (quantity == 5) {
        $(this).removeClass("active");
        return true;
      } else if (quantity == 4) {
        $('#js-quantity' + id).text(5);
        $(this).removeClass("active");
      } else {
        $('#js-quantity' + id).text(quantity + 1);
        $(this).addClass("active");
      }
    }
    $.ajax({
      url: url,
      type: "POST",
      dataType: 'json',
      async: false,
      success: function(data) {
        $("#js-total").text(FormatCurrency(data['total'], 0, ".") + "₫");
        $("#js-discount").text("- " + FormatCurrency(data['discount'], 0, ".") + "₫");
        $("#js-total-payment").text(FormatCurrency(data['total'] - data['discount'], 0, ".") + "₫");
      },
      error: function(error) {}
    });
  });
  // Xóa sản phẩm
  $(".js-delete").click(function(event) {
    event.preventDefault();
    let id = $(this).data('id');
    let url = $(this).data("url");
    $.ajax({
      url: url,
      type: "POST",
      dataType: 'json',
      async: false,
      success: function(data) {
        if (data['total'] == 0) {
          window.location.reload();
        }
        $("#js-total").text(FormatCurrency(data['total'], 0, ".") + "₫");
        $("#js-discount").text("- " + FormatCurrency(data['discount'], 0, ".") + "₫");
        $("#js-total-payment").text(FormatCurrency(data['total'] - data['discount'], 0, ".") + "₫");
        $("#js-count-cart").html(data['count']);
      },
      error: function(error) {}
    });
    $("#js-order-item" + id).remove();
  });

  $(".buy-now").click(function(event) {
    // event.preventDefault();
    let url = $(this).data('url');
    $.ajax({
      url: url,
      type: "POST",
      dataType: 'json',
      async: false,
      success: function(data) {},
      error: function(error) {}
    });
  })

  $('#js-customer-name').on('keyup', function() {
    let name = $.trim($(this).val());
    if (name == '') {
      $(this).addClass('error');
      $(this).next('.text-error').text('Vui lòng nhập họ và tên!');
    } else {
      $(this).next('.text-error').text('');
      $(this).removeClass('error');
    }
  });

  $("#js-delivery-address").on('keyup', function() {
    let address = $.trim($(this).val());
    if (address == '') {
      $(this).addClass('error');
      $(this).next('.text-error').text('Vui lòng nhập địa chỉ nhận hàng!');
    } else {
      $(this).next('.text-error').text('');
      $(this).removeClass('error');
    }
  });

  $('#js-customer-phone').on('keyup', function() {
    let vnf_regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
    let phone = $(this).val();
    if (phone != "") {
      if (!vnf_regex.test(phone)) {
        $(this).addClass('error');
        $(this).next('.text-error').text('Số điện thoại không đúng định dạng!');
      } else {
        $(this).next('.text-error').text('');
        $(this).removeClass('error');
      }
    } else {
      $(this).addClass('error');
      $(this).next('.text-error').text('Vui lòng số điện thoại!');
    }
  });

  $('#js-customer-email').on('keyup', function() {
    let email = $(this).val();
    if (email != "") {
      let regex = /[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/;
      if (!regex.test(email)) {
        $(this).addClass('error');
        $(this).next('.text-error').text('Vui lòng nhập đúng địa chỉ email.');
      } else {
        $(this).next('.text-error').text('');
        $(this).removeClass('error');
      }
    } else {
      $(this).addClass('error');
      $(this).next('.text-error').text('Vui lòng nhập email!')
    }
  });

  $("#js-pay-offline").click(function(event) {
    event.preventDefault();
    let check = true;
    let name = $.trim($("#js-customer-name").val());
    let phone = $.trim($("#js-customer-phone").val());
    let email = $.trim($("#js-customer-email").val());
    //  address
    let province = $.trim($("#js-province").val());
    let district = $.trim($("#js-district").val());
    let commune = $.trim($("#js-commune").val());
    let deliveryAddress = $.trim($("#js-delivery-address").val());
    // 
    if (name == '') {
      $("#js-customer-name").addClass('error');
      $("#js-customer-name").next('.text-error').text('Vui lòng nhập họ và tên!');
      check = false;
    } else {
      $("#js-customer-name").next('.text-error').text('');
      $("#js-customer-name").removeClass('error');
    }
    if (phone != "") {
      let vnf_regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
      if (!vnf_regex.test(phone)) {
        $("#js-customer-phone").addClass('error');
        $("#js-customer-phone").next('.text-error').text('Số điện thoại không đúng định dạng!');
        check = false;
      } else {
        $("#js-customer-phone").next('.text-error').text('');
        $("#js-customer-phone").removeClass('error');
      }
    } else {
      $("#js-customer-phone").addClass('error');
      $("#js-customer-phone").next('.text-error').text('Vui lòng số điện thoại!');
      check = false;
    }
    if (email != "") {
      let regex = new RegExp('[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$')
      if (!regex.test(email)) {
        $("#js-customer-email").addClass('error');
        $("#js-customer-email").next('.text-error').text('Vui lòng nhập đúng địa chỉ email!.');
        check = false;
      } else {
        $("#js-customer-email").next('.text-error').text('');
        $("#js-customer-email").removeClass('error');
      }
    } else {
      $("#js-customer-email").addClass('error');
      $("#js-customer-email").next('.text-error').text('Vui lòng nhập email!');
      check = false;
    }
    if (province == "") {
      $("#js-province").addClass("error");
      $("#js-province").next('.text-error').text('Vui lòng chọn Tỉnh/Thành phố!');
      check = false;
    } else {
      $("#js-province").removeClass("error");
      $("#js-province").next('.text-error').text('');
    }
    if (district == "") {
      $("#js-district").addClass("error");
      $("#js-district").next('.text-error').text('Vui lòng chọn Quận/Huyện!');
      check = false;
    } else {
      $("#js-district").removeClass("error");
      $("#js-district").next('.text-error').text('');
    }
    if (commune == "") {
      $("#js-commune").addClass("error");
      $("#js-commune").next('.text-error').text('Vui lòng chọn Phường/Xã!');
      check = false;
    } else {
      $("#js-commune").removeClass("error");
      $("#js-commune").next('.text-error').text('');
    }
    if (deliveryAddress == "") {
      $("#js-delivery-address").addClass("error");
      $("#js-delivery-address").next('.text-error').text('Vui nhập địa chỉ nhận hàng!');
      check = false;
    } else {
      $("#js-delivery-address").removeClass("error");
      $("#js-delivery-address").next('.text-error').text('');
    }
    if (check) {
      let url = $(this).data('url');
      $.ajax({
        url: url,
        type: "POST",
        dataType: 'json',
        async: false,
        data: $("#js-form-order").serialize(),
        beforeSend: function() {
          $('#js-pay-offline').attr("disabled", "disabled");
          $('#js-form-order').css("opacity", ".5");
        },
        success: function(data) {
          $('#js-pay-offline').removeAttr("disabled");
          alert("Bạn đã đặt hàng thành công! Sẽ có Nhân viên liện hệ xác nhận đơn hàng");
          window.location.reload();
        },
        error: function(error) {}
      });
    } else {
      alert("Vui lòng kiểm tra, và điền đúng thông tin khách hàng!");
    }

  });
  // update acitve order
  $("#js-update-active").change(function() {
    alert("hello");
  })


  // add text counpon-code
  $("#js-text-code").click(function() {
    $(this).next().slideToggle(500, "linear");
  });

  // cart address
  $(".js-change-address").change(function() {
    var checked = $(this).prop("checked");
    var name = $(this).attr("data-name");
    $(".js-received-market").toggle(0, "linear");
    $(".js-delivery-address").toggle(0, "linear");
  });

  // phụ kiện show -accessorys
  $(".js-view-more-accessorys").click(function() {
    $(".js-show-accessory").show();
    $(".js-view-more-accessorys").hide();
  });

  // Laptop news-post
  $(".js-show-content").click(function() {
    $(".js-show-content").removeClass("tab-active");
    $(this).addClass("tab-active");
    var obj = $(this).attr("data-id");
    if (obj == "1") {
      $(".js-video").show();
      $(".js-news").hide();
      $(".js-tutorial").hide();
    } else if (obj == "2") {
      $(".js-news").show();
      $(".js-video").hide();
      $(".js-tutorial").hide();
    } else if (obj == "3") {
      $(".js-tutorial").show();
      $(".js-video").hide();
      $(".js-news").hide();
    }
  });

  //  tabs in fwatch
  $(".tab-watch button").click(function() {
    if (!$(this).hasClass('current')) {
      $(".tab-watch button").removeClass('current');
      $(this).addClass("current");
      $(".tab-watch + div a b").text($(this).text());
      $(".navigat ~ .contents").removeClass('current');
      $("#" + $(this).data("tab")).addClass("current");
    }
  })



  // show footer link
  var toggle = false;
  $("#showmore").click(function() {
    var links = document.getElementsByClassName("footer-link");
    var i = 0;
    if (!toggle) {
      for (i = 0; i < links.length; i++) {
        links[i].style.display = "block";
      }
      toggle = true;
      this.innerHTML = "Ẩn bớt " + '<i class="fa fa-caret-up"></i>';

    } else {
      for (i = 0; i < links.length; i++) {
        links[i].style.display = "none";
      }
      toggle = false;
      this.innerHTML = "Xem thêm " + '<i class="fa fa-caret-down"></i>';
    }
  });

  // view-more-mobile
  $("#trademark-more").click(function() {
    $(this).remove();
    $(".name-trandemark").show();
    $(".filter-trademark a:nth-child(8)").css("border-top", "1px solid #eee");
  });

  // dánh giá
  $(".show-input").click(function() {
    var nameClass = $(this).attr("class");
    if (nameClass === "show-input") {
      $(this).addClass("closebtt");
      $(this).text("Đóng lại");
      $(".input").fadeIn();
    } else {
      $(this).removeClass("closebtt");
      $(this).text("Gửi đánh giá của bạn");
      $(".input").fadeOut();
    }
  })

  $("#s1, #s2, #s3, #s4, #s5").mouseenter(function() {
    var evaluate = ["Không thích", "Tạm được", "Bình thường", "Rất tốt", "Tuyệt vời quá"];
    $(this).prevAll().addClass('voted');
    $(this).addClass('voted');
    $(this).nextAll().removeClass('voted')
    var index = $(this).index();
    $(".lsStar").removeClass("hide");
    $(".lsStar").text(evaluate[index]);
  }).mouseleave(function() {
    var evaluate = ["Không thích", "Tạm được", "Bình thường", "Rất tốt", "Tuyệt vời quá"];
    var value = $("#hdfStar").val();
    if (value != 0) {
      for (var i = 1; i < 6; i++) {
        if (i <= value) {
          $("#s" + i).addClass("voted");
        } else {
          $("#s" + i).removeClass("voted");
        }
      }
      $(".lsStar").text(evaluate[value - 1]);
    } else {
      $(this).parent().children().removeClass('voted');
      $(".lsStar").addClass("hide");
    };
  }).click(function() {
    var currentIndex = $(this).index();
    $("#hdfStar").val(currentIndex + 1);
    $(".write-comment.hide").removeClass("hide");
  })



  // attach image in evaluate

  $('.js-insert-attach').on('click', function() {
    let insertNames = $(this).data('name');
    let lasting = $('#attach-view-' + insertNames + ' li').last().prev().find('input[type="file"]').val();
    if (lasting != "") {
      let date = new Date();
      let time = date.getTime();
      let _html = '<li class="img-box d-none" id="' + insertNames + time + '">';
      _html += '<input type="file" name="' + insertNames + '[]" multiple="multiple" class="form-control showImage d-none" data-time="' + time + '" data-name="' + insertNames + '" >';
      _html += '<input type="hidden" name="delete_' + insertNames + '[]">';
      _html += '<span class="icon-close" data-id="' + insertNames + time + '">';
      _html += '<i class="fas fa-times-circle"></i></span>';
      _html += '</li>';
      let insertAttach = $("#insert-attach-" + insertNames);
      insertAttach.before(_html);
      $('#attach-view-' + insertNames + ' li').last().prev().find('input[type="file"]').click();
    } else {
      if (lasting == "") {
        $('#attach-view-' + insertNames + ' li').last().prev().find('input[type="file"]').click();
      };
    };

    $('.showImage').on('change', function() {
      if (lasting != '') {
        let insertNames = $(this).data('name');
        let time = $(this).data('time');
        let fileSelected = this.files;
        let length = fileSelected.length;
        for (const key in fileSelected) {
          if (key == 0) {
            let fileToLoad = fileSelected[key];
            let fileReader = new FileReader();
            fileReader.onload = function(fileLoaderEvent) {
              let srcData = fileLoaderEvent.target.result;
              let newImg = document.createElement("img");
              newImg.src = srcData;
              $("#" + insertNames + time).append(newImg.outerHTML);
            }
            fileReader.readAsDataURL(fileToLoad);
            if (length == 1) {
              break;
            }
          } else {
            let lastModified = fileSelected[key]['lastModified'];
            let _html = '<li class="img-box " id="' + insertNames + lastModified + '">';
            _html += '<span class="icon-close" data-key="' + key + '" data-parent="' + insertNames + time + '">';
            _html += '<i class="fas fa-times-circle"></i></span>';
            _html += '</li>';
            let insertAttach = $("#insert-attach-" + insertNames);
            insertAttach.before(_html);
            let fileToLoad = fileSelected[key];
            let fileReader = new FileReader();
            fileReader.onload = function(fileLoaderEvent) {
              let srcData = fileLoaderEvent.target.result;
              let newImg = document.createElement("img");
              newImg.src = srcData;
              $("#" + insertNames + lastModified).append(newImg.outerHTML);
            }
            fileReader.readAsDataURL(fileToLoad);
            if (key == length - 1) {
              break;
            }
          }
        }
        $(this).parent().removeClass('d-none');
      }
      $('.icon-close').off('click').on('click', function() {
        console.log("hello 1233");
        if ($(this).is('[data-key]') && $(this).is('[data-parent]')) {
          let key = $(this).data('key');
          let parent = $(this).data('parent');
          if ($('#' + parent).length) {
            let rootDel = $('#' + parent).children('input[type=hidden]:first');
            let rootFile = $('#' + parent).children('input[type=file]:first')[0].files;
            console.log(rootFile);
            if (rootDel.val() == '') {
              rootDel.val(rootFile[key].name);
            } else {
              rootDel.val(rootDel.val() + ',' + rootFile[key].name);
            }
            $(this).parent().remove();
            let arrDeleteRoot = rootDel.val().split(',');
            if (arrDeleteRoot.length == rootFile.length) {
              console.log('hủy toàn bộ với click k file');
              $('#' + parent).remove();
            }
            console.log(rootDel.val());
          }
        } else {
          if ($(this).is('[data-id]')) {
            let id = $(this).data('id');
            if ($('#' + id).length) {
              let checkFiles = $('#' + id + ' > input:first')[0].files;
              let deleteName = $(this).prev('input[type=hidden]');
              if (checkFiles.length == 1) {
                $(this).parent().remove();
              } else {
                if (deleteName.val() == '') {
                  deleteName.val(checkFiles[0].name);
                } else {
                  deleteName.val(deleteName.val() + ',' + checkFiles[0].name);
                }
                $(this).parent().addClass('d-none');
                // kiểm tra khi hủy file các file đã chọn 
                let arrDelete = deleteName.val().split(',');
                if (arrDelete.length == checkFiles.length) {
                  console.log('hủy toàn bộ với click có file');
                  $(this).parent().remove();
                }
              }
            }
          }
        }
      })
    });
  });

  $('#js-my-evaluate').on('submit', function(event) {
    event.preventDefault();
    var count = $.trim($("#js-content-evaluated").val());
    var name = $.trim($("#name").val());
    var phone = $.trim($("#phone").val());
    var email = $.trim($("#email").val());
    if ($("#hdfStar").val() == 0) {
      $("#js-error-message").text("Bạn chưa đánh giá điểm sao, vui lòng đánh giá.");
      return false;
    } else {
      $("#js-error-message").val("");
    }
    if (count == "") {
      $("#js-error-message").text("Vui lòng nhập nội dung đánh giá về sản phẩm.");
      $("#js-content-evaluated").val("");
      $("#js-content-evaluated").css("border", "1px solid #d0021b");
      $("#js-content-evaluated").focus();
      return false;
    } else {
      if (count.length < 80) {
        $("#js-error-message").text("Nội dung đánh giá quá ít. Vui lòng nhập thêm nội dung đánh giá về sản phẩm.");
        $("#js-content-evaluated").focus();
        $("#js-content-evaluated").css("border", "1px solid #d0021b");
        return false;
      } else {
        $("#js-content-evaluated").css("border", "none");
        $("#js-error-message").text("");
      }
    }
    if (name == "") {
      $("#js-error-message").text("Vui lòng nhập họ và tên.");
      $("#name").focus();
      $("#name").css("border-color", "#d0021b");
      return false;
    } else {
      $("#name").css("border-color", "#ddd");
      $("#js-error-message").text("");
    }
    if (phone == "") {
      $("#js-error-message").text("Vui lòng nhập số điện thoại.");
      $("#phone").focus();
      $("#phone").css("border-color", "#d0021b");
      return false;
    } else {
      if (phone.length != 10) {
        $("#js-error-message").text("Số điện thoại không hợp lệ.");
        alert("Số điện thoại không hợp lệ.");
        $("#phone").focus();
        return false;
      } else {
        $("#phone").css("border-color", "#ddd");
        $("#js-error-message").text("");
      };
    }
    if (email == "") {
      $("#js-error-message").text("Vui lòng nhập Email.");
      $("#email").focus();
      $("#email").css("border-color", "#d0021b");
      return false;
    } else {
      let regex = new RegExp('[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$')
      if (!regex.test(email)) {
        $("#js-error-message").text("Vui lòng nhập đúng địa chỉ email.");
        $("#email").focus();
        $("#email").css("border-color", "#d0021b");
        return false;
      }
      $("#email").css("border-color", "#ddd");
      $("#js-error-message").text("");
    }
    // send evaluate
    let url = $(this).data('url');
    $.ajax({
      url: url,
      type: "POST",
      data: new FormData(this),
      dataType: 'json',
      contentType: false,
      cache: false,
      processData: false,
      beforeSend: function() {
        $('#js-sendEvaluate').attr("disabled", "disabled");
        $('#js-my-evaluate').css("opacity", ".5");
      },
      success: function(data) {
        alert('Đánh giá của bạn sẽ được hệ thống kiểm duyệt. Xin cám ơn về đánh giá của bạn!.')
        $('#js-my-evaluate').css("opacity", "");
        $("#js-sendEvaluate").removeAttr("disabled");
        $("#js-reset-evaluate").click();
        $("#hdfStar").val("0");
        $("#s5").mouseleave();
        $(".show-input").click();
        $("#js-write-commnet").addClass('hide');
        $('#insert-attach-evaluate').prevAll().remove();
      }
    });
  });

  $(".write > textarea").keyup(function() {
    let countTxt = $.trim($(this).val()).length;
    if (countTxt != 0 && countTxt < 80) {
      $(".ckeckWrite").text(countTxt + " ký tự (tối thiểu 80)")
    } else {
      $(".ckeckWrite").text("");
    }
  });

  // Search product of custumer
  const search = function(keyword, url) {
    if (keyword.length > 1) {
      $.ajax({
        url: url,
        method: "GET",
        dataType: 'json',
        data: {
          keyword: keyword
        },
        success: function(data) {
          console.log(data);
          if (data.length) {
            let _html = "";
            for (let key in data) {
              _html += `
                <li>
                  <a href="${data[key]["category"]}/${data[key]["slug"]}">
                  <img src="images/products${data[key]["avatar"]}" alt="">
                  <div class="item-suggestion-infor">
                    <h3>${data[key]["name"]}</h3>
                    <div class="product-price">`;
              if (data[key]["discount"] != null) {
                _html += `
                      <strong>${FormatCurrency(data[key]["price"], data[key]["discount"])}₫</strong>
                      <span>${FormatCurrency(data[key]["price"])}₫</span>
                      <i>-${data[key]["discount"] }%</i>`;
              } else {
                _html += `
                      <strong>${FormatCurrency(data[key]["price"])}₫</strong>`;
              }
              _html += `
                    </div>
                  </div>`;
              if (data[key]["gift"] != null) {
                _html += `<p>Quà <b>${FormatCurrency(data[key]["gift"])}₫</b></p>`;
              };
              _html += `
                  </a>
                </li>`;
            }
            $("#js-wrap-suggestion").html(_html);
            $("#js-wrap-suggestion").show();
          } else {
            $("#js-wrap-suggestion").hide();
          }
        }
      });
    } else {
      $("#js-wrap-suggestion").html("");
      $("#js-wrap-suggestion").hide();
    };
  };
  // focus search
  // $("#js-search").focus(function() {
  //   let keyword = $.trim($(this).val());
  //   console.log('focus');
  //   search(keyword);
  // });
  //keyup
  $("#js-search").keyup(function() {
    let keyword = $.trim($(this).val());
    let url = $(this).data('url');
    // console.log('keyup');
    search(keyword, url);
  });
  // blur search
  // $("#js-search").blur(function() {
  //   $("#js-wrap-suggestion").html("");
  //   $("#js-wrap-suggestion").hide();
  //   console.log('blur');
  // });

  // Lazyloading image
  if ('loading' in HTMLImageElement.prototype) {
    const images = document.querySelectorAll("img.lazyload");
    images.forEach(img => {
      img.src = img.dataset.src;
    });
  } else {
    // import Lazysize
    let script = document.createElement("script");
    script.async = true;
    script.src =
      "../js/lazysizes.min.js";
    document.body.appendChild(script);
  }


  $(".js-show-more").click(function() {
    let page = $(this).attr('data-page');
    let category_id = $(this).attr('data-category');
    let el = $(this);
    page = parseInt(page);
    $.ajax({
        url: 'http://127.0.0.1:8000/showMore/' + category_id + '/' + page,
        type: 'POST',
        dataType: 'json',
        async: true,
      })
      .done(function(data) {
        console.log(data);
        // if (data != "") {
        //   $("#list-mobile").append(data);
        //   console.log(data);
        // } else {
        //   el.hide();
        // };
      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {
        console.log("complete");
      });
    $(this).attr('data-page', page + 1);
  })

  // address checkout
  const ShowProvince = function(id, arr) {
    jQuery.each(arr, function(index, value) {
      $('<option/>', {
        'value': value,
        'text': value
      }).appendTo("#" + id);
    });
    // $("#js-province").select2();
  }
  ShowProvince('js-province', province);
  // $("#js-province").select2();
  //  change province
  $("#js-province").on('change', function() {
      let index = $(this).prop('selectedIndex');
      let _option = `<option value="">Quận / Huyện</option>`;
      let arr = district[index].split("|");
      jQuery.each(arr, function(index, value) {
        _option += `<option value="${value}">${value}</option>`;
      });
      $("#js-district").html(_option);
      $("#js-district").data("province", index);
      if (index != 0) {
        $(this).removeClass("error");
        $(this).next('.text-error').text('');
      }
    })
    // change distric
  $("#js-district").on('change', function() {
    let dataProvince = $(this).data('province');
    let index = $(this).prop('selectedIndex');
    let _option = `<option value="">Phường / Xã</option>`;
    let arr = commune[dataProvince][index].split("|");
    jQuery.each(arr, function(index, value) {
      _option += `<option value="${value}">${value}</option>`;
    });
    $("#js-commune").html(_option);
    if (index != 0) {
      $(this).removeClass("error");
      $(this).next('.text-error').text('');
    }
  })

  $("#js-commune").on('change', function() {
    let index = $(this).prop('selectedIndex');
    if (index != 0) {
      $(this).removeClass("error");
      $(this).next('.text-error').text('');
    }
  });


});
// admin logout
function Logout() {
  var result = confirm("Bạn có thực sự muốn đăng xuất khỏi trang quản trị?");
  if (result) {
    $.post("./Admin/LogOut/", {}, function(data) {});
  };

}

// hàm xử lý kiểu tiền tệ 
function FormatCurrency(olded, discount = 0) {
  var result = "";
  if (discount != 0) {
    var number = olded * (100 - discount) / 100;
  } else {
    var number = olded;
  }
  number = number.toString(10);
  var index = 0;
  for (var i = number.length - 1; i >= 0; i--) {
    if (index < 3) {
      result += "0";
    } else if (index == 3 || index == 6) {
      result += "." + number[i];
    } else if (index == 4 && number[i + 1] > 5) {
      result += number[i] + 1;
    } else {
      result += number[i];
    };
    index++;
  };
  result = result.split("").reverse().join("");
  // console.log(result);
  return result;
}

// Show attach trong bình luận
function ShowAttach(id) {
  $("#" + id).show();
}




// Gửi bình luận sản phẩm
function PostComment(id_form, id_textarea, box_error, box_infor) {
  var content = $.trim($("#" + id_textarea).val());
  if (content.length == 0) {
    $("#" + box_error).text("Vui lòng nhập nội dung bình luận.");
    $("#" + id_textarea).val("");
    $("#" + id_textarea).focus();
    return false;
  } else if (content.length < 20) {
    $("#" + box_error).text("Nội dung bình luận quá ngắn.");
    $("#" + id_textarea).val("");
    $("#" + id_textarea).focus();
    return false;
  } else {
    $("#" + box_error).text("");
  }
  $.ajax({
    url: "./Ajax/PostComment",
    method: "post",
    data: $("#" + id_form).serialize(),
    success: function(data) {
      if (data == "create_session") {
        createBoxInfor(box_infor, id_form);
      } else {
        if (data == "true") {
          alert("Bình luận của bạn sẽ được kiểm duyệt.");
        } else {
          alert(data);
          alert("bình luận thất bại.");
        }
        // alert("Bình luận của bạn sẽ được kiểm duyệt.");
        $("#content-comment").val("");
      }
    }
  });
}
//  Tạo box lấy thông tin ng bình luận
function createBoxInfor(box_infor, id_form) {
  var _html = '<div class="ajax-comment">';
  _html += '<div class="load-comment">';
  _html += '<div class="wrap-popup">';
  _html += '<div class="titlebar">';
  _html += '<strong>Nhập thông tin</strong>';
  _html += '<a href="javascript:CmtClosePop();"><i class="fas fa-times-octagon"></i></a>';
  _html += '</div>';
  _html += '<div class="form-info">';
  _html += '<input type="text" name="name" placeholder="Họ tên (bắt buộc)" id="nameCmt">';
  _html += '<input type="text" name="email" placeholder="Email (để nhận phản hồi qua mail)" id="emailCmt">';
  _html += '<input type="text" name="phone" placeholder="Số điện thoại (để nhận phản hồi qua Zalo)" id="phoneCmt">';
  _html += '<span id="js-inforCmtMessage" style="display:block; color: #d0021b;width: 100%; margin-bottom: 0.75rem"></span>'
  _html += '<button type="button" onclick="CmtConfirmCustumer(' + "'" + id_form + "'" + ');">Bình luận</button>';
  _html += '</div>';
  _html += '</div>';
  _html += '</div>';
  _html += '</div>';
  $("#" + box_infor).html(_html);
}
// Đóng box ajaxcomment
function CmtClosePop() {
  $(".ajax-comment").hide();
}
// Lưu vào data nếu chưa có session
function CmtConfirmCustumer(id_form) {
  var nameCmt = $.trim($("#nameCmt").val());
  var emailCmt = $.trim($("#emailCmt").val());
  var phoneCmt = $.trim($("#phoneCmt").val());
  if (nameCmt.length == 0) {
    $("#js-inforCmtMessage").text("Vui lòng nhập họ và tên.");
    $("#nameCmt").val("");
    $("#nameCmt").css("border-color", "#d0021b");
    $("#nameCmt").focus();
    return false;
  } else {
    $("#js-inforCmtMessage").text("");
    $("#nameCmt").css("border-color", "#ddd");
  };
  if (emailCmt.length == 0) {
    $("#js-inforCmtMessage").text("Vui lòng nhập đúng email.");
    $("#emailCmt").val("");
    $("#emailCmt").css("border-color", "#d0021b");
    $("#emailCmt").focus();
    return false;
  } else {
    $("#js-inforCmtMessage").text("");
    $("#emailCmt").css("border-color", "#ddd");
  };
  if (phoneCmt.length != 10) {
    $("#js-inforCmtMessage").text("Vui lòng nhập đúng số điện thoại.");
    $("#phoneCmt").val("");
    $("#phoneCmt").css("border-color", "#d0021b");
    $("#phoneCmt").focus();
    return false;
  } else {
    $("#js-inforCmtMessage").text("");
    $("#phoneCmt").css("border-color", "#ddd");
  };
  $.ajax({
    url: "./Ajax/CreateCustumerCmt",
    method: "post",
    data: $("#" + id_form).serialize(),
    success: function(data) {
      alert("Bình luận của bạn sẽ được kiểm duyệt.");
      CmtClosePop();
      $("#box-infor").html("");
      $("#content-comment").val("");
      // if (data == "true") {
      //   $("#box-infor").html("");
      // }  
    }
  });

}



// Gửi đánh giá sản phẩm 
function InsertEvaluate() {
  var count = $.trim($("#js-content-evaluated").val());
  var name = $.trim($("#name").val());
  var phone = $.trim($("#phone").val());
  var email = $.trim($("#email").val());
  if ($("#hdfStar").val() == 0) {
    $("#js-error-message").text("Bạn chưa đánh giá điểm sao, vui lòng đánh giá.");
    return false;
  } else {
    $("#js-error-message").val("");
  }
  if (count == "") {
    $("#js-error-message").text("Vui lòng nhập nội dung đánh giá về sản phẩm.");
    $("#js-content-evaluated").val("");
    $("#js-content-evaluated").css("border", "1px solid #d0021b");
    $("#js-content-evaluated").focus();
    return false;
  } else {
    if (count.length < 80) {
      $("#js-error-message").text("Nội dung đánh giá quá ít. Vui lòng nhập thêm nội dung đánh giá về sản phẩm.");
      $("#js-content-evaluated").focus();
      $("#js-content-evaluated").css("border", "1px solid #d0021b");
      return false;
    } else {
      $("#js-content-evaluated").css("border", "none");
      $("#js-error-message").text("");
    }
  }
  if (name == "") {
    $("#js-error-message").text("Vui lòng nhập họ và tên.");
    $("#name").focus();
    $("#name").css("border-color", "#d0021b");
    return false;
  } else {
    $("#name").css("border-color", "#ddd");
    $("#js-error-message").text("");
  }
  if (phone == "") {
    $("#js-error-message").text("Vui lòng nhập số điện thoại.");
    $("#phone").focus();
    $("#phone").css("border-color", "#d0021b");
    return false;
  } else {
    if (phone.length != 10) {
      $("#js-error-message").text("Số điện thoại không hợp lệ.");
      alert("Số điện thoại không hợp lệ.");
      $("#phone").focus();
      return false;
    } else {
      $("#phone").css("border-color", "#ddd");
      $("#js-error-message").text("");
    };
  }

  $.ajax({
    url: "./Ajax/PostEvaluate",
    method: "post",
    data: $("#js-my-evaluate").serialize(),
    success: function(data) {
      jQuery("#js-reset-evaluate").click();
      $("#hdfStar").val("0");
      jQuery("#s5").mouseleave();
      jQuery(".show-input").click();
      alert(data);
    }
  });
}

function ShowReply(id, name) {
  $(".commemt-ask .comment-now").addClass('hide');
  $("#reply" + id).removeClass("hide");
  $("#content" + id).val("@" + name + ": ");
  $("#content" + id).focus();
}