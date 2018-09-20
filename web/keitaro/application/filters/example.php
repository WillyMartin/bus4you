<?php
namespace Filters;

use Component\StreamFilters\PayloadDecoratorService;
use Component\TrafficSources\Model\TrafficSource;
use Core\Filter\AbstractFilter;
use Component\StreamFilters\Model\StreamFilter;
use Component\Clicks\Model\RawClick;

/**
 * Filter Example
 */
class example extends AbstractFilter
{
    public function getName(TrafficSource $trafficSource = null)
    {
        return 'Example';
    }
    /**
     * Generate description for page Streams
     */
    public function decorate(StreamFilter $filter, TrafficSource $ts = null)
    {
        return PayloadDecoratorService::instance()->decorate('Filter example', $filter->getMode(), $filter->getPayload());
    }

    /**
     * Filter settings template
     */
    public function getTemplate()
    {
        return '<input class="form-control" ng-model="filter.payload" />';
    }

    /**
     * Check if $rawClick passes the filter (true - passed, false - failed)
     */
    public function isPass(StreamFilter $filter, RawClick $rawClick)
    {
        $value = $filter->getPayload();
        return ($filter->getMode() == StreamFilter::ACCEPT && $rawClick->getExtraParam(1) == 'YES')
            || ($filter->getMode() == StreamFilter::REJECT && $rawClick->getExtraParam(1) == 'NO');
    }
}