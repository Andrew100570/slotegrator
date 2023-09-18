<?php
/**
 * Created by PhpStorm.
 * User: andry
 * Date: 16.9.23
 * Time: 20.36
 */

namespace AwsS3;


interface AwsUrlInterface
{
    /**
     * Returns string representation of the instance URL.
     *
     * @return string
     */
    public function __toString(): string;

}
