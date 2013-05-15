<?php
      // Setup class
      $instagram = new Instagram(array(
        'apiKey'      => 'b40ecbefe74a43578b216c251ff9a898',
        'apiSecret'   => 'a2111c19ca0d440d8b7e078fd407c54f',
        'apiCallback' => 'http://folkagram:8888/index.php/success' // must point to success.php
      ));