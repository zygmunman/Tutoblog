<div class="form-group row">
    <label for="titulo" class="col-sm-2 text-right control-label requerido">Título</label>
    <div class="col-sm-8">
        <input type="text" name="titulo" id="titulo" class="form-control" value="{{old('titulo', $data->titulo ?? "")}}" maxlength="150" required/>
    </div>
</div>
<div class="form-group row">
    <label for="slug" class="col-sm-2 text-right control-label requerido">Slug</label>
    <div class="col-sm-8">
        <input type="text" name="slug" id="slug" class="form-control" value="{{old('slug', $data->slug ?? "")}}" maxlength="150" required/>
    </div>
</div>
<div class="form-group row">
    <label for="categoria" class="col-sm-2 text-right control-label requerido">Categoría</label>
    <div class="col-sm-8">
        <select name="categoria[]" id="categoria" class="select2" multiple="multiple" style="width: 100%;" required>
            <option value="">Seleccione</option>
            @foreach ($categorias as $key => $value )
                <option value="{{$key}}">{{$value}}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group row">
    <label for="tag" class="col-sm-2 text-right control-label">Tags</label>
    <div class="col-sm-8">
        <select name="tag[]" id="tag" class="tags" multiple = "multiple" style="width: 100%;">
            @foreach ($tags as $key => $value )
                <option value="{{$key}}">{{$value}}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group row">
    <label for="descripcion" class="col-sm-2 text-right control-label requerido">Descripción</label>
    <div class="col-sm-8">
        <textarea name="descripcion" id="descripcion" class="form-control" rows="3" maxlength="255" required>{{old("descripcion", $data->descripcion ?? "")}}</textarea>
    </div>
</div>
<div class="form-group row">
    <label for="body" class="col-sm-2 text-right control-label requerido">Cuerpo</label>
    <div class="col-sm-8">
        <!--<textarea name="body" id="body" class="form-control" style="height: 200px;" required>{{old("body", $data->body ?? "")}}</textarea>-->
        <div id="body" class="form-control" style="height: 200px">
            {{old("body", $data->body ?? "")}}
        </div>
        <input type="hidden" name="contenido" id="body-field" value="{{old("body", $data->body ?? "")}}">
    </div>
</div>
<div class="form-group row">
    <label for="imagen" class="col-sm-2 text-right control-label requerido">Imagen</label>
    <div class="col-sm-5">
        <input type="file" name="imagen" id="imagen" data-initial-preview="{{"https://via.placeholder.com/200x150.jpg?text=Imagen+Post"}}" accept="image/*">
    </div>
</div>

<input type="hidden" name="usuario_id" value="{{Auth::user()->id}}">
