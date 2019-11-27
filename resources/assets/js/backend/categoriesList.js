$(document).ready(function () {
     // Hàm này dùng để tạo ra danh mục
     $(document).on('submit','#categoryAddForm',function () {
      let form = $(this)[0];
      let formData = new FormData(form);
      $.ajax({
        url:'/admin/categories',
        data: formData,
        type: 'post',
        contentType:false,
        processData:false,
        success: function (res) {
          $('#categoryModal').modal('hide');
          $('.form').trigger("reset");
          $('.error').empty();
          Swal.fire({
            position: 'center',
            type: 'success',
            title: 'Đã thêm danh mục',
            showConfirmButton: false,
            timer: 1000
          });
          $('#categoriesSelect').append('<option data-acroym="'+res.acronym+'" value="'+res.id+'">'+res.name+'</option>');
          $('#parentSelect').append('<option data-acroym="'+res.acronym+'" value="'+res.id+'">'+res.name+'</option>');
          $('#categoriesSelect').select2();
          $('#parentSelect').select2();
          categoriesTable.ajax.reload(null, false );
        },
        error: function(xhr, status, errors)
        {
          $.each(xhr.responseJSON.errors, function (key, item)
          {
            $(".errors_"+key).append("<p class='text-red'>"+item+"</p>")
          });
        }
      });
    });
    // Lấy dữ liệu danh mục
    var categoriesTable = $('#category-table').DataTable({
      processing: true,
      serverSide: true,
      ajax: "/admin/categories",
      columns: [
      {data: 'DT_RowIndex', name: 'DT_RowIndex'},
      {data: 'name', name: 'name'},
      {data: 'parent', name: 'parent'},
      {data: 'products', name: 'products'},
      {data: 'user', name: 'user'},
      {data: 'created_at', name: 'created_at'},
      {data: 'status', name: 'status', searchable: false},
      {data: 'action', name: 'action', orderable: false, searchable: false},
      ],
      "oLanguage": {
        "sProcessing":   "Đang xử lý...",
        "sLengthMenu":   "Xem _MENU_ mục",
        "sZeroRecords":  "Không tìm thấy dòng nào phù hợp",
        "sInfo":         "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
        "sInfoEmpty":    "Đang xem 0 đến 0 trong tổng số 0 mục",
        "sInfoFiltered": "(được lọc từ _MAX_ mục)",
        "sInfoPostFix":  "",
        "sSearch":       "Tìm:",
        "sUrl":          "",
        "oPaginate": {
          "sFirst":    "Đầu",
          "sPrevious": "Trước",
          "sNext":     "Tiếp",
          "sLast":     "Cuối"
        }
      },
      fnDrawCallback:function (oSettings) {
          // Đoạn này dùng để set up checkbox
          let elems = Array.prototype.slice.call(document.querySelectorAll('.category-show'));
          elems.forEach(function(html) {
            let switchery = new Switchery(html,  { size: 'big' });
          });
        }
      });
    // Hàm này dùng để lấy category bị ẩn
    var categories_hidden_Table = $('#category-hidden-table').DataTable({
      processing: true,
      serverSide: true,
      ajax: "/admin/categories-hidden",
      columns: [
      {data: 'DT_RowIndex', name: 'DT_RowIndex'},
      {data: 'name', name: 'name'},
      {data: 'parent', name: 'parent'},
      {data: 'products', name: 'products'},
      {data: 'user', name: 'user'},
      {data: 'hidded_at', name: 'hidded_at'},
      {data: 'status', name: 'status', orderable: false,searchable: false},
      ],
      "oLanguage": {
        "sProcessing":   "Đang xử lý...",
        "sLengthMenu":   "Xem _MENU_ mục",
        "sZeroRecords":  "Không tìm thấy dòng nào phù hợp",
        "sInfo":         "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
        "sInfoEmpty":    "Đang xem 0 đến 0 trong tổng số 0 mục",
        "sInfoFiltered": "(được lọc từ _MAX_ mục)",
        "sInfoPostFix":  "",
        "sSearch":       "Tìm:",
        "sUrl":          "",
        "oPaginate": {
          "sFirst":    "Đầu",
          "sPrevious": "Trước",
          "sNext":     "Tiếp",
          "sLast":     "Cuối"
        }
      },
      fnDrawCallback:function (oSettings) {
          // Đoạn này dùng để set up checkbox
          let elems = Array.prototype.slice.call(document.querySelectorAll('.category-hidden'));
          elems.forEach(function(html) {
            let switchery = new Switchery(html,  { size: 'big' });
          });
        }
      });
     // Hàm này dùng để lấy category bị ẩn
     var categories_deleted_Table = $('#category-deleted-table').DataTable({
      processing: true,
      serverSide: true,
      ajax: "/admin/categories-deleted",
      columns: [
      {data: 'DT_RowIndex', name: 'DT_RowIndex'},
      {data: 'name', name: 'name'},
      {data: 'parent', name: 'parent'},
      {data: 'products', name: 'products'},
      {data: 'deleted_at', name: 'deleted_at'},
      {data: 'action', name: 'action', orderable: false,searchable: false},
      ],
      "oLanguage": {
        "sProcessing":   "Đang xử lý...",
        "sLengthMenu":   "Xem _MENU_ mục",
        "sZeroRecords":  "Không tìm thấy dòng nào phù hợp",
        "sInfo":         "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
        "sInfoEmpty":    "Đang xem 0 đến 0 trong tổng số 0 mục",
        "sInfoFiltered": "(được lọc từ _MAX_ mục)",
        "sInfoPostFix":  "",
        "sSearch":       "Tìm:",
        "sUrl":          "",
        "oPaginate": {
          "sFirst":    "Đầu",
          "sPrevious": "Trước",
          "sNext":     "Tiếp",
          "sLast":     "Cuối"
        }
      }
    });
       // Đoạn này dùng để thay đổi trạng thái hiển thị của category
       categoriesTable.on('change',".js-switch",function(e){
        let status = $(this).prop('checked') === true ? 1 : 0;
        let id = $(this).data('id');
        const swalWithBootstrapButtons = Swal.mixin({
          customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
          },
          buttonsStyling: false
        });
        let confirm_title,confirm_text,success_title,success_text,confirmButtonText;
        confirm_title = 'Ẩn danh mục này';
        confirm_text = 'Danh mục này sẽ bị ẩn trên hệ thông.';
        success_title = 'Đã ẩn!';
        success_text = 'Danh mục đã bị ẩn';
        confirmButtonText = 'Xác nhận ẩn!';
        Swal.fire({
         title: confirm_title,
         text: confirm_text,
         type: 'warning',
         showCancelButton: true,
         confirmButtonColor: '#3085d6',
         cancelButtonColor: '#d33',
         confirmButtonText: confirmButtonText
       }).then((result) => {
         if (result.value) {
          Swal.fire(
           success_title,
           success_text,
           'success'
           );
          let formData = new FormData();
          formData.append('status',status);
          formData.append('_method', 'PUT');
          $.ajax({
           url: '/admin/categories/'+id,
           type: 'post',
           processData: false,
           contentType: false,
           data: formData,
           success: function () {
            categoriesTable.ajax.reload();
            categories_hidden_Table.ajax.reload();
          }
        });
        }else{
          if (status == 0) {
           setSwitchery($(this),true);
         } else {
           setSwitchery($(this),false);
         }
         swalWithBootstrapButtons.fire(
           'Đã hủy',
           'Thao tác đã bị hủy',
           'error'
           );
       }
     })
     });
        // Đoạn này dùng để thay đổi trạng thái hiển thị của category
        categories_hidden_Table.on('change',".js-switch",function(e){
          let status = $(this).prop('checked') === true ? 1 : 0;
          let id = $(this).data('id');
          const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
              confirmButton: 'btn btn-success',
              cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
          });
          let confirm_title,confirm_text,success_title,success_text,confirmButtonText;
          confirm_title = 'Hiển thị danh mục này';
          confirm_text = 'Danh mục này sẽ được hiển thị trên hệ thống.';
          success_title = 'Đã hiện!';
          success_text = 'Danh mục đã được hiển thị';
          confirmButtonText = 'Xác nhận hiển thị!';
          Swal.fire({
            title: confirm_title,
            text: confirm_text,
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: confirmButtonText
          }).then((result) => {
            if (result.value) {
             Swal.fire(
              success_title,
              success_text,
              'success'
              );
             let formData = new FormData();
             formData.append('status',status);
             formData.append('_method', 'PUT');
             $.ajax({
              url: '/admin/categories/'+id,
              type: 'post',
              processData: false,
              contentType: false,
              data: formData,
              success: function () {
               categoriesTable.ajax.reload();
               categories_hidden_Table.ajax.reload();
             }
           });
           }else{
             if (status == 0) {
              setSwitchery($(this),true);
            } else {
              setSwitchery($(this),false);
            }
            swalWithBootstrapButtons.fire(
              'Đã hủy',
              'Thao tác đã bị hủy',
              'error'
              );
          }
        })
        });
        //Hàm này dùng để thay đổi switchery
        function setSwitchery(switchElement, checkedBool) {
          if (checkedBool && !switchElement.checked) {
          // switch on if not on
          $(switchElement).trigger('click').attr("checked", "checked");
        } else if (!checkedBool && switchElement.checked) {
          // switch off if not off
          $(switchElement).trigger('click').removeAttr("checked");
        }
      }
      // Lấy dữ liệu category chỉnh sửa
      var id_edit;
      $(document).on('click','.edit',function () {
        id_edit = $(this).data('id');
        $.ajax({
          url:'/admin/categories/'+id_edit+'/edit',
          type:'get',
          success: function (res) {
            $('.name').val(res.name);
            $('.slug').val(res.slug);
            $('.acronym').val(res.acronym);
            if(res.parent != -1){
             $('#edit-parentSelect').val(res.parent).trigger('change');
             $("#edit-parentSelect option[value='"+id_edit+"']").remove();
           }
           $('#edit-categoryModal').modal('show');
         }
       })
      })
      // submit form sửa
      $(document).on('submit','#edit-categoryAddForm',function () {
        let form = $(this)[0];
        let formData = new FormData(form);
        $.ajax({
         url: '/admin/categories/'+id_edit,
         type: 'post',
         data:formData,
         contentType:false,
         processData:false,
         success: function () {
          Swal.fire({
            position: 'center',
            type: 'success',
            title: 'Đã cập nhật danh mục',
            showConfirmButton: false,
            timer: 1000
          });
          $('#edit-categoryModal').modal('hide');
          categoriesTable.ajax.reload(null, false );
        }
      });
      })
       //-- Xóa category --
       $(document).on('click','.delete',function () {
        let confirm_title,confirm_text,success_title,success_text,confirmButtonText;
        confirm_title = 'Xóa danh mục này và tất cả danh mục con?';
        confirm_text = 'Tất cả danh mục con và sản phẩm thuộc danh mục này cũng sẽ bị xóa.';
        success_title = 'Đã xóa!';
        success_text = 'Danh mục này cùng toàn bộ danh mục và sản phẩm liên quan đã bị xóa';
        confirmButtonText = 'Xác nhận xóa!';
        Swal.fire({
         title: confirm_title,
         text: confirm_text,
         type: 'warning',
         showCancelButton: true,
         confirmButtonColor: '#3085d6',
         cancelButtonColor: '#d33',
         confirmButtonText: confirmButtonText
       }).then((result) => {
         if (result.value) {
          Swal.fire(
           success_title,
           success_text,
           'success'
           );
          let id = $(this).data('id');
          $.ajax({
            url:'/admin/categories/'+id,
            method:'DELETE',
            success: function () {
             categoriesTable.ajax.reload(null, false );
           }
         });
        }
      })
     });
     })