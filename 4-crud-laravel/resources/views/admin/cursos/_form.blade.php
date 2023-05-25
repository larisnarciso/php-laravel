<div class="input-field">
  <input type="text" name="title" value="{{isset($registro->titulo) ? $registro->titulo : ''}}">
  <label>Titulo</label>
</div>

<div class="input-field">
  <input type="text" name="title" value="{{isset($registro->descricao) ? $registro->descricao : ''}}">
  <label>Descrição</label>
</div>

<div class="input-field">
  <input type="text" name="valor" value="{{isset($registro->valor) ? $registro->valor : ''}}">
  <label>Valor</label>
</div>

<div class="file-field input-field">
  <div class="btn blue">
    <span>Imagem</span>
    <input type="file" name="imagem">
  </div>
  <div class="file-path-wrapper">
    <input type="text" class="file-path validate">
  </div>
</div>

@if(isset($registro->imagem))
<div class="input-field">
  <img src="{{asset($registro->imagem)}}" width="150">
</div>
@endif 


<div class="input-field">
  <p>
    <label>
      <input type="checkbox" {{isset($registro->publicado) && $registro->publicado == 'sim' ? 'checked' : ''}} value="true"/>
      <span>Publicar?</span>
    </label>
  </p>
  <br><br>
</div>