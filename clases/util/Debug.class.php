<?php

class Debug {

  function println($mensaje){
     $debug = true;
     if ($debug) {
        print "<h6><font color=\"gray\">".$mensaje."</font></h6>";
     }
  }
}
?>