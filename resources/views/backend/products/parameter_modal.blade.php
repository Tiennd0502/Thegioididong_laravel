<!-- Modal -->
<div class="modal fade" id="parameterModal" tabindex="-1" aria-labelledby="parameterModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="parameterModalLabel">Thêm giá trị mới cho thuộc tính</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" class="form-control" id="js-select-add-option">
        <div class="form-group ">
          <label for="exampleInputName">Tên thuộc tính</label>
          <input type="text" class="form-control" id="js-name-add-new">
          <div class='error-text' style="display:none"> Tên  thuộc tính đã tồn tại. </div>
          <div class='error-text' style="display:none"> Vui lòng nhập tên thuộc tính. </div>
        </div>
        <div class="form-group">
          <label for="value">Giá trị thuộc tính</label>
          <input type="text" class="form-control" value='' id="js-value-add-new" placeholder='Giá trị thuộc tính'>
          <div class='error-text' style="display:none"> Giá trị thuộc tính đã tồn tại. </div>
          <div class='error-text' style="display:none"> Vui lòng nhập giá trị. </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
        <button type="button" class="btn btn-primary" id="js-addNewParameter">Thêm mới</button>
      </div>
    </div>
  </div>
</div>