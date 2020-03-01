<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/videointelligence/v1/video_intelligence.proto

namespace Google\Cloud\VideoIntelligence\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Normalized bounding box.
 * The normalized vertex coordinates are relative to the original image.
 * Range: [0, 1].
 *
 * Generated from protobuf message <code>google.cloud.videointelligence.v1.NormalizedBoundingBox</code>
 */
class NormalizedBoundingBox extends \Google\Protobuf\Internal\Message
{
    /**
     * Left X coordinate.
     *
     * Generated from protobuf field <code>float left = 1;</code>
     */
    private $left = 0.0;
    /**
     * Top Y coordinate.
     *
     * Generated from protobuf field <code>float top = 2;</code>
     */
    private $top = 0.0;
    /**
     * Right X coordinate.
     *
     * Generated from protobuf field <code>float right = 3;</code>
     */
    private $right = 0.0;
    /**
     * Bottom Y coordinate.
     *
     * Generated from protobuf field <code>float bottom = 4;</code>
     */
    private $bottom = 0.0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type float $left
     *           Left X coordinate.
     *     @type float $top
     *           Top Y coordinate.
     *     @type float $right
     *           Right X coordinate.
     *     @type float $bottom
     *           Bottom Y coordinate.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Videointelligence\V1\VideoIntelligence::initOnce();
        parent::__construct($data);
    }

    /**
     * Left X coordinate.
     *
     * Generated from protobuf field <code>float left = 1;</code>
     * @return float
     */
    public function getLeft()
    {
        return $this->left;
    }

    /**
     * Left X coordinate.
     *
     * Generated from protobuf field <code>float left = 1;</code>
     * @param float $var
     * @return $this
     */
    public function setLeft($var)
    {
        GPBUtil::checkFloat($var);
        $this->left = $var;

        return $this;
    }

    /**
     * Top Y coordinate.
     *
     * Generated from protobuf field <code>float top = 2;</code>
     * @return float
     */
    public function getTop()
    {
        return $this->top;
    }

    /**
     * Top Y coordinate.
     *
     * Generated from protobuf field <code>float top = 2;</code>
     * @param float $var
     * @return $this
     */
    public function setTop($var)
    {
        GPBUtil::checkFloat($var);
        $this->top = $var;

        return $this;
    }

    /**
     * Right X coordinate.
     *
     * Generated from protobuf field <code>float right = 3;</code>
     * @return float
     */
    public function getRight()
    {
        return $this->right;
    }

    /**
     * Right X coordinate.
     *
     * Generated from protobuf field <code>float right = 3;</code>
     * @param float $var
     * @return $this
     */
    public function setRight($var)
    {
        GPBUtil::checkFloat($var);
        $this->right = $var;

        return $this;
    }

    /**
     * Bottom Y coordinate.
     *
     * Generated from protobuf field <code>float bottom = 4;</code>
     * @return float
     */
    public function getBottom()
    {
        return $this->bottom;
    }

    /**
     * Bottom Y coordinate.
     *
     * Generated from protobuf field <code>float bottom = 4;</code>
     * @param float $var
     * @return $this
     */
    public function setBottom($var)
    {
        GPBUtil::checkFloat($var);
        $this->bottom = $var;

        return $this;
    }

}

