<?php
namespace Bedd\Common;

use Bedd\Common\Traits\StaticClassTrait;

/**
 * DateTimeUtils
 */
class DateTimeUtils
{
    use StaticClassTrait;

    /**
     * seconds per minute
     * @var int
     */
    const SECONDS_PER_MINUTE = 60;

    /**
     * seconds per hour
     * 60 * 60
     * @var int
     */
    const SECONDS_PER_HOUR = 3600;

    /**
     * seconds per day
     * 60 * 60 * 24
     * @var int
     */
    const SECONDS_PER_DAY = 86400;

    /**
     * seconds per week
     * 60 * 60 * 24 * 7
     * @var int
     */
    const SECONDS_PER_WEEK = 604800;

    /**
     * seconds per month
     * 60 * 60 * 24 * 30
     * @var int
     */
    const SECONDS_PER_MONTH = 2592000;

    /**
     * seconds per year
     * 60 * 60 * 24 * 365
     * @var int
     */
    const SECONDS_PER_YEAR = 31536000;
}
