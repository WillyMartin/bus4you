<?php
namespace Redirects;

use Component\Streams\Model\BaseStream;
use Component\Clicks\Model\RawClick;
use Component\StreamActions\AbstractAction;

class example extends AbstractAction
{
    protected $_name = 'Example';
    protected $_weight = 100;

    protected function _execute(BaseStream $stream, RawClick $rawClick)
    {
        $this->addHeader("Location: " . $rawClick->getDestination());
    }
}
