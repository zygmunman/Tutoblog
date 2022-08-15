<div class="form-group row">
    <label for="titulo" class="col-sm-2 text-right control-label requerido">Título</label>
    <div class="col-sm-8">
        <input type="text" name="titulo" id="titulo" class="form-control" value="{{old('titulo', $data->titulo ?? "")}}" maxlength="150" required/>
    </div>
</div>
<div class="form-group row">
    <label for="slug" class="col-sm-2 text-right control-label requerido">Slug</label>
    <div class="col-sm-8">
        <input type="text" name="slug" id="titulo" class="form-control" value="{{old('slug', $data->slug ?? "")}}" maxlength="150" required/>
    </div>
</div>
