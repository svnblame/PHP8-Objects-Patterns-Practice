<?php

namespace popp\ch05\batch05;

use util as u;
use util\db\Querier as q;

class LocalNsEg {}

// Resolve these:

// Aliased namespace
// u/Writer;

// Aliased class
// q;

// Class referenced in local context
// Local
/* listing 05.43 */


/* listing 05.44 */
print u\Writer::class . "\n";
print q::class . "\n";
print LocalNsEg::class . "\n";
