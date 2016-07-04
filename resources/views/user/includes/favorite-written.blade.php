<!--<form class="folderfav" method="get" action="{{ action('RecipeController@edit', array($id) ) }}">
  
  <button type="submit"> <img src="http://image005.flaticon.com/1/png/512/16/16294.png" width="auto" height="20"/>Edit</button>

</form>-->
<div class="favorite-written-buttons">
<form class="folderfav" method="post" action="{{ action('RecipeController@update' , array($id) ) }}">
                    
  <button type="submit"  class="<?php if( isset( $is_fav ) && 1 == $is_fav ){ echo 'unfav'; }else{ echo 'fav'; } ?>" > <?php if( isset( $is_fav ) && 1 == $is_fav ){ echo "&#8722;"; }else{ ?>✚<?php } ?> Folder Favorite </button>
  <input type="hidden" name="id" value="{{ $id }}" />
  <input type="hidden" name="quickfav" value="1" />
  <?php if( isset( $is_fav ) && 1 == $is_fav ){

    ?><input type="hidden" name="unfav" value="1" /> <?php

  }else{ 
      ?> <input type="hidden" name="fav" value="1" /> <?php
    }?>
  <input name="_method" type="hidden" value="patch" />
  {{ csrf_field() }}

</form>

<form class="folderfav" method="get" action="{{ action('RecipeController@show' , array($id) ) }}">
  
  <button type="submit"> Written Recipe</button>

</form>
</div>