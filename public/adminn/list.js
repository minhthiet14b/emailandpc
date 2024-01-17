$(function(){
    // Lấy danh sách status
    var rowCount = $('tbody tr').length;
    var url = $('tbody tr ').attr('data-url');
    // Duyệt danh sách status

    var _loop = function _loop(index) {
        // public status
        if ($('body .nb-check-publish-' + index).length) {
          $('body .nb-check-publish-' + index).on('click', function () {
            var valueChange = $('body .nb-check-publish-' + index).attr('data-change');
            var id = $('body .nb-check-publish-' + index).attr('id');
            var name = $('body .nb-check-publish-' + index).attr('data-name');
            // console.log(id);
            axios.post(url, {
              id: id,
              value: valueChange,
              name: name
            }).then(function (response) {
                // console.log(response);
              if (valueChange == 1) {
                $('body .nb-check-publish-' + index).attr('data-change', 0);
                $('body .nb-check-publish-' + index + ' i').attr('class', 'fa fa-check fa-lg text-success');
                toastr.options = {"positionClass": "toast-bottom-right",}
                toastr.success('Enable successful status.');
              } else {
                $('body .nb-check-publish-' + index).attr('data-change', 1);
                $('body .nb-check-publish-' + index + ' i').attr('class', 'fa fa-times fa-lg text-secondary');
                toastr.options = { "positionClass": "toast-bottom-right",}
                toastr.error('Disable successful status.');
              }
                })["catch"](function (error) {
                console.log(error);
                });
          });
        }
      };
      for (var index = 0; index < rowCount; index++) {
        _loop(index);
      }
});


