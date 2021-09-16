$(document).ready(function() {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $('[data-toggle="tooltip"]').tooltip();

  // btn-delete
  $(".js-btn-delete").on('click', function(event) {
    event.preventDefault();
    let url = $(this).data('url');
    Swal.fire({
      title: 'Bạn thực sự muốn xóa ?',
      text: "Bạn sẽ không khôi phục lại được này!",
      icon: 'warning',
      showCancelButton: true,
      cancelButtonText: 'Hủy bỏ',
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Xóa bỏ!'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: url,
          type: "DElETE",
          dataType: 'json',
          async: false,
          success: function(data) {
            Swal.fire(
              'Deleted!',
              'Xóa thành công!',
              'success'
            );
          }
        });
        $(this).parent().parent().remove();
      } else {
        Swal.fire(
          'Cancelled',
          'Hủy xóa thành công ',
          'error'
        )
      }
    });
  });
  // change category ==> change brand
  $("#js-category-id").on('change', function() {
    let category_id = $(this).val();
    // console.log(category_id + '-');
    if (category_id != '') {
      $.ajax({
        url: "http://127.0.0.1:8000/admin/product/getBrand/" + category_id,
        type: "POST",
        dataType: 'json',
        async: true,
        // data: {
        //   // category_id: category_id
        // },
        success: function(response) {
          // console.log(response);
          let _html = '<option value="" >Xem tất cả thương hiệu </option>';
          let items = response;
          for (const key in items) {
            _html += "<option value='" + items[key]["id"] + "' >" + items[key]["name"] + "</option>";
          }
          $("#js-brand-id").html(_html);
        }
      });
    } else {
      $("#js-brand-id").html('<option value="" >Xem tất cả thương hiệu </option>');
    }
  });

  // select2 
  $("#js-category-id").select2();
  $("#js-brand-id").select2();
  $("#js-permission-id").select2();
  $('#js-role-id').select2({
    'placeholder': 'Chọn vai trò'
  });
  $('#js-permission-id').select2({
    'placeholder': 'Chọn quyền'
  });
  $('#js-module-id').select2();

  // $("#js-parameter-value").select2();
  $('select[id^="js-parameter-value"]').select2();

  //  event of parameter
  $('#js-addParameterForPrd').on('click', function(event) {
    // alert('click nef');
    $('#js-view-parameter').show();
    let name = $('#js-parameter-value').val();
    let count = Number($('#js-parameter').data('count')) + 1;
    // console.log(name + '---' + count);
    let _option = ``;
    // nếu nó thêm thông số đã có rồi (đã tạo sản rồi)
    if (name != '') {
      // check parameter of product
      let strCheckParameter = $.trim($('#js-check-parameter').val()).toLowerCase();
      let arrCheckParameter = [];
      if (strCheckParameter != '') {
        arrCheckParameter = strCheckParameter.split('@');
        // nếu mà thêm thằng thằng đã có trong strCheckParameter
        if (arrCheckParameter.includes(name.toLowerCase())) {
          return alert('Thông số ' + name + ' của sản phẩm đã có! Hãy chọn thông số khác');
        }
      }
      //  lấy chuỗi trong cái mãng tạm(lưu những parameter thêm bởi input name ) 
      // nếu mà thêm parameter đã có trong strTempParameter
      let strTempParameter = $.trim($('#js-temp-parameter').val()).toLowerCase();
      let arrTempParameter = {};
      if (strTempParameter != '') {
        arrTempParameter = JSON.parse(strTempParameter);
        if (Object.values(arrTempParameter).includes(name.toLowerCase())) {
          return alert('Thông số ' + name + ' của sản phẩm đã có! Hãy chọn thông số khác');
        }
      }
      if ($.trim(strCheckParameter) == '') {
        $('#js-check-parameter').val(name);
      } else {
        $('#js-check-parameter').val(strCheckParameter + '@' + name);
      }
      // get value parameter
      $.ajax({
        url: "http://127.0.0.1:8000/admin/product/getParameter/" + name,
        type: "POST",
        dataType: 'json',
        async: false,
        success: function(response) {
          // console.log(response);
          let items = response;
          for (const key in items) {
            _option += "<option value='" + items[key]["id"] + "' >" + items[key]["value"] + "</option>";
          }
        }
      });
    }
    // console.log(_option);
    let _html = `
        <div class="card" id='parameter${count}'>
          <div class="card-header" id="heading${count}">
            <h2 class="mb-0">
              <button class="btn btn-block text-left font-weight-bold collapsed btn-outline-none"  type="button" data-toggle="collapse" data-target="#collapse${count}" aria-expanded="false" aria-controls="collapse${count}">
              ${(name != '') ? name :  ' ' }
              </button>
            </h2>
            <a  href="javascript:void(0)" class="text-danger delete js-remove-parameter" data-count="${count}" data-name="${(name != '') ? name : '' }" data-add="${(name != '') ? 'check' : 'temp' }"><i class="fad fa-trash-alt"></i> Xóa </a>
          </div>
          <div id="collapse${count}" class="collapse" aria-labelledby="heading${count}" data-parent="#js-parameter">
            <div class="card-body row">
              <div class="form-group col-4">
                <label for="js-name-parameter${count}">Tên thông số:</label>
                ${(name != '') ? '<input type="hidden" name="name_parameter[]" value="'+ name+'"><label class="d-block"> '+ name + '</label>'
                : '<input type="text" name="name_parameter[]" class="form-control" data-count="'+ count + '" id="js-name-parameter'+ count + '" >'}
                <div class="error-text" style="display:none"> Không được bỏ trống.</div>
                <div class="error-text" style="display:none"> Thông số này đã có.</div>
              </div>  
              <div class="col-8">
                <label for="js-parameter-value${count}">Giá trị thông số:</label>
                ${(name != '') ? '<select name="value_parameter[]" class="w-100 h-auto" id="js-parameter-value'+ count+ '">'+ _option + '</select>' : '<div id="js-content-parameter-value'+count+'"><input type="text" name="new_value_parameter[]" class="form-control" id="js-parameter-value'+ count + '" ><div class="error-text" style="display:none"> Không được bỏ trống.</div></div>'}
                <button type="button" class="btn btn-outline-success outline-none mt-2 js-showModal" data-name="${(name != '') ? name : ''}" data-toggle="modal" data-target="#parameterModal" data-select="${(name != '') ? 'js-parameter-value'+ count : ''}" data-count="${count}" >Thêm mới thông số</button>
              </div>
            </div>
          </div>
        </div>`;
    $('#js-parameter').append(_html);
    $('#js-parameter').data('count', count);
    // nếu có name thì hiện Button Show Modal
    if (name != '') {
      $('#js-parameter-value' + count).select2();
      $(`.js-showModal[data-count="${count}"]`).show();
    } else {
      $(`.js-showModal[data-count="${count}"]`).hide();
    }
    // console.log($('#js-parameter').data('count'));
    console.log('-------thêm' + count + ' thành công-------');
  });
  // show modal and insert name in view product page
  $(document).on('click', '.js-showModal', function() {
    $('#js-value-add-new').val('');
    // lấy tên 
    let name = $.trim($(this).data('name'));
    // lấy id của select
    let idSelect = $.trim($(this).data('select'));
    // lấy count
    let count = $(this).data('count');
    $('#js-select-add-option').val(idSelect);
    if (name == '') {
      $("#js-name-add-new").prop("readonly", false);
      $('#js-name-add-new').val($('#js-name-parameter' + count).val());
    } else {
      $('#js-name-add-new').val(name);
      $('#js-name-add-new').prop("readonly", true);
      $('#js-name-add-new').next().hide();
      $('#js-name-add-new').next().next().hide();
    }
  });
  // insert parameter in view product page
  $(document).on('click', '#js-addNewParameter', function() {
    let name = $.trim($('#js-name-add-new').val());
    let value = $.trim($('#js-value-add-new').val());
    if (value == '') {
      $('#js-value-add-new').addClass('input-error');
      $('#js-value-add-new').next().next().show();
      $('#js-value-add-new').next().hide();
      return false;
    } else {
      $('#js-value-add-new').removeClass('input-error');
      $('#js-value-add-new').next().next().hide();
    }
    $.ajax({
      url: "http://127.0.0.1:8000/admin/parameter/",
      type: "POST",
      dataType: 'json',
      data: {
        name: name,
        value: value
      },
      async: false,
      success: function(response) {
        console.log(response);
        if (response) {
          let item = response;
          let _html = "<option value='" + item["id"] + "'>" + item["value"] + "</option>";
          let idSelect = $('#js-select-add-option').val();
          $('#' + idSelect).append(_html);
          $('#parameterModal').modal('hide');
          $('#js-value-add-new').val('');
          $('#js-value-add-new').removeClass('input-error');
          $('#js-value-add-new').next().hide();
          $('#js-value-add-new').next().next().hide();
        } else {
          // console.log("có rồi mày ơi")
          $('#js-value-add-new').addClass('input-error');
          $('#js-value-add-new').next().show();
          $('#js-value-add-new').next().next().hide();
        }
      }
    });
  });
  //  delete row parameter
  $(document).on('click', '.js-remove-parameter', function() {
    // lấy id cần xóa và xóa 
    let count = $(this).data('count');
    // lấy add để biết nút Thêm thêm parameter có name hay không
    let add = $(this).data('add');
    // lấy name
    let name = $(this).data('name');
    // lấy name đã được thêm bởi nút Thêm thêm parameter có name
    let strCheckParameter = $.trim($('#js-check-parameter').val()).toLowerCase();
    let arrCheckParameter = [];
    if (strCheckParameter != '') {
      arrCheckParameter = strCheckParameter.split('@');
    }
    //  lấy chuỗi trong cái mãng tạm(lưu những parameter thêm bởi input name ) 
    let strTempParameter = $.trim($('#js-temp-parameter').val()).toLowerCase();
    let arrTempParameter = {};
    if (strTempParameter != '') {
      arrTempParameter = JSON.parse(strTempParameter);
    }
    // khi xóa row thì xóa luôn trong checkParameter hoặc tempParameter
    if (add == 'check') { // xóa tên đó trong chekParameter đi
      // console.log('===xóa trong chekParameter==== ');
      // console.log(arrCheckParameter);
      for (var i = 0; i <= arrCheckParameter.length - 1; i++) {
        if (arrCheckParameter[i] == name.toLowerCase()) {
          arrCheckParameter.splice(i, 1);
        }
      }
      // console.log(arrCheckParameter);
      //  gán lại
      $('#js-check-parameter').val(arrCheckParameter.join('@'));
      // console.log('===xóa trong chekParameter==== ');
    } else { // xóa cái count đó trong TempParameter đi
      // console.log('===xóa trong TempParameter==== ');
      delete arrTempParameter[count];
      $('#js-temp-parameter').val(JSON.stringify(arrTempParameter));
      // console.log('Str sau khi xóa:' + JSON.stringify(arrTempParameter));
      // console.log('===xóa trong TempParameter==== ');
    }
    // xóa row
    $('#parameter' + count).remove();
    // nếu xóa hết thì ẩn luôn khung hiển thị thông số
    let content = $('#js-parameter').text();
    if ($.trim(content) == '') {
      $('#js-view-parameter').hide();
    }
  });

  //change name parameter
  $(document).on('blur', 'input[id^="js-name-parameter"]', function() {
    // lấy count của nó
    let count = $(this).data('count');
    // lấy tên thông số vừa ghõ
    let name = $.trim($(this).val());
    if (name == '') {
      // hiển thi lỗi
      $(this).addClass('input-error');
      $(this).next().show();
      $(this).next().next().hide();
      // gán rỗng name modal
      $("#js-name-add-new").val('');
      // console.log('==== hết blur name rỗng =====');
      return false;
    } else {
      //  chỉ có 4 trường hợp với name
      //  1 là parameter đó vô tình trùng với CheckParameter đã thêm
      //  2 là parameter đó vô tình trùng với TempParameter đã thêm 
      //  3 là parameter đó có trong Parameter rôi nhưng chưa thêm cho sp
      //  4 là parameter đó mới hoàn toàn

      // những thứ phải chạy trước
      // console.log('vào thằng name không rỗng');
      $(this).removeClass('input-error');
      $(this).next().hide();
      // lấy count dể hiển thị trên title(card-header)
      let count = $(this).data('count');
      //  lấy chuỗi tất cả các thông số
      let strTotalParameter = $.trim($('#js-total-parameter').val()).toLowerCase();
      let arrTotalParameter = [];
      if (strTotalParameter != '') {
        arrTotalParameter = strTotalParameter.split('@');
      }
      // console.log(arrTotalParameter);
      // lấy chuỗi tên các thông số đã được thêm vào cho sp 
      let strCheckParameter = $.trim($('#js-check-parameter').val()).toLowerCase();
      let arrCheckParameter = [];
      // Xử lý trường hợp 1(vô tình trùng với parameter đã thêm bởi nút thêm $('#js-addParameterForPrd'))
      if (strCheckParameter != '') {
        arrCheckParameter = strCheckParameter.split('@');
        if (arrCheckParameter.includes(name.toLowerCase())) {
          // show lỗi trùng
          $(this).addClass('input-error');
          $(this).next().next().show();
          // làm rỗng title
          $('#heading' + count + ' button').text('');
          return alert('Thông số ' + name + ' của sản phẩm đã có! Hãy chọn thông số khác');;
        }
      }
      //  lấy chuỗi trong cái mãng tạm(lưu những parameter thêm bởi input name ) 
      let strTempParameter = $.trim($('#js-temp-parameter').val()).toLowerCase();
      let arrTempParameter = {};
      // Xử lý trường hợp là parameter đó vô tình trùng với TempParameter đã thêm
      if (strTempParameter != '') {
        arrTempParameter = JSON.parse(strTempParameter);
        // kiểm tra xem cái name này đã có chưa và 
        // cái count đó có trùng k
        if (Object.values(arrTempParameter).includes(name.toLowerCase())) {
          if (arrTempParameter[count] != name.toLowerCase()) {
            // show lỗi trùng
            $(this).addClass('input-error');
            $(this).next().next().show();
            // làm rỗng title
            $('#heading' + count + ' button').text('');
            // console.log('===cái ni thêm bởi input name rồi mày ơi===');
            return alert('Thông số ' + name + ' của sản phẩm đã có! Hãy chọn thông số khác');
          }
        }
      }
      //  2 trường hợp còn lại
      // hiện lại title
      $('#heading' + count + ' button').text(name);
      // xóa lỗi 
      $(this).removeClass('input-error');
      $(this).next().next().hide();
      $(this).next().hide();
      // console.log('==== bắt đầu cập nhật tempParameter =====');
      // Duyet parameter tạm xem có cái count có chưa
      let checkCount = false;
      for (const key in arrTempParameter) {
        if (key == count) {
          arrTempParameter[key] = name.toLowerCase();
          checkCount = true;
          break;
        }
      }
      // Chưa có thì thêm vô
      if (!checkCount) {
        arrTempParameter[count] = name.toLowerCase();
      }
      // khi thêm hoặc cập nhật
      // console.log('khi thêm hoặc cập nhật parameter tạm tên có trong Parameter chưa thêm vào sp');
      // console.log(arrTempParameter);
      // sau đó gán lại giá trị cho $('#js-temp-parameter) 
      $('#js-temp-parameter').val(JSON.stringify(arrTempParameter));
      // console.log('giá trị sau khi cập nhật parameter input name');
      // console.log($('#js-temp-parameter').val());
      // console.log('==== hết cập nhật tempParameter =====');
      // xử lý trường hợp 2(parameter đó có trong Parameter rôi nhưng chưa thêm cho sp)
      if (arrTotalParameter.includes(name.toLowerCase())) {
        // console.log('====bắt đầu name có trong parameter chưa thêm =====');
        // xóa cái input value rồi tạo cho nó cái select như thêm thông số đã có cho sp
        // lấy option của cái select cần tạo
        let _option = ``;
        $.ajax({
          url: "http://127.0.0.1:8000/admin/product/getParameter/" + name,
          type: "POST",
          dataType: 'json',
          async: false,
          success: function(response) {
            // console.log(response);
            let items = response;
            for (const key in items) {
              _option += `<option value="${items[key]["id"]}">${items[key]["value"]}</option>`;
            }
          }
        });
        // console.log(_option);
        $(`#js-name-parameter${count}`).attr('name', 'name_parameter[]');
        // tạo 1 cái select 
        let _html = `<select name="value_parameter[]" class="w-100 h-auto" id="js-parameter-value${count}">${_option}</select>`;
        // hiện Button Show Modal
        $(`.js-showModal[data-count="${count}"]`).show();
        // lấy thay đổi nội dung thành select
        $('#js-content-parameter-value' + count).html(_html);
        // custom select2
        $(`#js-parameter-value${count}`).select2();
        // gán lại giá trị cho thông số data của btn ShowModal
        $(`.js-showModal[data-count="${count}"]`).data('select', `js-parameter-value${count}`);
        $(`.js-showModal[data-count="${count}"]`).data('name', name);
        // console.log('===== hết blur name có Parameter =====');
      } else { //  xử lý trường hợp 3 thêm mới hoàn toàn
        //  Nên ẩn cái button Modal đi và đổi lại name cho input name_parameter[] thành new_name_parameter[] và tạo input new_name_parameter[] vào div $(`#js-content-parameter-value${count}`);
        //  đổi tên input name
        $(`#js-name-parameter${count}`).attr('name', 'new_name_parameter[]');
        //  thay nội dung thành input 
        let _html = `<input type="text" name="new_value_parameter[]" class="form-control" id="js-parameter-value${count}" ><div class="error-text" style="display:none"> Không được bỏ trống.</div>`;
        $('#js-content-parameter-value' + count).html(_html);
        //  ẩn Button Show Modal
        $(`.js-showModal[data-count="${count}"]`).hide();
        // console.log('==== hết blur name thêm mới =====');
      }
    }

  });
  //change value parameter when add new
  $(document).on('blur', 'input[id^="js-parameter-value"]', function() {
    let value = $.trim($(this).val());
    if (value == '') {
      $(this).addClass('input-error');
      $(this).next().show();
    } else {
      $(this).removeClass('input-error');
      $(this).next().hide();
    }
  });

  // $('#parentId').on('change', function() {

  //     let parentId = $(this).val();
  //     if (parentId == 0) {
  //         $('#icon').parent().show();
  //         $('#image').parent().css('display', 'none');
  //         $('#delete_img').attr('src', '');

  //     } else {
  //         $('#image').parent().css('display', 'block');
  //         $('#icon').parent().hide();
  //         $('#icon').val('');
  //     }
  // });

  $(".js-image-item").on('change', function() {
    if ($(this).val() != '') {
      $(this).parent().prev('li.img-box').addClass('d-none');
      // nó thay dổi
      // lấy data-edit truỳen cho input
      // chi tiết
      // let parent = $(this).parent().prev('li.img-box');
      // let iconClose = parent.children('.icon-close');
      // let link = iconClose.data('edit');
      // let inputLink = parent.children('input');
      // inputLink.val(link);
      // console.log(inputLink.val());
      // cách ngắn nhất
      $(this).parent().prev('li.img-box').children('input').val($(this).parent().prev('li.img-box').children('.icon-close').data('edit'));
      // console.log($(this).parent().prev('li.img-box').children('input').val());

      let fileSelected = this.files;
      if (fileSelected.length > 0) {
        let fileToLoad = fileSelected[0];
        let fileReader = new FileReader();
        let img = $(this).next().next();
        fileReader.onload = function(fileLoaderEvent) {
          let srcData = fileLoaderEvent.target.result;
          img.attr('src', srcData);
        }
        fileReader.readAsDataURL(fileToLoad);
      }
      $(this).parent().removeClass('d-none');
    }
  });
  $('.icon-close').on('click', function() {
    $(this).parent().addClass('d-none');

    $(this).next().attr('src', '');
    if ($(this).is('[data-edit]')) {
      $(this).prev('input').val($(this).data('edit'))
    }
    console.log('hello 1');
  });
  // insert-img
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

  // check permission
  $('.js-permission').on('change', function() {
      $(this).parents('.card').find('.permission-children').prop('disabled', !$(this).prop('checked'));
      $(this).parents('.card').find('.permission-children').prop('checked', $(this).prop('checked'));
    })
    // check permission
  $('.js-check-all').on('change', function() {
    $('.js-permission, .permission-children').prop('checked', $(this).prop('checked'));
    $('.permission-children').prop('disabled', !$(this).prop('checked'));

  })

  //  change order status
  $(document).on('click', '.js-btn-save-change-order-status', function(event) {
    event.preventDefault();
    let id = $(this).data('id');
    let url = $(this).data('url');
    let value = $("#js-order-status" + id).val();
    console.log(id + '---' + url);
    console.log(value);

    $.ajax({
      url: url,
      type: "PUT",
      dataType: 'json',
      async: false,
      data: {
        status: value
      },
      success: function(data) {
        console.log('thanh cong');
      },
      error: function(error) {
        console.log('loi cmnr');
      }
    });
  });

});