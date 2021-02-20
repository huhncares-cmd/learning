  <?php // by ASigismund als Vorlage
		
      $start = 10000; 
      $zinssatz = 0.1;
      $guthaben = $start;
      for ($j = 1; $j <= 10; $j++) {
          $guthaben = $guthaben * (1+$zinssatz);
          echo $guthaben."\n";
      }
  ?>
