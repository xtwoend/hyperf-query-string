<?php

namespace Xtwoend\QueryString;

use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\HttpServer\Request as BaseRequest;

class Request extends BaseRequest implements RequestInterface
{
    public const DESCENDING    = 'desc';
    public const ASCENDING     = 'asc';

    public function sorts()
    {
        $sortParameterName = config('query-builder.parameters.sort', 'sort');
        $sortParts = $this->query($sortParameterName);

        if (is_null($sortParts) && $sortParts !== '') {
            return [];
        }

        if (is_string($sortParts)) {
            $sortParts = [$sortParts => self::ASCENDING];
        } else {
            $sortParts = array_map(function ($val) {
                return $val ? self::DESCENDING : self::ASCENDING;
            }, $sortParts);
        }

        return collect($sortParts)->filter();
    }

    public function filter()
    {
        $filterParameterName = config('query-builder.parameters.filter', 'q');
        return $this->query($filterParameterName);
    }
}
