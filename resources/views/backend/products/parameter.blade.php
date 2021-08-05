@if(count($parametersByPrd) != 0)
  @foreach ($parametersByPrd as $key => $parameter)
    <div class="card" id='parameter{{ $key + 1 }}'>
      <div class="card-header" id="heading{{ $key + 1 }}">
        <h2 class="mb-0">
          <button class="btn btn-block text-left font-weight-bold collapsed btn-outline-none"  type="button" data-toggle="collapse" data-target="#collapse{{ $key + 1 }}" aria-expanded="false" aria-controls="collapse{{ $key + 1 }}">
          {{ $parameter->name }}
          </button>
        </h2>
        <a  href="javascript:void(0)" class="text-danger delete js-remove-parameter" data-count="{{ $key + 1 }}" data-name="{{ $parameter->name }}" data-add="check"><i class="fad fa-trash-alt"></i> Xóa </a>
      </div>
      <div id="collapse{{ $key + 1 }}" class="collapse" aria-labelledby="heading{{ $key + 1 }}" data-parent="#js-parameter">
        <div class="card-body row">
          <div class="form-group col-4">
            <label for="js-name-parameter{{ $key + 1 }}">Tên thông số:</label>
            <input type="hidden" name="name_parameter[]" value="{{ $parameter->name }}">
            <label class="d-block">{{ $parameter->name }}</label>
          </div>  
          <div class="col-8">
            <label for="js-parameter-value{{ $key + 1 }}">Giá trị thông số:</label>
            <select name="value_parameter[]" class="w-100 h-auto" id="js-parameter-value{{ $key + 1 }}">
              <option value="{{ $parameter->id }}" selected>{{ $parameter->value }}</option>
              @foreach($parameter->fellow as $value)
                <option value="{{ $value->id }}">{{ $value->value }}</option>
              @endforeach
            </select>
            <button type="button" class="btn btn-outline-success outline-none mt-2 js-showModal" data-name="{{ $parameter->name }}" data-toggle="modal" data-target="#parameterModal" data-select="js-parameter-value{{ $key + 1 }}" data-count="{{ $key + 1 }}" >Thêm mới thông số</button>
          </div>
        </div>
      </div>
    </div>
  @endforeach 
@endif

