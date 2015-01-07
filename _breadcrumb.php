<?php
if( !defined("TEMPO_MAIN_PROGRAM") ) die( "Error: can't include this file directly" );
?>

  <div id="breadcrumb" class="container">
    <div class="col-sm-12">
      <div class="row">
        <ol class="breadcrumb">
          <li><a href="/dash">Home</a></li>
          <li class="active">
            <? if ($routes[1] == "dash") { ?>Dashboard<? } ?>
            <? if ($routes[1] == "calendar") { ?>Calendar<? } ?>
            <? if ($routes[1] == "library") { ?>Library<? } ?>
          </li>

        </ol>
      </div>
    </div>
  </div>
